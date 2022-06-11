<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpinjam extends CI_Controller {
    public $ci = NULL;
    function __construct(){
		parent::__construct();
		$this->load->model('mpinjam');
        $this->ci = & get_instance();
	}
    public function panjang(){
        $id = $this->input->post('buku');
        $data = $this->mpinjam->caribuku($id)->row_array();
        $pinjam = $this->input->post('jumlah');
        $hasil = $data['jumlah_b'] + $pinjam;
        $this->mpinjam->updatebuku($id,$hasil);
        $idb = $this->input->post('id');
        $jumpi = $this->mpinjam->caripinjam($idb)->row_array();
        $upjum = $jumpi['jumlah_pinjam'] - $pinjam;
        $this->mpinjam->updatejumpinjam($idb,$upjum);
        $this->mpinjam->updatpinjam($idb);
        $q['denda'] = $this->mpinjam->denda();
        $q['pinjam'] = $this->mpinjam->tampilpinjam();
        $data2 = $this->mpinjam->tampilpinjam()->row_array();
        // if ($data2['status'] = "P") {
        //     $q['pesan'] = '<small class="label bg-primary">Dipinjam</small>';
        // }elseif ($data2['status'] = "T") {
        //     $q['pesan'] = '<small class="label bg-green">Diperpanjang</small>';
        // }
        $this->session->set_flashdata('page',"pinjam");
        $this->session->set_flashdata('psn',"panjangberhasil");
        $this->load->view('main',$q);
    }
    public function kembalikan(){
        $idb = $this->input->post('id');
        $cek = $this->mpinjam->cekkembali($idb);
        if ($cek->num_rows() > 0) {
            $q['pinjam'] = $this->mpinjam->tampilpinjam();
            $data = $this->mpinjam->tampilpinjam()->row_array();
            if ($data['status'] == "P") {
                $q['pesan'] = '<small class="label bg-primary">Dipinjam</small>';
            }elseif ($data['status'] == "T") {
                $q['pesan'] = '<small class="label bg-green">Diperpanjang</small>';
            }
            $this->session->set_flashdata('page',"pinjam");
            $this->session->set_flashdata('psn',"kembaligagal");
            $this->load->view('main',$q);
        }else{
            $this->mpinjam->updatpinjam($idb);
            $this->mpinjam->kembalikan();
            $id = $this->input->post('buku');
            $data = $this->mpinjam->caribuku($id)->row_array();
            $pinjam = $this->input->post('jumlah');
            $hasil = $data['jumlah_b'] + $pinjam;
            $this->mpinjam->updatebuku($id,$hasil);
            $q['denda'] = $this->mpinjam->denda();
            $q['pinjam'] = $this->mpinjam->tampilpinjam();
            $data = $this->mpinjam->tampilpinjam()->row_array();
            if ($data['status'] == "P") {
                $q['pesan'] = '<small class="label bg-primary">Dipinjam</small>';
            }elseif ($data['status'] == "T") {
                $q['pesan'] = '<small class="label bg-green">Diperpanjang</small>';
            }
            $this->session->set_flashdata('page',"pinjam");
            $this->session->set_flashdata('psn',"kembaliberhasil");
            $this->load->view('main',$q);
        }
    }
    public function tambahpinjamnew(){
      $q['buku'] = $this->mpinjam->tampilbuku();
      $this->session->set_flashdata('page',"tampilpinjamnew");
      $this->load->view('main',$q);
    }
    public function simpanpinjam(){
        $tglsek = date('Y-m-d');
        $pinjam = $this->input->post('jumlah');
        $id = $this->input->post('buku');
        $kelas = $this->input->post('kelas');
        $cek = $this->mpinjam->cek($id,$pinjam,$tglsek,$kelas);
        if ($cek->num_rows() > 0) {
            $q['buku'] = $this->mpinjam->tampilbuku();
            $q['kelas'] = $this->mpinjam->tampilkelas();
            $this->session->set_flashdata('page',"tampilpinjamnew");
            $this->session->set_flashdata('psn',"tambahgagal");
            $this->load->view('main',$q);
        }else{
            $data = $this->mpinjam->caribuku($id)->row_array();
            $hasil = $data['jumlah_b'] - $pinjam;
            $this->mpinjam->updatebuku($id,$hasil);
            $lama = $this->input->post('lama');
            $next = mktime(0,0,0,date("m"),date("d")+$lama,date("Y"));
            $kembali = date('Y-m-d',$next);
            $this->mpinjam->simpanpinjam($kembali);
            $q['buku'] = $this->mpinjam->tampilbuku();
            $q['kelas'] = $this->mpinjam->tampilkelas();
            $this->session->set_flashdata('page',"tampilpinjamnew");
            $this->session->set_flashdata('psn',"tambahberhasil");
            $this->load->view('main',$q);
        }
    }
    public function ajaxkelas(){
        $id = $this->input->post('id');
        $hasil = $this->mpinjam->ajaxkelas($id);
        echo json_encode($hasil);
    }
    public function ajaxbuku(){
        $id = $this->input->post('id');
        $data = $this->mpinjam->ajaxbuku($id);
        echo json_encode($data);
    }
    public function tambahpinjam(){
       if ($this->input->post('kd_b') == "salah") {
        $this->session->set_flashdata('psn',"pilihkode");
        redirect('cpinjam/tambahpinjamnew');
      }else{
        $kode = $this->input->post('kd_b');
        $q['bukunew'] =  $this->mpinjam->caribukunew($kode);
        $q['buku'] = $this->mpinjam->tampilbuku();
        $q['kelas'] = $this->mpinjam->tampilkelas();
        $this->session->set_flashdata('page',"tambahpinjam");
        $this->load->view('main',$q);
      }
    }
    public function jajal($email){
        $denda = 1000;
        $tgl = date('d-m-Y');
        $jumlah  = 4;
        $isi= '
        <!DOCTYPE html>
        <html>
        <head>
            <title></title>
        </head>
        <body>
        <h4>Pemberitahuan</h4>
        <p>Buku yang anda pinjam sudah melewati batas tanggal pengembalian</p><br>
        <br>
        <ul>
            <li>Denda : '.$denda.'</li><br>
            <li>Tanggal Kembali : '.$tgl.'</li><br>
            <li>Telat : '.$jumlah.' hari</li>
        </ul>
        </body>
        </html>
        ';
        echo $isi;
        echo $email;
    }
	public function sendmail($email,$jumlah,$user){
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
        $isi= '
        <!DOCTYPE html>
        <html>
        <head>
            <title></title>
        </head>
        <body>
        <h4>Kepada $user</h4>
        <p>Buku yang anda pinjam sudah melewati batas tanggal pengembalian</p><br>
        <br>
        <ul>
            <li>Denda : $denda</li><br>
            <li>Tanggal Kembali : $tgl</li><br>
            <li>Telat : $jumlah hari</li>
        </ul>
        </body>
        </html>
        ';
        $this->email->subject('Pemberitahuan');
        $this->email->message($isi);

        $this->email->send();
	}
	public function tampilpinjam(){
        $q['denda'] = $this->mpinjam->denda();
        $q['pinjam'] = $this->mpinjam->tampilpinjam();
		$data = $this->mpinjam->tampilpinjam()->row_array();
        if ($data['status'] == "P") {
            $q['pesan'] = '<small class="label bg-primary">Dipinjam</small>';
        }elseif ($data['status'] == "T") {
            $q['pesan'] = '<small class="label bg-green">Diperpanjang</small>';
        }
		$this->session->set_flashdata('page',"pinjam");
		$this->load->view('main',$q);
	}
}