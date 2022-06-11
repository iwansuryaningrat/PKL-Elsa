<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Canggota extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('manggota');
	}
	public function anggotahap(){
		$id = $this->uri->segment(3);
		$hasil = $this->manggota->hapusanggota($id);
		if (!$hasil) {
			$q['anggota'] = $this->manggota->tampil();
			$this->session->set_flashdata('page',"anggota");
			$this->session->set_flashdata('psn',"anggotahap");
			$this->load->view('main',$q);
		}else{
			$q['anggota'] = $this->manggota->tampil();
			$this->session->set_flashdata('page',"anggota");
			$this->session->set_flashdata('psn',"anggotahap");
			$this->load->view('main',$q);
		}
	}
	public function simpanedit(){
		$id = $this->input->post('id');
		$hasil = $this->manggota->simpanedit($id);
		if (!$hasil) {
			$q['anggota'] = $this->manggota->tampil();
			$this->session->set_flashdata('page',"anggota");
			$this->session->set_flashdata('psn',"anggotaedit");
			$this->load->view('main',$q);
		}else{
			$q['anggota'] = $this->manggota->tampil();
			$this->session->set_flashdata('page',"anggota");
			$this->session->set_flashdata('psn',"anggotaedit");
			$this->load->view('main',$q);
		}
	}
	public function anggotaedit(){
		$id = $this->uri->segment(3);
		$q['kelas'] = $this->db->get('kelas');
		$q['anggota'] = $this->manggota->cariedit($id);
		$this->session->set_flashdata('page',"editanggota");
		$this->load->view('main',$q);
	}
	public function simpana(){
		$nama = $this->input->post('nama');
		$data = array('nama_a'=>$nama);
		$cek = $this->manggota->ceksimpan($data);
		$hasil = $cek->num_rows();
		if ($hasil > 0) {
			$q['kelas'] = $this->db->get('kelas');
			$this->session->set_flashdata('page',"tambahanggota");
			$this->session->set_flashdata('psn',"dataada");
			$this->load->view('main',$q);
		}else{
			$hasil = $this->manggota->simpana();
			$q['anggota'] = $this->manggota->tampil();
			$this->session->set_flashdata('page',"anggota");
			$this->session->set_flashdata('psn',"anggotasim");
			$this->load->view('main',$q);
		}
	}
	public function tambaha(){
		$q['kelas'] = $this->db->get('kelas');
		$this->session->set_flashdata('page',"tambahanggota");
		$this->load->view('main',$q);
	}
	public function tampil(){
		$q['anggota'] = $this->manggota->tampil();
		$this->session->set_flashdata('page',"anggota");
		$this->load->view('main',$q);
	}
}