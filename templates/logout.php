<?php
    session_start();

    setcookie('user_token', '', time()-3600, '/', false);

    $_SESSION = array();

    session_destroy();

    echo '<script>window.open("../index.php", "_self")</script>';
?>