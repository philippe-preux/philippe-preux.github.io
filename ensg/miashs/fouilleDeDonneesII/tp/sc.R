library (cluster)

iris.pam <- list()
iris.pam.sil <- numeric (20)

for (k in 2:20) {
  iris.pam [[k]] <- pam (iris, k)
  iris.pam.sil [k] <- summary (silhouette (iris.pam [[k]]))$avg.width
}
#
pdf ("iris.silhouette.pdf")
plot (2:20, iris.pam.sil [2:20])
dev.off()

plot (iris [,3:4], col = iris.pam [[3]]$clustering)
table (iris$Species, iris.pam [[3]]$clustering)


jeu12.pam <- list()
jeu12.pam.sil <- numeric (20)

for (k in 2:20) {
  jeu12.pam [[k]] <- pam (jeu12, k)
  jeu12.pam.sil [k] <- summary (silhouette (jeu12.pam [[k]]))$avg.width
}
#

plot (2:20, jeu12.pam.sil [2:20])

jeu19.kmeans <- list()
jeu19.intraclasse <- numeric (20)

for (k in 2:20) {
  jeu19.kmeans [[k]] <- kmeans (jeu19, k, nstart=30)
  jeu19.intraclasse [k] <- sum (jeu19.kmeans [[k]]$withinss *
                                jeu19.kmeans [[k]]$size) / nrow (jeu19)
}
plot (2:20, jeu19.intraclasse [2:20])

jeu19.pam <- list()
jeu19.pam.sil <- numeric (20)

for (k in 2:20) {
  jeu19.pam [[k]] <- pam (jeu19, k)
  jeu19.pam.sil [k] <- summary (silhouette (jeu19.pam [[k]]))$avg.width
}
#

plot (2:20, jeu19.pam.sil [2:20])

pdf ("jeu19.pdf")
plot (2:20, jeu19.intraclasse [2:20])
plot (jeu19, col = jeu19.kmeans [[5]]$cluster)
plot (jeu19, col = jeu19.kmeans [[6]]$cluster)
plot (jeu19, col = jeu19.kmeans [[10]]$cluster)
plot (2:20, jeu19.pam.sil [2:20])
plot (jeu19, col=jeu19.pam [[5]]$clustering)
plot (jeu19, col=jeu19.pam [[6]]$clustering)
plot (jeu19, col=jeu19.pam [[11]]$clustering)
dev.off()
