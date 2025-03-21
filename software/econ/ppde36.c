/*
 * ppde36.c
 *
 * de36.c made a library
 * by PP.
 *
 */

/***************************************************************
**                                                            **
**        D I F F E R E N T I A L     E V O L U T I O N       **
**                                                            **
** Program: de.c                                              **
** Version: 3.6                                               **
**                                                            **
** Authors: Dr. Rainer Storn                                  **
**          c/o ICSI, 1947 Center Street, Suite 600           **
**          Berkeley, CA 94707                                **
**          Tel.:   510-642-4274 (extension 192)              **
**          Fax.:   510-643-7684                              **
**          E-mail: storn@icsi.berkeley.edu                   **
**          WWW: http://http.icsi.berkeley.edu/~storn/        **
**          on leave from                                     **
**          Siemens AG, ZFE T SN 2, Otto-Hahn Ring 6          **
**          D-81739 Muenchen, Germany                         **
**          Tel:    636-40502                                 **
**          Fax:    636-44577                                 **
**          E-mail: rainer.storn@zfe.siemens.de               **
**                                                            **
**          Kenneth Price                                     **
**          836 Owl Circle                                    **
**          Vacaville, CA 95687                               **
**          E-mail: kprice@solano.community.net               ** 
**                                                            **
** This program implements some variants of Differential      **
** Evolution (DE) as described in part in the techreport      **
** tr-95-012.ps of ICSI. You can get this report either via   **
** ftp.icsi.berkeley.edu/pub/techreports/1995/tr-95-012.ps.Z  **
** or via WWW: http://http.icsi.berkeley.edu/~storn/litera.html*
** A more extended version of tr-95-012.ps is submitted for   **
** publication in the Journal Evolutionary Computation.       ** 
**                                                            **
** You may use this program for any purpose, give it to any   **
** person or change it according to your needs as long as you **
** are referring to Rainer Storn and Ken Price as the origi-  **
** nators of the the DE idea.                                 **
** If you have questions concerning DE feel free to contact   **
** us. We also will be happy to know about your experiences   **
** with DE and your suggestions of improvement.               **
**                                                            **
***************************************************************/
/**H*O*C**************************************************************
**                                                                  **
** No.!Version! Date ! Request !    Modification           ! Author **
** ---+-------+------+---------+---------------------------+------- **
**  1 + 3.1  +5/18/95+   -     + strategy DE/rand-to-best/1+  Storn **
**    +      +       +         + included                  +        **
**  1 + 3.2  +6/06/95+C.Fleiner+ change loops into memcpy  +  Storn **
**  2 + 3.2  +6/06/95+   -     + update comments           +  Storn **
**  1 + 3.3  +6/15/95+ K.Price + strategy DE/best/2 incl.  +  Storn **
**  2 + 3.3  +6/16/95+   -     + comments and beautifying  +  Storn **
**  3 + 3.3  +7/13/95+   -     + upper and lower bound for +  Storn **
**    +      +       +         + initialization            +        **
**  1 + 3.4  +2/12/96+   -     + increased printout prec.  +  Storn **
**  1 + 3.5  +5/28/96+   -     + strategies revisited      +  Storn **
**  2 + 3.5  +5/28/96+   -     + strategy DE/rand/2 incl.  +  Storn **
**  1 + 3.6  +8/06/96+ K.Price + Binomial Crossover added  +  Storn **
**  2 + 3.6  +9/30/96+ K.Price + cost variance output      +  Storn **
**  3 + 3.6  +9/30/96+   -     + alternative to ASSIGND    +  Storn **
**  4 + 3.6  +10/1/96+   -    + variable checking inserted +  Storn **
**  5 + 3.6  +10/1/96+   -     + strategy indic. improved  +  Storn **
**                                                                  **
***H*O*C*E***********************************************************/

#include <stdio.h>
#include <stdlib.h>
#include <math.h>
#include <string.h>

#include <gsl/gsl_rng.h>
#include "de.h"

#define assignd(l,a,b) memcpy((a),(b),l)

double c[MAXPOP][MAXDIM], d[MAXPOP][MAXDIM];
double (*pold)[MAXPOP][MAXDIM], 
  (*pnew)[MAXPOP][MAXDIM], (*pswap)[MAXPOP][MAXDIM];

extern gsl_rng *gsl_rng_r;
extern double evaluate (int, double [], long *); /* obj. funct. */

