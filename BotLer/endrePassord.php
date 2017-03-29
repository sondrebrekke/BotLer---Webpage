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
		$password1 = trim($_POST['password1']);	//Skal den trimme og legge $_POST passord inn i variabelen $passord slik at den informasjonen brukeren skrev inn enkelt kan hentes ut. 

	}

if ($password <> $password1)
{
    $melding = "Your passwords do not match";
}
else if (mysqli_query($conn, "UPDATE lecturer SET password='$password' WHERE username='$username'"))
{
        $melding = "You have successfully changed your password.";
}
else
{
    mysqli_error($conn);
}

$conn->close();
?>

<?php
	session_start();
	$name = $_SESSION['name'];
    if (!$_SESSION["username"]) {
        header("Location: index.html");
    }
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>BotLer</title>
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
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"></a>
            </div>
            <div class="navbar-collapse collapse">
            <br><img src="/marentno/BotLer/assets/img/Logo(1).png" alt="" width="20%" height="20%"> </a>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="http://folk.ntnu.no/sondrbre/homepage.php"> <br>Home<br><br></a></li>
                <li><a href="http://folk.ntnu.no/sondrbre/changePassword.php"> <br>Change Password<br><br></a></li>
                <li><a href="http://folk.ntnu.no/sondrbre/viewAssignment.php"> <br>View Assignments<br><br></a></li>
                <li><a href="http://folk.ntnu.no/sondrbre/addAssignment.php"> <br>Add Assignment<br><br></a></li>
                <li><a href="http://folk.ntnu.no/sondrbre/viewFeedback.php"> <br>View Feedback<br><br></a></li>
                <li><a href="http://folk.ntnu.no/sondrbre/logout.php"> <br>Log Out<br><br></a></li>
                <li><a><center><?php echo "Welcome, <br>$name!";?><br><br></center></a></li>
                </ul>
            </div>

        </div>
    </div>
    <br>
    <br>
     <div class="section">
        <div class="container">
            <br>
            <div class="row main-low-margin">
                <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                <center>        
                <h3> <?php echo $melding ?></h3>
                </center>    
                </div>
            </div>
        </div>
    </div>
    <div class="container align="center"">
        <center>
            <h3>Change password</h3>
            <hr>
            <form action="endrePassord.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" required="required" name = "username" placeholder="username" readonly="readonly" value=<?php echo $username; ?> text-align="center" style="width: 300px;">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" required="required"  name = "password" placeholder="Password" style="width: 300px;">
                            <input type="password" class="form-control" required="required"  name = "password1" placeholder="Retype password" style="width: 300px;">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Change password</button>
                        </div>
                </form>
            </center>
    </div>
    <div class="space-bottom"></div>
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