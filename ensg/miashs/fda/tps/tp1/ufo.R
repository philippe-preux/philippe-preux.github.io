ufo <- read.table ("~/public_html/ensg/miashs/m2/datasets/ufo_awesome.tsv",
                   header = F, sep = "\t", quote = "",
                   stringsAsFactors = F,
                   col.names = c ("do", "dr", "loc", "short", "duree", "description"), fill = T)


ufo.record.ok <- rep (TRUE, times = nrow (ufo))
ufo.record.ok [which (nchar (ufo$do) != 8)] <- FALSE
ufo.record.ok [which (nchar (ufo$dr) != 8)] <- FALSE

ufo.ok <- ufo [ufo.record.ok, ]
ufo.ok$do <- as.Date (ufo.ok$do, format = "%Y%m%d")
ufo.ok$dr <- as.Date (ufo.ok$dr, format = "%Y%m%d")
#   ya encore des NA :
# > which (is.na (ufo.ok$do))
# [1]  8530 11951

# as.Date ("5/2/2015 5:25:00 AM", format = "%m/%d/%Y %X %p")


hist (ufo.ok$do, breaks = 50)
hist (ufo.ok$do [ufo.ok$do > 1900], breaks = 50)

get.location <- function(l)
{
  split.location <- tryCatch(strsplit(l, ",")[[1]],
                             error = function(e) return(c(NA, NA)))
  clean.location <- gsub("^ ","",split.location)
  if (length(clean.location) > 2)
  {
    return(c(NA,NA))
  }
  else
  {
    return(clean.location)
  }
}
city.state <- lapply (ufo.ok$loc, get.location)
# liste

location.matrix <- do.call (rbind, city.state)
# matrice à 2 colonnes
ufo2 <- transform (ufo.ok,
                   USCity = location.matrix[, 1],
                   USState = location.matrix[, 2],
                   stringsAsFactors = FALSE)
ufo2$USState <- state.abb[match(ufo2$USState, state.abb)]
ufo.us <- subset(ufo2, !is.na(USState))



length (which (is.na (location.matrix)))
# 1100
loc.pas.ok <- which (is.na (location.matrix))




# table -> # observation / état

# cartes des pays du monde : http://gadm.org/country










states <- map_data("state")
choro <- merge (states, arrests, sort = FALSE, by = "region")

write.csv (ufo.us, file = "ufo.us.csv", row.names = F)

