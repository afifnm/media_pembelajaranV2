  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Pendaftaran Tugas Akhir</li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-xs-9" align="right">
</div>
<div class="col-xs-12">
  <div class="box box-solid">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-university"></i> Pendaftaran Tugas Akhir</h3>
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
        <td align="center">
          <?php if($user['tahap']<=3){?>
          <a href="<?php echo site_url('admin/ujian/berkas/'.$user['id']);?>" class="btn btn-success btn-sm">VERIFIKASI</a>
          <a href="http://<?php echo $user['file2'];?>" class="btn btn-info btn-sm" target="_blank">BERKAS</a>
          <?php } if($user['tahap']==4){?>
          <a href="<?php echo site_url('admin/ujian/penguji/'.$user['id']);?>" class="btn btn-success btn-sm">TIM PENGUJI</a>
          <?php } if($user['tahap']==5){?>
            <a href="<?php echo site_url('admin/ujian/selesai/'.$user['id']);?>" class="btn btn-success btn-sm">KONFIRMASI UJIAN SELESAI</a>
          <?php } ?>
        </td>
        </tr>
        <?php $no++; } ?>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>

</div>