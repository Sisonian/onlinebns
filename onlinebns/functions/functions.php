<?php 

	function email_send() {
		if(isset($_POST['signup'])) {
			include 'class/PHPMailerAutoload.php';
			$fname = $_POST['fname'];
        	$lname = $_POST['lname'];
        	$name = "$fname $lname";
			$email = $_POST['email'];
			$mailer = new PHPMailer();
			$mailer->IsSMTP();
			$mailer->Host = 'smtp.gmail.com:465'; 
			$mailer->SMTPAuth = TRUE;
			$mailer->Port = 465;
			$mailer->mailer="smtp";
			$mailer->SMTPSecure = 'ssl'; 
			$mailer->IsHTML(true); // pwede na kayo maka gamit ng html tags sa loob ng body
			$mailer->SMTPOptions = array('ssl' => array(
									'verify_peer' => false, 
									'verify_peer_name' => false, 
									'allow_self_signed' => true)
									);
			$mailer->Username = 'cosinazam@gmail.com '; // username ng gmail
			$mailer->Password = '09078682562'; // password ng gmail
			$mailer->From = 'admin@noreply.com'; 
			$mailer->FromName = 'Demonstration';
			$mailer->Body =  'Hello '.$name.' ';
			$mailer->Subject = 'Demonstration';
			$mailer->AddAddress($email);
			if(!$mailer->send()) {
			$message= 'Message could not be sent.Mailer Error: ' . $mailer->ErrorInfo;
          	echo "<script type='text/javascript'>alert('$message');</script>";
			} else {
			$message= 'Message successfully sent!';
          	echo "<script type='text/javascript'>alert('$message');</script>";
			}
		}
	}