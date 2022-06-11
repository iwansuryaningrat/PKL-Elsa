<?php foreach ($buku->result() as $a) { ?>
<div class="box box-success">
	<div class="box-header">
		<h4>Edit Data Buku</h4>
		<a class="btn btn-primary" href="<?php echo base_url('cbuku/buktampil'); ?>"><i class="fa fa-reply"></i> Kembali</a>
	</div>
	<div class="box-body">
		<form method="post" role="form" action="<?php echo base_url('cbuku/bukedit'); ?>">
			<input type="hidden" name="id" value="<?php echo $a->id_b; ?>">
			 <div class="form-group">
	    <label>Kode Buku</label>
	    <input type="text" class="form-control" placeholder="Judul Buku" name="kode" value="<?php echo $a->kode_b; ?>" onkeyup="this.value = this.value.toUpperCase()">
	  </div>
	  <div class="form-group">
	    <label>Judul Buku</label>
	    <input type="text" class="form-control" placeholder="Judul Buku" name="judul" value="<?php echo $a->judul_b; ?>" >
	  </div>
	  <div class="form-group">
	      <label>Tahun Terbit</label>
	      <input type="date" class="form-control" placeholder="Tahun Terbit" name="tahun" value="<?php echo $a->tahun_terbit; ?>">
	  </div>
	  <div class="form-group">
        <label>Pengarang</label>
        <input type="text" class="form-control" placeholder="Pengarang" name="pengarang" value="<?php echo $a->pengarang; ?>">
    </div>
    <div class="form-group">
          <label>Jumlah Buku</label>
          <input type="number" class="form-control" placeholder="Jumlah Buku" name="jumbuk" value="<?php echo $a->jumlah_b; ?>">
    </div>  
</div>
	<div class="box-footer">
	  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Perbarui</button>
	</div>
</form>
</div>
<?php } ?>