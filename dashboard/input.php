<!--Darstellung der Eingabefelder durch die Ergebnisse eingeschränkt werden können
  Enthalten als Wert zuletzt durch den Nutzer eingegebende Zeichen -> werden beim Aufruf in index.php, beim Nachladen in load.php definiert
  Triggert updateData() in jquery.js, wenn in einem der Inputfelder eine Taste gedrückt wird -> Erneuerung des Contents der Ausgabe
-->
<nav id='input'>
<form class="search" id='search' name='search' method="POST">
<<<<<<< HEAD
  <input type="text" id="fahrzeug" name="fahrzeug" placeholder="Fahrzeugtyp" onkeyup="updateData()" > 
  </br>
  <div id='DropDowns'>
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
    </div>
  <input type="text" id="asLabel" name="asLabel"  placeholder="Zugangssystem" onkeyup="updateData()" >
=======
  
  <div class="ListenPosition">
<h5 class="UeberschriftInput">Fahrzeugdaten:</h5>
    <ul id='Liste' class="InputListe">
      <input type="text" id="fahrzeug" name="fahrzeug" placeholder="Fahrzeugtyp" onkeyup="updateData()" > </br>
        <select id="sop" name="sop" placeholder="Baujahr" placeholder="ab Baujahr" onChange="updateData()">
          <?php foreach($options as $option){?>
           <option value=<?php echo $option?>><?php if($option==''){echo 'ab Baujahr';}else{echo 'ab '. $option;};?></option>
           <?php }?>
         </select></br>
      <input type="text" id="batterieraum" name="batterieraum" placeholder="Batterieraum" onkeyup="updateData()">
    </ul></div>

<h5 class="UeberschriftInput">Batteriedaten:</h5>
    <ul class="InputListe">
       <input type="text" id="baKapa" name="baKapa"  placeholder="Batteriekapazitaet" onkeyup="updateData()" >
       <input type="text" id="baTyp" name="baTyp"  placeholder="Batterietyp" onkeyup="updateData()" >
    </ul>

 <h5 class="UeberschriftInput">Ausstattung:</h5>
    <ul class="InputListe">
       <input type="text" id="asLabel" name="asLabel"  placeholder="Zugangssystem" onkeyup="updateData()" >
      </ul>

>>>>>>> cssEntwicklung
</form>
</nav>