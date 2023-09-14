<?php
error_reporting(E_ERROR | E_PARSE);
require_once('../vendor/autoload.php');
include("../config/koneksi.php");
// Import library
use Firebase\JWT\JWT;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  exit();
}
// Ambil JSON yang dikirim oleh user
$json = file_get_contents('php://input');
// Decode json tersebut agar mudah mengambil nilainya
$input = json_decode($json);

// Jika tidak ada data email atau password
if (!isset($input->email) || !isset($input->password)) {
  http_response_code(400);
  exit();
}
// data dari database
$query="SELECT * from user where email='".$input->email."' and password='".md5($input->password)."'";
//echo $query;
$result = mysqli_query($connect,$query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
if($count>0){
  $email=$row['email'];
  $password=$row['password'];
}else{
  $email='';
  $password='';
}
$user = [
  'email' => $email,
  'password' => $password
];

// Jika email atau password tidak sesuai
if ($input->email !== $user['email'] || md5($input->password) !== $user['password']) {
  echo json_encode([
    'message' => 'Email atau password tidak sesuai'
  ]);
  exit();
}

// 15 * 60 (detik) = 15 menit
$expired_time = time() + (15 * 60);
$payload = [
  'email' => $input->email,
  'exp' => $expired_time
];

$access_token = JWT::encode($payload, $_ENV['ACCESS_TOKEN_SECRET'],'HS256');

echo json_encode([
  'accessToken' => $access_token,
  'expiry' => date(DATE_ISO8601, $expired_time)
]);
// Ubah waktu kadaluarsa lebih lama (1 jam)
$payload['exp'] = time() + (60 * 60);
$refresh_token = JWT::encode($payload, $_ENV['REFRESH_TOKEN_SECRET'], 'HS256');
// Simpan refresh token di http-only cookie
setcookie('refreshToken', $refresh_token, $payload['exp'], '', '', false, true);
