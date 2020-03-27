
 <?php
 ?>
<div id="outputNSatz" class="outputNSatz">
<div>
  <table class="">
    <thead>
		<tr>
		  <th>Nachruestsatz </th>
		  <th>Nachruestart</th>
		  <th>Kommentar </th>
		</tr>
    </thead>
    <tbody>
			<?php if($nSatzData != ''){ foreach ($nSatzData as $nSatzDataset) { //Ausgabe der Suchergbnisse?>
    	        <tr>
		          <td><?php echo empty(htmlspecialchars($nSatzDataset['nartLabel']))? 'NULL': htmlspecialchars($nSatzDataset['nartLabel'])?></td>
		          <td><?php echo htmlspecialchars($nSatzDataset['nsatzLabel'])?></td>
				  <td><?php echo htmlspecialchars($nSatzDataset['nsatzKomm'])?></td>
				</tr>
	        <?php }} ?>
    </tbody>
  </table>

</div>
</div>