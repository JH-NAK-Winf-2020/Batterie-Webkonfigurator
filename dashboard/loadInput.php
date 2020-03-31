<?php
    include 'db_result.php';
    $object = new DB_Result();
    $options = $object->getOptionsFzgSop($_POST['fzgLabel'],$_POST['fzgSop'],$_POST['brLabel'], $_POST['baKapa'], $_POST['baTyp'], $_POST['baMaterial'],$_POST['asLabel']);
    echo Print_r($options);
    include 'input.php';
?>