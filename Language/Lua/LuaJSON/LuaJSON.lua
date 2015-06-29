local cjson = require('cjson')

jsonText = '[true,{"foo":"bar"}]'
decoded = cjson.decode(jsonText)

for k, v in pairs(decoded) do
    print(k, v)
end
