<?php

    session_start();
    if (!isset($_SESSION['Admin_name'])) {
        header("location: Admin_Signin.php");
    }
    else{
        include_once('../../config/dbconnect.php');
    }

        $error = false;

        $F_id = "";
        $Faculty_name = "";
        $Gender = "";
        $Phone_no = "";
        $Department = "";

    if (isset($_POST['Add'])) {
        $Faculty_name = $_POST['Faculty_name'];
        $Gender = $_POST['Gender'];
        $Phone_no = $_POST['Phone_no'];
        $Department = $_POST['Department'];
    
        if(strlen($Phone_no)<10)
        {
          $error = true;
          $errPhoneNo = 'please enter a valid Phone number';
        }

        if(strlen($Phone_no)>10)
        {
          $error = true;
          $errPhoneNo = 'please enter a valid Phone number';
        }

        if (!$error) {
            
        
            $sql = "INSERT INTO faculty(Faculty_name, Gender, Phone_no, Department) VALUES ('$Faculty_name','$Gender','$Phone_no','$Department')";    

            if (mysqli_query($conn, $sql)) 
            {
                $successmsz = 'Faculty successfully Entered.';
                header("refresh:1; url=../lists/Faculty_list.php");
            }
            else
            {
                $errormsz = mysqli_error($conn);
            }
        }

        header("refresh:3; url=Add_new_Faculty.php");

    }

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
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="Dashboard.php">Feedback Management System </a>
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
                                <li class="active"><a href="../Dashboard.php"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                                <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-tasks">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Questions </a>
                                    <ul id="togglePages" class="collapse unstyled">
                                        <li><a style="color: black;" href="Add_Faculty_question.php"><i class="icon"></i>Add Faculty Questions</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li><a href="Add_new_Faculty.php"><i class="menu-icon icon-tasks"></i>Add new Faculty </a>
                                </li>
                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li><a href="Add_new_Facility.php"><i class="menu-icon icon-tasks"></i>Add new Facility </a>
                                </li>
                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li><a href="../../config/logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                    <div class="content">

                        <div class="module">
                            <div class="module-head">
                                <center><h3>Add Faculty Details</h3></center>
                            </div>
                            <div class="module-body">

                                    <?php
                                            if(isset($successmsz))
                                            {
                                              ?>
                                              <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <a href="signin.php"><?php echo $successmsz; ?><a/> 
                                              </div>
                                              <?php
                                            }
                                       ?>

                                    <br />

                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form-horizontal row-fluid" >

                                        <div class="control-group">
                                            <label class="control-label" for="Faculty_name">Faculty Name</label>
                                            <div class="controls">
                                                <input type="text" id="Faculty_name" name="Faculty_name" class="span8"><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Gender</label>
                                            <div class="controls">
                                                <label class="radio inline">
                                                    <input type="radio" name="Gender" id="optionsRadios1" value="Male" checked="">
                                                    Male
                                                </label> 
                                                <label class="radio inline">
                                                    <input type="radio" name="Gender" id="optionsRadios2" value="Female">
                                                    Female
                                                </label>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="Phone_no">Phone number</label>
                                            <div class="controls">
                                                <input type="text" id="Phone_no" style="margin-bottom: 10px;"
                                                name="Phone_no" class="span8" required><br>
                                                <p style="color: red;"><?php if(isset($errPhoneNo)) echo $errPhoneNo; ?></p><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="Department">Department</label>
                                            <div class="controls">
                                                <input type="text" id="Department" name="Department" class="span8"><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <div class="controls">
                                                <button name="Add" type="submit" class="btn btn-primary btn-xl">Add</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div><!--/.content-->
                </div><!--/.span9-->
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
        <script src="../../Assets/scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../../Assets/scripts/common.js" type="text/javascript"></script>
        
    </body>
