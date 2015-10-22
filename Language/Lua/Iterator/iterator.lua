-- get work
function allwords()
    local line = io.read()
    local pos = 1
    return function ()
        while line do
            local s, e = string.find(line, '%w+', pos)
            if s then
                pos = e+1
                return string.sub(line, s, e)
            else
                line = io.read()
                pos = 1
            end
        end
        return nil
    end
end

local iterator
function allwords()
    local state = {line = io.read(), pos = 1}
    return iterator, state
end

function iterator(state)
    while state.line do
        local s, e = string.find(state.line, '%w+', state.pos)
        if s then
            state.pos = e+1
            return string.sub(state.line, s, e)
        else
            state.line = io.read()
            pos = 1
        end
    end
    return nil
end
for word in allwords() do
    print(word)
end
