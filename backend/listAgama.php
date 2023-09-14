<?php
header('Access-Control-Allow-Origin: *'); 
include "../config/koneksi.php";
$arr=[];

if ($result = mysqli_query($connect,"SELECT * from m_agama ")) {
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        $myArray= $row;
        array_push($arr,$myArray);
    }
echo json_encode($arr);
mysqli_close($connect);
}
?>
