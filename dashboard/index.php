<?php
include 'config/connect.php'; //Verbinung SQL DB herstellen
include 'db_result.php';
    $firstOutput = new DB_Result();
    $data = $firstOutput->initialOutput();
    $initialFzgSop = new DB_Result();
    $optionsFzgSop = $initialFzgSop->getOptionsFzgSop('','','','','','');
    $initialBrLabel = new DB_Result();
    $optionsBrLabel = $initialBrLabel->getOptionsBrLabel('','','','','','');
 $nSatzData = '';
include 'initial.php'; //Seitenaufbau der ersten Seite (ohne Nachladen)
?>
