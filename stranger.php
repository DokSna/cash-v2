<?php
session_start();
if (!$_SESSION['user']) {
  header('Location: /');
}
if ($_SESSION['user']['access_level'] > 0) {
  header('Location: profile.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php
  echo '<title>Cash - ' . $_SESSION['user']['full_name'] . '</title>';
  ?>

  <link rel="stylesheet" href="style/profile.css">
  <link rel="stylesheet" href="style/userpanel.css">

</head>

<body>
  <?php
  require('blocks/userpanel.php');
  ?>
  <div class="msg_stranger">
    <p>После регистрации, для пользования сайтом - нужно что бы Вашу "учётную запись" подтвердил администратор.</p>
    <p>Сообщите администратору свои ФИО и логин.</p>
  </div>

  <?php
  // include ('./blocks/test.php');
  // echo 'ddd<pre>' . print_r($_SESSION['user']) . '</pre>';
  ?>

</body>

</html>
