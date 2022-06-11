<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkelas extends CI_model {
	public function hapuskelas($id){
		$this->db->where('id_k',$id);
		$this->db->delete('kelas');
	}
	public function hapuspeminjamn($id){
		$this->db->where('id_k',$id);
		$this->db->delete('peminjaman');
	}
	public function hapusanggota($id){
		$this->db->where('id_k',$id);
		$this->db->delete('anggota');
	}
	public function tambahkel(){
		$q['nama_k'] = htmlspecialchars($this->input->post('nama'));
		$this->db->insert('kelas',$q);
	}
	public function editkel($id){
		$q['nama_k'] = htmlspecialchars($this->input->post('nama'));
		$this->db->where('id_k',$id);
		$this->db->update('kelas',$q);
	}
	public function tampilkel(){
		return $this->db->get('kelas');
	}
}