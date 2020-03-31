<?php
    include 'db_result.php';
    echo 'Hier';
    $object = new DB_Result();
    $options = $object->getOptionsFzgSop($_POST['fzgLabel'],$_POST['fzgSop'],$_POST['brLabel'], $_POST['baKapa'], $_POST['baTyp'], $_POST['asLabel']);
    
    include 'input.php';
?>