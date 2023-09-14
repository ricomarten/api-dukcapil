<?php
$page = $_SERVER['PHP_SELF'];
$sec = "1";
header("Refresh: $sec; url=$page");
header('Access-Control-Allow-Origin: *');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("Asia/Jakarta");
$output = [];
include "../config/koneksiSql.php";
$time_start = microtime(true);
$table = 'data-sp';
function ekstrak_nilai($string)
{
  $nilai_all = explode("(", $string);
  $nilai = str_replace(")", "", $nilai_all[1]);
  return $nilai;
}
function ekstrak_kata($string)
{
  $nilai_all = explode("(", $string);
  $nilai = trim($nilai_all[0], " ");
  return $nilai;
}
$arr = [];
//$query_sql = 'select top 5 * from sp.sp2020_individu_step12_final_plus_wna_akhir_rev2';
$query_sql = "SELECT top 100 sp.*,sls.nmprov ,sls.nmkab ,sls.nmkec ,sls.nmdesa  
from Regsosek_PDN.dbo.nik_sp_withflag_dob sp left join regsosek.dbo.m_desa_lengkap sls on
 SUBSTRING(sp.kode_sls_akhir,1,10) = sls.iddesa where sp.id_record 
not in  (select idrecord from record_sp) and  keterangan <>'nik is null'
and cast(left(sp.kode_sls_akhir,2) as int)=11";
$stmt = $conn->query($query_sql);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $d = [];
  #tgl_lahir_update=r[11] 
  if($row['nomor_kk']!=""){
    if($row['nomor_kk']=="null")
      $d['NO_KK']= 0;
    else{
      $d['NO_KK']=str_replace("-","0",$row['nomor_kk']);
      $d['NO_KK']=str_replace("*","0",$d['NO_KK']);
    }
  }
  $d['NIK']       = str_replace("-","0",$row['nik_final']);
  $d['NO_KK']     = $row['nomor_kk'];
  $d['NAMA_LGKP'] = $row['nama'];
  $d['ALAMAT']    = $row['alamat'];
  //var_dump($row['tgl_lahir_update']);
  //var_dump($row['tgl']);
  //var_dump($row['bln']);
  //var_dump($row['thn']);
  if ($row['tgl_lahir_update']=='' || $row['tgl_lahir_update']==NULL){
    if($row['tgl']=='' || $row['bln']=='' || $row['thn']==''){
      $d['TGL_LHR'] = "00-00-0000";
      $d['TGL_LHR_S'] = NULL;
    }else{
      if($row['tgl']=='0')
        $tgl="01";
      else{
        $tgl=str_replace("-","0",$row['tgl']);
        $bln=$row['tgl'];
        $thn=$row['thn'];
        $d['TGL_LHR'] =$tgl."-".$bln."-".$thn;
        $d['TGL_LHR_S']=$thn."-".$bln."-".$tgl;
      }
    }
  }else{
    $pisahtanggal=explode(" ",$row['tgl_lahir_update']);
    $pisah=explode("-",$pisahtanggal[0]);
    $year = $pisah[0];
    $month = $pisah[1];
    $day = $pisah[2];
    if($day=='0'){
      $day="01";
      $d['TGL_LHR'] =$day."-".$month."-".$year;
    }else $d['TGL_LHR'] =$day."-".$month."-".$year;
    $d['TGL_LHR_S']=$year."-".$month."-".$day;
  } 


  if ($row['jk_perapihan'] == '1') {
    $d['JENIS_KLMIN'] = "Laki-laki";
  } else {
    $d['JENIS_KLMIN'] = "Perempuan";
  }
  $d['PROP_NAME']   = $row['nmprov'];
  $d['KAB_NAME']    = $row['nmkab'];
  $d['KEC_NAME']    = $row['nmkec'];
  $d['KEL_NAME']    = $row['nmdesa'];
  $d['NO_PROP']     = substr($row['kode_sls_akhir'],0,2);
  $d['NO_KAB']      = substr($row['kode_sls_akhir'],2,2);
  $d['NO_KEC']      = substr($row['kode_sls_akhir'],4,3);
  $d['NO_KEL']      = substr($row['kode_sls_akhir'],7,3);
  $d['kode_sls']    = $row['kode_sls_akhir'];
  $id_record=$row['id_record'];

  $data_arr = array(
    "USER_ID"     => "10022023100243BPS4484",
    "PASSWORD"    => "7YWP65",
    "IP_USER"     => "10.200.130.3",
    "TRESHOLD"    => "80",
    "NIK"         => $d['NIK'],
    "NO_KK"       => $d['NO_KK'],
    "NAMA_LGKP"   => $d['NAMA_LGKP'],
    "TMPT_LHR"    => " ",
    "TGL_LHR"     => $d['TGL_LHR'],
    "JENIS_KLMIN" => $d['JENIS_KLMIN'],
    "JENIS_PKRJN" => " ",
    "KAB_NAME"    => $d['KAB_NAME'],
    "NO_KEC"      => $d['NO_KEC'],
    "KEC_NAME"    => $d['KEC_NAME'],
    "NO_KAB"      => $d['NO_KAB'],
    "PROP_NAME"   => $d['PROP_NAME'],
    "NO_KEL"      => $d['NO_KEL'],
    "NO_PROP"     => $d['NO_PROP'],
    "KEL_NAME"    => $d['KEL_NAME'],
    "ALAMAT"      => $d['ALAMAT'],
    "NO_RT"       => " ",
    "NO_RW"       => " "
  );

  //call API
  $url = 'https://10.10.100.16:8000/dukcapil/get_json/BPS/CALL_VERIFY_BY_ELEMEN';
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
  //print_r($row);
  //print_r($d);
  $context  = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
  $hasil = json_decode($result);
  $content = json_decode(json_encode($hasil->content[0]), true);
  //print_r($content);
  if (array_key_exists("RESPONSE_CODE", $content)) {
    //Key exists; tidak ditemukan
    $status = $content['RESPONSE'];

    if (
      $content['RESPONSE_CODE'] == '08' || $content['RESPONSE_CODE'] == '11' ||
      $content['RESPONSE_CODE'] == '12' || $content['RESPONSE_CODE'] == '13' ||
      $content['RESPONSE_CODE'] == '14' || $content['RESPONSE_CODE'] == '15'
    ) {

      $sql2 = "INSERT INTO Regsosek_PDN.dbo.t_dukcapil
        (nik, flag_nik, cek, status,idrecord)
        VALUES(?, ?, ?, ?, ?);";
      $stmt2 = $conn->prepare($sql2);
      $nik = $d['NIK'];
      $flag_nik = 0;
      $cek = $table;

      $stmt2->execute([
        $nik,
        $flag_nik,
        $cek,
        $status,
        $id_record
      ]);
      $sql3 = "INSERT INTO dbo.record_regsosek (id_reg) values (?) ;";
  
      $stmt3 = $conn->prepare($sql3);
      $cek = '1';
      $stmt3->execute([
        $id_record
      ]);
    }
  } else {
    //Data ditemukan;
    $status = "NIK Sesuai";
    $sql2 = "INSERT INTO Regsosek_PDN.dbo.t_dukcapil
    (nik, flag_nik, 
    kk, flag_kk, 
    nama, flag_nama, level_nama, 
    jenkel, flag_jenkel, 
    tempat_lahir, flag_tempat_lahir,level_tempat_lahir, 
    tanggal_lahir, flag_tanggal_lahir, 
    agama, flag_agama, 
    status_perkawinan, flag_status_perkawinan, 
    status_hubungan, flag_status_hubungan, 
    pendidikan, flag_pendidikan, 
    pekerjaan, flag_pekerjaan, 
    nama_ibu, flag_nama_ibu, 
    akta_lahir, flag_akta_lahir, 
    alamat, flag_alamat, level_alamat, 
    kd_prov, nama_prov, flag_prov, 
    kd_kab, nama_kab, flag_kab, 
    kd_kec, nama_kec, flag_kec, 
    kd_desa, nama_desa, flag_desa, 
    rt, rw, [level], cek, status,idrecord)
    VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt2 = $conn->prepare($sql2);
    $nik = $d['NIK'];
    $flag_nik = ($content['NIK'] == "Sesuai") ? 1 : 0;
    $kk = $d['NO_KK'];
    $flag_kk = ($content['NO_KK'] == "Sesuai") ? 1 : 0;
    $nama = $d['NAMA_LGKP'];
    $flag_nama = (ekstrak_kata($content['NAMA_LGKP']) == "Sesuai") ? 1 : 0;
    $level_nama = ekstrak_nilai($content['NAMA_LGKP']);
    $jenkel = $d['JENIS_KLMIN'];
    $flag_jenkel = ($content['JENIS_KLMIN'] == "Sesuai") ? 1 : 0;
    $tempat_lahir = "";
    $flag_tempat_lahir = 0;
    $level_tempat_lahir = 0;
    $tanggal_lahir = $d['TGL_LHR_S'];
    $flag_tanggal_lahir = ($content['TGL_LHR'] == "Sesuai") ? 1 : 0;
    $agama = "";
    $flag_agama = "";
    $status_perkawinan = "";
    $flag_status_perkawinan = "";
    $status_hubungan = "";
    $flag_status_hubungan = "";
    $pendidikan = "";
    $flag_pendidikan = "";
    $pekerjaan = "";
    $flag_pekerjaan = "";
    $nama_ibu = "";
    $flag_nama_ibu = "";
    $akta_lahir = "";
    $flag_akta_lahir = "";
    $alamat = $d['ALAMAT'];
    $flag_alamat = (ekstrak_kata($content['ALAMAT']) == "Sesuai") ? 1 : 0;
    $level_alamat = ekstrak_nilai($content['ALAMAT']);
    $kd_prov = "";
    $nama_prov = $d['PROP_NAME'];
    $flag_prov = ($content['PROP_NAME'] == "Sesuai") ? 1 : 0;
    $kd_kab = "";
    $nama_kab = $d['KAB_NAME'];
    $flag_kab = ($content['KAB_NAME'] == "Sesuai") ? 1 : 0;
    $kd_kec = "";
    $nama_kec = $d['KEC_NAME'];
    $flag_kec = ($content['KEC_NAME'] == "Sesuai") ? 1 : 0;
    $kd_desa = "";
    $nama_desa = $d['KEL_NAME'];
    $flag_desa = ($content['KEL_NAME'] == "Sesuai") ? 1 : 0;
    $rt = "";
    $rw = "";
    $level = 80;
    $cek = $table;

    $stmt2->execute([
      $nik,
      $flag_nik,
      $kk,
      $flag_kk,
      $nama,
      $flag_nama,
      $level_nama,
      $jenkel,
      $flag_jenkel,
      $tempat_lahir,
      $flag_tempat_lahir,
      $level_tempat_lahir,
      $tanggal_lahir,
      $flag_tanggal_lahir,
      $agama,
      $flag_agama,
      $status_perkawinan,
      $flag_status_perkawinan,
      $status_hubungan,
      $flag_status_hubungan,
      $pendidikan,
      $flag_pendidikan,
      $pekerjaan,
      $flag_pekerjaan,
      $nama_ibu,
      $flag_nama_ibu,
      $akta_lahir,
      $flag_akta_lahir,
      $alamat,
      $flag_alamat,
      $level_alamat,
      $kd_prov,
      $nama_prov,
      $flag_prov,
      $kd_kab,
      $nama_kab,
      $flag_kab,
      $kd_kec,
      $nama_kec,
      $flag_kec,
      $kd_desa,
      $nama_desa,
      $flag_desa,
      $rt,
      $rw,
      $level,
      $cek,
      $status,
      $id_record
    ]);

    $sql3 = "INSERT INTO dbo.record_regsosek (id_reg) values (?) ;";
  
      $stmt3 = $conn->prepare($sql3);
      $cek = '1';
      $stmt3->execute([
        $id_record
      ]);
  }
  $out['NIK']=$d['NIK'];
  $out['Status']=$status;
  array_push($output,$out);
}


$stmt = null;
$conn = null;

$time_end = microtime(true);
$execution_time = ($time_end - $time_start);

//$output['NIK'] = $d['NIK'];
//$output['Status'] = $status;
$output['Total Execution Time'] = $execution_time . " detik";

echo json_encode($output);

//$myfile = fopen("log.txt", "a") or die("Unable to open file!");
//$txt = $d['NIK'] . " " . $status . " " . $execution_time . " detik" . "\n";
//fwrite($myfile, $txt);
//fclose($myfile);

