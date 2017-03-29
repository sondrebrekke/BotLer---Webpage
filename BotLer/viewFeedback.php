<?php

    session_start();
    $subject_code = $_SESSION['subject_code'];
    $username= $_SESSION['username'];
    $password = $_SESSION['password'];


    $conn = new mysqli('mysql.stud.ntnu.no', 'jorgfb_botler', 'park12');
        if ($conn->connect_error){
            die("feil: " . $conn->connect_error);
        } else {
        }
    $db = mysqli_select_db($conn, 'jorgfb_botler_database');
    $query = "SELECT attended, feedback, pace, time, subject, subject_code, lecturer.id, lecturer, username, password FROM feedbackTable, subjects, lecturer WHERE feedbackTable.subject = subjects.subject_code AND subjects.lecturer = lecturer.id AND username = '$username' AND password = '$password' AND time BETWEEN date_add(NOW(),INTERVAL -8 DAY) AND NOW() ORDER BY time DESC";
?>


<?php
    session_start();
    if (!$_SESSION["username"]) {
        header("Location: index.html");
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
                <li><a href="http://folk.ntnu.no/marentno/BotLer/homepage.php"> <br>Homepage<br></a></li>
                <li><a href="http://folk.ntnu.no/marentno/viewAssignment.php"> <br>View Assignments<br></a></li>
                <li><a href="http://folk.ntnu.no/marentno/BotLer/addAssignment.php"> <br>Add Assignment<br></a></li>
                <li><a href="http://folk.ntnu.no/marentno/BotLer/viewFeedback.php"> <br>View Feedback<br></a></li>
                <li><a href="http://folk.ntnu.no/BotLer/index.html/"> <br>Log Out<br></a></li>
                <li><a>
                </a></li>


                </ul>
            </div>

        </div>
    </div>
    <!--END NAV SECTION -->
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
        <!--
            <div class="col-md-5 col-sm-5">
                <div class="circle-body"><i class="fa fa-flask fa-5x  icon-set"></i></div>
                <h3>FEEDBACK</h3>
                <p>
                    Through the BotLer app the students are given the opportunity to give feedback
                    to the lecturers. Here they can comment on the pace, ask for recaps and share
                    their opinions concerning the lectures. 
                </p>
            </div>
    -->
            <div class="col-md-7 col-sm-7">
            <br>
            
              <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            </head>
            <body>

            <div class="container" align="center">
        
              <p></p>            
              <table class="table table-striped">
                <thead>
                  <tr>
                  
                    <th>Attended</th>
                    <th>Feedback</th>
                    <th>Pace</th>
                    <th>Time</th>

                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                    if ($res = mysqli_query($conn, $query)){
                        while ($row = $res -> fetch_array()) {
                            $attended = $row[0];
                            $feedback = $row[1];
                            $pace = $row[2];
                            $time = $row[3];
                            echo "<tr>
                                    <td>$attended</td>
                                    <td>$feedback</td>
                                    <td>$pace</td>
                                    <td>$time</td>
                            </tr>";
                        }
                    }   
                    ?>
                    </tr>
                </tbody>
              </table>
            </div>
            </div>
        </div>
        <div class="row main-low-margin ">

<!--

            <div class="col-md-7 col-sm-7">
                <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit </h3>
                <hr>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                         Curabitur nec nisl odio. Mauris vehicula at nunc id posuere.
                        Curabitur nec nisl odio. Mauris vehicula at nunc id posuere.
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                         Curabitur nec nisl odio. Mauris vehicula at nunc id posuere.
                        Curabitur nec nisl odio. Mauris vehicula at nunc id posuere.
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                         Curabitur nec nisl odio. Mauris vehicula at nunc id posuere.
                        Curabitur nec nisl odio. Mauris vehicula at nunc id posuere.
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                         Curabitur nec nisl odio. Mauris vehicula at nunc id posuere.
                        Curabitur nec nisl odio. Mauris vehicula at nunc id posuere.
                </p>
            </div>
            <div class="col-md-5 col-sm-5 text-center">
                <div class="circle-body"><i class="fa fa-tint fa-5x  icon-set"></i></div>
                <h3>OUR LOCATION </h3>
                <p>
                    <p>
                        103, New Street,<br>
                        New York, USA.<br>
                        Call: +23-00-89-009<br>
                        Email: demo@yourdomain.com<br>
                    </p>

                </p>
            </div>
        </div>
-->

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
    </div>
    <!--END FOOTER SECTION -->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY LIBRARY -->
    <script src="assets/js/jquery.js"></script>
    <!-- CORE BOOTSTRAP LIBRARY -->
    <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
