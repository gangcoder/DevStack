local http = require("socket.http")
local ltn12 = require("ltn12")
http.TIMEOUT = 10
http.USERAGENT = 'chrome'
t = {}
a, b, c, d = http.request{
    url = 'http://localhost/study/page1.php?lua=goodstrin',
    sink = ltn12.sink.table(t),
    source = ltn12.source.string('x=汉字&a=b'),
    method = 'POST',
    headers = {x='中国', y='y', ["content-length"] = string.len('a=b&x=汉字'),["content-type"] = "application/x-www-form-urlencoded"}
}
--返回信息
print(a, b, d)
for k, v in pairs(t) do
    print(k, v)
end
--范回头信息
for k, v in pairs(c) do
    print(k, v)
end
