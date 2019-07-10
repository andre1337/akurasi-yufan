<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbtweet`";
if(getJum($conn,$sql)>0){
	print "<tweet>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id_tweet=$d["id_tweet"];
				$tweet=$d["tweet"];
				$normalisasi=$d["normalisasi"];
				$kategori=$d["kategori"];
			    $keterangan=$d["keterangan"];
				$hastag=$d["hastag"];
				$lokasi=$d["lokasi"];
												
				print "<record>\n";
				print "  <tweet>$tweet</tweet>\n";
				print "  <normalisasi>$normalisasi</normalisasi>\n";
				print "  <kategori>$kategori</kategori>\n";
				print "  <keterangan>$keterangan</keterangan>\n";
				print "  <hastag>$hastag</hastag>\n";
				print "  <lokasi>$lokasi</lokasi>\n";
				print "  <id_tweet>$id_tweet</id_tweet>\n";
				print "</record>\n";
			}
	print "</tweet>\n";
}
else{
	$null="null";
	print "<tweet>\n";
		print "<record>\n";
				print "  <tweet>$null</tweet>\n";
				print "  <normalisasi>$null</normalisasi>\n";
				print "  <kategori>$null</kategori>\n";
				print "  <keterangan>$null</keterangan>\n";
				print "  <hastag>$null</hastag>\n";
				print "  <lokasi>$null</lokasi>\n";
				print "  <id_tweet>$null</id_tweet>\n";
		print "</record>\n";
	print "</tweet>\n";
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
	