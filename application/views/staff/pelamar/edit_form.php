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
						<a href="<?php echo site_url('staff/pelamar/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<?php echo form_open_multipart('staff/pelamar/update') ?>
						
							<div class="form-group">
								<label for="name">ID Pelamar*
								</label>
								<input class="form-control" type="text" name="id_pel" value="<?php echo $data_klien->id_pel; ?>" readonly="readonly" />
							</div>

							<div class="form-group">
								<label for="price">Nama Pelamar*</label>
								<input class="form-control" type="text" value="<?php echo $data_klien->nmpel; ?>" name="nmpel" placeholder="Nama Klien" />
							</div>

							<div class="form-group">
								<label for="price">Jenis Kelamin*</label>
        							<div class="radio"> <input type="radio" <?php if($data_klien->jenkel == "Laki-laki") echo "checked"; ?> name="jenkel" id="opsi1" value="Laki-laki" > Laki-laki </div>
       								<div class="radio"> <input type="radio" <?php if($data_klien->jenkel == "Perempuan") echo "checked"; ?> name="jenkel" id="opsi2" value="Perempuan"> Perempuan </div>
        					</div>
        					<div class="form-group">
								<label for="price">Alamat*</label>
								<input class="form-control" type="text" value="<?php echo $data_klien->alamatpel; ?>" name="alamat" placeholder="Alamat" />
							</div>
							<div class="form-group">
								<label for="price">Asalkota*</label>
								<select name="asalkota" class="form-control select2" aria-describedby="sizing-addon2">
        							<?php
        								foreach ($data_kota as $kota) {
          							?>
          							<option <?php if($data_klien->asalkota == $kota->nmlokasi) echo "selected"; ?> value="<?php echo $kota->nmlokasi; ?>">
            							<?php echo $kota->nmlokasi; ?>
         							 </option>
          							<?php
       								 	}
        							?>
     							 </select>
							</div>
							<div class="form-group">
								<label for="price">No Telepon*</label>
								<input class="form-control" type="text" value="<?php echo $data_klien->notelp; ?>" name="tlp" min="0" placeholder="Nama Klien" />
							</div>
							
							<div class="form-group">
								<label for="price">Posisi Minat*</label>
								<select name="posisiminat" class="form-control select2" aria-describedby="sizing-addon2">
        							<?php
        								foreach ($data_posisi as $posisi) {
          							?>
          							<option <?php if($data_klien->posisiminat == $posisi->nmpos) echo "selected"; ?> value="<?php echo $posisi->nmpos; ?>">
            							<?php echo $posisi->nmpos; ?>
         							 </option>
          							<?php
       								 	}
        							?>
     							 </select>
							</div>
							<div class="form-group">
								<label for="price">CV*</label>
								<input class="form-control" type="file" value="<?php echo $data_klien->cv; ?>" name="cv" min="0" placeholder="Nama Klien" />
							</div>
							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						<?php echo form_close() ?>

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