<?php

include 'config/connect.php'; //Verbinung SQL DB herstellen 

$resultSet = $conn->query("SELECT table_name FROM information_schema.tables 
                            WHERE table_schema = 'batterie-nak'") or die($conn->error);
?>
<html>
<head>
</head>
<body> 
<center>
<form method ="POST">
<select name="batterie-nak">
<?php
echo "<option selected disabled>-- select table --</option>";
while($rows = $resultSet->fetch_assoc())
{
    $table_name=$rows['table_name'];
    echo "<option value=$table_name>$table_name</option>";
}
?>
<br><br>
</select> 
<input type = 'submit' name = 'submit' value = 'choose Table'/> <br><br>
</form>
<?php 
if(isset($_POST["submit"]))
{
    $getTable = $_POST["batterie-nak"];
    echo 'The selected table is: '.$getTable;
    
    echo "<br><br>";
    
    $columnsResult = $conn->query("SELECT column_name FROM information_schema.columns 
                    WHERE table_schema = 'batterie-nak'
                    AND table_name = '$getTable'") or die($conn->error);

    while($columns = $columnsResult->fetch_assoc())
    {
        $column_name=$columns['column_name'];
        echo "<label for=$column_name>$column_name</label> <input type = 'text' name = $column_name> <br><br>";
    }
    echo " <br><br> <input type = 'submit' value = 'Insert'>";
}
?>

</center>
</body>
</html>
