#
# 4bras.Steyvers-etal.fct.R
#
# Une fonction pour faire des expériences avec 4 bras, reproduisant le
# protocole de Steyvers et al, A Bayesian analysis of Human
# Decision-Making on Bandit Problems.
#
#
# Déviations par rapport au papier :
#   les proba de succès des bras sont tirés selon une Beta (7, 7)
#      plutôt qu'une Beta (2, 2) afin d'éviter les trop petites et
#      les trop grandes valeurs.
#   20 trials / game au lieu de 15
#
# philippe.preux@lifl.fr
# Sep. 2012
# extensions: Oct. 2013
#
# le fichier log contient une ligne par clic :
## numéro du jeu
## numéro du coup/trial
## époque du clic (temps Unix)
## nb secondes depuis début de ce jeu
## 0/1/3/4 : choix
## proba seuil
## 0/1: retour immédiat
## cumul des retours
## les 4 proba de succès 
#
# Beta.1000.7.7 <- rbeta (1000, 7, 7)
# write (Beta.1000.7.7, file = "1000.Beta.7.7")
#
#
# This code is written in such a way that the experiments may be
# reproduced.  In particular, the probabilities of success are logged
# so that they may be replayed to make several experiments with the
# same probabilities, or play algorithms in the exact same bandit
# setting. (However, logged values are rounded to a few digits; I
# think this is enough to consider the setting being equivalent.)
#
# This file contains the function that does the job.
# It is meant to be called with appropriate parameters.
#
# Bugs to fix:
#  There might be issues when doing more than 20 games or more than 20 trials per game. (not enough beta, ...)
#
#
# Copyright 2012 Philippe Preux
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.
# 

