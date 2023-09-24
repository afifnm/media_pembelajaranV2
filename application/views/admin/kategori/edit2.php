<?php foreach($data2 as $u){ ?>
<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-home"></i> Home</a></li>
  <li><a href="<?php echo site_url('admin/agenda');?>">Kategori Informasi</a></li>
	<li>Perbarui Main Navigasi Informasi</li>
</ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
  <?php $this->session->set_flashdata('alert', ''); ?>
</div>
<div class="col-xs-6">
  <div class="box box-success">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-file"></i> Edit Main Navigasi Informasi</h3>
    </div>
    <div class="box-body">
      <form class="form-horizontal" action="<?php echo site_url('admin/kategori/update2') ?>" method="POST" enctype="multipart/form-data">
        <div class="box-body">
          <input type="hidden" class="form-control" name="id" value="<?php echo $u->id_main; ?>">
            <div class="form-group">
              <label class="col-sm-2 control-label">Main Navigasi</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="kategori" value="<?php echo $u->main_sub; ?>" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Urutan</label>
              <div class="col-sm-7">
                <input type="number" class="form-control" name="urutan" value="<?php echo $u->urutan; ?>" required>
              </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="<?php echo site_url('admin/kategori');?>" class="btn btn-default">Cancel</a>
          <button type="submit" class="btn btn-success pull-right">Simpan</button>
        </div>
        <!-- /.box-footer -->
      </form>
    </div> 
   </div>
</div>
<?php } ?>

