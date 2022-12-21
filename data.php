<?php 
	$taken_at = filter_var(trim($_POST['taken_at']), FILTER_SANITIZE_STRING);
	$last_name = filter_var(trim($_POST['last_name']), FILTER_SANITIZE_STRING);
	$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);

	$host = 'localhost';
	$user = 'root';
	$pass = 'root';
	$db_name = 'php_rodin';

	$mysql = mysqli_connect($host, $user, $pass, $db_name)
	$query = "INSERT INTO 'data' ('taken_at', 'last_name', 'name') VALUES('$taken_at', '$last_name', '$name')"
	$result = mysqli_query($mysql, $query) or die("ERROR " . mysqli_error($mysql));

	$mysql->query($result);
?>