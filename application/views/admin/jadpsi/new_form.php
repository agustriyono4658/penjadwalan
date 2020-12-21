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
						<a href="<?php echo site_url('admin/jadpsi/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<?php echo form_open('admin/jadpsi/simpan') ?>
						
						<div class="form-group">
								<label for="price">Kode Jadwal*</label>
								<input class="form-control" type="text" name="kdjad" value="<?php echo $kode;?>" placeholder="Nama Klien" readonly="readonly" />
							</div>
						<div class="card mb-2">
							<div class="card-body">
							<div class="form-group">
								<label for="price">Nama Pelamar*</label>
								<input class="form-control" type="text" id="nmpel" onkeyup="pelamar()" name="nmpel" placeholder="Nama Klien" />
							</div>
							<div class="form-group">
								<label for="price">Alamat*</label>
								<input class="form-control" type="text" id="alamat" name="nmklien" placeholder="Nama Klien" readonly="readonly" />
							</div>
							<div class="form-group">
								<label for="price">Jenis Kelamin*</label>
								<input class="form-control" type="text" id="jnk" name="nmklien" placeholder="Nama Klien" readonly="readonly" />
							</div>
							<div class="form-group">
								<label for="price">No Telepon*</label>
								<input class="form-control" type="text" id="telp" name="nmklien" placeholder="Nama Klien" readonly="readonly" />
							</div>
							</div>
						</div>	
        					<div class="form-group">
								<label for="price">Kode SP*</label>
								<select name="kodesp" class="form-control select2" aria-describedby="sizing-addon2">
        							
          							<option value="">Pilih</option>
            						<?php
            							foreach ($data_sp as $key) {
            						?>
            							<option><?php echo $key->no_sp;?></option>
            						<?php
            							}
            						?>
     							 </select>
							</div>
							<div class="form-group">
								<label for="price">Tanggal wawancara*</label>
								<input class="form-control" type="date" name="tglwan"  placeholder="Tanggal Wawancara" />
							</div>
							
							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						<?php echo form_close() ?>

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
		<script type="text/javascript">
			function pelamar() {
				var nama_pelamar = $("#nmpel").val();
				$.ajax({
        			url : "<?php echo site_url('admin/jadwan/getdatapelamar/');?>",
					type : "POST",
					dataType : "json",
					data : {
						nama_pelamar : nama_pelamar
					}, 
					success:function(hasil){
						$("#alamat").val(hasil.alamat);
						$("#jnk").val(hasil.jnk);
						$("#telp").val(hasil.notelp);
					}
        		});
			}
		</script>
</body>

</html>