<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clogin extends CI_Controller {
	public $ci = NULL;
	function __construct(){
		parent::__construct();
		$this->load->model('mlogin');
	}
	public function sendmail(){
		$email = 'abdulwakhid.2001@gmail.com';
		$this->load->library('email');
		$config['protocol'] = 'smtp';
		$config['mailtype'] = 'html';

		$config['smtp_host'] = 'mail.demolapakcode.net';
    $config['smtp_port'] = '26'; //smtp port number  
		$config['smtp_user'] = 'wakhid@demolapakcode.net';
		$config['smtp_pass'] = 'wakhid2018';
		$this->email->initialize($config);
		$this->email->from('wakhid@demolapakcode.net', 'wakhid');
		$this->email->to($email);
		$isi= 'Silahkan Login <a href="">'.site_url("clogin/login");'</a>';
		$this->email->subject('Email Test');
		$this->email->message($isi);

		if ($this->email->send()) {
			echo "berhasil";
		}else{
			echo "gagal";
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		$this->load->view('login');
	}
	public function pagedas(){
		$admin = $this->db->get('admin')->row_array();
		$q['foto'] = $admin['foto'];
		$q['tanggota'] 	= $this->db->get('anggota')->num_rows();
		$q['tbuku'] 	= $this->db->get('buku')->num_rows();
		$q['tkelas'] 	= $this->db->get('kelas')->num_rows();
		$q['rank'] 		= $this->mlogin->banyakpem();
		// $q['kelas'] 	= $this->mlogin->banyakkelas();
		$q['buku'] 		= $this->mlogin->banyakbuku();
		$this->session->set_flashdata('page',"dashboard");
		$this->load->view('main',$q);
	}
		public function index(){
			$this->load->view('login');
		}
		public function register(){
			$q['kelas'] = $this->db->get('kelas');
			$this->load->view('register',$q);
		}
		public function ceklog(){
			$user = $this->input->post('user');
			$pass = $this->input->post('password');
			$hasil = $this->mlogin->ceklog($user,$pass);
			if ($hasil->num_rows() > 0) {
							$admin = $this->db->get('admin')->row_array();
							$q['foto'] = $admin['foto'];
							$q['tanggota'] 	= $this->db->get('anggota')->num_rows();
							$q['tbuku'] 	= $this->db->get('buku')->num_rows();
							$q['tkelas'] 	= $this->db->get('kelas')->num_rows();
							$q['rank'] 		= $this->mlogin->banyakpem();
							$q['buku'] 		= $this->mlogin->banyakbuku();
							$data = $hasil->row_array();
							$data_ses = array('nama'=>$data['nama_ad'],'id'=>$data['id_admin']);
							$sekolah =  $this->mlogin->sekolahdenda()->row_array();
							$ses = array('nama_s'=>$sekolah['nama_sekolah']);
							$this->session->set_userdata($ses);
							$this->session->set_userdata($data_ses);
							$this->session->set_flashdata('page',"dashboard");
							$this->session->set_flashdata('psn',"berhasil");
							$this->load->view('main',$q);
						}else{
							$this->session->set_flashdata('psn',"gagal");
							$this->load->view('login');
						}			
		}
}