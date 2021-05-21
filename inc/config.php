<?php

    $db_host = 'localhost';
    $db_user = 'root';
    $db_pss  = '';
    $db_name = 'app2';
    
    $db = mysqli_connect($db_host, $db_user, $db_pss, $db_name) or die(mysqli_connect_error());
    
?>