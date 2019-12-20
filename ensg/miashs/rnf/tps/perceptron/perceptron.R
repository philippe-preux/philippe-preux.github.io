# en 2D
#
use.jeu1 <- TRUE
# classe.a.separer <- "setosa"
# classe.a.separer <- "versicolor"
classe.a.separer <- "virginica"

if (use.jeu1 == TRUE) {
    jeu <- read.csv ("jeu1.csv", header=F)
    i.label <- ncol (jeu)
} else {
    jeu <- iris [, 3:5]
    i.label <- ncol (jeu)
    if (classe.a.separer == "setosa") {
        jeu [, i.label] <- c (rep (-1, 50), rep (1, 100))
    }
    if (classe.a.separer == "versicolor") {
        jeu [, i.label] <- c (rep (1, 50), rep (-1, 50), rep (1, 50))
    }
    if (classe.a.separer == "virginica") {
        jeu [, i.label] <- c (rep (1, 100), rep (-1, 50))
    }
}

P <- 2
for (i in 1:P)
    jeu [, i] <- (jeu [, i] - min (jeu [, i])) / (max (jeu [, i]) - min (jeu [, i]))

N <- nrow (jeu)
w <- runif (P + 1, min = -1, max = 1)
w.prev <- w - 1
l <- c ()
E <- 1 # pour entrer dans la boucle
i <- 1
N.iterations <- 1000
seuil <- .00001
while ((i < N.iterations) & (abs (sum (w - w.prev)) > seuil)) {
    w.prev <- w
    E <- 0
    alpha <- 1 / sqrt (i)
    permutation <- sample.int (N)
#    ee <- c ()
#    png (paste (i, ".png", sep = ""))
    for (j in permutation) {
        x <- c (1, as.numeric (jeu [j, 1:2]))
        e <- jeu [j, i.label] - sign (sum (w * x))
#        ee <- append (ee, e)
        E <- E + abs (e)
        w <- w + alpha * e * x
#        abline (b = - w [2] / w [3], a = - w [1] / w [3], col = "grey")
    }
    l <- append (l, E / 2)
#    mal.predit <- ee != 0
#    plot (jeu [, 1], jeu [, 2], pch = ifelse (mal.predit, 19, 22),
    plot (jeu [, 1], jeu [, 2], pch = 19,
          main = paste ("Séparatrice après", i,
              ifelse (i == 1, "itération", "itérations")),
          xlab = "x", ylab = "y",
          col = ifelse (jeu [, 3] == 1, "red", "green"))
    abline (b = - w [2] / w [3], a = - w [1] / w [3])
#    dev.off ()
    i <- i + 1
}
print (paste (E, "erreur(s) après", i - 1, "itérations."))
