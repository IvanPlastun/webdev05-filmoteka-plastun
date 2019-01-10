<?php
require('config.php');
require('database.php');
$link = db_Connect();
require('models/films.php');
require('functions/login_functions.php');


if(isset($_POST['enter'])) {
    if($_POST['login'] == "") {
        $errors[] = "<p>Введите логин.</p>";
    }
    if($_POST['password'] == "") {
        $errors[] = "<p>Введите пароль.</p>";
    }
    if(empty($errors)) { 
        $dataExist = check_autorization_data($link, $_POST['login'], $_POST['password']);
        if($dataExist) {
            $login = $_POST['login'];
            $rankUser = get_rank($link, $login);

            $_SESSION['administrator'] = array('login' => $login, 'rank' => $rankUser['rank'], 'status' => 'Администратор');
            $_SESSION['user'] = array('login' => $login, 'rank' => $rankUser['rank'], 'status' => 'Пользователь');
            header('Location: '. HOST . 'index.php');
        } else {
            $errors[] = "<p>Неверные логин или пароль! Повторите вход.</p>";
        }
    }
}

include('views/head.tpl');
include('views/login.tpl');
include('views/footer.tpl');

?>