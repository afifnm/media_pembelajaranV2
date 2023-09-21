<?php foreach($data2 as $u){ ?>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Verifikasi Berkas Tugas Akhir</li>
    <li class="active"><?php echo $u->nim; ?></li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-xs-9" align="right">
</div>
<div class="col-xs-11">
  <div class="box box-solid" style="padding: 30px;">
    <div class="box-header">
      <h3 class="box-title"> Verifikasi Berkas</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <form class="form-horizontal" action="<?php echo site_url('admin/ujian/updateberkas') ?>" method="POST" enctype="multipart/form-data">
        <div class="box-body">
          <input type="hidden" class="form-control" name="id" value="<?php echo $u->id; ?>">
          <input type="hidden" class="form-control" name="email" value="<?php echo $u->email; ?>">
          <div class="form-group">
            <label class="col-sm-2 control-label">NIM</label>
            <div class="col-sm-5">
              <label class="control-label"><?php echo $u->nim; ?></label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Nama Mahasiswa</label>
            <div class="col-sm-5">
              <label class="control-label"><?php echo $u->nama; ?></label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Judul Penelitian</label>
            <div class="col-sm-5">
              <label class="control-label"><?php echo $u->judul; ?></label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Link berkas</label>
            <div class="col-sm-5">
              <a href="http://<?php echo $u->file2;?>" target="_blank"><?php echo $u->file2;?></a>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Konfirmasi</label>
            <div class="col-sm-5">
              <select class="form-control select2" name="konfirmasi" required>
              <option value="0"> Ditolak</option>
              <option value="1"> Disetujui</option>
              </select>
            </div>
          </div>


          <div class="form-group">
            <label class="col-sm-2 control-label">Catatan</label>
            <div class="col-sm-5">
              <textarea class="form-control" name="catatan" rows="4" required> </textarea>
            </div>
          </div>

        <!-- /.box-body -->
        <div class="box-footer">
        <?php $no_hp = intval($u->no_hp);?>
          <a href="<?php echo site_url('admin/ujian');?>" class="btn btn-default">Cancel</a>
          <a target="_blank" href="https://api.whatsapp.com/send?phone=+62<?=$no_hp;?>&text=Pemberitahuan Mahasiswa | Sistem Informasi Tugas Akhir (SITA) PPKn UNS"
          class="btn btn-success pull-right" style="margin-left:5px;">Whatsapp</a>
          <button type="submit" class="btn btn-success pull-right">Kirim</button>
        </div>
        <!-- /.box-footer -->
      </form>  

    </div>
    <!-- /.box-body -->
  </div>

</div>

<?php } ?>