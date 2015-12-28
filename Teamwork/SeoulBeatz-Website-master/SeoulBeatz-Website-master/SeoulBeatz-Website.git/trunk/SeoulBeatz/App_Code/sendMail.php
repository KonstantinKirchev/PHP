<?php

    $email_to = 'emikak@abv.bg';

    $email_subject = "Form message";

    $email_subject_sender = "Received message.";

    function died($error) {

        // your error code can go here

        echo "<p>We are very sorry, but there were error(s) found with the form you submitted.<br />
             These errors appear below.<br /><br />$error.<br /><br /> Please go back and fix these errors.<br /><br /> </p>";

        die();

    }
	
	if(isset($_POST['message'])){
		$userMessage = htmlentities($_POST['message']);
	}

    // validation expected data exists

    if(!isset($_POST['name']) ||

        !isset($_POST['sender_email'])) {

        died('We are sorry, but there appears to be a problem with the form you submitted.');

    }

    $first_name = $_POST['name']; // required

    $email_from = $_POST['sender_email']; // required

    $error_message = "";

    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if(!preg_match($email_exp,$email_from)) {

        $error_message .= 'The Email Address you entered does not appear to be valid.<br />';

    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if(!preg_match($string_exp,$first_name)) {

        $error_message .= 'The First Name you entered does not appear to be valid.<br />';

    }

    if(strlen($error_message) > 0) {

        died($error_message);

    }

    $email_message = "Form details below.\n\n";

    function clean_string($string) {

        $bad = array("content-type","bcc:","to:","cc:","href");

        return str_replace($bad,"",$string);

    }

	$email_message .= $userMessage . "\n";

    $email_message .= "Name: ".clean_string($first_name)."\n";

    $email_message .= "Email: ".clean_string($email_from)."\n";

    $sender_message = "Dear Mr/Mrs: ".clean_string($first_name).", \n";

    $sender_message .= "we have received your message and we'll reply as soon as we can.". "\n";

    $sender_message .= "Please don't reply. This is an automated mail!";

// create email headers

    $headers = 'From: '.$email_from."\r\n".

        'Reply-To: '.$email_from."\r\n" .

        'X-Mailer: PHP/' . phpversion();

    $sender_headers = 'From: '.$email_to."\r\n".

        'X-Mailer: PHP/' . phpversion();

		
		mail($email_to, $email_subject, $email_message, $headers);

        mail($email_from, $email_subject_sender, $sender_message, $sender_headers);

        echo "<p>Mail sent !</p>";

