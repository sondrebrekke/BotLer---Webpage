<?php

    //Gets the necessary variables from the PHP-session
    session_start();
    $subject_code = $_SESSION['subject_code'];
    $username= $_SESSION['username'];
    $password = $_SESSION['password'];
    $name = $_SESSION['name'];

    //Connects to the DB
    $conn = new mysqli('mysql.stud.ntnu.no', 'jorgfb_botler', 'park12');
    if ($conn->connect_error){
        die("feil: " . $conn->connect_error);
    }
    $db = mysqli_select_db($conn, 'jorgfb_botler_database');
    
    //Creates the query that will get the feedback for the spesific lecturer from the last 7 days. 
    $query1 = "SELECT attended, feedback, pace, time, subject, subject_code, lecturer.id, lecturer, username, password FROM feedbackTable, subjects, lecturer WHERE feedbackTable.subject = subjects.subject_code AND subjects.lecturer = lecturer.id AND BINARY username = BINARY '$username' AND BINARY password = BINARY '$password' AND time BETWEEN date_add(NOW(),INTERVAL -7 DAY) AND NOW() ORDER BY time DESC";

    //Redirects the user if the user has not logged in. 
    if (!$_SESSION["username"]) {
        header("Location: index.html");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Standard phrases from the API -->
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
        <!--<?php
            session_start();
            if (!$_SESSION["username"]) {
                header("Location: index.html");
            }
            $name = $_SESSION['name'];  
        ?>-->
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
                    <!-- Displays the menu where the user can select which page to navigate to. -->
                    <img src="/marentno/BotLer/assets/img/Logo(1).png" alt="" width="20%" height="20%"></a>
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
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <center>
            <h2>Feedback for <?php echo $subject_code; ?></h2>
            <?php
                //Gets the statistics for diplaying through the graphs.
                $query = "SELECT count(*) FROM feedbackTable WHERE pace = 'TOO FAST' AND BINARY subject = BINARY '$subject_code'";
                if ($res = mysqli_query($conn, $query)){
                    while ($row = $res -> fetch_array()) {
                        $too_fast = (int)$row[0];
                    }
                }
                $query = "SELECT count(*) FROM feedbackTable WHERE pace = 'JUST RIGHT' AND BINARY subject = BINARY '$subject_code'";
                if ($res = mysqli_query($conn, $query)){
                    while ($row = $res -> fetch_array()) {
                        $just_right = (int)$row[0];
                    }
                }
                $query = "SELECT count(*) FROM feedbackTable WHERE pace = 'TOO SLOW' AND BINARY subject = BINARY '$subject_code'";
                if ($res = mysqli_query($conn, $query)){
                    while ($row = $res -> fetch_array()) {
                        $too_slow = (int)$row[0];
                    }
                }
                $query = "SELECT count(*) FROM feedbackTable WHERE attended = 'YES' AND BINARY subject = BINARY '$subject_code'";
                if ($res = mysqli_query($conn, $query)){
                    while ($row = $res -> fetch_array()) {
                        $attended = (int)$row[0];
                    }
                }
                $query = "SELECT count(*) FROM feedbackTable WHERE attended = 'NO' AND BINARY subject = BINARY '$subject_code'";
                if ($res = mysqli_query($conn, $query)){
                    while ($row = $res -> fetch_array()) {
                        $not_attended = (int)$row[0];
                    }
                }
            ?>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">

                // Loads the API
                google.charts.load('current', {'packages':['corechart']});

                // The following functions runs when the API is loaded
                google.charts.setOnLoadCallback(drawChart1);
                google.charts.setOnLoadCallback(drawChart2);


                // Creates and draws the first graph from the statistics queried above.
                function drawChart1() {
                    // Creates the data table.
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Pace');
                    data.addColumn('number', 'Number');
                    data.addRows([
                      ['Too slow', <?php echo $too_slow; ?>],
                      ['Too fast', <?php echo $too_fast; ?>],
                      ['Just right', <?php echo $just_right; ?>]
                    ]);

                    // Sets the options for the chart
                    var options = {'title':'Feedbacks about lecture pace all-time',
                                   'width':475,
                                   'height':250};

                    // Instantiate and draw our chart.
                    var chart = new google.visualization.PieChart(document.getElementById('chart_div1'));
                    chart.draw(data, options);
                }

                function drawChart2() {

                    // This functions does exactly the same thing as the function above. 
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Attended');
                    data.addColumn('number', 'Number');
                    data.addRows([
                      ['Attended', <?php echo $attended; ?>],
                      ['Did not attend', <?php echo $not_attended; ?>],
                    ]);

                    var options = {'title':'Attended vs. not attended all-time',
                                   'width':475,
                                   'height':250};

                    var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
                    chart.draw(data, options);
                }
            </script>
            <table class="columns">
              <tr>
                <td><div id="chart_div1"></div></td>
                <td><div id="chart_div2"></div></td>
              </tr>
            </table>
        </center>
        <center><b><h4>Feedback from the last week</b></h4></center>
        <div class="container" align="center">
            <!-- Creates a table that will show the feedback from last week -->
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
                            if ($res = mysqli_query($conn, $query1)){
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

