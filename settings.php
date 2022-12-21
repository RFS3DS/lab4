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
			<form action="readers.php" method="post">
				<button class="btn btn-light" type="submit"> Читатели </button>
			</form>
			<form action="join_book.php" method="post">
				<button class="btn btn-light" type="submit"> Книги </button>
			</form>
<?php if ($_COOKIE['user'] != "Администратор") { ?>
			<form action="settings.php" method="post">
				<button class="btn btn-light" type="submit"> Выдать </button>
			</form>
<?php } ?>
			<form action="exit.php" method="post">
				<button class="btn btn-light" type="submit"> Выход </button>
			</form>
		</nav>
	</div>
	<br>
	<br>
	<br>
<?php
if ($_COOKIE['user'] != "Администратор") { 
?>
	<div class="row">
		<div class="col-1">
		</div>
		<div class="col-7">
		<h1 class="display-4"> Для начала проведем регистрацию Вашего сервера: </h1>
		</div>
		<div class="col-3">
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-1">
		</div>
		<div class="col-4">
			<form action="new_log_taking.php" method="post">
<?php
	$host    = 'localhost';  
  	$user    = 'root';    
	$pass    = 'root'; 
	$db_name = 'php_rodin';

	$mysql   = mysqli_connect($host, $user, $pass, $db_name);
	$query   = "SELECT `cities` FROM `my_cities_names`";
  	$result  = mysqli_query($mysql, $query)  or die("ERROR " . mysqli_error($mysql));

    echo '<select name="city "class="form-control" id="city">';
    	while ($row = mysqli_fetch_row($result)) {
        	echo "<option>$row[0]</option>";
        }
    echo '</select>';
?>				<br>
				<input type="text" class="form-control" name="company" id="company" placeholder="Ваша компания"><br>
				<input type="text" class="form-control" name="ip" id="ip" placeholder="ip-адрес сервера"><br>
				<input type="text" class="form-control" name="hdd" id="hdd" placeholder="Объем жесткого диска"><br>
				<input type="text" class="form-control" name="memory" id="memory" placeholder="Объем ОЗУ"><br>
				<button class="btn btn-outline-primary"> Отправить </button>
			</form>
		</div>
		<div class="col-3">
		</div>
	</div>
	<?php 
}  
?>

</body>
</htmk>