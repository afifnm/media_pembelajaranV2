  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Data Judul Tugas Akhir</li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-xs-9" align="right">
</div>
<div class="col-xs-12">
  <div class="box box-solid">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-database"></i> Data Judul Tugas Akhir</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>No</th>
          <th>NIM</th>
          <th>Nama</th>
          <th width="50%">Judul</th>
          <th>Jenis Penelitian </th>
          <th>Tahap </th>
          <th width="13%" style="text-align: center;">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        foreach ($data2 as $user) {?>
        <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $user['nim']; ?></td>
        <td><?php echo $user['nama']; ?></td>
        <td><?php echo $user['judul']; ?></td>
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
              echo('BERKAS DIVERIKASI');
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
        </td>
        <td align="center">
          <a href="http://<?php echo $user['file1'];?>" class="btn btn-info btn-sm" target="_blank"><i class="fa fa-download"></i></a>
          <a href="<?php echo site_url('sita/skripsi/'.$user['id']);?>" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-search-plus"></i></a>
          <a href="<?php echo site_url('admin/judul/edit/'.$user['id']);?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
          <a href="<?php echo site_url('admin/judul/delete/'.$user['id']);?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
        </td>
        </tr>
        <?php $no++; } ?>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>

</div>