<?php
//Bereitstellung der Daten fuer Ausgabe der nsatzTable, Mittels der masterID wird auf div. Tabellen zugegriffen...
include './../include/class/db_masterID.php';
//MasterID des gewählten Eintrags in InfoTable- entspricht der ID in Tabelle master, um ausgewählte Kombinatino eindeutig zu identifizieren
$masterID = $_POST['masterID'];
//Tabelle Nachruestsatz
$Nsatz = new DB_MasterID();
$dataNsatz = $Nsatz->getNsatz($masterID);
//Tabelle nachruestsatzdetail
$Ndetail = new DB_MasterID();
$dataNdetail = $Ndetail->getNdetail($masterID);
//Tabelle zusatzinfo
$Zusatz = new DB_MasterID();
$dataZusatz = $Zusatz->getZusatz($masterID);
//Tabelle ladegeraet
$Ladeg = new DB_MasterID();
$dataLadeg = $Ladeg->getLadeg($masterID);
//Tabelle ladegeraetOption
$Ladeoption = new DB_MasterID();
$dataLadeoption = $Ladeoption->getLadeoption($masterID);
//Tabelle Nachruestart
$Nart = new DB_MasterID();
$dataNart = $Nart->getNart($masterID);
//Tabelle ausstattung
$AuMaterial = new DB_MasterID();
$dataAuMaterial = $AuMaterial->getAuMaterial($masterID);
//Tabelle zusatzinfo
$ZusatzInfo = new DB_MasterID();
$dataZusatzInfo = $ZusatzInfo->getZusatzInfo($masterID);
//Tabelle Batterie
$BaMaterial = new DB_MasterID();
$dataBaMaterial = $BaMaterial->getBaMaterial($masterID);
//herrausfiltern der NULL-Eintraege fuer Batterie
if ($dataBaMaterial[0]['baMaterial'] == '' && $dataBaMaterial[0]['baTyp'] == ''){
    $dataBaMaterial='';
};
//Tabelle Fahrzeug
$Fzg = new DB_MasterID();
$dataFzg = $Fzg->getFzg($masterID);
//Tabelle Ausstattung
$AuLabel = new DB_MasterID();
$dataAuLabel = $AuLabel->getAuLabel($masterID);
//Zurücksetzen der Variable, welche Materialnummern in Textfeld neben der Tabelle ausgibt
unset($matnrListe);
$matnrListe = array();

//AUSGABE in Tabelle
?>
<html>

