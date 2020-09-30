import csv
from math import sqrt, exp
from random import shuffle

csvfile = open ("iris.data", "r")
lines = csv.reader (csvfile)
dataset = list (lines)

for x in range (len (dataset)):
  for y in range (4):
    dataset[x][y] = float (dataset[x][y])

def distance (a, b):
    if (len (a) != len (b)):
        return (-1)
    somme = 0
    for i in range (len (a)):
        somme += (a [i] - b [i]) * (a [i] - b [i])
    return (sqrt (somme))

def lePlusProcheVoisin (x):
    lePlusPres = 0
    distanceMin = float("inf")
    for i in range(len(entrainement)):
        di = distance (x, dataset [entrainement [i]][0:4])
        if di != 0 and di < distanceMin:
            lePlusPres = i
            distanceMin = di
    return (lePlusPres)

def lesKplusProchesVoisins (x, k):
  listeDesDistances = []
  for i in range (len (entrainement)):
    listeDesDistances.append (distance (x, dataset [entrainement [i]] [0:4]))
  Kppv = []
  for i in range (k):
    p = float ("inf")
    for j in range (len (entrainement)):
      if listeDesDistances [j] != 0 and listeDesDistances [j] < p and j not in Kppv:
        p = listeDesDistances [j]
        indice = j
    Kppv. append (indice)
  return (Kppv)

def predire (l):
  lesEtiquettes = ['Iris-setosa', 'Iris-versicolor', 'Iris-virginica']
  decomptes = [0, 0, 0]
  for exemple in l :
    for i in range (3):
      if dataset [exemple] [4] == lesEtiquettes [i]:
        decomptes [i] += 1
  plusGrandDecompte = decomptes [0]
  indice = 0
  for i in range (1,3):
    if decomptes [i] > plusGrandDecompte:
      plusGrandDecompte = decomptes [i]
      indice = i
  return (lesEtiquettes [indice])

def go (k, p):
    global entrainement
    listeDesIndices = [i for i in range (len (dataset))]
    nbExEnt = int (p * len(dataset))
    shuffle (listeDesIndices)
    entrainement = listeDesIndices [0:nbExEnt]
    test = listeDesIndices [nbExEnt:len(dataset)]
    nombreErreurs = 0
    for exemple in test:
      if predire (lesKplusProchesVoisins (dataset [exemple][0:4], k)) != dataset [exemple][4]:
        nombreErreurs += 1
    print (float (nombreErreurs) / len (test))

go (3, .9)
