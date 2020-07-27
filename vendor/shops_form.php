<?php
session_start();
if (!$_SESSION['user']) {
  header('Location: /');
}
if ($_SESSION['user']['admin'] != true) {
  header('Location: profile.php');
} else {
  require_once('connect.php');

  # поскольку это обычный запрос без placeholder’ов,
  # можно сразу использовать метод query()  
  $STH = $connect->query('SELECT * FROM shops');

  # устанавливаем режим выборки
  $STH->setFetchMode(PDO::FETCH_ASSOC);
  echo '<br><div class="table_shop">
        <table>
          <thead>
            <tr><th colspan="3">Магазины</th></tr>
            <tr>
              <th>id</th>
              <th>Название</th>
              <th>адрес</th>
            </tr>
          </thead>
          <tbody>
  ';
  while ($row = $STH->fetch()) {
    echo '<tr><td>' . $row['id_shop'] . '</td><td>' . $row['name_shop'] . '</td><td>' . $row['address_shop'] . '</td></tr>';
    # onclick="choice()" - снимает блокировку с кнопки отправки формы, когда выбран магазин
  }
  echo '</tbody></table></div>';
  if ($_SESSION['message_shop']) {
    echo '<p class="msg_shop"> ' . $_SESSION['message_shop'] . ' </p>';
    unset($_SESSION['message_shop']);
  }
}
