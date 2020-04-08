<?php 
session_start();
if(isset($_SESSION["login"])){
    if($_SESSION["login"]==1){
        
include '../config/connect.php';
if (empty($_POST["tableName"])){
    $getTable='NULL';
}else {
    $getTable = $_POST["tableName"];
    $columnsResult = $conn->query("SELECT column_name FROM information_schema.columns WHERE table_schema = 'final_lit' AND table_name = '$getTable'") or die($conn->error);
    $columnsResultData = mysqli_fetch_all($columnsResult, MYSQLI_ASSOC);
    $arrColumns=array();
    foreach($columnsResultData as $columns){
        array_push($arrColumns, $columns['column_name']); 
    }
}

?>
<div id="tableColums">
	<?php if($getTable=='NULL'){?>
	<label class="select2">Please select a table!</label>
	<?php }elseif($getTable!='' && $getTable !='NULL'){?>
	<label class="select2">The selected table is: <?php echo $getTable;?></label><br>
	
	
	<?php foreach($columnsResultData as $columns){if ($columns['column_name'] == "id"){?>
		<label for="<?php echo $columns['column_name'];?>"> <?php echo $columns['column_name'];?> </label> 
		<br> 
		<input type = 'text' name ="<?php echo $columns['column_name'];?>" id ="<?php echo $columns['column_name'];?>" disabled> 
		<br>
	<?php }else{?>
		<label for="<?php echo $columns['column_name'];?>"> <?php echo $columns['column_name'];?> </label>
		<br> 
		<input type = 'text' name ="<?php echo $columns['column_name'];?>" id ="<?php echo $columns['column_name'];?>">  
		<br>
		<?php }}?>
		<br><input type = 'submit' name = 'submitInsert' value = 'Insert' onClick='pushValues("<?php echo $getTable;?>", <?php echo json_encode($arrColumns);?>)'/>
	<?php };//END elseif zeile 15?>
</div>
<?php }}else{header('Location: login-formular.html');}?>