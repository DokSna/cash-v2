<div class="userpanel">

  <div class="userpanel_logout">
    <a href="vendor/logout.php" class="logout">Выход</a>
  </div>

  <div class="userpanel_user-name">
    <?php
    echo '<p>пользователь: ' . $_SESSION['user']['full_name'] . '.</p>';
    ?>
  </div>

  <div class="userpanel_user-admin">
    <a href="profile.php">user page</a>
  </div>

</div>