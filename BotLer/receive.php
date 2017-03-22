<?php
	$secret = $_POST["secretWord"];
	if ("44fdcv8jf3" != $secret) exit; // note the same secret as the app

	$attended = $_POST['attended'];
	$feedback = $_POST['feedback'];
	$pace = $_POST['pace'];
	$subject = $_POST['subject'];

// Create connection
$con=mysqli_connect("mysql.stud.ntnu.no","jorgfb_botler","park12","jorgfb_botler_database");
 
// Check connection
	if (mysqli_connect_errno())
	{
	  echo "
Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$date = date('Y-m-d H:i:s');

	$sql = "INSERT INTO feedbackTable (attended, feedback, pace, subject, time) VALUES ('$attended', '$feedback', '$pace', '$subject', '$date')";
	if ($con->query($sql) === TRUE) {
    	echo 1;
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>