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
</head>

<body>
    <!-- Профиль -->

    <form action="vendor/sendm.php" method="post">
        <label onmouseover="calc()"><input type="number" value="0" min="0" id="kup5000" name="kup5000" onblur="calc()"> купюра 5000</label>
        <br><br>
        <label onmouseover="calc()"><input type="number" value="0" min="0" id="kup2000" name="kup2000" onblur="calc()"> купюра 2000</label>
        <br><br>
        <label onmouseover="calc()"><input type="number" value="0" min="0" id="kup1000" name="kup1000" onblur="calc()"> купюра 1000</label>
        <br><br>
        <label onmouseover="calc()"><input type="number" value="0" min="0" id="kup500" name="kup500" onblur="calc()"> купюра 500</label>
        <br><br>
        <label onmouseover="calc()"><input type="number" value="0" min="0" id="kup200" name="kup200" onblur="calc()"> купюра 200</label>
        <br><br>
        <label onmouseover="calc()"><input type="number" value="0" min="0" id="kup100" name="kup100" onblur="calc()"> купюра 100</label>
        <br><br>
        <label onmouseover="calc()"><input type="number" value="0" min="0" id="kup50" name="kup50" onblur="calc()"> купюра 50</label>
        <br><br>
        <label onmouseover="calc()"><input type="number" value="0" min="0" id="kup10" name="kup10" onblur="calc()"> купюра 10</label>

        <p>Сумма купюр: <span id="kupSumm">0</span> рублей.</p>

        <br>
        <label onmouseover="calc()"><input type="number" value="0" min="0" id="moneta10" name="moneta10" onblur="calc()"> монета 10</label>
        <br><br>
        <label onmouseover="calc()"><input type="number" value="0" min="0" id="moneta5" name="moneta5" onblur="calc()"> монета 5</label>
        <br><br>
        <label onmouseover="calc()"><input type="number" value="0" min="0" id="moneta2" name="moneta2" onblur="calc()"> монета 2</label>
        <br><br>
        <label onmouseover="calc()"><input type="number" value="0" min="0" id="moneta1" name="moneta1" onblur="calc()"> монета 1</label>
        <br><br>
        <label onmouseover="calc()"><input type="number" value="0" min="0" id="copeyka50" name="copeyka50" onblur="calc()"> 50 копеек</label>
        <br><br>
        <label onmouseover="calc()"><input type="number" value="0" min="0" id="copeyka10" name="copeyka10" onblur="calc()"> 10 копеек</label>
        <br><br>
        <label onmouseover="calc()"><input type="number" value="0" min="0" id="copeyka5" name="copeyka5" onblur="calc()"> 5 копеек</label>
        <br><br>
        <label onmouseover="calc()"><input type="number" value="0" min="0" id="copeyka1" name="copeyka1" onblur="calc()"> 1 копейка</label>
        <p>Сумма монет: <span id="monetSumm">0</span></p>
        <br>
        <!-- <p>Общая Сумма: <span name="sum" id="summa">0</span></p> -->
        <p>Общая Сумма</p>
        <input type="number" readonly value="0" name="sum" id="summa">
        <br><br>

        <input type="submit" value="Отправить" onfocus="calc()" onmouseover="calc()">
    </form>
    <script src="calc.js"></script>
    <!-- <form>
    <img src="<?= $_SESSION['user']['avatar'] ?>" width="200" alt="">
    <h2 style="margin: 10px 0;"><?= $_SESSION['user']['full_name'] ?></h2>
    <a href="#"><?= $_SESSION['user']['email'] ?></a>
    <a href="vendor/logout.php" class="logout">Выход</a>
  </form> -->
    <a href="vendor/logout.php" class="logout">Выход</a>
</body>

</html>

<title>Document</title>
</head>

<body>

</body>

</html>