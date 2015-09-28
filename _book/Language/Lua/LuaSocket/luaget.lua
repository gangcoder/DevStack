local http = require("socket.http")
a,b,c = http.request('http://localhost/study/page1.php?lua=goodstrin', 'a=b&x= 汉字 ab')

for i,v in pairs(c) do
   print(i, v)
end
