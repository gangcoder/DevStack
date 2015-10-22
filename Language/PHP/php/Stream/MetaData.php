<?php
$d = array(
    0 => array('pipe', 'r'),
    1 => array('pipe', 'w'),
    2 => array('file', 'error.log', 'a')
);

$p = proc_open('php -S localhost:8000', $d, $pipes);

if (!is_resource($p))   die("proc_open() failed\n");

// Set child's stdout pipe to non-blocking.
if (!stream_set_blocking($pipes[1], 0)) {
    die("stream_set_blocking() failed\n");
}
else {
    echo "Non-blocking mode should be set.\n";
}

// View the status of that same pipe.
// Note that 'blocked' is 1!  This appears to be wrong.
print_r(stream_get_meta_data($pipes[1]));

// Try to read something.  This will block if in blocking mode.
// If it does not block, stream_set_blocking() worked but
// stream_get_meta_data() is lying about blocking mode.
$data = stream_get_contents($pipes[1]);

echo "data = '$data'\n";
?> 