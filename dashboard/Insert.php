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
<input type = 'submit' name = 'submitTable' value = 'Select Table'/> <br><br>
</form>
<?php
session_start();
//"Select Table" button
if(isset($_POST["submitTable"]))
{   
    
    if (empty($_POST["final_lit"])) echo "Please select a table!";
    else {
    $getTable = $_POST["final_lit"];
    echo 'The selected table is: '.$getTable;
    echo "<br><br>";
    echo "<form action = 'insert.php' method = 'POST'>";
    $columnsResult = $conn->query("SELECT column_name FROM information_schema.columns 
                    WHERE table_schema = 'final_lit'
                    AND table_name = '$getTable'") or die($conn->error);
    $arrColumns = array();
    while($columns = $columnsResult->fetch_assoc())
    {
        $column_name=$columns['column_name'];
        echo "<label for=$column_name>$column_name</label> <input type = 'text' name = $column_name> <br><br>";
        array_push($arrColumns, $column_name);
    }
    echo "<form action = 'insert.php' method = 'POST'>";
    echo "<input type = 'submit' name = 'submitInsert' value = 'Insert'/> <br><br>";
    echo "</form>";
    $_SESSION['Insert1'] = $arrColumns;
    $_SESSION['Insert2'] = $getTable;
    }   
}
//"Insert" button
if(isset($_POST["submitInsert"]))
{
    //get Array and Variable values
    $arrColumns1 = $_SESSION['Insert1'];
    $_SESSION['Insert1'] = $arrColumns1;
    $getTable1 = $_SESSION['Insert2'];
    $_SESSION['Insert2'] = $getTable1;
    
    //echo "<br> <br>"; print_r(array_values($arrColumns1));
    //echo $getTable1;
    //$i = 0;
    $newValues = array();
    foreach ($arrColumns1 as $value) {
        //array_push($newValues, ($value => $_POST[$value]));
        //replace_array_key($newValues, $i, $value);
        array_push($newValues, $_POST[$value]);
        //$newValues = array($value => $_POST[$value]);
        //$temp[$value] = $newValues[$i];
        //unset($newValues[$i]);
        //$newValues = $tmpa + $newValues;
        //$newValues = array($value => $newValues[$i]);
        //$newValues[$value] = $newValues[$i];
        //change_key($newValues, $i, $value);
        //$i = $i + 1;
        //$val[$i] = $val[$value];
        //unset($val[$i]);
        //$newValues = $newValues + array($value => $_POST[$value]);
        //$newValues = array_fill_keys($arrColumns1, $_POST[$value]);
        //echo "<br>"; echo $value; echo "<br>";
        //$newValues = array($value => $_POST[$value]);
    }
    ///////////////////////////////////
    //function rename_keys($newValues, $arrColumns1)  {
    //return array_combine($arrColumns1, array_values($newValues));
    ////////////////////////////////////
    //array_flip($newValues);
    echo "<br> <br>"; print_r(array_values($newValues));
    //$newValues =array_fill_keys(

        
}
echo "</form>";

?>
</center>
</body>
</html>
