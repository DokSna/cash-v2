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
  <title>Cash - авторизация.</title>
  <link rel="stylesheet" href="style/main.css">
</head>

<body>

  <!-- Форма авторизации -->

  <form action="vendor/signin.php" method="post">
    <label>Логин</label>
    <input type="text" name="login" placeholder="Введите свой логин" required pattern="[A-Za-z0-9]{3,30}">
    <label>Пароль</label>
    <input type="password" name="password" placeholder="Введите пароль" required pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,30}">
    <button type="submit">Войти</button>
    <p>
      <a href="/register.php">зарегистрироваться</a>
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