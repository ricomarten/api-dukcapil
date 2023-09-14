<?php
//$page = $_SERVER['PHP_SELF'];
//$sec = "10";
//header("Refresh: $sec; url=$page");
error_reporting(0);
date_default_timezone_set("Asia/Jakarta");
$table='cek_nik';
function callAPI($method, $url, $data){
   $curl = curl_init();

   switch ($method){
      case "POST":
         curl_setopt($curl, CURLOPT_POST, 1);
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
         break;
      case "PUT":
         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
         break;
      default:
         if ($data)
            $url = sprintf("%s?%s", $url, http_build_query($data));
   }

   // OPTIONS:
   curl_setopt($curl, CURLOPT_URL, $url);
   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'APIKEY: UgtWB6pewLUrWlbNqmtjo5Gbe5GesSh0HTIf1RwgkJjhYVLK6zXaktdJlBaLMkfHL15s8HJU6x4IndKtWkQUjyhUttzjOubLMunt',
      'Content-Type: application/json',
   ));
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

   // EXECUTE:
   $result = curl_exec($curl);
   if(!$result){die("Connection Failure");}
   curl_close($curl);
   return $result;
}

$serverName = "10.0.2.67"; //serverName\instanceName
$connectionInfo = array( "Database"=>"dukcapil", "UID"=>"sa", "PWD"=>"bps12345");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

$time_start = microtime(true); 

echo "<table border='1'><tr>";
echo "<td>No</td>";
//echo "<td>Namadb</td>";
echo "<td>KTPdb</td>";
echo "<td>NIK</td>";
echo "<td>NO KK</td>";
echo "<td>Nama Lengkap</td>";
echo "<td>Status</td>";
echo "<td>Jenis Kelamin</td>";
echo "<td>Tgl Lahir</td>";
echo "<td>Agama</td>";
echo "<td>Pekerjaan</td>";
echo "<td>Akta Lahir</td>";
echo "<td>Pendidikan</td>";
echo "<td>Status Kawin</td>";
echo  "</tr>";

//do{
	$sql = "SELECT * FROM ".$table." where cek ='0' ORDER BY nik  OFFSET 0 ROWS FETCH NEXT 100 ROWS ONLY;";
	$stmt = sqlsrv_query( $conn, $sql );
	if( $stmt === false) {
		die( print_r( sqlsrv_errors(), true) );
	}
	
	$i=1;
	while( $data = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
		//echo $data[0]."<br>";
		$data_array =  array(
			  "nik"       => $data['nik'],
			  "user_id"   => "123adiluma",
			  "password"  => "51nZIZVF",
			  "IP_USER"   => "x"      
		);
		
		$make_call = callAPI('POST', 'http://10.10.100.11/dukcapil/get_json/BPS/CALL_NIK', json_encode($data_array));
		$response = json_decode($make_call, true,512, JSON_BIGINT_AS_STRING);
		$datta = $response['content'][0];
		echo "<tr>";
		echo "<td>".$i++."</td>";
		//echo "<td>".$data['id']."</td>";
		//echo "<td>".$data['nama_art']."</td>";
		echo "<td>".$data['nik']."</td>";
		
		if($datta['NIK']<>""){
			sqlsrv_query($conn,"INSERT INTO dukcapil(
						NO_KK, 
						NIK, 
						NAMA_LGKP, 
						STAT_HBKEL, 
						KAB_NAME, 
						AGAMA, 
						NO_RW, 
						KEC_NAME, 
						JENIS_PKRJN, 
						NO_AKTA_LHR, 
						NO_RT, 
						NO_KEL, 
						ALAMAT, 
						NO_KEC, 
						TMPT_LHR, 
						PDDK_AKH, 
						NO_PROP, 
						STATUS_KAWIN, 
						NAMA_LGKP_IBU, 
						PROP_NAME, 
						NO_KAB, 
						KEL_NAME, 
						JENIS_KLMIN, 
						TGL_LHR,
						RobotName,
						LastUpdated,
						nik_source) 
			VALUES (
						'".$datta['NO_KK']."', 
						'".$datta['NIK']."', 
						'".str_replace("'","''",$datta['NAMA_LGKP'])."', 
						'".$datta['STAT_HBKEL']."', 
						'".$datta['KAB_NAME']."', 
						'".$datta['AGAMA']."', 
						'".$datta['NO_RW']."', 
						'".str_replace("'","''",$datta['KEC_NAME'])."', 
						'".$datta['JENIS_PKRJN']."', 
						'".str_replace("'","''",$datta['NO_AKTA_LHR'])."', 
						'".$datta['NO_RT']."', 
						'".$datta['NO_KEL']."', 
						'".str_replace("'","''",$datta['ALAMAT'])."', 
						'".$datta['NO_KEC']."', 
						'".str_replace("'","''",$datta['TMPT_LHR'])."', 
						'".$datta['PDDK_AKH']."', 
						'".$datta['NO_PROP']."', 
						'".$datta['STATUS_KAWIN']."', 
						'".str_replace("'","''",$datta['NAMA_LGKP_IBU'])."', 
						'".$datta['PROP_NAME']."', 
						'".$datta['NO_KAB']."', 
						'".str_replace("'","''",$datta['KEL_NAME'])."', 
						'".$datta['JENIS_KLMIN']."', 
						'".$datta['TGL_LHR']."',
						'aplikasi1',
						'".date("Y-m-d h:i:s")."',
						'2')");
			
			echo "<td>".$datta['NIK']."</td>";
			echo "<td>".$datta['NO_KK']."</td>";
			echo "<td>".$datta['NAMA_LGKP']."</td>";
			echo "<td>".$datta['STAT_HBKEL']."</td>";
			echo "<td>".$datta['JENIS_KLMIN']."</td>";
			echo "<td>".$datta['TGL_LHR']."</td>";
			echo "<td>".$datta['AGAMA']."</td>";
			echo "<td>".$datta['JENIS_PKRJN']."</td>";
			echo "<td>".$datta['NO_AKTA_LHR']."</td>";
			echo "<td>".$datta['PDDK_AKH']."</td>";
			echo "<td>".$datta['STATUS_KAWIN']."</td>";
		}else{
			echo "<td>".$datta['RESPON']."</td>";
			echo "<td>".$datta['RESPON']."</td>";
			echo "<td>".$datta['RESPON']."</td>";
			echo "<td>".$datta['RESPON']."</td>";
			echo "<td>".$datta['RESPON']."</td>";
			echo "<td>".$datta['RESPON']."</td>";
			echo "<td>".$datta['RESPON']."</td>";
			echo "<td>".$datta['RESPON']."</td>";
			echo "<td>".$datta['RESPON']."</td>";
			echo "<td>".$datta['RESPON']."</td>";
			echo "<td>".$datta['RESPON']."</td>";
		}
		if($datta['RESPON']<>'Kuota Akses Hari ini telah Habis')
		sqlsrv_query($conn,"UPDATE ".$table." SET cek='1', respon ='".$datta['RESPON']."' WHERE nik='".$data['nik']."'");
		echo  "</tr>";
		//$i++;
	}
//}while($datta['RESPON']<>'Kuota Akses Hari ini telah Habis');
echo "</table>";

$time_end = microtime(true);
//dividing with 60 will give the execution time in minutes otherwise seconds
$execution_time = ($time_end - $time_start);
//execution time of the script
echo '<b>Total Execution Time:</b> '.$execution_time.' Mins';
sqlsrv_free_stmt( $stmt);

?>