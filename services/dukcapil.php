<?php
require_once('../vendor/autoload.php');
$server= "https://10.10.100.16:8000/";

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
print_r($input);
if (!isset($input->NIK) || ($input->NIK=='')) {
  http_response_code(400);
  exit();
}
try {
  JWT::decode($token, new Key($_ENV['ACCESS_TOKEN_SECRET'], 'HS256'));

  $data_arr = array(
    "USER_ID" => "10022023100243BPS4484",
    "PASSWORD" => "7YWP65",
    "IP_USER" => "10.200.130.3",
    "TRESHOLD" => "80",
    "NIK" => "3372041003870006",
    "NO_KK" => "3372042605140004",
    "NAMA_LGKP" => "Paijo",
    "TMPT_LHR" => "Surakarta",
    "TGL_LHR" => "10-03-1987",
    "JENIS_KLMIN" => "Laki-laki",
    "JENIS_PKRJN" => "Pegawai Negri Sipil",
    "KAB_NAME" => "Surakarta",
    "NO_KEC" => "040",
    "KEC_NAME" => "Jebres",
    "NO_KAB" => "072",
    "PROP_NAME" => "Jawa Tengah",
    "NO_KEL" => "23",
    "NO_PROP" => "33",
    "KEL_NAME" => "Mojosongo",
    "ALAMAT" => "Perum Puncak Solo ",
    "NO_RT" => "5",
    "NO_RW" => "4"
  );

  $url = $server.'dukcapil/get_json/BPS/CALL_VERIFY_BY_ELEMEN';
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
  print_r($content);
  if (array_key_exists("RESPONSE_CODE", $content)) {
    //"Key exists!";
    $status = $content['RESPONSE_CODE'];
  } else {
    // "Key does not exist!";
    $status = "NIK Sesuai";

    echo ekstrak_nilai($content['NAMA_LGKP']);
  }
  echo $status;
  //echo json_encode($games);
} catch (Exception $e) {
  http_response_code(401);
  exit();
}
