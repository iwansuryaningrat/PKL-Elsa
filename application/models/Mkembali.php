<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkembali extends CI_Model {
	public function cek($id){
		$this->db->where('Id_pengembalian',$id);
		return $this->db->get('pengembalian');
	}
	public function updatebuku($buku,$hasil){ 
		$q['jumlah_b'] = $hasil;
		$this->db->where('judul_b',$buku);
		$this->db->update('buku',$q);
	}
	public function caribuku($buku){
		$this->db->where('judul_b',$buku);
		return $this->db->get('buku');
	}
	public function updatestatus($idpinjam){
		$q['status'] = $this->input->post('status');
		$this->db->where('id_peminjaman',$idpinjam);
		$this->db->update('peminjaman',$q);
	}
	public function hapuskembali($id){	
		$this->db->where('Id_pengembalian',$id);
		$this->db->delete('pengembalian');
	}
	public function tampilbali(){
		$this->db->join('peminjaman','peminjaman.id_peminjaman=pengembalian.id_peminjaman','left');
		$this->db->join('kelas','kelas.id_k=peminjaman.id_k','left');
		return $this->db->get('pengembalian');
	}
}