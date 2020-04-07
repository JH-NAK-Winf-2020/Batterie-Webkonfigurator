<?php 
//Class enthält alle Statements, die aus dem Füllen der Input felder die Ausgabe beeinflussen(InfoTable)
	class DB_result{
		private $fzgLabel;
		private $fzgSop;
		private $brLabel;
		private $baKapa;
		private $baTyp;
		private $asLabel;
		//da aus verschiedenen Orten auf DB zugegriffen werden muss, muss ein absoluterPfad angegeben werden, bitte beim Umziehen ändern
		private $includePATH = '/git/dashboard/config/connect.php';
//function zum generieren einer Where-Klausel mit Like Operator auf Basis des Spaltennamens und eingegeben Values
   function createSQLlike($spaltenName, $inputValue){
    if($inputValue != ''){
        //filtern nach entsprechender funktion
		 $test = $spaltenName . " like '%" . $inputValue . "%'";		
		 return $test;
   	} else {
       	return '1';
	}
   }
//function zum generieren einer Where-Klausel mit '=' Operator auf Basis des Spaltennamens und eingegeben Values
	function createSQLequal($spaltenName, $inputValue){
	    if($inputValue == '(leer)'){
	        //wenn Felder in der DB mit NULL angegeben sind
	        $whereStatement = $spaltenName . " is NULL";
	        return $whereStatement;
	    }elseif($inputValue == 'all'){
	        //User möchte keine Eintraege filtern
	        return '1';
	    }elseif($inputValue == ''){
	       return '1';
	    }else{
	        //Filtern nach einer Option
	        $whereStatement = $spaltenName . " = '" . $inputValue . "'";
	        return $whereStatement;
	    }
	}

	function passSqlToDb2($sql){
	    //Weitergabe des SQL Statements an DB
	    include $_SERVER['DOCUMENT_ROOT']. $this->includePATH;
		$result = mysqli_query($conn, $sql);
		$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		mysqli_close($conn);
		return $data;
	}

   function getFullResult($fzgLabel, $fzgSop, $brLabel, $baKapa, $baTyp, $asLabel){
       //Generiert alle Möglichen Kombinationen unter berücksichtigung der eingegebenen Filterwerte
	   		$this->fzgLabel = $fzgLabel;
			$this->fzgSop = $fzgSop;
			$this->brLabel = $brLabel;
			$this->baKapa = $baKapa;
			$this->baTyp = $baTyp;
			$this->asLabel = $asLabel;

	   include $_SERVER['DOCUMENT_ROOT']. $this->includePATH;
	   //Anpassung der WhereStatements, die später ins SQL Statement eingesetzt werden 
	   	$sqlFzgLabel = $this->createSQLlike('fahrzeug.label', mysqli_real_escape_string($conn, $this->fzgLabel));
  		$sqlFzgSop = $this->createSQLequal('fahrzeug.sop_Date', mysqli_real_escape_string($conn, $this->fzgSop));
  		$sqlBrLabel = $this->createSQLequal('batterieraum.label', mysqli_real_escape_string($conn, $this->brLabel));
  		$sqlBaKapa = $this->createSQLequal('batterie.kapazitaet', mysqli_real_escape_string($conn, $this->baKapa));
  		$sqlBaTyp = $this->createSQLequal('batterie.typ', mysqli_real_escape_string($conn, $this->baTyp));
  		$sqlAsLabel = $this->createSQLlike('ausstattung.label', mysqli_real_escape_string($conn, $this->asLabel));
		mysqli_close($conn);
		//Gibt alle Möglichen kombinationen mit obigen Where Statements aus
		$sql = "SELECT sel_master.id as masterId, sel_master.nachruestsatz as masterNsatz, sel_master.nachruestart as masterNart, fahrzeug.label as fzgLabel, fahrzeug.sop_Date as fzgSop, batterieraum.label as brLabel, batterie.kapazitaet as baKapa, batterie.typ as baTyp, batterie.material as baMaterial, ausstattung.label as asLabel FROM (SELECT MASTER.nachruestart, MASTER.nachruestsatz, MASTER.fahrzeug, master.batterieraum, master.batterie, master.ausstattung, master.id FROM MASTER WHERE MASTER.fahrzeug IN (SELECT fahrzeug.id FROM fahrzeug WHERE $sqlFzgLabel AND $sqlFzgSop) AND MASTER.batterieraum IN (SELECT batterieraum.id FROM batterieraum WHERE $sqlBrLabel) AND MASTER.batterie IN (SELECT batterie.id FROM batterie WHERE $sqlBaKapa AND $sqlBaTyp)AND MASTER.ausstattung IN ( SELECT ausstattung.id FROM ausstattung WHERE $sqlAsLabel)) AS sel_master, fahrzeug, batterieraum, batterie, ausstattung WHERE sel_master.fahrzeug = fahrzeug.id AND sel_master.batterieraum = batterieraum.id AND sel_master.batterie = batterie.id AND sel_master.ausstattung =ausstattung.id;";  
		$data = $this->passSqlToDb2($sql);
		return $data;
   }

   function getNSatz($masterID){
       //Nachruestsatz  von masterID
       include $_SERVER['DOCUMENT_ROOT']. $this->includePATH;
	   $masterID =  mysqli_real_escape_string($conn, $masterID);
	   mysqli_close($conn);
		$sqlCheckNsatz = "SELECT master.nachruestsatz as masterNsatz FROM master WHERE master.id = $masterID";
		$checkResult = $this->passSqlToDb2($sqlCheckNsatz);
		
        //nicht für alle Kombinationen sind nachruestsatz geplegt, deshalb hier eine Unterscheidung
	if($checkResult[0]['masterNsatz']== ''){
  		//kein Nachruestsatzvorhanden
    	$sql = "SELECT nachruestart.label as nartLabel FROM nachruestart WHERE nachruestart.id = (SELECT master.nachruestart FROM master WHERE master.id = $masterID)";
  	}else{
  		//Nachruestsatzvorhanden
    	$sql = "SELECT nachruestart.label as nartLabel, nachruestsatz.label as nsatzLabel, nachruestsatz.kommentar as nsatzKomm FROM nachruestart, nachruestsatz WHERE nachruestart.id = (SELECT master.nachruestart FROM master WHERE master.id = $masterID) AND nachruestsatz.id = (SELECT master.nachruestsatz FROM master WHERE master.id = $masterID);";
  	}
	  $data = $this->passSqlToDb2($sql);
	  return $data;
   }

   function getOptionsFzgSop($fzgLabel, $fzgSop, $brLabel, $baKapa, $baTyp, $asLabel){
       //DropDownOption fuer Baujahr
       return $this->getOptionsDropDown('fzgSop', $fzgSop, $fzgLabel, $fzgSop, $brLabel, $baKapa, $baTyp, $asLabel);
   }
   function getOptionsBrLabel($fzgLabel, $fzgSop, $brLabel, $baKapa, $baTyp, $asLabel){
       //DropDownOption fuer Batterieraum
       return $this->getOptionsDropDown('brLabel', $brLabel, $fzgLabel, $fzgSop, $brLabel, $baKapa, $baTyp, $asLabel);
   }
   function getOptionsBaKapa($fzgLabel, $fzgSop, $brLabel, $baKapa, $baTyp, $asLabel){
       //DropDownOption fuer Batteriekapazitaet
       return $this->getOptionsDropDown('baKapa', $baKapa, $fzgLabel, $fzgSop, $brLabel, $baKapa, $baTyp, $asLabel);
   }
   function getOptionsBaTyp($fzgLabel, $fzgSop, $brLabel, $baKapa, $baTyp, $asLabel){
       //DropDownOption fuer Batterietyp
       return $this->getOptionsDropDown('baTyp', $baTyp, $fzgLabel, $fzgSop, $brLabel, $baKapa, $baTyp, $asLabel);
   }
   function getOptionsDropDown($columnName, $value, $fzgLabel, $fzgSop, $brLabel, $baKapa, $baTyp, $asLabel){
       //alle momentan ausgegebenen daten
       $currOutput = $this->getFullResult($fzgLabel, $fzgSop, $brLabel, $baKapa, $baTyp, $asLabel);
       
       //Array mit allen möglichen Optionen aus Array füllen
       unset($allOptions);
       $allOptions = array();
       array_push($allOptions, $value);
       array_push($allOptions, 'all');
       foreach($currOutput as $currOutputSet){
           array_push($allOptions,$currOutputSet[$columnName]);
       }
       //alle doppelt existierenden Optionen löschen
       $allOptions = array_merge(array_unique($allOptions));
       //Wenn in einer Option ein leerer Eintrag existiert, dann diesen mit '(leer)' fuellen
       //So ist das filtern nach leeren Werten(NULL) möglich und es kann zwischen es wird nach keinem Wert gefiltert und es wird nach leer gefiltert unterschieden werden
       $emptyKey='x';
       foreach($allOptions as $key => $value){
           if(empty($value)){$emptyKey = $key;};
       };
       if($emptyKey != 'x'){$allOptions[$emptyKey]='(leer)';};
       
       //return
       return array_unique($allOptions);
   }
   function initialOutput(){
       //dieses Statement stellt alle nachruestsätze ohne einschränkungen dar 
       $sql = "SELECT sel_master.id as masterId, sel_master.nachruestsatz as masterNsatz, sel_master.nachruestart as masterNart, fahrzeug.label as fzgLabel, fahrzeug.sop_Date as fzgSop, batterieraum.label as brLabel, batterie.kapazitaet as baKapa, batterie.typ as baTyp, batterie.material as baMaterial, ausstattung.label as asLabel FROM (SELECT MASTER.nachruestart, MASTER.nachruestsatz, MASTER.fahrzeug, master.batterieraum, master.batterie, master.ausstattung, master.id FROM MASTER WHERE MASTER.fahrzeug IN (SELECT fahrzeug.id FROM fahrzeug WHERE 1) AND MASTER.batterieraum IN (SELECT batterieraum.id FROM batterieraum WHERE 1) AND MASTER.batterie IN (SELECT batterie.id FROM batterie WHERE 1)AND MASTER.ausstattung IN ( SELECT ausstattung.id FROM ausstattung WHERE 1)) AS sel_master, fahrzeug, batterieraum, batterie, ausstattung WHERE sel_master.fahrzeug = fahrzeug.id AND sel_master.batterieraum = batterieraum.id AND sel_master.batterie = batterie.id AND sel_master.ausstattung =ausstattung.id;";
	   return $this->passSqlToDb2($sql);
   }
}
  ?>
