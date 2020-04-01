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
	<?php foreach($dataZusatz as $datasetNsatz){?>
	<
	<label><?php echo $datasetNsatz['zuMaterial'] . $datasetNsatz['zuLabel'] . $datasetNsatz['zuHinweis'];?></label>
    </br>
	<?php }?>
</form>
</div>
</aside>
</html>