<?php
    
    include './../include/class/db_input.php';
    //Bereitstellung der Daten für InfoTable, POST-Daten enthaelt aktuelle Intputwerte aus ajax: updateData()
    $output = new DB_result();
    $data = $output->getFullResult($_POST['fzgLabel'],$_POST['fzgSop'],$_POST['brLabel'], $_POST['baKapa'], $_POST['baTyp'], $_POST['asLabel']);
    //Ausgabe in InfoTable
    include 'output_infoTable.php'; //Teil des zu erneuernden Contents -> Iteriert ueber $data
  
  ?>
  
  
