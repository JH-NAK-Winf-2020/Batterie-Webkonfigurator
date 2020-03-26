<?php
include 'config/connect.php'; //Verbinung SQL DB herstellen

//Werte initialisieren fuer 1. korrekte Darstellung --> Input.php
  $searchId='';
  $searchTyp='';
  $searchKapazitaet='';

//Werte fu 1. Ausgabe generieren
  //$sql = "SELECT fahrzeug.label as fzgLabel, fahrzeug.sop as fzgSop, batterieraum.label as brLabel FROM fahrzeug, batterieraum WHERE 1"; //Initale Darstellung aller Ergebnisse
  $sql3 = "SELECT fahrzeug.label as fzgLabel, fahrzeug.sop_Date as fzgSop, batterieraum.label as brLabel, batterie.kapazitaet as baKapa, batterie.typ as baTyp, batterie.material as baMaterial FROM (SELECT MASTER.nachruestart, MASTER.nachruestsatz, MASTER.fahrzeug, master.batterieraum, master.batterie FROM MASTER WHERE MASTER.fahrzeug IN (SELECT fahrzeug.id FROM fahrzeug WHERE 1) AND MASTER.batterieraum IN (SELECT batterieraum.id FROM batterieraum WHERE 1) AND MASTER.batterie IN (SELECT batterie.id FROM batterie WHERE 1)) AS sel_master, fahrzeug, batterieraum, batterie WHERE sel_master.fahrzeug = fahrzeug.id AND sel_master.batterieraum = batterieraum.id AND sel_master.batterie = batterie.id";
  
  $result = mysqli_query($conn, $sql3); //Ergebnis aus SQL DB
  $data = mysqli_fetch_all($result, MYSQLI_ASSOC); //Ergebnis in Array-Form bringen --> wird in output.php verwendet
 
  mysqli_free_result($result);
  mysqli_close($conn);

include 'initial.php'; //Seitenaufbau der ersten Seite (ohne Nachladen)
?>
