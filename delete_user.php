<?php 

	$host = 'localhost';  
  	$user = 'root';    
  	$pass = 'root'; 
  	$db_name = 'php_rodin';

  	$link = mysqli_connect($host, $user, $pass, $db_name);
  	mysqli_query($link, "SET NAMES 'utf8'")  or die ("ERROR " . mysqli_error($mysql));

 	$user = $_POST['$row[0]'];
 	$query = "DELETE FROM `username` WHERE `login` = '$user'";
 	mysqli_query($link, $query) or die ("ERROR " . mysqli_error($mysql));	

?>