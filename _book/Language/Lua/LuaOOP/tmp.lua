A = {}

function A:add(x,y)
    return x+y
end

for k, v in pairs(A) do
    print(k, v)
end
