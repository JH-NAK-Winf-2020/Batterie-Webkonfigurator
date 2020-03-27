<?php
  $server = 'localhost';
  $user = 'laura';
  $password = 'test123';
  $db_name = 'final_lit';
  $conn = mysqli_connect($server, $user, $password, $db_name);

  if (!$conn){
    echo 'Connection Error:' . mysqli_connect_error();
  }
 ?>
