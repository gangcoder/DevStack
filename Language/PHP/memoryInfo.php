/**
 * 服务器上的RAM使用
 *
 * 内存初始，最终，及其峰值使用情况
 * @url http://net.tutsplus.com/tutorials/php/9-useful-php-functions-and-features-you-need-to-know/
 */
<?php
echo "Initial: ".memory_get_usage()." bytes \n";
/* prints
Initial: 361400 bytes
*/

// let's use up some memory
for ($i = 0; $i < 100000; $i++) {
	$array []= md5($i);
}

// let's remove half of the array
for ($i = 0; $i < 100000; $i++) {
	unset($array[$i]);
}

echo "Final: ".memory_get_usage()." bytes \n";
/* prints
Final: 885912 bytes
*/

echo "Peak: ".memory_get_peak_usage()." bytes \n";
/* prints
Peak: 13687072 bytes
*/