<?php

  $pelamar =  $this->db->get('pelamar')->num_rows();
  $jadwal_wa =  $this->db->query("SELECT * FROM jadwal WHERE kategori = 'Wawancara'")->num_rows();
  $jadwal_psi =  $this->db->query("SELECT * FROM jadwal WHERE kategori = 'Psikotes'")->num_rows();
  $jadwal_mcu =  $this->db->query("SELECT * FROM jadwal WHERE kategori = 'MCU'")->num_rows(); 

?>
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


          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                  </div>
                  <div class="mr-5"><?php echo $pelamar;?> DATA PELAMAR</div>
                </div>
                
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5"><?php echo $jadwal_wa;?> JADWAL WAWANCARA</div>
                </div>
                
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  <div class="mr-5"><?php echo $jadwal_psi;?> JADWAL PSIKOTES</div>
                </div>
               
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-life-ring"></i>
                  </div>
                  <div class="mr-5"><?php echo $jadwal_mcu;?> JADWAL MEDICAL CHECKUP</div>
                </div>
                
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
    
</body>
</html>