/**
 * 判断服务器环境是否是HTTPS
 * @url http://snipplr.com/view/62373/check-if-url-is-https-in-php/
 */
<?php
if ($_SERVER['HTTPS'] != "on") {
	echo "This is not HTTPS";
}else{
	echo "This is HTTPS";
}