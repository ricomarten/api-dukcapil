<?php
require_once('../vendor/autoload.php');
$server = "https://10.10.100.16:8000/";

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  exit();
}

$headers = getallheaders();
if (!isset($headers['Authorization'])) {
  http_response_code(401);
  exit();
}

list(, $token) = explode(' ', $headers['Authorization']);
function ekstrak_nilai($string)
{
  $nilai_all = explode("(", $string);
  $nilai = str_replace(")", "", $nilai_all[1]);
  return $nilai;
}
// Ambil JSON yang dikirim oleh user
$json = file_get_contents('php://input');
// Decode json tersebut agar mudah mengambil nilainya
$input = json_decode($json);
//print_r($input);
if (!isset($input->NIK) || ($input->NIK == '')) {
  http_response_code(400);
  echo json_encode("NIK Tidak Boleh Kosong");
  exit();
}
try {
  JWT::decode($token, new Key($_ENV['ACCESS_TOKEN_SECRET'], 'HS256'));

  $data_arr = array(
    "USER_ID"   => "10022023100243BPS4484",
    "PASSWORD"  => "7YWP65",
    "IP_USER"   => "10.200.130.3",
    "TRESHOLD"  => $input->TRESHOLD,
    "NIK"       => $input->NIK,
    "NO_KK"     => $input->NO_KK,
    "NAMA_LGKP" => $input->NAMA_LGKP,
    "TMPT_LHR"  => $input->TMPT_LHR,
    "TGL_LHR"   => $input->TGL_LHR,
    "JENIS_KLMIN" => $input->JENIS_KLMIN,
    "JENIS_PKRJN" => $input->JENIS_PKRJN,
    "NO_PROP"   => $input->NO_PROP,
    "PROP_NAME" => $input->PROP_NAME,
    "NO_KAB"    => $input->NO_KAB,
    "KAB_NAME"  => $input->KAB_NAME,
    "NO_KEC"    => $input->NO_KEC,
    "KEC_NAME"  => $input->KEC_NAME,   
    "NO_KEL"    => $input->NO_KEL,
    "KEL_NAME"  => $input->KEL_NAME,
    "ALAMAT"    => $input->ALAMAT,
    "NO_RT"     => $input->NIK,
    "NO_RW"     => $input->NIK
  );

  $url = $server . 'dukcapil/get_json/BPS/CALL_VERIFY_BY_ELEMEN';
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

  $content = json_decode(json_encode($hasil->content[0]), true);
  echo json_encode($hasil);
  if (array_key_exists("RESPONSE_CODE", $content)) {
    //"Key exists!";
    $status = $content['RESPONSE_CODE'];
  } else {
    // "Key does not exist!";
    $status = "NIK Sesuai";

    //echo ekstrak_nilai($content['NAMA_LGKP']);
  }
  //echo json_encode($games);
} catch (Exception $e) {
  http_response_code(401);
  exit();
}
