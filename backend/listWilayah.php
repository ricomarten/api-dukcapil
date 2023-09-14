<?php
header('Access-Control-Allow-Origin: *'); 
include "../config/koneksi.php";
$arr=[];
if(isset($_GET['prov']) && !isset($_GET['kab']) && !isset($_GET['kec'])){
    $prov=$_GET['prov'];
    if($result = mysqli_query($connect,"SELECT * from mkab where kdprov=$prov")) {
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $kode=substr($row['kdkab'], 0, 1);
            if($kode=='7'){
                $myArray['nama']="KOTA ". $row['nama'];
            }else{
                $myArray['nama']="KAB. ".$row['nama'];
            }
            $myArray['kdkab']=$row['kdkab'];
            array_push($arr,$myArray);
        }
    echo json_encode($arr);
    }
}else if(isset($_GET['prov']) && isset($_GET['kab']) && !isset($_GET['kec'])){
    $prov=$_GET['prov'];
    $kab=$_GET['kab'];
    if($result = mysqli_query($connect,"SELECT * from mkec where kdprov=$prov and kdkab=$kab")) {
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $myArray= $row;
            array_push($arr,$myArray);
        }
    echo json_encode($arr);
    }
}else if(isset($_GET['prov']) && isset($_GET['kab']) && isset($_GET['kec'])){
    $prov=$_GET['prov'];
    $kab=$_GET['kab'];
    $kec=$_GET['kec'];
    if($result = mysqli_query($connect,"SELECT * from mdesa where kdprov=$prov and kdkab=$kab and kdkec=$kec")) {
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $myArray= $row;
            array_push($arr,$myArray);
        }
    echo json_encode($arr);
    }
}
else{
    if($result = mysqli_query($connect,"SELECT * from mprov ")) {
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $myArray= $row;
            array_push($arr,$myArray);
        }
    echo json_encode($arr);
    }
}
mysqli_close($connect);
?>
