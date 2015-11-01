<?php
try {
    foreach (new DirectoryIterator('./') as $Item) {
        // echo $Item, "\n";
        var_dump($Item);
    }
} catch (Exception $e) {
    echo 'no file found!', "\n";   
}