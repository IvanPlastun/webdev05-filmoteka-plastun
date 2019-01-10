<?php
	$errors = array();
	require('config.php');
	require('database.php');
	$link = db_Connect();
	require('models/films.php');
	require('functions/login_functions.php');

	//Удаление фильма
	if(!empty($_GET)) {
		if(array_key_exists('action', $_GET)) {
			$result = film_delete($link, $_GET['id']);
			if($result)
				$resultInfo = "<p>Фильм был удален</p>";
			else
				$resultError = "<p>Что-то пошло не так.</p>";
		}
	}

	$films = films_all($link);

	include('views/head.tpl');
	include('views/notifications.tpl');
	include('views/index.tpl');
	include('views/footer.tpl');

?>