<?php 
include 'db_result.php';
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
include 'input.php';
?>