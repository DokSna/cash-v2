<?php
session_start();
if (!$_SESSION['user']) {
  header('Location: /');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php
  echo '<title>Cash - ' . $_SESSION['user']['full_name'] . '</title>';
  ?>

  <link rel="stylesheet" href="style/profile.css">
  <link rel="stylesheet" href="style/userpanel.css">

</head>

<body>

  <?php
  require('blocks/userpanel.php');
  ?>

  <!-- наличность -->
  <form action="vendor/sendm.php" method="post">
    <!-- выбрать магазин -->
    <?php
    require('vendor/select_shop.php');
    ?>
    <div class="msg_cash">
      <?php
      if ($_SESSION['message_shop']) {
        echo '<p class="msg_shop"> ' . $_SESSION['message_shop'] . ' </p>';
        unset($_SESSION['message_shop']);
      }
      if ($_SESSION['message']) {
        echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
        unset($_SESSION['message']);
      }
      ?>
    </div>
    <div class="cash">
      <div class="cash_kupur">
        <table>
          <thead>
            <tr>
              <th colspan="3">Купюры</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>5000</td>
              <td><input type="number" value="0" min="0" id="kup5000" name="kup5000"></td>
              <td id="ka5"></td>
            </tr>
            <tr>
              <td>2000</td>
              <td><input type="number" value="0" min="0" id="kup2000" name="kup2000"></td>
              <td></td>
            </tr>
            <tr>
              <td>1000</td>
              <td><input type="number" value="0" min="0" id="kup1000" name="kup1000"></td>
              <td></td>
            </tr>
            <tr>
              <td>500</td>
              <td><input type="number" value="0" min="0" id="kup500" name="kup500"></td>
              <td></td>
            </tr>
            <tr>
              <td>200</td>
              <td><input type="number" value="0" min="0" id="kup200" name="kup200"></td>
              <td></td>
            </tr>
            <tr>
              <td>100</td>
              <td><input type="number" value="0" min="0" id="kup100" name="kup100"></td>
              <td></td>
            </tr>
            <tr>
              <td>50</td>
              <td><input type="number" value="0" min="0" id="kup50" name="kup50"></td>
              <td></td>
            </tr>
            <tr>
              <td>10</td>
              <td><input type="number" value="0" min="0" id="kup10" name="kup10"></td>
              <td></td>
            </tr>
          </tbody>
        </table>

      </div>
      <div class="cash_monet">

        <table>
          <thead>
            <tr>
              <th colspan="3">Монеты</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>10</td>
              <td><input type="number" value="0" min="0" id="moneta10" name="moneta10"></td>
              <td></td>
            </tr>
            <tr>
              <td>5</td>
              <td><input type="number" value="0" min="0" id="moneta5" name="moneta5"></td>
              <td></td>
            </tr>
            <tr>
              <td>2</td>
              <td><input type="number" value="0" min="0" id="moneta2" name="moneta2"></td>
              <td></td>
            </tr>
            <tr>
              <td>1</td>
              <td><input type="number" value="0" min="0" id="moneta1" name="moneta1"></td>
              <td></td>
            </tr>
            <tr>
              <td>0.50</td>
              <td><input type="number" value="0" min="0" id="copeyka50" name="copeyka50"></td>
              <td></td>
            </tr>
            <tr>
              <td>0.10</td>
              <td><input type="number" value="0" min="0" id="copeyka10" name="copeyka10"></td>
              <td></td>
            </tr>
            <tr>
              <td>0.05</td>
              <td><input type="number" value="0" min="0" id="copeyka5" name="copeyka5"></td>
              <td></td>
            </tr>
            <tr>
              <td>0.01</td>
              <td><input type="number" value="0" min="0" id="copeyka1" name="copeyka1"></td>
              <td></td>
            </tr>
          </tbody>
        </table>

      </div>
      <div class="cash_summa">
        <p>Сумма купюр: <span id="kupSumm">0</span></p>

        <p>Сумма монет: <span id="monetSumm">0</span></p>

        <p>Общая Сумма: <span name="sum" id="summa">0</span></p>
        <!-- <p>Общая Сумма</p>
        <input type="number" readonly value="0" name="sum" id="summa"> -->


        <!-- <input id="submitgo" type="submit" value="Отправить" onfocus="calc()" onmouseover="calc()"> -->
        <input id="submitgo" type="submit" value="Отправить">
        <!-- disabled -->

      </div>
    </div>

  </form>
  <script src="calc.js"></script>
</body>

</html>