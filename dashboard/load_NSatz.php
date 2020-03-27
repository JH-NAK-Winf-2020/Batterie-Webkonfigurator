<?php
   function createSQLlike(String $spaltenName, String $inputValue){
     if(!empty($inputValue)){
       return  $spaltenName. " like '%" . $inputValue . "%'";
   } else {
       return '1';
   }
   }

  include 'config/connect.php'; //Verbinung SQL DB herstellen

  $masterID = '4';

  $sql = "SELECT nachruestart.label, nachruestsatz.label, nachruestsatz.kommentar FROM nachruestart, nachruestsatz WHERE nachruestart.id = (SELECT master.nachruestart FROM master WHERE master.id = $masterID) AND nachruestsatz.id = (SELECT master.nachruestsatz FROM master WHERE master.id = $masterID);";

  $nSatzResult = mysqli_query($conn, $sql); //Ergebnis aus SQL DB
  $nSatzData = mysqli_fetch_all($nSatzResult, MYSQLI_ASSOC); //Ergebnis in Array-Form bringen
  mysqli_free_result($nSatzData); //Inhalte result loeschen
  mysqli_close($conn);  //close Connection

  include 'output_NSatz.php'; //Teil des zu erneuernden Contents -> Iteriert ueber $data
  
  ?>
