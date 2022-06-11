<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mbuku extends CI_Model {
	public function hapuspinjam($judul){
		$this->db->where('judul_b',$judul);
		$this->db->delete('peminjaman');
	}
	public function bukhapus($id){
		$this->db->where('id_b',$id);
		$this->db->delete('buku');
	}
	public function cariedit($id){
		return $this->db->get_where('buku',array('id_b'=>$id));
	}
	public function editbuku($id){
		$q['kode_b'] 	= htmlspecialchars($this->input->post('kode'));
		$q['judul_b'] = htmlspecialchars($this->input->post('judul'));
		$q['tahun_terbit'] = $this->input->post('tahun');
		$q['pengarang'] = htmlspecialchars($this->input->post('pengarang'));
		$q['jumlah_b'] = htmlspecialchars($this->input->post('jumbuk'));
		$this->db->where('id_b',$id);
		$this->db->update('buku',$q);
	}
	public function simpanbuk(){
		$q['kode_b'] 	= htmlspecialchars($this->input->post('kode'));
		$q['judul_b'] = htmlspecialchars($this->input->post('judul'));
		$q['tahun_terbit'] = $this->input->post('tahun');
		$q['pengarang'] = htmlspecialchars($this->input->post('pengarang'));
		$q['jumlah_b'] = htmlspecialchars($this->input->post('jumbuk'));
		$this->db->insert('buku',$q);
	}
	public function buktampil(){
		return $this->db->get('buku');
	}
}