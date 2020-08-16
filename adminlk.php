<?php
session_start();
if (!$_SESSION['user']) {
  header('Location: /');
}
elseif ($_SESSION['user']['access_level'] < 1) {
  header('Location: ../stranger.php');
}
elseif ($_SESSION['user']['access_level'] < 2) {
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
  <link rel="stylesheet" href="style/adminlk.css">
</head>

<body>

  <!-- Профиль -->
  <?php
  require('blocks/adminpanel.php');

  # Сотрудники
  include('./vendor/users.php');

  # Магазины
  echo '<br>';
  include('./vendor/shops_form.php');

  # Записи в таблице Cash
  echo '<br>';
  include('./vendor/report_cash.php');

  ?>
  <!-- Административная часть -->
  <script src="admin.js"></script>
</body>

</html>