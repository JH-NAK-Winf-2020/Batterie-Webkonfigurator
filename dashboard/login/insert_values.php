<?php 
session_start();//muss gestatet werden, da seite neu geladen und nciht nur includiert wurde
if(isset($_SESSION["login"])){
    if($_SESSION["login"]==1){
    //wenn user eingeloggt

    include '../config/connect.php';
//     echo print_r($_POST);
    //$sepCol = implode(', ', $_POST['arrColumns']);
    $sepVal = implode("', '", $_POST['values']);
    $sepVal = "'".$sepVal."'";      //Verschieden eingegebene Werte werden in String format für das SQL statement gebracht
    $sql = "INSERT INTO ".$_POST['tableName']." VALUES ($sepVal)";
    if (mysqli_query($conn, $sql)) {
        $mess= "New values added to database 'final_lit' into table '".
            $_POST['tableName']. "' successfully:". "<br><br>". $sepVal; //Wenn Einfügen erfolgreich ist
    } else {
        $mess= "Error: " . $sql . "<br>" . mysqli_error($conn); //wenn einfügen nicht erfolgreich ist
    }

?>
<div id="insertValues">
<label><?php echo $mess;?></label>
<hr class="Trennlinie2">
<input type="submit" name="new" value="neuen Wert" onClick="window.location.href = 'insert3.php'">
</div>
<?php }}else{header('Location: login-formular.html');//user nicht eingeloggt}?>