<!DOCTYPE html>
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
						<a href="<?php echo site_url('admin/klinik/add') ?>"><i class="fas fa-plus"></i> Tambah Data Klinik</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No.</th>
										<th>Kode Klinik</th>
										<th>Nama Klinik</th>
										<th>No. Telepon</th>
										<th>Alamat</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no =1; 
										foreach ($data_klinik as $hasil): 
									?>
									<tr>
										<td>
											<?php echo $no++; ?>
										</td>
										
										<td>
											<?php echo $hasil->kdklinik ?>
										</td>
										<td>
											<?php echo $hasil->nmklinik ?>
										</td>
										<td>
											<?php echo $hasil->telpklk ?>
										</td>
										<td class="small">
											<?php echo substr($hasil->alamatklk, 0, 120) ?>		
										</td>
										<td >
											<a href="<?php echo site_url('admin/klinik/edit/'.$hasil->kdklinik) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="javascript: return confirm('Apakah anda yakin ingin menghapusnya ??')"
											 href="<?php echo site_url('admin/klinik/hapus/'.$hasil->kdklinik) ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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
var del = jQuery.noConflict();
function deleteConfirm(url){
	del('#btn-delete').attr('href', url);
	del('#deleteModal').modal();
}
</script>

</body>

</html>