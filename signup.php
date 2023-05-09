<?php  

require "functions.php";

$errors = array();

if($_SERVER['REQUEST_METHOD'] == "POST"){

	$errors = signup($_POST);

	if(empty($errors))
	{
		header("Location: login.php");
		exit;
	}
}
?>
<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet"href="css/signup.css">
</head>
<body>
	<title>Signup</title>


	<style>
   body {
  background-image:url('image/me.jpg');
  background-size: cover;
  background-repeat: no-repeat;
  font-family: Arial, sans-serif;
  color: black;
  text-align: center;
  margin: 10;
}
	</style>



<body>

	<?php include('header.php')?>
	<h1>Signup</h1>
	<div>
		<div>
			<?php if(count($errors) > 0):?>
				<?php foreach ($errors as $error):?>
					<?= $error?> <br>	
				<?php endforeach;?>
			<?php endif;?>
			
<form method="post">
    <input type="text" name="username" placeholder="Enter your username" class="input-field">
    <input type="email" name="email" placeholder="Enter your email" class="input-field">
    <input type="password" name="password" placeholder="Enter your password" class="input-field">
    <input type="password" name="password2" placeholder="Re-enter your password" class="input-field">
    <input type="submit" value="Signup" class="submit-button">
</form>

</body>
</html>