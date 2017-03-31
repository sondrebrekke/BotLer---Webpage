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
    $query = "SELECT assignments.id, assignments.name, subject, description, deadline, subject_code, lecturer.id, lecturer, username, password FROM assignments, lecturer, subjects WHERE assignments.subject = subjects.subject_code AND subjects.lecturer = lecturer.id AND BINARY username= BINARY '$username' AND BINARY password= BINARY '$password'" ;
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
<?php
    session_start();
    if (!$_SESSION["username"]) {
        header("Location: index.html");
    }
    $name = $_SESSION["name"];
?>
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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<div class="container" align="center">
        
              <h2>Assigments for <?php echo $subject_code ?></h2>            
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Description</th>
                    <th>Deadline</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                    $db=array();
            
                    if ($res = mysqli_query($conn, $query)){
                        while ($row = $res -> fetch_array()) {
                            $id = $row[0];
                            array_push($b, $id);
                            $name = $row[1];
                            $subject = $row[2];
                            $description = $row[3];
                            $deadline = $row[4];
                            echo "<tr>
                                    <td>$name</td>
                                    <td>$subject</td>
                                    <td>$description</td>
                                    <td>$deadline</td>
                                    <td><form action='editAssignment.php' method='POST'><input type='hidden' name='id' value='".$id."'><input type='submit' name='submit-btn' value='Edit'></form></td>
                                    <td><form action='deleteAssignment.php' method='POST'><input type='hidden' name='id' value='".$id."'><input type='submit' name='submit-btn' value='Delete'></form></td>
                            </tr>";
                        }   
                    }
                    session_start();
                    $_SESSION['b'] = $b;
                    $_SESSION['subject'] = $subject;
                    ?>
                    </tr>
                </tbody>
              </table>
            </div>
    <br>
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

