<?php
header('Access-Control-Allow-Origin: *'); 
include "../config/koneksi.php";
$arr=[];
//  if ($result = $mysqli->query("SELECT * from t_dukcapil ")) {
//  while($row = $result->fetch_array(MYSQLI_ASSOC)) {
//      $myArray= $row;
//  }

foreach($_POST as $key => $value) {
    if($value!='')
    $arr[$key]=$_POST[$key ]." Sesuai";
    else
    $arr[$key]=$_POST[$key ]." Tidak Sesuai";
}

echo json_encode($arr);
// }
?>
