local cURL = require 'lcurl'

local post = cURL.form()
    :add_content("name1", "abc")
    :add_content("name2", "abc")
    :add_content("name3", "abc")

cURL.easy()
    :setopt_url("http://localhost/study/page1.php")
    :setopt_httppost(post)
    :perform()
-
:close()
