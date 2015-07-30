### 错误日志
```
error_reporting(E_ALL);
ini_set("display_errors", 'On');
```

忽略DEPRECATED和NOTICE错误
```
error_reporting(E_ALL^E_NOTICE);
 ```

### 设置时区
```
date_default_timezone_set('PRC'); //设置中国时区 
```

### 文件下载
```
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$querydate.'flightflow.csv');
```
