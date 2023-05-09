<?php
require "email_verification_code.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/design_verify.css">
	<title>Verify</title>
	
</head>

<style>
		 body {
  background-image:url('image/me.jpg');
  background-size: cover;
  background-repeat: no-repeat;
    }
	</style>

<body>

	<h1>Verify</h1>

	<?php include('header.php');?>
  
	<br><br>
 	<div style="text-align: center;">
			<br> Put the Verification Code <br>
		<div>
			<?php if(count($errors) > 0):?>
				<?php foreach ($errors as $error):?>
					<p style="color: red;"><?= $error?></p>	
				<?php endforeach;?>
			<?php endif;?>

		</div>
		<form method="post">
			<input type="text" name="code" placeholder="Enter your code"><br>
			<input type="submit" value="Verify">
		</form>
	</div>

</body>
</html>
