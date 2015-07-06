require 'helpers'
local M = {}
--print(...)

local print = print
_ENV = M

function requiretest()
    print('helpers require study')
    print(package.path)
end

--打印table
function printtable(name)
    for k, v in pairs(name) do
        print(k ,v);
    end
end
--printtable(string)

function test()
    print('hello')
end
return M
