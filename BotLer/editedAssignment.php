<?php
    session_start();
    if (!$_SESSION["username"]) {
        header("Location: index.html");
    }
?>
<?php 
	$conn = new mysqli('mysql.stud.ntnu.no', 'jorgfb_botler', 'park12', 'jorgfb_botler_database'); //Her kobler jeg meg til området mitt på nvselev.no. Jeg skriver inn server, brukernavn, passord og databsenavnet.
	if (!mysqli_set_charset($conn, "utf8")) { //Her sier jeg at hvis ikke tegnsettingen er satt til UTF-8, skal den "skrive ut" på siden Feil ved lasting av tegnsettet utf8. Brukeren vil også få en feilmelding.
		printf("Feil ved lasting av tegnsettet utf8: %s\n", mysqli_error($conn));
		printf('<BR>');
		} else { //Her sier jeg at hvis tegnsetting er satt til UTF-8, skal den ikke gjøre noe. 
		
	}
	session_start();
	$id = $_SESSION['id'];

	$name = trim($_POST['name']);
	$description = trim($_POST['description']);
	$deadline = trim($_POST['deadline']);

	echo $name;
	echo $description;
	echo $deadline;

	$sql = "UPDATE assignments SET name='$name', description = '$description', deadline = '$deadline' WHERE id='$id'";

	if ($conn->query($sql) === TRUE) {
    	header("Location: http://folk.ntnu.no/sondrbre/viewAssignment.php");
    }
?>