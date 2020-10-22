h30 <- read.table ("helice.30", header=T)
X <- h30
X$x <- (X$x - mean (X$x))
X$y <- (X$y - mean (X$y))
X$z <- (X$z - mean (X$z))
X <- as.matrix (X)
S <- X %*% t(X)

S.eigen <- eigen (S, symmetric = T)
# inspection de S.eigen$values montre que le rang est 3

# projection en 2 dimensions
z2 <- diag (sqrt (S.eigen$values [1:2])) %*% t(S.eigen$vectors) [1:2,]

plot (t(z2), type = "l")


plot (t(z2), type = "c")
text (t(z2), labels = 1:30)
