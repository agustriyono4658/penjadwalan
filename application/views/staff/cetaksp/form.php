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

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-body">

						<?php echo form_open('staff/cetaksp/cetaksp') ?>
						
							
							<div class="form-group">
							<div class="form-group">
										<label for="price">No SP.</label>
										<input class="form-control" type="text" value="<?php echo $kode;?>" name="nosp" readonly="readonly" />
									</div>

							<div class="form-group">
										<label for="price">Tanggal</label>
										<input class="form-control" type="date" id="tgl" name="tgl" placeholder="Nama Klien" required="required" />
									</div>
								<label for="price">No Wo*</label>
								<select name="no_wo" onclick="detailwo()" id="no_wo" class="form-control select2" aria-describedby="sizing-addon2">
									<option value="">Pilih</option>
        							<?php
        								foreach ($data_wo as $wo) {
          							?>
          							<option value="<?php echo $wo->no_wo; ?>">
            							<?php echo $wo->no_wo; ?>
         							 </option>
          							<?php
       								 	}
        							?>
     							 </select>
							</div>
									<div class="form-group">
										<label for="price">klien</label>
										<input class="form-control" type="text" id="nmklien" name="nmklien" placeholder="Nama Klien" readonly="readonly" />
									</div>
										<div id="detailwo">
											
										</div>

							<input class="btn btn-success" type="submit" name="btn" value="Cetak SP" />
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


		<?php $this->load->view("staff/_partials/scrolltop.php") ?>

		<?php $this->load->view("staff/_partials/js.php") ?>

        
		<script type="text/javascript">
            $(document).ready(function () {
                $('.tglwo').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
            });
        </script>
        <script type="text/javascript">
        	function detailwo(){
        		var kode_wo = $("#no_wo").val();
        		$("#detailwo").load("<?php echo site_url('staff/workorder/detailwo/');?>" + kode_wo);
        		$.ajax({
        			url : "<?php echo site_url('staff/cetaksp/getdatawo/');?>"+kode_wo,
					type : "POST",
					dataType : "json",
					data : {
						no_wo : kode_wo
					}, 
					success:function(hasil){
						$("#nmklien").val(hasil.klien);
					}
        		});
        	}
        </script>

</body>

</html>