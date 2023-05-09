<?php  

require "functions.php";

$errors = array();

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$errors = login($_POST);

	if(count($errors) == 0)
	{
		header("Location: profile.php");
		die;
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<style>
		 body {
  background-image:url('image/me.jpg');
  background-size: cover;
  background-repeat: no-repeat;
    }
	</style>

	<?php include('header.php')?>
    <h1>Login</h1>
	<div>
		<div>
			<?php if(count($errors) > 0):?>
				<?php foreach ($errors as $error):?>
					<?= $error?> <br>	
				<?php endforeach;?>
			<?php endif;?>
		</div>
		<form method="post">
			<input type="email" name="email" placeholder="Email" style="background-color: light-gray;">
			<input type="password" name="password" placeholder="Password" style="background-color: light-gray;">
			<input type="submit" value="Login">
		</form>
	</div>
</body>
</html>