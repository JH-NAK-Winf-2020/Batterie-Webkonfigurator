<?php 
session_start();
if(isset($_SESSION["login"])){
    if($_SESSION["login"]==1){

    
    include '../config/connect.php';
    $sqlTables="SELECT table_name FROM information_schema.tables WHERE table_schema = 'final_lit'";
    $result= mysqli_query($conn, $sqlTables);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr" id="frame">

<head>
    <meta charset="utf-8">
    <title>Lithium-Ionen Webkonfigurator</title>
    <link rel="stylesheet" href="../css/insert.css?v=4">
</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"> </script>
    <script src="../script/insert.js?v=8"></script>
<header>
    <h1>Lithium-Ionen Webkonfigurator f&uumlr Nachr&uumlsts&aumltze</h1> 
</header>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="divselect1">
	<select class="select1" id="selectTable" name="selectTable" onChange="getTable();">
		<option selected disabled>-- select table --</option>
		<?php foreach($result as $resultSet){?>
		<option value="<?php echo $resultSet['table_name'];?>"><?php echo $resultSet['table_name'];?></option>
		<?php };?>
     </select>
      
            <hr class="Trennlinie"></hr>  
       </div>
<div class="divselect2" id="tableColums">
</div>
<div class="divselect3" id="insertValues">
</div>

</body>
<footer>
    <h5>VK-LCS</h5>
     <a class="login" href="logout.php">Ausloggen</a>
    </footer>
</html>
<?php }}else{header('Location: login-formular.html');}?>