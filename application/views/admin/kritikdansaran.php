  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Kritik dan saran</li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-xs-3" align="left">
</div>
<div class="col-xs-9" align="right">
</div>
<div class="col-xs-12">
  <div class="box box-success">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-envelope"></i> Kritik dan saran</h3>
      <a href="<?php echo site_url('admin/kritikdansaran/cetak');?>" class="btn btn-info pull-right" target="_blank"><i class="fa fa-print"></i> &nbsp;&nbsp;Print&nbsp;&nbsp;</a> <label class="pull-right"> &nbsp;</label>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>No</th>
          <th width="20%">Nama</th>
          <th>Email </th>
          <th>No. HP </th>
          <th>Tanggal</th>
          <th width="50%">Kritik dan Saran</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        foreach ($data2 as $user) {?>
        <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $user['nama']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><?php echo $user['no_hp']; ?></td>
        <td><?php echo date('d F Y', strtotime($user['created_at'])).' - '.date('H:i', strtotime($user['created_at'])) ?></td>
        <td><?php echo $user['isi']; ?></td>
        <td align="center">
          <a onClick="return confirm('Apakah anda yakin menghapus data ini?')" 
          href="<?php echo site_url('admin/kritikdansaran/delete/'.$user['id']);?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
        </td>
        </tr>
        <?php $no++; } ?>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>

</div>