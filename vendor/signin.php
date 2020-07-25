<?php

session_start();

##  Проверяем, заполнено ли поле 'login'
if (empty($_POST['login'])) {
  // exit('Не заполнено поле "Логин"');
  header('Location: ../index.php');
  $_SESSION['message'] = 'Не заполнено поле "Логин"';
}
##

require_once ('connect.php');

$login = $_POST['login'];
$password = md5($_POST['password']);

// $query=$connect->query("SELECT COUNT(*) as count FROM users");
// $query->setFetchMode(PDO::FETCH_ASSOC);
// $row=$query->fetch();
// $members=$row['count']; //смотрим количество строк в таблице users

// echo $members;
// ----------------------------

# 1. Текст запроса - сохраняем в переменную $sql
$sql = ('SELECT * FROM users WHERE login = :login');

# 2. Подготавливаем текст запроса, с помощью функции prepare()
$sqlmsg = $connect->prepare($sql);

# 3. Указываем параметры - передаём в запрос массив с переменными
$data = array (
                'login' => $login,
                // 'password' => $password
);
$sqlmsg->execute($data);    //выполняем метод execute(), передав ему массив с переменными

# 4. Устанавливаем режим выборки
$sqlmsg->setFetchMode(PDO::FETCH_ASSOC);  

# 5. Получаем строку
$row = $sqlmsg->fetch();

echo $row['login'];

// while($row = $sqlmsg->fetch()) {  
//     echo $row['login'] . "\n";  
//     echo $row['password'] . "\n";  
//     // echo $row['city'] . "\n";  
// }

?>



<pre>
    <?php
    // print_r($check_user);
    // print_r($user);
    echo '---==----<br>';
    print_r($row);

    // echo $login;
    ?>
</pre>