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
    "password"=> "123456"
);

$url = 'http://localhost/api-dukcapil/services/login.php';
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

//$content=json_decode(json_encode($hasil), true);
print_r($result);
//print_r($hasil->accessToken);

?>
