<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/pewawancara/add') ?>"><i class="fas fa-plus"></i> Tambah Data Pewawancara</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No.</th>
										<th>ID. Pewawancara</th>
										<th>Nama Pewawancara</th>
										<th>No. Telepon</th>
										<th>Alamat</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no =1; 
										foreach ($data_pewawancara as $hasil): 
									?>
									<tr>
										<td>
											<?php echo $no++ ?>
										</td>
										
										<td>
											<?php echo $hasil->id_wan ?>
										</td>
										<td>
											<?php echo $hasil->namawan ?>
										</td>
										<td>
											<?php echo $hasil->telpwan ?>
										</td>
										<td class="small">
											<?php echo substr($hasil->alamatwan, 0, 120) ?>		
										</td>
										<td width="170">
											<a href="<?php echo site_url('admin/pewawancara/edit/'.$hasil->id_wan) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="javascript: return confirm('Apakah anda yakin ingin menghapusnya ??')"
											 href="<?php echo site_url('admin/pewawancara/hapus/'.$hasil->id_wan);?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/js.php") ?>

<script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>

</body>

</html>