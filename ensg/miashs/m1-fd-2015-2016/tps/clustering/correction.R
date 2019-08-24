jeu1 <- read.table ("http://www.grappa.univ-lille3.fr/~ppreux/ensg/miashs/fouilleDeDonneesII/tp/k-moyennes/jeu1.txt")
plot(jeu1)
inertie <- rep (NA, times = 15)
for (i in 2:15) {
  km <- kmeans (jeu1, nstart = 30, iter.max = 50, centers = i)
  inertie [i] <- sum (km$withinss)
}
plot (inertie)
plot(jeu1)
km5 <- kmeans (jeu1, nstart = 30, iter.max = 50, centers = 5)
plot(jeu1, col = km5$cluster)

jeu2 <- read.table ("http://www.grappa.univ-lille3.fr/~ppreux/ensg/miashs/fouilleDeDonneesII/tp/k-moyennes/jeu2.txt")
plot (jeu2)
plot (jeu2[,1:2])
plot (jeu2[,c(3,7)])
inertie2 <- rep (NA, times = 15)
for (i in 2:15) {
  km <- kmeans (jeu2, nstart = 30, iter.max = 50, centers = i)
  inertie2 [i] <- sum (km$withinss)
}
plot (inertie2)
km5.2 <- kmeans (jeu2, nstart = 30, iter.max = 50, centers = 5)
plot (jeu2 [, 1:2], col = km5.2$cluster)

jeu3 <- read.table ("http://www.grappa.univ-lille3.fr/~ppreux/ensg/miashs/fouilleDeDonneesII/tp/k-moyennes/jeu3.txt")
plot (jeu3)
plot (jeu2)
inertie3 <- rep (NA, times = 15)
for (i in 2:15) {
  km <- kmeans (jeu3, nstart = 30, iter.max = 50, centers = i)
  inertie3 [i] <- sum (km$withinss)
}
plot (inertie2)
points (inertie3 / 10, col = "red", pch = 19)
plot (jeu2)
x11()
plot (jeu3)

jeu4 <- read.table ("http://www.grappa.univ-lille3.fr/~ppreux/ensg/miashs/fouilleDeDonneesII/tp/k-moyennes/jeu4.txt")
plot (jeu4)
inertie4 <- rep (NA, times = 15)
for (i in 2:15) {
  km <- kmeans (jeu4, nstart = 30, iter.max = 50, centers = i)
  inertie4 [i] <- sum (km$withinss)
}
plot (inertie4)
plot (jeu4)
km4.3 <- kmeans (jeu4, nstart = 30, iter.max = 50, centers = 3)
plot (jeu4, col = km4.3$cluster)
km4.3$centers
points (km4.3$centers, pch = 19, col = "blue")

jeu5 <- read.table ("http://www.grappa.univ-lille3.fr/~ppreux/ensg/miashs/fouilleDeDonneesII/tp/k-moyennes/jeu5.txt")
plot (jeu5)
km5.3 <- kmeans (jeu5, nstart = 30, iter.max = 50, centers = 3)
plot (jeu5, col = km5.3$cluster)
points (km5.3$centers, pch = 19, col = "blue")

jeu11 <- read.table ("http://www.grappa.univ-lille3.fr/~ppreux/ensg/miashs/fouilleDeDonneesII/tp/k-moyennes/jeu11.txt")
plot (jeu11)
inertie11 <- rep (NA, times = 15)
for (i in 2:15) {
  km <- kmeans (jeu11, nstart = 30, iter.max = 50, centers = i)
  inertie11 [i] <- sum (km$withinss)
}
plot (inertie11)
plot (jeu11)
plot (jeu11 [,1:2])
plot (jeu11 [,3:4])
km11.3 <- kmeans (jeu11, nstart = 30, iter.max = 50, centers = 3)
plot (jeu11 [,1:2])
plot (jeu11 [,1:2], col = km11.3$cluster)
plot (jeu11 [,3:4], col = km11.3$cluster)
plot (jeu11 [,c(3,6)], col = km11.3$cluster)
plot (jeu11 [,c(4,7)], col = km11.3$cluster)

library(rggobi)
ggobi (jeu11)


#####################################################
# hclust
#
iris.hclust <- hclust (dist (iris [,1:4]))
plot (iris.hclust)
iris.hclust.3 <- rect.hclust (iris.hclust, 3)
iris.hclust.3
iris.hclust.3 [[1]]
mean (iris [iris.hclust.3 [[1]], 1])
mean (iris [iris.hclust.3 [[1]], 3])
mean (iris [iris.hclust.3 [[1]], 2])
mean (iris [iris.hclust.3 [[1]], 4])
c1 <- c (mean (iris [iris.hclust.3 [[1]], 1]), mean (iris [iris.hclust.3 [[1]], 2]), mean (iris [iris.hclust.3 [[1]], 3]), mean (iris [iris.hclust.3 [[1]], 4]))
c1

