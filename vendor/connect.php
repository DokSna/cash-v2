<?php
$driver   = 'mysql';
$host     = "localhost";
$db_name  = "valikov_cash_v2";
$db_user  = "valikov_cash_v2";
$db_pass  = "44Zb%F";
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
  // echo "Connected successfully";
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>