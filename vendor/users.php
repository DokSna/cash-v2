<?php
session_start();
if (!$_SESSION['user']) {
  header('Location: /');
} elseif ($_SESSION['user']['access_level'] < 1) {
  header('Location: stranger.php');
} elseif ($_SESSION['user']['access_level'] < 2) {
  header('Location: profile.php');
} else {
  require_once('connect.php');

  # поскольку это обычный запрос без placeholder’ов,
  # можно сразу использовать метод query()  
  $sql_users = $connect->query('SELECT * FROM users');

  # устанавливаем режим выборки
  $sql_users->setFetchMode(PDO::FETCH_ASSOC);

  # выводим таблицу на экран
  echo '<div class="table_shop">
          <form action="vendor/edit-row.php" method="post">
            <table>
              <thead>
                <tr><th colspan="5">Сотрудники</th></tr>
                <tr>
                  <th>id</th>
                  <th>ФИО</th>
                  <th>Логин</th>
                  <th>доступ</th>
                  <th>изменить</th>
                </tr>
              </thead>
              <tbody>
  ';
  # выводим строки таблицы
  while ($row_user = $sql_users->fetch()) {
    echo '<tr>
            <th id="user_id_' . $row_user['id_user'] . '">' . $row_user['id_user'] . '</th>
            <td id="user_full_name_' . $row_user['id_user'] . '">' . $row_user['full_name'] . '</td>
            <td id="user_login_' . $row_user['id_user'] . '">' . $row_user['login'] . '</td>
            <td id="user_access_level_' . $row_user['id_user'] . '" class="poz_center ';
    if ($row_user['access_level'] == 1) {
      echo ('check_true">сотрудник');
    }
    elseif ($row_user['access_level'] == 2) {
      echo ('check_true_admin">админ');
    }
    else {
      echo ('">нет');
    }
    echo '</td>';


    echo '

    <td class="setting_td" id="edit_user_id_' . $row_user['id_user'] . '">
      <button type="button" id="edit_user_but_' . $row_user['id_user'] . '" class="setting_but" onclick="edit_user(' . $row_user['id_user'] . ')">
        <img class="setting_img" src="image/setting.jpg" alt="изменить" style="vertical-align:middle height="20px""> 
      </button></td>
<!--
    <td class="poz_center setting" id="edit_user_id_' . $row_user['id_user'] . '">
      <img src="image/setting.jpg" alt="изменить" height="20px" color="green">
    </td>
-->
    ';

    echo '</tr>';
    # onclick="choice()" - снимает блокировку с кнопки отправки формы, когда выбран магазин
  }
  # пишем "хвост" таблицы
  echo '</tbody></table></form></div>';
  if ($_SESSION['message_shop']) {
    echo '<p class="msg_shop"> ' . $_SESSION['message_shop'] . ' </p>';
    unset($_SESSION['message_shop']);
  }
}
