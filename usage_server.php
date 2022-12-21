<!DOCTYPE html>
<html lang="ru">
<head>
	<script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="css/addons-pro/simple-charts.min.css" rel="stylesheet">
</head>
<body>
	<div class="header">
		<!-- <p> Привет, <?=$_COOKIE['user']?>! </p> -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
			<a class="navbar-brand" href="index.php"> zhdtor </a>
			<?php
			if ($_COOKIE['user'] == "Администратор") {
				echo '<form action="admin_panel.php" method="post">';
				echo	'<button class="btn btn-light" type="submit"> Admin </button>';
				echo '</form>';
			}
			?>
			<form action="logged.php" method="post">
				<button class="btn btn-light" type="submit"> Мониторинг </button>
			</form>
			<form action="join_book.php" method="post">
				<button class="btn btn-light" type="submit"> Чат </button>
			</form>
			<form action="settings.php" method="post">
				<button class="btn btn-light" type="submit"> Настройки </button>
			</form>
			<form action="exit.php" method="post">
				<button class="btn btn-light" type="submit"> Выход </button>
			</form>
		</nav>
	</div>
	<br>
	<br>
	<br>
	<div class="main">
		<div class="row">
			<div class="col-2">
				<form action="logged.php" method="post">
					<button type="submit" class="btn btn-primary btn-sm btn-white btn-round"> Назад </button>
				</form>
			</div>
		</div>
		<br>
		<div class="list-group">
			<div class="row">
				<div class="col-2">
				<a href="moscow.php" class="list-group-item list-group-item-action active">Москва</a>
	  			<a href="#" class="list-group-item list-group-item-action">Нижний Новгород</a>
	  			<a href="#" class="list-group-item list-group-item-action">Астана</a>
	  			<a href="#" class="list-group-item list-group-item-action">Санкт-Петербург</a>
	  			<a href="#" class="list-group-item list-group-item-action">Воронеж</a>
	  			</div>
	  			<div class="row">
					<div class="col">
					</div>
					<div class="col">
						<canvas id="polarChart"></canvas>
					</div>
					<div class="col">
					</div>
				</div>
			</div>
		</div>
	</div>

	

</body>

</htmk>