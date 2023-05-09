<?php
   require_once "functions.php";
   check_login();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet"href="css/profile.css">
</head>
<style>
  
   body {
  background-image:url('image/me.jpg');
  background-size: cover;
  background-repeat: no-repeat;
    }

</style>
<body>
  <?php include('header.php'); ?>
  <?php if (check_login(false)): ?>
    <div class="profile-box">
      <h2>User Profile</h2>
      <p>Name: <?=$_SESSION['USER']->username?></p>
      <p>Email: <?=$_SESSION['USER']->email?></p>
      <?php if (check_verified()): ?>
        <p>Your profile is verified.</p>
      <?php else: ?>
        <p>Your profile is not yet verified.</p>
        <a href="verify.php">
          <button>Verify Profile</button>
        </a>
      <?php endif; ?>
    </div>

    <div style="margin-top: 5px;">
      <p>Welcome, <?=$_SESSION['USER']->username?>!</p>
      <?php if (!check_verified()): ?>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</body>
</html>
