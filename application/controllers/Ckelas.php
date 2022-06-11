<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ckelas extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('mkelas');
	}
	public function edit(){
		$id = $this->input->post('id');
		$hasil = $this->mkelas->editkel($id);
		if (!$hasil) {
			$q['kelas'] = $this->mkelas->tampilkel();
			$this->session->set_flashdata('page',"kelas");
			$this->session->set_flashdata('psn',"berhasiled");
			$this->load->view('main',$q);
		}else{
			$q['kelas'] = $this->mkelas->tampilkel();
			$this->session->set_flashdata('page',"kelas");
			$this->load->view('main',$q);
		}
	}
	public function tambahkel(){
		$hasil = $this->mkelas->tambahkel();
		if (!$hasil) {
			$q['kelas'] = $this->mkelas->tampilkel();
			$this->session->set_flashdata('page',"kelas");
			$this->session->set_flashdata('psn',"kelassim");
			$this->load->view('main',$q);
		}else{
			$q['kelas'] = $this->mkelas->tampilkel();
			$this->session->set_flashdata('page',"kelas");
			$this->load->view('main',$q);
		}
	}
	public function hapus(){
		$id = $this->uri->segment(3);
		$a = $this->mkelas->hapusanggota($id);
		$b = $this->mkelas->hapuspeminjamn($id);
		$hasil = $this->mkelas->hapuskelas($id);
		if (!$hasil) {
			$q['kelas'] = $this->mkelas->tampilkel();
			$this->session->set_flashdata('page',"kelas");
			$this->session->set_flashdata('psn',"kelashap");
			$this->load->view('main',$q);
		}else{
			$q['kelas'] = $this->mkelas->tampilkel();
			$this->session->set_flashdata('page',"kelas");
			$this->load->view('main',$q);
		}
	}
	public function tampilkel(){
		$q['kelas'] = $this->mkelas->tampilkel();
		$this->session->set_flashdata('page',"kelas");
		$this->load->view('main',$q);
	}
}