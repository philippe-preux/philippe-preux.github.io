# conjecture-fun.py
#

from random import *
from tkinter import *
from colors import *

def sommeDesChiffres (n):
    somme = 0
    while n != 0:
        somme = somme + n % 10
        n = n / 10
    return (somme)

def produitDesChiffres (n):
    produit = 1
    while n != 0:
        produit = produit * (n % 10)
        n = n / 10
    return (produit)

def nbIterations (n):
    nb = 0
    m = n
    while m >= 10:
        m = produitDesChiffres (m)
        nb = nb + 1
    return (nb)

def testeIntervalle (a, b):
    liste = []
    for n in range (a, b + 1):
        if nbIterations (n) > 11:
            liste = liste + n
    return (liste)

def histoIntervalle (a, b):
    histo = []
    for i in range (0, 10):
        histo.append (0)
    for n in range (a, b + 1):
        m = nbIterations (n)
        print (str (n) + ": " + str (m))
        histo [m] = histo [m] + 1
    return (histo)

def testeNbAleatoires (n, m):
    histo = []
    for i in range (0, 10):
        histo.append (0)
    a = pow (10, m - 1);
    b = pow (10, m) - 1
    for i in range (0, n):
        nb = randint (a, b)
        print (nb)
        m = nbIterations (nb)
        histo [m] = histo [m] + 1
    return (histo)

print (nbIterations (1966))
print (nbIterations (237601))
print (nbIterations (1234567890))
#print (testeIntervalle (100, 159))
#print (histoIntervalle (99999991234567890, 99999991234569890))
#print (testeNbAleatoires (10, 2000))

hauteur = 500
largeur = 1000
liste13couleurs = ['white','brown','red','orange','yellow', 'green',
                   'cyan','blue','purple','grey','magenta','pink','black']
facteur = 5

def dessineLeContenuDuCanvasApartir (n = 100):
    for ligne in range (0, int (hauteur / facteur)):
        for colonne in range (0, int (largeur / facteur)):
            nb = nbIterations (n)
            can.create_rectangle (facteur*colonne, facteur*ligne,
                                  facteur*(colonne+1)-1, facteur*(ligne+1)-1,
                                  fill = liste13couleurs [nb], width = 0)
            n = n + 1

def dessineLeContenuDuCanvasNbAleatoires (m = 50):
    a = pow (10, m - 1);
    b = pow (10, m) - 1
    for ligne in range (0, int (hauteur / facteur)):
        for colonne in range (0, int (largeur / facteur)):
            n = randint (a, b)
            nb = nbIterations (n)
            if nb > 11:
                print (str (n) + "viole la conjecture !")
            can.create_rectangle (facteur*colonne, facteur*ligne,
                                  facteur*(colonne+1)-1, facteur*(ligne+1)-1,
                                  fill = liste13couleurs [nb], width = 0)

fenetre = Tk()
fenetre.title ("Conjecture")
boutonQuitter = Button (fenetre, text = 'Quitter', command = fenetre.quit)
boutonQuitter.grid (row = 4, column = 6, columnspan = 3)
can = Canvas (fenetre, width = largeur, height = hauteur, bg = 'white')
can.grid (row = 1, column = 1, columnspan = 13)
for i in range (0,13):
    petitCanvas = Canvas (fenetre, width = 3*facteur, height = 3*facteur,
                          bg = liste13couleurs [i])
    petitCanvas.grid (row = 2, column = i + 1)
    if i != 12:
        t = Label (fenetre, text = str (i))
    else:
        t = Label (fenetre, text = "> 11")
    t.grid (row = 3, column = i + 1)

#dessineLeContenuDuCanvasApartir (1)
dessineLeContenuDuCanvasNbAleatoires ()
fenetre.mainloop ()
fenetre.destroy ()
