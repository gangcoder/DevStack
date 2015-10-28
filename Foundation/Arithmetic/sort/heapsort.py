def PARENT(i):
    return int(i / 2)

def LEFT(i):
    return 2 * i

def RIGHT(i):
    return 2 * i + 1

def MAXHEAPIFY(A, i):
    l = LEFT(i)
    r = RIGHT(i)
    if l:
        pass