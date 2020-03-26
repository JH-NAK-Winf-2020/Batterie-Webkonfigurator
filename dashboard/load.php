<?php
   function createSQLlike(String $spaltenName, String $inputValue){
     if(!empty($inputValue)){
       return  $spaltenName. " like '%" . $inputValue . "%'";
   } else {
       return '1';
   }
   }

  include 'config/connect.php'; //Verbinung SQL DB herstellen

  $sqlFzgLabel = createSQLlike('fahrzeug.label', mysqli_real_escape_string($conn, $_POST['fzgLabel']));
  $sqlFzgSop = createSQLlike('fahrzeug.sop_Date', mysqli_real_escape_string($conn, $_POST['fzgSop']));
  $sqlBrLabel = createSQLlike('batterieraum.label', mysqli_real_escape_string($conn, $_POST['brLabel']));
  $sqlBaKapa = createSQLlike('batterie.kapazitaet', mysqli_real_escape_string($conn, $_POST['baKapa']));
  $sqlBaTyp = createSQLlike('batterie.typ', mysqli_real_escape_string($conn, $_POST['baTyp']));
  $sqlBaMaterial = createSQLlike('batterie.material', mysqli_real_escape_string($conn, $_POST['baMaterial']));
  $sqlAsLabel = createSQLlike('ausstattung.label', mysqli_real_escape_string($conn, $_POST['asLabel']));

  $sql = "SELECT sel_master.id as masterId, sel_master.nachruestsatz as masterNsatz, sel_master.nachruestart as masterNart, fahrzeug.label as fzgLabel, fahrzeug.sop_Date as fzgSop, batterieraum.label as brLabel, batterie.kapazitaet as baKapa, batterie.typ as baTyp, batterie.material as baMaterial, ausstattung.label as asLabel FROM (SELECT MASTER.nachruestart, MASTER.nachruestsatz, MASTER.fahrzeug, master.batterieraum, master.batterie, master.ausstattung, master.id FROM MASTER WHERE MASTER.fahrzeug IN (SELECT fahrzeug.id FROM fahrzeug WHERE $sqlFzgLabel AND $sqlFzgSop) AND MASTER.batterieraum IN (SELECT batterieraum.id FROM batterieraum WHERE $sqlBrLabel) AND MASTER.batterie IN (SELECT batterie.id FROM batterie WHERE $sqlBaKapa AND $sqlBaTyp)AND MASTER.ausstattung IN ( SELECT ausstattung.id FROM ausstattung WHERE $sqlAsLabel)) AS sel_master, fahrzeug, batterieraum, batterie, ausstattung WHERE sel_master.fahrzeug = fahrzeug.id AND sel_master.batterieraum = batterieraum.id AND sel_master.batterie = batterie.id AND sel_master.ausstattung =ausstattung.id;";

  $result = mysqli_query($conn, $sql); //Ergebnis aus SQL DB
  $data = mysqli_fetch_all($result, MYSQLI_ASSOC); //Ergebnis in Array-Form bringen
  mysqli_free_result($result); //Inhalte result loeschen
  mysqli_close($conn);  //close Connection

  include 'output.php'; //Teil des zu erneuernden Contents -> Iteriert ueber $data
  
  ?>
