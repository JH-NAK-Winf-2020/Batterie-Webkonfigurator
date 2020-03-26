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

  $where = $sqlFzgLabel.$sqlFzgSop.$sqlBrLabel; //Zusammensetzen des WhereStatements
  
  //$sql = "SELECT fahrzeug.label as fzgLabel, fahrzeug.sop as fzgSop, batterieraum.label as brLabel FROM fahrzeug, batterieraum WHERE".$where;
  //$sql2 = "SELECT distinct fahrzeug.label as fzgLabel, fahrzeug.sop_Date as fzgSop, batterieraum.label as brLabel FROM (SELECT MASTER.nachruestart, MASTER.nachruestsatz, MASTER.fahrzeug, master.batterieraum FROM MASTER WHERE MASTER.fahrzeug IN (SELECT fahrzeug.id FROM fahrzeug WHERE $sqlFzgLabel) AND MASTER.fahrzeug IN (SELECT fahrzeug.id FROM fahrzeug WHERE $sqlFzgSop) AND MASTER.batterieraum IN (SELECT batterieraum.id FROM batterieraum WHERE $sqlBrLabel)) AS temp, fahrzeug, batterieraum WHERE temp.fahrzeug = fahrzeug.id AND temp.batterieraum = batterieraum.id;";
  //$sql3 = "SELECT distinct fahrzeug.label as fzgLabel, fahrzeug.sop_Date as fzgSop, batterieraum.label as brLabel, batterie.kapazitaet as baKapa, batterie.typ as baTyp, batterie.material as baMaterial FROM (SELECT MASTER.nachruestart, MASTER.nachruestsatz, MASTER.fahrzeug, master.batterieraum, master.batterie FROM MASTER WHERE MASTER.fahrzeug IN (SELECT fahrzeug.id FROM fahrzeug WHERE $sqlFzgLabel AND $sqlFzgSop) AND MASTER.batterieraum IN (SELECT batterieraum.id FROM batterieraum WHERE $sqlBrLabel) AND MASTER.batterie IN (SELECT batterie.id FROM batterie WHERE $sqlBaKapa AND $sqlBaTyp)) AS sel_master, fahrzeug, batterieraum, batterie WHERE sel_master.fahrzeug = fahrzeug.id AND sel_master.batterieraum = batterieraum.id AND sel_master.batterie = batterie.id";
  $sql4 = "SELECT sel_master.id as masterId, sel_master.nachruestsatz as masterNsatz, sel_master.nachruestart as masterNart, fahrzeug.label as fzgLabel, fahrzeug.sop_Date as fzgSop, batterieraum.label as brLabel, batterie.kapazitaet as baKapa, batterie.typ as baTyp, batterie.material as baMaterial, ausstattung.label as asLabel FROM (SELECT MASTER.nachruestart, MASTER.nachruestsatz, MASTER.fahrzeug, master.batterieraum, master.batterie, master.ausstattung, master.id FROM MASTER WHERE MASTER.fahrzeug IN (SELECT fahrzeug.id FROM fahrzeug WHERE fahrzeug.label LIKE '%ECE 220%' AND fahrzeug.sop LIKE '%13121568%') AND MASTER.batterieraum IN (SELECT batterieraum.id FROM batterieraum WHERE batterieraum.label LIKE '%L%') AND MASTER.batterie IN (SELECT batterie.id FROM batterie WHERE batterie.kapazitaet LIKE '%%' AND batterie.typ LIKE '%%')AND MASTER.ausstattung IN ( SELECT ausstattung.id FROM ausstattung WHERE ausstattung.label LIKE '%%')) AS sel_master, fahrzeug, batterieraum, batterie, ausstattung WHERE sel_master.fahrzeug = fahrzeug.id AND sel_master.batterieraum = batterieraum.id AND sel_master.batterie = batterie.id AND sel_master.ausstattung =ausstattung.id;";

  $result = mysqli_query($conn, $sql3); //Ergebnis aus SQL DB
  $data = mysqli_fetch_all($result, MYSQLI_ASSOC); //Ergebnis in Array-Form bringen
  mysqli_free_result($result); //Inhalte result loeschen
  mysqli_close($conn);  //close Connection

  include 'output.php'; //Teil des zu erneuernden Contents -> Iteriert ueber $data
  
  ?>
