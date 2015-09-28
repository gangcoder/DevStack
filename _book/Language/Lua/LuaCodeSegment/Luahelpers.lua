--explode() 类似PHP explode()
--return array
function explode(string, delimiter, limit)
    local string    = string
    local delimiter = delimiter
    local limit     = limit
    if limit == nil then limit = #string end
    --print(limit) 

    local pos = 1
    local i   = 1
    local t   = {}
    while true do
        local s = string.find(string, delimiter, pos)
        if s and i<= limit then
            table.insert(t,string.sub(string, pos, s-1))
            pos = s + 1
            i = i + 1
        else
            break
        end
    end
    return t
end

--pathstr = package.path
--for k, v in ipairs(explode(pathstr, ';', 3)) do
    --print(k, v)
--end

--explode iterator
--用于直接进行for 循环
function explodeIter(string, delimiter)
    local line      = string
    local delimiter = delimiter
    local pos       = 1

    return function ()
        while line do
            local s = string.find(line, delimiter, pos)
            if s then
                local start = pos
                pos = s+1
                return string.sub(line, start, s-1)
            else
                break
            end
        end
        return nil
    end
end

--pathstr = package.path
--for path in explodeIter(pathstr, ';') do
    --print(path)
--end

-- 获取HTML文档 title
function getTitle(fname)
    local fp = io.open(fname, "r")
    if fp == nil then
        return false
    end

    local s = fp:read("*all")
    fp:close()
    
    s = string.gsub(s, "\n",  " ")
    s = string.gsub(s, " *< *", "<")
    s = string.gsub(s, " *> *", ">")

    -- put all tags to lowercase
    s = string.gsub(s, "(<[^ >]+)", string.lower)
    
    local i, f, t = string.find(s, "<title>(.+)</title>")
    return t or ""
end

---- 测试代码
--if arg[1] == nil then
    --print('Usage: lua'..arg[0]..'<filename>[...]')
    --os.exit(1)
--end

function filegetcontents(filename)
    local fp = io.open(filename, 'r')
    if fp == nil then
        return false
    end
    local s = fp:read('*all')
    fp:close()
    return s
end
