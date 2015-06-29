local iconv = require("iconv")
http=require("socket.http")

function createIconv(from,to,text)  
    local cd = iconv.new(to .. "//TRANSLIT", from)
    local ostr, err = cd:iconv(text)

    if err == iconv.ERROR_INCOMPLETE then
        return "ERROR: Incomplete input."
    elseif err == iconv.ERROR_INVALID then
        return "ERROR: Invalid input."
    elseif err == iconv.ERROR_NO_MEMORY then
        return "ERROR: Failed to allocate memory."
    elseif err == iconv.ERROR_UNKNOWN then
        return "ERROR: There was an unknown error."
    end
    return ostr
end

result=http.request("http://localhost")
print(result)

result = createIconv("utf-8","gbk",result)
print(result)

result = createIconv("gbk", "utf-8",result)
print(result)
