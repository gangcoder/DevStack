<?php
header('Content-Type: text/html; charset=utf-8');
$path = 'http://api.map.baidu.com/place/v2/search';
// http://api.map.baidu.com/place/v2/search?query=银行&location=39.915,116.404&radius=2000&output=xml&ak=E4805d16520de693a3fe707cdc962045
$location = '40.064485,116.3427';
$radius = 2000;
$output = 'json';
$ak = 'OBDl6igKrng0V6VqT5RWIP6z';
// $sk = 'dcfdAwGU5naYlS4KCxnwDGGoXTolLjZ0';
$params = array(
	'query' => '银行',
	'location' => $location,
	'radius' => $radius,
	'output' => $output,
	'ak' => $ak,
	);
// asort($params, SORT_STRING);
$url = $path . '?' . http_build_query($params);
echo $url,'<br>';
$result = file_get_contents($url);
echo $result;