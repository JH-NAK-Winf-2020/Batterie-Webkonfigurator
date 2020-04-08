<?php 
// Darstellung der Eingabefelder durch die Ergebnisse eingeschränkt werden können
// Enthalten als Wert zuletzt durch den Nutzer eingegebende Zeichen -> werden beim Aufruf in index.php, beim Nachladen in load.php definiert
// Triggert updateData() in jquery.js, wenn in einem der Inputfelder eine Taste gedrückt wird -> Erneuerung des Contents der Ausgabe
?>
<nav id='input'>
  <ul>
<div class="search" id='search' name='search'>
<div class="ListenPosition">
<h5 class="UeberschriftInput">Fahrzeugdaten:</h5>
  
    <ul id='Liste' class="InputListe">
      <input type="text" id="fahrzeug" name="fahrzeug" placeholder="Fahrzeugtyp" onkeyup="updateData()" > 
             <label id="infoFzTyp" name="infoFzTyp" onClick="getInfoFzTyp()">&#x1F6C8;</label> <?php //Infobutton neben Fahrzeugtyp?></br>
     </ul>
  <div id='DropDowns'>
  <ul id='Liste' class="InputListe">  
 
	<select id="sop" style="width:150px" name="sop" placeholder="ab Baujahr" onChange="updateData()">
    <?php foreach($optionsFzgSop as $optionFzgSop){ //Bereitstellung der Daten fuer Optionen durch index.php?>
      <option value="<?php echo $optionFzgSop;?>"><?php if($optionFzgSop =='all'){echo 'ab Baujahr';}elseif($optionFzgSop =='(leer)'){echo $optionFzgSop;}else{echo 'ab '.$optionFzgSop;};?></option>
    <?php };?>
  </select>
         <label id="infoBj" name="infoBj" onClick="getInfoBj()">&#x1F6C8;</label> <?php //Infobutton neben Baujahr?>
  </br>

  <select id="batterieraum" style="width:150px" name="batterieraum"  placeholder="Batterieraum" onChange="updateData()">
     <?php foreach($optionsBrLabel as $optionBrLabel){ //Bereitstellung der Daten fuer Optionen durch index.php?>
      <option value="<?php echo $optionBrLabel;?>"><?php if($optionBrLabel=='all'){echo 'Batterieraum';}else{echo $optionBrLabel;};?></option>
     <?php };?>
  </select>
         <label id="infoBatraum" name="infoBatraum" onClick="getInfoBatraum()">&#x1F6C8;</label> <?php //Infobutton neben Batterieraum?>
         </br>    
</ul>


<h5 class="UeberschriftInput">Batteriedaten:</h5>
  <ul class="InputListe">
  
  <select id="baKapa" style="width:150px" name="baKapa"  placeholder="Batteriekapazitaet" onChange="updateData()">
     <?php foreach($optionsBaKapa as $optionBaKapa){ //Bereitstellung der Daten fuer Optionen durch index.php?>
      <option value="<?php echo $optionBaKapa;?>"><?php if($optionBaKapa=='all'){echo 'Batteriekapazitaet';}else{echo $optionBaKapa;};?></option>
     <?php };?>
  </select>
         <label id="infoBatKap" name="infoBatKap" onClick="getInfoBatKap()">&#x1F6C8;</label> <?php //Infobutton neben Batteriekapazit�t?>
         </br>
  
  <select id="baTyp" style="width:150px" name="baTyp"  placeholder="Batterietyp" onChange="updateData()">
     <?php foreach($optionsBaTyp as $optionBaTyp){//Bereitstellung der Daten fuer Optionen durch index.php?>
      <option value="<?php echo $optionBaTyp;?>"><?php if($optionBaTyp=='all'){echo 'Batterietyp';}else{echo $optionBaTyp;};?></option>
     <?php };?>
  </select></br> 
  
</ul> 
</div>


 <h5 class="UeberschriftInput">Ausstattung:</h5>
 
    <ul class="InputListe">
       <input type="text" id="asLabel" name="asLabel"  placeholder="Zugangssystem" onkeyup="updateData()" ></input>
       <label id="infoAu" name="infoAu" onClick="getInfoAu()">&#x1F6C8;</label> <?php //Infobutton neben Zugangssystem?>
      </ul>
</div>
<input type="submit" class="button" value="Reset" onClick="resetInput()"><?php //Resetbutton ?>
</div>
</ul>
</nav>