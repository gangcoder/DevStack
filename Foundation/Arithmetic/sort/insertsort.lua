function insertsort(lists)
    local count = #lists
    for i=2, count do
        key = lists[i]
        j = i - 1
        while j > 0 do
            if lists[j] > key then
                lists[j + 1] = lists[j]
                lists[j] = key
            end
            j = j - 1
        end
    end
    return lists
end

for i,v in ipairs(insertsort{111, 9, 3, 8, 2, 4, 5}) do
    print(v)
end