session.Steyvers.et.al <- function (nbPbs = 20, maxNbClics = 15,
                                    dist = NULL, affiche.info.echecs = T,
                                    affiche.info.succes = T,
                                    recharge.proba.si.dispo = F)
  {
    stopifnot (maxNbClics %in%  c (10, 15, 20, 30, 60))
    fichier.probas <- "http://www.grappa.univ-lille3.fr/~ppreux/ensg/aeac/tps/bandits/80.Beta.7.7"
# fichier.probas <- "~/public_html/ensg/aeac/tps/bandits/80.Beta.7.7"

    #
    #if (length (maxNbClics) == 1)
    #  maxNbClics <- rep (maxNbClics, nbPbs)
    #else if (length (maxNbClics) < nbPbs)
    #  maxNbCLics <- rep (maxNbClics, cveil (nbPbs / length (maxNbClics)))
    #
    
    # quelques variables pour que l'affichage soit joli
    misc.step <- 1
    if (maxNbClics == 10) misc.delta.y <- delta.y <- .06
    if (maxNbClics == 15) misc.delta.y <- delta.y <- .04
    if (maxNbClics == 20) misc.delta.y <- delta.y <- .03
    if (maxNbClics == 30) misc.delta.y <- delta.y <- .02
    if (maxNbClics == 60) {
      delta.y <- .02
      misc.step <- 2
      misc.delta.y <- .01
    }
    
    username <- system ("logname", intern = T)
    hostname <- system ("hostname", intern = T)
    groupnamelist <- system ("groups", intern = T)
    if (grepl ("mime", groupnamelist)) {
        groupname <- "mime"
        rootname <- "/public/partage/mime/msc/preux"
    } else {
        groupname <- "psycho"
        rootname <- "/public/partage/psycho/aeac/preux"
    }
    proba.fichier <- nomFichierPublic <- ""

    if (fichierPublicExiste <- file.exists (rootname)) {
        rootname2 <- paste (rootname, "/4bS.res", sep = "")
        if (! affiche.info.echecs || ! affiche.info.succes ||
            recharge.proba.si.dispo) {
            nomFichierPublic <- paste (rootname2,
                                       username, hostname, affiche.info.echecs,
                                       affiche.info.succes,
                                       recharge.proba.si.dispo,
                                       "txt", sep = ".")
        } else {
            nomFichierPublic <- paste (rootname2, username,
                                       hostname, "txt", sep = ".")
        }
    }
    
    if (! affiche.info.echecs || ! affiche.info.succes ||
        recharge.proba.si.dispo) {
      if (recharge.proba.si.dispo)
        proba.fichier <- paste ("4bS.res", username, hostname, "txt", sep = ".")
      nomFichierLocal <- paste ("4bS.res",
                                 username, hostname, affiche.info.echecs,
                                 affiche.info.succes, recharge.proba.si.dispo,
                                 "txt", sep = ".")
    } else {
      nomFichierLocal <- paste ("4bS.res", username, hostname, "txt", sep = ".")
    }
    
    logger <- function (str)
      {
        cat (str, file = nomFichierLocal, append = T)
        if (fichierPublicExiste)
          cat (str, file = nomFichierPublic, append = T)
      }
    
    # date au format époque Unix
    epoch <- function ()
      {
        as.numeric (Sys.time())
      }

    logger ("# new session\n")
    logger (paste ("# affiche.info.echecs ==", affiche.info.echecs))
    
    if (is.null (dist)) {
      if (recharge.proba.si.dispo) {
#        print ("recharge if possible")
        if (file.exists (proba.fichier)) {
          fichier.local.df <- read.table (proba.fichier)
          les.proba <- fichier.local.df [seq (1, nrow (fichier.local.df),
                                              by = maxNbClics), 9:12]
          les.seuil <- fichier.local.df [, 6]
          les.premiers <- 1:nbPbs
          recharge <- T
#          print ("recharge ok")
        } else {
          les.proba <- matrix (scan (file = fichier.probas, what = double (),
                                     quiet = T),
                               ncol = 4, byrow = T)
          les.seuil <- runif (nbPbs * maxNbClics)
          les.premiers <- sample.int (nbPbs, size = nbPbs)
          recharge <- F
#          print ("recharge pas ok")
        }
      } else {
        les.proba <- matrix (scan (file = fichier.probas, what = double (),
                                   quiet = T),
                             ncol = 4, byrow = T)
        les.seuil <- runif (nbPbs * maxNbClics)
        les.premiers <- sample.int (nbPbs, size = nbPbs)
        recharge <- F
#        print ("recharge pas ok")
      }
      logger ("# Beta (7, 7)\n")
    }
    # else ...

    # pour que tout le monde ait la même séquence de nombres pseudo-aléatoires
    set.seed (23071966)

    indice <- 1
    for (pb in 1:nbPbs) {
      within <- function (x, a, b)
        {
          if (x < a) return (F)
          return (x < b)
        }

      compteurClics <- rep (0, 4)
      nbSucces <- rep (0, 4)
      nbPoints <- 0

      probaSucces <- les.proba [les.premiers [pb], ]

#      print (probaSucces)
      
      plot.window (xlim = c(0,1), ylim = c(0,1))
      plot.new ()
      rect (c (.01, .26, .51, .76), .01,
            c (.24, .49, .74, .99), .1, col = "grey", border="grey")
      text (c (.13, .38, .63, .88), .05, paste ("Choix ", 1:4), col = "black")

      if (affiche.info.echecs) {
        rect (c (.05, .3, .55, .8), .15, c (.2, .45, .7, .95), .75)
        
        text (.03, seq (.15, .75, by = delta.y),
              as.character (seq (0, maxNbClics, by = misc.step)), cex = .5)
        text (.28, seq (.15, .75, by = delta.y),
              as.character (seq (0, maxNbClics, by = misc.step)), cex = .5)
        text (.53, seq (.15, .75, by = delta.y),
              as.character (seq (0, maxNbClics, by = misc.step)), cex = .5)
        text (.78, seq (.15, .75, by = delta.y),
              as.character (seq (0, maxNbClics, by = misc.step)), cex = .5)
      
        for (x in c (.05, .3, .55, .8))
          for (y in seq (.15, .75, by = delta.y))
            lines (c (x, x + .15), c (y, y), lty = 3)
      }
      affichage.divers <- function (nbPoints, trial, maxNbClics, pb,
                                    nbPbs, nbSucces, compteurClics)
        {
          rect (.0, .9, 1, 1, col = "white", border= "white")
          if (nbPoints < 2)
            text (.1, .95, paste (nbPoints, "point"), font = 2)
          else
            text (.1, .95, paste (nbPoints, "points"), font = 2)

          text (.5, .95, paste ("Essai", as.character (trial),
                                "sur", as.character (maxNbClics)))
          text (.8, .95, paste ("Jeu", as.character (pb),
                                "sur", as.character (nbPbs)))
          if (affiche.info.echecs) {
            les.ratio <- nbSucces / compteurClics
            rect (0, .78, 1, .85, col = "white", border = "white")

            for (i in 1:4) {
              text (c (.1, .35, .6, .85) [i], .8,
                    paste ("Ratio :",
                           ifelse (is.nan (les.ratio [i]), "--",
                                   format (les.ratio [i], digits = 2))))
            }
          }
#          text (c (.07, .32, .57, .82), .8,
#                paste ("Ratio :", les.ratio), adj = .5)

          if (affiche.info.succes) {
            rect (c (.08, .33, .58, .83), .15,
                c (.12, .37, .62, .87), .15 + nbSucces * misc.delta.y,
                col = "green", border = "green")
          }
          if (affiche.info.echecs) {
            rect (c (.14, .39, .64, .89), .15,
                  c (.18, .43, .68, .93),
                  .15 + (compteurClics - nbSucces) * misc.delta.y,
                  col = "red", border = "red")
          }
      }

      epoque.prev.clic.of.the.game <- as.numeric (epoch ())

      for (trial in 1:maxNbClics) {
        affichage.divers (nbPoints, trial,maxNbClics, pb,
                          nbPbs, nbSucces, compteurClics)

        repeat {
          clic <- locator (n = 1)
          if (within (clic$x, 0, 1) & within (clic$y, 0, .1)) break
        }
        epoque.numeric <- as.numeric (epoque <- epoch ())
        
        which.has.been.clicked <- floor (clic$x / .25) + 1
        if (which.has.been.clicked > 4) {
          which.has.been.clicked <- 4
        }
        
        compteurClics [which.has.been.clicked] <-
          compteurClics [which.has.been.clicked] + 1

        delta.t <- epoque.numeric - epoque.prev.clic.of.the.game
        epoque.prev.clic.of.the.game <- epoque.numeric

        logger (paste (as.character (pb), as.character (trial),
                       epoque,
                       as.character (delta.t),
                       as.character (which.has.been.clicked)))
        seuil <- les.seuil [indice] #runif (1)
#        print (paste ("seuil", seuil))
        logger (paste (" ", format (seuil, digits = 2), sep = ""))
        if (seuil < probaSucces [which.has.been.clicked]) {
          nbSucces [which.has.been.clicked] <-
            nbSucces [which.has.been.clicked] + 1
          nbPoints <- nbPoints + 1
          logger (" 1 ")
        } else {
          logger (" 0 ")
        }
        logger (paste (as.character (nbPoints), " ", sep = ""))
        logger (paste (as.character (round (probaSucces, 3))))
        logger ("\n")
        indice <- indice + 1
      }
      affichage.divers (nbPoints, trial,maxNbClics, pb,
                        nbPbs, nbSucces, compteurClics)
      rect (.25, .15, .75, .6, col = "grey")
      text (.5, .5, "Jeu terminé.", font = 2)
      text (.5, .4, "Cliquez dans le rectangle", font = 2)
      text (.5, .35, "gris pour continuer...", font = 2)
      repeat {
        clic <- locator (n = 1)
        if (within (clic$x, .25, .75) & within (clic$y, .15, .6)) break
      }
    }

    dev.off ()
    
    if (! fichierPublicExiste) {
      print ("L'expérience est terminée.")
      print (paste ("Merci d\'envoyer le fichier dénommé", nomFichierLocal,
                    "à philippe.preux@lifl.fr"))
    }
  }

four.bras.Steyvers.et.al.fct.loaded <- TRUE
