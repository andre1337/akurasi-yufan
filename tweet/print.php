<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>


<h3><center>Laporan data tweet:</h3>
 

<table width="100%" border="0">
  <tr>
    <th width="5%"><center>no</td>
    <th width="10%"><center>id_tweet</td>
    <th width="25%"><center>tweet</td>
    <th width="25%"><center>normalisasi</td>
    <th width="20%"><center>kategori</td>
    <th width="10%"><center>keterangan</td>
    <th width="5%"><center>hastag</td>
    <th width="25%"><center>lokasi</td>
  </tr>
<?php  
  $sql="select * from `$tbtweet` order by `id_tweet` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id_tweet=$d["id_tweet"];
				$tweet=$d["tweet"];
				$normalisasi=$d["normalisasi"];
				$kategori=$d["kategori"];
				$keterangan=$d["keterangan"];
				$hastag=$d["hastag"];
				$lokasi=$d["lokasi"];
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$id_tweet</td>
				<td>$tweet</td>
				<td>$normalisasi</td>
				<td>$kategori</td>
				<td>$keterangan</td>
				<td>$hastag</td>
				<td>$lokasi</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$id_tweet</td>
				<td>$tweet</td>
				<td>$normalisasi</td>
				<td>$kategori</td>
				<td>$keterangan</td>
				<td>$hastag</td>
				<td>$lokasi</td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data tweet belum tersedia...</blink></td></tr>";}
		
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

</table>

