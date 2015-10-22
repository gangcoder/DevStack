/**
 * 显示页面源代码
 * @url ttp://perishablepress.com/code-snippets/#code-snippets_php 
 */
<?php
/**
 * 显示页面源代码
 * @param  string $url 网页连接
 * @return string      带有行号和换行的页面源码
 */
function displaySourceCode($url)
{
	$lines = file($url);
	$sourceCode = []];
	foreach ($lines as $lineNum => $line) {
		// loop thru each line and prepend line numbers
		$sourceCode[] = $lineNum." ".$line;
	}
	return implode("r\n", $sourceCode);
}

displaySourceCode('www.baidu.com');