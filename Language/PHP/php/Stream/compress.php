<?php
 /* Create a compressed file containing an arbitrarty string
* File can be read back using compress.zlib stream or just
* decompressed from the command line using 'gzip -d foo-bar.txt.gz'
*/
$fp = fopen("compress.bzip2://foo-bar.txt.gz", 'rb');
if (! $fp ) die( "Unable to create file." );

while (!feof($fp)) {
    echo fgets($fp, 100);
}

fclose ( $fp );