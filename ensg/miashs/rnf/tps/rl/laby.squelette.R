
if (! exists ("laby")) {
    url <- "https://philippe-preux.github.io/ensg/miashs/rnf/tps/rl/"
# choisissez le labyrinthe qui vous plait en commentant les lignes ad hoc.
#laby <- "laby.1bis"
#laby <- "laby.2bis"
#laby <- "laby.4bis"
    laby <- "laby.aeac2015"
    filename <- paste (url, laby, sep = "")
}

etat.initial <- NA

size <- scan (file = filename, what = integer(), n = 2, quiet = T)
hauteur <- size [1]
largeur <- size [2]
all.lines <- readLines (filename)
content <- all.lines [2:(hauteur+1)]

laby.env <- new.env ()

m <- matrix (data = 0, nrow = hauteur, ncol = largeur)
case <- 1
for (ligne in 1:hauteur) {
    for (colonne in 1:largeur) {
        if (substring (content [ligne], colonne, colonne) != "*") {
            m [ligne, colonne] <- case
            case <- case + 1
        }
    }
}
nb.cases <- case - 1
position.cases <- matrix (0, nrow = nb.cases, ncol = 2)
for (i in 1:hauteur)
    for (j in 1:colonne)
        if (m [i, j] != 0)
            position.cases [m [i, j], ] <- c (i, j)

if (length (all.lines >= hauteur + 1)) {
    xy.sortie <- scan (filename, what = double(), n = 2, skip = hauteur + 1,
                       quiet = T)
} else {
    xy.sortie <- NA
}
if (length (all.lines >= hauteur + 2)) {
    xy.initial <- scan (filename, what = double(), n = 2, skip = hauteur + 2,
                        quiet = T)
} else {
    xy.initial <- NA
}

if (laby == "laby.1bis") {
    sortie <- ifelse (any (is.na (xy.sortie)), m [8, 6],
                      m [xy.sortie [1], xy.sortie [2]])
    etat.initial <- ifelse (is.na (etat.initial), m [5, 3],
                            m [xy.initial [1], xy.initial [2]])
}
if (laby == "laby.2bis") {
    sortie <- ifelse (any (is.na (xy.sortie)), m [11, 21],
                      m [xy.sortie [1], xy.sortie [2]])
    etat.initial <- ifelse (is.na (etat.initial), m [17, 13],
                            m [xy.initial [1], xy.initial [2]])
}
if (laby == "laby.4bis") {
    sortie <- ifelse (any (is.na (xy.sortie)), m [6, 12],
                      m [xy.sortie [1], xy.sortie [2]])
    etat.initial <- ifelse (is.na (etat.initial), m [15, 2],
                            m [xy.initial [1], xy.initial [2]])
}
if (laby == "laby.aeac2015") {
    sortie <- ifelse (any (is.na (xy.sortie)), m [12, 10],
                      m [xy.sortie [1], xy.sortie [2]])
    etat.initial <- ifelse (is.na (etat.initial), m [9, 5],
                            m [xy.initial [1], xy.initial [2]])
}

compute.min.distance <- function (m)
{
    H <- nrow (m)
    L <- ncol (m)
    for (ligne in 1:H)
        for (colonne in 1:L) {
            if (m [ligne, colonne] == sortie) {
                sortie = m [ligne, colonne]
                break
            }
        }
    if (is.na (sortie)) {
        cat ("Sortie non trouvée!\n")
        return (NA)
    }
    distance <- rep (NA, times = nb.cases)
    liste <- rep (NA, times = nb.cases)
    distance [sortie] <- d <- 0
    tete <- 0
    queue <- 1
    liste [1] <- sortie
#   c (ceiling (which (m == 10) / H), which (m == 10) %% H) 
    while (tete != queue) {
        tete <- tete + 1
        e <- liste [tete]
        x.y <- position.cases [e, ]
        x <- x.y [1]
        y <- x.y [2]
        if ((y > 1) & (m [x, y - 1] != 0)) {
            ee <- m [x, y - 1]
            if (is.na (distance [ee])) {
                distance [ee] <- distance [e] + 1
                queue <- queue + 1
                liste [queue] <- ee
            }
        }
        if ((y < L) & (m [x, y + 1] != 0)) {
            ee <- m [x, y + 1]
            if (is.na (distance [ee])) {
                distance [ee] <- distance [e] + 1
                queue <- queue + 1
                liste [queue] <- ee
            }
        }
        if ((x > 1) & (m [x - 1, y] != 0)) {
            ee <- m [x - 1, y]
            if (is.na (distance [ee])) {
                distance [ee] <- distance [e] + 1
                queue <- queue + 1
                liste [queue] <- ee
            }
        }
        if ((x < H) & (m [x + 1, y] != 0)) {
            ee <- m [x + 1, y]
            if (is.na (distance [ee])) {
                distance [ee] <- distance [e] + 1
                queue <- queue + 1
                liste [queue] <- ee
            }
        }
    }
    return (distance)
}

