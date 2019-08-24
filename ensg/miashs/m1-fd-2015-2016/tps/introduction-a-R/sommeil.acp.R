iris.scaled <- scale (iris [,1:4])
iris.scaled.acp <- prcomp (iris.scaled, retx = T, scale = T)

plot (iris.scaled.acp) # = plot (iris.scaled.acp$sedv^2)

biplot (iris.scaled.acp)

plot (iris.scaled.acp$x [,1], iris.scaled.acp$x [,2],
      col = iris [,5], xlab = "PC1", ylab = "PC2")
for (i in 1:4) {
    arrows (0, 0, 2 * iris.scaled.acp$rotation [i,1],
            2 * iris.scaled.acp$rotation [i,2], col = "red")
    s1 <- ifelse (iris.scaled.acp$rotation [i,1] < 0, -1, 1)
    s2 <- ifelse (iris.scaled.acp$rotation [i,2] < 0, -1, 1)
    text (2 * iris.scaled.acp$rotation [i,1] + s1 * .35,
          2 * iris.scaled.acp$rotation [i,2] + s2 * .35,
          names(iris)[i])
}







nv <- sommeil [,2:ncol(sommeil)]
nv.ok <- apply (nv, 1, function (x) { all (!is.na (x)) })

nv.ok.acp.prcomp <- prcomp (nv [nv.ok,], retx = T, scale = T)
# center = TRUE par défaut
# fait une svd de la matrice de données
# names(nv.ok.acp.prcomp$x[,1])
biplot (nv.ok.acp.prcomp, xlabs = sommeil$Species[nv.ok])



d <- as.matrix (dist (nv.ok.acp.prcomp$x))
K <- 5
N <- length (which (nv.ok))
les.voisins <- matrix (0, nrow = N, ncol = K)
for (i in 1:N) {
    knn.i <- sort (d [i,], index.return = T)
    les.voisins [i, ] <- knn.i$i [2:(K+1)]
}

# espèce les plus proches de l'homme :
sommeil$Species[nv.ok][les.voisins[22,]]




sommeil.kmeans <- list ()
inertie <- rep (0, times = 10)
for (k in 2:10) {
    sommeil.kmeans [[k]] <- kmeans (nv [nv.ok,], centers = k, nstart = 30)
    inertie [k] <- sum (sommeil.kmeans [[k]]$withinss)
}

for (i in 1:4)
    print (sommeil [nv.ok,1][which (sommeil.kmeans[[4]]$cluster==i)])

for (i in 1:5)
    print (sommeil [nv.ok,1][which (sommeil.kmeans[[5]]$cluster==i)])




sommeil.scaled.kmeans <- list ()
inertie.scaled <- rep (0, times = 10)
nv.scaled <- scale (nv [nv.ok,])
for (k in 2:10) {
    sommeil.scaled.kmeans [[k]] <- kmeans (nv.scaled, centers = k, nstart = 30)
    inertie.scaled [k] <- sum (sommeil.scaled.kmeans [[k]]$withinss)
}


for (i in 1:5)
    print (sommeil [nv.ok,1][which (sommeil.scaled.kmeans[[5]]$cluster==i)])











iris.acp <- prcomp (iris [,1:4], retx = T, scale = T)
biplot (iris.acp)



spheres.dans.l.espace <- function (n, P)
    {
        K <- length (n)
        centers <- matrix (runif (K * P), nrow = K, ncol = P)
        sdev <- matrix (runif (K * P, max = .1), nrow = K, ncol = P)
        N <- sum (n)
        x <- matrix (0, nrow = N, ncol = P)
        indice <- 0
        for (i in 1:K) {
            for (j in 1:n [i]) {
                x [indice + j, ] <- rnorm (P, mean = centers [i, ], sd = sdev [i, ])
            }
            indice <- indice + n [i]
        }
        return (x)
    }
