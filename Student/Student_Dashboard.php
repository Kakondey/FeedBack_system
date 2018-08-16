<?php

    session_start();
    if (!isset($_SESSION['Student_name'])) {
        header("location: Student_Signin.php");
    }
    else{
        include_once('../config/dbconnect.php');

        $Student_name = $_SESSION['Student_name'];

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Panel</title>
        <link type="text/css" href="../Assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="../Assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="../Assets/bootstrap/css/theme.css" rel="stylesheet">
        <link type="text/css" href="../Assets/bootstrap/css/custom.css" rel="stylesheet">
        <link type="text/css" href="../Assets/images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='../Assets/http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="Student_Dashboard.php">FeedBack Management System </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            <li><a class="User" href="#"><?php echo $_SESSION['Student_name']; ?></a></li>
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
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="Student_Dashboard.php"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li style="height: 30px; text-align: center;padding-top: 10px; background-color: #e20909;"><b><h4>Give Your FeedBacks</h4></b></li>
                                <li><a href="forms/Faculty_feedBack.php"><i class="menu-icon icon-tasks"></i>Faculty </a>
                                </li>
                                <li><a href="forms/Facility_feedBack.php"><i class="menu-icon icon-tasks"></i>Facility</a>
                                </li>
                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li><a href="../config/Student_logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->  
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <!--/#btn-controls-->
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <script src="../Assets/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="../Assets/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="../Assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../Assets/scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="../Assets/scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="../Assets/scripts/common.js" type="text/javascript"></script>

    </body>
