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
		$mail->Subject = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'; //Sets the Subject of the message
		//An HTML or plain text message body
		$mail->Body = '
		<p>Sed at odio sapien. Vivamus efficitur, nibh sit amet consequat suscipit, ante quam eleifend felis, mattis dignissim lectus ipsum eget lectus. Nullam aliquam tellus vitae nisi lobortis, in hendrerit metus facilisis. Donec iaculis viverra purus a efficitur. Maecenas dignissim finibus ultricies. Curabitur ultricies tempor mi ut malesuada. Morbi placerat neque blandit, volutpat felis et, tincidunt nisl.</p>
		<p>In imperdiet congue sollicitudin. Quisque finibus, ipsum eget sagittis pellentesque, eros leo tempor ante, interdum mollis tortor diam ut nisl. Vivamus odio mi, congue eu ipsum vulputate, consequat hendrerit sapien. Aenean mauris nibh, ultrices accumsan ultricies eget, ultrices ut dui. Donec bibendum lectus a nibh interdum, vel condimentum eros auctor.</p>
		<p>Quisque dignissim pharetra tortor, sit amet auctor enim euismod at. Sed vitae enim at augue convallis pellentesque. Donec rhoncus nisi et posuere fringilla. Phasellus elementum iaculis convallis. Curabitur laoreet, dui eget lacinia suscipit, quam erat vehicula nulla, non ultrices elit massa eu dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vulputate mauris vel ultricies tempor.</p>
		<p>Mauris est leo, tincidunt sit amet lacinia eget, consequat convallis justo. Morbi sollicitudin purus arcu. Suspendisse pellentesque interdum enim non consectetur. Etiam eleifend pharetra ante a feugiat.</p>
		';
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