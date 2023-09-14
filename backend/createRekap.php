<?php
//header('Access-Control-Allow-Origin: *'); 
//header('Content-type: application/json');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("Asia/Jakarta");
$output=[];
include "config/koneksi.php";
include "config/koneksiSql.php";


$query_sql = "SELECT 
count(nik) jml, 
COUNT(CASE WHEN flag_nik = 1 THEN 1 END) nik_sesuai, 
COUNT(CASE WHEN flag_nik = 0 or flag_nik is null THEN 1 END) nik_beda, 

COUNT(CASE WHEN flag_kk = 1 THEN 1 END) kk_sesuai, 
COUNT(CASE WHEN flag_kk = 0 or flag_kk is null THEN 1 END) kk_beda, 

COUNT(CASE WHEN flag_nama = 1 THEN 1 END) nama_sesuai, 
COUNT(CASE WHEN flag_nama = 0 or flag_nama is null THEN 1 END) nama_beda, 

COUNT(CASE WHEN flag_jenkel = 1 THEN 1 END) jenkel_sesuai, 
COUNT(CASE WHEN flag_jenkel = 0 or flag_jenkel is null THEN 1 END) jenkel_beda, 

COUNT(CASE WHEN flag_tempat_lahir = 1 THEN 1 END) tempat_lahir_sesuai, 
COUNT(CASE WHEN flag_tempat_lahir = 0 or flag_tempat_lahir is null THEN 1 END) tempat_lahir_beda, 

COUNT(CASE WHEN flag_tanggal_lahir = 1 THEN 1 END) tanggal_lahir_sesuai, 
COUNT(CASE WHEN flag_tanggal_lahir = 0 or flag_tanggal_lahir is null THEN 1 END) tanggal_lahir_beda, 

COUNT(CASE WHEN flag_agama = 1 THEN 1 END) agama_sesuai, 
COUNT(CASE WHEN flag_agama = 0 or flag_agama is null THEN 1 END) agama_beda, 

COUNT(CASE WHEN flag_status_perkawinan = 1 THEN 1 END) status_perkawinan_sesuai, 
COUNT(CASE WHEN flag_status_perkawinan = 0 or flag_status_perkawinan is null THEN 1 END) status_perkawinan_beda, 

COUNT(CASE WHEN flag_status_hubungan = 1 THEN 1 END) status_hubungan_sesuai, 
COUNT(CASE WHEN flag_status_hubungan = 0 or flag_status_hubungan is null THEN 1 END) status_hubungan_beda, 

COUNT(CASE WHEN flag_pendidikan = 1 THEN 1 END) pendidikan_sesuai, 
COUNT(CASE WHEN flag_pendidikan = 0 or flag_pendidikan is null THEN 1 END) pendidikan_beda, 

COUNT(CASE WHEN flag_pekerjaan = 1 THEN 1 END) pekerjaan_sesuai, 
COUNT(CASE WHEN flag_pekerjaan = 0 or flag_pekerjaan is null THEN 1 END) pekerjaan_beda, 
 
COUNT(CASE WHEN flag_nama_ibu = 1 THEN 1 END) nama_ibu_sesuai, 
COUNT(CASE WHEN flag_nama_ibu = 0 or flag_nama_ibu is null THEN 1 END) nama_ibu_beda, 

COUNT(CASE WHEN flag_akta_lahir = 1 THEN 1 END) akta_lahir_sesuai, 
COUNT(CASE WHEN flag_akta_lahir = 0 or flag_akta_lahir is null THEN 1 END) akta_lahir_beda, 

COUNT(CASE WHEN flag_alamat = 1 THEN 1 END) alamat_sesuai, 
COUNT(CASE WHEN flag_alamat = 0 or flag_alamat is null THEN 1 END) alamat_beda, 

COUNT(CASE WHEN flag_prov = 1 THEN 1 END) nama_prov_sesuai, 
COUNT(CASE WHEN flag_prov = 0 or flag_prov is null THEN 1 END) nama_prov_beda, 

