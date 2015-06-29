# lua iconv

GBK UTF-8字符转换

```
local iconv = require("iconv")
local cd = iconv.new('GBK'.."//TRANSLIT", 'UTF-8')

local ostr, err = cd:iconv(text)
```
