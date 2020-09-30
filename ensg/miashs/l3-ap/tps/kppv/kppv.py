from pylab import *
import matplotlib.pyplot as plt
import numpy

import csv
csvfile = open ("iris.data", "r")
lines = csv.reader(csvfile)
dataset = list (lines)
for x in range(len(dataset)):
  for y in range (4):
    dataset[x][y] = float(dataset[x][y])

#xx = numpy.linspace(-0.75, 1., 100)
#plt.scatter (xx, xx + 0.25*randn(len(xx)))
#plt.show()

les_x = []
les_y = []
les_couleurs = []

for i in range (0, len(dataset)):
    x = dataset [i] [2]
    y = dataset [i] [3]
    les_x.append (x)
    les_y.append (y)
    if dataset [i] [4] == 'Iris-setosa':
        couleur = 'blue'
    elif dataset [i] [4] == 'Iris-versicolor':
        couleur = 'green'
    else:
        couleur = 'red'
    plt.scatter (x, y, c = couleur)

plt.show ()
