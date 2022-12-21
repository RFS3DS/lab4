<?php 
	$login = filter_var(trim($_POST['login']),
  	FILTER_SANITIZE_STRING);
 	$pass = filter_var(trim($_POST['pass']),
	FILTER_SANITIZE_STRING);

	$pass = md5($pass."qwsaQWSA1234");
    $mysql = new mysqli('localhost', 'root', 'root', 'php_rodin');
    $result = $mysql->query("SELECT * FROM `username` WHERE `login` = '$login' AND `pass` = '$pass'");
    $user = $result->fetch_assoc();

    if (count($user) == 0) {
    	echo "Такого пользователя нет";
    	exit();
    } else if (mb_strlen($pass) == '') {
        echo "Неверный пароль";
        exit();
    } 

   setcookie('user', $user['name'], time() + 3600, "/");

	$mysql->close();

	header('Location: /');
?>