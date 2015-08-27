<?php
$result = token_get_all('<?php echo "abc"; ?>');
var_dump($result);