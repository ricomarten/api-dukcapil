<?php
header('Access-Control-Allow-Origin: *'); 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "../config/koneksi.php";
$arr=[];
$sumber=$_GET['sumber'];
$label=[
  'NIK',
  'Nama', 
  'Nomor KK',
  'Jenis Kelamin',
  //'Tempat Lahir',
  'Tanggal Lahir',
  //'Agama',
  //'Status Perkawinan',
  //'Pekerjaan',
  'Alamat',
  'Provinsi',
  'Kabupaten',
  'Kecamatan',
  'Desa'
  //'RT',
  //'RW'
];
if ($result =  mysqli_query($connect,"SELECT * from t_rekap where sumber='$sumber'")) {
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        $myArray= $row;
        $sesuai=[
          (int)$row['nik_sesuai'],
          (int)$row['nama_sesuai'], 
          (int)$row['kk_sesuai'],
          (int)$row['jenkel_sesuai'],
          //(int)$row['tempat_lahir_sesuai'],
          (int)$row['tanggal_lahir_sesuai'],
          //(int)$row['agama_sesuai'],
          //(int)$row['status_perkawinan_sesuai'],
          //(int)$row['pekerjaan_sesuai'],
         
          (int)$row['alamat_sesuai'],
          (int)$row['nama_prov_sesuai'],
          (int)$row['nama_kab_sesuai'],
          (int)$row['nama_kec_sesuai'],
          (int)$row['nama_desa_sesuai'],
          //(int)$row['rt_sesuai'],
          //(int)$row['rw_sesuai']
        ];
        $beda=[
          (int)$row['nik_beda'],
          (int)$row['nama_beda'], 
          (int)$row['kk_beda'],
          (int)$row['jenkel_beda'],
          //(int)$row['tempat_lahir_beda'],
          (int)$row['tanggal_lahir_beda'],
          //(int)$row['agama_beda'],
          //(int)$row['status_perkawinan_beda'],
          //(int)$row['pekerjaan_beda'],
          
          (int)$row['alamat_beda'],
          (int)$row['nama_prov_beda'],
          (int)$row['nama_kab_beda'],
          (int)$row['nama_kec_beda'],
          (int)$row['nama_desa_beda'],
          //(int)$row['rt_beda'],
          //(int)$row['rw_beda']
        ];
        $data['akses']=(int)$row['jml'];
        $data['nik']=(int)$row['nik_sesuai'];
        $data['nama']=(int)$row['nama_sesuai'];
        $data['alamat']=(int)$row['alamat_sesuai'];
        $data['nik_p']=(int)((int)$row['nik_sesuai']/((int)$row['nik_sesuai']+(int)$row['nik_beda'])*100);
        $data['nama_p']=(int)((int)$row['nama_sesuai']/((int)$row['nama_sesuai']+(int)$row['nama_beda'])*100);
        $data['alamat_p']=(int)((int)$row['alamat_sesuai']/((int)$row['alamat_sesuai']+(int)$row['alamat_beda'])*100);

       
        //array_push($arr,$myArray);
    }
$arr['chart']['labels']=$label;
$arr['chart']['datasets'][0]['label']='Sesuai';
$arr['chart']['datasets'][0]['backgroundColor']='rgba(60,141,188,0.9)';
$arr['chart']['datasets'][0]['borderColor']='rgba(60,141,188,0.8)';
$arr['chart']['datasets'][0]['pointRadius']=false;
$arr['chart']['datasets'][0]['pointColor']='#3b8bba';
$arr['chart']['datasets'][0]['pointStrokeColor']='rgba(60,141,188,1)';
$arr['chart']['datasets'][0]['pointHighlightFill']='#fff';
$arr['chart']['datasets'][0]['pointHighlightStroke']='rgba(60,141,188,1)';
$arr['chart']['datasets'][0]['data']=$sesuai;

$arr['chart']['datasets'][1]['label']='Tidak Sesuai';
$arr['chart']['datasets'][1]['backgroundColor']='rgba(210, 214, 222, 1)';
$arr['chart']['datasets'][1]['borderColor']='rgba(210, 214, 222, 1';
$arr['chart']['datasets'][1]['pointRadius']=false;
$arr['chart']['datasets'][1]['pointColor']='rgba(210, 214, 222, 1)';
$arr['chart']['datasets'][1]['pointStrokeColor']='#c1c7d1';
$arr['chart']['datasets'][1]['pointHighlightFill']='#fff';
$arr['chart']['datasets'][1]['pointHighlightStroke']='rgba(220,220,220,1)';
$arr['chart']['datasets'][1]['data']=$beda;
$arr['data']=$data;
//$arr['sesuai']=$sesuai;
//$arr['beda']=$beda;
echo json_encode($arr);
mysqli_close($connect);
}
?>
