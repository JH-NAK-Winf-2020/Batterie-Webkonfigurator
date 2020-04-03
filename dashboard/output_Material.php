<?php
include 'db_masterID.php';
$masterID = $_POST['masterID'];
$Nsatz = new DB_MasterID();
$dataNsatz = $Nsatz->getNsatz($masterID);
$Ndetail = new DB_MasterID();
$dataNdetail = $Ndetail->getNdetail($masterID);
$Zusatz = new DB_MasterID();
$dataZusatz = $Zusatz->getZusatz($masterID);
$Ladeg = new DB_MasterID();
$dataLadeg = $Ladeg->getLadeg($masterID);
$Ladeoption = new DB_MasterID();
$dataLadeoption = $Ladeoption->getLadeoption($masterID);
$Nart = new DB_MasterID();
$dataNart = $Nart->getNart($masterID);
$AuMaterial = new DB_MasterID();
$dataAuMaterial = $AuMaterial->getAuMaterial($masterID);
$ZusatzInfo = new DB_MasterID();
$dataZusatzInfo = $ZusatzInfo->getZusatzInfo($masterID);
$BaMaterial = new DB_MasterID();
$dataBaMaterial = $BaMaterial->getBaMaterial($masterID);
$Fzg = new DB_MasterID();
$dataFzg = $Fzg->getFzg($masterID);

unset($matnrListe);
$matnrListe = array();
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
						<th scope="row>">fuer Fahrzeug:</th>
	<?php if(!empty($dataFzg)){?>
	<?php foreach($dataFzg as $datasetFzg){?>
						<td><?php echo $datasetFzg['fzgLabel']; ?></td>
						<td><?php echo $datasetFzg['fzgSop']; ?></td>
						<td><?php echo $datasetFzg['baLabel']; ?></td>
				
	<?php };}else{?>
			<td colspan="3">- kein Fahrzeug ausgewaehlt -</td>
		
	<?php };?>
	</tr>
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
					
						<td><?php echo $datasetBaMaterial['baMaterial'];array_push($matnrListe, $datasetBaMaterial['baMaterial']); ?></td>
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
	
	<?php if(!empty($dataAuMaterial)){?>
<tr>
						<th rowspan="<?php echo count($dataAuMaterial); ?>" scope="row>">Ausstattung</th>
	<?php foreach($dataAuMaterial as $datasetAuMaterial){?>
					
						<td colspan='1'><?php echo $datasetAuMaterial['auMaterial']; array_push($matnrListe, $datasetAuMaterial['auMaterial']); ?></td>
						<td colspan='2'></td>
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
		<td style="width:'100px'">
		<label>Materialnummer:</label></br>
			<textarea id="matnrAusgabe"
					style="resize: none; width: 100px; height: 100px;" cols="" rows="">
			<?php foreach($matnrListe as $matnr){echo $matnr . '&#13;&#10;';};?>
			</textarea></td>
		</tr>
	</table>
</div>

<div class="LadeAusgabe">
	<table class="fixed-header InfoTable scroll">
		<thead>
		<tr>
			<th>Materialnummer</th>
			<th>Label</th>
			<th>Text</th>
		</tr>
		</thead>
		<tbody>
	<?php foreach($dataLadeg as $datasetLadeg){?>
	<tr>
				<td><?php echo $datasetLadeg['laMaterial']; ?></td>
				<td><?php echo $datasetLadeg['laLabel']; ?></td>
				<td><?php echo $datasetLadeg['laKlasse']; ?></td>
			</tr>
	<?php }?>
	<?php foreach($dataLadeoption as $datasetLadeoption){?>
	<tr>
				<td><?php echo $datasetLadeoption['loMaterial']; ?></td>
				<td><?php echo $datasetLadeoption['loLabel']; ?></td>
				<td><?php echo $datasetLadeoption['loKomm']; ?></td>
			</tr>
	<?php }?>
</tbody>
	</table>
</div>
</html>