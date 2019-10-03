lancerDePiece <- function  (nblancers = 20, N = 20, pface = .25)
{
  ppile <- 1 - pface
  prior <- c (1/3, 1/3, 1/3)
  l <- c (0, 0, 0)
  res <- matrix (0, nrow = N, ncol = 3)

  for (i in 1:N) {
    d <- runif (nblancers) < pface
    nbface <- length (which (d))
    nbpile <- nblancers - nbface

    l [1] <- .5^nbface * .5^nbpile
    l [2] <- (1/3)^nbface * (2/3)^nbpile
    l [3] <- (1/4)^nbface * (3/4)^nbpile
    denom <- sum (l * prior)

    res [i,] <- l * prior / denom
    prior <- res [i,]
  }

  plot.new()
  plot.window (xlim = c(0,N), ylim = c(0,1))
  abline(h=0,lty=3)
  abline(h=1,lty=3)
  abline(v=0,lty=3)

  lines (res[,1], col = "blue")
  lines (res[,2], col = "green")
  lines (res[,3], col = "red")
  
  legend(.7*N, .75, yjust=0, c ("pas biaisée", '1/3', '1/4'),
    lwd=3, lty=1, col=c('blue', 'green', 'red'))
}
