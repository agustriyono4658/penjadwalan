<div class="card mb-1">
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">No.</th>
	      <th scope="col">Nama Posisi</th>
	      <th scope="col">Jumlah Permintaan</th>
	      <th scope="col">Deskripsi</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php
	  		$no = 0;
	  		foreach ($data_detailwo as $key) {
	  			$no++;
	  	?>
	    <tr>
	      <th scope="row"><?php echo $no;?>.</th>
	      <td><?php echo $key->nmpos;?></td>
	      <td><?php echo $key->jml;?></td>
	      <td><?php echo $key->deskripsi;?></td>
	    </tr>
		<?php } ?>
	  </tbody>
	</table>
</div>