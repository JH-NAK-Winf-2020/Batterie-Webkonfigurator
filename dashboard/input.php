<!--Darstellung der Eingabefelder durch die Ergebnisse eingeschränkt werden können
  Enthalten als Wert zuletzt durch den Nutzer eingegebende Zeichen -> werden beim Aufruf in index.php, beim Nachladen in load.php definiert
  Triggert updateData() in jquery.js, wenn in einem der Inputfelder eine Taste gedrückt wird -> Erneuerung des Contents der Ausgabe
-->
<nav id='input'>
  <ul>
<form class="search" id='search' name='search' method="POST">
  <input type="text" id="fahrzeug" name="fahrzeug" placeholder="Fahrzeugtyp" onkeyup="updateData()" >
  <select id="sop" name="sop" placeholder="Baujahr" onChange="onInputChange(this.value)">
    <?php //foreach($baOptions as $baOption){?>
      <option value="2011">2011</option>
      <option value="2012">2012</option>
    <?php //}?>
  </select>

  <input type="text" id="batterieraum" name="batterieraum" placeholder="Batterieraum"  onkeyup="updateData()">
  <input type="text" id="baKapa" name="baKapa"  placeholder="Batteriekapazitaet" onkeyup="updateData()" >
  <input type="text" id="baTyp" name="baTyp"  placeholder="Batterietyp" onkeyup="updateData()" >
  <input type="text" id="baMaterial" name="baMaterial"  placeholder="Batterie-Materialnr" onkeyup="updateData()" >
  <input type="text" id="asLabel" name="asLabel"  placeholder="Zugangssystem" onkeyup="updateData()" >
</form>
</ul>
</nav>