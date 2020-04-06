<?php
include './include/class/db_input.php';
    $NULL='(leer)';
    $firstOutput = new DB_Result();
    $data = $firstOutput->initialOutput();
    $initialFzgSop = new DB_Result();
    $optionsFzgSop = $initialFzgSop->getOptionsDropDown('fzgSop','all','','','','','','');
    $initialBrLabel = new DB_Result();
    $optionsBrLabel = $initialBrLabel->getOptionsDropDown('brLabel','all','','','','','','');
    $initialBaKapa = new DB_Result();
    $optionsBaKapa = $initialBaKapa->getOptionsDropDown('baKapa','all','','','','','','');
    $initialBaTyp = new DB_Result();
    $optionsBaTyp = $initialBaTyp->getOptionsDropDown('baTyp','all','','','','','','');
    $nSatzData = '';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" id="frame">

  <head>
    <meta charset="utf-8">
    <title>Lithium-Ionen Webkonfigurator</title>
    <link rel="stylesheet" href="./css/master.css?v=88">
    <meta name="viewport" content="max-device-width, initial-scale=1">

  </head>

<body>
  <header>
    
    <h1>Lithium-Ionen Webkonfigurator f&uumlr Nachr&uumlsts&aumltze</h1>
    <form action="./login.php" method="POST">
      <!--<input type="submit" id="login" value="Login" class="button" onClick="insert.php">-->
    </form>
  </header>

    <?php include './input/input.php' ?>
    <div id="outputNSatz"> </div>
    <?php include './infoTable/output_infoTable.php';?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"> </script>
    <script src="./script/main.js?v=13"></script>
</body>


    

  <footer>
      <h5>Diese Seite wurde von Studenten erstellt</h5>
  </footer>
</html>
    
 