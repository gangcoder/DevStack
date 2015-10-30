# 设计模式

## 工厂模式 Factory

具有创建对象的某些方法

使用工厂类创建对象，而不直接使用 new,这样想要更改所创建的对象类型，只需更改该工厂即可。使用该工厂的所有代码会自动更改。

```
<?php
//定义用户对象应该执行什么操作
interface IUser 
{
    function getName();
}
//实现用户对象
class User implements IUser
{
    public function __construct( $id ) { }

    public function getName()
    {
        return "Jack";
    }
}
//创建用户对象
class UserFactory
{
    public static function Create( $id )
    {
        return new User( $id );
    }
}

$uo = UserFactory::Create( 1 );
echo( $uo->getName()."\n" );
?>
```

### 工厂模式变体

假设需要先创建对象,然后设置许多属性,可以由类中的公共静态方法构造该类型的对象

此版本的工厂模式会将该进程封装在单个位置中，这样，不用到处复制复杂的初始化代码

```
<?php
interface IUser
{
    function getName();
}

class User implements IUser
{
    public static function Load( $id )//创建该类型对象，并作初始化设置
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

$uo = User::Load( 1 );
echo( $uo->getName()."\n" );
?>
```

## 单例模式 Singleton

应用程序某些资源是应该共享的,例如数据库连接句柄.在应用程序中共享数据库句柄,可以减少连接开销

```
<?php
class DatabaseConnection
{
    public static function get()
    {
        static $db = null;
        if ( $db == null )
        $db = new DatabaseConnection();
        return $db;
    }

    private $_handle = null;

    private function __construct()//私有构造函数
    {
        $dsn = 'mysql://root:password@localhost/photos';
        $this->_handle =& DB::Connect( $dsn, array() );
    }
  
    public function handle()
    {
        return $this->_handle;
    }
}

print( "Handle = ".DatabaseConnection::get()->handle()."\n" );
print( "Handle = ".DatabaseConnection::get()->handle()."\n" );
```

## 观察者模式 Observer

- 观察者: 接受变更消息并执行，通常注册存储到一个观察者列表中
- 可观察对象: 维护观察者列表，发送消息

一个对象通过添加一个方法（该方法允许另一个对象，即观察者注册自己）使本身变得可观察

当可观察的对象更改时，它会将消息发送到已注册的观察者

这些观察者使用该信息执行的操作与可观察的对象无关。结果是对象可以相互对话，而不必了解原因

```
<?php
//定义观察者行为
interface IObserver
{
    function onChanged( $sender, $args );
}
//可被观察的对象
interface IObservable
{
    function addObserver( $observer );
}
//实现可被观察对象
//负责维护关注列表，并发送消息
class UserList implements IObservable
{
    private $_observers = array();

    public function addCustomer( $name )
    {
        foreach( $this->_observers as $obs )
            $obs->onChanged( $this, $name );
    }

    public function addObserver( $observer )
    {
        $this->_observers []= $observer;
        }
    }
//实现一个观察者
class UserListLogger implements IObserver
{
    public function onChanged( $sender, $args )
    {
        echo( "'$args' added to user list\n" );
    }
}

$ul = new UserList();//观察者列表
$ul->addObserver( new UserListLogger() );//添加观察者至观察者列表
$ul->addCustomer( "Jack" );//添加用户，并将消息发送给观察者
?>
```

## 命令链模式 Chain

命令链 模式以松散耦合主题为基础，发送消息、命令和请求，或通过一组处理程序发送任意内容

每个处理程序都会自行判断自己能否处理请求。如果可以，该请求被处理，进程停止

可以为系统添加或移除处理程序，而不影响其他处理程序

为处理请求而创建可扩展的架构时,代替 switch使用

```
<?php
//定义命令行为
interface ICommand
{
    function onCommand( $name, $args );
}
//负责命令链的存储，命令的匹配执行
class CommandChain
{
    private $_commands = array();

    public function addCommand( $cmd )
    {
        $this->_commands []= $cmd;
    }

    public function runCommand( $name, $args )
    {
        foreach( $this->_commands as $cmd )
        {
            if ( $cmd->onCommand( $name, $args ) )
                return;
            }
    }
}
//定义添加用户命令
class UserCommand implements ICommand
{
    public function onCommand( $name, $args )
    {
        if ( $name != 'addUser' ) return false;
        echo( "UserCommand handling 'addUser'\n" );
        return true;
    }
}
//定义邮件命令
class MailCommand implements ICommand
{
    public function onCommand( $name, $args )
    {
        if ( $name != 'mail' ) return false;
        echo( "MailCommand handling 'mail'\n" );
        return true;
    }
}

$cc = new CommandChain();
$cc->addCommand( new UserCommand() );
$cc->addCommand( new MailCommand() );
$cc->runCommand( 'addUser', null );
$cc->runCommand( 'mail', null );
?>
```

## 策略模式 Strategy

提供一组即插即用的策略进行数据处理

策略模式适合数据筛选、搜索

```
<?php
//定义策略
interface IStrategy
{
    function filter($record);
}
//根据名称选择策略
class FindAfterStrategy implements IStrategy
{
    private $_name;

    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function filter($record)
    {
        return strcmp($this->_name, $record) <= 0;
    }
}
//随即选择策略
class RandomStrategy implements IStrategy
{
    public function filter($record)
    {
        return rand(0, 1) >=0.5;
    }
}

class UserList
{
    private $_list = array();

    public function __construct($names)
    {
        if ($names != null) {
            foreach ($names as $name) {
                $this->_list[] = $name;
            }
        }
    }

    public function add($name)
    {
        $this->_list[] = $name;
    }
    //利用策略选择子集
    public function find($filter)
    {
        $recs = array();
        foreach ($this->_list as $user) {
            if ($filter->filter($user)) {
                $recs[] = $user;
            }
        }
        return $recs;
    }
}

$ul = new UserList(['Andy', 'Jack', 'Lori', 'Megan']);
$f1 = $ul->find(new FindAfterStrategy('J'));
print_r($f1);

$f2 = $ul->find(new RandomStrategy);
print_r($f2);
```

## cite

- [IBM 十个设计模式](https://www.ibm.com/developerworks/cn/opensource/os-php-designpatterns/)

## 适配器模式

## 迭代器模式

## 装饰器模式

## 委托模式

## 状态模式

## 代理模式

在客户端与实体之间建立一个代理对象，客户端对实体进行操作全部委派给代理对象，隐藏实体的具体实现细节

