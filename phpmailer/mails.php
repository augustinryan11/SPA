<?php

	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';


	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	function send_verification_email($email, $vars) {

		$mail = new PHPMailer();
		$mail->isSMTP();
	
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "tls";
		$mail->Port = "587";
		$mail->Username = "ryanpeter081118@gmail.com";
		$mail->Password = "gezqrzbwymcsmkyl";
		$mail->Subject = "Email verification";
		$mail->setFrom('ryanpeter081118@gmail.com');
		$mail->isHTML(true);
	
		$mail->Body = "Your verification code is {$vars['code']}";
		$mail->addAddress($email);
	
		if ( $mail->send() ) {
			return true;
		} else {
			return false;
		}
	
		$mail->smtpClose();
	}
	