<?php 
session_start();
if(isset($_SESSION["login"])){
    if($_SESSION["login"]==1){


    include '../config/connect.php';
//     echo print_r($_POST);
    //$sepCol = implode(', ', $_POST['arrColumns']);
    $sepVal = implode("', '", $_POST['values']);
    $sepVal = "'".$sepVal."'";
    $sql = "INSERT INTO ".$_POST['tableName']." VALUES ($sepVal)";
    if (mysqli_query($conn, $sql)) {
        $mess= "New values added to database 'final_lit' into table '".
            $_POST['tableName']. "' successfully:". "<br><br>". $sepVal;
    } else {
        $mess= "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

?>
<div id="insertValues">
<label><?php echo $mess;?></label>
</div>
<?php }}?>