<!--Ausgabe der aktuellen Filterergebnisse
   Nimmt als Input $data entgegen, welches aktuelle Suchergebnisse enthält (beim 1. Laden aus index.php, für Aktualisierungen aus load.php )
   Wird durch js/jquery Funktion updateData() als Teil der Seite seperat nachgeladen (ajax)
 -->

<div id="output" class="output">
<div>
  <table class="fixed-header">
    <thead>
		<tr>
		  <th style="width: 120px">Fahrzeugtyp </th>
		  <th style="width: 50px">ab Baujahr</th>
		  <th style="width: 100px">Batterieraum</th>
		  <th style="width: 100px">Batterie Kapazitaet</th>
		  <th style="width: 70px">Batterie Typ</th>
		  <th style="width: 200px">Batterie <?php echo "</br>"?> Materialnummer</th>
		  <th style="width: 400px">Zugangssystem</th>
		</tr>
    </thead>
    <tbody>
            <?php foreach ($data as $dataset) { //Ausgabe der Suchergbnisse?>
    	        <tr class="test" id="<?php echo htmlspecialchars($dataset['masterId']) ?>"< onclick="selectRow(<?php echo htmlspecialchars($dataset['masterId'])?>)">
		          <td class="fzg-data" style="width: 120px"><?php echo htmlspecialchars($dataset['fzgLabel'])?></td>
		          <td class="fzg-data" style="width: 50px"><?php echo htmlspecialchars($dataset['fzgSop'])?></td>
				  <td class="fzg-data" style="width: 100px"><?php echo htmlspecialchars($dataset['brLabel'])?></td>
				  <td class="batterie-data" style="width: 100px"><?php echo htmlspecialchars($dataset['baKapa'])?></td>
				  <td class="batterie-data" style="width: 70px"><?php echo htmlspecialchars($dataset['baTyp'])?></td>
				  <td class="batterie-data" style="width: 200px"><?php echo htmlspecialchars($dataset['baMaterial'])?></td>
				  <td class="ausstattung-data" style="width: 400px"><?php echo htmlspecialchars($dataset['asLabel'])?></td>
				</tr>
	        <?php } ?>
    </tbody>
  </table>

</div>
</div>