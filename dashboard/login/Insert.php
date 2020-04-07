<?php
//Verbinung SQL DB herstellen
include '../config/connect.php';
$resultSet = $conn->query("SELECT table_name FROM information_schema.tables
                            WHERE table_schema = 'final_lit'") or die($conn->error);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" id="frame">

<head>
    <meta charset="utf-8">
    <title>Lithium-Ionen Webkonfigurator</title>
<<<<<<< HEAD
    <link rel="stylesheet" href="../css/insert.css?v=2">
=======
    <link rel="stylesheet" href="../css/insert.css?v=1">
>>>>>>> 881a91df566931297499df57753198505a0dd605
</head>

<body>
<header>
    <h1>Lithium-Ionen Webkonfigurator f&uumlr Nachr&uumlsts&aumltze</h1> 
</header>

<<<<<<< HEAD
<form action="Insert.php" method ="POST">
<select class="select1" name="final_lit">

<?php 
//Dropdown list for tables names
=======
<form>
<select class="select1" name="final_lit">

<?php
echo 'her';
>>>>>>> bd01257e4147554426df5b3397fac0f8a4407c59
echo "<option selected disabled>-- select table --</option>";
while($rows = $resultSet->fetch_assoc())
{
    $table_name=$rows['table_name'];
    echo "<option value=$table_name>$table_name</option>";
<<<<<<< HEAD
}
?>
=======
}?>
>>>>>>> bd01257e4147554426df5b3397fac0f8a4407c59

<br><br>
</select>

<input class="input1" type = 'submit' name = 'submitTable' value = 'Select Table'/> <br><br>
</form>
<hr class="Trennlinie">
<div class="SelectTable">

<?php
// unset ($_SESSION);
//   if (!isset($_SESSION)) { 
// //   // es wurde noch keine Session gestartet
//  session_start(); 
// } 

// session_start();
//'Select Table' button
if(isset($_POST["submitTable"]))
{   
    if (empty($_POST["final_lit"])) echo "Please select a table!";
    else {
    $getTable = $_POST["final_lit"];
//show the name of the selected table
    echo "<label style='margin-left: -13%'>".'The selected table is: '.$getTable."</label>";
    echo "<br><br>";
//Get columns names
    echo "<form action = 'insert.php' method = 'POST'>";
    $columnsResult = $conn->query("SELECT column_name FROM information_schema.columns 
                    WHERE table_schema = 'final_lit'
                    AND table_name = '$getTable'") or die($conn->error);
//Create label and input fields for columns names
    $arrColumns = array();
    while($columns = $columnsResult->fetch_assoc())
    {
        $column_name=$columns['column_name'];
        //Disable 'id' input field.  
        if ($column_name == "id"){
            echo "<label for=$column_name> $column_name </label> <br> <input type = 'text' name = $column_name disabled> <br><br>";
        } else {
            echo "<label for=$column_name> $column_name </label> <br> <input type = 'text' name = $column_name> <br><br>";
            array_push($arrColumns, $column_name);
        }
    }
    echo "<form action = 'insert.php' method = 'POST'>";
    echo "<input type = 'submit' name = 'submitInsert' value = 'Insert'/> <br><br>";
    echo "</form>";
    setcookie('Insert1', $arrColumns, 0);
    setcookie('Insert2', $getTable, 0);
    // $_SESSION['Insert1'] = $arrColumns;
    // $_SESSION['Insert2'] = $getTable;
    }   
}

//'Insert' button
if(isset($_POST["submitInsert"]))
{


//get Array values and table name from upper code.
$arrColumns1=isset($_COOKIE['Insert1']) ? $_COOKIE['Insert1'] : '';
$getTable1=isset($_COOKIE['Insert2']) ? $_COOKIE['Insert2'] : '';
    // $arrColumns1 = $_SESSION['Insert1'];
    // $getTable1 = $_SESSION['Insert2'];

//add new values into array
    $newValues = array();
    foreach ($arrColumns1 as $value) 
    {
        if (empty($_POST[$value]))
        {
            //show error if input text fields is empty
            echo "ERROR! all available fields are required!";
            exit();
        } else {
            array_push($newValues, $_POST[$value]);
        }
    }
//copy array $newValues into variable and seperate values with commas
    $sepCol = implode(', ', $arrColumns1);
    $sepVal = implode("', '", $newValues);
    $sepVal = "'".$sepVal."'";

//Add new values into Database
    $sql = "INSERT INTO $getTable1 ($sepCol) VALUES ($sepVal)";
    if (mysqli_query($conn, $sql)) {
        echo "New values added to database 'final_lit' into table '".
                $getTable1. "' successfully:". "<br><br>". $sepVal; 
    } else {
        //show error if couldnt connect to the database
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
echo "</form>";
?>
</div>
</center>
</body>
<<<<<<< HEAD
<footer>
=======

 <footer>
>>>>>>> bd01257e4147554426df5b3397fac0f8a4407c59
      <h5>Diese Seite wurde von Studenten erstellt</h5>
    </footer>
</html>

