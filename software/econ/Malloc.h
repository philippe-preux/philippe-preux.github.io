/*
 * Malloc.h
 */

#ifndef Malloc_H_ALREADY_INCLUDED
#define Malloc_H_ALREADY_INCLUDED

#define FLAG_ONLY_WARNING 1
#define FLAG_SET_ERROR 0

extern void *Malloc (const unsigned int);
extern void *Realloc (void *, size_t);
extern char *MallocAndAssign (const char *);
extern FILE *Fopen (const char *, const char *, const int);
extern FILE *FopenInDir (const char *, const char *, const char *, 
			 const int);
extern void Mkdir (const char *, const int);
extern void LogCmdLineArguments (const char *, const char *, 
				 int, char *[]);
extern void LogCmdLineArgumentsAndSeed (const char *, const char *,
					int, char *[], 
					const unsigned long int);

#endif
