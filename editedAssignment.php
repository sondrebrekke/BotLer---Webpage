<?php
    session_start();
    //Redirects the user if a session is not active. 
    if (!$_SESSION["username"]) {
        header("Location: index.html");
    }

    include 'security.php';

    //Connects to the database, and checks the charset
	$conn = new mysqli('mysql.stud.ntnu.no', 'jorgfb_botler', $passwordDB, 'jorgfb_botler_database'); 
	if (!mysqli_set_charset($conn, "utf8")) { 
		printf("Could not load utf8: %s\n", mysqli_error($conn));
		printf('<BR>');
	}  
	//Gets the session variable $id (of the assignment) and updates the fields in the DB. 
	$id = $_SESSION['id'];
	$name = trim($_POST['name']); 
	$description = trim($_POST['description']);	
	$deadline = trim($_POST['deadline']); 
    $name1 = $conn->real_escape_string($name);
    $description1 = $conn->real_escape_string($description);

    //Checks that the date format is correct
    if (strlen($deadline) == 10 and $deadline[4]=="-" and $deadline[7]=="-" and is_numeric(substr($deadline, 0, 4)) and is_numeric(substr($deadline, 5, 2)) and is_numeric(substr($deadline, 8, 2))) {
		$sql = "UPDATE assignments SET name = BINARY '$name1', description = BINARY '$description1', deadline = BINARY '$deadline' WHERE id='$id'";
        $melding = "Your assignment was added successfully!";
        if ($conn->query($sql) === TRUE) {
            //Redirects the user to viewAssignment if everything is successful.
        	header("Location: viewAssignment.php");
        }
    }
    //Otherwise, it will display the following message.
    else{
        $melding = "Wrong date-format. Please try again!";
        echo("FEIL");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>BotLer</title>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
        <link href="assets/css/style.css" rel="stylesheet" />
    </head>
    <body>
        <?php
            session_start();
            //Redirects the user if a session is not active. 
            if (!$_SESSION["username"]) {
                header("Location: index.html");
            }
            $nameL = $_SESSION['name'];  
        ?>
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
                <!-- Displays the menu -->
                <div class="navbar-collapse collapse">
                <br><img src="/marentno/BotLer/assets/img/Logo(1).png" alt="" width="20%" height="20%"> </a>
                    <ul class="nav navbar-nav navbar-right">
                    <li><a href="homepage.php" id = "home"> <br>Home<br><br></a></li>
                    <li><a href="changePassword.php" id = "changePassword"> <br>Change Password<br><br></a></li>
                    <li><a href="viewAssignment.php" id = "viewAssignment"> <br>View Assignments<br><br></a></li>
                    <li><a href="addAssignment.php" id = "addAssignment"> <br>Add Assignment<br><br></a></li>
                    <li><a href="viewFeedback.php" id = "viewFeedback"> <br>View Feedback<br><br></a></li>
                    <li><a href="logout.php" id = "logOut"> <br>Log Out<br><br></a></li>
                    <li><a><center><?php echo "Welcome, <br>$nameL!";?><br><br></center></a></li>
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
                            <h3> 
                                <?php echo $melding ?>
                            </h3>
                        </center>    
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="container">
            <div class="row main-low-margin text-center">
                <div class="col-md-5 col-sm-5">
                    <img src="/marthaan/BotLer/assets/img/botler1.png" alt="" width="50%" height="50%"/>
                    <p>
                        <br>
                        By adding assignments to your course, both mandatory and preparatory, your students recieve information directly into their BotLer application.
                    </p>
                </div>
                <div class="col-md-7 col-sm-7">
                    <h3>Edit Assignment</h3>
                    <hr>
                    <!-- Here the form that the user can edit is created. The values are set to what they originally was -->
                    <form action="editedAssignment.php" method="post">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <textarea id="Textarea" maxlength="25" required="required" class="form-control" rows="1" name = "name" placeholder="Name"><?php echo $name;?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" required="required"  name = "deadline" placeholder="Deadline:  YYYY-MM-DD" value = "<?php echo $deadline;?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <textarea id="Textarea1" maxlength="75" required="required" class="form-control" rows="3" name = "description" placeholder="Description"><?php echo $description;?></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Edit Assignment</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>
