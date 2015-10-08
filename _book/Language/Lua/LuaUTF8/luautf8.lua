--https://github.com/starwing/luautf8
local utf8 = require 'lua-utf8'

print(utf8.match("中abc字", "中(%a*)字"))
