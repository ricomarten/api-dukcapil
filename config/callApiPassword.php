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
