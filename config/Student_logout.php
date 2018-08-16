<?php

  session_start();
  unset($_SESSION['Student_name']);
  session_destroy();
  header("location: ../home.php");

 ?>
