<?php
include './include/class/db_input.php';
    //Daten für InfoTable --> Anzeigen aller Werte
    $firstOutput = new DB_Result();
    $data = $firstOutput->initialOutput();
    //Daten für Baujahr
    $initialFzgSop = new DB_Result();
    $optionsFzgSop = $initialFzgSop->getOptionsDropDown('fzgSop','all','','','','','','');
    //Daten für DropDown BatterieRaum
    $initialBrLabel = new DB_Result();
    $optionsBrLabel = $initialBrLabel->getOptionsDropDown('brLabel','all','','','','','','');
    //Daten für DropDown BatterieKapazitaet
    $initialBaKapa = new DB_Result();
    $optionsBaKapa = $initialBaKapa->getOptionsDropDown('baKapa','all','','','','','','');
    //Daten für DropDown BatterieTyp
    $initialBaTyp = new DB_Result();
    $optionsBaTyp = $initialBaTyp->getOptionsDropDown('baTyp','all','','','','','','');
    
    $nSatzData = '';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" id="frame">

  <head>
    <meta charset="utf-8">
    <title>Lithium-Ionen Webkonfigurator</title>
    <link rel="stylesheet" href="./css/master.css?v=91">
    <meta name="viewport" content="max-device-width, initial-scale=1">

  </head>

<body>
  <header>
    <h1>Lithium-Ionen Webkonfigurator f&uumlr Nachr&uumlsts&aumltze</h1>
  </header>

    <?php include './input/input.php'; ?>
    <div id="outputNSatz"> </div>
    <?php include './infoTable/output_infoTable.php';?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"> </script>
    <script src="./script/main.js?v=15"></script>
</body>


    

  <footer>
      <h5>VK-LCS</h5>
      <a class="login" href="login/login-formular.html">Zum Login</a>
  </footer>
</html>
    
 