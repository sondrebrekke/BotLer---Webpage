<?php

	$conn = new mysqli('mysql.stud.ntnu.no', 'jorgfb_botler', 'park12', 'jorgfb_botler_database'); //Her kobler jeg meg til området mitt på nvselev.no. Jeg skriver inn server, brukernavn, passord og databsenavnet.
	if (!mysqli_set_charset($conn, "utf8")) { //Her sier jeg at hvis ikke tegnsettingen er satt til UTF-8, skal den "skrive ut" på siden Feil ved lasting av tegnsettet utf8. Brukeren vil også få en feilmelding.
		printf("Feil ved lasting av tegnsettet utf8: %s\n", mysqli_error($conn));
		printf('<BR>');
		} else { //Her sier jeg at hvis tegnsetting er satt til UTF-8, skal den ikke gjøre noe. 
		
	}
	$records = array(); //Lager en array som informasjonen skal legges inn i.
	if(!empty($_POST)) //Hvis den informasjonen brukeren tastet inn i feltene fra login.php IKKE er tomme (fortsetter nedover)
	{
				
		$username = trim($_POST['username']); //Skal den trimme og legge $_POST brukernavn inn i variabelen $brukernavn slik at den informasjonen brukeren skrev inn enkelt kan hentes ut. 
		$password = trim($_POST['password']);	//Skal den trimme og legge $_POST passord inn i variabelen $passord slik at den informasjonen brukeren skrev inn enkelt kan hentes ut. 
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;

		if($results = $conn->query("SELECT * FROM lecturer WHERE username= '$username' AND password= '$password'")) //Hvis resultatene stemmer med en bruker fra databasen min og tabellen prosjekt_info, skal den hente ut alle feltene. 
		{
			if($results->num_rows) { //hvis det er noen rader som stemmer
				while($row = $results->fetch_array()) { //Gjør klar og henter ut informasjonen
					$records[] = $row; //Legger informasjonen inn i variabelen $records
				}

				$results->free();
			}
			else{ //Hvis det ikke er noen rader som stemmer overens med det brukeren tastet inn, skal den:
				header("Location: feillogin.php"); //redirecte brukeren til siden som er skrevet inn. 
			}
		}
		
	}

	
	$conn->close();



?>
	<?php


	session_start();

	$username= $_SESSION['username'];
	$password = $_SESSION['password'];
	
	$conn = new mysqli('mysql.stud.ntnu.no', 'jorgfb_botler', 'park12');
		if ($conn->connect_error){
			die("feil: " . $conn->connect_error);
		} else {

		}

	$db = mysqli_select_db($conn, 'jorgfb_botler_database');	
			$query = "SELECT id,name,subject_code, subject_name FROM lecturer,subjects WHERE lecturer.id = subjects.lecturer AND  username= '$username' AND password= '$password'"  ;
			if ($res = mysqli_query($conn, $query)){
				while ($row = $res -> fetch_array()) {
					$id = $row[0];
					$name = $row[1];
					$subject_code = $row[2];
					$subject_name = $row[3];

	$_SESSION['subject_code'] = $subject_code;				
				}
			}	
	?>



<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<!-- HEAD SECTION -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Bootstrap Mutipager Template - Maxop</title>
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--BOOTSTRAP MAIN STYLES -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!--FONTAWESOME MAIN STYLE -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--SLIDER CSS CLASES -->
    <link href="assets/Slides-SlidesJS-3/examples/playing/css/slider.css" rel="stylesheet" />
    <!--CUSTOM STYLE -->
    <link href="assets/css/style.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<!--END HEAD SECTION -->
