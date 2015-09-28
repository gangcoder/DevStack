setmetatable(_G, {
    __newindex = function(_, n)
        error('attempt to write to undeclared variable'..n, 2)
    end,
    __index = function(_, n)
        error('attempt to read undeclared variable'..n, 2)
    end
})

print(debug.getinfo(2, 'S').what)
--print(a)
