function require(name)
    if not package.loaded[name] then
        local loader = findloader(name)
        if loader == nil then
            error("unable to load module"..name)
        end
        package.loaded[name] = true
        local res = loader(name)
        if res ~= nil then
            package.loaded[name] = res
        end
    end
    return package.loaded[name]
end
