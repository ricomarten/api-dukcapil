<?php
// Import script autoload agar bisa menggunakan library
require_once('../vendor/autoload.php');
// Import library
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

try {
  // Men-decode token. Dalam library ini juga sudah sekaligus memverfikasinya
  JWT::decode($token, new Key($_ENV['ACCESS_TOKEN_SECRET'], 'HS256'));
  // Data game yang akan dikirim jika token valid
  $games = [
    [
      'title' => 'Dota 2',
      'genre' => 'Strategy'
    ],
    [
      'title' => 'Ragnarok',
      'genre' => 'Role Playing Game'
    ]
  ];
  echo json_encode($games);
} catch (Exception $e) {
  // Bagian ini akan jalan jika terdapat error saat JWT diverifikasi atau di-decode
  http_response_code(401);
  exit();
}
