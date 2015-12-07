<?php

$string =  "11aa@#@23123szadler32adler32adler32f..adler32adler32";
$level = 9;

echo 'string len: ';
echo strlen($string);


// zlib
echo "\ngzcompress: ";
$zlib = gzcompress($string, $level);
echo strlen($zlib);
file_put_contents('zlib.txt', $zlib);

$src_zlib = substr($zlib, 2, -4);
file_put_contents('szlib.txt', $src_zlib);
echo "\n uncompress zlib: ";
echo gzinflate($src_zlib);

$zlib_header = pack("H*", '78DA');
echo "\nzlib header: ".bin2hex($zlib_header);

echo "\n ADLER32校验值: ";
$adler32 = hash('adler32', $string);
echo $adler32;
$zlib_adler32 = pack("H*", $adler32);

// gzip
echo "\n gzip len: ";
$gzip = gzencode($string, $level);
echo strlen($gzip);
file_put_contents('gzip.txt', $gzip);

$src_gzip = substr($gzip, 10, -8);
echo "\n uncompress gzip: ";
echo gzinflate($src_gzip);

$gzip_header = pack("H*", '1f8b080000000000020b');
echo "\ngzi header: ".bin2hex($gzip_header);

echo "\n gzdeflate len: ";
$deflate = gzdeflate($string, $level);
echo strlen($deflate);
file_put_contents('deflate.txt', $deflate);

echo "\ngzuncompress解压 deflate: ";
echo gzuncompress($zlib_header.$deflate.$zlib_adler32);
