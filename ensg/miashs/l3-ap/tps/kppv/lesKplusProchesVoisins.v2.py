def lesKplusProchesVoisins (x, k):
  listeDesDistances = []
  for i in range (len (entrainement)):
    listeDesDistances.append (distance (x, dataset [entrainement [i]] [0:4]))
  Kppv = []
  for i in range (k):
    p = float ("inf")
    for j in range (len (entrainement)):
      if listeDesDistances [j] != 0 and listeDesDistances [j] < p and j not in Kppv:
        p = listeDesDistances [j]
        indice = j
    Kppv. append (indice)
  return (Kppv)
