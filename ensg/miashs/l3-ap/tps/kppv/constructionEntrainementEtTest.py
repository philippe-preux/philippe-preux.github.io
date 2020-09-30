p = 0.8 # par exemple pour 80%
listeDesIndices = [i for i in range (len (dataset))]
shuffle (listeDesIndices)
entrainement = listeDesIndices [0:p*len(dataset)]
test = listeDesIndices [p*len(dataset):len(dataset)]
