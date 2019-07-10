<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbdatalatih`";
if(getJum($conn,$sql)>0){
	print "<datalatih>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id_datalatih=$d["id_datalatih"];
				$tweet=$d["tweet"];
				$normalisasi=$d["normalisasi"];
				$kategori=$d["kategori"];
			    $keterangan=$d["keterangan"];
												
				print "<record>\n";
				print "  <tweet>$tweet</tweet>\n";
				print "  <normalisasi>$normalisasi</normalisasi>\n";
				print "  <kategori>$kategori</kategori>\n";
				print "  <keterangan>$keterangan</keterangan>\n";
				print "  <id_datalatih>$id_datalatih</id_datalatih>\n";
				print "</record>\n";
			}
	print "</datalatih>\n";
}
else{
	$null="null";
	print "<datalatih>\n";
		print "<record>\n";
				print "  <tweet>$null</tweet>\n";
				print "  <normalisasi>$null</normalisasi>\n";
				print "  <kategori>$null</kategori>\n";
				print "  <keterangan>$null</keterangan>\n";
				print "  <id_datalatih>$null</id_datalatih>\n";
		print "</record>\n";
	print "</datalatih>\n";
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
	