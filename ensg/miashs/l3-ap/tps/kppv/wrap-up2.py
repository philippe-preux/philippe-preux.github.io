from csv import reader
from math import sqrt

csvfile = open ("iris.data", "r")
lines = reader(csvfile)
dataset = list (lines)
for x in range(len(dataset)):
  for y in range (4):
    dataset[x][y] = float(dataset[x][y])

from distanceEuclidienne import *
print ("import 1 done")
#from distanceEuclidienneExemple import *
print (distance (dataset [0][0:4], dataset [1][0:4]))
print (distance (dataset [0][0:4], dataset [149][0:4]))
print ("import 2 done")
