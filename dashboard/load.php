<?php
    include './config/connect.php';
    include 'db_result.php';
    $test = new DB_result($_POST['fzgLabel'],$_POST['fzgSop'],$_POST['brLabel'], $_POST['baKapa'], $_POST['baTyp'], $_POST['baMaterial'],$_POST['asLabel']);
    $data = $test->getFullResult();

  include 'output.php'; //Teil des zu erneuernden Contents -> Iteriert ueber $data
  
  ?>
