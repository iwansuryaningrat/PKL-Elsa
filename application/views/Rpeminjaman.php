<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Laporan</title>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>temp/logo.jpeg" />
	<style type="text/css">
		.table {
    border-collapse: collapse !important;
  }
  .table td,
  .table th {
    background-color: #fff !important;
  }
  .table-bordered th,
  .table-bordered td {
    border: 1px solid #ddd !important;
  }
	</style>
</head>
<body>
<h2 style="text-align: center;"><u>PERPUSTAKAAN SMK Penda 3 Jatipuro</u></h2><br>
<h2 style="text-align: center;"><?php echo $judul; ?></h2>
<table class="table" style="width: 100%;" border="1">
	<tr>
		<th>NO</th>
		<th>Nama</th>
		<th>Kelas</th>
		<th>Nama Buku</th>
		<th>Tanggal Pinjam</th>
		<th>Tanggal Kembali</th>
		<th>Jumlah Pinjam</th>
	</tr>
		<?php $no=1;
		foreach ($query->result() as $q) { ?>
	<tr style="text-align: center;">
		 <td><?php echo $no++; ?></td>
		 <td><?php echo $q->nama_a ?></td>
		 <td><?php echo $q->nama_k ?></td>
		 <td><?php echo $q->judul_b ?></td>
		 <td><?php echo date('d F Y', strtotime($q->tanggal_pinjam)); ?></td>
		 <td><?php echo date('d F Y', strtotime($q->tanggal_kembali)); ?></td>
		 <td><?php echo $q->jumlah_pinjam ?></td>
	</tr>
		 <?php } ?>
</table>
</body>
</html>