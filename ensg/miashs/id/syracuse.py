def syracuse (n):
    count = 0
    while n != 1:
        if n % 2 == 1:
            n = 3 * n + 1
        else:
            n = n // 2
        count = count + 1
    return (count)

def maxSyracuse (m):
    nMax = 0
    sMax = 0
    for n in range (1,m):
        s = syracuse (n)
        if (s > sMax):
            sMax = s
            nMax = n
    print (nMax)
    print (sMax)

print (syracuse (3))
