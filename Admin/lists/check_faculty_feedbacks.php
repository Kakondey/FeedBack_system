<?php

    session_start();
    if (!isset($_SESSION['Admin_name'])) {
        header("refresh:1; url= Admin_Signin.php");
    }
    else{
        error_reporting(0);
        include_once('../../config/dbconnect.php');
    }

    $faculty = $_POST['faculty'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel</title>
        <link type="text/css" href="../../Assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="../../Assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="../../Assets/bootstrap/css/theme.css" rel="stylesheet">
        <link type="text/css" href="../../Assets/bootstrap/css/custom.css" rel="stylesheet">
        <link type="text/css" href="../../Assets/images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='../../Assets/http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="../Dashboard.php">FeedBack Management System </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            <li><a class="User" href="#"><?php echo $_SESSION['Admin_name']; ?></a></li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <div class="controls">
                                            <form  method="post" action="check_faculty_feedbacks.php" class="form-horizontal row-fluid">
                                                <!--  -->
                                                <p style="color: white; font-weight: bold;">Select Faculty :</p>
                                                <select name="faculty" class="span8">
                                                    <option selected="selected">--Select Faculty--</option>
                                                    <?php
                                                        $queryF = "SELECT * FROM faculty";
                                                        $resultF = mysqli_query($conn,$queryF);
                                                        while($rowF=mysqli_fetch_assoc($resultF))
                                                        {
                                                            ?>
                                                            <option value="<?php echo $rowF['Faculty_name']; ?>"><?php echo $rowF['Faculty_name']; ?></option>
                                                            <?php
                                                        } 
                                                    ?>
                                                </select>
                                                <br><br>

                                                        <button name="check" type="submit" class="btn btn-primary btn-xl">check</button><br><br>
                                            </form>                                        
                            </div>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9" style="margin-left: 60px; width: 500px;">
                        <div class="content">
                        <div class="module">
                            <div class="module-head">
                                <center><h3>Faculty Rating</h3></center>
                            </div>
                            <div class="module-body">
                                    <br />
                                    <?php

                                        $sql="SELECT SUM(Total_marks) AS totalpoints FROM `faculty_feedback` WHERE Faculty_name = '$faculty'";
                                        $query=mysqli_query($conn,$sql);

                                        if (mysqli_num_rows($query)>0) {
                                            while ($row=mysqli_fetch_object($query)) {

                                               // $Student_name = $_POST['faculty'];
                                                $Total_marks = $row->totalpoints;
                                                
                                                $totalTEacherCountFromFeedback = "SELECT Faculty_name FROM `faculty_feedback` WHERE Faculty_name = '$faculty' ";
                                                $totalTEacherCountFromFeedbackQuery = mysqli_query($conn,$totalTEacherCountFromFeedback);
                                                $totalFacultynos = mysqli_num_rows($totalTEacherCountFromFeedbackQuery);
                                                $totalPoints = $Total_marks/$totalFacultynos;
                                            ?>
                                        <div class="control-group" style="margin-left: 50px;">
                                            <p style="margin-top: 5px;">Faculty Name : <?php echo $faculty; ?></p>
                                            <p style="margin-top: 5px;">Rating : <?php echo $totalPoints; ?></p></h3>
                                        </div>
                                        <?php
                                            }
                                        }
                                    ?>
                            </div>
                        </div>
                    </div><!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <script src="../../Assets/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="../../Assets/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="../../Assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../Assets/scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="../../Assets/scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="../../Assets/scripts/common.js" type="text/javascript"></script>

    </body>
