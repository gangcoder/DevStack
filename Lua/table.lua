-- table
Config = {Hello = "Hello"}
Config.world = "world"
Config.num = 100
Config['name'] = 'ZhangSan'

for key, var in pairs(Config) do
    print(key, var)
end
