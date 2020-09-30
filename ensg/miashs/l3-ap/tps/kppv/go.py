def go (k, p):
    global entrainement
    listeDesIndices = [i for i in range (len (dataset))]
    nbExEnt = int (p * len(dataset))
    shuffle (listeDesIndices)
    entrainement = listeDesIndices [0:nbExEnt]
    test = listeDesIndices [nbExEnt:len(dataset)]
    nombreErreurs = 0
    for exemple in test:
      if predire (lesKplusProchesVoisins (dataset [exemple][0:4], k)) != dataset [exemple][4]:
        nombreErreurs += 1
    print (float (nombreErreurs) / len (test))

go (3, .9)
