<?php 
// Ausgabe der aktuellen Filterergebnisse
// Nimmt als Input $data entgegen, welches aktuelle Suchergebnisse enthält (beim 1. Laden aus index.php, für Aktualisierungen aus load.php )
// Wird durch js/jquery Funktion updateData() als Teil der Seite seperat nachgeladen (ajax)
?>

<div id="output" class="InfoBox">
  <table  class="fixed-header InfoTable">
    <thead>
    	<tr>
		  <th colspan="3" style="width: 520px">Fahrzeug </th>
		  <th colspan="2" style="width: 10px">Batterie </th>
		  <th style="width: 400px" >Ausstattung</th>
		</tr>
		<hr>
		  <th style="width: 77px">Fzg Typ </th>
		  <th style="width: 81px">ab Baujahr</th>
		  <th style="width: 79px">Batterie Raum</th>
		  <th style="width: 84px">Batterie Kapazitaet</th>
		  <th style="width: 70px">Batterie Typ</th>
		  <th style="width: 230px">Zugangssystem</th>
		</tr>
    </thead>
    <tbody class="hover">
            <?php foreach ($data as $dataset) { //Ausgabe der Suchergbnisse?>
    	        <tr class="test" id="<?php echo htmlspecialchars($dataset['masterId']) ?>"< onclick="selectRow(<?php echo htmlspecialchars($dataset['masterId'])?>)">
		          <td class="fzg-data" style="width:130px" ><?php echo htmlspecialchars($dataset['fzgLabel'])?></td>
		          <td class="fzg-data" style="width: 90px"><?php echo htmlspecialchars($dataset['fzgSop'])?></td>
				  <td class="fzg-data" style="width: 80px"><?php echo htmlspecialchars($dataset['brLabel'])?></td>
				  <td class="batterie-data" style="width: 145px"><?php echo htmlspecialchars($dataset['baKapa'])?></td>
				  <td class="batterie-data" style="width: 90px"><?php echo htmlspecialchars($dataset['baTyp'])?></td>
				  <td class="ausstattung-data" style="width: 320px"><?php echo htmlspecialchars($dataset['asLabel'])?></td>
				</tr>
	        <?php }; ?>
    </tbody>
  </table>
  <label id='count'><?php echo 'Eintr&aumlge:' . count($data);?></label>
</div>
