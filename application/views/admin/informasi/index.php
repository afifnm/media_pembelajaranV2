  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Data Informasi</li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-xs-3" align="left">
  <div class="box-header">
    <a href="<?php echo site_url('admin/informasi/tambah');?>" class="btn btn-success btn-flat"><i class="fa fa-plus-square"></i> Buat Posting</a>
  </div>
</div>
<div class="col-xs-9" align="right">
</div>
<div class="col-xs-12">
  <div class="box box-success">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-newspaper-o"></i> Data Informasi</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>No</th>
          <th width="50%">Judul</th>
          <th> Kategori </th>
          <th>Tanggal Dibuat</th>
          <th width="13%" style="text-align: center;">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        foreach ($data2 as $user) {?>
        <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $user['judul']; ?></td>
        <td><?php echo $user['kategori']; ?></td>
        <td><?php echo longdate_indo($user['tanggal']); ?></td>
        <td align="center">
          <a href="<?php echo site_url('home/info/'.$user['id']);?>" class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></a>
          <a href="<?php echo site_url('admin/informasi/edit/'.$user['id']);?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
          <a href="<?php echo site_url('admin/informasi/delete/'.$user['foto']);?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
        </td>
        </tr>
        <?php $no++; } ?>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>

</div>