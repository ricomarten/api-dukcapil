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

//$content=json_decode(json_encode($hasil), true);
//print_r($result);
$token=$hasil->accessToken;
$url2 = 'http://localhost/api-dukcapil/services/games.php';
$options2 = array(
  'http' => array(
    //'header' => "Content-type: application/json,Accept: application/json\r\n",
    'header' => "Authorization: Bearer " . $token,
    'method' => 'POST',
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
$data_arr= array(
  "USER_ID"=> "10022023100243BPS4484",
  "PASSWORD"=> "7YWP65",
  "IP_USER"=> "10.200.130.3",
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

//$make_call = callAPI('POST', 'https://10.10.100.16:8000/dukcapil/get_json/BPS/CALL_VERIFY_BY_ELEMEN', json_encode($data_arr));
//$response = json_decode($make_call, true,512, JSON_BIGINT_AS_STRING);
//$data_hasil = $response['content'][0];
//print_r($response);
$url = 'https://10.10.100.16:8000/dukcapil/get_json/BPS/CALL_VERIFY_BY_ELEMEN';
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
  $status="NIK Sesuai";                       
  echo ekstrak_nilai($content['NAMA_LGKP']);

}
echo $status;
