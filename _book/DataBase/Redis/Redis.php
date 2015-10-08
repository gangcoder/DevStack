<?php
/**
 * redis 连接
 */
class StudyRedis
{
    private $_handle;//Redis连接句柄
    //Redis连接
    private function __construct(){
        $redis_host='127.0.0.1';
        $redis_port='6379';
        try{
            $this->_handle = new Redis();
            $this->_handle->connect($redis_host, $redis_port, '0');
            $this->_handle->select(1);
        }catch (RedisException $e){
            error_log(
                date('Y-m-d H:i:s').
                ' redis is down: '.
                $e->getMessage()."\r\n",3,DB_RUN_LOG.date('Y-m-d').'.log');
            exit;
        }
    }
    private function __clone(){}
    //返回单例
    public static function getInstance(){
        static $instance = null;
        if ($instance == null) {
            $instance = new self;
        }
        return $instance;
    }
    public function handle(){
        return $this->_handle;
    }
    //检查Redis连接是否有数据
    public function checkConnect(){
        if($this->_handle->ping()!='+PONG') exit();
        $llen=$this->_handle->llen('pushto_flighflow');
        if($llen===0) {
            return false;
        } else {
            return true;
        }
    }
    //获取list中一条记录的id
    public function popOne(){
        return $this->_handle->lpop('list');
    }
}
//usage
//$studyredis = StudyRedis::getInstance();
//$redis = $studyredis->handle();
//$redis->set('foo', 'test');
//echo $redis->get('foo');
