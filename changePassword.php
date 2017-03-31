<?php
	session_start();

	$username= $_SESSION['username'];
	$password = $_SESSION['password'];
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
    <div class="container align="center"">
        <center>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
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