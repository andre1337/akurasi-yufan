<?php
require_once"../koneksivar.php";

$conn = new mysqli($DBServer, $DBvendor, $DBPass, $DBName);
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_vendor_ERROR);
}

 	$buffer = ""; 
    $separator = ","; //, atau ;
    $newline = "\r\n"; 
    		    
    $buffer = "id_vendor".$separator ."nama_vendor".$separator ."telepon".$separator ."email".$separator ."keterangan".$separator ."status".$separator; 
    $buffer .= $newline; 
    
  $sql="select `id_vendor`,`nama_vendor`,`telepon`,`email`,`keterangan`,`status` from `$tbvendor` order by `id_vendor` desc";
  $jum=getJum($conn,$sql);	
  if($jum>0){						
	  $arr=getData($conn,$sql);
	  foreach($arr as $d) {		 
					$value=$d["id_vendor"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["nama_vendor"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["telepon"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["email"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["alamat"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["username"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["password"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["keterangan"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["status"];$buffer .= "\"".$value."\"".$separator; 
				$buffer .= $newline; 
		}	
  }
  else{
    $buffer .= $newline; 
	  }
    header("Content-type: application/vnd.ms-excel"); 
    header("Content-Length: ".strlen($buffer)); 
    header("Content-Disposition: attachment; filename=report.csv"); 
    header("Expires: 0"); 
    header("Cache-Control: must-revalidate, post-check=0,pre-check=0"); 
    header("Pragma: public"); 

    print $buffer;
	
	/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	$rs->free();
	return $arr;
}

?>