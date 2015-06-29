local fact = function(n)
    if n == 0 then
        return 1
    else
        return n*fact(n-1) -- 错误，局部变量fact尚未定义完成，实际调用的fact为全局fact
    end
end

--local fact
--fact = function(n)
--    if n == 0 then
--        return 1
--    else
--        return n*fact(n-1) -- 虽然局部变量fact尚未定义完成，但是在函数执行后fact 会有正确值
--    end
--end

print(fact(5))
