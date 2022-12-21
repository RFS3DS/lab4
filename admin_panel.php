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
<?php if ($_COOKIE['user'] == "Администратор") { ?>
	<div class="row">
		<div class="col-1">
		</div>
		<div class="col-2">
			Удаление пользователей:
		</div>
		<div class="col-2">
			Удаление серверов:
		</div>
	</div>
<?php
	$host    = 'localhost';  
  	$user    = 'root';    
	$pass    = 'root'; 
	$db_name = 'php_rodin';

	$mysql   = mysqli_connect($host, $user, $pass, $db_name);
	$query   = "SELECT `login` FROM `username`";
  	$result  = mysqli_query($mysql, $query)  or die("ERROR " . mysqli_error($mysql));
  	mysqli_close($mysql);
?>
	<div class="row">
		<div class="col-1">
		</div>
		<div class="col-2">
			<form action="delete_user.php" method="post">
			<?php   echo '<select name="delete_user" class="form-control" id="delete_user">';
    			while ($row = mysqli_fetch_row($result)) {
        			echo "<option>$row[0]</option>";
        	}
    			echo '</select>';
			?>
			<button class="btn btn-outline-danger">
				Удалить
			</button>	
		</div>
		<?php
			$host    = 'localhost';  
		  	$user    = 'root';    
			$pass    = 'root'; 
			$db_name = 'php_rodin';

			$mysql   = mysqli_connect($host, $user, $pass, $db_name);
			$query   = "SELECT * FROM `server_data`";
		  	$result  = mysqli_query($mysql, $query)  or die("ERROR " . mysqli_error($mysql));
		  	mysqli_close($mysql);
		?>
		<div class="col-3">
			<form action="delete_server.php" method="post">
			<?php   echo '<select name="delete_user" class="form-control" id="delete_user">';
    			while ($row = mysqli_fetch_row($result)) {
        			echo "<option>$row[2], $row[3]</option>";
        	}
    			echo '</select>';
			?>
			<button class="btn btn-outline-danger">
				Удалить
			</button>
		</div>
	</div>
<?php 
} else {
	echo '
		<div class="row">
			<div class="col-1">
			</div>
			<div class="col-10">
			<h1 class="display-4"> У вас нет доступа к этой странице. </h1>
			</div>
			<div class="col-1">
			</div>
		</div>
	';
} 

?>

</body>
</html>