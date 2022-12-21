<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> <!-- Подключение библиотеки Bootstrap 4 для красивого оформления страничек -->

<body>

	<div class="container">
		<br>
		<br>
		<?php 
			if ($_COOKIE['user'] == ''): //Проверка на авторизованность пользователя (если он находится в текущей сессии и попытается повторно открыть эту страницу - у него она не откроется, пока он не выйдет)
		?>
		<div class="row align-items-center"> <!-- Создание Grid-системы Bootstrap 4 -->
			<div class="col-4">
			</div>
    		<div class="col-3">
				<h1> Регистрация </h1>
				<div class="register">
					<form action="check.php" method="post"> <!-- Создание формы регистрации -->
						<input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
						<input type="text" class="form-control" name="name" id="name" placeholder="Введите Ваше имя"><br>
						<input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль"><br>
						<button class="btn btn-success"> Регистрация </button> <!-- При нажатии на эту кнопку нас перекинет на страницу check.php -->
					</form>
				</div>
			</div>
			<div class="col-4">
			</div>
		</div>
		<div class="row align-items-center">
			<div class="col-4">
			</div>
			<div class="col-3">
				<br>
				<h1> Вход </h1>
				<div class="login">
					<form action="login.php" method="post"> <!-- Создание формы авторизации -->
						<input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
						<input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль"><br>
						<button class="btn btn-success" type="submit"> Войти </button> <!-- При нажатии на эту кнопку нас перекинет на страницу login.php -->
					</form>
				</div>
			</div>
			<div class="col-4">
			</div>
		</div>
		<?php else: ?> <!-- Если пользователь авторизован - откроется страница logged.php --> 
			echo '<script>window.location.href = "logged.php";</script>'; 
		<?php endif;?>
	</div>
</body>
</html>