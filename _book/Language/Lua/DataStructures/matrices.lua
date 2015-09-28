N = 10
M = 20
mt = {}
for i=1, N do
    mt[i] = {}
    for j=1, M do
        mt[i][j] = 0
    end
end

ma = {}
for i=1, N do
    for j=1, M do
        ma[(i-1)*M+j] = 0
    end
end

for i,v in pairs(ma) do
    print(i, v)
end
