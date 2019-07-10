<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbklasifikasi`";
if(getJum($conn,$sql)>0){
	print "<klasifikasi>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id=$d["id"];
				$komplain=$d["komplain"];
				$klasifikasi=$d["klasifikasi"];
				$normalisasi=$d["normalisasi"];
												
				print "<record>\n";
				print "  <komplain>$komplain</komplain>\n";
				print "  <klasifikasi>$klasifikasi</klasifikasi>\n";
				print "  <normalisasi>$normalisasi</normalisasi>\n";
				print "  <id>$id</id>\n";
				print "</record>\n";
			}
	print "</klasifikasi>\n";
}
else{
	$null="null";
	print "<klasifikasi>\n";
		print "<record>\n";
				print "  <komplain>$null</komplain>\n";
				print "  <klasifikasi>$null</klasifikasi>\n";
				print "  <normalisasi>$null</normalisasi>\n";
				print "  <id>$null</id>\n";
		print "</record>\n";
	print "</klasifikasi>\n";
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
	