if (TRUE) {
    greedy <- function (col = 3)
    {
        mmg <- matrix (Inf, nrow = nrow (m), ncol = ncol (m))
        for (i in 1:nrow (mm))
            for (j in 1:ncol (mm))
                if (! is.na (mm [i, j])) {
                    if (m [i, j] != 0) {
                        indice <- which ((df$x == i) & (df$y == j))
                        mmg [i, j] <- ifelse (length (indice) != 0, df [indice, col], 0)
                    }
                }
        greedy.move <- matrix ('', nrow = nrow (m), ncol = ncol (m))
        for (i in 1:nrow(m))
            for (j in 1:ncol (m))
                if (m [i, j] != 0) {
                    greedy.move [i, j] <- '.'
                    v <- mm [i, j]
                    if (is.na (v)) {
                        greedy.move [i, j] <- '.'
                        next
                    }
                    if ((i > 1) & (mmg [i - 1, j] < v)) {
                        v <- mmg [i - 1, j]
                        greedy.move [i, j] <- '^'
                    }
                    if ((i < H) & (mmg [i + 1, j] < v)) {
                        v <- mmg [i + 1, j]
                        greedy.move [i, j] <- 'v'
                    }
                    if ((j > 1) & (mmg [i, j - 1] < v)) {
                        v <- mmg [i, j - 1]
                        greedy.move [i, j] <- '<'
                    }
                    if ((j < L) & (mmg [i, j + 1] < v)) {
                        v <- mmg [i, j + 1]
                        greedy.move [i, j] <- '>'
                    }
                }
        return (greedy.move)
    }
    
    set.seed (23071966)
    distance <- compute.min.distance (m)
    mm <- m
    mmd <- m
    gamma <- .99
    for (i in 1:nrow(m))
        for (j in 1:ncol (m))
            if (m [i, j] != 0)
                mm [i, j] <- distance [m [i, j]]

    df.x <- rep (NA, times = length (which (! is.na (distance))) - 1)
    df.y <- rep (NA, times = length (which (! is.na (distance))) - 1)
    df.d <- rep (NA, times = length (which (! is.na (distance))) - 1)
    df.gd <- rep (NA, times = length (which (! is.na (distance))) - 1)
    ii <- 1
    for (i in 1:nrow(m))
        for (j in 1:ncol (m))
            if ((! is.na (mm [i, j])) & (mm [i, j] != 0)) {
                df.x [ii] <- i
                df.y [ii] <- j
                df.d [ii] <- mm [i, j]
                df.gd [ii] <- gamma^mm [i, j]
                ii <- ii + 1
            }
    df.x <- scale (df.x)
    df.y <- scale (df.y)
    df <- data.frame (x = df.x, y = df.y, d = df.d, gd = df.gd)

    {
        greedy.on.distance <- greedy (m, col = 3)
        print.it (m)
        print.policy (m, greedy.on.distance)
        title ("Greedy policy based on distance to goal")
        
        best.prediction.mlp <- read.csv ("/home/ppreux/tmp/sc-mlp/df.out.4bis.pred.Adam0.5.csv", header = F)
        df$bmlp <- best.prediction.mlp$V3
        greedy.on.bmlp <- greedy (col = 6)
        
        x11 ()
        print.it (m)
        print.policy (m, greedy.on.bmlp)
        title ("Greedy policy based on best MLP")
    }

    if (FALSE) {
        # pour la prédiction, mieux vaut utiliser le code python ~/tmp/sc-mlp/sc-mlp.py qui est bcp + rapide
        # ensuite, on récupère les prédictions comme ci-dessus.
        require (neuralnet)
        pmc <- neuralnet (d ~ x + y, data = df, hidden = c (4, 3),
                          linear.output = T,
                          act.fct = "tanh", stepmax = 1e+6, rep = 10)
        df.predict <- as.numeric (predict (pmc, df))
        plot (df$d)
        points (df.predict, pch = 19, col = "red")
    }
}

