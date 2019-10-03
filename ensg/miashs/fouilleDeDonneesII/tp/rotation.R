jeu2b <- read.table ("jeu2.txt")
theta <- c (0, 1, - 1, 0.78, 1.25, .9, .87) * pi
mr <- list ()
for (i in 1:6) {
  mr [[i]] <- matrix (diag (7), nrow = 7, ncol = 7)
  mr [[i]] [i, i] <- cos (theta [i])
  mr [[i]] [i, i+1] <- -sin (theta [i])
  mr [[i]] [i+1, i] <- sin (theta [i])
  mr [[i]] [i+1, i+1] <- cos (theta [i])
}

mrot <- mr [[6]] %*%  mr [[4]] %*%  mr [[3]] %*%  mr [[5]] %*%  mr [[1]] %*%  mr [[2]]

for (i in 1:nrow(jeu2b)) {
  jeu2b [i,] <- mrot %*% t (jeu2b [i, ])
}
