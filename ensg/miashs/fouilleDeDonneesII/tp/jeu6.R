# ----------------------------------------------------------------
# jeu2 = jeu1 + 3 attributs bruités faiblement
# kmeans marche bien
# les attributs pertinents sont les 2 premiers
#
jeu2.kmeans <- list()
for (k in 2:20)
  jeu2.kmeans [[k]] <- kmeans (jeu2, k, nstart = 30)

jeu2.intraclasse <- numeric (20)
for (k in 2:20)
  jeu2.intraclasse [k] <- sum (jeu2.kmeans [[k]]$withinss *
                               jeu2.kmeans [[k]]$size) / nrow (jeu2)
plot (2:20, jeu2.intraclasse [2:20])
plot (jeu2 [,1], jeu2 [,2], col = jeu2.kmeans [[5]]$cluster)

# ----------------------------------------------------------------
# jeu6 = jeu1 + 5 attributs égaux = 1:5 (numérotation des
#                   données de 1 à 5, ...)
# les deux premiers attributs sont délaissés par kmeans() pour
# ces 5 attributs.
# donc, si on fait un simple plot() des deux premiers attributs
# on voit les 5 groupes. Si on fait un kmeans(), on trouve
# d'autres groupes...
#
jeu6 <- read.table ("k-moyennes/jeu1.txt")
names(jeu6)[1] <- "a"
names(jeu6)[2] <- "b"
jeu6$c <- rep (1:5, 200)
jeu6$d <- rep (1:5, 200)
jeu6$e <- rep (1:5, 200)
jeu6$f <- rep (1:5, 200)
jeu6$g <- rep (1:5, 200)
jeu6$h <- rep (1:5, 200)

jeu6.kmeans <- list()
for (k in 2:20)
  jeu6.kmeans [[k]] <- kmeans (jeu6, k, nstart = 30)

jeu6.intraclasse <- numeric (20)
for (k in 2:20)
  jeu6.intraclasse [k] <- sum (jeu6.kmeans [[k]]$withinss *
                               jeu6.kmeans [[k]]$size) / nrow (jeu6)
plot (2:20, jeu6.intraclasse [2:20])
plot (jeu6 [,1], jeu6 [,2], col = jeu6.kmeans [[5]]$cluster)

# ----------------------------------------------------------------
# jeu10 : deux premiers attributs : 5 groupes
# kmeans() trouve en fait 3 groupes qui correspondent aux 5 autres attributs
# qui valent 1, 2, ou 3.
# l'inertie intraclasse sélectionne 3 groupes.
#
jeu10 <- read.table ("k-moyennes/jeu1.txt")
names(jeu10)[1] <- "a"
names(jeu10)[2] <- "b"
jeu10$a <- jeu10$a / 10
jeu10$b <- jeu10$b / 10
jeu10$c <- c (rep (1:3, 333), 1)
jeu10$d <- c (rep (1:3, 333), 1)
jeu10$e <- c (rep (1:3, 333), 1)
jeu10$f <- c (rep (1:3, 333), 1)
jeu10$g <- c (rep (1:3, 333), 1)
jeu10$h <- c (rep (1:3, 333), 1)

jeu10.kmeans <- list()
for (k in 2:20)
  jeu10.kmeans [[k]] <- kmeans (jeu10, k, nstart = 30)

jeu10.intraclasse <- numeric (20)
for (k in 2:20)
  jeu10.intraclasse [k] <- sum (jeu10.kmeans [[k]]$withinss *
                               jeu10.kmeans [[k]]$size) / nrow (jeu10)
plot (2:20, jeu10.intraclasse [2:20])
plot (jeu10 [,1], jeu10 [,2], col = jeu10.kmeans [[5]]$cluster)
plot (jeu10$c, col = jeu11.kmeans [[3]]$cluster)

