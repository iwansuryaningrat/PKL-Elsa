<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlaporan extends CI_Model {
	public function LBkembali(){
		$bulan 	= $this->input->post('bulan');
		$tahun 	= $this->input->post('tahun');
		$this->db->join('kelas','kelas.id_k=peminjaman.id_k');
		$this->db->where('status','K');
		$this->db->where('month(tanggal_pinjam)',$bulan);
		$this->db->where('year(tanggal_pinjam)',$tahun);
		return $this->db->get('peminjaman');
	}
	public function Lkembali(){
		$awal 	= date('Y-m-d',strtotime($this->input->post('mulai')));
		$akhir 	= date('Y-m-d',strtotime($this->input->post('akhir')));
		$this->db->join('kelas','kelas.id_k=peminjaman.id_k');
		$this->db->where('status','K');
		$this->db->where('tanggal_pinjam >=',$awal);
		$this->db->where('tanggal_pinjam <=',$akhir);
		return $this->db->get('peminjaman');
	}
	public function LBpeminjaman(){
		$bulan 	= $this->input->post('bulan');
		$tahun 	= $this->input->post('tahun');
		$this->db->join('kelas','kelas.id_k=peminjaman.id_k');
		$this->db->where('status','P');
		$this->db->where('month(tanggal_pinjam)',$bulan);
		$this->db->where('year(tanggal_pinjam)',$tahun);
		return $this->db->get('peminjaman');
	}
	public function peminjamanH(){
		$awal 	= date('Y-m-d',strtotime($this->input->post('mulai')));
		$akhir 	= date('Y-m-d',strtotime($this->input->post('akhir')));
		$this->db->join('kelas','kelas.id_k=peminjaman.id_k');
		$this->db->where('status','P');
		$this->db->where('tanggal_pinjam >=',$awal);
		$this->db->where('tanggal_pinjam <=',$akhir);
		return $this->db->get('peminjaman');
	}
}