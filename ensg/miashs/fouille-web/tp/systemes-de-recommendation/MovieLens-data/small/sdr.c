/*
 *
 * sdr.c
 *
 * Stochastic descent for rating matrix completion.
 *
 *
gcc -O3 -march=nocona -mtune=generic -DMON_NOM=\"sdr\" -DVERSION_STR=\"0.1\" -DDATE_STR=\"`date +%D`\" -o sdr sdr.c /home/ppreux/usr/lib/Malloc.c /home/ppreux/usr/lib/print.help.c -I/home/ppreux/usr/lib/include/

 *
 */

#include <stdio.h>
#include <math.h>
#include <stdlib.h>
#include <signal.h>
#include "Malloc.h"

# include <string.h> /* for strstr() */
# include <strings.h> /* for strcasecmp() */

#include <errno.h>

/* for getopt() arguments */
#include <ctype.h>
#include <getopt.h>

#define ON_END(f) signal(SIGINT,f);signal(SIGQUIT,f);signal(SIGHUP,f);signal(SIGTERM,f);signal(SIGABRT,f)


unsigned int Nitems = 0, Nraters = 0, Nratings = 0, maxRate = 5;
unsigned int NtrainingRatings = 0, NtestRatings = 0;
typedef struct {
  unsigned int rid;
  unsigned int iid;
  unsigned int r;
  unsigned long int t;
} Rating, *Prating;
static Prating ratings = (Prating) NULL;
static double *eij = (double *) NULL;

static double **phi_items = NULL;
static double **phi_raters = NULL;
static double phi_init_value = .1;

static unsigned int K = 0;

static double eta = .0001;
static double theta = 1;
typedef enum { constant, rnd_all_identical, rnd } Init_phi_style;
static Init_phi_style init_phi = constant;
static unsigned int max_steps = 1000;

static int algo = 0;
static int silent = 0;
static int verbose = 0;
static double training_set_prop = 1.0;
static int load_phis = 1;

static unsigned int iteration_count = 0;

void analParam (int argc, char *argv[])
{
  static struct option long_options[] =
    {
      {"algo", 1, 0, 'a'},
      {"max-steps", 1, 0, 'i'},
      {"training-set-prop", 1, 0, 'S'},
      {"silent", 0, 0, 'V'},
      {"verbose", 0, 0, 1},
      {"help", 2, 0, 'h'},
      {"version", 0, 0, 'v'},
      {0, 0, 0, 0}
    };
  int c;

  while (1) {
    int option_index = 0;
    c = getopt_long (argc, argv, "vha:di:I:K:S:V",
		     long_options, &option_index);
    if (c == -1) break;
    switch (c) {
    case 1:
      verbose = 1;
      break;
    case 'a':
      algo = atoi (optarg);
      if ((algo < 0) || (algo > 1)) {
	fprintf (stderr, "%s: algo %s unknown\n", MON_NOM, optarg);
	exit (EXIT_FAILURE);
      }
      break;
    case 'd':
      load_phis = 0;
      break;
    case 'i':	max_steps = atoi (optarg); break;
    case 'I':	
      break;
    case 'K':
      K = (unsigned int) atoi (optarg);
      break;
    case 'S':
      training_set_prop = atof (optarg);
      if ((training_set_prop <= 0) || (training_set_prop > 1)) {
	fprintf (stderr, "%s: training set proportion irrelevant (%s).\n",
		 MON_NOM, optarg);
	exit (EXIT_FAILURE);
      }
      break;
    case 'V':
      silent = 1;
      break;
    case 'h':
      print_help (long_options);
      exit (EXIT_SUCCESS);
    case 'v':
      fprintf (stderr, "%s: version %s (last compiled on %s)\n", 
	       MON_NOM, VERSION_STR, DATE_STR);
      exit (EXIT_SUCCESS);
      break;
    }
  }
}

static int initParams (FILE *fd)
{
  if (fd) {
  } else {
    Nitems = 1682;
    Nraters = 943;
    Nratings = 100000;
    K = 40;
    NtrainingRatings = training_set_prop * Nratings;
    NtestRatings = Nratings - NtrainingRatings;
  }
  return 1;
}

static initDS (void)
{
  unsigned int i;
  ratings = (Prating) Malloc (sizeof (Rating) * Nratings);
  phi_items = (double **) Malloc (sizeof (double *) * Nitems);
  for (i = 0; i < Nitems; i ++) {
    unsigned int k;
    phi_items [i] = (double *) Malloc (sizeof (double) * K);
    for (k = 0; k < K; k ++)
      phi_items [i] [k] = phi_init_value;
  }
  phi_raters = (double **) Malloc (sizeof (double *) * Nraters);
  for (i = 0; i < Nraters; i ++) {
    unsigned int k;
    phi_raters [i] = (double *) Malloc (sizeof (double) * K);
    for (k = 0; k < K; k ++)
      phi_raters [i] [k] = phi_init_value;
  }
  eij = (double *) Malloc (sizeof (double) * Nratings);
}

