def predire (l):
  lesEtiquettes = ['Iris-setosa', 'Iris-versicolor', 'Iris-virginica']
  decomptes = [0, 0, 0]
  for exemple in l :
    for i in range (3):
      if dataset [exemple] [4] == lesEtiquettes [i]:
        decomptes [i] += 1
  plusGrandDecompte = decomptes [0]
  indice = 0
  for i in range (1,3):
    if decomptes [i] > plusGrandDecompte:
      plusGrandDecompte = decomptes [i]
      indice = i
  return (lesEtiquettes [indice])
