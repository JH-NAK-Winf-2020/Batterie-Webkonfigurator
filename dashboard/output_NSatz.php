
 <?php
 $id=1;
 ?>
<div id="outputNSatz" class="output">
<div>
  <table class="wrapper scrollbar">
    <thead>
		<tr>
		  <th>Nachruestsatz </th>
		  <th>Nachruestart</th>
		  <th> Kommentar </th>
		</tr>
    </thead>
    <tbody>
            <?php foreach ($nSatzData as $nSatzDataset) { //Ausgabe der Suchergbnisse?>
    	        <tr id="<?php echo htmlspecialchars($dataset['masterId']) ?>"< onclick="selectRow(<?php echo htmlspecialchars($dataset['masterId'])?>)">
		          <td style="width:auto"><?php echo htmlspecialchars($dataset['fzgLabel'])?></td>
		          <td style="width:auto"><?php echo htmlspecialchars($dataset['fzgSop'])?></td>
				  <td style="width:auto"><?php echo htmlspecialchars($dataset['brLabel'])?></td>
				  <td style="width:auto"><?php echo htmlspecialchars($dataset['baKapa'])?></td>
				  <td style="width:auto"><?php echo htmlspecialchars($dataset['baTyp'])?></td>
				  <td style="width:auto"><?php echo htmlspecialchars($dataset['baMaterial'])?></td>
				  <td style="width:auto"><?php echo htmlspecialchars($dataset['asLabel'])?></td>
				</tr>
	        <?php } ?>
    </tbody>
  </table>

</div>
</div>