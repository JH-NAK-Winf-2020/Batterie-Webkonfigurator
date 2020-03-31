<?php
include 'config/connect.php'; //Verbinung SQL DB herstellen
include 'db_result.php';
    $firstOutput = new DB_Result();
    $data = $firstOutput->initialOutput();
    $firstDropDown = new DB_Result();
    $options = $firstDropDown->initialDropDown();
 $nSatzData = '';
include 'initial.php'; //Seitenaufbau der ersten Seite (ohne Nachladen)
?>
