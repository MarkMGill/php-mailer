<?php
    $msg = "";
	use PHPMailer\PHPMailer\PHPMailer;
	include_once "PHPMailer/PHPMailer.php";
	include_once "PHPMailer/Exception.php";
	include_once "PHPMailer/SMTP.php";

	if (isset($_POST['name'])  && isset($_POST['phone']) && isset($_POST['email'])  && isset($_POST['submit'])) {
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$message = $_POST['messager'];

		$mail = new PHPMailer();

		//if we want to send via SMTP
		$mail->Host = "smtp.gmail.com";
		$mail->isSMTP();
		$mail->SMTPAuth = true;
		$mail->Username = "markmgill@gmail.com";
		$mail->Password = "";
		$mail->SMTPSecure = "ssl"; //TLS
		$mail->Port = 465; //587

		$mail->addAddress('markmgill@yahoo.com');
		$mail->setFrom($email);
		$mail->Subject = 'Email message through Skyline';
		$mail->isHTML(true);
		$mail->Body = '<p>Name: ' . $name . '</p>' . '<p>Phone: ' . $phone . '</p>' . '<p>Email: ' . $email . '</p>' . '<p>Message: ' . $message . '</p>';

		if ($mail->send())
          $msg = "Your email has been sent, thank you!";
          
		else
		    $msg = "Please try again!";
	}
?>