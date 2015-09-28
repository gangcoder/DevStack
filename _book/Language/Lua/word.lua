-- 文件单词计数

local BUFSIZE = 2^13
local f = io.input(arg[1])
local cc, lc, wc = 0, 0, 0 --字符，行，单词计数

while true do
    local lines, rest = f:read(BUFSIZE, "*line")
    if not lines then break end
    if rest then lines = lines..rest.."n"end

    cc = cc + #lines -- 统计字符
    
    local _, t = string.gsub(lines, "%S+", "")
    wc = wc + t

    _, t = string.gsub(lines, "n", "\n")
    lc = lc + t
end
print(lc, wc, cc)