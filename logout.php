<?php
    require('config.php');

    if(!empty($_SESSION)) {
        if(array_key_exists('administrator', $_SESSION)) {
            unset($_SESSION['administrator']);
            session_destroy();
        } else if(array_key_exists('user', $_SESSION)) {
            unset($_SESSION['user']);
            session_destroy();
        }
    }

    header('Location: '. HOST . 'index.php');
?>