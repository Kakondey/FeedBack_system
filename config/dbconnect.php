<?php
  $servername = 'localhost';
  $username = 'root'; 
  $password = '';
  $dbname = 'feedback_system';

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if(!$conn)
  {
    echo "Connection Error!".mysqli_connect_error();
  }


 ?>
