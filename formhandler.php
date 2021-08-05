<?php 
	if ($_POST) {
		$name = trim($_POST['fname']);
		$country = trim($_POST['country']);
		$phone = trim($_POST['phone']);
		$email = trim($_POST['email']);


		$date = date('dS-M-y', time());

	
		$handle = fopen('contact.txt', 'a');

		fwrite($handle, $name." ".$country." ".$phone." ".$email." ".$date);
		fwrite($handle, "\r");

		fclose($handle);

		print("Thank you for taking the time..");
		print("\r");

		define('to', 'tripafricatours@gmail.com');
		define('name', $name);
		define('details', $country." ".$phone." ".$date);
		define('email', $email);

		$to = to;
		$subject = name;
		$message = details;
		$headers = email;

		if (@mail($to, $subject, $message, $headers)){
			//echo 'mail sent';
		}else{
			//echo "error sending mail";
		}

		header('refresh:1;index.html');


	}

?>