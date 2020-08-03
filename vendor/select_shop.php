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

  # # # cписок магазинов в таблице # # #
  require_once('connect.php');

  # поскольку это обычный запрос без placeholder’ов,
  # можно сразу использовать метод query()  
  $STH = $connect->query('SELECT * FROM shops');

  # устанавливаем режим выборки
  $STH->setFetchMode(PDO::FETCH_ASSOC);
  echo '<br><div class="table_shop">
        <table>
          <thead>
            <tr><th colspan="6">Магазины</th></tr>
            <tr>
              <th></th>
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
    echo '<tr>
            <th><label for="selShop_' . $row['id_shop'] . '"><input type="radio" name="id_shop" value="' . $row['id_shop'] . '" id="selShop_' . $row['id_shop'] . '"></label></th>
            <th><label for="selShop_' . $row['id_shop'] . '">' . $row['id_shop'] . '</label></th>
            <td id="nameShopid_' . $row['id_shop'] . '"><label for="selShop_' . $row['id_shop'] . '">' . $row['name_shop'] . '</label></td>
            <td id="adresShopid_' . $row['id_shop'] . '"><label for="selShop_' . $row['id_shop'] . '">' . $row['address_shop'] . '</label></td>
            <th><label for="selShop_' . $row['id_shop'] . '">' . $row['phone'] . '</label></th>
            <td><label for="selShop_' . $row['id_shop'] . '">' . $row['email'] . '</label></td>
            </tr>';
    # onclick="choice()" - снимает блокировку с кнопки отправки формы, когда выбран магазин
  }
  # пишем "хвост" таблицы
  echo '</tbody></table></div>';
  if ($_SESSION['message_shop']) {
    echo '<p class="msg_shop"> ' . $_SESSION['message_shop'] . ' </p>';
    unset($_SESSION['message_shop']);
  }
}
