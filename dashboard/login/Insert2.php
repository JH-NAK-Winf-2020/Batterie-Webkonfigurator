<?php 
include '../config/connect.php';
$result = $conn->query("SELECT table_name FROM information_schema.tables WHERE table_schema = 'final_lit'") or die($conn->error);
$result = mysqli_fetch_all($result, MYSQLI_ASSOC);
$getTable='';
if(isset($_POST["submitTable"]))
{
    if (empty($_POST["final_lit"])){ 
        $getTable='null!';
    }else {
        $getTable = $_POST["final_lit"];
        $columnsResult = $conn->query("SELECT column_name FROM information_schema.columns WHERE table_schema = 'final_lit' AND table_name = '$getTable'") or die($conn->error);
        $columnsResultData = mysqli_fetch_all($columnsResult, MYSQLI_ASSOC);
    }
}
if(isset($_POST["submitInsert"]))
{
    //get Array and Variable values from upper code
    $arrColumns1 = array();
    $getTable1 = $getTable;
    
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
        echo "New values added to database 'final_lit' into table '". $getTable1 . "' successfully:". "<br><br>". $sepVal;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" id="frame">

<head>
    <meta charset="utf-8">
    <title>Lithium-Ionen Webkonfigurator</title>
    <link rel="stylesheet" href="../css/insert.css?v=3">
</head>

<body>
<header>
    <h1>Lithium-Ionen Webkonfigurator f&uumlr Nachr&uumlsts&aumltze</h1> 
</header>

<form action="Insert2.php" method="POST">
<select class="select1" name="final_lit">
<option selected disabled>-- select table --</option>
<?php foreach($result as $resultSet){?>
<option value="<?php echo $resultSet['table_name']?>"><?php echo $resultSet['table_name']?></option>
<?php };?>

<br><br>
 </select>

<input class="input1" type = 'submit' name = 'submitTable' value = 'Select Table'/> <br><br>
</form>
<?php if($getTable=='NULL'){?>
<label>Please select a table!</label>
<?php }elseif($getTable!='' && $getTable !='NULL'){?>
<label>The selected table is: <?php echo $getTable;?></label>
<br>
<form action = 'insert2.php' method = 'POST'>

<?php foreach($columnsResultData as $columns){if ($columns['column_name'] == "id"){?>
<label for="<?php echo $columns['column_name'];?>"> <?php echo $columns['column_name'];?> </label> 
<br> 
<input type = 'text' name ="<?php echo $columns['column_name'];?>" disabled> 
<br>
<?php }else{?>
<label for="<?php echo $columns['column_name'];?>"> <?php echo $columns['column_name'];?> </label>
<br> 
<input type = 'text' name ="<?php echo $columns['column_name'];?>">  
<br>
<?php array_push($arrColumns, $columns['column_name']); }}?>

<input type = 'submit' name = 'submitInsert' value = 'Insert'/> <br><br>
</form>
<?php }?>

<div class="SelectTable">
</div>
</body>
</html>