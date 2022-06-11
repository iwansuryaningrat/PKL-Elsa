<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cbuku extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('mbuku');
	}
	public function bukhapus($id){
		$id = $this->uri->segment(3);
		$judul = $this->uri->segment(4);
		$a = $this->mbuku->hapuspinjam($judul);
		$hasil = $this->mbuku->bukhapus($id);
		if (!$hasil) {
			$q['buku'] = $this->mbuku->buktampil();
			$this->session->set_flashdata('page',"buku");
			$this->session->set_flashdata('psn',"bukhapus");
			$this->load->view('main',$q);
		}else{
			$q['buku'] = $this->mbuku->buktampil();
			$this->session->set_flashdata('page',"buku");
			$this->load->view('main',$q);
		}
	}
	public function editbuk(){
		$id = $this->uri->segment(3);
		$q['buku'] = $this->mbuku->cariedit($id);
		$this->session->set_flashdata('page',"editbuku");
		$this->load->view('main',$q);
	}
	public function bukedit(){
		$id = $this->input->post('id');;
		$hasil = $this->mbuku->editbuku($id);
			if (!$hasil) {
			$q['buku'] = $this->mbuku->buktampil();
			$this->session->set_flashdata('page',"buku");
			$this->session->set_flashdata('psn',"bukedit");
			$this->load->view('main',$q);
		}else{
			$q['buku'] = $this->mbuku->buktampil();
			$this->session->set_flashdata('page',"buku");
			$this->load->view('main',$q);
		}
	}
	public function tambahsim(){
		$hasil = $this->mbuku->simpanbuk();
		if (!$hasil) {
			$q['buku'] = $this->mbuku->buktampil();
			$this->session->set_flashdata('page',"buku");
			$this->session->set_flashdata('psn',"buksimpan");
			$this->load->view('main',$q);
		}else{
			$q['buku'] = $this->mbuku->buktampil();
			$this->session->set_flashdata('page',"buku");
			$this->load->view('main',$q);
		}
	}
	public function buktambah(){
		$this->session->set_flashdata('page',"bukutambah");
		$this->load->view('main');
	}
	public function buktampil(){
		$q['buku'] = $this->mbuku->buktampil();
		$this->session->set_flashdata('page',"buku");
		$this->load->view('main',$q);
	}
}