<?php
    include 'db_result.php';
    $fzgSop= new DB_Result();
    $optionsFzgSop = $fzgSop->getOptionsFzgSop($_POST['fzgLabel'],$_POST['fzgSop'],$_POST['brLabel'], $_POST['baKapa'], $_POST['baTyp'], $_POST['asLabel']);
    $brLabel= new DB_Result();
    $optionsBrLabel = $brLabel->getOptionsBrLabel($_POST['fzgLabel'],$_POST['fzgSop'],$_POST['brLabel'], $_POST['baKapa'], $_POST['baTyp'], $_POST['asLabel']);
    include 'input.php';
?>