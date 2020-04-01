
 <?php
 ?>
<div id="outputNSatz" class="outputNSatz">
  <table class="">
    <thead>
		<tr>
		  <th>Nachruestart </th>
		  <th>Nachruestsatz</th>
		  <th>Kommentar </th>
		</tr>
    </thead>
    <tbody>
			<?php if($nSatzData != ''){ foreach ($nSatzData as $nSatzDataset) { //Ausgabe der Suchergbnisse?>
    	        <tr id="<?php echo $masterID;?>">
		          <td><?php echo isset($nSatzDataset['nartLabel'])? htmlspecialchars($nSatzDataset['nartLabel']):'NULL'?></td>
		          <td><?php echo isset($nSatzDataset['nsatzLabel'])? htmlspecialchars($nSatzDataset['nsatzLabel']):'kein Nachruestsatz vorhanden'?></td>
				  <td><?php echo isset($nSatzDataset['nsatzLabel'])? htmlspecialchars($nSatzDataset['nsatzLabel']):'kein Nachruestsatz vorhanden'?></td>
				</tr>
	        <?php };}; ?>
    </tbody>
  </table>
</div>