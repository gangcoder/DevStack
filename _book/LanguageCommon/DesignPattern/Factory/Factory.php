<?php
namespace IMooc;

/**
 * 工厂模式
 *
 * 工厂方法或者类生成对象，而不是在代码中直接new
 *
 * http://www.ibm.com/developerworks/cn/opensource/os-php-designptrns/
 */

class Factory
{

    public static function createDatabase($alias = 'DB')
    {
        $db = Database::getInstance();
        Register::set($alias, $db);
        return $db;
    }

    // 工厂方法配合ORM，注册器模式
    public function createUser($id)
    {
        $key = 'user_'.$id;

        $user = Register::get($key);
        if ($user) {
            $user = new User($id);
            Register::set($key, $user);
        }

        return $user;
    }
}

// 工厂模式变体
// 
// 类中的这些公共静态方法构造该类型的对象
interface IUser
{
    function getName();
}

class User implements IUser
{
    public static function Load( $id ) 
    {
        return new User( $id );
    }

    public static function Create( ) 
    {
        return new User( null );
    }

    public function __construct( $id ) { }

    public function getName()
    {
        return "Jack";
    }
}

$uo = User::Load(1);