<div Id="NsatzDiv" style="float: right">
	<table>
	<tr>
	<td>
	<main>
	<table class="MatnrAusgabe scroll"> 
		<thead>	
			<caption><?php foreach($dataNart as $datasetNart){echo $datasetNart['naLabel'];};?></caption>
		</thead>			
		<tbody>
		
		<tr>
			<th scope="row>">f&uumlr Fahrzeug:</th>
			<?php if(!empty($dataFzg)){?>
			<?php foreach($dataFzg as $datasetFzg){?>
					<td><?php echo $datasetFzg['fzgLabel'];//$datasetFzg['fzgLabel']; ?></td>
					<td><?php echo $datasetFzg['fzgSop']; ?></td>
					<td><?php echo $datasetFzg['baLabel']; ?></td>
				
			<?php };}else{?>
					<td colspan="3">- kein Fahrzeug ausgewaehlt -</td>
			<?php };?>
		</tr>
		
		<?php if(!empty($dataAuLabel)){?>
		<tr>
			<th rowspan="<?php echo count($dataAuLabel); ?>" scope="row>">f&uumlr Ausstattung: </th>
			<?php foreach($dataAuMaterial as $datasetAuMaterial){ //<td colspan='1'><?php echo $datasetAuMaterial['auMaterial'];</td>?>
			<?php };?>
			<?php foreach($dataAuLabel as $datasetAuLabel){?>
			<td colspan='3'><?php echo $datasetAuLabel['auLabel'];?></td>
			<?php };?>
		</tr>
		<?php };?>
		
		<?php if(empty($dataNsatz)){?>
	  	<tr>
			<th scope="row>">Nachr&uumlstsatz</th>				
	  		<td colspan="3">- kein Nachruestsatz vorhanden -</td>
		</tr>
		<?php }else{ foreach($dataNsatz as $datasetNsatz){?>
		<tr>
			<th scope="row>">Nachr&uumlstsatz</th>					
			<td><?php echo $datasetNsatz['nsatzMaterial']; array_push($matnrListe, $datasetNsatz['nsatzMaterial']);?></td>
			<td><?php echo $datasetNsatz['nsatzLabel']; ?></td>
			<td><?php echo $datasetNsatz['nsatzKomm']; ?></td>
		</tr>
		<?php };?>

		<?php if(!empty($dataNdetail)){?>
		<tr>
			<th rowspan="<?php echo count($dataNdetail); ?>" scope="row>">Details</th>	
		<?php foreach($dataNdetail as $datasetNdetail){?>
			<td><?php echo $datasetNdetail['ndetailMaterial'];array_push($matnrListe, $datasetNdetail['ndetailMaterial']); ?></td>
			<td colspan="2"><?php echo $datasetNdetail['ndetailLabel']; ?></td>
		</tr>
		<?php };};?>
	
		<?php if(!empty($dataBaMaterial)){?>
		<tr>
			<th rowspan="<?php echo count($dataBaMaterial); ?>" scope="row>">Batterie</th>	
		<?php foreach($dataBaMaterial as $datasetBaMaterial){?>
			<td><?php echo $datasetBaMaterial['baMaterial']; array_push($matnrListe, $datasetBaMaterial['baMaterial']); ?></td>
			<td colspan="1"><?php echo $datasetBaMaterial['baTyp']; ?></td>
			<td colspan="1"><?php echo $datasetBaMaterial['baKapa']. 'Ah'; ?></td>
		</tr>
		<?php };};?>

		<?php if(!empty($dataZusatz)){?>
		<tr>
			<th rowspan="<?php echo count($dataZusatz); ?>" scope="row>">Zusatzmaterial</th>
			<?php foreach($dataZusatz as $datasetZusatz){?>
			<td><?php echo $datasetZusatz['zuMaterial']; array_push($matnrListe, $datasetZusatz['zuMaterial']); ?></td>
			<td><?php echo $datasetZusatz['zuLabel']; ?></td>
			<td><?php echo $datasetZusatz['zuHinweis']; ?></td>
		</tr>
		<?php };};?>
	


		<?php if(!empty($dataZusatzInfo)){?>
		<tr>
			<th rowspan="<?php echo count($dataZusatzInfo); ?>" scope="row>">Zusatzinfo</th>
			<?php foreach($dataZusatzInfo as $datasetZusatzInfo){?>
			<td colspan='2'><?php echo $datasetZusatzInfo['zuText'];?></td>
			<td colspan='1'><?php echo $datasetZusatzInfo['zuArt'];?></td>
		</tr>
		<?php };};?>
		
		<?php };//closing tag sobald ein nachruest vorhanden?>
	</tbody>
	</table>
	</main>
	</td>
	<td style="min-width:200px; position: relative;">
		<label style="position:absolute;top:45px;left:0px;" >Materialnummern:</label>
		<label style="position:absolute;top:45px;left:125px;" id="infoMatNr" name="infoMatNr" onClick="getInfoMatNr()">&#x1F6C8;</label> <?php //Infobutton neben Zugangssystem?>
		</br>

			<textarea id="matnrAusgabe"><?php foreach($matnrListe as $matnr){echo $matnr . '&#13;&#10;';};?></textarea>

	</td>
</tr>
</table>
</div>

<div class="LadeAusgabe">
	<table Id="LadeTable" class="fixed-header InfoTable scroll">
		<thead>
		<tr>
			<th colspan="3">Ladeger&aumlte</th>
		</tr>
		</thead>
		<tbody>
	<?php if(!empty($dataLadeg)){?>
	<?php foreach($dataLadeg as $datasetLadeg){?>
			<tr>
				<td><?php echo $datasetLadeg['laMaterial']; ?></td>
				<td><?php echo $datasetLadeg['laLabel']; ?></td>
				<td><?php echo $datasetLadeg['laKlasse']; ?></td>
			</tr>
	<?php }}else{?>
	    	<tr>
				<td colspan="3"><?php echo "kein Ladegeraet vorhanden"; ?></td>
			</tr>
	<?php };?>
	
	<?php if(!empty($dataLadeoption)){?>
	<?php foreach($dataLadeoption as $datasetLadeoption){?>
			<tr>
				<td><?php echo $datasetLadeoption['loMaterial']; ?></td>
				<td><?php echo $datasetLadeoption['loLabel']; ?></td>
				<td><?php echo $datasetLadeoption['loKomm']; ?></td>
			</tr>
	<?php }}else{?>
		    <tr>
				<td colspan="3"><?php echo "keine Ladegeraet-Option vorhanden"; ?></td>
			</tr>
	<?php };?>
	</tbody>
	</table>
</div>
</html>