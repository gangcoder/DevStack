<?php
/*
 * PDO演示
 */

try {
    $dsn = "mysql:host=localhost;dbname=mysql";
    $db = new PDO($dsn, 'root', '123');

    $db = setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec('SET NAMES `UTF8`');
    $sql = ""

} catch (PDOException $e) {
}
