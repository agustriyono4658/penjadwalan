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
						<a href="<?php echo site_url('admin/pewawancara/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<?php echo form_open('admin/pewawancara/update') ?>
						
							<div class="form-group">
								<label for="name">ID Pewawancara*</label>
								<input class="form-control" type="text" value="<?php echo $data_pewawancara->id_wan ?>" name="id_wan" readonly="readonly"/>
								<input type="hidden" value="<?php echo $data_pewawancara->id_wan ?>" name="id_wan">
							</div>

							<div class="form-group">
								<label for="price">Nama Pewawancara*</label>
								<input class="form-control" type="text" name="nmwan" value="<?php echo $data_pewawancara->namawan ?>" placeholder="Nama Pewawancara" />
							</div>


							<div class="form-group">
								<label for="price">No Telepon*</label>
								<input class="form-control" type="text" name="tlpwan" value="<?php echo $data_pewawancara->telpwan ?>" placeholder="Telepon Pewawancara" />
							</div>


							<div class="form-group">
								<label for="price">Alamat*</label>
								<input class="form-control" type="text" name="alamatwan" value="<?php echo $data_pewawancara->alamatwan ?>" placeholder="Alamat Pewawancara" />
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