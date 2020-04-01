<?php
    include 'db_result.php';
    $fzgSop= new DB_Result();
    $optionsFzgSop = $fzgSop->getOptionsFzgSop($_POST['fzgLabel'],$_POST['fzgSop'],$_POST['brLabel'], $_POST['baKapa'], $_POST['baTyp'], $_POST['asLabel']);
    $brLabel= new DB_Result();
    $optionsBrLabel = $brLabel->getOptionsBrLabel($_POST['fzgLabel'],$_POST['fzgSop'],$_POST['brLabel'], $_POST['baKapa'], $_POST['baTyp'], $_POST['asLabel']);
    $baKapa= new DB_Result();
    $optionsBaKapa = $baKapa->getOptionsBaKapa($_POST['fzgLabel'],$_POST['fzgSop'],$_POST['brLabel'], $_POST['baKapa'], $_POST['baTyp'], $_POST['asLabel']);
    $baTyp= new DB_Result();
    $optionsBaTyp = $baTyp->getOptionsBaTyp($_POST['fzgLabel'],$_POST['fzgSop'],$_POST['brLabel'], $_POST['baKapa'], $_POST['baTyp'], $_POST['asLabel']);
?>
<div id='DropDowns'> 
 <ul id='Liste' class="InputListe">  
<select id="sop" name="sop" placeholder="ab Baujahr" onChange="updateData()">
    <?php foreach($optionsFzgSop as $optionFzgSop){?>
      <option value="<?php echo $optionFzgSop;?>"><?php if($optionFzgSop==''){echo 'ab Baujahr';}else{echo 'ab '. $optionFzgSop;};?></option>
    <?php };?>
  </select>
  </br>
  <select id="batterieraum" name="batterieraum"  placeholder="Batterieraum" onChange="updateData()">
     <?php foreach($optionsBrLabel as $optionBrLabel){?>
      <option value="<?php echo $optionBrLabel;?>"><?php if($optionBrLabel==''){echo 'Batterieraum';}else{echo $optionBrLabel;};?></option>
     <?php };?>
  </select></br>    
</ul>

<h5 class="UeberschriftInput">Batteriedaten:</h5>
    <ul class="InputListe">
  <select id="baKapa" name="baKapa"  placeholder="Batteriekapazitaet" onChange="updateData()">
     <?php foreach($optionsBaKapa as $optionBaKapa){?>
      <option value="<?php echo $optionBaKapa;?>"><?php if($optionBaKapa==''){echo 'Batteriekapazitaet';}else{echo $optionBaKapa;};?></option>
     <?php };?>
  </select></br>
  <select id="baTyp" name="baTyp"  placeholder="Batterietyp" onChange="updateData()">
     <?php foreach($optionsBaTyp as $optionBaTyp){?>
      <option value="<?php echo $optionBaTyp;?>"><?php if($optionBaTyp==''){echo 'Batterietyp';}else{echo $optionBaTyp;};?></option>
     <?php };?>
  </select></br> 
</ul> 
</div>
