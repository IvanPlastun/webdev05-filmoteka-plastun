<?php
    require('config.php');
    require('database.php');
    $link = db_Connect();
    require('models/films.php');
    require('functions/login_functions.php');

    if(!empty($_POST)) {
        if(array_key_exists('addFilm', $_POST)) {

            if($_POST['title'] == '') {
                $errors[] = "<p>Необходимо ввести название фильма!</p>";
            }
            if($_POST['genre'] == '') {
                $errors[] = "<p>Необходимо ввести жанр фильма!</p>";
            }
            if($_POST['year'] == '') {
                $errors[] = "<p>Необходимо ввести год фильма!</p>";
            }

            if(empty($errors)) {
                $result = film_new($link, $_POST['title'], $_POST['genre'], $_POST['year'], $_POST['description']);

            if($result)
                $resultSuccess = "<p>Фильм был успешно добавлен</p>";
            else 
                $resultError = "<p>Что-то пошло не так. Добавьте фильм ещё раз.</p>";
            }
        }
    }

    include('views/head.tpl');
    include('views/notifications.tpl');
    include('views/new-film.tpl');
    include('views/footer.tpl');
?>
