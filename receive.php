<?php
	$secret = $_POST["secretWord"];
	//Makes sure the posted data actually comes from the application.
	if ("44fdcv8jf3" != $secret) exit;

	//gets the necessary data from the session
	$attended = $_POST['attended'];
	$feedback = $_POST['feedback'];
	$pace = $_POST['pace'];
	$subject = $_POST['subject'];

    include 'security.php';


	// Create connection
	$con=mysqli_connect("mysql.stud.ntnu.no","jorgfb_botler",$passwordDB,"jorgfb_botler_database");
	$feedBackText = $con->real_escape_string($feedback);

	// Defines the dateformat used in the database
	$date = date('Y-m-d H:i:s');

	//Inserts into the database
	$sql = "INSERT INTO feedbackTable (attended, feedback, pace, subject, time) VALUES ('$attended', '$feedBackText', '$pace', '$subject', '$date')";
	if ($con->query($sql) === TRUE) {
		//Echos 1 if everythings successful. This way, the app can read if everythings good or not.
	    echo 1;
	} 
	else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>