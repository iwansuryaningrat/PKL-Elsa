<?php if ($this->session->flashdata('psn')=="kembaligagal") { ?>
<script>
	iziToast.show({
		timeout:6000,
		color:'red',
		title:'Sudah Dikembalikan',
		position: 'topRight',
		pauseOnHover: true,
		transitionIn: true
	})
</script>
<?php } ?>
<?php if ($this->session->flashdata('psn')=="kembaliberhasil") { ?>
<script>
	iziToast.show({
		timeout:6000,
		color:'blue',
		title:'Berhasil Dikembalikan',
		position: 'topRight',
		pauseOnHover: true,
		transitionIn: true
	})
</script>
<?php } ?>
<?php if ($this->session->flashdata('psn')=="panjangberhasil") { ?>
<script>
	iziToast.show({
		timeout:6000,
		color:'blue',
		title:'Berhasil Diperpanjang',
		position: 'topRight',
		pauseOnHover: true,
		transitionIn: true
	})
</script>
<?php } ?>
<?php if ($this->session->flashdata('psn')=="panjanggagal") { ?>
<script>
	iziToast.show({
		timeout:6000,
		color:'red',
		title:'Sudah Diperpanjang Diperpanjang',
		position: 'topRight',
		pauseOnHover: true,
		transitionIn: true
	})
</script>
<?php } ?>
<div class="box box-success">
	<div class="box-header">
		<h4>Daftar Peminjaman</h4>
<!--
		<a class="btn btn-primary" href="<?php echo base_url('cpinjam/tambahpinjam'); ?>"><i class="fa fa-plus"></i> Input Peminjaman</a>

	-->

	</div>
	<div class="box-body">
		<div class="table-responsive">
			<table id="data" class="table table-bordered table-hover">
				<thead>
					<th>No</th>
         <th>Nama Peminajam</th>
         <th>Kelas</th>
         <th>Buku</th>
         <th>Tanggal Pinjam</th>
         <th>Tanggal Kembali</th>
         <th>Telat</th>
         <th>Denda</th>
         <th>Jumlah Pinjam</th>
         <th>Status</th>
         <th>Nama Petugas</th>
         <th width="18%">Opsi</th>
				</thead>
					<tbody>
						<?php $data = $denda->row_array(); ?>
				<?php $no = 1; foreach ($pinjam->result() as $a) { ?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $a->nama_a; ?></td>
							<td><?php echo $a->nama_k; ?></td>
							<td><?php echo $a->kode_b; ?> - <?php echo $a->judul_b; ?></td>
							<td><?php echo tgl($a->tanggal_pinjam); ?></td>
							<td><?php echo tgl($a->tanggal_kembali); ?></td>
							<?php //telat
                    
                $tglsek= date('Y-m-d');
                if($a->tanggal_kembali<$tglsek){
                  $tglkem= $a->tanggal_kembali;
                  $telat= selisih($tglkem,$tglsek); 
                  $denda= $telat*$data['denda'];
                  // $this->ci->sendmail($a->email,$telat,$a->nama_a);
                }
                else {
                  $telat= 0;
                 $denda= 0;
                }
              ?>
							<td><?php echo $telat; ?> hari</td>
							<td><?php echo rp($denda); ?></td>
							<td><?php echo $a->jumlah_pinjam; ?></td>
							<td>
								<?php 
								if ($a->status== "T") {
									echo '<small class="label bg-green">Diperpanjang</small>';
								}elseif ($a->status== "P") {
									echo '<small class="label bg-primary">Dipinjam</small>';
								}
								 ?>
							</td>
							<td><?php echo $a->nama_ad; ?></td>
							<td style="position: center;"><a class="btn btn-xs btn-primary" data-target="#kembali<?php echo $no; ?>" data-toggle="modal" ><i class="fa fa-check"></i> Kembalikan</a><br>|<br><a class="btn btn-xs btn-success" data-target="#panjang<?php echo $no; ?>" data-toggle="modal"><i class="fa fa-arrows-h"></i> Perpanjang</a></td>
						<div id="kembali<?php echo $no; ?>" class="modal">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										Confirmasi Pengembalian Buku
									</div>
									<div class="modal-body">
										Yakin Ingin Mengembalian Buku Dengan Rincian : <br>
										<ul>
											<li>Nama : <?php echo $a->nama_a; ?></li>
											<li>Kelas : <?php echo $a->nama_k; ?></li>
											<li>Buku : <?php echo $a->judul_b; ?></li>
										</ul>
										<form method="post" action="<?php echo base_url('cpinjam/kembalikan'); ?>">
											<input type="hidden" name="id" value="<?php echo $a->id_peminjaman; ?>">
											<input type="hidden" name="telat" value="<?php echo $telat; ?>">
											<input type="hidden" name="denda" value="<?php echo $denda; ?>">
											<input type="hidden" name="buku" value="<?php echo $a->judul_b; ?>">
											<input type="hidden" name="jumlah" value="<?php echo $a->jumlah_pinjam; ?>">
											<input type="hidden" name="status" value="K">
									</div>
									<div class="modal-footer">
										<button class="btn btn-primary pull-right"><i class="fa fa-check"></i> Lanjutkan</button>
										</form>
										<button class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
									</div>
								</div>
							</div>
						</div>
						<div id="panjang<?php echo $no; ?>" class="modal">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										Confirmasi Perpanjangan
									</div>
									<div class="modal-body">
										<form method="post" action="<?php echo base_url('cpinjam/panjang'); ?>">
											<div class="form-group">
											    <label>Nama</label>
											    <input type="text" class="form-control" name="nama" readonly="" value="<?php echo $a->nama_a; ?>">
											</div>
											<div class="form-group">
											    <label>Jumlah Kembali</label>
											    <select class="form-control" name="jumlah">
											    	<option selected="" disabled="">--Pilih--</option>
											    	<?php for ($h=1; $h <=$a->jumlah_pinjam ; $h++) { ?>
											    		<option value="<?php echo $h; ?>"><?php echo $h; ?></option>
											    	<?php } ?>
											    </select>
											</div>
											<div class="form-group">
											    <label>Tanggal Baru</label>
											    <input type="date" class="form-control" placeholder="" name="tgl" required="">
											</div>
											<input type="hidden" name="buku" value="<?php echo $a->judul_b; ?>">
											<input type="hidden" name="status" value="T">
											<input type="hidden" name="id" value="<?php echo $a->id_peminjaman; ?>">
									</div>
									<div class="modal-footer">
										<button class="btn btn-primary pull-right"><i class="fa fa-save"></i> Simpan</button>
										</form>
										<button class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
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