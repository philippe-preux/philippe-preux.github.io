v <- scale (read.table("/home/ppreux/works/fd/spectral-clustering/sc-NJW/vermicelles/vermicelles"))

N <- nrow (v)
d <- as.matrix (exp (- dist (v) / (2 * .01)))
d.th <- ifelse (d > .03, d, 0)

K <- 10
les.voisins <- matrix (0, nrow = N, ncol = K)
for (i in 1:N) {
    knn.i <- sort (d.th [i,], decreasing = T, index.return = T)
    les.voisins [i, ] <- knn.i$i [1:K]
}

left <- rep (TRUE, times = N)
clusters <- rep (0, times = N)
n.cluster <- 1

while (any (left)) {
    i <- which (left) [1]
    left [i] <- F
    l <- c (i)
    while (length (l) != 0) {
        i <- l [1]
        l <- l [-1]
        for (j in les.voisins [i, ]) {
            if ((j != i) & (left [j])) {
                l <- c (l, j)
                left [j] <- F
                clusters [j] <- n.cluster
            }
        }
    }
    n.cluster <- n.cluster + 1
}
n.cluster <- n.cluster - 1
