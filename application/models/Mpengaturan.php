<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpengaturan extends CI_Model {
	public function pp(){
		$this->db->where('nama_ad',$this->userdata('nama'));
		return $this->db->get('admin');
	}
	public function update_ad($name,$id){
		$q['foto'] = $name;
		$this->db->where('nama_ad',$id);
		$this->db->update('admin',$q);
	}
	public function editadmin($id){
		$q['nama_ad'] = $this->input->post('nama');
		$q['username'] = $this->input->post('user');
		$q['password'] = $this->input->post('pass');
		$this->db->where('id_admin',$id);
		$this->db->update('admin',$q);
	}
	public function tambahadmin(){
		$q['nama_ad'] = $this->input->post('nama');
		$q['username'] = $this->input->post('user');
		$q['password'] = $this->input->post('pass');
		$this->db->insert('admin',$q);
	}
	public function cekadmin($nama,$user,$pass){
		$this->db->where('nama_ad',$nama);
		$this->db->where('username',$user);
		$this->db->where('password',$pass);
		return $this->db->get('admin');
	}
	public function tampiladmin(){
		$this->db->order_by('id_admin','DESc');
		return $this->db->get('admin')->result();
	}
	public function updatedenda($id){
		$q['nama_sekolah'] = $this->input->post('nama');
		$q['denda'] = str_replace(".","",$this->input->post('denda'));
		$this->db->where('id_p',$id);
		$this->db->update('pengaturan',$q);
	}
	public function tampil(){
		return $this->db->get('pengaturan');
	}
}