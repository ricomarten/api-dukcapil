<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("Asia/Jakarta");

$data_arr = array(
  "email" => "ricomarten@gmail.com",
  "password" => "123456"
);

$url = 'http://localhost/api-dukcapil/services/login.php';
$options = array(
  'http' => array(
    'header'  => "Content-type: application/json,Accept: application/json\r\n",
    'method'  => 'POST',
    'content' => json_encode($data_arr),
  ),
  "ssl" => array(
    "verify_peer" => false,
    "verify_peer_name" => false,
  ),
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

$hasil = json_decode($result);

$token=$hasil->accessToken;
$url2 = 'http://localhost/api-dukcapil/services/dukcapil.php';

$data_arr= array(
  "TRESHOLD"=> "80",
  "NIK"=> "3372041003870006",
  "NO_KK"=> "3372042605140004",
  "NAMA_LGKP"=> "Paijo",
  "TMPT_LHR"=> "Surakarta",
  "TGL_LHR"=> "10-03-1987",
  "JENIS_KLMIN"=> "Laki-laki",
  "JENIS_PKRJN"=> "Pegawai Negri Sipil",
  "KAB_NAME"=> "Surakarta",
  "NO_KEC"=> "040",
  "KEC_NAME"=> "Jebres",
  "NO_KAB"=> "072",
  "PROP_NAME"=> "Jawa Tengah",
  "NO_KEL"=> "23",
  "NO_PROP"=> "33",
  "KEL_NAME"=> "Mojosongo",
  "ALAMAT"=> "Perum Puncak Solo ",
  "NO_RT"=> "5",
  "NO_RW"=> "4"
);
$options2 = array(
  'http' => array(
    //'header' => "Content-type: application/json,Accept: application/json\r\n",
    'header' => "Content-type: application/json,Accept: application/json\r\n,Authorization: Bearer " . $token,
    'method' => 'POST',
    'content' => json_encode($data_arr),
  ),
  "ssl" => array(
    "verify_peer" => false,
    "verify_peer_name" => false,
  ),
);

$context2  = stream_context_create($options2);
$result2 = file_get_contents($url2, false, $context2);
$hasil2 = json_decode($result2);
print_r($result2);
