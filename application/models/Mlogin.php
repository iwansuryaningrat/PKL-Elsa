<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlogin extends CI_Model {
	public function ceklog($user,$pass){
		return $this->db->get_where('admin',array('username'=>$user,'password'=>$pass));
	}
	public function banyakbuku(){
		$this->db->where('status','K');
		$this->db->select('judul_b, COUNT(judul_b) as jum');
		$this->db->group_by('judul_b');
		$this->db->order_by('jum','DESC');
		$this->db->limit(5);
		return $this->db->get('peminjaman');
	}
	public function banyakpem(){
		$this->db->where('status','K');
		$this->db->select('nama_a, COUNT(nama_a) as total');
		$this->db->group_by('nama_a');
		$this->db->order_by('total','DESC');
		$this->db->limit(5);
		return $this->db->get('peminjaman');
	}
	public function sekolahdenda(){
		return $this->db->get('pengaturan');
	}
}