<?php

session_start();

##  Проверяем, заполнено ли поле 'login'
if (empty($_POST['login'])) {
  // exit('Не заполнено поле "Логин"');
  header('Location: ../index.php');
  $_SESSION['message'] = 'Не заполнено поле "Логин"';
}
##
else {
  require_once('connect.php');

  $login = $_POST['login'];
  $password = md5($_POST['password']);
  // $password = $_POST['password'];

  // $query=$connect->query("SELECT COUNT(*) as count FROM users");
  // $query->setFetchMode(PDO::FETCH_ASSOC);
  // $row=$query->fetch();
  // $members=$row['count']; //смотрим количество строк в таблице users

  // echo $members;
  // ----------------------------

  # 1. Текст запроса - сохраняем в переменную $sql
  $sql = ('SELECT * FROM users WHERE (login = :login) AND (password = :password)');

  # 2. Подготавливаем текст запроса, с помощью функции prepare()
  $sqlmsg = $connect->prepare($sql);

  # 3. Указываем параметры - передаём в запрос массив с переменными
  $data = array(
    'login' => $login,
    'password' => $password
  );
  $sqlmsg->execute($data);    //выполняем метод execute(), передав ему массив с переменными

  # 4. Устанавливаем режим выборки
  $sqlmsg->setFetchMode(PDO::FETCH_ASSOC);

  # 5. Получаем строку
  $row = $sqlmsg->fetch();

  // echo $row['login'];

  // while($row = $sqlmsg->fetch()) {  
  //     echo $row['login'] . "\n";  
  //     echo $row['password'] . "\n";  
  //     // echo $row['city'] . "\n";  
  // }

  ############============---------------

  #Если строка пользователя найдена - перенаправляем его на страницу профиля, и добавляем его в переменную $_SESSION['user']
  #Иначе возвращаем в начало

  if ($row) {

    $user = $row;

    $_SESSION['user'] = [
      "id" => $user['id_user '],
      "full_name" => $user['full_name'],
      "login" => $user['login']
    ];

    header('Location: ../profile.php');
  } else {
    $_SESSION['message'] = 'Не верный логин или пароль';
    header('Location: ../index.php');
  }
}
?>



<!-- <pre>
    <?php
    // print_r($check_user);
    // print_r($user);
    // echo '---==----<br>';
    // print_r($row);
    // echo '-=-<br>';
    // echo $row['login'];
    // echo $login;
    ?>
</pre> -->