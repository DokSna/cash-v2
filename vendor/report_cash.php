<?php
session_start();
if (!$_SESSION['user']) {
  header('Location: /');
}
if ($_SESSION['user']['admin'] != true) {
  header('Location: profile.php');
} else {
  require_once('connect.php');

  ### Кассовый отчет ###
  # поскольку это обычный запрос без placeholder’ов,
  # можно сразу использовать метод query()  
  $sql_shop = $connect->query('SELECT * FROM cash');  #читаем таблицу shop
  $sql_cash = $connect->query('SELECT * FROM cash');  #читаем таблицу cash

  # устанавливаем режим выборки
  $sql_shop->setFetchMode(PDO::FETCH_ASSOC);
  $sql_cash->setFetchMode(PDO::FETCH_ASSOC);
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
  while ($row = $sql_shop->fetch()) {
    echo '<tr><th>' . $row['id_shop'] . '</th><td id="nameShopid_' . $row['id_shop'] . '">' . $row['name_shop'] . '</td><td id="adresShopid_' . $row['id_shop'] . '">' . $row['address_shop'] . '</td>
    <th>' . $row['phone'] . '</th><td>' . $row['email'] . '</td></tr>';
    # onclick="choice()" - снимает блокировку с кнопки отправки формы, когда выбран магазин

    # для каждой строки магазина найдём записи в таблице cash
    while ($row_cash = $sql_cash->fetch()) {
      if ($row['id_shop'] == $row_cash['id_shop']) {
        
      }
    }
  }
  echo '</tbody></table></div>';
  if ($_SESSION['message_shop']) {
    echo '<p class="msg_shop"> ' . $_SESSION['message_shop'] . ' </p>';
    unset($_SESSION['message_shop']);
  }
}
