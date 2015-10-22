<?php
date_default_timezone_set("PRC");  //设置PRC时区

$minuteCount=0;
$todayZoneCount=0;

//每隔2分钟启动一次
$time5=0;

while(true){
	$time = time();
	//当天凌晨的时间戳
	$todayZoneTime=strtotime(date('Y-m-d'),$time);	
	//每分钟的时间戳
	$minuteTime=strtotime(date('Y-m-d H:i:00'),$time);
	
	
	if($time-$minuteTime<5 && $minuteCount==0){
		startProcess(1,'/var/www/html/adsb/adsb/deviceexception.php');
		$minuteCount=5;
	}
	
	if($time-$todayZoneTime<5 && $todayZoneCount==0){
		startProcess(1,'/var/www/html/adsb/adsb/tasks/synchronousAirports.php');		
		startProcess(1,'/var/www/html/adsb/adsb/aircraftnumbersync.php');
		$todayZoneTime=5;
	}
	
	//每隔2分钟启动一次
	if($time - $time5 >=120){		
		startProcess(5,'/var/www/html/adsb/adsb/tasks/indexEstimatedArrive.php');
		$time5=$time;
	}
	
	if($minuteCount>0){
		$minuteCount--;
	}
	if($todayZoneCount>0){
		$todayZoneCount--;
	}
	
	sleep(1);
}

//开启一个进程
function startProcess($limit, $processPath){
	$number=1;
	$cmd = popen("ps -ef | grep \"".$processPath."\" | grep -v grep | wc -l", "r");
	$line = fread($cmd, 512);
	var_dump($line);
	pclose($cmd);
	$p_number = $limit - $line;
	if ($p_number >0){
		$out=popen("/usr/bin/php ".$processPath." ".$number." &","r");
		if(!$out){
			error_log(date('Y-m-d H:i:s').'error_popen:'.$processPath."\r\n",3,'/home/log/timingTasks_error.log');
		}
		pclose($out);						
	}
}

