<?php
namespace IMooc;

use IMooc\UserStrategy;

/**
* strategy
*/
class MaleUserStrategy implements UserStrategy
{
    public function showAd()
    {
        echo "male";
    }

    public function showCategory()
    {
        echo '男装';
    }
}