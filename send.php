<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php

$email_to = "asterios.katsifodimos@inria.fr";

$name = $_POST["name"];

$email = $_POST["email"];

$phone = $_POST["phone"];

$url = $_POST["url"];

$message = $_POST["message"];

$text = "NAME: $name<br>

         EMAIL: $email<br>

		 URL: $url<br>		 

         MESSAGE: $message";

$headers = "MIME-Version: 1.0" . "\r\n"; 

$headers .= "Content-type:text/html; charset=utf-8" . "\r\n"; 

$headers .= "From: <$email>" . "\r\n";


equire_once 'lib/swift_required.php';

// Create the Transport
$transport = Swift_SmtpTransport::newInstance('smtp.example.org', 25)
  ->setUsername('your username')
  ->setPassword('your password')
  ;

// Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);

// Create a message
$message = Swift_Message::newInstance('Wonderful Subject')
  ->setFrom(array('john@doe.com' => 'John Doe'))
  ->setTo(array('receiver@domain.org', 'other@domain.org' => 'A name'))
  ->setBody('Here is the message itself')
  ;

// Send the message
$result = $mailer->send($message);



mail($email_to, "Message", $text, $headers);

?>
</body>

</html>