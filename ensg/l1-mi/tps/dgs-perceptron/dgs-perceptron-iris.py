'''
  dgs-perceptron-iris.py

  Objet : descente de gradient pour le calcul des poids d'un perceptron
  prédisant la classe de iris Virginica vs. les autres,
  qui n'est pas linéairement séparable.

  Exemple de correction pour le TP (https://philippe-preux.github.io/ensg/l1-mi/tps/dgs-perceptron/).

  Auteur : Philippe Preux

  Date : 10 février 2024

  Utilisation : python3 -i dgs-perceptron-iris.py
'''



# On récupère le jeu de données iris :
from sklearn import datasets
iris = datasets.load_iris()
entrées_iris = iris.data[:,[2,3,0,1]]
# On calcule les étiquettes à prédire :
sorties_iris = []
for i in range (len (iris.target)):
    if iris.target [i] == 2:
        sorties_iris.append (1)
    else:
        sorties_iris.append (0)

entrées = entrées_iris
sorties = sorties_iris
# On initialise les poids.
# Dans ce programme, les poids ne sont pas stockés dans des variables
# différentes mais dans une liste. C'est ainsi qu'il faut procéder car
# cela simplifie beaucoup l'écriture du programme puisqu'il est indépendant
# du nombre de poids.
p = [1, -3, 1, 1, 2]

def signe (x):
    if x > 0:
        return 1
    else:
        return 0

eta = 0.01
nb_erreurs = 150
prev_nb_erreurs = 151
while (prev_nb_erreurs > nb_erreurs):
    prev_nb_erreurs = nb_erreurs
    nb_erreurs = 0
    # On parcourt tous les exemples :
    for i in range (len (sorties)):
        potentiel = p [0]
        for j in range (1, len (p)):
            potentiel += p [j] * entrées [i] [j-1]
        s = signe (potentiel)
        d = s - sorties [i]
        if d != 0:
            nb_erreurs += 1
            p [0] -= eta * d
            for j in range (1, len (p)):
                p [j] -= eta * d * entrées [i] [j-1]
    print ("Nombre d'erreurs : {:d}".format (nb_erreurs))

