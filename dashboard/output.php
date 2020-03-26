<!--Ausgabe der aktuellen Filterergebnisse
   Nimmt als Input $data entgegen, welches aktuelle Suchergebnisse enthält (beim 1. Laden aus index.php, für Aktualisierungen aus load.php )
   Wird durch js/jquery Funktion updateData() als Teil der Seite seperat nachgeladen (ajax)
 -->
 <?php
 $id=1;
 ?>
<div id="output" class="output">
<div>
  <table class="wrapper scrollbar">
    <thead>
		<tr>
		  <th>Fahrzeugtyp </th>
		  <th>ab Baujahr</th>
		  <th>Batterieraum</th>
		  <th>Batterie Kapazitaet</th>
		  <th>Batterie Typ</th>
		  <th>Batterie Materialnummer</th>
		  <th>Zugangssystem</th>
		</tr>
    </thead>
    <tbody>
            <?php foreach ($data as $dataset) { //Ausgabe der Suchergbnisse?>
    	        <tr id="<?php echo $id ?>"< onclick="selectRow(<?php echo $id ?>)">
		          <td style="width:auto"><?php echo htmlspecialchars($dataset['fzgLabel'])?></td>
		          <td style="width:auto"><?php echo htmlspecialchars($dataset['fzgSop'])?></td>
				  <td style="width:auto"><?php echo htmlspecialchars($dataset['brLabel'])?></td>
				  <td style="width:auto"><?php echo htmlspecialchars($dataset['baKapa'])?></td>
				  <td style="width:auto"><?php echo htmlspecialchars($dataset['baTyp'])?></td>
				  <td style="width:auto"><?php echo htmlspecialchars($dataset['baMaterial'])?></td>
				  <td style="width:auto"><?php echo htmlspecialchars($dataset['baMaterial'])?></td>
				</tr>
	        <?php $id=$id+2; } ?>
    </tbody>
  </table>

</div>
</div>