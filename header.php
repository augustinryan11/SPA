<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <link rel="stylesheet" href="css/header.css">
</head>
<div id="nav">
  <?php if(isset($_SESSION['LOGGED_IN']) && $_SESSION['LOGGED_IN'] === true): ?>
    <div class="logo">
      User Profile
    </div>
    <div class="menu">
      <a href="logout.php">Logout</a>
    </div>
  <?php else: ?>
    <div class="logo">
      <a href="index.php">Home</a>
    </div>
    <div class="menu">
      <a href="login.php">Login</a>
      <a href="signup.php">Sign Up</a>
    </div>
  <?php endif; ?>
</div>
