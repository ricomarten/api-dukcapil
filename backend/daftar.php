<?php
header('Access-Control-Allow-Origin: *'); 
session_start();
include "../config/koneksi.php";

$nama=$_POST['nama'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$query="INSERT into user(nama,email,password) values('$nama','$email','$password')";
$result = mysqli_query($connect,$query);
if($result){
  echo "ok";
} 
else{
  echo "Gagal Daftar";
}
mysqli_close($connect);
?>
