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

  // $sql_cash = $connect->query('SELECT cash.record_id, cash.time, cash.summa, 
  //                                     users.full_name,
  //                                     shops.name_shop
  //                                      FROM cash 
  //                                      LEFT JOIN users USING(id_user) 
  //                                      LEFT JOIN shops USING(id_shop) 
                                       
  //                                      order by cash.time, name_shop');  #читаем таблицу cash

  // # устанавливаем режим выборки
  // $sql_cash->setFetchMode(PDO::FETCH_ASSOC);

  # получим магазины
  $sql_shop = $connect->query('SELECT * FROM shops');

  # устанавливаем режим выборки
  $sql_shop->setFetchMode(PDO::FETCH_ASSOC);

  # выводим результат на страницу
  while ($row_shop = $sql_shop->fetch()) {
    ##########
    $sql_cash = $connect->query("SELECT cash.record_id, cash.time, cash.summa, 
                                  users.full_name,
                                  shops.name_shop, shops.id_shop
                                  FROM cash 
                                  LEFT JOIN users USING(id_user) 
                                  LEFT JOIN shops USING(id_shop)
                                  WHERE  shops.id_shop = '$row_shop[id_shop]'
                                  ORDER BY cash.time");  #читаем таблицу cash

    # устанавливаем режим выборки
    $sql_cash->setFetchMode(PDO::FETCH_ASSOC);

    ##########
    echo '<br>
    <div class="table_shop">
      <table>';
    echo  '<thead>
      <tr>
        <th colspan=6>' . $row_shop['name_shop'] . '. - ' . $row_shop['address_shop'] . '. ' . $row_shop['phone'] . '. e-mail: ' . $row_shop['email'] . '</th>
      </tr>
      <tr>
        <th>№</th>
        <th>id</th>
        <th>Время</th>
        <th>Магазин</th>
        <th>Пользователь</th>
        <th>Сумма</th>
      </tr>
    </thead>
    <tbody>';
    $i = 0;
    #рисуем строку
    while ($row_cash = $sql_cash->fetch()) {
      // if ($row_cash['id_shop'] == $row_shop['id_shop']) {
      // if ($row_cash['name_shop'] == $row_shop['name_shop']) {

        // while ($row_cash = $sql_cash->fetch()) {
        $i += 1;
        // if ($row_shop['id_shop'] == $row_cash['id_shop']) {

        echo '<tr>
                <th>' . $i . '</th>
                <th>' . $row_cash['record_id'] . '</th>
                <th>' . $row_cash['time'] . '</th>
                <td>' . $row_cash['name_shop'] . '</td>
                <td>' . $row_cash['full_name'] . '</td>
                <td>' . $row_cash['summa'] . '</td>
                </tr>';
        // }
        // }
        // echo '';
      // }
    }
    echo '</tbody></table></div>';
  }
  #
  // echo '<br>
  //     <div class="table_shop">
  //       <table>';
  // echo  '<thead>
  //       <tr>
  //         <th colspan=5>' . $row_shop['name_shop'] . '</th>
  //       </tr>
  //       <tr>
  //         <th>№</th>
  //         <th>id</th>
  //         <th>Время</th>
  //         <th>Пользователь</th>
  //         <th>Сумма</th>
  //       </tr>
  //     </thead>
  //     <tbody>';
  // $i = 0;
  // while ($row_cash = $sql_cash->fetch()) {
  //   // while ($row_cash = $sql_cash->fetch()) {
  //   $i += 1;
  //   // if ($row_shop['id_shop'] == $row_cash['id_shop']) {

  //   echo '<tr>
  //       <th>' . $i . '</th>
  //       <th>' . $row_cash['record_id'] . '</th>
  //       <th>' . $row_cash['time'] . '</th>
  //       <td>' . $row_cash['full_name'] . '</td>
  //       <td>' . $row_cash['summa'] . '</td>
  //       </tr>';
  //   // }
  //   // }
  //   // echo '';
  // }
  // echo '</tbody></table></div>';
  #
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