<?php
header('Access-Control-Allow-Origin: *'); 
include "../config/koneksi.php";
$arr=[];
//  if ($result = $mysqli->query("SELECT * from t_dukcapil ")) {
//  while($row = $result->fetch_array(MYSQLI_ASSOC)) {
//      $myArray= $row;
//  }
/*
foreach($_POST as $key => $value) {
    if($value!='')
    $arr[$key]=$_POST[$key ]." Sesuai";
    else
    $arr[$key]=$_POST[$key ]." Tidak Sesuai";
}
*/
$data_arr = array(
  "email" => $_POST['username'],
  "password" => $_POST['password']
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
  "TRESHOLD"=>  $_POST['level'],
  "NIK"=>  $_POST['nik'],
  "NO_KK"=> $_POST['nik'],
  "NAMA_LGKP"=> $_POST['nama'],
  "TMPT_LHR"=> $_POST['tempat'],
  "TGL_LHR"=> $_POST['tglLhr'],
  "JENIS_KLMIN"=> $_POST['jenkel'],
  "NO_KEC"=> $_POST['kec'],
  "NO_KAB"=> $_POST['kab'],
  "NO_PROP"=> $_POST['prov'],
  "ALAMAT"=> $_POST['alamat'],
  "NO_RT"=> $_POST['rt'],
  "NO_RW"=> $_POST['rw'],
);
$options2 = array(
  'http' => array(
    //'header' => "Content-type: application/json,Accept: application/json\r\n",
    'header' => "Content-Type: application/json,Accept: application/json\r\n".
                "Authorization: Bearer " . $token,
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

echo json_encode($hasil2);
// }
?>
