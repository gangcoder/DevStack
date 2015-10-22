<?php

// php中断言的使用

function assert_failure()
{
    echo 'Assert Failed';
    // echo cli_get_process_title();
    // echo cli_get_process_title();
}

function test_assert($parameter)
{
    assert(is_bool($parameter));
    //assert(is_bool($parameter));
    //assert(is_bool($parameter));
    //assert(is_bool($parameter));
    //assert(is_bool($parameter));
}

assert_options(ASSERT_ACTIVE, true);
assert_options(ASSERT_BAIL, true);
assert_options(ASSERT_WARNING, false);
assert_options(ASSERT_CALLBACK, 'assert_failure');

test_assert(1);

echo "Never reached";