km3 <- kmeans (iris [,1:4], centers = 3, nstart = 30, iter.max = 50)
couleurs <- rep ("black", times = nrow (iris))
couleurs [iris.hclust.3 [[2]]] <- "red"
couleurs [iris.hclust.3 [[3]]] <- "green"

plot (iris [,3:4], col = km3$cluster)
plot (iris [,3:4], col = couleurs)
x11()
plot (iris [,3:4], col = km3$cluster)


iris.hclust.cluster <- rep (1, times = nrow (iris))
iris.hclust.cluster [iris.hclust.3 [[2]]] <- 2
iris.hclust.cluster [iris.hclust.3 [[3]]] <- 3

table (iris.hclust.cluster, km3$cluster)

jeu1.hclust <- hclust (dist (jeu1))
jeu1.hclust.5 <- rect.hclust (jeu1.hclust, 5, which = 1:5)
jeu1.col <- rep (1, times = nrow (jeu1))
jeu1.col [jeu1.hclust.5 [[2]]] <- 2
jeu1.col [jeu1.hclust.5 [[3]]] <- 3
jeu1.col [jeu1.hclust.5 [[4]]] <- 4
jeu1.col [jeu1.hclust.5 [[5]]] <- 5
plot (jeu1, col = jeu1.col)

jeu2.hclust <- hclust (dist (jeu2))
jeu2.hclust.5 <- rect.hclust (jeu2.hclust, 5, which = 1:5)
jeu2.col <- rep (1, times = nrow (jeu2))
jeu2.col [jeu2.hclust.5 [[2]]] <- 2
jeu2.col [jeu2.hclust.5 [[3]]] <- 3
jeu2.col [jeu2.hclust.5 [[4]]] <- 4
jeu2.col [jeu2.hclust.5 [[5]]] <- 5
plot (jeu2, col = jeu2.col)
plot (jeu2 [,1:2], col = jeu2.col)

jeu3.hclust <- hclust (dist (jeu3))
jeu3.hclust.3 <- rect.hclust (jeu3.hclust, 5, which = 1:5)
jeu3.col <- rep (1, times = nrow (jeu3))
jeu3.col [jeu3.hclust.5 [[2]]] <- 2
jeu3.col [jeu3.hclust.5 [[3]]] <- 3
jeu3.col [jeu3.hclust.5 [[4]]] <- 4
jeu3.col [jeu3.hclust.5 [[5]]] <- 5
plot (jeu3 [,1:2], col = jeu3.col)
plot (jeu3, col = jeu3.col)

jeu4.hclust <- hclust (dist (jeu4))
jeu4.hclust.3 <- rect.hclust (jeu4.hclust, 3, which = 1:3)
jeu4.col <- rep (1, times = nrow (jeu4))
jeu4.col <- rep (1, times = nrow (jeu4))
jeu4.col [jeu4.hclust.3 [[2]]] <- 2
jeu4.col [jeu4.hclust.3 [[3]]] <- 3
plot (jeu4, col = jeu4.col)

jeu5.hclust <- hclust (dist (jeu5))
jeu5.hclust.3 <- rect.hclust (jeu5.hclust, 3, which = 1:3)
jeu5.col <- rep (1, times = nrow (jeu5))
jeu5.col [jeu5.hclust.3 [[2]]] <- 2
jeu5.col [jeu5.hclust.3 [[3]]] <- 3
plot (jeu5, jeu5.col)
plot (jeu5, col = jeu5.col)

df.aleatoire <- data.frame (a = runif (500, min = -1, max = 1),
                            b = runif (500, min = -1, max = 1))
plot (df.aleatoire)
df.aleatoire.hclust <- hclust (dist (df.aleatoire))
df.aleatoire.hclust.5 <- rect.hclust (df.aleatoire.hclust, 5, which = 1:5)
dfa.col <- rep (1, times = 500)
dfa.col [df.aleatoire.hclust.5 [[2]]] <- 2
dfa.col [df.aleatoire.hclust.5 [[3]]] <- 3
dfa.col [df.aleatoire.hclust.5 [[4]]] <- 4
dfa.col [df.aleatoire.hclust.5 [[5]]] <- 5
plot (df.aleatoire, col = dfa.col)
df.aletaoire.km <- kmeans (df.aleatoire, centers = 5, nstart = 30, iter.max = 50)
x11()
plot (df.aleatoire, col = df.aletaoire.km$cluster)
plot (df.aleatoire, col = df.aletaoire.km$cluster, main = "k-moyennes")
