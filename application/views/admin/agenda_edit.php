<?php foreach($data2 as $u){ ?>
<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-home"></i> Home</a></li>
  <li><a href="<?php echo site_url('admin/agenda');?>">Agenda Kegiatan</a></li>
	<li>Perbarui Agenda Kegiatan</li>
</ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-xs-12">
  <div class="box box-success">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-file"></i> Edit Agenda Kegiatan</h3>
    </div>
    <div class="box-body">
      <form class="form-horizontal" action="<?php echo site_url('admin/agenda/update') ?>" method="POST" enctype="multipart/form-data">
        <div class="box-body">
          <input type="hidden" class="form-control" name="id" value="<?php echo $u->id; ?>">
          <div class="form-group">
            <label class="col-sm-1 control-label">Isi</label>
            <div class="col-sm-11">
              <textarea id="mytextarea" name="mytextarea" rows="10" placeholder="Place some text here"><?php echo $u->agenda; ?></textarea>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="<?php echo site_url('admin/agenda');?>" class="btn btn-default">Cancel</a>
          <button type="submit" class="btn btn-success pull-right">Simpan</button>
        </div>
        <!-- /.box-footer -->
      </form>
    </div> 
   </div>
</div>
<?php } ?>

