#
# laby.R
#
# Un programme pour faire des expériences dans un labyrinthe.
#
#
#
# philippe.preux@lifl.fr
# Nov. 2012
#
# le fichier log contient une ligne par clic :
## numéro de l'épisode
## numéro du mouvement
## époque du clic (temps Unix)
## nb secondes depuis début de ce jeu
## position x
## position y
## mouvement
## 1 = sortie atteinte ; 0 sinon
#
#
# Copyright 2012, 2013, 2014 Philippe Preux
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

session.laby <- function (nbEpisodes = 20, dureeMaxEpisode = 200)
  {
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
        rootname2 <- paste (rootname, "/laby4.", sep = "")
        nomFichierPublic <- paste (rootname2, username,
                                   hostname, "txt", sep = ".")
    }

    nomFichierLocal <- paste ("laby4", username, hostname, "txt", sep = ".")
    
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
    
    # pour que tout le monde ait la même séquence de nombres pseudo-aléatoires
    set.seed (23071966)

    plot.window (xlim = c(0,1), ylim = c(0,1))

    affichage <- function (Laby, pos)
      {
        plot.new ()
        mvt.autorises <- rep (FALSE, 4)
        rect (.4, .4, .6, .6, col = "red", border = "red")
        if (Laby [pos [1], pos [2] - 1]) {
          rect (.2, .4, .4, .6, border = "green", lwd = 2)
          rect (.05, .65, .15, .45, lwd = 2)
          text (.1, .55, "<-")
          mvt.autorises [1] <- TRUE
        }
        if (Laby [pos [1], pos [2] + 1]) {
          if (all (pos == c (12, 10))) { ###################
#          if (all (pos == c (2, 6))) {
            rect (.6, .4, .8, .6, col = "magenta", lwd = 2)
          } else {
            rect (.6, .4, .8, .6, border = "green", lwd = 2)
          }
          rect (.85, .65, .95, .45, lwd = 2)
          text (.9, .55, "->")
          mvt.autorises [2] <- TRUE
        }
        if (Laby [pos [1] + 1, pos [2]]) {
          rect (.4, .2, .6, .4, border = "green", lwd = 2)
          rect (.45, .15, .65, .05, lwd = 2)
          text (.55, .1, "|\nv")
          mvt.autorises [4] <- TRUE
        }
        if (Laby [pos [1] - 1, pos [2]]) {
          rect (.4, .6, .6, .8, border = "green", lwd = 2)
          rect (.45, .95, .65, .85, lwd = 2)
          text (.55, .9, "^\n|")
          mvt.autorises [3] <- TRUE
        }
        return (mvt.autorises)
      }

    ## 1st laby
    ## Laby <- matrix (c (F, F, F, F, F, F, F,
    ##                    F, T, T, T, T, T, F,
    ##                    F, T, F, T, F, T, F,
    ##                    F, T, F, F, F, T, F,
    ##                    F, T, T, T, T, F, F,
    ##                    F, T, F, T, F, T, F,
    ##                    F, F, F, T, F, T, F,
    ##                    F, T, T, T, T, T, T,
    ##                    F, F, F, F, F, F, F), nrow = 9, ncol = 7, byrow = T)

    ## 2nd Laby (2012)
    ## Laby <- matrix (c (F, F, F, F, F, F, F,
    ##                    F, T, T, T, F, T, T,
    ##                    F, F, F, T, F, T, F,
    ##                    F, T, T, T, F, T, F,
    ##                    F, F, T, F, F, T, F,
    ##                    F, T, T, F, T, T, F,
    ##                    F, T, F, F, T, F, F,
    ##                    F, T, T, T, T, T, F,
    ##                    F, F, F, F, F, F, F), nrow = 9, ncol = 7, byrow = T)
    ## numero.case <- matrix (c (0, 0, 0, 0, 0, 0, 0,
    ##                    0,  1,  2,  3,  0,  4, 5,
    ##                    0,  0,  0,  6,  0,  7, 0,
    ##                    0,  8,  9, 10,  0, 11, 0,
    ##                    0,  0, 12,  0,  0, 13, 0,
    ##                    0, 14, 15,  0, 16, 17, 0,
    ##                    0, 18,  0,  0, 19,  0, 0,
    ##                    0, 20, 21, 22, 23, 24, 0,
    ##                    0, 0, 0, 0, 0, 0, 0), nrow = 9, ncol = 7, byrow = T)
    ## m.distance.a.la.sortie <- matrix (c (NA, NA, NA, NA, NA, NA, NA,
    ##                                    NA, 21, 20, 19, NA,  1, 0,
    ##                                    NA, NA, NA, 18, NA,  2, NA,
    ##                                    NA, 17, 16, 17, NA,  3, NA,
    ##                                    NA, NA, 15, NA, NA,  4, NA,
    ##                                    NA, 13, 14, NA,  6,  5, NA,
    ##                                    NA, 12, NA, NA,  7, NA, NA,
    ##                                    NA, 11, 10,  9,  8,  9, NA,
    ##                                    NA, NA, NA, NA, NA, NA, NA),
    ##                                 nrow = 9, ncol = 7, byrow = T)

    ## 3rd laby (2013)
    ## Laby <- matrix (c (F, F, F, F, F, F, F,
    ##                    F, T, T, T, T, T, F,
    ##                    F, T, F, F, T, F, F,
    ##                    F, T, T, T, T, T, F,
    ##                    F, F, T, F, F, F, F,
    ##                    F, T, T, T, T, T, F,
    ##                    F, T, F, F, F, T, F,
    ##                    F, T, T, T, F, T, T,
    ##                    F, F, F, F, F, F, F), nrow = 9, ncol = 7, byrow = T)
    ## numero.case <- matrix (c (0, 0, 0, 0, 0, 0, 0,
    ##                    0,  1,  2,  3,  4,  5, 0,
    ##                    0,  6,  0,  0,  7,  0, 0,
    ##                    0,  8,  9, 10, 11, 12, 0,
    ##                    0,  0, 13,  0,  0,  0, 0,
    ##                    0, 14, 15, 16, 17, 18, 0,
    ##                    0, 19,  0,  0,  0, 20, 0,
    ##                    0, 21, 22, 23,  0, 24, 25,
    ##                    0, 0, 0, 0, 0, 0, 0), nrow = 9, ncol = 7, byrow = T)
    ## m.distance.a.la.sortie <- matrix (c (NA, NA, NA, NA, NA, NA, NA,
    ##                                    NA, 11, 12, 13, 12, 13, NA,
    ##                                    NA, 10, NA, NA, 11, NA, NA,
    ##                                    NA,  9,  8,  9, 10, 11, NA,
    ##                                    NA, NA,  7, NA, NA, NA, NA,
    ##                                    NA,  7,  6,  5,  4,  3, NA,
    ##                                    NA,  8, NA, NA, NA,  2, NA,
    ##                                    NA,  9, 10, 11, NA,  1,  0,
    ##                                    NA, NA, NA, NA, NA, NA, NA),
    ##                                 nrow = 9, ncol = 7, byrow = T)
    ## distance.a.la.sortie <- numeric (24)
    ## for (i in 1:9)
    ##   for (j in 1:7)
    ##     if (numero.case [i, j] != 0)
    ##       distance.a.la.sortie [numero.case [i, j]] <- m.distance.a.la.sortie [i,j]
    
    ## laby 4
    Laby <- matrix (c (F, F, F, F, F, F, F, F, F, F, F,
                       F, T, T, T, T, T, T, T, T, T, F,
                       F, T, F, F, F, F, T, F, F, T, F,
                       F, T, T, T, T, F, T, T, F, T, F,
                       F, F, T, F, T, F, T, F, F, T, F,
                       F, T, T, T, T, T, T, F, T, T, F,
                       F, T, F, F, F, F, F, T, T, F, F,
                       F, T, F, T, F, T, F, T, F, T, F,
                       F, T, F, T, T, T, F, T, T, T, F,
                       F, T, T, T, F, T, F, T, F, T, F,
                       F, T, F, T, F, T, F, T, F, T, F,
                       F, T, F, T, T, T, F, T, F, T, T,
                       F, F, F, F, F, F, F, F, F, F, F),
                    nrow = 13, ncol = 11, byrow = T)
    numero.case <- matrix (c (0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,
                              0,  1,  2,  3,  4,  5,  6,  7,  8,  9,  0,
                              0, 10,  0,  0,  0,  0, 11,  0,  0, 12,  0,
                              0, 13, 14, 15, 16,  0, 17, 18,  0, 19,  0,
                              0,  0, 20,  0, 21,  0, 22,  0,  0, 23,  0,
                              0, 24, 25, 26, 27, 28, 29,  0, 30, 31,  0,
                              0, 32,  0,  0,  0,  0,  0, 33, 34,  0,  0,
                              0, 35,  0, 36,  0, 37,  0, 38,  0, 39,  0,
                              0, 40,  0, 41, 42, 43,  0, 44, 45, 46,  0,
                              0, 47, 48, 49,  0, 50,  0, 51,  0, 52,  0,
                              0, 53,  0, 54,  0, 55,  0, 56,  0, 57,  0,
                              0, 58,  0, 59, 60, 61,  0, 62,  0, 63, 64,
                              0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
                           nrow = 13, ncol = 11, byrow = T)
    m.distance.a.la.sortie <- matrix (c (
        NA, NA, NA, NA, NA, NA, NA, NA, NA, NA, NA,
        NA, 23, 22, 21, 20, 19, 18, 17, 16, 15, NA,
        NA, 24, NA, NA, NA, NA, 19, NA, NA, 14, NA,
        NA, 25, 26, 27, 26, NA, 20, 21, NA, 13, NA,
        NA, NA, 27, NA, 25, NA, 21, NA, NA, 12, NA,
        NA, 27, 26, 25, 24, 23, 22, NA, 10, 11, NA,
        NA, 28, NA, NA, NA, NA, NA,  8,  9, NA, NA,
        NA, 29, NA, 35, NA, 37, NA,  7, NA,  5, NA,
        NA, 30, NA, 34, 35, 36, NA,  6,  5,  4, NA,
        NA, 31, 32, 33, NA, 37, NA,  7, NA,  3, NA,
        NA, 32, NA, 34, NA, 38, NA,  8, NA,  2, NA,
        NA, 33, NA, 35, 36, 37, NA,  9, NA,  1,  0,
        NA, NA, NA, NA, NA, NA, NA, NA, NA, NA, NA),
                                      nrow = 13, ncol = 11, byrow = T)
    distance.a.la.sortie <- numeric (63)
    for (i in 1:13)
      for (j in 1:11)
        if (numero.case [i, j] != 0)
          distance.a.la.sortie [numero.case [i, j]] <-
              m.distance.a.la.sortie [i,j]

    within <- function (x, a, b)
      {
        if (x < a) return (F)
        return (x < b)
      }
    
    saisir.mvt <- function (mvt.autorises)
      {
        repeat {
          clic <- locator (n = 1)
          if (mvt.autorises [1] & within (clic$x, 0.05, .15) &
              within (clic$y, .45, .65))
            return (1) # gauche
          if (mvt.autorises [2] & within (clic$x, 0.85, .95) &
              within (clic$y, .45, .65))
            return (2) # droite
          if (mvt.autorises [3] & within (clic$x, 0.45, .65) &
              within (clic$y, .85, .95))
            return (3) # haut
          if (mvt.autorises [4] & within (clic$x, 0.45, .65) &
              within (clic$y, .05, .15))
            return (4) # bas
        }
      }
    
    for (episode in 1:nbEpisodes) {
      print (paste ("Épisode", episode))
      pos <- c (9, 5) # initial position
      pos.sortie <- c (12, 11)
      ### pos.sortie <- c (2, 7) ############ 
      epoque.debut.episode <- as.numeric (epoch ())
      for (t in 1:dureeMaxEpisode) {
        mvt.autorises <- affichage (Laby, pos)
        mvt <- saisir.mvt (mvt.autorises)
        epoque.saisie <- as.numeric (epoque <- epoch ())
        logger (paste (as.character (episode), as.character (t),
                       epoque,
                       as.character (epoque.saisie - epoque.debut.episode),
#                       as.character (pos [1]),
#                       as.character (pos [2]),
                       as.character (numero.case [pos [1], pos [2]]),
                       as.character (mvt)))
        if (mvt == 1) {
          pos [2] <- pos [2] - 1
        } else if (mvt == 2) {
          pos [2] <- pos [2] + 1
        } else if (mvt == 3) {
          pos [1] <- pos [1] - 1
        } else if (mvt == 4) {
          pos [1] <- pos [1] + 1
        }
        if (all (pos == pos.sortie)) {
          logger (" 1 1\n")
          break
        } else {
          logger (" 0 ")
          if (t == dureeMaxEpisode) {
            logger ("1\n")
          } else {
            logger ("0\n")
          }
        }
      }
      
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

    return (distance.a.la.sortie)
  }

if (system ("logname", intern = T) == "ppreux") {
  distance.a.la.sortie <- session.laby (2, 200)
} else {
  distance.a.la.sortie <- session.laby ()
}