print.it <- function (m)
{
    plot.new ()
    H <- nrow (m)
    L <- ncol (m)
    dh <- 1. / H
    dl <- 1. / L
    for (ligne in 1:H)
        for (colonne in 1:L) {
            if (m [ligne, colonne] == 0)
                rect ((colonne - 1) * dl, (H - ligne) * dh,
                      colonne * dl,
                      (H - ligne + 1) * dh, col = "black")
            else if (m [ligne, colonne] == sortie)
                rect ((colonne - 1) * dl + dl / 5,
                (H - ligne) * dh + dh / 5,
                colonne * dl - dl / 5,
                (H - ligne + 1) * dh - dh / 5,
                border = NA, col = "green")
            else if (m [ligne, colonne] == etat.initial)                    
                rect ((colonne - 1) * dl + dl / 5,
                (H - ligne) * dh + dh / 5,
                colonne * dl - dl / 5,
                (H - ligne + 1) * dh - dh / 5,
                border = NA, col = "orange")
        }
}

# il faut avoir appeler print.it (labyrinthe) avant d'appeler print.policy ()
print.policy <- function (m, policy)
{
    H <- nrow (m)
    L <- ncol (m)
    dh <- 1. / H
    dl <- 1. / L
    for (i in 1:nrow (m))
        for (j in 1:ncol (m))
            if (nchar (policy [i, j]) != 0) {
                text ((j - .5) * dl, (H - i + .5) * dh, policy [i, j], col = "red")
            }
}

print.diff.policy <- function (m, policy.ref, policy)
{
    H <- nrow (m)
    L <- ncol (m)
    dh <- 1. / H
    dl <- 1. / L
    for (i in 1:nrow (m))
        for (j in 1:ncol (m))
            if (nchar (policy [i, j]) != 0)
                if (policy.ref [i, j] != policy [i, j])
                    rect ((j - 1) * dl, (H - i) * dh,
                      j * dl, (H - i + 1) * dh, col = "yellow")
}

display.greedy.policy <- function (filename, m, df, greedy.on.distance)
{
    best.prediction.mlp <- read.csv (filename, header = F)
    df$bmlp <- best.prediction.mlp$V3
    greedy.on.bmlp <- greedy (col = 6)
    print.it (m)
    print.diff.policy (m, greedy.on.distance, greedy.on.bmlp)
    print.policy (m, greedy.on.bmlp)
    cat (length (which (greedy.on.distance != greedy.on.bmlp, arr.ind = T)),
         "cellules jaunes\n")
}

# il faut avoir appeler print.it (labyrinthe) avant d'appeler print.traj ()
print.traj <- function (idx, incremental = FALSE)
{
    file.in <- paste ("traj.", idx, sep = "")
    if (file.exists (file.in)) {
        H <- nrow (m)
        L <- ncol (m)
        dh <- 1. / H
        dl <- 1. / L
        traj <- scan (file.in, quiet = TRUE)
        alpha <- .4 # 7000 : .1 ; 70 : .7 
        for (i in 1:(length (traj) - 1)) {
            debut <- position.cases [traj [i], ]
            fin <- position.cases [traj [i + 1], ]
            noise <- runif (1, min = -.005, max = .005)
            points ((debut [2] - .5) * dl, (H - debut [1] + .5) * dl,
                    pch = 19, col = "white")
            lines (c ((debut [2] - .5) * dl, (fin [2] - .5) * dl),
                   noise +
                   c ((H - debut [1] + .5) * dh, (H - fin [1] + .5) * dh),
                   col = rgb (.4, .4, .4, alpha = alpha))
            points ((fin [2] - .5) * dl, (H - fin [1] + .5) * dh,
                    pch = 19, col = 1)
            if (incremental)
                readLines (n=1)
        }
    }
}



