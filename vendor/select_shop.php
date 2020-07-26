<?php
session_start();
if (!$_SESSION['user']) {
  header('Location: /');
} else {
  require_once('connect.php');

  # поскольку это обычный запрос без placeholder’ов,
  # можно сразу использовать метод query()  
  $STH = $connect->query('SELECT * FROM shops');

  # устанавливаем режим выборки
  $STH->setFetchMode(PDO::FETCH_ASSOC);

  while ($row = $STH->fetch()) {
    echo '<label><input type="radio" name="theshop" value="' . $row['id_shop'] . '">' . $row['name_shop'] . ' - адрес: ' . $row['address_shop'] . '</label><br>';
  }
  echo '<br>';
}
