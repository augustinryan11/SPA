<?php

	require "functions.php";
    require_once('phpmailer/mails.php');
	check_login();

	$errors = array();

	if($_SERVER['REQUEST_METHOD'] == "GET" && !check_verified()){


        $email = "ryanpeter081118@gmail.com";
        $vars['code'] =  rand(10000,99999);
        send_verification_email($email, $vars);


		$vars['expires'] = (time() + (59));
		$vars['email'] = $_SESSION['USER']->email;

		$query = "insert into verify (code,expires,email) values (:code,:expires,:email)";
		database_run($query,$vars);

		$message = "your code is " . $vars['code'];
		$subject = "Email verification";
		$recipient = $vars['email'];
        }
	

	if($_SERVER['REQUEST_METHOD'] == "POST"){

		if(!check_verified()){

			$query = "select * from verify where code = :code && email = :email";
			$vars = array();
			$vars['email'] = $_SESSION['USER']->email;
			$vars['code'] = $_POST['code'];

			$row = database_run($query,$vars);

			if(is_array($row)){
				$row = $row[0];
				$time = time();

				if($row->expires > $time){

					$id = $_SESSION['USER']->id;
					$query = "update users set email_verified = email where id = '$id' limit 1";
					
					database_run($query);

					header("Location: profile.php");
					die;
				}else{
					echo '<script>alert("Expire code.");</script>';
				}

			}else{
				echo '<script>alert("Wrong code.");</script>';
			}
		}else{
			echo '<script>alert("Succesful Verification");</script>';
		}
	}

?>