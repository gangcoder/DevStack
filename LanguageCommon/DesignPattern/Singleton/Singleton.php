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
