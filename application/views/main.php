<?php 
if ($this->session->userdata('nama')=="") {
	redirect('clogin/index');
}
 ?>
<?php $this->load->view('heder'); ?>
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php 
          $admin = $this->db->get_where('admin',array('nama_ad'=>$this->session->userdata('nama')))->row_array();
          $foto = $admin['foto'];
              if ($foto == "") {?>
               <img style="box-shadow: 0 0px 5px 2px white;" src="<?php echo base_url(); ?>temp/logo.jpeg" class="img-circle" alt="User Image">
              <?php }else{ ?>
                <img style="box-shadow: 0 0px 1px 2px white;" src="<?php echo base_url(); ?>temp/<?php echo $foto ?>" class="img-circle" alt="User Image">
              <?php } ?>
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
<?php 
	if ($this->session->flashdata('page')=="dashboard") {
		$aa='active';$bb='';$cc='';$dd='';$pm='';$pm1='';$pm2='';$oo='';$lp='';$lp1='';$lp2='';$pg='';
	}
  // kelas
  elseif ($this->session->flashdata('page')=="kelas") {
    $aa='';$bb='active';$cc='';$dd='';$pm='';$pm1='';$pm2='';$oo='';$lp='';$lp1='';$lp2='';$pg='';
  }
  // Buku
  elseif ($this->session->flashdata('page')=="buku" || $this->session->flashdata('page')=="bukutambah" || $this->session->flashdata('page')=="editbuku" ) {
    $aa='';$bb='';$cc='active';$dd='';$pm='';$pm1='';$pm2='';$oo='';$lp='';$lp1='';$lp2='';$pg='';
  }
  // anggota
  elseif ($this->session->flashdata('page')=="anggota" || $this->session->flashdata('page')=="tambahanggota" || $this->session->flashdata('page')=="editanggota" ) {
    $aa='';$bb='';$cc='';$dd='active';$pm='';$pm1='';$pm2='';$oo='';$lp='';$lp1='';$lp2='';$pg='';
  }
  // Peminjaman
  elseif ($this->session->flashdata('page')=="pinjam") {
    $aa='';$bb='';$cc='';$dd='';$pm='active';$pm1='';$pm2='active';$oo='';$lp='';$lp1='';$lp2='';$pg='';
  }elseif ($this->session->flashdata('page')=="tambahpinjam" or $this->session->flashdata('page')=="tampilpinjamnew") {
    $aa='';$bb='';$cc='';$dd='';$pm='active';$pm1='active';$pm2='';$oo='';$lp='';$lp1='';$lp2='';$pg='';
  }
  // Pengembalian
  elseif ($this->session->flashdata('page')=="pengembalian") {
    $aa='';$bb='';$cc='';$dd='';$pm='';$pm1='';$pm2='';$oo='active';$lp='';$lp1='';$lp2='';$pg='';
  }
  // laporan
  elseif ($this->session->flashdata('page')=="laporpinjam") {
    $aa='';$bb='';$cc='';$dd='';$pm='';$pm1='';$pm2='';$oo='';$lp='active';$lp1='active';$lp2='';$pg='';
  }
  elseif ($this->session->flashdata('page')=="laporkembali") {
    $aa='';$bb='';$cc='';$dd='';$pm='';$pm1='';$pm2='';$oo='';$lp='active';$lp1='';$lp2='active';$pg='';
  }
  // pengaturan
   elseif ($this->session->flashdata('page')=="pengaturan") {
    $aa='';$bb='';$cc='';$dd='';$pm='';$pm1='';$pm2='';$oo='';$lp='';$lp1='';$lp2='';$pg='active';
  }
 ?>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php echo $aa; ?>">
          <a href="<?php echo base_url('clogin/pagedas'); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="<?php echo $dd; ?>">
          <a href="<?php echo base_url('canggota/tampil'); ?>">
            <i class="fa fa-group"></i> <span>Anggota</span>
          </a>
        </li>
        <li class="<?php echo $cc; ?>">
          <a href="<?php echo base_url('cbuku/buktampil'); ?>">
            <i class="fa fa-book"></i> <span>Buku</span>
          </a>
        </li>
        <li class="<?php echo $bb; ?>">
          <a href="<?php echo base_url('ckelas/tampilkel'); ?>">
            <i class="fa fa-bank"></i> <span>Kelas</span>
          </a>
        </li>
        <li class="treeview <?php echo $pm; ?>">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Peminjaman</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo $pm1; ?>"><a href="<?php echo base_url('cpinjam/tambahpinjamnew'); ?>"><i class="fa fa-circle-o"></i> Input Peminjaman</a></li>
            <li class="<?php echo $pm2; ?>"><a href="<?php echo base_url('cpinjam/tampilpinjam'); ?>"><i class="fa fa-circle-o"></i> Daftar Peminjaman</a></li>
          </ul>
        </li>
        <li class="<?php echo $oo; ?>">
          <a href="<?php echo base_url('ckembali/tampilbali'); ?>">
            <i class="fa fa-check"></i> <span>Pengembalian</span>
          </a>
        </li>

