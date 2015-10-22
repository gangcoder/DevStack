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
