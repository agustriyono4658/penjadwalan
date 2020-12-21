<?php
	$datasp = $this->db->query("SELECT * FROM sp INNER JOIN wo ON sp.no_wo = wo.no_wo INNER JOIN detilwo ON wo.no_wo = detilwo.no_wo INNER JOIN klien ON wo.id_klien = klien.id_klien INNER JOIN lokasi ON wo.idlokasi = lokasi.idlokasi WHERE sp.no_sp = '$no_sp'")->row();
?>
<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view("staff/_partials/head.php") ?>
</head>
<body style="padding: 20px; font-size: 17px;" onload="detailwo()">
	<center>
		<h2>PT LOTUS LESTARI RAYA</h2>
		<hr>
		<h3>Surat Pengajuan</h3>
		<p>No. <?php echo $datasp->no_sp;?></p>
	</center>
	<p>
		Mohon untuk dicarikan calon karyawan untuk <b><?php echo $datasp->nmklien;?></b>. Khusus Area <b><?php echo $datasp->nmlokasi;?></b> dengan nomer Work Order <?php echo $datasp->no_wo;?> sebagai berikut:
	</p>
	<div id="detailwo">
		
	</div>
	<br>
	<p style="float: right; margin-right:20px; ">
		Jakarta, <?php echo $datasp->tgl_sp;?>
		<br><br><br>
		<br><br><br>
		(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
	</p>



	<?php $this->load->view("staff/_partials/scrolltop.php") ?>

	<?php $this->load->view("staff/_partials/js.php") ?>

	<script type="text/javascript">
		function detailwo(){
        		var kode_wo = "<?php echo $datasp->no_wo;?>";
        		$("#detailwo").load("<?php echo site_url('staff/workorder/detailwo/');?>" + kode_wo);
        	}
	</script>
	<script type="text/javascript">
		var detik = 1;
          var menit = 0;
              
            function hitung() {
                /** setTimout(hitung, 1000) digunakan untuk 
                    * mengulang atau merefresh halaman selama 1000 (1 detik) 
                */
                setTimeout(hitung,1000);
  
               /** Jika waktu kurang dari 10 menit maka Timer akan berubah menjadi warna merah */
               
                var peringatan = 'style="color:red"';
               
 
               /** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
               $('#waktu').html(
                      '<span class="'+peringatan+'"><i class="fa fa-timer"></i>' + menit + ' menit : ' + detik + ' detik</span>'
                );
  
                /** Melakukan Hitung Mundur dengan Mengurangi variabel detik - 1 */
                detik --;
 
                /** Jika var detik < 0
                    * var detik akan dikembalikan ke 59
                    * Menit akan Berkurang 1
                */
                if(detik < 0) {
                    detik = 59;
                    menit --;
 
                    /** Jika menit < 0
                        * Maka menit akan dikembali ke 59
                        * Jam akan Berkurang 1
                    */
                    if(menit < 0) {
                      
                        window.print();

                    } 
                } 
            }           
            /** Menjalankan Function Hitung Waktu Mundur */
            hitung();
	</script>

</body>
</html>