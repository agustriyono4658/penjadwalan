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
					
					<div class="card-body">

						<?php echo form_open('staff/ctkjadmcu/cetak') ?>
						
						<div class="form-group">
								<label for="price">Kode undangan *</label>
								<input class="form-control" type="text" name="kdjad" value="<?php echo $kode;?>" placeholder="Nama Klien" readonly="readonly" />
							</div>
						<div class="card mb-2">
							<div class="card-body">
							<div class="form-group">
								<label for="price">No. Jadwal*</label>
								<select name="no_jdwl" id="no_jdwl" onclick="pelamar()" class="form-control select2" aria-describedby="sizing-addon2">
        							
          							<option value="">Pilih</option>
          							<?php 
          								foreach ($data_jadwal as $key) {
          							?>
          								<option value="<?php echo $key->no_jdwl;?>"><?php echo $key->no_jdwl;?></option>
          							<?php
          								}
          							?>
            						
     							 </select>
							</div>
							<div class="form-group">
								<label for="price">Nama Pelamar*</label>
								<input class="form-control" type="text" id="nmpel" name="nmpel" placeholder="Nama Klien" readonly="readonly" />
							</div>
							<div class="form-group">
								<label for="price">Alamat*</label>
								<input class="form-control" type="text" id="alamat" name="nmklien" placeholder="Alamat" readonly="readonly" />
							</div>
							<div class="form-group">
								<label for="price">Jenis Kelamin*</label>
								<input class="form-control" type="text" id="jnk" name="nmklien" placeholder="Jenis Kelamin" readonly="readonly" />
							</div>
							<div class="form-group">
								<label for="price">No Telepon*</label>
								<input class="form-control" type="text" id="telp" name="nmklien" placeholder="No. Telp" readonly="readonly" />
							</div>
							</div>
						</div>	
							<div class="form-group">
								<label for="price">Tanggal MCU*</label>
								<input class="form-control" type="date" name="tglwan"  placeholder="Tanggal Wawancara"/>
							</div>
							<div class="form-group">
								<label for="price">Klinik*</label>
								<select name="klinik" class="form-control select2" aria-describedby="sizing-addon2">
        							
          							<option value="">Pilih</option>
          							<?php 
          								foreach ($data_klinik as $key) {
          							?>
          								<option value="<?php echo $key->kdklinik;?>"><?php echo $key->nmklinik;?></option>
          							<?php
          								}
          							?>
            						
     							 </select>
							</div>
							<input class="btn btn-success" type="submit" name="btn" value="Cetak" />
						<?php echo form_close() ?>

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
		<script type="text/javascript">
			function pelamar() {
				var no_jdwl = $("#no_jdwl").val();
				$.ajax({
        			url : "<?php echo site_url('staff/ctkjadwan/getdatapelamar/');?>",
					type : "POST",
					dataType : "json",
					data : {
						no_jdwl : no_jdwl
					}, 
					success:function(hasil){
						$("#nmpel").val(hasil.nama);
						$("#alamat").val(hasil.alamat);
						$("#jnk").val(hasil.jnk);
						$("#telp").val(hasil.notelp);
					}
        		});
			}
		</script>
</body>

</html>