classe.a.separer <- "setosa"
# classe.a.separer <- "versicolor"
# classe.a.separer <- "virginica"

jeu <- iris
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

P <- 4

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
    for (j in 1:N) {
        x <- c (1, as.numeric (jeu [permutation [j], 1:P]))
        e <- jeu [permutation [j], i.label] - sign (sum (w * x))
        E <- E + abs (e)
        w <- w + alpha * e * x
    }
    l <- append (l, E / 2)
    i <- i + 1
}
print (paste (E, "erreur(s) après", i - 1, "itérations."))
