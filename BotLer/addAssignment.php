﻿<!DOCTYPE html>
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
    <title>BotLer</title>
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--BOOTSTRAP MAIN STYLES -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!--FONTAWESOME MAIN STYLE -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
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
            <br><img src="/marentno/BotLer/assets/img/Logo(1).png" alt="" width="20%" height="20%"> </a>
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

    <br>
    <br>
    <br>
    <br>


    <!-- CONTACT SECTION -->
    <div class="section">
        <div class="container">


            <div class="row main-low-margin">
                <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                    
                </div>
            </div>


        </div>
    </div>

    <div class="container">
        <div class="row main-low-margin text-center">
            <div class="col-md-5 col-sm-5">
                <img src="/marthaan/BotLer/assets/img/Mashup1.png" alt="" width="30%" height="30%"/>
                <p>
                    <br>
                    By adding assignments to your course, both mandatory and preparatory, your students recieve information directly into their BotLer application.
                </p>
            </div>

            <div class="col-md-7 col-sm-7">
                <h3>Add Assignment</h3>
                <hr>
                <form action="addedAssignments.php" method="post">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" name = "name" placeholder="Name">
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
                                <textarea id="Textarea1" required="required" class="form-control" rows="3" name = "description" placeholder="Description"></textarea>
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


    </div>
    <div class="space-bottom"></div>
    <!--END CONTACT SECTION -->
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

</body>
</html>

