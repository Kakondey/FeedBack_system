<?php

    session_start();
    if (!isset($_SESSION['Student_name'])) {
        header("refresh:0; url= Student_Signin.php");
    }
    else{
        include_once('../../config/dbconnect.php');
    } 

      //$sql = "INSERT INTO answer_responses(s_name, question, response, dateOfResponse, subject_title) VALUES";
    
        $i=0;
        $total = 0;
        foreach($_POST['response'] as $response) { 


            $total += $response;

            $i++; 
        }
        $Avg = $total / $i;
        $name = $_SESSION['Student_name'];

        $sql = "INSERT INTO facility_feedback(Student_name, rating) VALUES ('$name','$Avg')";

        if (mysqli_query($conn, $sql)) 
        {
            
           header("refresh:0; url=../student_Dashboard.php");
        }
        else
        {
            $errormsz = mysqli_error($conn);
        }



?>
    


