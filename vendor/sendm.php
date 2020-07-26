<?php
session_start();
if (!$_SESSION['user']) {
  header('Location: /');
} else {
  #Создадим переменные для sql запроса
  $id_user = $_SESSION['user']['id'];  //id пользователя, который сделал запись

  # Переместим значения из массива $_POST в переменные, и посчитаем сумму
  # можно было бы взять сумму посчитаную JavaScript, но думаю такой метод будет безопаснее для значения суммы.
  $kup5000   = $_POST['kup5000'];
  $kup2000   = $_POST['kup2000'];
  $kup1000   = $_POST['kup1000'];
  $kup500    = $_POST['kup500'];
  $kup200    = $_POST['kup200'];
  $kup100    = $_POST['kup100'];
  $kup50     = $_POST['kup50'];
  $kup10     = $_POST['kup10'];
  $moneta10  = $_POST['moneta10'];
  $moneta5   = $_POST['moneta5'];
  $moneta2   = $_POST['moneta2'];
  $moneta1   = $_POST['moneta1'];
  $copeyka50 = $_POST['copeyka50'];
  $copeyka10 = $_POST['copeyka10'];
  $copeyka5  = $_POST['copeyka5'];
  $copeyka1  = $_POST['copeyka1'];

  $summa = 16;
  // $kup5000    +
  // $kup2000    +
  // $kup1000    +
  // $kup500     +
  // $kup200     +
  // $kup100     +
  // $kup50      +
  // $kup10      +
  // $moneta10   +
  // $moneta5    +
  // $moneta2    +
  // $moneta1    +
  // $copeyka50  +
  // $copeyka10  +
  // $copeyka5   +
  // $copeyka1;

  # соединяемся с базой данных
  require_once('connect.php');

  try {

    # 1.Создаём текст sql запроса, что бы добавить новую строку в таблицу cash
    $sql = "INSERT INTO cash VALUES (NULL, NOW(), :id_user, :summa, :kup5000,
    :kup2000, :kup1000, :kup500, :kup200, :kup100, :kup50, :kup10,
    :moneta10, :moneta5, :moneta2, :moneta1, :copeyka50, :copeyka10, :copeyka5, :copeyka1)";

    // # 1.Создаём текст sql запроса, что бы добавить новую строку в таблицу cash
    // $sql = "INSERT INTO cash VALUES (NULL, NOW(), :id_user, :summa
    //   , :kup5000,
    //   :kup2000, :kup1000, :kup500, :kup200, :kup100, :kup50, :kup10,
    //   :moneta10, :moneta5, :moneta2, :moneta1, :copeyka50, :copeyka10, :copeyka5, :copeyka1
    //   )";


    //   # 2.Создаём массив с данными
    $data = array(
      // 'id' => NULL,
      // 'full_name' => $full_name,
      // 'login' => $login,
      // 'password' => $password
      'id_user'   => $id_user,
      'summa'     => $summa,
      'kup5000'   => $kup5000,
      'kup2000'   => $kup2000,
      'kup1000'   => $kup1000,
      'kup500'    => $kup500,
      'kup200'    => $kup200,
      'kup100'    => $kup100,
      'kup50'     => $kup50,
      'kup10'     => $kup10,
      'moneta10'  => $moneta10,
      'moneta5'   => $moneta5,
      'moneta2'   => $moneta2,
      'moneta1'   => $moneta1,
      'copeyka50' => $copeyka50,
      'copeyka10' => $copeyka10,
      'copeyka5'  => $copeyka5,
      'copeyka1'  => $copeyka1,
    );

    # 3. Подгатавливаем текст запроса
    $writemoney = $connect->prepare($sql);
    # 4.Выполняем запрос
    $writemoney->execute($data);

    //   ################ старая версия
    // $query = "INSERT INTO cash2 VALUES (NULL, NOW(), :sum, :kup5000,
    //      :kup2000, :kup1000, :kup500, :kup200, :kup100, :kup50, :kup10,
    //      :moneta10, :moneta5, :moneta2, :moneta1, :copeyka50, :copeyka10, :copeyka5, :copeyka1)";
    // $msg = $pdo->prepare($query);
    // $msg->execute([
    //   'sum' => $_POST['sum'],
    //   'kup5000' => $_POST['kup5000'],
    //   'kup2000' => $_POST['kup2000'],
    //   'kup1000' => $_POST['kup1000'],
    //   'kup500' => $_POST['kup500'],
    //   'kup200' => $_POST['kup200'],
    //   'kup100' => $_POST['kup100'],
    //   'kup50' => $_POST['kup50'],
    //   'kup10' => $_POST['kup10'],
    //   'moneta10' => $_POST['moneta10'],
    //   'moneta5' => $_POST['moneta5'],
    //   'moneta2' => $_POST['moneta2'],
    //   'moneta1' => $_POST['moneta1'],
    //   'copeyka50' => $_POST['copeyka50'],
    //   'copeyka10' => $_POST['copeyka10'],
    //   'copeyka5' => $_POST['copeyka5'],
    //   'copeyka1' => $_POST['copeyka1']
    // ]);

  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  // } catch (PDOException $e) {
  //   echo "Error connecting to database";
  //   echo "ошибка";
  // }

}
?>
<pre>
    <?php
    // echo '-=-<br>';
    // print_r($id_user);
    // echo '-=-<br>';
    // print_r($summa);
    ?>
</pre>