# ----------------------------------------------------------------
# jeu11 = jeu10 où les 5 attributs sont bruités au lieu d'être = 1:3
# même comportement que pour jeu10 de kmeans()
jeu11 <- jeu10
names(jeu11)[1] <- "a"
names(jeu11)[2] <- "b"
jeu11$a <- jeu11$a / 10
jeu11$b <- jeu11$b / 10
jeu11$c <- runif (1000, min = 0.95, max = 1.05) + c (rep (1:3, 333), 1)
jeu11$d <- runif (1000, min = 0.95, max = 1.05) + c (rep (1:3, 333), 1)
jeu11$e <- runif (1000, min = 0.95, max = 1.05) + c (rep (1:3, 333), 1)
jeu11$f <- runif (1000, min = 0.95, max = 1.05) + c (rep (1:3, 333), 1)
jeu11$g <- runif (1000, min = 0.95, max = 1.05) + c (rep (1:3, 333), 1)
jeu11$h <- runif (1000, min = 0.95, max = 1.05) + c (rep (1:3, 333), 1)

jeu11.kmeans <- list()
for (k in 2:20)
  jeu11.kmeans [[k]] <- kmeans (jeu11, k, nstart = 30)

jeu11.intraclasse <- numeric (20)
for (k in 2:20)
  jeu11.intraclasse [k] <- sum (jeu11.kmeans [[k]]$withinss *
                               jeu11.kmeans [[k]]$size) / nrow (jeu11)
plot (2:20, jeu11.intraclasse [2:20])
plot (jeu11 [,1], jeu11 [,2], col = jeu11.kmeans [[5]]$cluster)
plot (jeu11$c, col = jeu11.kmeans [[3]]$cluster)

# ---------------------------------------------------------------
# jeu12 = jeu1 avec des outliers
jeu12 <- data.frame (a = c (jeu1 [, 1], seq (from = 6, to = 10, length = 40)),
                     b = c (jeu1 [, 2], seq (from = -5, to = -1, length = 40)))
jeu12.kmeans <- list()
for (k in 2:10)
  jeu12.kmeans [[k]] <- kmeans (jeu12, k, nstart = 30)

jeu12.intraclasse <- numeric (10)
for (k in 2:10)
  jeu12.intraclasse [k] <- sum (jeu12.kmeans [[k]]$withinss *
                               jeu12.kmeans [[k]]$size) / nrow (jeu12)
# l'intraclasse donne plutôt 6 groupes que 5
plot (2:10, jeu12.intraclasse [2:10])
jeu12.pam.5 <- pam (jeu12, 5)
jeu12.pam.6 <- pam (jeu12, 6)

# en 5 groupes, pam fait mieux (si on considère que les
#   groupes sont les blobs)
plot (jeu12 [,1], jeu12 [,2], col = jeu12.pam.5$clustering)
plot (jeu12 [,1], jeu12 [,2], col = jeu12.kmeans [[5]]$cluster)
# en 6 groupes, pam et kmeans font la même chose.
plot (jeu12 [,1], jeu12 [,2], col = jeu12.pam.6$clustering)
plot (jeu12 [,1], jeu12 [,2], col = jeu12.kmeans [[6]]$cluster)

# ---------------------------------------------------------------
# jeu13 = jeu13 avec outliers : un segment de 200 points
jeu13 <- data.frame (a = c (jeu1 [, 1], seq (from = 6, to = 10, length = 200)),
                     b = c (jeu1 [, 2], seq (from = -5, to = 10, length = 200)))
jeu13.kmeans <- list()
for (k in 2:10)
  jeu13.kmeans [[k]] <- kmeans (jeu13, k, nstart = 30)

jeu13.intraclasse <- numeric (10)
for (k in 2:10)
  jeu13.intraclasse [k] <- sum (jeu13.kmeans [[k]]$withinss *
                               jeu13.kmeans [[k]]$size) / nrow (jeu13)
# 5 ou 6 groupes, pas très clair
plot (2:10, jeu13.intraclasse [2:10])
jeu13.pam.5 <- pam (jeu13, 5)
jeu13.pam.6 <- pam (jeu13, 6)

# en 5 groupes, pam fait mieux (si on considère que les
#   groupes sont les blobs)
plot (jeu13 [,1], jeu13 [,2], col = jeu13.pam.5$clustering)
plot (jeu13 [,1], jeu13 [,2], col = jeu13.kmeans [[5]]$cluster)
# en 6 groupes, pam et kmeans font la même chose.
plot (jeu13 [,1], jeu13 [,2], col = jeu13.pam.6$clustering)
plot (jeu13 [,1], jeu13 [,2], col = jeu13.kmeans [[6]]$cluster)

