<?php
	$conn = new mysqli('mysql.stud.ntnu.no', 'jorgfb_botler', 'park12', 'jorgfb_botler_database'); //Connects to the DB
	$conn->set_charset('utf8'); //Sets the charset to utf-8

	$records = array(); //Creates an empty array where the results will be stored.
	if(!empty($_POST)) //If the login-form is not empty
	{		
		$username = trim($_POST['username']); //Trims the username the user typed in, and stores it in the variable $username.
		$password = trim($_POST['password']); //Trims the password the user typed in, and stores it in the variable $password.
		
        session_start(); //Starts a session and adds the username and password to the session. 
		$_SESSION['username'] = $username;
        $password = $conn->real_escape_string($password);
        $_SESSION['password'] = $password;

        //Gets the id, name, subject code and subject name from the DB for the spesific lecturer that logged in. 
		if($results = $conn->query("SELECT id,name,subject_code, subject_name FROM lecturer,subjects WHERE lecturer.id = subjects.lecturer AND BINARY username= BINARY '$username' AND BINARY password= BINARY '$password'")){
			if($results->num_rows) {
				while($row = $results->fetch_array()) {
                    $id = $row[0];
                    $name = $row[1];
                    $subject_code = $row[2];
                    $subject_name = $row[3];

                    $_SESSION['id'] = $id;
                    $_SESSION['subject_code'] = $subject_code;  
                    $_SESSION['subject_name'] = $subject_name;
                    $_SESSION['name'] = $name;      				
                }

				$results->free();
			}
			else{
				header("Location: feillogin.php"); //If username/passwords don't match with the DB it will go to this page.
			}
		}
	}
    //Sets the charset to utf8
    $conn->set_charset('utf8');
    session_start();
    if (!$_SESSION["username"]) {
        header("Location: index.html"); //If a session is not active, in other word the user is not logged in, it will head to index.html.
    }
    $name = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
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
    </head>
    <body>
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
                    <br>
                    <img src="/marentno/BotLer/assets/img/Logo(1).png" alt="" width="20%" height="20%"> </a>
                    <ul class="nav navbar-nav navbar-right">
                    <li><a href="homepage.php" id = "home"> <br>Home<br><br></a></li>
                    <li><a href="changePassword.php" id = "changePassword"> <br>Change Password<br><br></a></li>
                    <li><a href="viewAssignment.php" id = "viewAssignment"> <br>View Assignments<br><br></a></li>
                    <li><a href="addAssignment.php" id = "addAssignment"> <br>Add Assignment<br><br></a></li>
                    <li><a href="viewFeedback.php" id = "viewFeedback"> <br>View Feedback<br><br></a></li>
                    <li><a href="logout.php" id = "logOut"> <br>Log Out<br><br></a></li>
                    <li><a><center><?php echo "Welcome, <br>$name!";?><br><br></center></a></li>
                    </a></li>
                    </ul>
                </div>
            </div>
        </div>
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
                    <img src="/marthaan/BotLer/assets/img/botler1.png" alt="" width="60%" height="60%"/>
                    <h3>ASSIGNMENTS</h3>
                    <p>
                        The students will receive information on upcoming work, both mandatory and preparatory
                    </p>
                </div>
                <div class="col-md-4 col-sm-4">
                    <img src="/marthaan/BotLer/assets/img/botler2.png" alt="" width="60%" height="60%"/>
                    <h3>STATISTICS</h3>
                    <p>
                        The app will provide the students with information about their progress in the course
                    </p>
                </div>
                <div class="col-md-4 col-sm-4">
                    <img src="/marthaan/BotLer/assets/img/botler3.png" alt="" width="60%" height="60%"/>
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
                        Marie is a 22 year old economics student. She is highly active in student organizations, workout often and therefore find very 
                        little time to spend on mandatory assignments. It is thus important that she spend her valuable time efficiently. Marie likes 
                        to attend the lectures, but often find herself loosing focus since the professors have a higher pace than she prefers. Since 
                        the referents rarely meet, she feels the lecturers doesn’t adapt. Maries goal with BotLer is to boost her learning experience.
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
                        BotLer helps students organize and structure their studies,  handing them information about the class, to secure no late 
                        deliveries. With direct feedback to the lecturer, the application redefines the student-teacher relationship and makes lecture 
                        adaption easier than ever before. 
                    </p>
                </div>
            </div>
        </div>
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
                    <h4>Have any questions, or want to sign up? </h4>
                    <hr>
                    <form action="sendEmail.php" method="post">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" required="required" name= "name" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" required="required" name = "email" placeholder="Email address">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <textarea name="message" id="message" required="required" name = "message" class="form-control" rows="3" placeholder="Message"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit Message</button>
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
