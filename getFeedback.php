<?php

	session_start();
	$subject_code = $_SESSION['subject_code'];


	$conn = new mysqli('mysql.stud.ntnu.no', 'jorgfb_botler', 'park12');
		if ($conn->connect_error){
			die("feil: " . $conn->connect_error);
		} else {
		}
	$db = mysqli_select_db($conn, 'jorgfb_botler_database');
	$query = "SELECT * FROM feedbackTable WHERE subject = 'TDT4100'";
?>
<html>
	<head>
	<title>BotLer - Database</title>
	</head>
	<body>
	<h2 align="center">Lecturers</h2>
		<table align="center" border="1" cellspacing="0" width="700">
			<thread>
			<th>Attended</th>
			<th>Feedback</th>
			<th>Pace</th>
			<th>Time</th>
			</thread>
			
			<?php
			if ($res = mysqli_query($conn, $query)){
				while ($row = $res -> fetch_array()) {
					$attended = $row[1];
					$feedback = $row[2];
					$pace = $row[3];
					$time = $row[5];
					echo "<tr>
							<td>$attended</td>
							<td>$feedback</td>
							<td>$pace</td>
							<td>$time</td>
					</tr>";
				}
			}	
			?>
		</table>
	</body>
</html>



