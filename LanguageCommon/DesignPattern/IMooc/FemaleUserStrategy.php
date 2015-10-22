<?php
namespace IMooc;

use IMooc\UserStrategy;

/**
* strategy
*/
class FemaleUserStrategy implements UserStrategy
{
    public function showAd()
    {
        echo "female";
    }

    public function showCategory()
    {
        echo '女装';
    }
}