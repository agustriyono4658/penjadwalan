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

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
					</div>
					<div class="card-body">

						<?php echo form_open('staff/lapundkategori/cetak') ?>
						
							<div class="form-group">
								<label for="name">Tgl Awal*
								</label>
								<input class="form-control" type="date" id="tglawal" name="tglawal"  />
							</div>

							<div class="form-group">
								<label for="name">Tgl Akhir*
								</label>
								<input class="form-control" type="date" id="tglakhir" name="tglawal"  />
							</div>
							
							
							<input class="btn btn-success" type="button" name="btn" onclick="cetak_wawancara()" value="Cetak undangan wawancara" />
							<input class="btn btn-success" type="button" name="btn" onclick="cetak_psikotest()" value="Cetak undangan psikotes" />
							<input class="btn btn-success" type="button" name="btn" onclick="cetak_mcu()" value="Cetak undangan MCU" />
						<?php echo form_close() ?>

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
		<script type="text/javascript">
			function cetak_wawancara() {
				var tglawal = $("#tglawal").val();
				var tglakhir = $("#tglakhir").val();
				document.location = "<?php echo site_url('staff/lapundkategori/cetak_wawancara/');?>"+tglawal+"/"+tglakhir;
			}

			function cetak_psikotest(){
				var tglawal = $("#tglawal").val();
				var tglakhir = $("#tglakhir").val();
				document.location = "<?php echo site_url('staff/lapundkategori/cetak_psikotest/');?>"+tglawal+"/"+tglakhir;
			}

			function cetak_mcu(){
				var tglawal = $("#tglawal").val();
				var tglakhir = $("#tglakhir").val();
				document.location = "<?php echo site_url('staff/lapundkategori/cetak_mcu/');?>"+tglawal+"/"+tglakhir;
			}
		</script>

</body>

</html>