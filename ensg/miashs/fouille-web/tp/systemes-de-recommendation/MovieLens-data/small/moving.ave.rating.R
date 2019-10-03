moving.ave <- function (n)
  {
    ratings <- u.data [u.data$V2 == n, ]
    if (nrow (ratings > 100)) {
      r.idx <- sort (ratings$V4, index.return = T)
      toto <- numeric (nrow (ratings) - 20)
      for (i in 10:(nrow(ratings)-10)) {
        toto [i - 9] <- mean (ratings$V3 [r.idx$ix [i + seq (-10, 10)]])
      }
      return (toto)
    } else {
      return (NA)
    }
  }

ratings <- function (n)
  {
    ratings <- u.data [u.data$V2 == n, ]
    toto <- sort (ratings$V4, index.return = T)
    return (ratings$V3 [toto$ix])
  }
