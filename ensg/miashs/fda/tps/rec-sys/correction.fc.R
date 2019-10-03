u1.base <- read.table ("u1.base", col.names = c ("user", "item", "r", "t"), 
	header = FALSE)
u1.test <- read.table ("u1.test", col.names = c ("user", "item", "r", "t"), 
	header = FALSE)
N <- 943  # nombre d'utilisateurs
M <- 1682 # nombre d'items

K <- 10
U <- matrix (runif (N * K, min = -1), nrow = N, ncol = K)
V <- matrix (runif (M * K, min = -1), nrow = M, ncol = K)

eta <- 0.001

ii <- 0
les.E.base <- c ()
les.E.test <- c ()
E.test <- Inf
repeat {
  ii <- ii + 1
  E.precedent <- E.test
  # on met à jour le modèle (U et V)
  permutation <- sample (1:nrow (u1.base), size = nrow (u1.base))
  for (i in 1:nrow (u1.base)) {
    user <- u1.base$user [permutation [i]]
    item <- u1.base$item [permutation [i]]
    r <- u1.base$r [permutation [i]]

    note.predite <- U [user, ] %*% V [item, ]
    e <- r - note.predite

    U [user, ] <- U [user, ] + eta * e * V [item, ]
    V [item, ] <- V [item, ] + eta * e * U [user, ]
  }
  # on mesure l'erreur sur le jeu d'entrainement u1.base
  E.base <- 0
  for (i in 1:nrow (u1.base)) {
    user <- u1.base$user [i]
    item <- u1.base$item [i]
    r <- u1.base$r [i]

    note.predite <- U [user, ] %*% V [item, ]
    e <- r - note.predite

    E.base <- E.base + e^2
  }
  E.base <- sqrt (E.base / nrow (u1.base))
  les.E.base <- c (les.E.base, E.base)
  # on mesure l'erreur sur le jeu d'entrainement u1.test
  E.test <- 0
  for (i in 1:nrow (u1.test)) {
    user <- u1.test$user [i]
    item <- u1.test$item [i]
    r <- u1.test$r [i]

    note.predite <- U [user, ] %*% V [item, ]
    e <- r - note.predite

    E.test <- E.test + e^2
  }
  #
  E.test <- sqrt (E.test / nrow (u1.test))
  les.E.test <- c (les.E.test, E.test)
  cat (ii, E.base, E.test, "\n")

  if (E.test > E.precedent)
    break
  if (E.precedent - E.test < 0.001)
    break
}
plot (les.E.base, main = "RMSE au fil des itérations", ylab = "RMSE", type = "l")
points (les.E.test, col = "red", type = "l")
