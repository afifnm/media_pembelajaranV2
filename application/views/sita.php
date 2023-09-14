<!DOCTYPE html>
<html lang="en">
<?php require_once('layout/_cssFE.php');?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<body>
  <div id="wrapper">
    <!-- start header -->
    <?php require_once('layout/_headerFE.php');?>
    <script src="<?php echo base_url('assets');?>/vendor/chart/Chart.js" type="text/javascript" ></script>

    <!-- end header -->

    <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="inner-heading">
              <center><h2>Sistem Informasi Tugas Akhir (SITA)</h2></center>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="cta-box">
              <div class="row">
                <div class="span12">
                  <div class="cta-text">
                    <h4>INFORMASI</h4>
                      <div class="box-body" style="padding-bottom: 0; padding-top: 0; font-size: 16px; font-weight: 500">
                        Sistem Informasi Tugas Akhir (SITA) merupakan inovasi Laboratorium Program Studi PPKn FKIP UNS,dengan tujuan untuk pendataan,pengelolaan dan pemantauan skripsi guna meningkatkan Angka Efisiensi Edukasi (AEE).
                        Untuk pusat bantuan silahkan join grup telegram <a href="https://t.me/+J7JVqux8c8g1Yzk1" target="_blank">Klik disini untuk bergabung</a>
                      </div>
                      <a style="margin: 10px;" href="<?php echo base_url('assets/upload/file/FORM_PENGAJUAN_JUDUL_SKRIPSI_PPKN_2019.doc'); ?>" class="btn btn-inverse pull-right">Formulir Judul</a>
                      <a style="margin: 10px;" href="<?php echo base_url('assets/upload/images/skema.jpg'); ?>" data-pretty="prettyPhoto[gallery1]" class="btn btn-inverse pull-right">Alur Tugas Akhir</a>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="span6">
            <div class="pricing-box-plain">
              <div class="heading">
                <h4>PENDAFTARAN JUDUL</h4>
              </div>
              <div class="action">
                <a href="<?php echo site_url('sita/judul');?>" class="btn btn-inverse">&nbsp;&nbsp;&nbsp;Daftar&nbsp;&nbsp;&nbsp;</a>
              </div>
            </div>
          </div>
          <div class="span6">
            <div class="pricing-box-plain">
              <div class="heading">
                <h4>PENDAFTARAN UJIAN</h4>
              </div>
              <div class="action">
                <a href="<?php echo site_url('sita/ujian');?>" class="btn btn-inverse">&nbsp;&nbsp;&nbsp;Daftar&nbsp;&nbsp;&nbsp;</a>
              </div>
            </div>
          </div>
        </div>

        <!-- divider -->
        <div class="row">
          <div class="span12">
            <div class="solidline"></div>
          </div>
        </div>
        <!-- end divider -->


      <div class="row">
          <div class="span6">
            <div class="pricing-box-plain" style="padding-bottom: 10px;">
            <div class="heading">
                <span>Rekapitulasi Pendaftaran Judul dan Ujian Skripsi Program Studi S1 PPKn FKIP UNS</span>
              </div>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Angkatan </th>
                      <th>Jumlah</th>
                      <th>Mendaftar Judul</th>
                      <th>Mendaftar Ujian </th>
                      <th>Sudah Ujian</th>             
                    </tr>
                  </thead>  
                <tbody>
                <?php for ($i=0; $i <= 4; $i++){ ?>
                <tr>
                  <td>
                    <span class="label label-info">
                      <?php echo date("Y")-4+$i-2;  ?>
                    </span>
                  </td>
                  <td>
                    <span class="label label-info">
                    <?php echo $jumlah=$this->CRUD_model->jumlahangkatan(6-$i);  ?>
                    </span>
                  </td>
                  <td>
                    <span class="label label-primary">
                      <?php echo $this->CRUD_model->daftarjudul(6-$i); ?>
                    </span>
                  </td>
                  <td>
                    <span class="label label-warning">
                      <?php echo $this->CRUD_model->ujian(4,6-$i)+$this->CRUD_model->ujian(5,6-$i); ?>
                    </span>
                  </td>
                  <td>
                  <span class="label label-success">
                      <?php echo $sudah=$this->CRUD_model->ujian(6,6-$i);
                      if(($jumlah==0) OR ($sudah==0)){
                        $persen = 0;
                      } else {
                        $persen = $sudah/$jumlah*100;
                      }
                      ?>
                    </span>
                    <span class="label label-success">
                      <?php echo number_format($persen,0);?>%
                    </span>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="span6">
            <div class="pricing-box-plain">
            <div class="heading">
                <span>Rekapitulasi Skripsi Berdasarkan Jenis Penelitian</span>
              </div>
              <div>
                <canvas id="jenispenelitian"></canvas>
              </div>
            </div>
          </div>
      </div>

      <div class="row">
          <div class="span12">
            <div class="pricing-box-plain">
            <div class="heading">
                <span>Data Pengajuan Judul & Pendaftaran Ujian Skripsi Program Studi PPKn</span>
              </div>
              <table class="table table-stripped table-hover datatab">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIM</th>
                      <th>Nama</th>
                      <th>Judul</th>
                      <th>Jenis Penelitian </th>
                      <th>Tahap </th>                      
                    </tr>
                  </thead>  
                <tbody>
                <?php 
                $no = 1;
                foreach ($data2utama as $user) {?>    
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $user['nim']; ?></td>
                  <td><?php echo $user['nama']; ?></td>
                  <td><?php echo $user['judul']; ?></a></td>
                  <td><?php echo $user['jenis_penelitian']; ?></td>
                  <td> 
                    <?php 
                    if($user['tahap']==1){
                      echo '<span class="label label-primary">';
                      echo('MENDAFTAR JUDUL');
                      echo '</span>';
                    } elseif($user['tahap']==2){
                      echo '<span class="label label-info">';
                      echo('MENDAFTAR UJIAN');
                      echo '</span>';
                    } elseif($user['tahap']==3){
                      echo '<span class="label label-info">';
                      echo('BERKAS DITOLAK');
                      echo '</span>';
                    } elseif($user['tahap']==4){
                      echo '<span class="label label-info">';
                      echo('BERKAS DIVERIFIKASI');
                      echo '</span>';
                    } elseif($user['tahap']==5){
                      echo '<span class="label label-success">';
                      echo('TIM PENGUJI DITETAPKAN');
                      echo '</span>';
                    } elseif($user['tahap']==6){
                      echo '<span class="label label-success">';
                      echo('SUDAH UJIAN');
                      echo '</span>';
                    } ?>
                    <a href="<?php echo site_url('sita/skripsi/'.$user['id']);?>">
                    <span class="label label-success">LIHAT </span> </a>
                  </td>
                </tr>
                <?php $no++; } ?>
                <?php 
                foreach ($data2 as $user) {?>    
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $user['nim']; ?></td>
                  <td><?php echo $user['nama']; ?></td>
                  <td><?php echo $user['judul']; ?></a></td>
                  <td><?php echo $user['jenis_penelitian']; ?></td>
                  <td> 
                    <?php 
                    if($user['tahap']==1){
                      echo '<span class="label label-primary">';
                      echo('MENDAFTAR JUDUL');
                      echo '</span>';
                    } elseif($user['tahap']==2){
                      echo '<span class="label label-primary">';
                      echo('MENDAFTAR UJIAN');
                      echo '</span>';
                    } elseif($user['tahap']==3){
                      echo '<span class="label label-info">';
                      echo('BERKAS DITOLAK');
                      echo '</span>';
                    } elseif($user['tahap']==4){
                      echo '<span class="label label-info">';
                      echo('BERKAS DIVERIFIKASI');
                      echo '</span>';
                    } elseif($user['tahap']==5){
                      echo '<span class="label label-success">';
                      echo('TIM PENGUJI DITETAPKAN');
                      echo '</span>';
                    } elseif($user['tahap']==6){
                      echo '<span class="label label-success">';
                      echo('SUDAH UJIAN');
                      echo '</span>';
                    } ?>
                    <a href="<?php echo site_url('sita/skripsi/'.$user['id']);?>">
                    <span class="label label-success">LIHAT </span> </a>
                  </td>
                </tr>
                <?php $no++; } ?>
                </tbody>
                </table>
            </div>
          </div>
      </div>

      <div class="row">
          <div class="span12">
            <div class="pricing-box-plain">
            <div class="heading">
                <span>Rekapitulasi Pengujian dan Pembimbingan Program Studi PPKn FKIP UNS</span>
              </div>
              <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Dosen </th>
                      <th>Pembimbing 1</th>
                      <th>Pembimbing 2 </th>
                      <th style="text-align: center;">Ketua Penguji </th>  
                      <th style="text-align: center;">Sekretaris </th>                      
                    </tr>
                  </thead>  
                <tbody>
                <?php 
                $no = 1;
                foreach ($data3 as $user) {?>    
                <tr>
                  <td><?php echo $no; ?></td>
                  <td>
                    <a href="<?php echo site_url('sita/bimbingan/'.$user['id_dosen']);?>"><?php echo $user['nama']; ?></a>
                    <a href="<?php echo site_url('sita/bimbingan/'.$user['id_dosen']);?>"><span class="label label-info pull-right">DETAIL </span></a>
                  </td>
                  <td>
                    <span class="label label-warning"> <?php echo $this->CRUD_model->pembimbing1($user['id_dosen']); ?> </span>
                    <span class="label label-success"> <?php echo $this->CRUD_model->lulus('dosen1',$user['id_dosen']); ?> </span>
                    <span class="label label-primary"> 
                      <?php echo $this->CRUD_model->pembimbing1($user['id_dosen'])-$this->CRUD_model->lulus('dosen1',$user['id_dosen']); ?> 
                    </span>
                  </td>
                  <td>
                    <span class="label label-warning"> <?php echo $this->CRUD_model->pembimbing2($user['id_dosen']); ?> </span>
                    <span class="label label-success"> <?php echo $this->CRUD_model->lulus('dosen2',$user['id_dosen']); ?> </span>
                    <span class="label label-primary"> 
                      <?php echo $this->CRUD_model->pembimbing2($user['id_dosen'])-$this->CRUD_model->lulus('dosen2',$user['id_dosen']); ?> 
                    </span>
                  </td>
                  <th style="text-align: center;"><span class="label label-warning"><?php echo $this->CRUD_model->ketua($user['id_dosen']); ?></span></td>
                  <th style="text-align: center;"><span class="label label-warning"><?php echo $this->CRUD_model->sekretaris($user['id_dosen']); ?></span></td>
                </tr>
                <?php $no++; } ?>
                </tbody>
                </table>
                <span class="label label-warning"> JUMLAH </span> <span class="label label-success"> SUDAH UJIAN </span>
                <span class="label label-primary"> BELUM UJIAN </span>
            </div>
          </div>
      </div>
    </section>
    <?php require_once('layout/_footerFE.php');?>
  </div>
  <a href="#" class="scrollup"><i class="icon-angle-up icon-rounded icon-bglight icon-2x"></i></a>
<?php require_once('layout/_jsFE.php');
$s1 = $this->CRUD_model->jenis_penelitian('Kuali');
$s2 = $this->CRUD_model->jenis_penelitian('Kuanti');
$s3 = $this->CRUD_model->jenis_penelitian('Kelas');
$s4 = $this->CRUD_model->jenis_penelitian('Mixed');
$s5 = $this->CRUD_model->jenis_penelitian('Deve');
$total = $s1+$s2+$s3+$s4+$s5;
$persen1 = round($s1/$total , 4)*100; 
$persen2 = round($s2/$total , 4)*100; 
$persen3 = round($s3/$total , 4)*100; 
$persen4 = round($s4/$total , 4)*100; 
$persen5 = round($s5/$total , 4)*100; 
?>
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
  $('.datatab').DataTable();
} );
</script>

