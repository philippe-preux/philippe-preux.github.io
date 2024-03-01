'''
  dgs-perceptron-11iris2attributs.py

  Objet : descente de gradient pour le calcul des poids d'un perceptron
  prédisant la classe de 11 iris.

  Exemple de correction pour le TP (https://philippe-preux.github.io/ensg/l1-mi/tps/dgs-perceptron/).

  Auteur : Philippe Preux

  Date : 10 février 2024

  Utilisation : python3 -i dgs-perceptron-11iris2attributs.py
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

# Cette fonction est légérement différente que celle indiquée
# dans le sujet de TP.
# Le paramètre xlim permet d'indiquer le domaine de définition des abscisses
# et ainsi obtenir de plus jolies représentations.
def ajoute_droite (ax, a, b, c, xlim = [0, 5]):
    x1 = xlim
    y1 = [-(xlim[0]*b+a)/c, -(xlim[1]*b+a)/c]
    ax.plot (x1, y1, linestyle = ":")

# Même remarque que ci-dessus.
def ajoute_dernière_droite (fig, ax, a, b, c, xlim = [0, 5]):
    x1 = xlim
    y1 = [-(xlim[0]*b+a)/c, -(xlim[1]*b+a)/c]
    ax.plot (x1, y1, color = "red", linestyle = "-", linewidth= 3)
    fig.show ()
# fin du copié/collé

# Les 11 exemples :
entrées_small_iris = [[1.4, 0.2],
                      [4.0, 1.3],
                      [1.7, 0.4],
                      [1.6, 0.2],
                      [3.9, 1.2],
                      [5.1, 1.6],
                      [1.5, 0.3],
                      [4.0, 1.0],
                      [1.9, 0.4],
                      [4.1, 1.3],
                      [1.7, 0.5]]
sorties_small_iris = [0, 1, 0, 0, 1, 1, 0, 1, 0, 1, 0]


entrées = entrées_small_iris
sorties = sorties_small_iris
# initialisation aléatoire des poids :
a = b = -1
c = 1

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
