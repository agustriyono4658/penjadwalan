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

				<?php $this->load->view("staff/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('staff/pelamar/add') ?>"><i class="fas fa-plus"></i> Tambah Data Pelamar</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No.</th>
										<th>ID Pelamar</th>
										<th>Nama Pelamar</th>
										<th>Jenis Kelamin</th>
										<th>Alamat</th>
										<th>Asal Kota</th>
										<th>Telepon</th>
										<th>Posisi Minat</th>
										<th>CV</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no =1; 
										foreach ($data_pelamar as $hasil): 
									?>
									<tr>
										<td>
											<?php echo $no++ ?>
										</td>
										
										<td width="100">
											<?php echo $hasil->id_pel ?>
										</td>
										<td>
											<?php echo $hasil->nmpel ?>
										</td>
										<td>
											<?php echo $hasil->jenkel ?>
										</td>
										<td class="small">
											<?php echo substr($hasil->alamatpel, 0, 120) ?>...</td>
										<td>
											<?php echo $hasil->asalkota ?>
										</td>
										<td>
											<?php echo $hasil->notelp ?>
										</td>
										<td>
											<?php echo $hasil->posisiminat ?>
										</td>
										<td>
											<a href="<?php echo base_url();?>assets/datacv/<?php echo $hasil->cv; ?>" target="_blank"><?php echo $hasil->cv;?></a>
										</td>
										<td width="170">
											<a href="<?php echo site_url('staff/pelamar/edit/'.$hasil->id_pel) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onClick="javascript: return confirm('Apakah anda yakin ingin menghapusnya ??')" href="<?php echo site_url('staff/pelamar/hapus'); ?>/<?php echo $hasil->id_pel;?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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
			<?php $this->load->view("staff/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("staff/_partials/scrolltop.php") ?>
	<?php $this->load->view("staff/_partials/js.php") ?>

</body>

</html>