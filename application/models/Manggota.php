<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manggota extends CI_Model {
	public function hapusanggota($id){
		$this->db->where('id_a',$id);
		$this->db->delete('anggota');
	}
	public function simpanedit($id){
		$q['nama_a'] = htmlspecialchars($this->input->post('nama'));
		$q['id_k']  = $this->input->post('kelas');
		$q['jk'] = $this->input->post('jk');
		$q['alamat'] = htmlspecialchars($this->input->post('alamat'));
		$q['email'] = htmlspecialchars($this->input->post('email'));
		$this->db->where('id_a',$id);
		$this->db->update('anggota',$q);
	}
	public function cariedit($id){
		return $this->db->get_where('anggota',array('id_a'=>$id));
	}
	public function simpana(){
		$q['nama_a'] = htmlspecialchars($this->input->post('nama'));
		$q['id_k']  = $this->input->post('kelas');
		$q['jk'] = $this->input->post('jk');
		$q['alamat'] = htmlspecialchars($this->input->post('alamat'));
		$q['email'] = htmlspecialchars($this->input->post('email'));
		$this->db->insert('anggota',$q);
	}
	public function ceksimpan($data){
		$this->db->where($data);
		return $this->db->get('anggota');
	}
	public function tampil(){
		$this->db->join('kelas','kelas.id_k=anggota.id_k','left');
		return $this->db->get('anggota');
	}
}