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

def nbIterations (n):
    nb = 0
    m = n
    while m >= 10:
        m = sommeDesChiffres (m)
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
    b = pow (10, m)
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

hauteur = 300
largeur = 300
liste10couleurs = [ 'cyan2', 'green2', 'yellow2', 'wheat1', 'coral1',
                    'DeepPink2', 'maroon1', 'magenta2', 'DarkOrchid1', 
                    'thistle1' ]
facteur = 3
    
def dessineLeContenuDuCanvas ():
    n = 100
    for x in range (0, int (largeur / facteur)):
        for y in range (0, int (hauteur / facteur)):
            nb = nbIterations (n)
            can.create_rectangle (facteur*x, facteur*y,
                                  facteur*(x+1)-1, facteur*(y+1)-1,
                                  fill = liste10couleurs [nb], width = 0)
            n = n + 1

fenetre = Tk()
fenetre.title ("Conjecture")
boutonQuitter = Button (fenetre, text = 'Quitter', command = fenetre.quit)
boutonQuitter.pack (side=BOTTOM)
can = Canvas (fenetre, width=largeur, height = hauteur, bg = 'white')
can.pack (side = TOP)
for i in range (0,10):
    petitCanvas = Canvas (fenetre, width=facteur, height = facteur,
                          bg = liste10couleurs [i])
    petitCanvas.pack (side = RIGHT)
    
dessineLeContenuDuCanvas ()
fenetre.mainloop ()
fenetre.destroy ()