<!--


        <li class="treeview <?php echo $lp; ?>">
          <a href="#">
            <i class="fa fa-file"></i> <span>Cetak Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo $lp1; ?>"><a href="<?php echo base_url('Claporan/peminjaman'); ?>"><i class="fa fa-circle-o"></i> Peminjaman</a></li>
            <li class="<?php echo $lp2; ?>"><a href="<?php echo base_url('claporan/pengembalian'); ?>"><i class="fa fa-circle-o"></i> Pengembalian</a></li>
          </ul>
        </li>
    -->



        <li class="<?php echo $pg; ?>">
          <a href="<?php echo base_url('cpengaturan/tampilatur'); ?>">
            <i class="fa fa-gear"></i> <span>Pengaturan</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    </section>

    <!-- Main content -->
    <section class="content">
<?php
	if ($this->session->flashdata('page')=="dashboard") {
		$this->load->view('dashboard');
	}
// kelas
  elseif ($this->session->flashdata('page')=="kelas") {
    include APPPATH.'views/kelas/tampil.php';
  }
// buku
  elseif ($this->session->flashdata('page')=="buku") {
    include APPPATH.'views/buku/tampil.php';
  }elseif ($this->session->flashdata('page')=="bukutambah") {
    include APPPATH.'views/buku/tambah.php';
  }elseif ($this->session->flashdata('page')=="editbuku") {
    include APPPATH.'views/buku/edit.php';
  }
// anggota
  elseif ($this->session->flashdata('page')=="anggota") {
    include APPPATH.'views/anggota/tampil.php';
  }elseif ($this->session->flashdata('page')=="tambahanggota") {
    include APPPATH.'views/anggota/tambah.php';
  }elseif ($this->session->flashdata('page')=="editanggota") {
    include APPPATH.'views/anggota/edit.php';
  }
// Peminjaman
  elseif ($this->session->flashdata('page')=="pinjam") {
    include APPPATH.'views/peminjaman/tampil.php';
  }elseif ($this->session->flashdata('page')=="tambahpinjam") {
    include APPPATH.'views/peminjaman/tambah.php';
  }elseif ($this->session->flashdata('page')=="tampilpinjamnew") {
    include APPPATH.'views/peminjaman/tambahnew.php';
  }
  // pengembalian
  elseif ($this->session->flashdata('page')=="pengembalian") {
    include APPPATH.'views/peminjaman/pengembalian.php';
  }
  // laporan
   elseif ($this->session->flashdata('page')=="laporpinjam") {
    include APPPATH.'views/laporan/peminjaman.php';
  }elseif ($this->session->flashdata('page')=="laporkembali") {
    include APPPATH.'views/laporan/kembali.php';
  }
  // Pengaturan
  elseif ($this->session->flashdata('page')=="pengaturan") {
    $this->load->view('pengaturan');
  }
 ?>     
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('footer'); ?>