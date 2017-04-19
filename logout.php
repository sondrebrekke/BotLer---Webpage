<?php
	session_start(); //Start the current session
	session_destroy(); //Destroy the session
	header("location:index.html"); //Move back to index.html
?>