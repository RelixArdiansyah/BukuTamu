<?php
  include "../../config/connection.php";

  session_start();
  if ($_SESSION == null) {
      header('Location: ../userpage.php');
  }

  $result = mysqli_query($connection, "SELECT * FROM users_login WHERE role='npm'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../../assets/css/style.css?version=51">
  <title>Dashboard | Buku Kunjungan</title>
</head>
<body>

  <!-- header -->
  <header>
    <div class="title-dash">
      <h3>BUKU KUNJUNGAN</h3>
    </div>
    <div class="menu">
      <a href="../user/dashboard.php">KOMENTAR</a>
      <a href="../profile.php">PROFIL</a>
      <a href="../../logout.php">KELUAR</a>
    </div>
  </header>

  <!-- content -->
  <?php
    while ($data = mysqli_fetch_array($result)) {
  ?>
  <div class="content">
    <div class="comment-panel">
      <div class="user-account">
        <img src="../../assets/photo/<?= $data['photo']; ?>" alt="" srcset="" class="avatar">
        <div class="username"><?= $data['username']; ?></div>
      </div>
      <div class="comment">
        <p>
          <?= $data['name'] ?>
        </p>
      </div>
      <div class="info">
        <div class="date"><?= date_format(date_create($data['created_at']), 'H:i d-M-Y') ?></div>
        <?php
          if ($data['is_active'] == 'active') {
        ?>
        <a href="../../inactive.php?npm=<?= $data['npm']; ?>" class="active-user">Nonaktifkan</a>
        <?php
          } else {
        ?>
        <a href="../../active.php?npm=<?= $data['npm']; ?>" class="inactive-user">Aktifkan</a>
        <?php
          }
        ?>
      </div>
    </div>

    </div>
  <?php
    }
  ?>

</body>
</html>