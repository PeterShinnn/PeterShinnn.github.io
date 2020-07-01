<?php

	/*
		The Send Mail php Script for Contact Form
		Server-side data validation is also added for good data validation.
	*/

	$data['error'] = false;

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$company = $_POST['company'];
	$message = $_POST['message'];

	if( empty($name) ){
		$data['error'] = 'Please enter your name.';
	}else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
		$data['error'] = 'Please enter a valid email address.';
	}else if( empty($message) ){
		$data['error'] = 'The message field is required!';
	}else if( empty($phone) ){
		$data['error'] = 'Please enter your phone number.';
	}else if ( empty($company) ){
		$data['error'] = '';
	}else{

		$formcontent="From: $name\nPhone: $phone\nCompany: $company\nEmail: $email\nMessage: $message";


		//Place your Email Here
		$recipient = "mista.shinx3@gmail.com";

		$mailheader = "From: $email \r\n";

		if( mail($recipient, $name, $formcontent, $mailheader) == false ){
			$data['error'] = 'Sorry, an error occured! Please contact me through the email icon below, or email me at petershin731@gmail.com.';
		}else{
			$data['error'] = false;
		}

	}

	echo json_encode($data);

?>
