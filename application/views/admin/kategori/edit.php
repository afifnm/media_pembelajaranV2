<?php foreach($data2 as $u){ ?>
<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-home"></i> Home</a></li>
  <li><a href="<?php echo site_url('admin/agenda');?>">Kategori Informasi</a></li>
	<li>Perbarui Kategori Informasi</li>
</ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-xs-6">
  <div class="box box-success">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-file"></i> Edit Kategori Informasi</h3>
    </div>
    <div class="box-body">
      <form class="form-horizontal" action="<?php echo site_url('admin/kategori/update') ?>" method="POST" enctype="multipart/form-data">
        <div class="box-body">
          <input type="hidden" class="form-control" name="id" value="<?php echo $u->id_kategori; ?>">
            <div class="form-group">
              <label class="col-sm-2 control-label">Kategori</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="kategori" value="<?php echo $u->kategori; ?>" required>
              </div>
            </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Main Navigasi</label>
            <div class="col-sm-7">
              <select class="form-control select2" name="id_main" required>
                <?php foreach ($data3 as $user) {?>
              <option value="<?php echo $user['id_main'] ?>" <?php if($user['id_main']==$u->id_main){echo"selected";}?>>
                <?php echo $user['main_sub']; ?>
              </option>
                <?php } ?>
              <option value="0" <?php if(0==$u->id_main){echo"selected";}?>>
                Main Navigasi
              </option>
              </select>
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

