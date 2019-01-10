<?php

    function db_Connect() {
        //Выполнение соединения с базой данных
        $link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

        if(mysqli_connect_error())
            die('Ошибка соединения с базой данных.');
            
        mysqli_set_charset($link, 'utf8');

        if(!mysqli_set_charset($link, 'utf8')) {
            printf("Error: mysqli_error($link)");
        }

        return $link;
    }
?>