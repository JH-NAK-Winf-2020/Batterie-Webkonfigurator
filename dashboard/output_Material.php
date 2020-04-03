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

unset($matnrListe);
$matnrListe = array();
?>
<html>

<div Id="NsatzDiv" style="float: right">
	<main><table>
		
	<tr>
			<caption><h4>Nachr&uumlstung auf: <?php foreach($dataNart as $datasetNart){echo $datasetNart['naLabel'];};?></h4></caption>
		</tr>
		<tr>
			<td>
				<table class="MatnrAusgabe">
					<thead>
						 
				<tr>
					<td rowspan="2"></td>
						<th colspan="3">Nachruestsatz</th>
					</tr>
					</thead>
	<?php if(empty($dataNsatz)){?>
	  <tbody> <tr>
						<td colspan="3">- kein Nachruestsatz vorhanden -</td>
					</tr>
	<?php }else{ foreach($dataNsatz as $datasetNsatz){?>
	<tr>
						<td><?php echo $datasetNsatz['nsatzMaterial']; array_push($matnrListe, $datasetNsatz['nsatzMaterial']);?></td>
						<td><?php echo $datasetNsatz['nsatzLabel']; ?></td>
						<td><?php echo $datasetNsatz['nsatzKomm']; ?></td>
					</tr>
	<?php };};?>

<?php if(!empty($dataNdetail)){?>
<tr>
						<td colspan="3">Nachruestsatz-Details</td>
					</tr>
	<?php foreach($dataNdetail as $datasetNdetail){?>
	<tr>
						<td><?php echo $datasetNdetail['ndetailMaterial'];array_push($matnrListe, $datasetNdetail['ndetailMaterial']); ?></td>
						<td colspan="2"><?php echo $datasetNdetail['ndetailLabel']; ?></td>
					</tr>
	<?php };};?>
	
<?php if(!empty($dataBaMaterial)){?>
<tr>
						<td colspan="3">Batterie</td>
					</tr>
	<?php foreach($dataBaMaterial as $datasetBaMaterial){?>
	<tr>
						<td><?php echo $datasetBaMaterial['baMaterial'];array_push($matnrListe, $datasetBaMaterial['baMaterial']); ?></td>
						<td colspan="1"><?php echo $datasetBaMaterial['baAbmessung']; ?></td>
						<td colspan="1"><?php echo $datasetBaMaterial['baKapa']; ?></td>
					</tr>
	<?php };};?>

<?php if(!empty($dataZusatz)){?>
<tr>
						<td colspan="3">Zusatzmaterial</td>
					</tr>	
	<?php foreach($dataZusatz as $datasetZusatz){?>
	<tr>
						<td><?php echo $datasetZusatz['zuMaterial']; array_push($matnrListe, $datasetZusatz['zuMaterial']); ?></td>
						<td><?php echo $datasetZusatz['zuLabel']; ?></td>
						<td><?php echo $datasetZusatz['zuHinweis']; ?></td>
					</tr>
	<?php };};?>
	
	<?php if(!empty($dataAuMaterial)){?>
<tr>
						<td colspan="3">Ausstattung</td>
					</tr>
	<?php foreach($dataAuMaterial as $datasetAuMaterial){?>
	<tr>
						<td colspan='3'><?php echo $datasetAuMaterial['auMaterial']; array_push($matnrListe, $datasetAuMaterial['auMaterial']); ?></td>
					</tr>
	<?php };};?>
		<?php if(!empty($dataZusatzInfo)){?>
<tr>
						<td colspan="3">Zusatzinfo</td>
					</tr>
	<?php foreach($dataZusatzInfo as $datasetZusatzInfo){?>
	<tr>
						<td colspan='2'><?php echo $datasetZusatzInfo['zuText'];?></td>
						<td colspan='1'><?php echo $datasetZusatzInfo['zuArt'];?></td>
					</tr></tbody>
	<?php };};?>

</table>
			</td>
		<td style="width:'100px'">
			<textarea id="matnrAusgabe"
					style="resize: none; width: 100px; height: 100px;" cols="" rows="">
			<?php foreach($matnrListe as $matnr){echo $matnr . '&#13;&#10;';};?>
			</textarea></td>
		</tr>
	</table></main>
</div>

<div class="LadeAusgabe">
	<table id="scroll" class="fixed-header InfoTable">
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