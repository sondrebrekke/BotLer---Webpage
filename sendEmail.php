<?php
	//Creates an array where the informartion will be stored. 
	$records = array(); 
	//If the information the user inserted is not EMPTY, it shall create the following variables. 
	if(!empty($_POST)) 
	{				
		$email = trim($_POST['email']); 
		$name = trim($_POST['name']);
		$message = trim($_POST['message']);
	}
	else{
		//Othervise head to index.html
		header("Location: index.html"); exit;
	}
	
	// send email to our email-address
	mail("botlerproject@gmail.com","Question from $name, $email, submitted at BotLer-webpage",$message);
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit;
?>

