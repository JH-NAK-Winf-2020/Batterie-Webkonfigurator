<?php
include 'config/connect.php'; //Verbinung SQL DB herstellen
include './include/class/db_input.php';
    $NULL='(leer)';
    $firstOutput = new DB_Result();
    $data = $firstOutput->initialOutput();
    $initialFzgSop = new DB_Result();
    $optionsFzgSop = $initialFzgSop->getOptionsDropDown('fzgSop','all','','','','','','');
    $initialBrLabel = new DB_Result();
    $optionsBrLabel = $initialBrLabel->getOptionsDropDown('brLabel','all','','','','','','');
    $initialBaKapa = new DB_Result();
    $optionsBaKapa = $initialBaKapa->getOptionsDropDown('baKapa','all','','','','','','');
    $initialBaTyp = new DB_Result();
    $optionsBaTyp = $initialBaTyp->getOptionsDropDown('baTyp','all','','','','','','');
    $nSatzData = '';
    include 'initial.php'; //Seitenaufbau der ersten Seite (ohne Nachladen)
?>
