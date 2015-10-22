local cURL = require 'lcurl'

cURL.easy()
    :setopt_url('http://localhost/study/page1.php?lua=lua')
    :setopt_httpheader{
        'xabc:feeyowork',
        'cookie:asdf',
    }
    :setopt_writefunction(io.stderr) -- use io.stderr:write()
    :perform()
:close()
