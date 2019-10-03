olives <- read.table ("~/usr/fd/ggobi/data/olive.dat",
                      col.names = c ("Region", "Area", "p1.palmitic",
                        "p2.palmitoleic", "stearic", "oleic",
                        "l1.linoleic", "l2.linolenic", "arachidic",
                        "eicosenoic"))

olives.kmeans <- list()
for (k in 2:20)
  olives.kmeans [[k]] <- kmeans (olives [, c(-1, -2)], k, nstart = 30)

olives.intraclasse <- numeric (20)
for (k in 2:20)
  olives.intraclasse [k] <- sum (olives.kmeans [[k]]$withinss *
                                 olives.kmeans [[k]]$size) / nrow (olives)


