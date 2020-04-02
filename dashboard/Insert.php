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

<?php //Dropdown list of tables names
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
//Get columns names. Create label and input fields
    $arrColumns = array();
    while($columns = $columnsResult->fetch_assoc())
    {
        $column_name=$columns['column_name'];
        if ($column_name == "id"){
            echo "<label for=$column_name> $column_name </label> <input type = 'text' name = $column_name disabled> <br><br>";
            //array_push($arrColumns, $column_name);
        } else {
            echo "<label for=$column_name> $column_name </label> <input type = 'text' name = $column_name> <br><br>";
            array_push($arrColumns, $column_name);
        }
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

//get Array values and table name from upper code
    $arrColumns1 = $_SESSION['Insert1'];
    $_SESSION['Insert1'] = $arrColumns1;
    $getTable1 = $_SESSION['Insert2'];
    $_SESSION['Insert2'] = $getTable1;  

//insert new values into array
    $newValues = array();
    foreach ($arrColumns1 as $value) 
    {
        if (empty($_POST[$value]))
        {
            echo "ERROR! all available fields are required!";
            exit();
        } else {
            array_push($newValues, $_POST[$value]);
        }
    }
    $sepCol = implode(', ', $arrColumns1);
    $sepVal = implode("', '", $newValues);
    $sepVal = "'".$sepVal."'";

//Insert new values into Database
    $sql = "INSERT INTO $getTable1 ($sepCol) VALUES ($sepVal)";
    if (mysqli_query($conn, $sql)) {
        echo "New values added to database 'final_lit' into table '".
                $getTable1. "' successfully:". "<br><br>". $sepVal;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
echo "</form>";
?>

</center>
</body>
</html>