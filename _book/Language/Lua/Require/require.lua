function printtable(name)
    for k, v in pairs(name) do
        print(k ,v);
    end
end

local cpx = require 'helpers' --标准调用方式

c1 = cpx.new(3, 4)
c2 = cpx.new(1, 2)

--printtable(cpx.mul(c1, c2))
--print(cpx.tostring(cpx.add(cpx.new(3,4), cpx.i)))
--printtable(package.loaded)
local func = require 'helpers.func'
func.test()
printtable(package.loaded)
