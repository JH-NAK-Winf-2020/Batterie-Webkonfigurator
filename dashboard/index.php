<?php
include 'config/connect.php'; //Verbinung SQL DB herstellen
include 'db_result.php';
    $NULL='(leer)';
    $firstOutput = new DB_Result();
    $data = $firstOutput->initialOutput();
    $initialFzgSop = new DB_Result();
    $optionsFzgSop = $initialFzgSop->getOptionsFzgSop('','','','','','');
    $initialBrLabel = new DB_Result();
    $optionsBrLabel = $initialBrLabel->getOptionsBrLabel('','','','','','');
    $initialBaKapa = new DB_Result();
    $optionsBaKapa = $initialBaKapa->getOptionsBaKapa('','','','','','');
    $initialBaTyp = new DB_Result();
    $optionsBaTyp = $initialBaTyp->getOptionsBaTyp('','','','','','');
 $nSatzData = '';
include 'initial.php'; //Seitenaufbau der ersten Seite (ohne Nachladen)
?>
