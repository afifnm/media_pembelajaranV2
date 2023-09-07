<?php foreach($data2 as $u){ ?>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Data Tugas Akhir</li>
    <li class="active"><?php echo $u->nim; ?></li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-xs-9" align="right">
</div>
<div class="col-xs-12">
  <div class="box box-solid" style="padding: 30px;">
    <div class="box-header">
      <h3 class="box-title"> <?php echo $u->nama; ?> - <?php echo $u->nim; ?></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <form class="form-horizontal" action="<?php echo site_url('admin/judul/update') ?>" method="POST" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <label class="col-sm-2 control-label">Password</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="password" value="<?php echo $u->password; ?>">
              <input type="hidden" class="form-control" name="id" value="<?php echo $u->id; ?>">
              <input type="hidden" class="form-control" name="tahap" value="<?php echo $u->tahap; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Nomor HP</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="no_hp" value="<?php echo $u->no_hp; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-sm-5">
              <input type="email" class="form-control" name="email" value="<?php echo $u->email; ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Dosen Pembimbing 1</label>
            <div class="col-sm-5">
              <select class="form-control select2" name="dosen1" required>
                <?php foreach ($data3 as $user) {?>
              <option value="<?php echo $user['id_dosen'] ?>" <?php if($user['id_dosen']==$u->dosen1){echo"selected";}?>>
                <?php echo $user['nama']; ?>
              </option>
                <?php } ?>
              <option value="0" <?php if(0==$u->dosen1){echo"selected";}?>>
                Belum ada
              </option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Dosen Pembimbing 2</label>
            <div class="col-sm-5">
              <select class="form-control select2" name="dosen2" required>
                <?php foreach ($data3 as $user) {?>
              <option value="<?php echo $user['id_dosen'] ?>" <?php if($user['id_dosen']==$u->dosen2){echo"selected";}?>>
                <?php echo $user['nama']; ?>
              </option>
                <?php } ?>
              <option value="0" <?php if(0==$u->dosen2){echo"selected";}?>>
                Belum ada
              </option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Judul Penelitian</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="judul" value="<?php echo $u->judul; ?>">
            </div>
          </div> 
          <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="judul2" value="<?php echo $u->judul2; ?>">
            </div>
          </div> 

          <?php if($u->tahap>=5){?>
          <div class="form-group">
            <label class="col-sm-2 control-label">Ketua Penguji</label>
            <div class="col-sm-5">
              <select class="form-control select2" name="penguji1" required>
                <?php foreach ($data3 as $user) {?>
              <option value="<?php echo $user['id_dosen'] ?>" <?php if($user['id_dosen']==$u->penguji1){echo"selected";}?>>
                <?php echo $user['nama']; ?>
              </option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Sekretaris</label>
            <div class="col-sm-5">
              <select class="form-control select2" name="penguji2" required>
                <?php foreach ($data3 as $user) {?>
              <option value="<?php echo $user['id_dosen'] ?>" <?php if($user['id_dosen']==$u->penguji2){echo"selected";}?>>
                <?php echo $user['nama']; ?>
              </option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Anggota Penguji 1</label>
            <div class="col-sm-5">
              <select class="form-control select2" name="penguji3" required>
                <?php foreach ($data3 as $user) {?>
              <option value="<?php echo $user['id_dosen'] ?>" <?php if($user['id_dosen']==$u->penguji3){echo"selected";}?>>
                <?php echo $user['nama']; ?>
              </option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Anggota Penguji 2</label>
            <div class="col-sm-5">
              <select class="form-control select2" name="penguji4" required>
                <?php foreach ($data3 as $user) {?>
              <option value="<?php echo $user['id_dosen'] ?>" <?php if($user['id_dosen']==$u->penguji4){echo"selected";}?>>
                <?php echo $user['nama']; ?>
              </option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Tanggal Ujian</label>
            <div class="col-sm-5">
              <input type="date" class="form-control" name="tanggal_ujian" class="form-control" value="<?php echo $u->tanggal_ujian; ?>" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Jam Ujian</label>
            <div class="col-sm-6">
              <div class="col-sm-4" style="padding-left: 0">
                <input type="time" class="form-control" name="jam1" value="<?php echo $u->jam1; ?>" required>
              </div>
              <div class="col-sm-1" style="padding-left: 0">
                SAMPAI
              </div>
              <div class="col-sm-4" style="padding-left: 0">
                <input type="time" class="form-control" name="jam2" value="<?php echo $u->jam2; ?>"required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Ruang</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="ruang" class="form-control" value="<?php echo $u->ruang; ?>" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Catatan</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="catatan" class="form-control" value="<?php echo $u->catatan; ?>"  required>
            </div>
          </div>
        
        <?php }?>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="<?php echo site_url('admin/judul');?>" class="btn btn-default">Cancel</a>
          <button type="submit" class="btn btn-success pull-right">Simpan</button>
        </div>
        <!-- /.box-footer -->
      </form>  

    </div>
    <!-- /.box-body -->
  </div>

</div>
<?php } ?>