/*
 * plot.c
 *
 */

#include "plcdemos.h"

static void plfbox (PLFLT x0, PLFLT y0, double delta)
{
    PLFLT x[4], y[4];

    x[0] = x0;
    y[0] = 0.;
    x[1] = x0;
    y[1] = y0;
    x[2] = x0 + delta;
    y[2] = y0;
    x[3] = x0 + delta;
    y[3] = 0.;
    plfill (4, x, y);
    // couleur du contour du polygone : 0 == noir
    plcol0 (0);
    // style des lignes dessinant le polygone : 1 == continue
    pllsty (1);
    // dessine les lignes de contour du polygone
    plline (4, x, y);
}

void barplot (const double *valeurs, const double *les_bords,
	      const size_t nb_bins)
{
  /* contour des barres : noir */
  static PLINT couleurs_red[]   = { 0, 0 };
  static PLINT couleurs_green[] = { 0, 255 };
  static PLINT couleurs_blue[]  = { 0, 0 };

  //  plsdev ("xcairo");
  plsdev ("pngcairo");
  plinit ();

  // vide la page/fenêtre
  pladv (0);
  // Selects the largest viewport within the subpage that leaves a standard margin
  plvsta();
  double val_max = valeurs [0];
  for (size_t i = 1; i < nb_bins; i ++)
    if (valeurs [i] > val_max) val_max = valeurs [i];
  double delta = (les_bords [nb_bins] - les_bords [0]) / nb_bins;
  size_t n_yvalues = 5;
  double delta_y = val_max / n_yvalues;
  // specify the world coordinates of the edges of the viewport.
  plwind (les_bords [0], les_bords [nb_bins], 0.0, val_max * 1.25);
  //plenv (les_bords [0], les_bords [nb_bins], 0.0, val_max * 1.25, 0, 0);
  // dessine une boîte autour du viewport courant
  plbox ("bc", delta, 0, "bcnt", delta_y, 0);
  plcol0 (4); // couleur du titre : 4 == aquamarine
  pllab ("", "", "Distribution empirique pour la graine 123456");
  
  plscmap0n (1);
  plscmap0 (couleurs_red, couleurs_green, couleurs_blue, 2);
    
  for (size_t i = 0; i < nb_bins; i++) {
    plcol0 (1); // couleur des barres : vert
    plpsty (0); // fill pattern : 0 == filled 
    plfbox (les_bords [i], valeurs [i], delta);
  }
    
  double n_strings = 5.;
  double delta_bords_strings = 1.0 / n_strings;

  for (size_t i = 0; i <= n_strings; i ++) {
    char string [128];
    sprintf (string, "%3.2f", les_bords [0] + i * delta_bords_strings);
    plcol1 (1);
    plmtex ("b", 1.5, i * delta_bords_strings, 0.5, string);
  }
  
  plend();
  return;
}


void plot_series (double **Y, const size_t len_y, const size_t N_series,
		  const int bounds_flag, const char *titre)
{
  // Initialize plplot
  plsdev ("xcairo");
  plinit ();
  plscmap0n (N_series + 5);
  plcol0 (1);
  double ymin = Y [0] [0];
  double ymax = Y [0] [0];
  for (size_t i = 0; i < N_series; i ++)
    for (size_t j = 0; j < len_y; j ++) {
      if (Y [i] [j] < ymin) ymin = Y [i] [j];
      if (Y [i] [j] > ymax) ymax = Y [i] [j];
    }
  ymin *= 1.1;
  ymax *= 1.1;
  plenv (0, len_y /* / 4*/, ymin, ymax, 0, 0 );

  double *les_x = malloc (sizeof (PLFLT) * len_y);
  for (size_t i = 0; i < len_y; i++) les_x [i] = i;
  
  for (size_t j = 0; j < N_series; j ++) {
      plcol0 (2 + j);
      plline ((int) len_y, les_x, Y [j]);
  }
  if (bounds_flag) {
    plcol0 (2 + N_series);
    static PLINT mark = 1500, space = 1500;
    plstyl (1, &mark, &space);
    plline ((int) len_y, les_x, Y [N_series]);
    plline ((int) len_y, les_x, Y [N_series + 1]);
  }
  
  plcol0 (4); // couleur du titre : 4 == aquamarine
  pllab ("", "", titre);

  plend ();
}

void plot_2d (const double *les_x, const double *les_y, const size_t n,
	      const char *titre)
{
  plsdev ("xcairo");
  plinit ();
  plscmap0n (6);
  plcol0 (1);
  double xmin = les_x [0];
  double xmax = les_x [0];
  double ymin = les_y [0];
  double ymax = les_y [0];
  for (size_t i = 0; i < n; i ++) {
    if (les_x [i] < ymin) xmin = les_x [i];
    if (les_x [i] > ymax) xmax = les_x [i];
    if (les_y [i] < ymin) ymin = les_y [i];
    if (les_y [i] > ymax) ymax = les_y [i];
  }
  ymin *= 1.1;
  ymax *= 1.1;
  plenv (xmin, xmax, ymin, ymax, 0, 0);

  plcol0 (2);
  plline ((int) n, les_x, les_y);

  plcol0 (4); // couleur du titre : 4 == aquamarine
  pllab ("", "", titre);

  plend ();
}

void scatter_plot (double **les_xy, const size_t n, const char *titre)
{
  plsdev ("xcairo");
  plinit ();
  plscmap0n (6);
  plcol0 (1);
  double xmin = les_xy [0] [0];
  double xmax = les_xy [0] [0];
  double ymin = les_xy [0] [1];
  double ymax = les_xy [0] [1];
  double *les_x = malloc (sizeof (double) * n);
  double *les_y = malloc (sizeof (double) * n);
  for (size_t i = 0; i < n; i ++) {
    les_x [i] = les_xy [i] [0];
    les_y [i] = les_xy [i] [1];
    if (les_xy [i] [0] < ymin) xmin = les_xy [i] [0];
    if (les_xy [i] [0] > ymax) xmax = les_xy [i] [0];
    if (les_xy [i] [1] < ymin) ymin = les_xy [i] [1];
    if (les_xy [i] [1] > ymax) ymax = les_xy [i] [1];
  }
  plenv (xmin, xmax, ymin, ymax, 0, 0);
  plcol0 (2);
  plstring ((int) n, les_x, les_y, ".");
  free (les_x);
  free (les_y);
  
  plcol0 (4); // couleur du titre : 4 == aquamarine
  pllab ("", "", titre);

  plend ();
}
