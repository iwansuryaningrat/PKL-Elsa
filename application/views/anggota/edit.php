<?php foreach ($anggota->result() as $a) { ?>
<div class="box box-success">
	<div class="box-header">
		<h4>Input Anggota Baru</h4>
		<a class="btn btn-primary" href="<?php echo base_url('canggota/tampil'); ?>"><i class="fa fa-reply"></i> Kembali</a>
	</div>
	<div class="box-body">
		<form method="post" role="form" action="<?php echo base_url('canggota/simpanedit'); ?>">
			<input type="hidden" name="id" value="<?php echo $a->id_a; ?>">
	  <div class="form-group">
	      <label>Nama</label>
	      <input type="text" class="form-control" placeholder="Nama Anggota" name="nama" required="" autofocus="" value="<?php echo $a->nama_a; ?>">
	  </div>
	  <?php } ?>
	  <div class="form-group">
	      <label>Kelas</label>
	      <select name="kelas" class="form-control">
	      	<option selected="" disabled="">--Pilih Kelas--</option>
	      	<?php foreach ($kelas->result() as $a) { ?>
	      	<option value="<?php echo $a->id_k; ?>"><?php echo $a->nama_k; ?></option>
	      	<?php } ?>
	      </select>
	  </div>
	  <div class="form-group">
	      <label>Jenis kelamin</label>
	      <select name="jk" class="form-control">
	      	<option selected="" disabled="">--Jenis Kelamin--</option>
	      	<option value="Laki-Laki">Laki-Laki</option>
	      	<option value="Perempuan">Perempuan</option>
	      </select>
	  </div>
<?php foreach ($anggota->result() as $a) { ?>
	  <div class="form-group">
	      <label>Alamat</label>
	      <textarea name="alamat" placeholder="alamat" class="form-control"><?php echo $a->alamat; ?></textarea>
	  </div>
	  <div class="form-group">
	      <label>Email</label>
	      <input type="email" class="form-control" placeholder="Email" required="" name="email" value="<?php echo $a->email; ?>">
	  </div>
	 
</div>
	<div class="box-footer">
	  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
	</div>
</form>
</div>
<?php } ?>