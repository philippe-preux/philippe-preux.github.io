
f <- function (x)
    {
        (x+0.4)*(x+.2)*(x-.07)*(x-.3)*(x-1.)
    }

N <- 100
les.x <- runif (N, min = -.5, max = 1.01) #seq (-.5, 1.01, by = .01)
les.x.sort <- sort (les.x)
les.y <- f (les.x.sort) + rnorm (length (les.x), sd = .0)
les.yb <- f (les.x.sort) + rnorm (length (les.x), sd = .005)

plot (les.x.sort, les.y, type = "l")
points (les.x.sort, les.yb, pch = 19)

write.table (data.frame (x = les.x.sort, y = les.y), file = "cc.txt", row.names = F)

require (nnet)

do.it <- function ()
    {
        train <- as.matrix (read.table ("./cc.txt", header = T))
        x <- train [, 1, drop = F]
        y <- train [, 2]
        plot (x, y)
        pmc <- nnet (x, y, size = 5, linout = TRUE, maxit = 100, trace = F)
        RMSE <- rep (0, times = 100) 
        for (i in 1:10) {
            pmc <- nnet (x, y, size = i, linout = TRUE, maxit = 100, trace = F)
            RMSE [i] <- sum ((y - predict (pmc, x, type = "raw"))^2)
        }
        plot (RMSE)
        plot (RMSE, xlim = c(1,10))
    }
