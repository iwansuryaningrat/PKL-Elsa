<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Claporan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('mlaporan');
	}
	public function pengembalian(){
		$this->session->set_flashdata('page',"laporkembali");
		$this->load->view('main');
	}
	public function peminjaman(){
		$this->session->set_flashdata('page',"laporpinjam");
		$this->load->view('main');
	}
	public function kembalianB(){
		$q['query']	= $this->mlaporan->LBkembali();
		$awal 	= $this->input->post('bulan');
		$akhir 	= $this->input->post('tahun');
		$q['judul'] = "Laporan Data Pengembalian Bulan $awal Tahun $akhir";
		// load dompdf
        $this->load->helper('dompdf');
        //load content html
        $html = $this->load->view('Rpeminjaman',$q,TRUE);
        // create pdf using dompdf
        $filename = 'Pengembalian';
        $paper = 'A4';
        $orientation = 'potrait';
        pdf_create($html, $filename, $paper, $orientation);
	}
	public function kembalianH(){
		$q['query'] = $this->mlaporan->Lkembali();
			$awal 	= date('d-m-Y',strtotime($this->input->post('mulai')));
			$akhir 	= date('d-m-Y',strtotime($this->input->post('akhir')));
			$q['judul'] = "Laporan Data Pengembalian Tanggal $awal sampai $akhir";
		// load dompdf
        $this->load->helper('dompdf');
        //load content html
        $html = $this->load->view('Rpeminjaman',$q,TRUE);
        // create pdf using dompdf
        $filename = 'Pengembalian';
        $paper = 'A4';
        $orientation = 'potrait';
        pdf_create($html, $filename, $paper, $orientation);
	}
	public function peminjamanB(){
		$q['query']	= $this->mlaporan->LBpeminjaman();
		$awal 	= $this->input->post('bulan');
		$akhir 	= $this->input->post('tahun');
		$q['judul'] = "Laporan Data Peminjaman Bulan $awal Tahun $akhir";
		// load dompdf
        $this->load->helper('dompdf');
        //load content html
        $html = $this->load->view('Rpeminjaman',$q,TRUE);
        // create pdf using dompdf
        $filename = 'Peminjaman Bulan $awal';
        $paper = 'A4';
        $orientation = 'potrait';
        pdf_create($html, $filename, $paper, $orientation);
	}
	public function peminjamanH(){
			$q['query'] = $this->mlaporan->peminjamanH();
			$awal 	= date('d-m-Y',strtotime($this->input->post('mulai')));
			$akhir 	= date('d-m-Y',strtotime($this->input->post('akhir')));
			$q['judul'] = "Laporan Data Peminjaman Tanggal $awal sampai $akhir";
		// load dompdf
        $this->load->helper('dompdf');
        //load content html
        $html = $this->load->view('Rpeminjaman',$q,TRUE);
        // create pdf using dompdf
        $filename = 'Peminjaman';
        $paper = 'A4';
        $orientation = 'potrait';
        pdf_create($html, $filename, $paper, $orientation);
	}
}