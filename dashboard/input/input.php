<?php 
// Darstellung der Eingabefelder durch die Ergebnisse eingeschränkt werden können
// Enthalten als Wert zuletzt durch den Nutzer eingegebende Zeichen -> werden beim Aufruf in index.php, beim Nachladen in load.php definiert
// Triggert updateData() in jquery.js, wenn in einem der Inputfelder eine Taste gedrückt wird -> Erneuerung des Contents der Ausgabe
?>
<nav id='input'>
  <ul>
<form class="search" id='search' name='search' method="POST">
<div class="ListenPosition">
<h5 class="UeberschriftInput">Fahrzeugdaten:</h5>
  
    <ul id='Liste' class="InputListe">
      <input type="text" id="fahrzeug" name="fahrzeug" placeholder="Fahrzeugtyp" onkeyup="updateData()" > </br>
     </ul>
  <div id='DropDowns'>
  <ul id='Liste' class="InputListe">  
 
	<select id="sop" style="width:150px" name="sop" placeholder="ab Baujahr" onChange="updateData()">
    <?php foreach($optionsFzgSop as $optionFzgSop){ //Bereitstellung der Daten fuer Optionen durch index.php?>
      <option value="<?php echo $optionFzgSop;?>"><?php if($optionFzgSop =='all'){echo 'ab Baujahr';}elseif($optionFzgSop =='(leer)'){echo $optionFzgSop;}else{echo 'ab '.$optionFzgSop;};?></option>
    <?php };?>
  </select>
  </br>

  <select id="batterieraum" style="width:150px" name="batterieraum"  placeholder="Batterieraum" onChange="updateData()">
     <?php foreach($optionsBrLabel as $optionBrLabel){ //Bereitstellung der Daten fuer Optionen durch index.php?>
      <option value="<?php echo $optionBrLabel;?>"><?php if($optionBrLabel=='all'){echo 'Batterieraum';}else{echo $optionBrLabel;};?></option>
     <?php };?>
  </select></br>    
</ul>


<h5 class="UeberschriftInput">Batteriedaten:</h5>
  <ul class="InputListe">
  
  <select id="baKapa" style="width:150px" name="baKapa"  placeholder="Batteriekapazitaet" onChange="updateData()">
     <?php foreach($optionsBaKapa as $optionBaKapa){ //Bereitstellung der Daten fuer Optionen durch index.php?>
      <option value="<?php echo $optionBaKapa;?>"><?php if($optionBaKapa=='all'){echo 'Batteriekapazitaet';}else{echo $optionBaKapa;};?></option>
     <?php };?>
  </select></br>
  
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
</form>
</ul>
</nav>