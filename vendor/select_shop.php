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
    echo '<label><input type="radio" name="id_shop" value="' . $row['id_shop'] . '">' . $row['name_shop'] . ' - адрес: ' . $row['address_shop'] . '</label><br>';
    # onclick="choice()" - снимает блокировку с кнопки отправки формы, когда выбран магазин
  }
  echo '<br>';
  if ($_SESSION['message_shop']) {
    echo '<p class="msg_shop"> ' . $_SESSION['message_shop'] . ' </p>';
    unset($_SESSION['message_shop']);
  }

}
