<?php 
    include 'db_masterID.php';
    $masterID = $_POST['masterID'];
    $Nsatz= new DB_MasterID();
    $dataNsatz = $Nsatz->getNsatz($masterID);
    $Ndetail= new DB_MasterID();
    $dataNdetail = $Ndetail->getNdetail($masterID);
    $Zusatz= new DB_MasterID();
    $dataZusatz = $Zusatz->getZusatz($masterID);
    $Ladeg= new DB_MasterID();
    $dataLadeg = $Ladeg->getLadeg($masterID);
    $Ladeoption= new DB_MasterID();
    $dataLadeoption = $Ladeoption->getLadeoption($masterID);
?>
<html>

<div Id="NsatzDiv" style="float:right">
<form action="">
<h1>Nachr&uumlstung auf:</h1>
<label>Hier wird die Nachruestart angezeigt werden</label>

<table>
<tr>
<th colspan="3">Nachruestsatz</th>
</tr>
	<?php if(empty($dataNsatz)){?>
	    <tr> 
	    	<td colspan="3">- kein Nachruestsatz vorhanden -</td>
		</tr>
	<?php }else{ foreach($dataNsatz as $datasetNsatz){?>
	<tr>
	<td><?php echo $datasetNsatz['nsatzMaterial']; ?></td> 
	<td><?php echo $datasetNsatz['nsatzLabel']; ?></td>
	<td><?php echo $datasetNsatz['nsatzKomm']; ?></td>
    </tr>
	<?php };};?>
<tr>
<?php if(!empty($dataNdetail)){?>
<tr>
<td colspan="3">Nachruestsatz-Details</td>
</tr>
	<?php foreach($dataNdetail as $datasetNdetail){?>
	<tr>
	<td><?php echo $datasetNdetail['ndetailMaterial'].'test'; ?></td>
	<td><?php echo $datasetNdetail['ndetailLabel']; ?></td>
	<td><?php echo ''; ?></td>
    </tr>
	<?php };};?>
<tr>
<?php if(!empty($dataZusatz)){?>
<td colspan="3">Zusatzmaterial</td>
</tr>	
	<?php foreach($dataZusatz as $datasetZusatz){?>
	<tr>
	<td><?php echo $datasetZusatz['zuMaterial']; ?></td>
	<td><?php echo $datasetZusatz['zuLabel']; ?></td>
	<td><?php echo $datasetZusatz['zuHinweis']; ?></td>
    </tr>
	<?php };};?>
</table>
<label>zu bestellendes Ladegerat</label>
<table>
<tr>
<td colspan="3">Ladegeraet</td>
</tr>
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

</table>

</form>
</div>
</html>