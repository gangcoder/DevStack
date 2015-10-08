<?php
/**
 * PHP 发起 GET, POST, PUT, DELETE 请求
 */
class commonFunction {
    function callInterfaceCommon($url,$type,$params,$headers){
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url); //发贴地址
        if ($headers!="") {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        } else {
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: text/json'));
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

        switch($type){
            case "GET" :
                curl_setopt($ch, CURLOPT_HTTPGET, true);
                break;
            case "POST":
                curl_setopt($ch, CURLOPT_POST,true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
                break;
            case "PUT" :
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
                break;
            case "DELETE":
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
                break;
        }

        $contents = curl_exec($ch);//获得返回值
        curl_close($ch);
        return $contents;
    }
}

// usage
$params    = [
    'a' => 'b',
    'c' => 'd',
];
$headers   = ['Content-type: text/json']; //header参数以数组格式传递
$url       = 'localhost/test.php';
$strResult =  new commonFunction()->callInterfaceCommon($url,"PUT",$params,$headers);