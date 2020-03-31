<?php

include 'config/connect.php'; //Verbinung SQL DB herstellen 

$resultSet = $conn->query("SELECT table_name FROM information_schema.tables 
                            WHERE table_schema = 'final_lit'") or die($conn->error);
?>
<html>
<head>
</head>
<body> 
<center>
<form method ="POST">
<select name="final_lit">
<?php
echo "<option selected disabled>-- select table --</option>";
while($rows = $resultSet->fetch_assoc())
{
    $table_name=$rows['table_name'];
    echo "<option value=$table_name>$table_name</option>";
}
?>
<br><br><br>
</select> 
<input type = 'submit' name = 'submitTable' value = 'choose Table'/> <br><br>
</form>
<?php 
if(isset($_POST["submitTable"]))
{   
    $getTable = $_POST["final_lit"];
    if (empty($_POST["final_lit"])) echo "Please select a table!";
    else 
    echo 'The selected table is: '.$getTable;
    echo "<br><br>";
    
    $columnsResult = $conn->query("SELECT column_name FROM information_schema.columns 
                    WHERE table_schema = 'final_lit'
                    AND table_name = '$getTable'") or die($conn->error);
    $arrColumns = array();
    while($columns = $columnsResult->fetch_assoc())
    {
        $column_name=$columns['column_name'];
        echo "<label for=$column_name>$column_name</label> <input type = 'text' name = $column_name> <br><br>";
        $arrColumns = array($column_name => $column_name);
    }
    echo "<form action = 'insert.php' method = 'POST'>";
    echo "<input type = 'submit' name = 'submitInsert' value = 'Insert'/> <br><br>";
    echo "</form>";

}

if(isset($_POST["submitInsert"]))
{
    if (!empty($arrColumns)) echo "array is empty";
    $arrValues = array();
    $i = 0;
    while($textFields = $arrColumns->fetch_assoc())
    {
        $newValue = $_POST[$arrColumns[$i]];
        //$newValue = $textFields ['newValue'];
        array_push($arrValues, $newValue);
        $i = $i + 1;

    }
    
}

?>

</center>
</body>
</html>
