<?php if ($this->session->flashdata('psn')=="aturberhasil") { ?>
<script>
	iziToast.show({
		timeout:6000,
		color:'blue',
		title:'Berhasil Diedit',
		position: 'topRight',
		pauseOnHover: true,
		transitionIn: true
	})
</script>
<?php } ?>
<?php if ($this->session->flashdata('psn')=="admingagal") { ?>
<script>
	iziToast.show({
		timeout:6000,
		color:'red',
		title:'Admin Sudah Ada',
		position: 'topRight',
		pauseOnHover: true,
		transitionIn: true
	})
</script>
<?php } ?>
<?php if ($this->session->flashdata('psn')=="editgagal") { ?>
<script>
	iziToast.show({
		timeout:6000,
		color:'red',
		title:'Admin Sudah Diedit',
		position: 'topRight',
		pauseOnHover: true,
		transitionIn: true
	})
</script>
<?php } ?>
<?php if ($this->session->flashdata('psn')=="editberhasil") { ?>
<script>
	iziToast.show({
		timeout:6000,
		color:'blue',
		title:'Berhasi Diedit',
		position: 'topRight',
		pauseOnHover: true,
		transitionIn: true
	})
</script>
<?php } ?>
<div class="box box-success">
	<div class="box-header with-border">
		<h4>Pengaturan Nama Sekolah  Dan Denda</h4>
	</div>
	<div class="box-body">
		<form method="post" action="<?php echo base_url('cpengaturan/updatedenda'); ?>">
		<?php foreach ($query->result() as $a) { ?>
			<div class="form-group">
			    <label>Nama Sekolah</label>
			    <input name="nama" type="text" class="form-control" placeholder="" value="<?php echo $a->nama_sekolah; ?>">
			</div>
			<div class="form-group">
			    <label>Denda</label>
			    <input name="denda" type="number" class="form-control" placeholder="" value="<?php echo rp($a->denda); ?>">
			</div>
			<input type="hidden" name="id" value="<?php echo $a->id_p ?>">
	<?php } ?>
		<button class="btn btn-success"><i class="fa fa-check"></i> Simpan Pembaruan</button>
		</form>
	</div>
</div>
<div class="box box-success">
	<div class="box-header">
		<h4>Daftar Admin Perpustakaan</h4>
		<a class="btn btn-primary" data-target="#tambah" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Admin</a>
	</div>
	<div class="box-body">
		<div class="table-responsive">
			<table id="data" class="table table-hover table-bordered">
				<thead> 
					<th>No</th>
					<th>Nama</th>
					<th>Username</th>
					<th>Password</th>
					<th>Opsi</th>
				</thead>
				<tbody>
					<?php $no=1; foreach ($admin as $a) { ?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $a->nama_ad; ?></td>
							<td><?php echo $a->username; ?></td>
							<td><?php echo $a->password; ?></td>
							<td align="center">
								<?php if ($a->username!='wakhid'&&$a->password!='wakhid') { ?>
									<a class="btn btn-xs btn-success" data-target="#edit<?php echo $no; ?>" data-toggle="modal"><i class="fa fa-pencil"></i></a>
								<?php } ?>
							</td>
							<div id="edit<?php echo $no; ?>" class="modal">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											Edit Data Admin <?php echo $a->nama_ad; ?>
										</div>
										<div class="modal-body">
											<form method="post" action="<?php echo base_url('cpengaturan/editadmin'); ?>">
												<div class="form-group">
												    <label>Nama Admin</label>
												    <input name="nama" type="text" class="form-control" placeholder="Nama Admin" autofocus="" required="" value="<?php echo $a->nama_ad; ?>">
												</div>
												<div class="form-group">
												    <label>Username</label>
												    <input value="<?php echo $a->username; ?>" name="user" type="text" class="form-control" placeholder="Username" required="">
												</div>
												<div class="form-group">
												    <label>Password</label>
												    <input value="<?php echo $a->password; ?>" name="pass" type="text" class="form-control" placeholder="Password"  required="">
												</div>
												<input type="hidden" name="id" value="<?php echo $a->id_admin; ?>">
										</div>
										<div class="modal-footer">
												<button class="btn btn-success pull-right"><i class="fa fa-check"></i> Perbarui</button>
											</form>
												<button class="btn btn-danger pull-left pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
										</div>
									</div>
								</div>
							</div>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div id="tambah" class="modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				Tambah Admin Perpustakaan
			</div>
			<div class="modal-body">
				<form method="post" action="<?php echo base_url('cpengaturan/tambahadmin'); ?>">
					<div class="form-group">
					    <label>Nama Admin</label>
					    <input name="nama" type="text" class="form-control" placeholder="Nama Admin" autofocus="" required="">
					</div>
					<div class="form-group">
					    <label>Username</label>
					    <input name="user" type="text" class="form-control" placeholder="Username" required="">
					</div>
					<div class="form-group">
					    <label>Password</label>
					    <input name="pass" type="password" class="form-control" placeholder="Password"  required="">
					</div>
			</div>
					<div class="modal-footer">
					<button class="btn btn-primary pull-right"><i class="fa fa-save"></i> Simpan</button>
				</form>
				<button class="btn btn-danger pull-left pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
					</div>
		</div>
	</div>
</div>