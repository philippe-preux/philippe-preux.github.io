'''

  separation-Viriginca-par-perceptron-tanh.py

  Philippe Preux, philippe.preux@univ-lille.fr

  Mars 2024

  Exemple de correction du TP
      https://philippe-preux.github.io/ensg/l1-mi/tps/perceptron-non-linéaire/

  On considère le cas non séparable consistant à séparer les iris Virginica
  des deux autres classes.
  On utilise seulement les 2 attributs pétales des iris.

  On itère tant que les corrections sont > seuil.

  Nb erreur(s) final : 6 après 129 itérations.
'''

import matplotlib.pyplot as plt

def debut_figure (entrées, sorties):
    fig, ax = plt.subplots ()
    couleurs = []
    for i in range (len (sorties)):
        if sorties [i] == 1:
            couleurs.append ("red")
        else:
            couleurs.append ("blue")
    for i in range (len (sorties)):
        ax.scatter (entrées [i, 0], entrées [i, 1], color = couleurs [i], s = 2)
    return fig, ax

def ajoute_droite (ax, a, b, c, xlim = [-2, 2]):
    x1 = xlim
    y1 = [-(xlim[0]*b+a)/c, -(xlim[1]*b+a)/c]
    ax.set_ylim (bottom = -5, top = 5)
    ax.plot (x1, y1, linestyle = ":")

def ajoute_dernière_droite (fig, ax, a, b, c, xlim = [-2, 2]):
    x1 = xlim
    y1 = [-(xlim[0]*b+a)/c, -(xlim[1]*b+a)/c]
    ax.set_ylim (bottom = -5, top = 5)
    ax.plot (x1, y1, color = "red", linestyle = "-", linewidth= 3)
    ax.set_xlabel ("Longueur des pétales")
    ax.set_ylabel ("Largeur des pétales")
    ax.set_title ("Séparation des iris Virginica\npar un perceptron tanh")
    plt.show ()

from sklearn import datasets
iris = datasets.load_iris()
entrées_iris = iris.data[:,2:4]

'''
  Il est essentiel de centrer-réduire !!!!!
'''
from sklearn.preprocessing import StandardScaler  
scaler = StandardScaler ()
scaler.fit (entrées_iris)
entrées_iris = scaler.transform (entrées_iris)
entrées = entrées_iris

import numpy as np
sorties_iris = []
for i in range (len (iris.target)):
    if iris.target [i] != 2:
        sorties_iris.append (0)
    else:
        sorties_iris.append (1)
sorties = np.array (sorties_iris)

from math import tanh

# Initialisation des 3 poids
a = 1
b = -3
c = 0

fig, ax = debut_figure (entrées, sorties)
η = 0.01
erreur = 1
compteur = 0
prev_corrections = 11 # pour pouvoir entrer dans le tant-que
corrections = 10      # pour pouvoir entrer dans le tant-que
ε = 0.0001
while (abs (prev_corrections - corrections) > ε):
    prev_corrections = corrections
    corrections = 0
    erreur = 0
    compteur += 1
    prev_a = a
    prev_b = b
    prev_c = c
    # On prédit chaque exemple et on corrige les poids si besoin
    for i in range (len (sorties)):
        v = a + b * entrées [i, 0] + c * entrées [i, 1]
        tanhv = tanh (v)
        if tanhv >= 0:
            classe_prédite = 1
        else:
            classe_prédite = 0
        d = classe_prédite - sorties [i]
        if d != 0:
            erreur += 1
            a -= η * d * (1 - tanhv * tanhv)
            b -= η * d * entrées [i, 0] * (1 - tanhv * tanhv)
            c -= η * d * entrées [i, 1] * (1 - tanhv * tanhv)
            corrections += abs (η * d * (1 + entrées [i, 0] + entrées [i, 1]) * (1 - tanhv * tanhv))
    ajoute_droite (ax, a, b, c)

ajoute_dernière_droite (fig, ax, a, b, c)
print ("Nb erreur(s) final : {:d} après {:d} itérations.".format (erreur, compteur))
