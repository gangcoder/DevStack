local key = {}
local mt = {__index = function(t) return t[key] end}
function setDefault(t, d)
    t[key] = d
    --for k, v in pairs(t) do
        --print(k, v)
    --end
    setmetatable(t, mt)
end

tab = {x=10}
print(tab.x, tab.z)
setDefault(tab, 0)
print(tab.x, tab.z)
