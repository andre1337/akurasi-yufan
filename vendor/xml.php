<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbvendor`";
if(getJum($conn,$sql)>0){
	print "<vendor>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id_vendor=$d["id_vendor"];
				$nama_vendor=$d["nama_vendor"];
				$telepon=$d["telepon"];
				$email=$d["email"];
				$alamat=$d["alamat"];
				$username=$d["username"];
				$password=$d["password"];
			    $keterangan=$d["keterangan"];
				$status=$d["status"];
												
				print "<record>\n";
				print "  <nama_vendor>$nama_vendor</nama_vendor>\n";
				print "  <telepon>$telepon</telepon>\n";
				print "  <email>$email</email>\n";
				print "  <alamat>$email</alamat>\n";
				print "  <username>$email</username>\n";
				print "  <password>$email</password>\n";
				print "  <keterangan>$keterangan</keterangan>\n";
				print "  <status>$status</status>\n";
				print "  <id_vendor>$id_vendor</id_vendor>\n";
				print "</record>\n";
			}
	print "</vendor>\n";
}
else{
	$null="null";
	print "<vendor>\n";
		print "<record>\n";
				print "  <nama_vendor>$null</nama_vendor>\n";
				print "  <telepon>$null</telepon>\n";
				print "  <email>$null</email>\n";
				print "  <alamat>$null</alamat>\n";
				print "  <username>$null</username>\n";
				print "  <password>$null</password>\n";
				print "  <keterangan>$null</keterangan>\n";
				print "  <status>$null</status>\n";
				print "  <id_vendor>$null</id_vendor>\n";
		print "</record>\n";
	print "</vendor>\n";
	}
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
	