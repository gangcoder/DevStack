function newCounter()
    local i = 3
    return function ()
        i = i + 1
        return i
    end
end
c1 = newCounter()

print(c1())
print(c1())
print(c1())
print(c1())
print(c1())
