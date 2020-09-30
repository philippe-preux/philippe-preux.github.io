"""
  squelette.py

  fourmis et brindilles
  
  Squelette de programme : il y a presque tout, sauf le déplacement des fourmis.
  Bien gérer ce déplacement nécessite d'ajouter des méthodes dans 
  la classe Espace.

"""

from random import *
from tkinter import *
from math import floor

class Espace (object):
    def __init__ (self, hauteur = 100, largeur = 100, NB = 500):
        self. largeur = largeur
        self. hauteur = hauteur
        self. contenu = [[None for i in range (largeur)] for j in range (hauteur)]
        for i in range (NB):
            posLibre = self.donneMoiUneCaseVide ()
            self. contenu [posLibre [0]] [posLibre [1]] = 'B'

    def donneMoiUneCaseVide (self):
        while True:
            x = randrange (self.largeur)
            y = randrange (self.hauteur)
            if self. contenu [x] [y] == None:
                break
        return [x, y]

    def dessineToi (self):
        """ A FAIRE : effacer le contenu en cours """
        can.create_rectangle (0, 0, can.winfo_width (), can.winfo_height (), 
                              fill="lightgreen", 
                              outline="lightgreen")
        """ c'est fait """

        for x in range (self.largeur):
            for y in range (self.hauteur):
                if self. contenu [x] [y] == 'B':
                    """ A FAIRE : dessiner une brindille """
                    can.create_rectangle (echelle * x,
                                          echelle * y,
                                          echelle * (x + 1) - 1,
                                          echelle * (y + 1) - 1, 
                                          fill="brown", outline = 'white')
                    """ c'est fait """
                elif self. contenu [x] [y] == 'F':
                    """ A FAIRE : dessiner une fourmi """
                    can.create_rectangle (echelle * x,
                                          echelle * y,
                                          echelle * (x + 1) - 1,
                                          echelle * (y + 1) - 1, 
                                          fill="blue", outline = 'white')
                    """ c'est fait """

class Fourmi(object):
    def __init__ (self, espace):
        positionLibre = espace.donneMoiUneCaseVide ()
        self. x = positionLibre [0]
        self. y = positionLibre [1]
        self. direction = ['N', 'E', 'S', 'O'] [randrange (0, 3)]
        self. chargee = False

    def avance (self):
        print ("j'avance")

class Simulation (object):
    def __init__ (self, NF = 10):
        self. espace = Espace ()
        self. fourmis = [Fourmi (self. espace) for i in range (NF)]

    def simuler (self):
        for fourmi in self.fourmis:
            fourmi.avance ()
        self. espace. dessineToi ()




def simuler ():
    global simulation
    simulation.simuler ()

simulation = Simulation ()

fenetre = Tk()
fenetre.title ("Fourmis et brindilles")

boutonSimuler = Button (fenetre, text = "Simuler", command = simuler)
boutonQuitter = Button (fenetre, text = 'Quitter', command = fenetre.quit)

echelle = floor (500 / simulation.espace.largeur)
can = Canvas (fenetre, width = simulation.espace.largeur * echelle, 
              height = simulation.espace.hauteur * echelle, bg = 'lightgreen')

can.grid (row = 1, column = 1)

boutonQuitter.grid (row = 2, column = 1)
boutonSimuler.grid (row = 1, column = 2)

fenetre.mainloop ()
fenetre.destroy ()
