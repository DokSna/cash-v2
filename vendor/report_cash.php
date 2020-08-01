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
  $sql_cash = $connect->query('SELECT cash.*, users.full_name FROM cash LEFT JOIN users USING(id_user)  order by cash.time');  #читаем таблицу cash

  # устанавливаем режим выборки
  $sql_cash->setFetchMode(PDO::FETCH_ASSOC);

  echo '<br>
      <div class="table_shop">
        <table>';
  echo  '<thead>
        <tr>
          <th colspan=6>Название магазина</th>
        </tr>
        <tr>
          <th>№</th>
          <th>id</th>
          <th>Время</th>
          <th>магазин</th>
          <th>Пользователь</th>
          <th>Сумма</th>
        </tr>
      </thead>
      <tbody>';
  $i = 0;
  while ($row_cash = $sql_cash->fetch()) {
    // while ($row_cash = $sql_cash->fetch()) {
    $i += 1;
    // if ($row_shop['id_shop'] == $row_cash['id_shop']) {

    echo '<tr>
        <th>' . $i . '</th>
        <th>' . $row_cash['record_id'] . '</th>
        <th>' . $row_cash['time'] . '</th>
        <td>' . $row_cash['id_shop'] . '</td>
        <td>' . $row_cash['full_name'] . '</td>
        <td>' . $row_cash['summa'] . '</td>
        </tr>';
    // }
    // }
    echo '</tbody>';
  }
  echo '</table></div>';
  if ($_SESSION['message_shop']) {
    echo '<p class="msg_shop"> ' . $_SESSION['message_shop'] . ' </p>';
    unset($_SESSION['message_shop']);
  }
}

?>

<!-- <pre> -->
    <?php
    // echo '-=-<br>';
    // print_r($sql_cash);
    // echo '-=-<br>';
    // print_r($row_cash[0]);
    // print_r($summa);
    ?>
<!-- </pre> -->