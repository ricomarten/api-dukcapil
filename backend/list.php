<?php
header('Access-Control-Allow-Origin: *'); 
//header('Content-Type: application/json; charset=utf-8');
include "../config/koneksi.php";
include "../config/koneksiSql.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('memory_limit', '-1');
error_reporting(E_ALL);

$arr=[];
$query_sql = "SELECT top 100 * from t_dukcapil ";
$stmt = $conn->query( $query_sql );
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  $myArray= $row;
  array_push($arr,$myArray);
}
/*
if ($result = mysqli_query($connect,"SELECT * from t_dukcapil ")) {
  while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
      $myArray= $row;
      array_push($arr,$myArray);
  }
*/
$data["data"]=$arr;
echo json_encode($data);
$stmt = null;
$conn = null;
//mysqli_close($connect);
//}
?>
