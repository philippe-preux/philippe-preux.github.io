"""
  mvtBrownien.py 

  Philippe Preux, 14/1/2013
"""

from tkinter import *
from math import floor
from random import randrange
from colors import COLORS

class Terrain(object):
    """
      attributs : tailleX, tailleY
      méthodes: __init__(), tailleX(), tailleY()
    """
    def __init__ (self, tailleX, tailleY):
        self.tailleX = tailleX
        self.tailleY = tailleY
    def tailleX (self):
        return self.tailleX
    def tailleY (self):
        return self.tailleY

class Particule(object):
    """
      attributs : terrain, x, y, wrapped, numero, couleur
      méthodes: __init__(), pos(), move()
    """
    def __init__ (self, terrain, numero):
        self. terrain = terrain
        self. x = terrain.tailleX / 2
        self. y = terrain.tailleY / 2
        self. numero = numero
        self. couleur = COLORS [floor (478 / (1 + numero))]

    def pos (self):
        return [self.x, self.y]

    def move (self):
        direction = ['N', 'S', 'E', 'O'] [randrange (0,4)]
        self.wrapped = False
        if direction == 'N':
            if self.y > 1:
                self.y = self.y - 1
            else:
                self.y = self.terrain.tailleY
                self.wrapped = True
        elif direction == 'S':
            if self.y < self.terrain.tailleY:
                self.y = self.y + 1
            else:
                self.y = 1
                self.wrapped = True
        elif direction == 'O':
            if self.x > 1:
                self.x = self.x - 1
            else:
                self.x = self.terrain.tailleX
                self.wrapped = True
        elif direction == 'E':
            if self.x < self.terrain.tailleX:
                self.x = self.x + 1
            else:
                self.x = 1
                self.wrapped = True

class Simulation(object):
    """
      attributs : terrain, particules
      méthodes: __init__(), run()
    """
    hauteur = 300 # hauteur du canvas
    largeur = 300 # largeur du canvas
    def __init__ (self, tailleX = largeur, tailleY = hauteur, nbParticules = 5):
        self.terrain = Terrain (tailleX, tailleY)
        self.particules = [ Particule (self.terrain, numero) for numero in range (nbParticules) ]

    def run (self, T):
        global temps
        global fenetre
        for t in range (0, T):
            for numero in range (len (self.particules)):
                particule = self.particules [numero]
                posAvant = particule. pos ()
                particule. move ()
                posApres = particule. pos ()
                if not particule.wrapped:
                    can.create_line (posAvant [0], posAvant [1], 
                                     posApres [0], posApres [1], 
                                     fill = particule. couleur)
            temps = temps + 1
            txt.config (text = str (temps))
            # La ligne suivante est nécessaire pour que les 
            #   lignes (trajectoires) s'affichent petit à petit.
            # C'est un détail technique du à l'utilisation de Tkinter
            fenetre.update_idletasks ()

# La fonction suivante est appelée quand l'utilisateur clique sur
# le bouton « Simuler » de la fenêtre. Elle déclenche la simulation.
def faireUneSimulation():
    global simulation
    global duree
    simulation.run (duree)


temps = 0 # temps courant
duree = 1000  # nombre de pas de temps simulé suite à 1 appui sur « Simuler »

# On crée une simulation :
simulation = Simulation ()

# On crée la fenêtre d'interaction via laquelle la simulation sera activée.
# Pour cela, on crée une fenêtre et tous ses widgets.
fenetre = Tk()
fenetre.title ("Mouvement brownien")
txt = Label (fenetre, text = temps)
bouton = Button (fenetre, text = "Simuler", 
                 command = faireUneSimulation)
boutonQuitter = Button (fenetre, text = 'Quitter', command = fenetre.quit)
boutonQuitter.pack (side=BOTTOM)
can = Canvas (fenetre, width = simulation.largeur, 
              height = simulation.hauteur, bg = 'lightblue')
can.pack (side = LEFT)
txt.pack (side = BOTTOM)
bouton.pack (side = BOTTOM)

# Et enfin, on active la fenêtre, ce qui a pour effet d'activer la simulation
fenetre.mainloop ()

# quand la fenêtre quitte sa méthode mainloop(), c'est que l'utilisateur a
# cliqué sur le bouton « Quitter ». Donc, on ferme la fenêtre et c'est fini.
fenetre.destroy ()