actions.possibles <- function (etat)
    {
        ap <- c ()
        p <- position.cases [etat, ]
        if (p [2] > 1)
            if (m [p [1], p [2] - 1] != 0)
                ap <- c (ap, 1)
        if (p [2] < largeur)
            if (m [p [1], p [2] + 1] != 0)
                ap <- c (ap, 2)
        if (p [1] > 1)
            if (m [p [1] - 1, p [2]] != 0)
                ap <- c (ap, 3)
        if (p [1] < hauteur)
            if (m [p [1] + 1, p [2]] != 0)
                ap <- c (ap, 4)
        return (ap)
    }

laby.1bis.mur <- function (a = NULL, b = NULL)
    {
        if (is.null (a) & is.null (b))
            m [8, 5] <- 0
    }
laby.1bis.dmur <- function (a = NULL, b = NULL)
    {
        if (is.null (a) & is.null (b))
            m [8, 5] <- 23
    }

les.actions.possibles <- list ()
for (i in 1:nb.cases)
    les.actions.possibles [[i]] <- actions.possibles (i)

assign ("r.sortie.atteinte", 100, envir = laby.env)
assign ("r.sortie", 100, envir = laby.env)

annule.retour.a.la.sortie <- function ()
    {
        assign ("r.sortie", 0, envir = laby.env)
    }
remet.retour.a.la.sortie <- function ()
    {
        assign ("r.sortie", get ("r.sortie.atteinte", envir = laby.env),
                envir = laby.env)
    }

transition <- function (etat.courant, action)
    {
        ne <- etat.courant
        p <- position.cases [etat.courant, ]
        if (action == 1) { # gauche
            if (p [2] > 1)
                if (m [p [1], p [2] - 1] != 0) {
                    ne <- m [p [1], p [2] - 1]
                }
        } else if (action == 2) { # droite
            if (p [2] < largeur)
                if (m [p [1], p [2] + 1] != 0) {
                    ne <- m [p [1], p [2] + 1]
                }
        } else if (action == 3) { # haut 
            if (p [1] > 1)
                if (m [p [1] - 1, p [2]] != 0) {
                    ne <- m [p [1] - 1, p [2]]
                }
        } else if (action == 4) { # bas
            if (p [1] < hauteur)
                if (m [p [1] + 1, p [2]] != 0) {
                    ne <- m [p [1] + 1, p [2]]
                }
        }
        r <- ifelse (ne == sortie, get ("r.sortie", envir = laby.env), 0)
        return (list (etat.suivant = ne, retour = r))
    }

which.is.max <- function (x)
    {
        le.maximum <- max (x)
        indices.du.maximum <- which (x == le.maximum)
        if (length (indices.du.maximum) > 1)
            return (sample (indices.du.maximum, 1))
        else
            return (indices.du.maximum)
    }

alpha <- 1
gamma <- .99




generate.classif.dataset <- function (policy)
{
    df.x <- rep (0, times = length (which (! is.na (policy))))
    df.y <- rep (0, times = length (which (! is.na (policy))))
    df.c <- rep (0, times = length (which (! is.na (policy))))
    k <- 1
    for (i in 1:nrow (policy))
        for (j in 1:ncol (policy))
            if (! is.na (policy [i, j])) {
                df.x [k] <- i
                df.y [k] <- j
                df.c [k] <- policy [i, j]
                k <- k + 1
            }
    df.. <- ifelse (df.c == 0, 1, 0)
    df.g <- ifelse (df.c == 1, 1, 0)
    df.d <- ifelse (df.c == 3, 1, 0)
    df.h <- ifelse (df.c == 2, 1, 0)
    df.b <- ifelse (df.c == 4, 1, 0)
    
    return (data.frame (x = scale (df.x), y = scale (df.y),
                        s = df.., g = df.g, d = df.d, h = df.h, b = df.b))
}
dfc <- generate.classif.dataset (greedy.on.distance.classif)
write.csv (dfc, file = "4bis.classif.csv", row.names = F)
