<?php
session_start();

##  Проверяем, заполнено ли поле 'login'
if (empty($_POST['login'])) {
  // exit('Не заполнено поле "Логин"');
  header('Location: ../register.php');
  $_SESSION['message'] = 'Не заполнено поле "Логин"';
}
##
else {
  require_once 'connect.php';

  $full_name = $_POST['full_name'];
  $login = $_POST['login'];
  $password = $_POST['password'];
  $password_confirm = $_POST['password_confirm'];

  if ($password === $password_confirm) {

    $password = md5($password);
    // $password = $password;

    # 1.Создаём запись строки с новым пользователем в таблицу users
    $sql = 'INSERT INTO `users` (`id_user`, `full_name`, `login`, `password`) VALUES (:id, :full_name, :login, :password)';

    # 2.Создаём массив с данными
    $data = array(
      'id' => NULL,
      'full_name' => $full_name,
      'login' => $login,
      'password' => $password
    );

    # 3. Подгатавливаем текст запроса
    $adduser = $connect->prepare($sql);
    # 4.Выполняем запрос
    $adduser->execute($data);

    // mysqli_query($connect, "INSERT INTO `users` (`id_user`, `full_name`, `login`, `password`) VALUES (NULL, '$full_name', '$login', '$password')");

    $_SESSION['message'] = 'Регистрация прошла успешно!';
    header('Location: ../index.php');
  } else {
    $_SESSION['message'] = 'Пароли не совпадают';
    header('Location: ../register.php');
  }
}