void de36 (const int strategy, const int genmax, const int D,
	   const int NP, const double inibound_h, const double inibound_l,
	   const double F, const double CR, 
	   double *best, double *xminf)
{
  int   i, j, L, n;      /* counting variables                 */
  int   r1, r2, r3, r4;  /* placeholders for random indexes    */
  int   r5;              /* placeholders for random indexes    */
#if 0
  int   D;               /* Dimension of parameter vector      */
  int   NP;              /* number of population members       */
  int   refresh;         /* refresh rate of screen output      */
  int   strategy;        /* choice parameter for screen output */
  int   genmax, seed;   
  double inibound_h;      /* upper parameter bound              */
  double inibound_l;      /* lower parameter bound              */
  double F,CR;            /* control variables of DE            */
#endif
  
  int   imin;            /* index to member with lowest energy */
  int   gen;
  long  nfeval;          /* number of function evaluations     */
  
  double trial_cost;      /* buffer variable                    */
  double tmp[MAXDIM],/* best[MAXDIM],*/ bestit[MAXDIM]; /* members  */
  double cost[MAXPOP];    /* obj. funct. values                 */
  double cvar;            /* computes the cost variance         */
  double cmean;           /* mean cost                          */
  double cmin;            /* help variables                     */
  
  /*------Initializations----------------------------*/
  
  /*-----Checking input variables for proper range--------------*/

  if (D > MAXDIM) {
    printf("\nError! D=%d > MAXDIM=%d\n",D,MAXDIM);
    exit(1);
  }
  if (D <= 0) {
    printf("\nError! D=%d, should be > 0\n",D);
    exit(1);
  }
  if (NP > MAXPOP) {
    printf("\nError! NP=%d > MAXPOP=%d\n",NP,MAXPOP);
    exit(1);
  }
  if (NP <= 0) {
    printf("\nError! NP=%d, should be > 0\n",NP);
    exit(1);
  }
  if ((CR < 0) || (CR > 1.0)) {
    printf("\nError! CR=%f, should be ex [0,1]\n",CR);
    exit(1);
  }
  if (genmax <= 0) {
    printf("\nError! genmax=%d, should be > 0\n",genmax);
    exit(1);
  }
  if ((strategy < 0) || (strategy > 10)) {
    printf("\nError! strategy=%d, should be ex {1,2,3,4,5,6,7,8,9,10}\n",strategy);
    exit(1);
  }
  if (inibound_h < inibound_l) {
    printf("\nError! inibound_h=%f < inibound_l=%f\n",inibound_h, inibound_l);
    exit(1);
  }

/*-----Initialize random number generator-----------------------------*/

  nfeval       =  0;  /* reset number of function evaluations */

/*------Initialization------------------------------------------------*/
/*------Right now this part is kept fairly simple and just generates--*/
/*------random numbers in the range [-initfac, +initfac]. You might---*/
/*------want to extend the init part such that you can initialize-----*/
/*------each parameter separately.------------------------------------*/

  for (i=0; i<NP; i++) {
    for (j=0; j<D; j++) { /* spread initial population members */
      c[i][j] = inibound_l + gsl_rng_uniform (gsl_rng_r) * 
	(inibound_h - inibound_l);
    }
    cost[i] = evaluate (D,c[i],&nfeval); /* obj. funct. value */
  }
  cmin = cost[0];
  imin = 0;
  for (i=1; i<NP; i++) {
    if (cost[i]<cmin) {
      cmin = cost[i];
      imin = i;
    }
  }

  assignd(D,best,c[imin]);            /* save best member ever          */
  assignd(D,bestit,c[imin]);          /* save best member of generation */
  
  pold = &c; /* old population (generation G)   */
  pnew = &d; /* new population (generation G+1) */
  
  /*=======================================================================*/
  /*=========Iteration loop================================================*/
  /*=======================================================================*/
  
  gen = 0;                          /* generation counter reset */
  while ((gen < genmax) /*&& (kbhit() == 0)*/) {
    /* remove comments if conio.h */
    /* is accepted by compiler    */
    gen++;
    imin = 0;
    
    for (i=0; i<NP; i++) {       /* Start of loop through ensemble  */
      do {
	/* Pick a random population member */
	/* Endless loop for NP < 2 !!!     */
	r1 = (int)(gsl_rng_uniform (gsl_rng_r)*NP);
      }while(r1==i);            

      do {                       /* Pick a random population member */
	                          /* Endless loop for NP < 3 !!!     */
	r2 = (int)(gsl_rng_uniform (gsl_rng_r)*NP);
      }while((r2==i) || (r2==r1));
      
      do {                       /* Pick a random population member */
	/* Endless loop for NP < 4 !!!     */
	r3 = (int)(gsl_rng_uniform (gsl_rng_r)*NP);
      } while((r3==i) || (r3==r1) || (r3==r2));
      
      do {                        /* Pick a random population member */
	                          /* Endless loop for NP < 5 !!!     */
	r4 = (int)(gsl_rng_uniform (gsl_rng_r)*NP);
      } while((r4==i) || (r4==r1) || (r4==r2) || (r4==r3));

      do {                       /* Pick a random population member */
	                         /* Endless loop for NP < 6 !!!     */
	r5 = (int)(gsl_rng_uniform (gsl_rng_r)*NP);
      } while((r5==i) || (r5==r1) || (r5==r2) || (r5==r3) || (r5==r4));


/*=======Choice of strategy===============================================================*/
/*=======We have tried to come up with a sensible naming-convention: DE/x/y/z=============*/
/*=======DE :  stands for Differential Evolution==========================================*/
/*=======x  :  a string which denotes the vector to be perturbed==========================*/
/*=======y  :  number of difference vectors taken for perturbation of x===================*/
/*=======z  :  crossover method (exp = exponential, bin = binomial)=======================*/
/*                                                                                        */
/*=======There are some simple rules which are worth following:===========================*/
/*=======1)  F is usually between 0.5 and 1 (in rare cases > 1)===========================*/
/*=======2)  CR is between 0 and 1 with 0., 0.3, 0.7 and 1. being worth to be tried first=*/
/*=======3)  To start off NP = 10*D is a reasonable choice. Increase NP if misconvergence=*/
/*           happens.                                                                     */
/*=======4)  If you increase NP, F usually has to be decreased============================*/
/*=======5)  When the DE/best... schemes fail DE/rand... usually works and vice versa=====*/


/*=======EXPONENTIAL CROSSOVER============================================================*/

/*-------DE/best/1/exp--------------------------------------------------------------------*/
/*-------Our oldest strategy but still not bad. However, we have found several------------*/
/*-------optimization problems where misconvergence occurs.-------------------------------*/
      if (strategy == 1) { /* strategy DE0 (not in our paper) */
	assignd(D,tmp,(*pold)[i]);
	n = (int)(gsl_rng_uniform (gsl_rng_r)*D);
	L = 0;
	do {                       
	  tmp[n] = bestit[n] + F*((*pold)[r2][n]-(*pold)[r3][n]);
	  n = (n+1)%D;
	  L++;
	}while((gsl_rng_uniform (gsl_rng_r) < CR) && (L < D));
      }
/*-------DE/rand/1/exp-------------------------------------------------------------------*/
/*-------This is one of my favourite strategies. It works especially well when the-------*/
/*-------"bestit[]"-schemes experience misconvergence. Try e.g. F=0.7 and CR=0.5---------*/
/*-------as a first guess.---------------------------------------------------------------*/
      else if (strategy == 2) { /* strategy DE1 in the techreport */
	assignd(D,tmp,(*pold)[i]);
	n = (int)(gsl_rng_uniform (gsl_rng_r)*D);
	L = 0;
	do {                       
	  tmp[n] = (*pold)[r1][n] + F*((*pold)[r2][n]-(*pold)[r3][n]);
	  n = (n+1)%D;
	  L++;
	} while((gsl_rng_uniform (gsl_rng_r) < CR) && (L < D));
      }
/*-------DE/rand-to-best/1/exp-----------------------------------------------------------*/
/*-------This strategy seems to be one of the best strategies. Try F=0.85 and CR=1.------*/
/*-------If you get misconvergence try to increase NP. If this doesn't help you----------*/
/*-------should play around with all three control variables.----------------------------*/
      else if (strategy == 3) {/* similiar to DE2 but generally better */
	assignd(D,tmp,(*pold)[i]);
	n = (int)(gsl_rng_uniform (gsl_rng_r)*D); 
	L = 0;
	do {                       
	  tmp[n] = tmp[n] + F*(bestit[n] - tmp[n]) + F*((*pold)[r1][n]-(*pold)[r2][n]);
	  n = (n+1)%D;
	  L++;
	}while((gsl_rng_uniform (gsl_rng_r) < CR) && (L < D));
      }
/*-------DE/best/2/exp is another powerful strategy worth trying--------------------------*/
      else if (strategy == 4) { 
	assignd(D,tmp,(*pold)[i]);
	n = (int)(gsl_rng_uniform (gsl_rng_r)*D); 
	L = 0;
	do {                           
	  tmp[n] = bestit[n] + 
	    ((*pold)[r1][n]+(*pold)[r2][n]-(*pold)[r3][n]-(*pold)[r4][n])*F;
	  n = (n+1)%D;
	  L++;
	}while((gsl_rng_uniform (gsl_rng_r) < CR) && (L < D));
      }
/*-------DE/rand/2/exp seems to be a robust optimizer for many functions-------------------*/
      else if (strategy == 5) { 
	assignd(D,tmp,(*pold)[i]);
	n = (int)(gsl_rng_uniform (gsl_rng_r)*D); 
	L = 0;
	do {                           
	  tmp[n] = (*pold)[r5][n] + 
	    ((*pold)[r1][n]+(*pold)[r2][n]-(*pold)[r3][n]-(*pold)[r4][n])*F;
	  n = (n+1)%D;
	  L++;
	}while((gsl_rng_uniform (gsl_rng_r) < CR) && (L < D));
      }

/*=======Essentially same strategies but BINOMIAL CROSSOVER===============================*/

/*-------DE/best/1/bin--------------------------------------------------------------------*/
      else if (strategy == 6) {
	assignd(D,tmp,(*pold)[i]);
	n = (int)(gsl_rng_uniform (gsl_rng_r)*D); 
	for (L=0; L<D; L++) { /* perform D binomial trials */
	  if ((gsl_rng_uniform (gsl_rng_r) < CR) || L == (D-1)) {
	    /* change at least one parameter */
	    tmp[n] = bestit[n] + F*((*pold)[r2][n]-(*pold)[r3][n]);
	  }
	  n = (n+1)%D;
	}
      }
/*-------DE/rand/1/bin-------------------------------------------------------------------*/
      else if (strategy == 7) {
	assignd(D,tmp,(*pold)[i]);
	n = (int)(gsl_rng_uniform (gsl_rng_r)*D); 
	for (L=0; L<D; L++) { /* perform D binomial trials */
	  if ((gsl_rng_uniform (gsl_rng_r) < CR) || L == (D-1)) {
	    /* change at least one parameter */
	    tmp[n] = (*pold)[r1][n] + F*((*pold)[r2][n]-(*pold)[r3][n]);
	  }
	  n = (n+1)%D;
	}
      }
      /*-------DE/rand-to-best/1/bin-----------------------------------------------------------*/
	 else if (strategy == 8) { 
	   assignd(D,tmp,(*pold)[i]);
	   n = (int)(gsl_rng_uniform (gsl_rng_r)*D); 
           for (L=0; L<D; L++) { /* perform D binomial trials */
	     if ((gsl_rng_uniform (gsl_rng_r) < CR) || L == (D-1)) {
	       /* change at least one parameter */
	       tmp[n] = tmp[n] + F*(bestit[n] - tmp[n]) + F*((*pold)[r1][n]-(*pold)[r2][n]);
	     }
	     n = (n+1)%D;
           }
	 }
      /*-------DE/best/2/bin--------------------------------------------------------------------*/
	 else if (strategy == 9) { 
	   assignd(D,tmp,(*pold)[i]);
	   n = (int)(gsl_rng_uniform (gsl_rng_r)*D); 
           for (L=0; L<D; L++) { /* perform D binomial trials */
	     if ((gsl_rng_uniform (gsl_rng_r) < CR) || L == (D-1)) {
	       /* change at least one parameter */
	       tmp[n] = bestit[n] + 
		 ((*pold)[r1][n]+(*pold)[r2][n]-(*pold)[r3][n]-(*pold)[r4][n])*F;
	     }
	     n = (n+1)%D;
           }
	 }
      /*-------DE/rand/2/bin--------------------------------------------------------------------*/
	 else { 
	   assignd(D,tmp,(*pold)[i]);
	   n = (int)(gsl_rng_uniform (gsl_rng_r)*D); 
           for (L=0; L<D; L++) { /* perform D binomial trials */
	     if ((gsl_rng_uniform (gsl_rng_r) < CR) || L == (D-1)) {
	       /* change at least one parameter */
	       tmp[n] = (*pold)[r5][n] + 
		 ((*pold)[r1][n]+(*pold)[r2][n]-(*pold)[r3][n]-(*pold)[r4][n])*F;
	     }
	     n = (n+1)%D;
           }
	 }

/*=======Trial mutation now in tmp[]. Test how good this choice really was.==================*/

      trial_cost = evaluate(D,tmp,&nfeval);  /* Evaluate new vector in tmp[] */

      if (trial_cost <= cost[i]) {  /* improved objective function value ? */
	cost[i]=trial_cost;         
	assignd(D,(*pnew)[i],tmp);
	if (trial_cost<cmin) {          /* Was this a new minimum? */
	                                /* if so...*/
	  cmin=trial_cost;           /* reset cmin to new low...*/
	  imin=i;
	  assignd(D,best,tmp);           
	}                           
      } else {
	assignd(D,(*pnew)[i],(*pold)[i]); /* replace target with old value */
      }
    }   /* End mutation loop through pop. */
					   
    assignd(D,bestit,best);  /* Save best population member of current iteration */
    
    /* swap population arrays. New generation becomes old one */
    
    pswap = pold;
    pold  = pnew;
    pnew  = pswap;
    
/*----Compute the energy variance (just for monitoring purposes)-----------*/
    
    cmean = 0.;          /* compute the mean value first */
    for (j=0; j<NP; j++) {
      cmean += cost[j];
    }
    cmean = cmean/NP;

    cvar = 0.;           /* now the variance              */
    for (j=0; j<NP; j++) {
      cvar += (cost[j] - cmean)*(cost[j] - cmean);
    }
    cvar = cvar/(NP-1);
  }

  *xminf = cmin;
}






