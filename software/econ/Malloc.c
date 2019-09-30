/*
 * Malloc.c
 *
 * This is my miscalleneous library which basically replaces a bunch of
 * standard calls by exiting the program if the call was not succesfull.
 *
 *
 * Malloc(): same prototype as malloc() but automatically checks that a valid
 *   pointer has been returned. If not, exit()'s.
 *
 * MallocAndAssign(): equivalent to:
      char *titi = Malloc (strlen (str) + 1);
      memcpy (titi, str, strlen (str) + 1);
      return titi;
 *
 * Fopen() same as open(), but exit()'s is file was not opened.
 *
 * FopenInDir() opens a file located in a specified directory.
 *
 * Mkdir() is now recursive, and debugged (works like mkdir -p). If the 
 *   creation of the directory(ies) is not possible, exit()'s.
 *  may be tested with: gcc -o Malloc.main Malloc.c -DMAIN_MKDIR -I../include
 *  then:  ./Malloc.main
 *    or   ./Malloc.main a/b/c/d a/b/c/e/f a/c/e
 *
 * LogCmdLineArguments () logs the command line that invokated the program
 *                        into a specified file
 *
 */

#ifndef _GNU_SOURCE
#define _GNU_SOURCE
#endif

#include <stdlib.h>
#include <stdio.h>
#include <string.h>
#include <errno.h>
#include <sys/stat.h>
#include <sys/types.h>
#include <strings.h>
#include <unistd.h> /* for chdir() */

#include "Malloc.h"

void *Malloc (const unsigned int size)
{
  void *ptr = malloc (size);
  if (! ptr) {
    fprintf (stderr, "%s: can not mallocate\n", program_invocation_short_name);
    exit (EXIT_FAILURE);
  }
  return ptr;
}

void *Realloc (void *ptr, size_t size)
{
  void *ptr2 = realloc (ptr, size);
  if (! ptr2) {
    fprintf (stderr, "%s: can not reallocate\n", program_invocation_short_name);
    exit (EXIT_FAILURE);
  }
  return ptr2;
}

char *MallocAndAssign (const char *str)
{
  char *ptr = (char *) Malloc (strlen (str) + 1);
  memmove (ptr, str, strlen (str) + 1);
  return ptr;
}

FILE *Fopen (const char *filename, const char *mode,
	     const int flag_only_warning)
{
  FILE *f = fopen (filename, mode);
  if (f) return f;
  if (flag_only_warning == FLAG_ONLY_WARNING) {
    fprintf (stderr, "%s: (warning) can not open file %s.\n", 
	   program_invocation_short_name, filename);
    return f;
  }
  fprintf (stderr, "%s: can not open file %s.\n", 
	   program_invocation_short_name, filename);
  exit (EXIT_FAILURE);
}

FILE *FopenInDir (const char *dirname, const char *filename, const char *mode, 
		  const int flag_ony_warning)
{
  char *pathname = (char *) 
    Malloc (strlen (dirname) + 1 + strlen (filename) + 1);
  if (dirname [strlen (dirname)] == '/')
    sprintf (pathname, "%s%s", dirname, filename);
  else sprintf (pathname, "%s/%s", dirname, filename);
  return Fopen (pathname, mode, flag_ony_warning);
}

void Mkdir (const char *name, const int mode)
{
  char *titi;
  char *toto;
  toto = MallocAndAssign (name);
  char *current_dir = get_current_dir_name ();
  while ((titi = index (toto, '/'))) {
    *titi = (char) 0;
    if (mkdir (toto, mode) && (errno != EEXIST)) {
      fprintf (stderr, "%s: can not create directory %s (%d).\n", 
	       program_invocation_short_name, name, errno);
      exit (EXIT_FAILURE);
    } else chdir (toto);
    toto = titi + 1;
  }
  if (*toto) {
    if (mkdir (toto, mode) && (errno != EEXIST)) {
      fprintf (stderr, "%s: can not create directory %s (%d).\n", 
	       program_invocation_short_name, name, errno);
      exit (EXIT_FAILURE);
    }
  }
  chdir (current_dir);
  free (current_dir);
}

void LogCmdLineArguments (const char *dir, const char *filename,
			  int argc, char *argv[])
{
  int i;
  FILE *log_file;
  log_file = FopenInDir (dir, filename, "w", FLAG_SET_ERROR);
  for (i = 0; i < argc; i ++) fprintf (log_file, "%s ", argv [i]);
  fputc ('\n', log_file);
  fclose (log_file);
}

void LogCmdLineArgumentsAndSeed (const char *dir, const char *filename,
				 int argc, char *argv[], 
				 const unsigned long int seed)
{
  int i;
  FILE *log_file;
  log_file = FopenInDir (dir, filename, "w", FLAG_SET_ERROR);
  for (i = 0; i < argc; i ++) fprintf (log_file, "%s ", argv [i]);
  fprintf (log_file, "\n%lu\n", seed);
  fclose (log_file);
}

#ifdef MAIN_MKDIR
main (int argc, char **argv)
{
  unsigned int i;
  if (argc > 1)
    for (i = 1; i < argc; i ++)
      Mkdir (argv [i], 0755);
  else {
    Mkdir ("a/b/c/d/e", 0755);
    Mkdir ("a/b/cc/dd", 0755);
    Mkdir ("a/bb/c", 0755);
  }
}
#endif
