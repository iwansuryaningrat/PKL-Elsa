<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ckembali extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('mkembali');
	}
	public function batalkan(){
		$id = $this->input->post('id');
		$cek = $this->mkembali->cek($id);
		if ($cek->num_rows() > 0) {
			$idpinjam = $this->input->post('idpinjam');
			$this->mkembali->updatestatus($idpinjam);
			$buku = $this->input->post('buku');
			$data = $this->mkembali->caribuku($buku)->row_array();
			$pinjam = $this->input->post('jumlah');
			$hasil = $data['jumlah_b'] - $pinjam;
			$this->mkembali->updatebuku($buku,$hasil);
			$this->mkembali->hapuskembali($id);
			$q['kembali'] = $this->mkembali->tampilbali();
			$this->session->set_flashdata('page',"pengembalian");
			$this->session->set_flashdata('psn',"batalberhasil");
			$this->load->view('main',$q);
		}else{
			$q['kembali'] = $this->mkembali->tampilbali();
			$this->session->set_flashdata('page',"pengembalian");
			$this->session->set_flashdata('psn',"batalgagal");
			$this->load->view('main',$q);
		}
		
	}
	public function tampilbali(){
		$q['kembali'] = $this->mkembali->tampilbali();
		$this->session->set_flashdata('page',"pengembalian");
		$this->load->view('main',$q);
	}
}