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

        <!-- 
        karena ini halaman overview (home), kita matikan partial breadcrumb.
        Jika anda ingin mengampilkan breadcrumb di halaman overview,
        silahkan hilangkan komentar (//) di tag PHP di bawah.
        -->
    <?php //$this->load->view("admin/_partials/breadcrumb.php") ?>

		<div class="row">
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-primary o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-comments"></i>
				</div>
				<div class="mr-5">LAPORAN DATA PELAMAR</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="lappelamar">
				<span class="float-left">cetak</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>s
				</a>
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-warning o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-list"></i>
				</div>
				<div class="mr-5">LAPORAN DATA KLIEN</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="lapklien">
				<span class="float-left">cetak</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-success o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-shopping-cart"></i>
				</div>
				<div class="mr-5">LAPORAN LAMARAN PER KLIEN</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('staff/laplamaranklien/cetak');?>">
				<span class="float-left">cetak</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			
			</div>
		</div>
		<div class="row">
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-primary o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-comments"></i>
				</div>
				<div class="mr-5">LAPORAN SURAT PENGAJUAN</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="lapsp">
				<span class="float-left">cetak</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>s
				</a>
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-warning o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-list"></i>
				</div>
				<div class="mr-5">LAPORAN JADWAL PERKATEGORI</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="lapjadkategori">
				<span class="float-left">cetak</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-success o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-shopping-cart"></i>
				</div>
				<div class="mr-5">LAPORAN UNDANGAN PERKATEGORI</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="lapundkategori">
				<span class="float-left">Cetak</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			
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