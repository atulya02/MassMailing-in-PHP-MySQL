<?php
//send_mail.php
if(isset($_POST['email_data']))
{
	require 'class/class.phpmailer.php';
	$output = '';
	foreach($_POST['email_data'] as $row)
	{
		$mail = new PHPMailer;
		$mail->IsSMTP();								//Sets Mailer to send message using SMTP
		$mail->SMTPDebug = 2; 
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = 'tls';
		$mail->Host = 'in-v3.mailjet.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
		
		$mail->Port = 25;								//Sets the default SMTP server port
		$mail->IsHTML(true);
		$mail->Username = "2360c7d1cb3c6fee5a83a425f1e56a0b";					//Sets SMTP username
		$mail->Password = "11ca6bb3dd721069fe4affdb7168f478";					//Sets SMTP password
		$mail->SMTPSecure = '';							//Sets connection prefix. Options are "", "ssl" or "tls"
		$mail->setFrom('atulya.raj2904@gmail.com');			//Sets the From email address for the message
		$mail->FromName = 'Testing';					//Sets the From name of the message
		$mail->addAddress($row["email"], $row["name"]);	//Adds a "To" address
		$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
		$mail->IsHTML(true);							//Sets message type to HTML
		$mail->Subject = 'Hey there!'; //Sets the Subject of the message
		//An HTML or plain text message body
		$mail->Body = '
		<p>Whats Up?</p>';
		$mail->AltBody = '';
		$result = $mail->Send();						//Send an Email. Return true on success or false on error
		if($result["code"] == '400')
		{
			$output .= html_entity_decode($result['full_error']);
		}
	}
	if($output == '')
	{
		echo 'OK';
	}
	else
	{
		echo $output;
	}
}
?>
