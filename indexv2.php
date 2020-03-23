<?php

include 'config/connect.php'; //Verbinung SQL DB herstellen

if(isset($_POST['submit'])){
  //Wenn Submit und ID gefüllt
  $searchId = mysqli_real_escape_string($conn, $_POST['id']);
  if(!empty($searchId)){
      $sqlId = " id=$searchId";
  } else {
      $sqlId = ' 1';
  }
  $searchName = mysqli_real_escape_string($conn, $_POST['typ']);
  if(!empty($searchName)){
      $sqlName = " and typ like'%".$searchName."%'";
  } else {
      $sqlName = ' and 1';
  }
  $searchKapazitaet = mysqli_real_escape_string($conn, $_POST['kapazitaet']);
  if(!empty($searchKapazitaet)){
      $sqlKapazitaet = " and kapazitaet=$searchKapazitaet";
  } else {
      $sqlKapazitaet = ' and 1';
  }
  $sql = "SELECT * FROM batterie WHERE".$sqlId.$sqlName.$sqlKapazitaet;

}else{ //kein Submit ausgeführt
    $sql = "SELECT * FROM batterie";
    $searchId = '';
    $searchName = '';
    $searchKapazitaet = '';
}
echo $sql;
$result = mysqli_query($conn, $sql); //Ergebnis aus SQL DB
$data = mysqli_fetch_all($result, MYSQLI_ASSOC); //Ergebnis in Array-Form bringen
mysqli_free_result($result);
mysqli_close($conn);

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>my first PHP file </title>
    <link rel="stylesheet" href="index.css">
  </head>
  <body>
    <h1>Website</h1>
    <h4>Batteries!</h4>
    <form class="id_search" action="indexv2.php" method="POST">
     <label for="ID">ID</label> 
       <input type="number" name="id" value= <?php echo $searchId; ?>>
     <label for="Typ">Typ</label> 
       <input type="text" name="typ">
     <label for="kapazitaet">Kapazit&aumlt</label> 
       <input type="number" name="kapazitaet">
       <input type="submit" name="submit" value="submit" class='btn'>
    </form>
    <div class="container">
      <div class="row"></div>
	  <table style="table-layout:fixed">
	   <tr>
		  <th>ID </th>
		  <th>Typ</th>
		  <th>Kapazit&aumlt</th>
	   </tr>
        <?php foreach ($data as $dataset) { //Ausgabe der Suchergbnisse?> 
  	   <tr>
		  <td style="width:25%"><?php echo htmlspecialchars($dataset['id'])?></td>
		  <td style="width:25%"><?php echo htmlspecialchars($dataset['typ'])?></td>
		  <td style="width:25%"><?php echo htmlspecialchars($dataset['kapazitaet'])?></td>
		  <!--'  '. htmlspecialchars($dataset['typ']).'  '.htmlspecialchars($dataset['kapazitaet']).'</br>';?> -->
       </tr>
	   <?php } ?>
	   </table>
    </div>
  </body>
</html> 
 
