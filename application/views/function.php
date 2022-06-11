<?php 
class mail {
function sendMail($email){
    $this->load->library('email');
    $config['protocol'] = 'smtp';
    $config['mailtype'] = 'html';

    $config['smtp_host'] = 'mail.demolapakcode.net';
    $config['smtp_port'] = '26'; //smtp port number  
    $config['smtp_user'] = 'wakhid@demolapakcode.net';
    $config['smtp_pass'] = 'wakhid2018';
    $this->email->initialize($config);
    $this->email->from('wakhid@demolapakcode.net', 'wakhid');
    $this->email->to('abdulwakhid.2001@gmail.com');
    $isi= 'Silahkan Login '.'site_url("Cperpus/index")';
    $this->email->subject('Email Test');
    $this->email->message($isi);

    $this->email->send();
  }
}
function selisih($CheckIn,$CheckOut){
  $CheckInX = explode("-", $CheckIn);
  $CheckOutX =  explode("-", $CheckOut);
  $date1 =  mktime(0, 0, 0, $CheckInX[1],$CheckInX[2],$CheckInX[0]);
  $date2 =  mktime(0, 0, 0, $CheckOutX[1],$CheckOutX[2],$CheckOutX[0]);
  $interval =($date2 - $date1)/(3600*24);
  // returns numberofdays
  return  $interval ;
}
function rp($str){
    $jum = strlen($str);
    $jumtitik = ceil($jum/3);
    $balik = strrev($str);
    
    $awal = 0;
    $akhir = 3;
    for($x=0;$x<$jumtitik;$x++){
      $a[$x] = substr($balik,$awal,$akhir)."."; 
      $awal+=3;
    }
    $hasil = implode($a);
    $hasilakhir = strrev($hasil);
    $hasilakhir = substr($hasilakhir,1,$jum+$jumtitik);
          
    return "".$hasilakhir."";
}
function tgl($date){  
  $array_bulan = array(1=>'Januari','Februari','Maret', 'April', 'Mei', 'Juni','Juli','Agustus','September','Oktober', 'November','Desember');
  $date = strtotime($date);
  $tanggal = date ('j', $date);
  $bulan = $array_bulan[date('n',$date)];
  $tahun = date('Y',$date); 
  $result = $tanggal ." ". $bulan ." ". $tahun;       
  return($result);  
}
function bulan($bulan){
  if($bulan=='01'){$namabulan="Januari";}
  elseif($bulan=='01'){$namabulan="Januari";}
  elseif($bulan=='02'){$namabulan="Februari";}
  elseif($bulan=='03'){$namabulan="Maret";}
  elseif($bulan=='04'){$namabulan="April";}
  elseif($bulan=='05'){$namabulan="Mei";}
  elseif($bulan=='06'){$namabulan="Juni";}
  elseif($bulan=='07'){$namabulan="Juli";}
  elseif($bulan=='08'){$namabulan="Agustus";}
  elseif($bulan=='09'){$namabulan="September";}
  elseif($bulan=='10'){$namabulan="Oktober";}
  elseif($bulan=='11'){$namabulan="November";}
  elseif($bulan=='12'){$namabulan="Desember";}
  return($namabulan);
}
 
?>