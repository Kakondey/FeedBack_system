<?php

    include_once('../../config/dbconnect.php');

        $S_id = "";
        $Student_name = "";
        $Department_name = "";
        $Phone_no = "";
        $password = "";

        $error = false;

    if (isset($_POST['Register'])) {
        $Student_name = $_POST['Student_name'];
        $Department_name = $_POST['Department_name'];
        $Phone_no = $_POST['Phone_no'];
        $password = $_POST['password'];
    
        
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

            $sql = "INSERT INTO student(Student_name, Department_name, Phone_no, password) VALUES ('$Student_name','$Department_name','$Phone_no','$password')";    

            if (mysqli_query($conn, $sql)) 
            {
                $successmsz = 'You are successfully registered.';
                header("refresh:1; url=../Student_Signin.php");
            }
            else
            {
                $errormsz = mysqli_error($conn);
            }
        }

    }
?>
<!DOCTYPE html>
<html lang="en">


<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signup Form</title>
        <link type="text/css" href="../../Assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="../../Assets/bootstrap/css/theme.css" rel="stylesheet">
        <link type="text/css" href="../../Assets/bootstrap/css/custom.css" rel="stylesheet">
        <link type="text/css" href="../../Assets/bootstrap/images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
        <script src="../../Assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </head>
<body>

    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <i class="icon-reorder shaded"></i>
                </a>

                <a class="brand" href="#">
                    Student Management System
                </a>

                <div class="nav-collapse collapse navbar-inverse-collapse">
                
                    <ul class="nav pull-right">

                        <li><a class="User" href="../../home.php">
                            Home
                        </a></li>
                    </ul>
                </div><!-- /.nav-collapse -->
            </div>
        </div><!-- /navbar-inner -->
    </div><!-- /navbar -->


                <div class="span9" style="margin-top: 50px; margin-left: 200px;">
                    <div class="content">

                        <div class="module" >
                            <div class="module-head">
                                <h3 style="text-align: center;">Student signup</h3>
                            </div>
                            <div class="module-body">

                                        <?php
                                            if(isset($successmsz))
                                            {
                                              ?>
                                              <div class="alert alert-success">
                                                <a href="#"><?php echo $successmsz; ?><a/> 
                                              </div>
                                              <?php
                                            }
                                            else if (isset($errormsz))
                                            {
                                            ?>
                                              <div class="alert alert-error">
                                                <a href="#"><?php echo $notice; ?><a/></div>
                                              <?php
                                            }
                                       ?>
                                    <br />

                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form-horizontal row-fluid" >

                                        <div class="control-group">
                                            <label class="control-label" for="Student_name">Your Name</label>
                                            <div class="controls">
                                                <input type="text" id="Student_name" name="Student_name" class="span8"><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="Department_name">Department name</label>
                                            <div class="controls">
                                                <input type="text" id="Department_name"
                                                name="Department_name" class="span8" required><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="Phone_no">Phone Number</label>
                                            <div class="controls">
                                                <input type="text" id="Phone_no"
                                                name="Phone_no" class="span8" required><br>
                                                <p style="color: red;"><?php if(isset($errPhoneNo)) echo $errPhoneNo; ?></p><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="password">Password</label>
                                            <div class="controls">
                                                <input type="password" id="password"
                                                name="password"  class="span8" required><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <div class="controls">
                                                <button name="Register" type="submit" class="btn btn-primary btn-xl">Register</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!--/.content-->
                    </div><!--/.span9-->
</body>
