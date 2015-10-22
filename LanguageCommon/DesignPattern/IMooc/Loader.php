<?php
/**
 * 自动装载类
 */

namespace IMooc;

class Loader
{
    public static function register()
    {
        spl_autoload_register([Loader::class, 'loadClass']);
    }

    private static function loadClass($file)
    {
        // var_dump($file);
        $file = str_replace('\\', DS, $file);
        $file = BASEDIR.DS.$file.'.php';
        
        require $file;
    }
}