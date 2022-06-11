<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpengaturan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('mpengaturan');
		$this->load->model('mlogin');
		$this->CI = & get_instance();
	}
	public function gantif(){
		$c['upload_path'] = './temp/';
		$c['allowed_types'] = 'jpg|png|ico';
		$c['overwrite'] = true;
		$this->load->library('upload',$c);
		if (! $this->upload->do_upload('foto')) {
			$q['error'] = $this->upload->display_errors();
			$q['tanggota'] 	= $this->db->get('anggota')->num_rows();
			$q['tbuku'] 	= $this->db->get('buku')->num_rows();
			$q['tkelas'] 	= $this->db->get('kelas')->num_rows();
			$q['rank'] 		= $this->mlogin->banyakpem();
			// $q['kelas'] 	= $this->mlogin->banyakkelas();
			$q['buku'] 		= $this->mlogin->banyakbuku();
			$this->session->set_flashdata('page',"dashboard");
			$this->load->view('main',$q);
		}else{
			$name = $this->upload->data('file_name');
			$id = $this->session->userdata('nama');
			$hasil = $this->mpengaturan->update_ad($name,$id);
			if (! $hasil) {
				$q['tanggota'] 	= $this->db->get('anggota')->num_rows();
				$q['tbuku'] 	= $this->db->get('buku')->num_rows();
				$q['tkelas'] 	= $this->db->get('kelas')->num_rows();
				$q['rank'] 		= $this->mlogin->banyakpem();
				// $q['kelas'] 	= $this->mlogin->banyakkelas();
				$q['buku'] 		= $this->mlogin->banyakbuku();
				$this->session->set_flashdata('page',"dashboard");
				$this->load->view('main',$q);
			}
		}
	}
	public function editadmin(){
		$nama = $this->input->post('nama');
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$cek = $this->mpengaturan->cekadmin($nama,$user,$pass);
		if ($cek->num_rows() > 0) {
			$q['query'] = $this->mpengaturan->tampil();
			$q['admin'] = $this->mpengaturan->tampiladmin();
			$this->session->set_flashdata('page',"pengaturan");
			$this->session->set_flashdata('psn',"editgagal");
			$this->load->view('main',$q);
		}else{
			$id = $this->input->post('id');
			$this->mpengaturan->editadmin($id);
			$q['query'] = $this->mpengaturan->tampil();
			$q['admin'] = $this->mpengaturan->tampiladmin();
			$this->session->set_flashdata('page',"pengaturan");
			$this->session->set_flashdata('psn',"editberhasil");
			$this->load->view('main',$q);
		}
	}
	public function updatedenda(){
		$id = $this->input->post('id');
		$cek = $this->mpengaturan->updatedenda($id);
		if (!$cek) {
			$q['query'] = $this->mpengaturan->tampil();
			$q['admin'] = $this->mpengaturan->tampiladmin();
			$this->session->set_flashdata('page',"pengaturan");
			$this->session->set_flashdata('psn',"aturberhasil");
			$this->load->view('main',$q);
		}
	}
	public function tampilatur(){
		$q['query'] = $this->mpengaturan->tampil();
		$q['admin'] = $this->mpengaturan->tampiladmin();
		$this->session->set_flashdata('page',"pengaturan");
		$this->load->view('main',$q);
	}
	public function tambahadmin(){
		$nama = $this->input->post('nama');
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$cek = $this->mpengaturan->cekadmin($nama,$user,$pass);
		if ($cek->num_rows() > 0) {
			$q['query'] = $this->mpengaturan->tampil();
			$q['admin'] = $this->mpengaturan->tampiladmin();
			$this->session->set_flashdata('page',"pengaturan");
			$this->session->set_flashdata('psn',"admingagal");
			$this->load->view('main',$q);
		}else{
			$this->mpengaturan->tambahadmin();
			$q['query'] = $this->mpengaturan->tampil();
			$q['admin'] = $this->mpengaturan->tampiladmin();
			$this->session->set_flashdata('page',"pengaturan");
			$this->session->set_flashdata('psn',"adminberhasil");
			$this->load->view('main',$q);
		}
	}
}