<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8" />
	<title>Иван Пластун - Фильмотека</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="stylesheet" href="libs/normalize-css/normalize.css" />
	<link rel="stylesheet" href="libs/bootstrap-4-grid/grid.min.css" />
	<link rel="stylesheet" href="libs/jquery-custom-scrollbar/jquery.custom-scrollbar.css" />
	<link rel="stylesheet" href="./css/main.css" />
	<link rel="stylesheet" href="./css/custom.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&amp;subset=cyrillic-ext" rel="stylesheet">
	<!--[if lt IE 9]><script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script><![endif]-->
</head>

<body class="index-page">
	<div class="container user-content section-page">
		<nav class="header-admin">
			<div class="admin-nav">
				<a href="index.php" class="admin-nav__link">Все фильмы</a>
				<?php if(isAdmin()) {?>
					<a href="new.php" class="admin-nav__link">Добавить фильм</a>
				<?php } ?>

				<?php if(isUser() || isAdmin()) {?>
					<a href="request.php" class="admin-nav__link">Указать информацию</a>
				<?php } ?>


				<?php if(isAdmin() || isUser()) {?>
					<a href="logout.php" class="admin-nav__link">Выход</a>
				<?php } else  { ?>
					<a href="login.php" class="admin-nav__link">Вход</a>
					<a href="registration.php" class="admin-nav__link">Регистрация</a>
				<?php } ?>
			</div>
			<?php if(!empty($_SESSION)) {  ?>
				<?php if(array_key_exists('administrator', $_SESSION) || array_key_exists('user', $_SESSION))  { ?>
					<div class="login-data">
						<?php if(isAdmin()) {?>
							<div class="badge"><?=@$_SESSION['administrator']['login']?></div>
							<div class="badge"><?=@$_SESSION['administrator']['status']?></div>
						<?php } else if(isUser()) { ?>
							<div class="badge"><?=@$_SESSION['user']['login']?></div>
							<div class="badge"><?=@$_SESSION['user']['status']?></div>	
						<?php } ?>
					</div>
				<?php } ?>
			<?php } ?>


		</nav>
		<?php if(isset($_COOKIE['user-name']) && isset($_COOKIE['user-city'])) { ?>
			<?php if(isUser() || isAdmin()) {?>
				<div>
					<p>Привет, <?=$_COOKIE['user-name']?> из <?=$_COOKIE['user-city']?></p>
				</div>
			<?php } ?>
		<?php } ?>