<script>
  var ctx = document.getElementById("jenispenelitian").getContext('2d');
  var jenispenelitian = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ["<?php echo 'Kualitatif '.$persen1.'%' ?>","<?php echo 'Kuantitatif '.$persen2.'%' ?>","<?php echo 'PTK '.$persen3.'%' ?>","<?php echo 'Mixed Method '.$persen4.'%' ?>", "<?php echo 'RnD '.$persen5.'%' ?>"],
      datasets: [{
        label: '',
        data: [<?php echo $s1.','.$s2.','.$s3.','.$s4.','.$s5 ?>],
        backgroundColor: [
        'rgba(244, 66, 66, 0.7)',
        'rgba(255, 140, 0, 0.7)',
        'rgba(0, 25, 255, 0.7)',
        'rgba(28, 188, 0, 0.7)',
        'rgba(0, 233, 255, 0.7)'
        ]
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });
</script>
<script>
  var ctx = document.getElementById("ujian").getContext('2d');
  var ujian = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ["Sudah", "Belum"],
      datasets: [{
        label: <?php echo $tahun1; ?>,
        data: [<?php echo $sudah1.','.$belum1 ?>],
        backgroundColor: ['rgba(244, 66, 66, 0.7)','rgba(244, 66, 66, 0.7)']
      },
      {
        label: <?php echo $tahun2; ?>,
        data: [<?php echo $sudah2.','.$belum2 ?>],
        backgroundColor: ['rgba(255, 140, 0, 0.7)','rgba(255, 140, 0, 0.7)']
      },
      {
        label: <?php echo $tahun3; ?>,
        data: [<?php echo $sudah3.','.$belum3 ?>],
        backgroundColor: ['rgba(0, 25, 255, 0.7)','rgba(0, 25, 255, 0.7)']
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });
</script>
</body>

</html>