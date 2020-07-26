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
</head>

<body>
  <!-- Профиль -->
  <p><a href="vendor/logout.php" class="logout">Выход</a></p>
  <?php
  echo '<p>Пользователь: ' . $_SESSION['user']['full_name'] . '.</p>';

  echo '<a href="profile.php">user page</a>';

  # Магазины
  // $sql_shops = $connect->query('SELECT * FROM shops');

  // # устанавливаем режим выборки
  // $sql_shops->setFetchMode(PDO::FETCH_ASSOC);

  // while ($row = $sql_shops->fetch()) {
  //   echo '<p>id = ' . $row['id_shop'] . '. Название: ' . $row['name_shop'] . ' - адрес: ' . $row['address_shop'] . '.</p>';
  //   // echo '<br>';
  // }
  // echo '<br>';

  ?>
  <!-- Административная часть -->

</body>

</html>