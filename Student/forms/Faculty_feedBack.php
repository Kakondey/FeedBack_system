<?php

    session_start();
    
    include_once('../../config/dbconnect.php');
    
    error_reporting(0);

    $faculty = $_POST['Faculty_name'];
?>
<!DOCTYPE html>
<html lang="en">


<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>feedback details</title>
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
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="../Student_Dashboard.php">FeedBack Management System </a>
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
                            <div class="controls">
                                            <form  method="post" action="Faculty_feedBack.php" class="form-horizontal row-fluid">
                                                <p style="color: white; font-weight: bold;">Select Faculty :</p>
                                                <select name="Faculty_name" class="span8">
                                                    <option selected="selected">--Select Faculty--</option>
                                                    <?php
                                                        $queryS = "SELECT * FROM faculty";
                                                        $resultS = mysqli_query($conn,$queryS);
                                                        while($rowS=mysqli_fetch_assoc($resultS))
                                                        {
                                                            ?>
                                                            <option value="<?php echo $rowS['Faculty_name']; ?>"><?php echo $rowS['Faculty_name']; ?></option>
                                                            <?php
                                                        } 
                                                    ?>
                                                </select>
                                                <br><br>

                                                        <button name="Select" type="submit" class="btn btn-primary btn-xl">Select</button><br><br>
                                            </form>                                        
                            </div>
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

                                        $sql="SELECT * FROM `faculty_questions`";
                                        $query=mysqli_query($conn,$sql);

                                        if (mysqli_num_rows($query)>0) {
                                            while ($row=mysqli_fetch_object($query)) {

                                                $Fa_qId = $row->Fa_qId;
                                                $Question = $row->Question;
                                                $i++;
                                            ?>
                                <form method="post" action="student_faculty_averageFeedback.php" id="exam_form" class="form-horizontal row-fluid">

                                        <div class="control-group">
                                            <div class="controls">
                                                <p style="margin-top: 5px;"><?php echo $i;?> .<?php echo $Question; ?></p>
                                                <input type="hidden" name="faculty" value="<?php echo $faculty?>">
                                                <label class="radio inline">
                                                    <input type="radio" name="response[<?php echo $Fa_qId; ?>]" value="5" >
                                                    Not Good
                                                </label> <br>
                                                <label class="radio inline">
                                                    <input type="radio" name="response[<?php echo $Fa_qId; ?>]" value="10">
                                                    Good
                                                </label><br>
                                                <label class="radio inline">
                                                    <input type="radio" name="response[<?php echo $Fa_qId; ?>]" value="15" >
                                                    Very Good
                                                </label> <br>
                                                <label class="radio inline">
                                                    <input type="radio" name="response[<?php echo $Fa_qId; ?>]" value="20">
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