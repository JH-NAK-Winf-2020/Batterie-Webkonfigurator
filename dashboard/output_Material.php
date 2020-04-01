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
<aside>
<div style="float:right">
<form action="">
<table>
<tr>
<th>Materialnummer</th>
<th>Spalte2</th>
<th>Spalte3</th>
</tr>
<tr>
<td>Material</td>
<td>Label</td>
<td>Kommentar</td>
</tr>
	<?php foreach($dataNsatz as $datasetNsatz){?>
	<tr>
	<td><?php echo $datasetNsatz['nsatzMaterial']; ?></td>
	<td><?php echo $datasetNsatz['nsatzLabel']; ?></td>
	<td><?php echo $datasetNsatz['nsatzKomm']; ?></td>
    </tr>
	<?php }?>
<tr>

<tr>
<td>Material</td>
<td>Label</td>
<td>Frei</td>
</tr>
	<?php foreach($dataNdetail as $datasetNdetail){?>
	<tr>
	<td><?php echo $datasetNdetail['ndetailMaterial'].'test'; ?></td>
	<td><?php echo $datasetNdetail['ndetailLabel']; ?></td>
	<td><?php echo ''; ?></td>
    </tr>
	<?php }?>
<tr>
<td>Material</td>
<td>Label</td>
<td>Hinweis</td>
</tr>	
	<?php foreach($dataZusatz as $datasetZusatz){?>
	<tr>
	<td><?php echo $datasetZusatz['zuMaterial']; ?></td>
	<td><?php echo $datasetZusatz['zuLabel']; ?></td>
	<td><?php echo $datasetZusatz['zuHinweis']; ?></td>
    </tr>
	<?php }?>
</table>

</form>
</div>
</aside>
</html>