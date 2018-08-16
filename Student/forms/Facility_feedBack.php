<?php

    session_start();
    
    include_once('../../config/dbconnect.php');
    
    error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">


<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>work details</title>
        <link type="text/css" href="../../Assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="../../Assets/bootstrap/css/theme.css" rel="stylesheet">
        <link type="text/css" href="../../Assets/bootstrap/css/custom.css" rel="stylesheet">
        <link type="text/css" href="../../Assets/bootstrap/images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
        <script src="../../Assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../Assets/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="../../Assets/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="../../Assets/scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="../../Assets/scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="../../Assets/scripts/common.js" type="text/javascript"></script>
    </head>
<body>

    <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="Dashboard.php">FeedBack Management System </a>
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
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="../Student_Dashboard.php"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li style="height: 30px; text-align: center;padding-top: 10px; background-color: #e20909;"><b><h4>Give Your FeedBacks</h4></b></li>
                                <li><a href="Faculty_feedBack.php"><i class="menu-icon icon-tasks"></i>Faculty </a>
                                </li>
                                <li><a href="Facility_feedBack.php"><i class="menu-icon icon-tasks"></i>Facility</a>
                                </li>
                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li><a href="../../config/Student_logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->  
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                         <div class="content">
                        <div class="module">
                            <div class="module-head">
                                <center><h3>Please Mark your Responses</h3></center>
                            </div>
                            <div class="module-body" style="background-color: #ef2828; color: white;">
                                    <br />
                                    <?php

                                        $sql="SELECT * FROM `facility`";
                                        $query=mysqli_query($conn,$sql);

                                        if (mysqli_num_rows($query)>0) {
                                            while ($row=mysqli_fetch_object($query)) {

                                                $fa_id = $row->fa_id;
                                                $Facility_name = $row->Facility_name;
                                                $i++;
                                            ?>
                                <form method="post" action="student_facility_averageFeedback.php" id="exam_form" class="form-horizontal row-fluid">

                                        <div class="control-group">
                                            <div class="controls">
                                                <p style="margin-top: 5px;"><?php echo $i;?> .<?php echo $Facility_name; ?></p>
                                                <label class="radio inline">
                                                    <input type="radio" name="response[<?php echo $fa_id; ?>]" value="5" >
                                                    Not Good
                                                </label> <br>
                                                <label class="radio inline">
                                                    <input type="radio" name="response[<?php echo $fa_id; ?>]" value="10">
                                                    Good
                                                </label><br>
                                                <label class="radio inline">
                                                    <input type="radio" name="response[<?php echo $fa_id; ?>]" value="15" >
                                                    Very Good
                                                </label> <br>
                                                <label class="radio inline">
                                                    <input type="radio" name="response[<?php echo $fa_id; ?>]" value="20">
                                                    Best
                                                </label><br>
                                            </div>
                                        </div>
                                        <?php
                                            }
                                        }
                                    ?>
                                        <div class="control-group">
                                            <div class="controls">
                                                <button name="Insert" type="submit" class="btn btn-primary btn-xl">Submit</button>
                                            </div>
                                        </div>
                                    </form>
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
</body>