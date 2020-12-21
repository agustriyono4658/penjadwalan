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

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/tempsi/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<?php echo form_open('admin/tempsi/update') ?>
						
							<div class="form-group">
								<label for="name">Kode Tempat Psikotes*</label>
								<input class="form-control" type="text" value="<?php echo $data_tempsi->kdtmpt ?>" name="kdtmpt" readonly="readonly"/>
								<input type="hidden" value="<?php echo $data_tempsi->kdtmpt ?>" name="kdtmpt">
							</div>

							<div class="form-group">
								<label for="price">Nama Tempat Psikotes*</label>
								<input class="form-control" type="text" name="nmtmpt" value="<?php echo $data_tempsi->nmtmpt ?>" placeholder="Nama Tempat Psikotes" />
							</div>


							<div class="form-group">
								<label for="price">No Telepon*</label>
								<input class="form-control" type="text" name="tlptmpt" value="<?php echo $data_tempsi->telptmpt ?>" placeholder="Telepon" />
							</div>


							<div class="form-group">
								<label for="price">Alamat*</label>
								<input class="form-control" type="text" name="alamattmpt" value="<?php echo $data_tempsi->alamattmpt ?>" placeholder="Alamat" />
							</div>
							<input class="btn btn-success" type="submit" name="btn" value="Simpan Perubahan" />
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

</body>

</html>