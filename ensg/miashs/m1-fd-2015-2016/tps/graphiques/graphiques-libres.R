png("Sleep.couleur.png")
plot (sommeil$Sleep, col = "blue", 
      main = "L'attribut Sleep",
      xlab = "Numéro de la donnée",
      ylab = "Durée de sommeil")
dev.off()

png ("dreaming.vs.Sleep.png")
plot (sommeil$Sleep, sommeil$Dreaming, col="green", 
      xlab = "Durée de sommeil quotidien", 
      ylab = "Durée de sommeil paradoxal quotidien",
      main = "Durée de sommeil paradoxal vs. durée de sommeil")
dev.off()

png ("dreaming.vs.Sleep.espèces.png")
plot (sommeil$Sleep, sommeil$Dreaming, pch = ' ',
      xlab = "Durée de sommeil quotidien", 
      ylab = "Durée de sommeil paradoxal quotidien",
      main = "Durée de sommeil paradoxal vs. durée de sommeil")
text (sommeil$Sleep, sommeil$Dreaming, sommeil$Species)
dev.off()

png("droite-de-régression.png")
  plot (sommeil$Sleep, sommeil$Dreaming)
  abline (lm (sommeil$Dreaming ~ sommeil$Sleep), col = "red")
dev.off()
q("yes")

png ("dreaming.et.nonDreaming.vs.Sleep.png")
plot (sommeil$Sleep, sommeil$Dreaming, col = "green",
      xlab = "Durée de sommeil quotidien", ylab = "", 
      main = "Durée de sommeil vs. durée de sommeil",
      ylim = c (0, 20))
abline (lm (sommeil$Dreaming ~ sommeil$Sleep), lty = 2, col = "red")
points (sommeil$Sleep, sommeil$Non.Dreaming, col = "blue", pch = 19)

legend (3, 20,         # position coin supérieur gauche de la légende
        c ("Dreaming sleep","Non dreaming sleep"), # étiquettes associées
        pch = c (1, 19),
        col = c ("green", "blue"))  # couleurs

abline (lm (sommeil$Non.Dreaming ~ sommeil$Sleep), lty = 3, col = "red")
dev.off()

png ("histo.Sleep.png")
hist (sommeil$Sleep, br = 20)
dev.off()

png ("histo-avec-prop.Sleep.png")
hist (sommeil$Sleep, br = 20, freq = F)
dev.off()

png ("histo-avec-prop-et-densité.Sleep.png")
hist (sommeil$Sleep, br = 20, freq = F)
lines (density (na.omit(sommeil$Sleep)), col = "green")
dev.off()

png ("../graphiques/camembert.Sleep.exposure.png")
pie (table (sommeil$Sleep.exposure), labels = c("bien protégé", "protégé", "assez protégé", "peu protégé", "non protégé"), col = rainbow (5))
dev.off ()

png("camembert.png")
pie (table (cut (sommeil$Sleep, 5)), 
       labels = c ("petit dormeur", "moyen dormeur", 
                   "dormeur", "bon dormeur", "gros dormeur"),
       col = c("white", "light blue", "blue", "purple", "black"))
dev.off()