COUNT(CASE WHEN flag_kab = 1 THEN 1 END) nama_kab_sesuai, 
COUNT(CASE WHEN flag_kab = 0 or flag_kab is null THEN 1 END) nama_kab_beda, 

COUNT(CASE WHEN flag_kec = 1 THEN 1 END) nama_kec_sesuai, 
COUNT(CASE WHEN flag_kec = 0 or flag_kec is null THEN 1 END) nama_kec_beda, 

COUNT(CASE WHEN flag_desa = 1 THEN 1 END) nama_desa_sesuai, 
COUNT(CASE WHEN flag_desa = 0 or flag_desa is null THEN 1 END) nama_desa_beda

FROM Regsosek_PDN.dbo.t_dukcapil where cek='regsosek-sp'";
$stmt = $conn->query( $query_sql );

$data=[];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  $data=$row;
}

$sql = "UPDATE cekdukcapil.t_rekap
SET jml=".$data['jml'].",
nik_sesuai=".$data['nik_sesuai'].",
nik_beda=".$data['nik_beda'].",
kk_sesuai=".$data['kk_sesuai'].",
kk_beda=".$data['kk_beda'].",
nama_sesuai=".$data['nama_sesuai'].",
nama_beda=".$data['nama_beda'].",
jenkel_sesuai=".$data['jenkel_sesuai'].",
jenkel_beda=".$data['jenkel_beda'].",
tempat_lahir_sesuai=".$data['tempat_lahir_sesuai'].",
tempat_lahir_beda=".$data['tempat_lahir_beda'].",
tanggal_lahir_sesuai=".$data['tanggal_lahir_sesuai'].",
tanggal_lahir_beda=".$data['tanggal_lahir_beda'].",
agama_sesuai=".$data['agama_sesuai'].",
agama_beda=".$data['agama_beda'].",
status_perkawinan_sesuai=".$data['status_perkawinan_sesuai'].",
status_perkawinan_beda=".$data['status_perkawinan_beda'].",
status_hubungan_sesuai=".$data['status_hubungan_sesuai'].",
status_hubungan_beda=".$data['status_hubungan_beda'].",
pendidikan_sesuai=".$data['pendidikan_sesuai'].",
pendidikan_beda=".$data['pendidikan_beda'].",
pekerjaan_sesuai=".$data['pekerjaan_sesuai'].",
pekerjaan_beda=".$data['pekerjaan_beda'].",
nama_ibu_sesuai=".$data['nama_ibu_sesuai'].",
nama_ibu_beda=".$data['nama_ibu_beda'].",
akta_lahir_sesuai=".$data['akta_lahir_sesuai'].",
akta_lahir_beda=".$data['akta_lahir_beda'].",
alamat_sesuai=".$data['alamat_sesuai'].",
alamat_beda=".$data['alamat_beda'].",
nama_prov_sesuai=".$data['nama_prov_sesuai'].",
nama_prov_beda=".$data['nama_prov_beda'].",
nama_kab_sesuai=".$data['nama_kab_sesuai'].",
nama_kab_beda=".$data['nama_kab_beda'].",
nama_kec_sesuai=".$data['nama_kec_sesuai'].",
nama_kec_beda=".$data['nama_kec_beda'].",
nama_desa_sesuai=".$data['nama_desa_sesuai'].",
nama_desa_beda=".$data['nama_desa_beda'].",
`update`='".date("Y-m-d")."' where sumber='regsosek-sp';";


if (mysqli_query($connect,$sql) === TRUE) {
  //$myfile = fopen("backend/log.txt", "a") or die("Unable to open file!");
  //$txt = "Update Record updated successfully\n";
  //fwrite($myfile, $txt);
  //fclose($myfile);
  echo "Berhasil";
  
} else {
  //$myfile = fopen("backend/log.txt", "a") or die("Unable to open file!");
  //$txt = "Error updating record: " .mysqli_error($connect)."\n";
  //fwrite($myfile, $txt);
  //fclose($myfile);
  echo "Gagal";
}
?>
