<?php

$records = array(); //Lager en array som informasjonen skal legges inn i.
	if(!empty($_POST)) //Hvis den informasjonen brukeren tastet inn i feltene fra login.php IKKE er tomme (fortsetter nedover)
	{
				
		$email = trim($_POST['email']); //Skal den trimme og legge $_POST brukernavn inn i variabelen $brukernavn slik at den informasjonen brukeren skrev inn enkelt kan hentes ut. 
		$name = trim($_POST['name']);	//Skal den trimme og legge $_POST passord inn i variabelen $passord slik at den informasjonen brukeren skrev inn enkelt kan hentes ut. 
		$message = trim($_POST['message']);

        
		
	}

// send email
mail("botlerproject@gmail.com","Question from $name, $email, submitted at BotLer-webpage",$message);
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
?>