<body>
    <!-- NAV SECTION -->
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"></a>
            </div>
            <div class="navbar-collapse collapse">
            <br><img src="/marentno/BotLer/assets/img/Logo(1).png" alt="" width="30%" height="30%"> </a>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="http://folk.ntnu.no/marentno/viewAssignment.php"> <br>View Assignments<br></a></li>
                <li><a href="http://folk.ntnu.no/marentno/BotLer/addAssignment.php"> <br>Add Assignment<br></a></li>
                <li><a href="http://folk.ntnu.no/marentno/getFeedback.php"> <br>View Feedback<br></a></li>
                <li><a href="http://folk.ntnu.no/marentno/"> <br>Log Out<br></a></li>
                <li><a>

                <form action="http://folk.ntnu.no/marentno/endrePassord.php" method="post">
                    <center>
                        <input type="text" name ="username" placeholder="Username" style="text-align:center" readonly="readonly" value=<?php echo $username; ?>>
                        <br>
                        <input type="password" name ="password" placeholder="Password" style="text-align:center" value=<?php echo $password; ?>>
                        <br>
                        <td colspan="2" style="text-align:center;"><input type="submit" value="Change Password"></td>
                    </center>
                </form> 

                </a></li>


                </ul>
            </div>

        </div>
    </div>
    <!--END NAV SECTION -->
    <!-- HOME SECTION -->

    <!-- SLIDER SECTION -->
    <div id="slides">
        <img src="/marthaan/BotLer/assets/img/ProgramvareUtviklingprosjekt-7.jpg" alt="" />
        <img src="/marthaan/BotLer/assets/img/ProgramvareUtviklingprosjekt.jpg" alt="" />
        <img src="/marthaan/BotLer/assets/img/ProgramvareUtviklingprosjekt-6.jpg" alt="" />
    </div>
    <!-- END SLIDER SECTION -->


    <div class="container">
        <div class="row main-low-margin text-center">
            <div class="col-md-4 col-sm-4">
                <img src="/marthaan/BotLer/assets/img/Mashup1.png" alt="" width="75%" height="65%"/>
                <h3>ASSIGNMENTS</h3>
                <p>
                    The students will receive information on upcoming work, both mandatory and preparatory

                </p>
            </div>
            <div class="col-md-4 col-sm-4">
                <img src="/marthaan/BotLer/assets/img/Mashup2.png" alt="" width="70%" height="70%"/>
                <h3>STATISTICS</h3>
                <p>
                    The app will provide the students with information about their progress in the course

                </p>
            </div>
            <div class="col-md-4 col-sm-4">
                <img src="/marthaan/BotLer/assets/img/Mashup3.png" alt="" width="70%" height="70%"/>
                <h3>FEEDBACK</h3>
                <p>
                    The students will be given the opportunity to fill out a survey to rate each lecture 

                </p>
            </div>

        </div>
        <div class="row main-low-margin ">

            <div class="col-md-8 col-sm-8">
                <h3>"I had benefited greatly from an application that worked as my educational butler."</h3>
                <p>
                    <br>
                    Marie is a 22 year old economics student. She is highly active in student organizations, workout often and therefore find very little time to spend on mandatory assignments. It is thus important that she spend her valuable time efficiently. Marie likes to attend the lectures, but often find herself loosing focus since the professors have a higher pace than she prefers. Since the referents rarely meet, she feels the lecturers doesn’t adapt. Maries goal with BotLer is to boost her learning experience.

                </p>
                
            </div>

            <div class="col-md-4 col-sm-4 text-center">
                <img src="/marthaan/BotLer/assets/img/IMG_8407.png" width="85%" height="85%">
                <h3>Marie Holte</h3>

            </div>
        </div>
        <div class="row main-low-margin ">
            <div class="col-md-3 col-sm-3 text-center">
                <img src="/marthaan/BotLer/assets/img/graf.png" width="50%" height="50%">
                <h3>FEATURES</h3>
                <p>
                    BotLer provides students an overview over upcoming events, progression statistics and interactions with lecturers.  
                </p>
            </div>
            <div class="col-md-3 col-sm-3 text-center">
                <img src="/marthaan/BotLer/assets/img/features.png" width="50%" height="50%">
                <h3>TECHNOLOGIES</h3>
                <p>
                    BotLer features SDKs for iOS, Machine Learning, Big Data and High Performance. 

                </p>
            </div>
            <div class="col-md-6 col-sm-6">
                <h3>OUR VALUE PROPOSITION</h3>
                <p>
                    BotLer helps students organize and structure their studies,  handing them information about the class, to secure no late deliveries. With direct feedback to the lecturer, the application redefines the student-teacher relationship and makes lecture adaption easier than ever before. 

                </p>

            </div>

        </div>


    </div>
    <div class="space-bottom"></div>
    <!--END HOME SECTION -->
    <!--FOOTER SECTION -->

    <div id="footer">
        <div class="row">
            <div class="col-md-4">
                <h4>TDT4140 Software Engineering course</h4>
                <hr>
                <p>
                    Spring 2017 <br>
                    Lecturer: Pekka Abrahamsson, Anh Nguyen Duc <br>
                    Coaches: Henry Sjøen, Kari Eline Strandjord,<br> 
                    Audun Liberg, Evelyn Saxegaard, <br>
                    Hung Quang Thieu, Jie Li, Håvard Estensen <br>

                    <br>
                    COPYRIGHT © 2017

                </p>
            </div>
            <div class="col-md-4">
                <h4>Need Help ? Write Us </h4>
                <hr>
                <form>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Email address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <textarea name="message" id="message" required="required" class="form-control" rows="3" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit Request</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
            <div class="col-md-4">
                <h4>Made by : </h4>
                <hr>
                <p>
                    Maren T. Noreng | SCRUM master <br>
                    Sondre Brekke | Software developer <br>
                    Jørgen F. Bø | Software designer <br>
                    Martha H. Andersen | Product developer 
                    

                </p>
            </div>
        </div>
    </div>

    <!--END FOOTER SECTION -->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY LIBRARY -->
    <script src="assets/js/jquery.js"></script>
    <!-- CORE BOOTSTRAP LIBRARY -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- SLIDER SCRIPTS LIBRARY -->
    <script src="assets/Slides-SlidesJS-3/examples/playing/js/jquery.slides.min.js"></script>
    <!-- CUSTOM SCRIPT-->
    <script>
        $(document).ready(function () {
            $('#slides').slidesjs({
                width: 940,
                height: 528,
                play: {
                    active: true,
                    auto: true,
                    interval: 4000,
                    swap: true
                }
            });
        });
    </script>

