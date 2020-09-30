def distance (a, b):
    if (len (a) != len (b)):
        return (-1)
    somme = 0
    for i in range (len (a)):
        somme += (a [i] - b [i]) * (a [i] - b [i])
    return (sqrt (somme))
