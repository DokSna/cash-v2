<?php
session_start();
if (!$_SESSION['user']) {
  header('Location: /');
}
if ($_SESSION['user']['admin'] != true) {
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
  <link rel="stylesheet" href="style/adminlk.css">
</head>

<body>
  <!-- Профиль -->
  <p><a href="vendor/logout.php" class="logout">Выход</a></p>
  <?php
  echo '<p>Пользователь: ' . $_SESSION['user']['full_name'] . '.</p>';

  echo '<a href="profile.php">user page</a>';

  # Сотрудники
  echo '<br>';
  include('./vendor/users.php');

  # Магазины
  echo '<br>';
  include('./vendor/shops_form.php');

  # Записи в таблице Cash
  echo '<br>';
  include('./vendor/report_cash.php');

  ?>
  <!-- Административная часть -->
  <script src="calc.js"></script>
</body>

</html>