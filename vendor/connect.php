
<?php
$driver   = 'mysql';
$host     = "localhost";
$db_name  = "db_cash_v2";
$db_user  = "root";
$db_pass  = "";
$charset  = 'utf8';
$options  = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
  $connect = new
    PDO(
      "$driver:host=$host;dbname=$db_name;charset=$charset",
      $db_user,
      $db_pass,
      $options
    );
  // set the PDO error mode to exception
  // $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>


<?php
/*
$connect = mysqli_connect('localhost', 'root', '', 'test');

if (!$connect) {
  die('Error connect to DataBase');
}
*/
?>