# ---------------------------------------------------------------
# jeu14 = jeu13 avec segments moins dense (40 points au lieu de 200)
# intraclasse donne plutôt 6, mais c'est moins franc que pour jeu12
jeu14 <- data.frame (a = c (jeu1 [, 1], seq (from = 6, to = 10, length = 40)),
                     b = c (jeu1 [, 2], seq (from = -5, to = 10, length = 40)))
jeu14.kmeans <- list()
for (k in 2:10)
  jeu14.kmeans [[k]] <- kmeans (jeu14, k, nstart = 30)

jeu14.intraclasse <- numeric (10)
for (k in 2:10)
  jeu14.intraclasse [k] <- sum (jeu14.kmeans [[k]]$withinss *
                               jeu14.kmeans [[k]]$size) / nrow (jeu14)
plot (2:10, jeu14.intraclasse [2:10])
jeu14.pam.5 <- pam (jeu14, 5)
jeu14.pam.6 <- pam (jeu14, 6)

# ici, en 5 groupes, pam et kmenas font pareil
plot (jeu14 [,1], jeu14 [,2], col = jeu14.pam.5$clustering)
plot (jeu14 [,1], jeu14 [,2], col = jeu14.kmeans [[5]]$cluster)
# en 6 groupes, pam et kmeans font la même chose.
plot (jeu14 [,1], jeu14 [,2], col = jeu14.pam.6$clustering)
plot (jeu14 [,1], jeu14 [,2], col = jeu14.kmeans [[6]]$cluster)

# ---------------------------------------------------------------
# jeu15 = jeu1 avec un segment d'outliers
jeu15 <- data.frame (a = c (jeu1 [, 1], seq (from = 6, to = 10, length = 40)),
                     b = c (jeu1 [, 2], rep (-5, 40)))
jeu15.kmeans <- list()
for (k in 2:10)
  jeu15.kmeans [[k]] <- kmeans (jeu15, k, nstart = 30)

jeu15.intraclasse <- numeric (10)
for (k in 2:10)
  jeu15.intraclasse [k] <- sum (jeu15.kmeans [[k]]$withinss *
                               jeu15.kmeans [[k]]$size) / nrow (jeu15)
# l'intraclasse donne plutôt 6 groupes que 5
plot (2:10, jeu15.intraclasse [2:10])
jeu15.pam.5 <- pam (jeu15, 5)
jeu15.pam.6 <- pam (jeu15, 6)

# en 5 groupes, pam fait mieux (si on considère que les
#   groupes sont les blobs)
plot (jeu15 [,1], jeu15 [,2], col = jeu15.pam.5$clustering)
plot (jeu15 [,1], jeu15 [,2], col = jeu15.kmeans [[5]]$cluster)
# en 6 groupes, pam et kmeans font la même chose.
plot (jeu15 [,1], jeu15 [,2], col = jeu15.pam.6$clustering)
plot (jeu15 [,1], jeu15 [,2], col = jeu15.kmeans [[6]]$cluster)

# ---------------------------------------------------------------
# jeu16 = jeu1 avec un long segment d'outliers (cf. attribut b NA)
jeu16 <- data.frame (a = c (jeu1 [, 1], seq (from = -3, to = 10, length = 150)),
                     b = c (jeu1 [, 2], rep (-5, 150)))
jeu16.kmeans <- list()
for (k in 2:10)
  jeu16.kmeans [[k]] <- kmeans (jeu16, k, nstart = 30)

jeu16.intraclasse <- numeric (10)
for (k in 2:10)
  jeu16.intraclasse [k] <- sum (jeu16.kmeans [[k]]$withinss *
                               jeu16.kmeans [[k]]$size) / nrow (jeu16)
# l'intraclasse donne plutôt 6 groupes que 5
plot (2:10, jeu16.intraclasse [2:10])
jeu16.pam.5 <- pam (jeu16, 5)
jeu16.pam.6 <- pam (jeu16, 6)

