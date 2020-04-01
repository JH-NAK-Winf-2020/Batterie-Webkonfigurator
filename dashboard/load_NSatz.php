<?php

  include 'db_result.php';
  $object = new DB_result();
  $nSatzData = $object->getNsatz($_POST['masterID']);
  $masterID = $_POST['masterID'];
  include 'output_NSatz.php'; //Teil des zu erneuernden Contents -> Iteriert ueber $data
  
  ?>
