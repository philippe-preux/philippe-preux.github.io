distance <- numeric (length = nrow (iris))
for (i in 1:150) {
  distance [i] <- sqrt (sum((iris [1, 1:4] - iris [i, 1:4])^2))
}
distance [1] <- 889888
which.min (distance)
[1] 18
distance [18] <- 889888
which.min (distance)
[1] 5
distance [5] <- 889888
which.min (distance)
[1] 40


x <- c (5, 3, 3, 2)
for (i in 1:150) {
  distance [i] <- sqrt (sum((x - iris [i, 1:4])^2))
}
which.min(distance)
[1] 99
distance [99] <- 889888
which.min(distance)
[1] 65
distance [65] <- 889888
which.min(distance)
[1] 60

plot (iris[,1:2], type = "n")
text (iris[,1:2], label = 1:150)

