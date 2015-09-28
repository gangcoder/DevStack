<?php
/**
 * PDO
 */
class FeeyoPDO
{
    private $_handle;       //数据库连接连接句柄
    private $_dynamicdata;  //国际库中数据
    private $_tbl_flight_flow;  //flight flow表名
    private $_id;   //flight flow 数据id
    private $_dep;  //flight flow 出发字段内容
    private $_arr;  //flight flow 到达字段内容
    //初始化连接
    private function __construct(){
        $db_dsn  = 'mysql:host=127.0.0.1;port=3306;dbname=flight';
        $db_user = 'root';
        $db_pwd  = '123';
        try{
            $this->_handle = new PDO($db_dsn,$db_user, $db_pwd,
                [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'',
                PDO::ATTR_PERSISTENT => true]);
        }catch (PDOException $e){
            error_log(date('Y-m-d H:i:s').' DB WRONG!!!['.
                $e->getMessage().']'."\r\n",
                3, DB_RUN_LOG.date('Y-m-d').'.log');
            echo 'DB WRONG!!!['.$e->getMessage().']';
        }
        //echo 'new connect';
    }
    private function __clone(){}

    //返回单例
    public static function getInstance($newinstance = false){
        static $instance = null;
        if ($newinstance){
            unset($instance);     //Redis队列空闲时，断开连接
            return;
        }

        if ($instance == null) {
            $instance = new FeeyoPDO;
        }
        return $instance;
    }

    public function handle(){
        return $this->_handle;
    }

    //查询国际数据库获取航班数据
    public function queryDynamic($dynamicid){
        $sql='select `fnum`,
            `forg`,
            `fdst`,
            `scheduled_deptime`,
            `scheduled_arrtime`,
            `actual_deptime`,
            `actual_arrtime`,
            `flight_status_code`,
            `share_execute_flag`,
            `ports_of_call`,
            `force_landing_flag`,
            `fservice` 
            from `dynamic` where `id`=\''.$dynamicid.'\'';
        $this->_dynamicdata = $this->_handle->query($sql)->fetch(PDO::FETCH_ASSOC);
        return $this->_dynamicdata;
    }

    //数据更新 
    public function update($id, $dep, $arr){
        //确定表名
        $this->_tbl_flight_flow = 'tbl_flight_flow_'.date('Ym');
        $this->_id  = $id;
        $original = $this->queryFlightFlow();
        //var_dump('original', $original);

        if ($original) {
            //已有数据拼接序列化后更新
            //反序列化数据
            $originaldep = unserialize($original['dep']);
            $originalarr = unserialize($original['arr']);
            //var_dump('beforarr', $this->_id, $originaldep, $originalarr);

            //剔除非数组数据
            $originaldep = is_array($originaldep)?$originaldep:[];
            $originalarr = is_array($originalarr)?$originalarr:[];
            
            //合并到原有数组
            $originaldep[key($dep)]=current($dep);
            $originalarr[key($arr)]=current($arr);
            //var_dump('afterarr', $originaldep, $originalarr);

            //合并数组
            $this->_dep = serialize($originaldep);
            $this->_arr = serialize($originalarr);
            //var_dump('serial', $this->_id,$this->_dep,$this->_arr);
            //插入数据
            $this->updateFlightFlow();
        } else {
            //新数据序列化后插入
            $this->_dep = serialize($dep);
            $this->_arr = serialize($arr);
            //var_dump($this->_id,$this->_dep,$this->_arr);die();
            $this->insertFlightFlow();
        }
    }

    //插入数据到 flight flow
    public function insertFlightFlow(){
        $sql = "INSERT INTO`".$this->_tbl_flight_flow."`(`id`, `dep`, `arr`)
                VALUES('".$this->_id."', '".$this->_dep."', '".$this->_arr."')";
        $rs = $this->_handle->exec($sql);
        if($rs === FALSE){
            $this->errorLog($this->_handle->errorInfo());
            exit;
        }
    }
    //更新flight flow表
    public function updateFlightFlow(){
        $sql = "UPDATE `".$this->_tbl_flight_flow."`
                SET `dep` = '".$this->_dep."', `arr`='".$this->_arr."'
                WHERE `id` = '".$this->_id."' ";
        $rs=$this->_handle->exec($sql);
        if($rs===FALSE){
            $this->errorLog($this->_handle->errorInfo());
            exit;
        }
    }

    //查询flight flow
    public function queryFlightFlow() {
        $sql = "SELECT `id`, `dep`, `arr`
            FROM `".$this->_tbl_flight_flow."`
            WHERE `id`='".$this->_id."'";
        return $this->_handle->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    
    //todo：检测数据库连接
    public function checkConnect(){}

    //日志记录
    private function errorLog($info){
        error_log(date('Y-m-d H:i:s').
            ' error flight flow: '.
            json_encode($info)."\r\n",
            3,DB_RUN_LOG.date('Y-m-d').'.log');
    }
}
