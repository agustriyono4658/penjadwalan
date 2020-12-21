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
						DATA PELAMAR
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
											<?php echo $hasil->cv ?>
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