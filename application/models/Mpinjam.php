<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpinjam extends CI_Model {
	public function denda(){
		return $this->db->get('pengaturan');
	}
	public function updatejumpinjam($idb,$upjum){
		$b['jumlah_pinjam'] = $upjum;
		$this->db->where('id_peminjaman',$idb);
		$this->db->update('peminjaman',$b);
	}
	public function caripinjam($idb){
		$this->db->where('id_peminjaman',$idb);
		return $this->db->get('peminjaman');
	}
	public function updatpinjam($idb){
		$c['tanggal_kembali'] = $this->input->post('tgl');
		$c['status'] = $this->input->post('status');
		$this->db->where('id_peminjaman',$idb);
		$this->db->update('peminjaman',$c);
	}
	public function kembalikan(){
		$q['id_peminjaman'] = $this->input->post('id');
		$q['tanggal_input'] = date('Y-m-d H:i:s');
		$q['telat'] = $this->input->post('telat');
		$q['denda'] = $this->input->post('denda');
		$this->db->insert('pengembalian',$q);
	}
	public function cekkembali($idb){
		$this->db->where('id_peminjaman',$idb);
		return $this->db->get('pengembalian');		
	}
	public function cek($id,$pinjam,$tglsek,$kelas){
		return $this->db->get_where('peminjaman',array('judul_b'=>$id,'jumlah_pinjam'=>$pinjam,'tanggal_pinjam'=>$tglsek,'id_k'=>$kelas));
	}
	public function simpanpinjam($kembali){
		$q['nama_a'] = $this->input->post('nama');
		$q['id_k'] = $this->input->post('kelas');
		$q['tanggal_pinjam'] = date('Y-m-d');
		$q['tanggal_kembali'] = $kembali;
		$q['judul_b'] = $this->input->post('buku');
		$q['jumlah_pinjam'] = $this->input->post('jumlah');
		$q['status'] = $this->input->post('status');
		$q['id_admin'] = $this->session->userdata('id');
		$this->db->insert('peminjaman',$q);
	}
	public function updatebuku($id,$hasil){
		$q['jumlah_b'] = $hasil;
		$this->db->where('judul_b',$id);
		$this->db->update('buku',$q);
	}
	public function caribuku($id){
		$this->db->where('judul_b',$id);
		return $this->db->get('buku');
	}
	public function ajaxkelas($id){
		$this->db->where('id_k',$id);
		return $this->db->get('anggota')->result();
	}
	public function ajaxbuku($id){
		$this->db->where('judul_b',$id);
		return $this->db->get('buku')->result();
	}
	public function tampilkelas(){
		return $this->db->get('kelas');
	}
	public function tampilbuku(){
		return $this->db->get('buku');
	}
	public function caribukunew($kode){
		$this->db->where('judul_b',$kode);
		return $this->db->get('buku');
	}
	public function tampilpinjam(){
		$this->db->join('anggota','anggota.nama_a=peminjaman.nama_a','left');
		$this->db->join('admin','admin.id_admin=peminjaman.id_admin','left');
		$this->db->join('kelas','kelas.id_k=peminjaman.id_k','left');
		$this->db->join('buku','buku.judul_b=peminjaman.judul_b','left');
		$this->db->where('status',"P");
		$this->db->or_where('status',"T");
		return $this->db->get('peminjaman');
	}
}