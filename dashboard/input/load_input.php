<?php
//Intention: Aktuelliseren der verfuegbaren DropDown Optionen, sobald Änderung in Inputfelder
include './../include/class/db_input.php';
// Daten fuer DropDown-Optionen Baujahr
$fzgSop = new DB_Result();
$optionsFzgSop = $fzgSop->getOptionsFzgSop($_POST['fzgLabel'], $_POST['fzgSop'], $_POST['brLabel'], $_POST['baKapa'], $_POST['baTyp'], $_POST['asLabel']);
// Daten fuer DropDown-Optionen Batterieraum Label
$brLabel = new DB_Result();
$optionsBrLabel = $brLabel->getOptionsBrLabel($_POST['fzgLabel'], $_POST['fzgSop'], $_POST['brLabel'], $_POST['baKapa'], $_POST['baTyp'], $_POST['asLabel']);
// Daten fuer DropDown-Optionen Batteriekapazitaet
$baKapa = new DB_Result();
$optionsBaKapa = $baKapa->getOptionsBaKapa($_POST['fzgLabel'], $_POST['fzgSop'], $_POST['brLabel'], $_POST['baKapa'], $_POST['baTyp'], $_POST['asLabel']);
// Daten fuer DropDown-Optionen Batterietyp
$baTyp = new DB_Result();
$optionsBaTyp = $baTyp->getOptionsBaTyp($_POST['fzgLabel'], $_POST['fzgSop'], $_POST['brLabel'], $_POST['baKapa'], $_POST['baTyp'], $_POST['asLabel']);
// POST Request wird durch ajax in js bereitgestellt -> enthaelt aktuelle Werte der Inputfelder
?>
<div id='DropDowns'>
	<ul id='Liste' class="InputListe">
		<select id="sop" style="width: 150px" name="sop"
			placeholder="ab Baujahr" onChange="updateData()">
    <?php foreach($optionsFzgSop as $optionFzgSop){?>
      <option value="<?php echo $optionFzgSop;?>"><?php if($optionFzgSop =='all'){echo 'ab Baujahr';}elseif($optionFzgSop =='(leer)'){echo $optionFzgSop;}else{echo 'ab '.$optionFzgSop;};?></option>
    <?php };?>
  </select>
		</br>
		<select id="batterieraum" style="width: 150px" name="batterieraum"
			placeholder="Batterieraum" onChange="updateData()">
     <?php foreach($optionsBrLabel as $optionBrLabel){?>
      <option value="<?php echo $optionBrLabel;?>"><?php if($optionBrLabel=='all'){echo 'Batterieraum';}else{echo $optionBrLabel;};?></option>
     <?php };?>
  </select>
		</br>
	</ul>

	<h5 class="UeberschriftInput">Batteriedaten:</h5>
	<ul class="InputListe">
		<select id="baKapa" style="width: 150px" name="baKapa"
			placeholder="Batteriekapazitaet" onChange="updateData()">
     <?php foreach($optionsBaKapa as $optionBaKapa){?>
      <option value="<?php echo $optionBaKapa;?>"><?php if($optionBaKapa=='all'){echo 'Batteriekapazitaet';}else{echo $optionBaKapa;};?></option>
     <?php };?>
  </select>
		</br>
		<select id="baTyp" style="width: 150px" name="baTyp"
			placeholder="Batterietyp" onChange="updateData()">
     <?php foreach($optionsBaTyp as $optionBaTyp){?>
      <option value="<?php echo $optionBaTyp;?>"><?php if($optionBaTyp=='all'){echo 'Batterietyp';}else{echo $optionBaTyp;};?></option>
     <?php };?>
  </select>
		</br>
	</ul>
</div>
