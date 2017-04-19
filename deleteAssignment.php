<?php
	
	//Redirects the user if a session is not active.
    session_start();
    if (!$_SESSION["username"]) {
        header("Location: index.html");
    }

    //Connects to the database
	$conn = new mysqli('mysql.stud.ntnu.no', 'jorgfb_botler', 'park12', 'jorgfb_botler_database'); 
	if (!mysqli_set_charset($conn, "utf8")) { 
		printf("Feil ved lasting av tegnsettet utf8: %s\n", mysqli_error($conn));
		printf('<BR>');
	}

	//Gets the id and subject code to delete. 
	$id = trim($_POST['id']);
	$subject = $_SESSION['subject'];

	//The query to delete the assignment. 
	$sql = "DELETE FROM assignments WHERE id='$id' AND BINARY subject = BINARY '$subject'";

	//If it was succesfull, the user will be redirected to viewAssignment.php
	if ($conn->query($sql) === TRUE) {
    	header("Location: viewAssignment.php");
    }
    else{
    	header("Location: index.html");
    }
?>