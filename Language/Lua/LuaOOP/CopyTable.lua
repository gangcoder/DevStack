function clone(tab)
    local ins = {}
    for key, var in pairs(tab) do
        ins[key] = var
    end
    return ins
end

People = {}
People.SayHi = function()
    print('People'..'SayHi')
end

function People.SayHello()
    print('Hello')
end

--local p = clone(People)
--p.SayHi()