static int readData (FILE *fd)
{
  if (fd) {
    unsigned int i;
    for (i = 0; i < Nratings; i ++)
      fscanf (fd, "%d%d%d%ld", &(ratings [i]. rid),
	      &(ratings [i]. iid), &(ratings [i]. r), &(ratings [i]. t));
    for (i = 0; i < Nratings; i ++) {
      ratings [i]. rid --;
      ratings [i]. iid --;
    }
  } else {
  }
  return 1;
}

static double compute_dij (unsigned int i, unsigned int j)
{
  double somme = .0;
  unsigned int k;
  for (k = 0; k < K; k ++)
    somme += phi_items [i] [k] * phi_raters [j] [k];
  return somme;
}

static double current_training_error (void)
{
  unsigned int i;
  double error = .0;
  for (i = 0; i < NtrainingRatings; i ++) {
    eij [i] = ratings [i]. r - compute_dij (ratings [i]. iid, 
					     ratings [i]. rid);
    error += eij [i] * eij [i];
  }
  return error / ((double) NtrainingRatings);
}

static double current_test_error (void)
{
  unsigned int i;
  double error = .0;
  for (i = Nratings - NtrainingRatings; i < Nratings; i ++) {
    eij [i] = ratings [i]. r - compute_dij (ratings [i]. iid, 
					     ratings [i]. rid);
    error += eij [i] * eij [i];
  }
  return error / ((double) (Nratings - NtrainingRatings));
}

static void savePhis (void)
{
  FILE *fd = Fopen (".phi.backup", "w", 0);
  unsigned int i, j;

  fwrite (&iteration_count, (size_t) (sizeof (unsigned int)), 1, fd);
  for (i = 0; i < Nitems; i++)
    fwrite (phi_items [i], (size_t) (sizeof (double) * K), 1, fd);
  for (i = 0; i < Nraters; i++)
    fwrite (phi_raters [i], (size_t) (sizeof (double) * K), 1, fd);
  fclose (fd);
}

static void readPhis (void)
{
  FILE *fd = fopen (".phi.backup", "r");
  if (fd) {
    unsigned int i, j;
    fread (&iteration_count, (size_t) (sizeof (unsigned int)), 1, fd);
    for (i = 0; i < Nitems; i++)
      fread (phi_items [i], (size_t) (sizeof (double) * K), 1, fd);
    for (i = 0; i < Nraters; i++)
      fread (phi_raters [i], (size_t) (sizeof (double) * K), 1, fd);
    fclose (fd);
  }
}

static int estimateRatings (void)
{
  double prev_train_error, train_error = current_training_error ();
  double prev_test_error, test_error = current_test_error ();
  
  do {
    prev_test_error = test_error;
    unsigned int i;
    printf ("%d\t%f\t%f\n", iteration_count, train_error, test_error);
    /*    for (i = 0; i < Nratings; i ++) {*/
    for (i = 0; i < NtrainingRatings; i ++) {
      unsigned int k;
      for (k = 0; k < K; k ++) {
	double prev_phi_items = phi_items [ratings [i]. iid] [k];
	double eta_times_eij_i = eta * eij [i];
	phi_items [ratings [i]. iid] [k] += 
	  eta_times_eij_i * phi_raters [ratings [i]. rid] [k];
	phi_raters [ratings [i]. rid] [k] += 
	  eta_times_eij_i * prev_phi_items;
      }
    }
    test_error = current_test_error ();
    train_error = current_training_error ();
    iteration_count ++;
  } while ((test_error < prev_test_error) /*&& 
           (fabs (error - prev_error) > theta) && 
           (iteration_count < max_steps)*/);

  savePhis ();

  if (test_error >= prev_test_error) return 1;
  if (fabs (test_error - prev_test_error) <= theta) return 2;
  return 3;
}


void main_exit (int code)
{
  fprintf (stderr, "%f\t%f\t%f\t%f\n",
	  phi_items [0] [0], phi_items [Nitems - 1] [K-1],
	  phi_raters [0] [0], phi_raters [Nraters - 1] [K-1]);
  savePhis ();
  exit (code);
}

int main (int argc, char *argv [])
{
  FILE *fd;
  ON_END (main_exit);

  /*
  if (argc > 1) {
    fd = Fopen (argv [1], "r", 0);
    (void) initParams (fd);
    fclose (fd);
    (void) initDS ();
    fd = Fopen (argv [2], "r", 0);
    (void) readData (fd);
    fclose (fd);
  } else {
    (void) initParams (NULL);
    (void) initDS ();
    fd = Fopen ("u.data", "r", 0);
    (void) readData (fd);
    fclose (fd);
  }
  */

  analParam (argc, argv);

  (void) initParams (NULL);
  (void) initDS ();
  fd = Fopen ("u.data", "r", 0);
  (void) readData (fd);
  fclose (fd);

  if (load_phis) readPhis ();
  fprintf (stderr, "%f\t%f\t%f\t%f\n",
	  phi_items [0] [0], phi_items [Nitems - 1] [K-1],
	  phi_raters [0] [0], phi_raters [Nraters - 1] [K-1]);
  fprintf (stderr, "returned value = %d\n", estimateRatings ());
  fprintf (stderr, "%f\t%f\t%f\t%f\n",
	  phi_items [0] [0], phi_items [Nitems - 1] [K-1],
	  phi_raters [0] [0], phi_raters [Nraters - 1] [K-1]);
}