</body>
</html>


<!--
<!DOCTYPE html>
<html>
<header>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<a href = "http://folk.ntnu.no/marentno/login.php">
		<center><img src ="Logo.png" width="30%" height="22%"></center>
		</h1>
	</a>
</header>
<center><h2><?php //echo "Velkommen, $name!";?></h2>

<h4><?php //echo "Du er faglærer i $subject_code - $subject_name";?></h4></center>

<center><form name = "Oppdater" action= "endrePassord.php" method="post"> 
<input type="text" style="text-align:center" name="username" readonly="readonly" value=<?php //echo $username; ?>>
<br> 

<input type="password" style="text-align:center" name="password" value=<?php //echo $password; ?>>  --> <!-- Her lager jeg et tekstfelt hvor all skrift som ligger inni felten skal sentreres og feltet heter "brukernavn". Feltet skal også hente ut brukernavnet til brukeren hvor brukernavnet og passordet stemmer --> <!--
<br>
<td colspan="2" style="text-align:center;"><input type="submit" value="Change Password"></td>
<br>
<br>
</form>
<input type="button" onclick="location.href='http://folk.ntnu.no/marentno/viewAssignment.php';" value="View Assignments" />
<input type="button" onclick="location.href='http://folk.ntnu.no/marentno/addAssignment.php';" value="Add Assignment" />
<input type="button" onclick="location.href='http://folk.ntnu.no/marentno/getFeedback.php';" value="View Feedback" />
<input type="button" onclick="location.href='http://folk.ntnu.no/marentno/';" value="Log Out" />
</center>
<center>
	<br>
	COPYRIGHT &#169; 2017 
	</center>
</html>


-->
