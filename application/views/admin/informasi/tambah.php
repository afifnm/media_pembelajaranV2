<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-home"></i> Home</a></li>
	<li><a href="<?php echo site_url('admin/informasi');?>">Data Informasi</a></li>
	<li class="active">Buat Posting</li>
</ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
  <?php $this->session->set_flashdata('alert', ''); ?>
</div>
<div class="col-xs-12">
  <div class="box box-success">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-file"></i> Posting Baru</h3>
    </div>
    <div class="box-body">
      <form class="form-horizontal" action="<?php echo site_url('admin/informasi/simpan') ?>" method="POST" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <label class="col-sm-1 control-label">Judul</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="judul" placeholder="Judul Informasi" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-1 control-label">Kategori</label>
            <div class="col-sm-5">
              <select class="form-control select2" name="kategori" required>
                <?php foreach ($data2 as $user) {?>
              <option value="<?php echo $user['id_kategori'] ?>">
                <?php echo $user['kategori']; ?>
              </option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-1 control-label">Isi</label>
            <div class="col-sm-11">
              <textarea id="mytextarea" rows="10" name="mytextarea" placeholder="Place some text here"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-1 control-label">Foto</label>
            <div class="col-sm-3">
              <input type="file" class="form-control" placeholder="Foto" name="foto">
            </div>
          </div>  
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="<?php echo site_url('admin/informasi');?>" class="btn btn-default">Cancel</a>
          <button type="submit" class="btn btn-success pull-right">Simpan</button>
        </div>
        <!-- /.box-footer -->
      </form>
    </div> 
   </div>
</div>