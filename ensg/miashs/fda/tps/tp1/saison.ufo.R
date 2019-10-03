ufo <- read.csv ("ufo.us.csv")
ufo$DateOccurred <- as.character (ufo$DateOccurred)
ufo$DateOccurred <- as.Date (ufo$DateOccurred)
ufo$month <- months.Date (ufo$DateOccurred)
month.occurence <- table (ufo$month)
# on ré-ordonne les mis dans l'ordre de l'année
# il faut un as.table() pour que l'objet demeure de classe table
month.occurence <- as.table (month.occurence [c (5, 4, 9, 2, 8, 7, 6, 1, 12, 11, 10, 3)])

# même chose pour les jours de la semaine
ufo$weekday <- weekdays (ufo$DateOccurred)
weekday.occurence <- table (ufo$weekday)
weekday.occurence <- as.table (weekday.occurence [c (3, 4, 5, 2, 7, 6, 1)])

# même chose pour les jours du mois
ufo$mday <- unclass (as.POSIXlt (ufo$DateOccurred))$mday 
mday.occurence <- table (ufo$mday)

pdf ("weekday.occurence.pdf")
plot (weekday.occurence, xlab = "Jour de la semaine", ylab = "Nombre d'observations", main = "Répartition par jour de la semaine des observations d'OVNI aux États-Unis")
dev.off()

pdf ("month.occurence.pdf")
plot (month.occurence, xlab = "Mois", ylab = "Nombre d'observations", main = "Répartition par mois des observations d'OVNI aux États-Unis")
dev.off()

pdf ("mday.occurence.pdf")
plot (mday.occurence, xlab = "Jour du mois", ylab = "Nombre d'observations", main = "Répartition par jour dans le mois des observations d'OVNI aux États-Unis")
dev.off()


# sur 4 ans
# 45/48 mois ont un 29
# 44/48 ont un 30
# 28/48 ont un 31

mday.occurence.corrige <- mday.occurence
mday.occurence.corrige [29] <- mday.occurence.corrige [29] * 48 / 45
mday.occurence.corrige [30] <- mday.occurence.corrige [30] * 48 / 44
mday.occurence.corrige [31] <- mday.occurence.corrige [31] * 48 / 28

pdf("mday.occurence.corrige.pdf")
plot (mday.occurence.corrige, col = "red", xlab = "Jour du mois", 
     ylab = "Nombre d'observations", 
     main = "Répartition par jour dans le mois des observations d'OVNI aux États-Unis, avec correction (en rouge)")
points (mday.occurence)
dev.off()


ufo$jj <- julian(ufo$DateOccurred)
ufo$jj <- ufo$jj - min (ufo$jj)
jj.occurence <- table (ufo$jj)
plot (jj.occurence)
plot (cumsum (jj.occurence))
plot (cumsum (jj.occurence), type = "l")
plot (cumsum (jj.occurence), pch = ".")

ufo$month.num <-  unclass (as.POSIXlt (ufo$DateOccurred))$mon + 1
plot (jj.occurence, col = ufo$month.num)
plot (jj.occurence, col = rainbow(12) [ufo$month.num])
