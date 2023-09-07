  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Navigasi Media Informasi</li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-xs-12" align="left">
  <div class="box-header">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalTambah2"><i class="fa fa-plus"></i> Tambah Main Navigasi Informasi</button>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalTambah"><i class="fa fa-plus"></i> Tambah Kategori Informasi</button>

  </div>
</div>

<div class="col-xs-6">
  <div class="box box-success">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-link"></i> Main Navigasi Media Informasi</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Urutan</th>
          <th>Main Navigasi </th>
          <th style="text-align: center;">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        foreach ($data3 as $user) {?>
        <tr>
        <td><?php echo $user['urutan']; ?></td>
        <td><?php echo $user['main_sub']; ?></td>
        <td align="center">
          <a href="<?php echo site_url('home/subkategori/'.$user['id_main']);?>" class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></a>
          <a href="<?php echo site_url('admin/kategori/edit2/'.$user['id_main']);?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
          <a href="<?php echo site_url('admin/kategori/delete2/'.$user['id_main']);?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
        </td>
        </tr>
        <?php $no++; } ?>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
</div>

<div class="col-xs-6">
  <div class="box box-success">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-link"></i> Kategori Navigasi</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>No</th>
          <th>Main Navigasi</th>
          <th>Kategori</th>
          <th  style="text-align: center;">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        foreach ($data2 as $user) {?>
        <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $user['kategori']; ?></td>
        <td><?php if($user['id_main']==0){ echo('Main Navigasi'); } else {echo $user['main_sub'];}?></td>
        <td align="center">
          <a href="<?php echo site_url('home/kategori/'.$user['id_kategori']);?>" class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></a>
          <a href="<?php echo site_url('admin/kategori/edit/'.$user['id_kategori']);?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
          <a href="<?php echo site_url('admin/kategori/delete/'.$user['id_kategori']);?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
        </td>
        </tr>
        <?php $no++; } ?>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>

</div>

  <div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
      <div class="col-md-11">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel" align="center">Tambah Kategori Informasi
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" action="<?php echo site_url('admin/kategori/simpan') ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label class="col-sm-3 control-label">Kategori</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="kategori" placeholder="Kategori Informasi" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Main Navigasi</label>
              <div class="col-sm-9">
                <select class="form-control select2" name="id_main" required>
                  <?php foreach ($data3 as $user) {?>
                <option value="<?php echo $user['id_main'] ?>">
                  <?php echo $user['main_sub']; ?>
                </option>
                  <?php } ?>
                 <option value="0">Main Navigasi</option>
                </select>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-success pull-right">Simpan</button>
              <br><br>
            </div>
                <!-- /.box-footer -->
          </form>
        </div>
      </div>
      </div>
    </div>
  </div>

    <div class="modal fade" id="ModalTambah2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
      <div class="col-md-11">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel" align="center">Tambah Main Navigasi Informasi
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" action="<?php echo site_url('admin/kategori/simpan2') ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label class="col-sm-3 control-label">Main Navigasi</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="kategori" placeholder="Main Navigasi Informasi" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Urutan</label>
              <div class="col-sm-7">
                <input type="number" class="form-control" name="urutan" placeholder="Urutan di navigasi halaman awal" required>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-success pull-right">Simpan</button>
              <br><br>
            </div>
                <!-- /.box-footer -->
          </form>
        </div>
      </div>
      </div>
    </div>
  </div>