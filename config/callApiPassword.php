<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("Asia/Jakarta");
$table='api-dukcapil';
function ekstrak_nilai($string){
   $nilai_all=explode("(",$string);
   $nilai=str_replace(")","",$nilai_all[1]);
   return $nilai;
}
$data_arr= array(
    "email"=> "ricomarten@gmail.com",
    "password"=> "12345"
);

$url = 'localhost/api-dukcapil/services/login.php';
$options = array(
  'http' => array(
    'header'  => "Content-type: application/json,Accept: application/json\r\n",
    'method'  => 'POST',
    'content' => json_encode($data_arr),
  ),
  "ssl"=>array(
    "verify_peer"=>false,
    "verify_peer_name"=>false,
),
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

$hasil=json_decode($result);

$content=json_decode(json_encode($hasil->content[0]), true);
print_r($content);
if (array_key_exists("RESPONSE_CODE",$content)){
  //"Key exists!";
  $status=$content['RESPONSE_CODE'];

}
else{
  // "Key does not exist!";
  $status="NIK Sesuai";
  /*
  "NO_KK": "Sesuai",
      "NAMA_LGKP": "Sesuai (100)",
      "TMPT_LHR": "Sesuai (100)",
      "TGL_LHR": "Sesuai",
      "PROP_NAME": "Tidak Sesuai",
      "KAB_NAME": "Tidak Sesuai",
      "KEC_NAME": "Tidak Sesuai",
      "KEL_NAME": "Tidak Sesuai",
      "NO_RT": "Tidak Sesuai",
      "NO_RW": "Tidak Sesuai",
      "ALAMAT": "Tidak Sesuai (0)",
      "JENIS_PKRJN": "Tidak Sesuai",
      "JENIS_KLMIN": "Tidak Sesuai",
      "NO_PROP": "Tidak Sesuai",
      "NO_KAB": "Tidak Sesuai",
      "NO_KEC": "Tidak Sesuai",
      "NO_KEL": "Tidak Sesuai",
      "NIK": "Sesuai"
      */
      //echo  $content['NAMA_LGKP'];                              
      echo ekstrak_nilai($content['NAMA_LGKP']);

}
echo $status;
?>