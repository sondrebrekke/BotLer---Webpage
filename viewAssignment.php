 <?php
    session_start();
    $subject_code = $_SESSION['subject_code'];
    $username= $_SESSION['username'];
    $password = $_SESSION['password'];
    include 'security.php';

    //Connects to the DB
    $conn = new mysqli('mysql.stud.ntnu.no', 'jorgfb_botler', $passwordDB);
    $db = mysqli_select_db($conn, 'jorgfb_botler_database');
    //Sets the charset to utf8
    $conn->set_charset('utf8');
    //Gets the information needed from the DB 
    $query = "SELECT assignments.id, assignments.name, subject, description, deadline, subject_code, lecturer.id, lecturer, username, password FROM assignments, lecturer, subjects WHERE assignments.subject = subjects.subject_code AND subjects.lecturer = lecturer.id AND BINARY username= BINARY '$username' AND BINARY password= BINARY '$password'" ;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Styling -->
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
            //Checks if the user has an active session, otherwise it redirects to index.html
            if (!$_SESSION["username"]) {
                header("Location: index.html");
            }
            $name = $_SESSION["name"];
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
                <div class="navbar-collapse collapse">
                <!-- Displays the menu -->
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
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="container" align="center">
            <h2>Assignments for <?php echo $subject_code ?></h2>            
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
                        //Displays the information from the DB in a nice table. 
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

