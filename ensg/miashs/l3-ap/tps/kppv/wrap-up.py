import sys
sys.path.append("/home/ppreux/public_html/ensg/miashs/l3-ap/tps/kppv")

from csv import reader
from random import shuffle
from math import sqrt

csvfile = open ("iris.data", "r")
lines = reader(csvfile)
dataset = list (lines)
for x in range(len(dataset)):
  for y in range (4):
    dataset[x][y] = float(dataset[x][y])

import distanceEuclidienne
import lePlusProcheVoisin
import lesKplusProchesVoisins
import predire

import distanceEuclidienneExemple
import lePlusProcheVoisinExemple
import lesKplusProchesVoisinsExemple
import predireExemple

import constructionEntrainementEtTest

print (entrainement)
print (test)
