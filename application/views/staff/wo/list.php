<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("staff/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("staff/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("staff/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('staff/workorder/add') ?>"><i class="fas fa-plus"></i> Tambah Data WO</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No.</th>
										<th>No. WO</th>
										<th>Tanggal WO</th>
										<th>Lokasi</th>
										<th>Posisi Jabatan</th>
										<th>Jumlah permintaan</th>
										<th>Deskripsi</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
										foreach ($data_wo as $key) {
									?>
									<tr>
										<td>
											1
										</td>
										
										<td width="100">
											<?php echo $key->no_wo;?>
										</td>
										<td>
											<?php echo $key->tgl_wo;?>
										</td>	
										<td>
											<?php echo $key->nmlokasi;?>
										</td>
										<td>
											<?php echo $key->nmpos;?>
										</td>
										<td>
											<?php echo $key->jml;?>
										</td>
										<td>
											<?php echo $key->deskripsi;?>
										</td>
										
										<td width="170">
											<a href="<?php echo site_url('staff/workorder/edit/');?><?php echo $key->no_wo;?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onClick="javascript: return confirm('Apakah anda yakin ingin menghapus No Work Order <?php echo $key->no_wo;?> ??')"
											 href="<?php echo site_url('staff/workorder/hapus/');?><?php echo $key->no_wo;?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php } ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("staff/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("staff/_partials/scrolltop.php") ?>
	<?php $this->load->view("staff/_partials/js.php") ?>

</body>

</html>