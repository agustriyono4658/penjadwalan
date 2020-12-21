<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("staff/_partials/head.php") ?>
</head>

<body id="page-top" onload="detailwo()">

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
						<a href="<?php echo site_url('staff/workorder/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<?php echo form_open('staff/workorder/simpan') ?>
						
							<div class="form-group">
								<label for="name">No WO*
								</label>
								<input class="form-control" type="text" id="no_wo" name="no_wo" value="<?php echo $kode; ?>" readonly="readonly" />
							</div>
							<div class="form-group">
								<label for="price">Tgl. WO*</label>
								<input class="form-control" type="date" name="tglwo" id="tglwo" placeholder="Nama Klien" required="required" />
							</div>
							<div class="form-group">
								<label for="price">Klien*</label>
								<select name="klien" class="form-control select2" aria-describedby="sizing-addon2">
        							<?php
        								foreach ($data_klien as $klien) {
          							?>
          							<option value="<?php echo $klien->id_klien; ?>">
            							<?php echo $klien->nmklien; ?>
         							 </option>
          							<?php
       								 	}
        							?>
     							 </select>
							</div>
							<div class="form-group">
								<label for="price">lokasi*</label>
								<select name="asalkota" class="form-control select2" aria-describedby="sizing-addon2">
        							<?php
        								foreach ($data_kota as $kota) {
          							?>
          							<option value="<?php echo $kota->idlokasi; ?>">
            							<?php echo $kota->nmlokasi; ?>
         							 </option>
          							<?php
       								 	}
        							?>
     							 </select>
							</div>
							<div class="card mb-2">
								<div class="card-body">
									<div class="form-group">
										<label for="price">Posisi Jabatan*</label>
										<select name="posisi" id="id_pos" class="form-control select2" aria-describedby="sizing-addon2">
        								<?php
        									foreach ($data_posisi as $posisi) {
          								?>
          								<option value="<?php echo $posisi->id_pos; ?>">
            							<?php echo $posisi->nmpos; ?>
         								 </option>
          								<?php
       								 		}
        								?>
     							 		</select>
									</div>
									<div class="form-group">
										<label for="price">Jumlah Permintaan*</label>
										<input class="form-control" type="text" id="jml" name="nmklien" placeholder="0" />
									</div>
									<div class="form-group">
  										<label for="desk">Deskripsi:</label>
  										<textarea class="form-control" rows="3" id="deskripsi" name="deskripsi"></textarea>
									</div>
									
										<input class="btn btn-success" type="button" onclick="tambah_detailwo()" name="btn" value="add" />
										
										<div id="detailwo">
											
										</div>

								</div>
							</div>
      
							<input class="btn btn-success" type="submit" name="btn" value="Save" />
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
            $(document).ready(function () {
                $('tglwo').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
            });
        </script>
        <script type="text/javascript">
        	function tambah_detailwo(){
        		var id_posisi = $("#id_pos").val();
        		var jumlah = $("#jml").val();
        		var deskripsi = $("#deskripsi").val();
        		var no_wo = $("#no_wo").val();

        		$.ajax({
        			url : "<?php echo site_url('staff/workorder/tambah_detail');?>",
					type : "POST",
					dataType : "json",
					data : {
						no_wo : no_wo,
						id_pos : id_posisi,
						jml : jumlah,
						deskripsi : deskripsi
					}, 
					success:function(hasil){
						if (hasil.hasil == "berhasil") {
							detailwo();
							$("#jml").val("");
							$("#deskripsi").val("");
						}
					}
        		});
        	}

        	function detailwo(){
        		var kode_wo = $("#no_wo").val();
        		$("#detailwo").load("<?php echo site_url('staff/workorder/detailwo/');?>" + kode_wo);
        	}
        </script>

</body>

</html>