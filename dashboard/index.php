<?php
include 'config/connect.php'; //Verbinung SQL DB herstellen

  $sql = "SELECT sel_master.id as masterId, sel_master.nachruestsatz as masterNsatz, sel_master.nachruestart as masterNart, fahrzeug.label as fzgLabel, fahrzeug.sop_Date as fzgSop, batterieraum.label as brLabel, batterie.kapazitaet as baKapa, batterie.typ as baTyp, batterie.material as baMaterial, ausstattung.label as asLabel FROM (SELECT MASTER.nachruestart, MASTER.nachruestsatz, MASTER.fahrzeug, master.batterieraum, master.batterie, master.ausstattung, master.id FROM MASTER WHERE MASTER.fahrzeug IN (SELECT fahrzeug.id FROM fahrzeug WHERE 1) AND MASTER.batterieraum IN (SELECT batterieraum.id FROM batterieraum WHERE 1) AND MASTER.batterie IN (SELECT batterie.id FROM batterie WHERE 1)AND MASTER.ausstattung IN ( SELECT ausstattung.id FROM ausstattung WHERE 1)) AS sel_master, fahrzeug, batterieraum, batterie, ausstattung WHERE sel_master.fahrzeug = fahrzeug.id AND sel_master.batterieraum = batterieraum.id AND sel_master.batterie = batterie.id AND sel_master.ausstattung =ausstattung.id;";

  $result = mysqli_query($conn, $sql); //Ergebnis aus SQL DB
  $data = mysqli_fetch_all($result, MYSQLI_ASSOC); //Ergebnis in Array-Form bringen --> wird in output.php verwendet
 
  mysqli_free_result($result);
  mysqli_close($conn);
 $nSatzData = '';
include 'initial.php'; //Seitenaufbau der ersten Seite (ohne Nachladen)
?>