# en 5 groupes, pam fait mieux (si on considère que les
#   groupes sont les blobs)
plot (jeu16 [,1], jeu16 [,2], col = jeu16.pam.5$clustering)
plot (jeu16 [,1], jeu16 [,2], col = jeu16.kmeans [[5]]$cluster)
# en 6 groupes, pam et kmeans font la même chose.
plot (jeu16 [,1], jeu16 [,2], col = jeu16.pam.6$clustering)
plot (jeu16 [,1], jeu16 [,2], col = jeu16.kmeans [[6]]$cluster)

# ---------------------------------------------------------------
# jeu17 = jeu16 avec barres moins dense
jeu17 <- data.frame (a = c (jeu1 [, 1], seq (from = -3, to = 10, length = 50)),
                     b = c (jeu1 [, 2], rep (-5, 50)))
jeu17.kmeans <- list()
for (k in 2:10)
  jeu17.kmeans [[k]] <- kmeans (jeu17, k, nstart = 30)

jeu17.intraclasse <- numeric (10)
for (k in 2:10)
  jeu17.intraclasse [k] <- sum (jeu17.kmeans [[k]]$withinss *
                               jeu17.kmeans [[k]]$size) / nrow (jeu17)
# l'intraclasse donne plutôt 6 groupes que 5
plot (2:10, jeu17.intraclasse [2:10])
jeu17.pam.5 <- pam (jeu17, 5)
jeu17.pam.6 <- pam (jeu17, 6)

# en 5 groupes, pam fait mieux (si on considère que les
#   groupes sont les blobs)
plot (jeu17 [,1], jeu17 [,2], col = jeu17.pam.5$clustering)
plot (jeu17 [,1], jeu17 [,2], col = jeu17.kmeans [[5]]$cluster)
# en 6 groupes, pam et kmeans font la même chose.
plot (jeu17 [,1], jeu17 [,2], col = jeu17.pam.6$clustering)
plot (jeu17 [,1], jeu17 [,2], col = jeu17.kmeans [[6]]$cluster)

# ---------------------------------------------------------------
# jeu18 = jeu17 avec barres plus basse
# pas de problème : trouve 6 groupes 
jeu18 <- data.frame (a = c (jeu1 [, 1], seq (from = -3, to = 10, length = 50)),
                     b = c (jeu1 [, 2], rep (-50, 50)))
jeu18.kmeans <- list()
for (k in 2:10)
  jeu18.kmeans [[k]] <- kmeans (jeu18, k, nstart = 30)

jeu18.intraclasse <- numeric (10)
for (k in 2:10)
  jeu18.intraclasse [k] <- sum (jeu18.kmeans [[k]]$withinss *
                               jeu18.kmeans [[k]]$size) / nrow (jeu18)
# l'intraclasse donne 6 groupes
plot (2:10, jeu18.intraclasse [2:10])
jeu18.pam.5 <- pam (jeu18, 5)
jeu18.pam.6 <- pam (jeu18, 6)

# en 5 groupes, pam  et kmeans font la même chose.
# Ils mélangent deux groupes sphériques et exhibent les outliers.
plot (jeu18 [,1], jeu18 [,2], col = jeu18.pam.5$clustering)
plot (jeu18 [,1], jeu18 [,2], col = jeu18.kmeans [[5]]$cluster)
# en 6 groupes, pam et kmeans font la même chose.
plot (jeu18 [,1], jeu18 [,2], col = jeu18.pam.6$clustering)
plot (jeu18 [,1], jeu18 [,2], col = jeu18.kmeans [[6]]$cluster)

# ---------------------------------------------------------------
# jeu19 =
jeu19.artefacts.theta <- runif (100, min = 0, max = 2 * pi)
jeu19.rho <- runif (100, min = 10, max = 11)
jeu19 <- data.frame (a = c (jeu1 [, 1], jeu19.rho *
                       cos (jeu19.artefacts.theta) + 4),
                     b = c (jeu1 [, 2], jeu19.rho *
                       sin (jeu19.artefacts.theta) + 4))
jeu19.kmeans <- list()
for (k in 2:10)
  jeu19.kmeans [[k]] <- kmeans (jeu19, k, nstart = 30)

jeu19.intraclasse <- numeric (10)
for (k in 2:10)
  jeu19.intraclasse [k] <- sum (jeu19.kmeans [[k]]$withinss *
                               jeu19.kmeans [[k]]$size) / nrow (jeu19)
