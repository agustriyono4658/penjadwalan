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
						<a href="<?php echo site_url('admin/jadwan/add') ?>"><i class="fas fa-plus"></i> Buat Jadwal Wawancara</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No.</th>
										<th>No. Jadwal</th>
										<th>No. SP</th>
										<th>Nama Pelamar</th>
										<th>Tanggal wawancara</th>
										<th>Posisi minat</th>
										<th>Lokasi</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no=0;
										foreach ($data_jadwal as $key) {
											$no++;
									?>
									<tr>
										<td>
											<?php echo $no;?>
										</td>
										<td>
											<?php echo $key->no_jdwl;?>
										</td>
										<td>
											<?php echo $key->no_sp;?>
										</td>
										<td>
											<?php echo $key->nmpel;?>
										</td>
										<td>
											<?php echo $key->tgl_jdwl;?>
										</td>
										<td>
											<?php echo $key->posisiminat;?>
										</td>
										<td>
											<?php echo $key->nmlokasi;?>
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