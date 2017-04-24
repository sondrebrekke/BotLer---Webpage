<?php
	//Start the current session
	session_start(); 
	//Destroy the session
	session_destroy(); 
	//Move back to index.html
	header("location:index.html"); 
?>