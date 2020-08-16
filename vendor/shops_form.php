<?php
session_start();
if (!$_SESSION['user']) {
  header('Location: /');
}
if ($_SESSION['user']['access_level'] < 2) {
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
            <tr><th colspan="5">Магазины</th></tr>
            <tr>
              <th>id</th>
              <th>Название</th>
              <th>адрес</th>
              <th>телефон</th>
              <th>e-mail</th>
            </tr>
          </thead>
          <tbody>
  ';
  # выводим строки таблицы
  while ($row = $STH->fetch()) {
    echo '<tr><th>' . $row['id_shop'] . '</th><td id="nameShopid_' . $row['id_shop'] . '">' . $row['name_shop'] . '</td><td id="adresShopid_' . $row['id_shop'] . '">' . $row['address_shop'] . '</td>
    <th>' . $row['phone'] . '</th><td>' . $row['email'] . '</td></tr>';
    # onclick="choice()" - снимает блокировку с кнопки отправки формы, когда выбран магазин
  }
  # пишем "хвост" таблицы
  echo '</tbody></table></div>';
  if ($_SESSION['message_shop']) {
    echo '<p class="msg_shop"> ' . $_SESSION['message_shop'] . ' </p>';
    unset($_SESSION['message_shop']);
  }
}
