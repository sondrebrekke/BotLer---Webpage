<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Styling of the webpage -->
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
            //Sends the user to the index.html page if he/she doesn't have a active session
            session_start();
            if (!$_SESSION["username"]) {
                header("Location: index.html");
            }
            //Gets the name of the lecturer if a session is active
            $name = $_SESSION['name'];  
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
                <!-- Defines the menubar where user can click to enter a site -->
                <div class="navbar-collapse collapse">
                <br><img src="/marentno/BotLer/assets/img/Logo(1).png" alt="" width="20%" height="20%"> </a>
                    <ul class="nav navbar-nav navbar-right">
                    <li><a href="homepage.php" id = "home"> <br>Home<br><br></a></li>
                    <li><a href="changePassword.php" id = "changePassword"> <br>Change Password<br><br></a></li>
                    <li><a href="viewAssignment.php" id = "viewAssignment"> <br>View Assignments<br><br></a></li>
                    <li><a href="addAssignment.php" id = "addAssignment"> <br>Add Assignment<br><br></a></li>
                    <li><a href="viewFeedback.php" id = "viewFeedback"> <br>View Feedback<br><br></a></li>
                    <li><a href="logout.php" id = "logOut"> <br>Log Out<br><br></a></li>
                    <li><a><center><?php echo "Welcome, <br>$name!";?><br><br></center></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Adds a couple of breaks to make sure the following are visible under the menu -->
        <br>
        <br>
        <br>
        <br>
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
                    <h3>Add Assignment</h3>
                    <hr>
                    <!-- Creates a form that will send the entered information to the DB if entered correctly -->
                    <form action="addedAssignments.php" method="post">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <textarea id="txtArea" maxlength="25" required="required" class="form-control" rows="1" name = "name" placeholder="Name"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" required="required"  name = "deadline" placeholder="Deadline:  YYYY-MM-DD">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <textarea id="Textarea1" maxlength="75" required="required" class="form-control" rows="3" name = "description" placeholder="Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Add Assignment</button>
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

