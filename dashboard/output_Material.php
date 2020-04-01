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
	<?php foreach($dataZusatz as $datasetNsatz){?>
	<tr>
	<td><?php echo $datasetNsatz['zuMaterial']; ?></td>
	<td><?php echo $datasetNsatz['zuLabel']; ?></td>
	<td><?php echo $datasetNsatz['zuHinweis']; ?></td>
    </tr>
	<?php }?>

</table>

</form>
</div>
</aside>
</html>