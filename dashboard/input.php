<!--Darstellung der Eingabefelder durch die Ergebnisse eingeschränkt werden können
  Enthalten als Wert zuletzt durch den Nutzer eingegebende Zeichen -> werden beim Aufruf in index.php, beim Nachladen in load.php definiert
  Triggert updateData() in jquery.js, wenn in einem der Inputfelder eine Taste gedrückt wird -> Erneuerung des Contents der Ausgabe
-->
<nav id='input'>
  <ul>
<form class="search" id='search' name='search' method="POST">
  <input type="text" id="fahrzeug" name="fahrzeug" placeholder="Fahrzeugtyp" onkeyup="updateData()" > </br>
  <select id="sop" name="sop" placeholder="Baujahr" placeholder="ab Baujahr" onChange="updateData()">
     <?php foreach($options as $option){?>
      <option value=<?php echo $option?>><?php if($option==''){echo 'ab Baujahr';}else{echo 'ab '. $option;};?></option>
    <?php }?>
  </select></br>
  <input type="text" id="batterieraum" name="batterieraum" placeholder="Batterieraum" onkeyup="updateData()">
  <input type="text" id="baKapa" name="baKapa"  placeholder="Batteriekapazitaet" onkeyup="updateData()" >
  <input type="text" id="baTyp" name="baTyp"  placeholder="Batterietyp" onkeyup="updateData()" >
  <input type="text" id="asLabel" name="asLabel"  placeholder="Zugangssystem" onkeyup="updateData()" >
</form>
</ul>
</nav>