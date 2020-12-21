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
						<a href="<?php echo site_url('admin/posisi/add') ?>"><i class="fas fa-plus"></i> Tambah Data Posisi</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No.</th>
										<th>No. Posisi</th>
										<th>Nama Posisi</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no =1; 
										foreach ($data_posisi as $hasil): 
									?>
									<tr>
										<td>
											<?php echo $no++ ?>
										</td>
										
										<td width="100">
											<?php echo $hasil->id_pos ?>
										</td>
										<td>
											<?php echo $hasil->nmpos ?>
										</td>
										<td width="170">
											<a href="<?php echo site_url('admin/posisi/edit/'.$hasil->id_pos) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="javascript: return confirm('Apakah anda yakin ingin menghapusnya ??')"
											 href="<?php echo site_url('admin/posisi/hapus/');?><?php echo $hasil->id_pos;?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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

</body>

</html>