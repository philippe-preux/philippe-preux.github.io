def lePlusProcheVoisin (x):
    lePlusPres = 0
    distanceMin = float("inf")
    for i in range(len(entrainement)):
        di = distance (x, dataset [entrainement [i]][0:4])
        if di != 0 and di < distanceMin:
            lePlusPres = i
            distanceMin = di
    return (lePlusPres)
