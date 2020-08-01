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
  $sql_users = $connect->query('SELECT * FROM users');
  
  # устанавливаем режим выборки
  $sql_users->setFetchMode(PDO::FETCH_ASSOC);

  # выводим таблицу на экран
  echo '<br><div class="table_shop">
        <table>
          <thead>
            <tr><th colspan="5">Сотрудники</th></tr>
            <tr>
              <th>id</th>
              <th>ФИО</th>
              <th>Логин</th>
              <th>пароль</th>
              <th>админ</th>
            </tr>
          </thead>
          <tbody>
  ';
  # выводим строки таблицы
  while ($row_user = $sql_users->fetch()) {
    echo '<tr>
            <th>' . $row_user['id_user'] . '</th>
            <td id="nameUserid_' . $row_user['id_user'] . '">' . $row_user['full_name'] . '</td>
            <td id="passwordid_' . $row_user['id_user'] . '">' . $row_user['login'] . '</td>
            <th>изменить пароль</th>
            <td class="poz_center">';
              if ($row_user['admin']) {
                echo ('да');
              } else {
                echo ('нет');
              }
      echo '</td>
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
