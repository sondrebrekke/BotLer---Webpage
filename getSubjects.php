<?php
    include 'security.php';

	// Create connection
	$con=mysqli_connect("mysql.stud.ntnu.no","jorgfb_botler",$passwordDB,"jorgfb_botler_database");
	//Sets the charset
	$con->set_charset('utf8');
	 
	// This SQL statement selects subjectinfo from the table 'subjects' ordered by subject code
	$sql = "SELECT subject_code, subject_name FROM subjects ORDER BY subject_code ASC";
	 
	// Check if there are results
	if ($result = mysqli_query($con, $sql))
	{
		// If so, then create a results array and a temporary one to hold the data
		$resultArray = array();
		$tempArray = array();
	 
		// Loop through each row in the result set
		while($row = $result->fetch_object())
		{
			// Add each row into our results array
			$tempArray = $row;
		    array_push($resultArray, $tempArray);
		}
	 
		// Finally, encode the array to JSON and output the results
		echo json_encode(array('subjects'=>$resultArray));
	}
	 
	// Close connections
	mysqli_close($con);
?>