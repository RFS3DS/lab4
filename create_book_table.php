<?php 
  $host = 'localhost';  
  $user = 'root';    
  $pass = 'root'; 
  $db_name = 'php_rodin';
  $mysql = mysqli_connect($host, $user, $pass, $db_name);
  $query =
  ("
    CREATE TABLE `{$_COOKIE['user']}`
    (
    `id` int(15) NOT NULL,
    `name` varchar(30) NOT NULL,
    `text` text NOT NULL
    ) 
    ENGINE=MyISAM DEFAULT CHARSET=cp1251;
    ALTER TABLE `book`
    ADD PRIMARY KEY (`id`);
    ALTER TABLE `book`
    MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
    COMMIT;
  ");
    if ($query) {
      $result = mysqli_query($mysql, $query)  or die("ERROR " . mysqli_error($mysql));
    } else {
      echo "Невозможно создать таблицу";
      exit();
    }

    $mysql->close();

    echo '$_COOKIE['user']';
?>