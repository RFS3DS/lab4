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
			<form action="logged.php" method="post">
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
	</div>
	<br>
	<br>
	<div class="dropdown">
		<br>
		<div class="row">
			<div class="col-1">
			</div>
			<div class="col-4">
				<?php
					$host    = 'localhost';  
					$user    = 'root';    
					$pass    = 'root'; 
					$db_name = 'php_rodin';

					$mysql   = mysqli_connect($host, $user, $pass, $db_name);
					$query   = "SELECT * FROM `server_data`";
					$result  = mysqli_query($mysql, $query)  or die("ERROR " . mysqli_error($mysql));

					echo '<form action="serv_city_com.php" method="post">';
						echo '<br>';
						echo '<select class="selectpicker form-control">';
							while ($row = mysqli_fetch_row($result)) {
						        echo "<option>$row[1], $row[2]</option>";
						    }
						echo '</select>';
						echo '<br>';
						echo '<button class="btn btn-outline-success">Использовать этот сервер</button>';
					echo '</form>';

					mysqli_close($mysql);
				?>
		  	</div>

		  	<div class="col-6">
		  		<?php
		  			$serv_city_variable = explode("monitor.php", $_POST['serv_city_variable']);

					$host    = 'localhost';  
					$user    = 'root';    
					$pass    = 'root'; 
					$db_name = 'php_rodin';

					$mysql   = mysqli_connect($host, $user, $pass, $db_name);
					$query = "SELECT * FROM `server_data`";
					$result = mysqli_query($mysql, $query);

					$serv_city_variable = $_POST['serv_city_variable'];

					mysqli_close($mysql);
				?>
				<table class="table">
				    <tr class="table-success">
				      <th scope="col">Москва</th>
				      <th scope="col">Special Food</th>
				      <th scope="col">192.168.255.162</th>
				    </tr>
				  <tbody>
				    <tr class="table-primary">
				      <th scope="row"></th>
				      <th scope="row">ЖД</th>
				      <th scope="row">ОЗУ</th>
				    </tr>
				    <tr class="table-primary">
				      <th scope="row">Использовано</th>
				      <td>10 TB</td>
				      <td>4 GB</td>
				    </tr>
				    <tr class="table-primary">
				      <th scope="row">Всего</th>
				      <td>30 TB</td>
				      <td>32 GB</td>
				    </tr>
				  </tbody>
				</table>
		  	</div>
	    </div>
	</div>
</body>
</html>


<!--
<a class="dropdown-item" href="#">Action</a>
<option>$row[0]</option> 
-->