'''
  classification-supervisée.py

  Classification supervisée avec perceptron tanh sur les iris.

  Ce programme python contient une descente de gradient stochastique
  pour le calcul des poids d'un perceptron réalisant une tâche de
  classification binaire sur le jeu de données iris.

  Philippe Preux, Université de Lille, Avril 2024
'''

# Quelques fonctions pour obtenir une représentation graphique

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
    ax.set_xlabel ("Longueur des pétales")
    ax.set_ylabel ("Largeur des pétales")
    ax.set_title ("Jeu de données iris")
    return fig, ax

def debut_figure2 (X_train, Y_train, X_test, Y_test):
    fig, ax = plt.subplots ()
    couleurs = []
    for i in range (len (Y_train)):
        if Y_train [i] == 1:
            couleurs.append ("red")
        else:
            couleurs.append ("blue")
    for i in range (len (Y_train)):
        ax.scatter (X_train [i] [0], X_train [i] [1], color = couleurs [i], s = 2)
    couleurs = []
    for i in range (len (Y_test)):
        if Y_test [i] == 1:
            couleurs.append ("red")
        else:
            couleurs.append ("blue")
    for i in range (len (Y_test)):
        ax.scatter (X_test [i] [0], X_test [i] [1], color = couleurs [i], s = 10)
    ax.set_xlabel ("Longueur des pétales")
    ax.set_ylabel ("Largeur des pétales")
    ax.set_title ("Jeu de données iris")
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
    fig.show ()


'''
Le coeur du programme arrive.
'''

import numpy as np

# préparation des exemples

# On charge les iris
from sklearn import datasets
iris = datasets.load_iris()
entrées_iris = iris.data[:,[2,3,0,1]]

# Calcul des étiquettes binaires
N = len (iris.target) # le nombre d'exemples
Y_setosa = np.zeros ((N))
Y_virginica = np.zeros ((N))
for i in range (len (iris.target)):
    if iris.target [i] == 0:
        Y_setosa [i] = 1
    else:
        Y_setosa [i] = 0
    if iris.target [i] == 2:
        Y_virginica [i] = 1
    else:
        Y_virginica [i] = 0
# Par la suite, on utilise Y_setosa ou Y_virginica comme étiquettes

# Il est essentiel de centrer-réduire les attributs des données !!!!!
from sklearn.preprocessing import StandardScaler  
scaler = StandardScaler ()
scaler.fit (entrées_iris)
X = scaler.transform (entrées_iris)
# X contient les données centrées-réduites qui pourront
# être placées en entrée du perceptron.

from math import tanh

def calcule_erreur (X, Y, poids):
    '''
    Cette fonction retourne le nombre d'erreur de prédictions réalisées
    sur les données X.

    X, Y : les exemples avec lesquels on mesure l'erreur.
       X : les données,
       Y : les étiquettes. Y [i] est l'étiquette de X [i].

    poids : les poids du perceptron. poids [0] est le biais.
    '''
    nb_erreurs = 0
    for i in range (len (Y)):
        v = poids [0]
        for j in range (1, len (poids)):
            v += poids [j] * X [i, j-1]
        tanhv = tanh (v)
        if tanhv >= 0:
            classe_prédite = 1
        else:
            classe_prédite = 0
        if classe_prédite != Y [i]:
            nb_erreurs += 1
    return nb_erreurs

# La descente de gradient stochastique
def DGS (X_train, X_test, Y_train, Y_test, gnpa, ax,
            poids = [], eta = .01, graphique = False,
            Max_compteur = 50):
    '''
    Cette fonctionne calcule les poids du perceptron par
    descente de gradient stochastique.

    Paramètres :
      X_train, Y_train : les exemples d'entraînement
      X_test, Y_test : les exemles de test
      poids : valeur initiale des poids du perceptron
      gnpa : le générateur de nombres pseudo-aléatoires
      ax : axe pour la réalisation du graphique
      eta : le taux d'apprentissage
      graphique : booléen indiquant si on veut créer un graphique.
      Max_compteur : nombre d'itérations autorisées pendant lesquelles l'erreur de test ne décroît pas.

    Valeurs retournées :
      les poids
      la liste des erreurs de test au fil des itérations 
      la liste des erreurs d'entraînement au fil des itérations 
    '''
    if len (poids) == 0:
        for j in range (1 + X_train.shape [1]):
            poids.append (0)
    les_te = [] # la liste dees erreurs d'entraînement
    les_Te = [] # la liste des erreurs de test au fil des itérations
    N_train = len (Y_train)
    N_test = len (Y_test)
    test_erreur = calcule_erreur (X_test, Y_test, poids) / N_test
    prev_test_erreur = 1
    compteur = Max_compteur
    prev_poids = poids
    while ((prev_test_erreur - test_erreur) != 0) or (compteur > 0):
        prev_poids = poids
        if prev_test_erreur - test_erreur == 0:
            compteur -= 1
        else:
            compteur = Max_compteur
        permutation = gnpa.choice (np.arange (N_train), N_train,
                                        replace = False)
        for i in range (len (Y_train)):
            ii = permutation [i]
            v = poids [0]
            for j in range (1, len (poids)):
                v += poids [j] * X_train [ii, j-1]
            tanhv = tanh (v)
            if tanhv >= 0:
                classe_prédite = 1
            else:
                classe_prédite = 0
            d = classe_prédite - Y_train [ii]
            if d != 0:
                poids [0] -= eta * d * (1 - tanhv * tanhv)
                corrections = abs (eta * d * (1 - tanhv * tanhv))
                for j in range (1, len (poids)):
                    poids [j] -= eta * d * X_train [ii, j-1] * (1 - tanhv * tanhv)
                    corrections += abs (eta * d * X_train [ii, j-1] * (1 - tanhv * tanhv))
        prev_test_erreur = test_erreur
        train_erreur = calcule_erreur (X_train, Y_train, poids) / N_train
        test_erreur = calcule_erreur (X_test, Y_test, poids) / N_test
        les_te.append (train_erreur)
        les_Te.append (test_erreur)
        print ("{:.3f}, {:.3f}".format (train_erreur, test_erreur))
        if graphique:
            ajoute_droite (ax, poids [0], poids [1], poids [2])
    return poids, les_Te, les_te




# Initialisation du générateur de nombres pseudo-aléatoires
graine = int ("Perceptron", base=36)%2**31
gnpa = np.random.default_rng (graine)
#
Y = Y_virginica
# partitionnement du jeu d'exemples.
from sklearn.model_selection import train_test_split
X_train, X_test, Y_train, Y_test = train_test_split (X, Y,
                test_size = 0.2,
                random_state = np.random.RandomState (graine))
# on prépare le graphique
fig, ax = debut_figure2 (X_train, Y_train, X_test, Y_test)
# on calcule des poids
poids, les_Te, les_te = DGS (X_train, X_test, Y_train, Y_test, gnpa, ax, poids = [1, -3, 1, 0, -2], graphique = True, Max_compteur = 250)
# on termine le graphique et on l'affiche
ajoute_dernière_droite (fig, ax, poids [0], poids [1], poids [2])
plt.show ()

