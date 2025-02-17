'''
  dgs-perceptron-iris2attributs.py

  Objet : descente de gradient pour le calcul des poids d'un perceptron
  prédisant la classe de iris Setosa vs. les autres.

  Exemple de correction pour le TP (https://philippe-preux.github.io/ensg/l1-mi/tps/dgs-perceptron/).

  Auteur : Philippe Preux

  Date : 10 février 2024

  Utilisation : python3 -i dgs-perceptron-iris2attributs.py
'''

# Je copie/colle les fonctions fournies pour la représentation graphique
import matplotlib.pyplot as plt

def debut_figure (entrées, sorties):
    fig, ax = plt.subplots ()
    ax. set_ylim (-3, 3)
    couleurs = []
    for i in range (len (sorties)):
        if sorties [i] == 1:
            couleurs.append ("red")
        else:
            couleurs.append ("blue")
    for i in range (len (sorties)):
        ax.scatter (entrées [i] [0], entrées [i] [1], color = couleurs [i], s = 2)
    return fig, ax

# Cette fonction est légérement différente que celle indiquée
# dans le sujet de TP.
# Le paramètre xlim permet d'indiquer le domaine de définition des abscisses
# et ainsi obtenir de plus jolies représentations.
def ajoute_droite (ax, a, b, c, xlim = [0, 7]):
    x1 = xlim
    y1 = [-(xlim[0]*b+a)/c, -(xlim[1]*b+a)/c]
    ax.plot (x1, y1, linestyle = ":")

# Même remarque que ci-dessus.
def ajoute_dernière_droite (fig, ax, a, b, c, xlim = [0, 7]):
    x1 = xlim
    y1 = [-(xlim[0]*b+a)/c, -(xlim[1]*b+a)/c]
    ax.plot (x1, y1, color = "red", linestyle = "-", linewidth= 3)
    fig.show ()
# fin du copié/collé


# On récupère le jeu de données iris :
from sklearn import datasets
iris = datasets.load_iris()
entrées_iris = iris.data[:,2:4]
# On calcule les étiquettes à prédire :
sorties_iris = []
for i in range (len (iris.target)):
    if iris.target [i] == 0:
        sorties_iris.append (0)
    else:
        sorties_iris.append (1)

entrées = entrées_iris
sorties = sorties_iris
a = 1
b = -3
c = 0

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
    ajoute_droite (ax, a, b, c, [0, 7])

ajoute_dernière_droite (fig, ax, a, b, c, [0, 7])

