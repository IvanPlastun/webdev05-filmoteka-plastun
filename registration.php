<?php

    require('config.php');
    require('database.php');
    $link = db_Connect();
    require('models/films.php');

    require('functions/login_functions.php');

    if(!empty($_POST)) {
        if(array_key_exists('registration', $_POST)) {
            if($_POST['login-reg'] == '') {
                $errors[] = "<p>Введите логин!</p>";
            }
            if($_POST['password-reg'] == '') {
                $errors[] = "<p>Введите пароль!</p>";
            }
            if($_POST['password-reg'] != "") {
                if($_POST['password-confirm'] == "") {
                    $errors[] = "<p>Подтвердите пароль!</p>";
                }
            }

            if($_POST['login-reg'] != "" && $_POST['password-reg'] != "" && $_POST['password-confirm'] != "") { 
                if($_POST['password-reg'] != $_POST['password-confirm']) {
                    $errors[] = "<p>Пароли не совпадают!</p>";
                }
            }

            if(empty($errors)) {
                $login = $_POST['login-reg'];
                $existLogin = check_logins($link, $login);
                $userRank = 1;

                if($existLogin) {
                    $errors[] = "<p>Пользователь с таким логином уже существует!</p>";
                } else {
                    if(empty($errors)) {
                        $resultAddUser = registration_user($link, $_POST['login-reg'], $_POST['password-reg'], $userRank);

                        if($resultAddUser) {
                            header('Location: '. HOST . 'login.php');
                        } else {
                            $errors[] = "<p>Ошибка регистрации! Попробуйте снова.</p>";
                        }
                    }
                }

            }  
        }
    }

    include('views/head.tpl');
    include('views/notifications.tpl');
    include('views/registration.tpl');
    include('views/footer.tpl');
?>