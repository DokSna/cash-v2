<div class="userpanel">

  <div class="userpanel_logout">
    <a href="vendor/logout.php" class="logout">Выход</a>
  </div>

  <div class="userpanel_user-name">
    <?php
    echo '<p>пользователь: ' . $_SESSION['user']['full_name'] . '.</p>';
    ?>
  </div>

  <?php
  # Если admin - даём ссылку
  if ($_SESSION['user']['admin'] == true) {
    echo '<div class="userpanel_user-admin">
            <a href="adminlk.php">admin page</a>
          </div>';
  }
  ?>

</div>