
 <?php
echo "Hallo";
 ?>
<div id="outputNSatz" class="outputNSatz">
<div>
  <table class="">
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
		          <td style="width:auto"><?php echo htmlspecialchars($nSatzDataset['fzgLabel'])?></td>
		          <td style="width:auto"><?php echo htmlspecialchars($nSatzDataset['fzgSop'])?></td>
				  <td style="width:auto"><?php echo htmlspecialchars($nSatzDataset['brLabel'])?></td>
				</tr>
	        <?php } ?>
    </tbody>
  </table>

</div>
</div>