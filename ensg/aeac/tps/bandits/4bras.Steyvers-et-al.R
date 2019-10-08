#
# 4bras.Steyvers-et-al.R
#
# Oct. 2013
#

source ("http://www.grappa.univ-lille3.fr/~ppreux/ensg/aeac/tps/bandits/4bras.Steyvers-et-al.fct.R")

if (system ("logname", intern = T) == "ppreux") {
  session.Steyvers.et.al (2, 20)
} else {
  session.Steyvers.et.al (20, 20)
}

