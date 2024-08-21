/*
 * barplot.h
 *
 * Philippe Preux, Université de Lille
 * mai 2024
 *
 */

int set_output_type (const char *);
void barplot (const double *, const double *, const size_t, const char *titre);
void plot_series (double **, const size_t, const size_t, const int, const char *);
void plot_2d (const double *, const double *, const size_t, const char *);
void scatter_plot (double **, const size_t, const char *);
