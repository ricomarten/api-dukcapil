<?php
header('Access-Control-Allow-Origin: *'); 
session_start();
include "../config/koneksi.php";
$username=$_GET['user'];
$password=$_GET['password'];
//echo $password;
$query="SELECT * from user where email='".$username."' and password='".md5($password)."'";
//echo $query;
$result = mysqli_query($connect,$query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
//echo $count;
if($count>0){
  mysqli_query($connect,"UPDATE user set lastlogin='".date("Y-m-d H:i:s")."' where email='".$username."' ");
  $_SESSION['username']=$username;
  echo "ok";
} 
else{
  echo "Gagal Login";
}
mysqli_close($connect);
?>
