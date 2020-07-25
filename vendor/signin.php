<?php

session_start();

##  Проверяем, заполнено ли поле 'login'
if (empty($_POST['login'])) {
  // exit('Не заполнено поле "Логин"');
  header('Location: ../index.php');
  $_SESSION['message'] = 'Не заполнено поле "Логин"';
}
##

require_once ('connect.php');

$login = $_POST['login'];
$password = md5($_POST['password']);

$query=$connect->query("SELECT COUNT(*) as count FROM users");
$query->setFetchMode(PDO::FETCH_ASSOC);
$row=$query->fetch();
$members=$row['count']; //смотрим количество строк в таблице users

echo $members;


?>



<pre>
    <?php
    print_r($check_user);
    print_r($user);
    echo '---==----<br>';
    print_r($members);
    ?>
</pre>