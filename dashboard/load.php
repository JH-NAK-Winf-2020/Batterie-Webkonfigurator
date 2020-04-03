<?php
    
    include 'db_result.php';
    $test = new DB_result();
    $data = $test->getFullResult($_POST['fzgLabel'],$_POST['fzgSop'],$_POST['brLabel'], $_POST['baKapa'], $_POST['baTyp'], $_POST['asLabel']);
    include 'output.php'; //Teil des zu erneuernden Contents -> Iteriert ueber $data
  
  ?>
  
  
