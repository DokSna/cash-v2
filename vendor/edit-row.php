<?php
session_start();

##  Проверяем, заполнено ли поле 'login'
// if (empty($_POST['full_name']) || empty($_POST['login']) || empty($_POST['password'])) {
//   // exit('Не заполнено поле "Логин"');
//   header('Location: ../register.php');
//   $_SESSION['message'] = 'Заполните все поля.';
// }
##
// else {
require_once 'connect.php';

$user_id                = $_POST['user_id'];
$user_full_name         = $_POST['full_name'];
$user_login             = $_POST['login'];
$user_user_access_level = $_POST['user_access_level'];

// # 1.Создаём массив с данными с плейсхолдерами
$data = array(
  'id' => $user_id,
  'full_name' => $user_full_name,
  'login_user' => $user_login,
  'access' => $user_user_access_level
);
// текст запроса
$sql = 'UPDATE users SET full_name=:full_name, login=:login_user, access_level=:access WHERE id_user = :id';
# 3. Подгатавливаем текст запроса
$updateuser = $connect->prepare($sql);
# 4.Выполняем запрос
$updateuser->execute($data);

// возвращаем пользователя обратно на страницу
header('Location: ../adminlk.php');


// // Подготовка запроса. Пример с сайта https://ru.stackoverflow.com
// $sql = "UPDATE ваша_таблица SET title=:title, category=:category, description=:description, price:=price where id = :id";
// $table = $db->prepare($sql);
// unset(item['action']);
// //Вставка данных
// $table->execute($item);  //массив $item  с плейсхолдерами


?>
<!-- <pre> -->
<?php
// echo $now_date . 'kl';
// echo '$row_cash["time"]<br>';
// print_r($row_cash['time']);
// echo '$_POST["users_table"]<br>';
// print_r($_POST['user_id']);
// echo $_POST["users_table"];
// print_r($report_date);
?>
<!-- </pre> -->
<!--
  // $full_name = $_POST['full_name'];
  // $login = $_POST['login'];
  // $password = $_POST['password'];
  // $password_confirm = $_POST['password_confirm'];

  // if ($password === $password_confirm) {

  //   $password = md5($password);
  //   // $password = $password;

  //   # 1.Создаём запись строки с новым пользователем в таблицу users
  //   $sql = 'INSERT INTO `users` (`id_user`, `full_name`, `login`, `password`) VALUES (:id, :full_name, :login, :password)';

  //   # 2.Создаём массив с данными
  //   $data = array(
  //     'id' => NULL,
  //     'full_name' => $full_name,
  //     'login' => $login,
  //     'password' => $password
  //   );

  //   # 3. Подгатавливаем текст запроса
  //   $update_user = $connect->prepare($sql);
  //   # 4.Выполняем запрос
  //   $update_user->execute($data);

  //   // mysqli_query($connect, "INSERT INTO `users` (`id_user`, `full_name`, `login`, `password`) VALUES (NULL, '$full_name', '$login', '$password')");

  //   $_SESSION['message'] = 'Регистрация прошла успешно!';
  //   header('Location: ../index.php');
  // } else {
  //   $_SESSION['message'] = 'Пароли не совпадают';
  //   header('Location: ../register.php');
  // }
// }
  -->