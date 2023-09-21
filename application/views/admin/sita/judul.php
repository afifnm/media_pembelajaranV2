<div id="myalert">
	<?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-xs-9" align="right">
</div>
<div class="col-xs-12">
	<div class="box-header">
    <a target="_blank" href="<?php echo site_url('admin/judul/print/'.$id);?>" class="btn btn-info btn-md pull-right">Print</a>
	</div>
	<div class="box box-solid">
		<!-- /.box-header -->
		<div class="box-body">
			<table id="example1" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>NIM</th>
						<th>Nama</th>
						<th width="50%">Judul</th>
						<th>Jenis Penelitian </th>
						<th>Tahap </th>
						<th width="13%" style="text-align: center;">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
        $no = 1;
        foreach ($data2 as $user) {?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $user['nim']; ?></td>
						<td><?php echo $user['nama']; ?></td>
						<td><?php echo $user['judul']; ?></td>
						<td><?php echo $user['jenis_penelitian']; ?></td>
						<td>
							<?php 
            if($user['tahap']==1){
              echo '<span class="label label-primary">';
              echo('MENDAFTAR JUDUL');
              echo '</span>';
            } elseif($user['tahap']==2){
              echo '<span class="label label-primary">';
              echo('MENDAFTAR UJIAN');
              echo '</span>';
            } elseif($user['tahap']==3){
              echo '<span class="label label-info">';
              echo('BERKAS DITOLAK');
              echo '</span>';
            } elseif($user['tahap']==4){
              echo '<span class="label label-info">';
              echo('BERKAS DIVERIKASI');
              echo '</span>';
            } elseif($user['tahap']==5){
              echo '<span class="label label-success">';
              echo('TIM PENGUJI DITETAPKAN');
              echo '</span>';
            } elseif($user['tahap']==6){
              echo '<span class="label label-success">';
              echo('SUDAH UJIAN');
              echo '</span>';
            } ?>
						</td>
						<td align="center">
							<a href="http://<?php echo $user['file1'];?>" class="btn btn-info btn-xs" target="_blank"><i
									class="fa fa-download"></i></a>
							<a href="<?php echo site_url('sita/skripsi/'.$user['id']);?>" class="btn btn-success btn-xs"
								target="_blank"><i class="fa fa-search-plus"></i></a>
							<a href="<?php echo site_url('admin/judul/edit/'.$user['id']);?>" class="btn btn-warning btn-xs"><i
									class="fa fa-edit"></i></a>
							<a onClick="return confirm('Apakah anda yakin menghapus data ini?')"
								href="<?php echo site_url('admin/judul/delete/'.$user['id']);?>" class="btn btn-danger btn-xs"><i
									class="fa fa-trash"></i></a>
						</td>
					</tr>
					<?php $no++; } ?>
				</tbody>
			</table>
		</div>
		<!-- /.box-body -->
	</div>

</div>