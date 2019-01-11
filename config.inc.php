<?php

    require 'db/mysql.inc.php';
    $TYPE   = 'mysql';
    $HOST   = '127.0.0.1';
    $USER   = 'root';
    $PASS   = 'root';
    $DBNAME = 'flyhi_travels';

	$db = sql_Connect($HOST, $USER, $PASS, $DBNAME);
    
?>