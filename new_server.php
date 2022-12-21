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

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
		<a class="navbar-brand" href="index.php"> zhdtor </a>
		<?php
		if ($_COOKIE['user'] == "Администратор") {
			echo '<form action="admin_panel.php" method="post">';
			echo	'<button class="btn btn-light" type="submit"> Admin </button>';
			echo '</form>';
		}
		?>
		<form action="monitor.php" method="post">
			<button class="btn btn-light" type="submit"> Мониторинг </button>
		</form>
		<form action="join_book.php" method="post">
			<button class="btn btn-light" type="submit"> Чат </button>
		</form>
<?php if ($_COOKIE['user'] != "Администратор") { ?>
		<form action="settings.php" method="post">
			<button class="btn btn-light" type="submit"> Настройки </button>
		</form>
<?php } ?>
		<form action="exit.php" method="post">
			<button class="btn btn-light" type="submit"> Выход </button>
		</form>
	</nav>
	<br>
	<br>
	<br>
	<?php
		if ($_COOKIE['user'] == "Администратор") {
			echo '
				<div class="row">
					<div class="col-1">
					</div>
					<div class="col-md">
						<h1 class="display-4"> Ваш сервер уже зарегистрирован! </h1>
					</div>
					<div class="col-2">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-1">
					</div>
					<div class="col-3">
						<form action="logged.php" method="post">
							<button class="btn btn-outline-danger"> Закрыть </button>
						</form>
					</div>
					<div class="col-2">
					</div>
				</div>
				';
		} else {
		echo '
		<div class="container">';

			$city = filter_var(trim($_POST['city']),
			FILTER_SANITIZE_STRING);
			$company = filter_var(trim($_POST['company']),
			FILTER_SANITIZE_STRING);
			$ip = filter_var(trim($_POST['ip']),
			FILTER_SANITIZE_STRING);
			$hdd = filter_var(trim($_POST['hdd']),
			FILTER_SANITIZE_STRING);
			$memory = filter_var(trim($_POST['memory']),
			FILTER_SANITIZE_STRING);

		 	$host    = 'localhost';  
		 	$user    = 'root';    
			$pass    = 'root'; 
			$db_name = 'php_rodin';

			$mysql   = mysqli_connect($host, $user, $pass, $db_name);
			$query   = "INSERT INTO `server_data` (`city`, `company`, `ip`, `hdd`, `memory`) VALUES('$city', '$company', '$ip', '$hdd', '$memory')";
		  	$result  = mysqli_query($mysql, $query)  or die("ERROR " . mysqli_error($mysql));

		  	$mysql->query($result);
		echo '</div>';
		}
	?>
</body>
	
</html>