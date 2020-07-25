<?php
session_start();
if ($_SESSION['user']) {
  header('Location: profile.php');
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Cash - регистрация</title>
  <link rel="stylesheet" href="style/main.css">
</head>

<body>

  <!-- Форма регистрации -->

  <form action="vendor/signup.php" method="post" enctype="multipart/form-data">
    <label>ФИО</label>
    <input type="text" name="full_name" placeholder="Введите свое полное имя">
    <label>Логин</label>
    <input type="text" name="login" placeholder="Введите свой логин">
    <label>Пароль</label>
    <input type="password" name="password" placeholder="Введите пароль">
    <label>Подтверждение пароля</label>
    <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
    <button type="submit">Войти</button>
    <p>
      <a href="/">авторизироваться</a>
    </p>
    <?php
    if ($_SESSION['message']) {
      echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
    }
    unset($_SESSION['message']);
    ?>
  </form>

</body>

</html>