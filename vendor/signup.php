<?php

session_start();

##  Проверяем, заполнено ли поле 'login'
if (empty($_POST['login'])) {
  // exit('Не заполнено поле "Логин"');
  header('Location: ../index.php');
  $_SESSION['message'] = 'Не заполнено поле "Логин"';
}
##

require_once 'connect.php';

$full_name = $_POST['full_name'];
$login = $_POST['login'];
// $email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if ($password === $password_confirm) {

  // $path = 'uploads/' . time() . $_FILES['avatar']['name'];
  // if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
  //     $_SESSION['message'] = 'Ошибка при загрузке сообщения';
  //     header('Location: ../register.php');
  // }

  $password = md5($password);

  mysqli_query($connect, "INSERT INTO `users` (`id_user`, `full_name`, `login`, `password`)
                                             VALUES (NULL, '$full_name', '$login', '$password')");

  $_SESSION['message'] = 'Регистрация прошла успешно!';
  header('Location: ../index.php');
} else {
  $_SESSION['message'] = 'Пароли не совпадают';
  header('Location: ../register.php');
}
