'''
  dgs-perceptron-et-logique.py

  Objet : descente de gradient pour le calcul des poids d'un perceptron
  calculant le et logique.

  Exemple de correction pour le TP (https://philippe-preux.github.io/ensg/l1-mi/tps/dgs-perceptron/).

  Auteur : Philippe Preux

  Date : 10 février 2024

  Utilisation : python3 -i dgs-perceptron-et-logique.py
'''

# Je copie/colle les fonctions fournies pour la représentation graphique
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
        ax.scatter (entrées [i] [0], entrées [i] [1], color = couleurs [i], s = 2)
    return fig, ax

def ajoute_droite (ax, a, b, c):
    x1 = [0, 5]
    y1 = [-a/c, -(5*b+a)/c]
    ax.plot (x1, y1, linestyle = ":")

def ajoute_dernière_droite (fig, ax, a, b, c):
    x1 = [0, 5]
    y1 = [-a/c, -(5*b+a)/c]
    ax.plot (x1, y1, color = "red", linestyle = "-", linewidth= 3)
    fig.show ()
# fin du copié/collé

# Les 4 exemples :
entrées_et = [[0, 0], [0, 1], [1, 0], [1, 1]]
sorties_et = [0, 0, 0, 1]

entrées = entrées_et
sorties = sorties_et

# initialisation aléatoire des poids :
a = b = -1
c = 2

def signe (x):
    if x > 0:
        return 1
    else:
        return 0

fig, ax = debut_figure (entrées, sorties)
eta = 0.01
erreur = 1
compteur = 0
while (erreur != 0):
    erreur = 0
    compteur += 1
    for i in range (len (sorties)):
        s = signe (a + b * entrées [i] [0] + c * entrées [i] [1])
        d = s - sorties [i]
        erreur += d*d
        a -= eta * d
        b -= eta * d * entrées [i] [0]
        c -= eta * d * entrées [i] [1]
        ajoute_droite (ax, a, b, c)

ajoute_dernière_droite (fig, ax, a, b, c)
