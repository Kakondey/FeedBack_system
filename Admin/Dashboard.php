<?php

    session_start();
    if (!isset($_SESSION['Admin_name'])) {
        header("location: Admin_Signin.php");
    }
    else{
        include_once('../config/dbconnect.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel</title>
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
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="Dashboard.php">FeedBack Management System </a>
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
                        <div class="sidebar" >
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="Dashboard.php"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                                <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-tasks">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Questions </a>
                                    <ul id="togglePages" class="collapse unstyled">
                                        <li><a style="color: black;" href="forms/Add_Faculty_question.php"><i class="icon"></i>Add Faculty Questions</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li><a href="forms/Add_new_Faculty.php"><i class="menu-icon icon-tasks"></i>Add new Faculty </a>
                                </li>
                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li><a href="forms/Add_new_Facility.php"><i class="menu-icon icon-tasks"></i>Add new Facility </a>
                                </li>
                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li><a href="../config/logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <h3>
                                <a href="lists/Faculty_list.php"><input type="submit" value="Faculty List" class="btnlist"></a>
                                <a href="lists/Facility_list.php"><input type="submit" value="Facility List" class="btnlist"></a>
                                <br><br>
                                <a href="lists/Faculty_question_list.php"><input type="submit" value="Faculty Question List" class="btnlist"></a>
                                <br>
                                <h3>Check The FeedBacks : </h3>
                                <a href="lists/check_faculty_feedbacks.php"><input type="submit" value="Faculty FeedBacks" class="btnlist"></a>
                                <a href="lists/check_facility_feedbacks.php"><input type="submit" value="Facility FeedBacks" class="btnlist"></a>
                            </h3>
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
