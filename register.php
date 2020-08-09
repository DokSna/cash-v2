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

  <!-- Форма регистрации --><!-- pattern="[А-Яа-яЁё]*?\s[А-Яа-яЁё]*?\s[А-Яа-яЁё]{7,100}"  -->
  <!-- pattern="[А-Яа-яЁё ]{7,100}" -->

  <form action="vendor/signup.php" method="post">
    <label>ФИО</label>
    <input type="text" name="full_name" placeholder="Введите свое полное имя" required pattern="[А-ЯЁ][а-яё]{1,32}\s[А-ЯЁ][а-яё]{1,32}\s[А-ЯЁ][а-яё]{1,32}$" 
    
      title="Введите Фамилию Имя и Отчество (через пробелы c Заглавной буквы, 6-98 русских символов).">

    <label>Логин</label>
    <input type="text" name="login" placeholder="Введите логин" required pattern="[A-Za-z0-9]{3,30}" 
      title="Используйте только латинские буквы (A-Z, a-z) и цифры (0-9). Длина от 3-х до 30-ти символов.">

    <label>Пароль</label>
    <input type="password" name="password" placeholder="Введите пароль" required pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,30}" 
    title = "Пароль должен содержать хотя бы одну цифру, одну маленькую и одну большую латинскую букву. Длина 6-30 символов.">

    <label>Подтверждение пароля</label>
    <input type="password" name="password_confirm" placeholder="Подтвердите пароль" required pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,30}" 
    title = "Пароль должен содержать хотя бы одну цифру, одну маленькую и одну большую латинскую букву. Длина 6-30 символов.">

    <button type="submit">Зарегистрироваться</button>
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