# 
plot (2:10, jeu19.intraclasse [2:10])
readLines (n = 1)
jeu19.pam.5 <- pam (jeu19, 5)
jeu19.pam.6 <- pam (jeu19, 6)

# en 5 groupes, pam trouve les 5 groupes, pas kmeans : 
#   il mélange deux groupes sphériques et exhibe les outliers.
plot (jeu19 [,1], jeu19 [,2], col = jeu19.pam.5$clustering)
readLines (n = 1)
plot (jeu19 [,1], jeu19 [,2], col = jeu19.kmeans [[5]]$cluster)
readLines (n = 1)
# en 6 groupes, c'est un peu comme pour : pam ok
#   kmeans non
plot (jeu19 [,1], jeu19 [,2], col = jeu19.pam.6$clustering)
readLines (n = 1)
plot (jeu19 [,1], jeu19 [,2], col = jeu19.kmeans [[6]]$cluster)

# ----------------------------------------------------------------
# jeu7 = jeu2 où les attributs ont été permutés.
# Donc, si on fait un plot() des deux premiers attributs,
# on ne voit rien. Par contre, kmeans() trouve bien les 5
# groupes attendus, comme dans jeu2 (évidemment, c'est le même jeu de
# données !)
#
jeu7 <- data.frame (a = jeu2$g, b = jeu2$d, c = jeu2$a, d = jeu2$e,
                    e = jeu2$c, f = jeu2$b, g = jeu2$f)
jeu7.kmeans <- list()
for (k in 2:20)
  jeu7.kmeans [[k]] <- kmeans (jeu7, k, nstart = 30)

jeu7.intraclasse <- numeric (20)
for (k in 2:20)
  jeu7.intraclasse [k] <- sum (jeu7.kmeans [[k]]$withinss *
                               jeu7.kmeans [[k]]$size) / nrow (jeu7)
plot (2:20, jeu7.intraclasse [2:20])
plot (jeu7 [,1], jeu7 [,2], col = jeu7.kmeans [[5]]$cluster)
plot (jeu7$c, jeu7$f, col = jeu7.kmeans [[5]]$cluster)

# ----------------------------------------------------------------
# jeu8 = jeu1 sauf que les attributs ont été divisés par 10 et
#               transformés par un cos()
#   (je divise par 10 pour que acos() retrouve les valeurs initiales)
# Donc, kmeans() trouve n'importe quoi.
# Il suffirait de faire des acos() pour que ça remarche...
# NON NON !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
jeu8 <- data.frame (a = sin (jeu1 [,1] / 10), b = sin (jeu1 [,2] / 10))
jeu8.kmeans <- list()
for (k in 2:20)
  jeu8.kmeans [[k]] <- kmeans (jeu8, k, nstart = 30)

jeu8.intraclasse <- numeric (20)
for (k in 2:20)
  jeu8.intraclasse [k] <- sum (jeu8.kmeans [[k]]$withinss *
                               jeu8.kmeans [[k]]$size) / nrow (jeu8)
plot (2:20, jeu8.intraclasse [2:20])
plot (jeu8 [,1], jeu8 [,2], col = jeu8.kmeans [[5]]$cluster)

plot (jeu1 [,1] / 10, jeu1 [,2] / 10, col = jeu8.kmeans [[5]]$cluster)



jeu9 <- data.frame (a = asin (jeu8 [,1]), b = asin (jeu8 [,2]))
jeu9.kmeans <- list()
for (k in 2:20)
  jeu9.kmeans [[k]] <- kmeans (jeu9, k, nstart = 30)

jeu9.intraclasse <- numeric (20)
for (k in 2:20)
  jeu9.intraclasse [k] <- sum (jeu9.kmeans [[k]]$withinss *
                               jeu9.kmeans [[k]]$size) / nrow (jeu9)
plot (2:20, jeu9.intraclasse [2:20])
plot (jeu9 [,1], jeu9 [,2], col = jeu9.kmeans [[5]]$cluster)

plot (jeu1 [,1] / 10, jeu1 [,2] / 10, col = jeu9.kmeans [[5]]$cluster)
