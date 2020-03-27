<?php
   function createSQLlike(String $spaltenName, String $inputValue){
     if(!empty($inputValue)){
       return  $spaltenName. " like '%" . $inputValue . "%'";
   } else {
       return '1';
   }
   }

  include 'config/connect.php'; //Verbinung SQL DB herstellen

  $masterID =  mysqli_real_escape_string($conn, $_POST['masterID']);
  echo $masterID;
  $sql = "SELECT nachruestart.label as nartLabel, nachruestsatz.label as nsatzLabel, nachruestsatz.kommentar as nsatzKomm FROM nachruestart, nachruestsatz WHERE nachruestart.id = (SELECT master.nachruestart FROM master WHERE master.id = $masterID) AND nachruestsatz.id = (SELECT master.nachruestsatz FROM master WHERE master.id = $masterID);";

  $nSatzResult = mysqli_query($conn, $sql); //Ergebnis aus SQL DB
  $nSatzData = mysqli_fetch_all($nSatzResult, MYSQLI_ASSOC); //Ergebnis in Array-Form bringen
  mysqli_free_result($nSatzResult); //Inhalte result loeschen
  mysqli_close($conn);  //close Connection

  include 'output_NSatz.php'; //Teil des zu erneuernden Contents -> Iteriert ueber $data
  
  ?>
