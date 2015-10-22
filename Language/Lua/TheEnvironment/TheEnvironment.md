# The Envrionment

Lua 将所有全局变量保存在table，该table保存在全局变量`_G`中

```
for n in pairs(_G) do
    print(n)
end
```
