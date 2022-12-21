<?php
  $login = filter_var(trim($_POST['login']),
  FILTER_SANITIZE_STRING);
  $name = filter_var(trim($_POST['name']),
  FILTER_SANITIZE_STRING);
  $pass = filter_var(trim($_POST['pass']),
  FILTER_SANITIZE_STRING);
  $root_id = filter_var(trim($_POST['root_id']),
  FILTER_SANITIZE_STRING);
  $root_name = filter_var(trim($_POST['root_name']),
  FILTER_SANITIZE_STRING);


  $mysql = new mysqli('localhost', 'root', 'root', 'php_rodin');
  $result = $mysql->num_rows;
  $r = $mysql->query("SELECT `login` FROM `username` WHERE `login`= '$login'");
  $result = $r->num_rows;

  $root_id = 1;
  $root_name = "User";


  if (mb_strlen($login) < 4) {
    echo "Слишком короткий логин!";
    exit();
  } else if (mb_strlen($login) > 15) {
    echo "Слишком длинный логин!";
    exit();
  } else if (mb_strlen($name) < 4) {
    echo "Введенное имя слишком маленькое!";
    exit();
  } else if (mb_strlen($name) > 20) {
    echo "Введенное имя слишком длинное!";
    exit ();
  } else if (mb_strlen($pass) < 4) {
    echo "Слишком короткий пароль!";
    exit();
  } else if (mb_strlen($pass) > 25) {
    echo "Слишком длинный пароль!";
    exit ();
  } else if ($result > 0) {
    echo "Логин занят!";
    exit();
  } else if (mb_strlen($login) == "Администратор") {
    echo "Вы не можете использовать это имя!";
    exit();
  } 

  $pass = md5($pass."djfJH8867FJH2j32H");
  
  $mysql->query("INSERT INTO `username` (`login`, `name`, `pass`, `root_id`, `root_name`) VALUES('$login', '$name', '$pass', '$root_id', '$root_name')");
  $mysql->close();

  
  require_once ('create_book_table.php');


  header('Location: /');

?>