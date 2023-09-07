<?php foreach($data2 as $u){ ?>
<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-home"></i> Home</a></li>
  <li><a href="<?php echo site_url('admin/mahasiswa');?>">Data Mahasiswa</a></li>
	<li>Perbarui Data Mahasiswa</li>
</ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-xs-6">
  <div class="box box-solid">
    <div class="box-header">
      <h3 class="box-title">Edit Data Mahasiswa </h3>
    </div>
    <div class="box-body">
      <form class="form-horizontal" action="<?php echo site_url('admin/mahasiswa/update') ?>" method="POST" enctype="multipart/form-data">
        <div class="box-body">
          <input type="hidden" class="form-control" name="id" value="<?php echo $u->id; ?>">
            <div class="form-group">
              <label class="col-sm-2 control-label">NIM</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="nim" value="<?php echo $u->nim; ?>" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Mahasiswa</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="nama" value="<?php echo $u->nama; ?>" required>
              </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="<?php echo site_url('admin/mahasiswa');?>" class="btn btn-default">Cancel</a>
          <button type="submit" class="btn btn-success pull-right">Simpan</button>
        </div>
        <!-- /.box-footer -->
      </form>
    </div> 
   </div>
</div>
<?php } ?>

