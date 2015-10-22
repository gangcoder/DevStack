/**
 * @url http://forums.devnetwork.net/viewtopic.php?t=39594
 */
<?php
/**
 * 判断图片中的主色调
 * @param  string $imagePath 图片文件路径
 * @return string            RGB值
 */
function dominantHue($imagePath)
{
	// TODO: 兼容各格式图片
	$i = imagecreatefromjpeg($imagePath);

	for ($x=0;$x<imagesx($i);$x++) {
	    for ($y=0;$y<imagesy($i);$y++) {
	        $rgb = imagecolorat($i,$x,$y);
	        $r   = ($rgb >> 16) & 0xFF;
	        $g   = ($rgb >>  & 0xFF;
	        $b   = $rgb & 0xFF;

	        $rTotal += $r;
	        $gTotal += $g;
	        $bTotal += $b;
	        $total++;
	    }
	}

	$rAverage = round($rTotal/$total);
	$gAverage = round($gTotal/$total);
	$bAverage = round($bTotal/$total);

	return $rAverage.$gAverage.$bAverage;
}