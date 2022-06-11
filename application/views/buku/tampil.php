<?php if ($this->session->flashdata('psn')=="bukedit") { ?>
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
<?php if ($this->session->flashdata('psn')=="buksimpan") { ?>
<script>
	iziToast.show({
		timeout:6000,
		color:'blue',
		title:'Berhasil Disimpan',
		position: 'topRight',
		pauseOnHover: true,
		transitionIn: true
	})
</script>
<?php } ?>
<?php if ($this->session->flashdata('psn')=="bukhapus") { ?>
<script>
	iziToast.show({
		timeout:6000,
		color:'blue',
		title:'Berhasil Dihapus',
		position: 'topRight',
		pauseOnHover: true,
		transitionIn: true
	})
</script>
<?php } ?>
<div class="box box-success">
	<div class="box-header">
		<h4>Daftar Buku Perpus</h4>
		<a class="btn btn-primary" href="<?php echo base_url('cbuku/buktambah'); ?>"><i class="fa fa-plus"></i> Tambah</a>
	</div>
	<div class="box-body">
		<div class="table-responsive">
			<table id="data" class="table table-striped table-hover table-bordered">
				<thead>
					<th>No</th>
					<th>Kode Buku</th>
					<th>Judul Buku</th>
					<th>Tahun Terbit</th>
					<th>Pengarang</th>
					<th>Jumlah Buku</th>
					<th>Opsi</th>
				</thead>
				<tbody>
				<?php $no=1; foreach ($buku->result() as $a) { ?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $a->kode_b; ?></td>
						<td><?php echo $a->judul_b; ?></td>
						<td><?php echo tgl($a->tahun_terbit); ?></td>
						<td><?php echo $a->pengarang; ?></td>
						<td><?php echo $a->jumlah_b; ?></td>
						<td><a class="btn btn-xs btn-success" href="<?php echo base_url('cbuku/editbuk/').$a->id_b; ?>"><i class="fa fa-pencil" title="Edit"></i></a>|<a class="btn btn-xs btn-danger" data-target="#hapus<?php echo $no; ?>" data-toggle="modal"><i class="fa fa-trash-o"></i></a></td>
					</tr>
					<div id="hapus<?php echo $no; ?>" class="modal">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h4>Confirmasi Hapus Data Buku</h4>
									</div>
									<div class="modal-body">		
										<p>Jika Anda Menghapus Data Buku Maka Data Peminjaman Buku <b><?php echo $a->judul_b; ?></b> Akan Ikut terhapus</p>
									</div>
									<div class="modal-footer">		
										<a class="btn btn-primary" href="<?php echo base_url('cbuku/bukhapus/').$a->id_b.'/'.$a->judul_b; ?>"><i class="fa fa-check"></i> Hapus</a>
												<button class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
									</div>
								</div>
							</div>
						</div>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>