<?php
$pro="simpan";
$kategori=WKT(date("Y-m-d"));
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#kategori").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    
<style>
#table {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#table td, #table th {
    border: 1px solid #ddd;
    padding: 8px;
}

#table tr:nth-child(even){background-color: #f2f2f2;}

#table tr:hover {background-color: #ddd;}

#table th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #008000;
    color: white;
}
</style>
<script type="text/javascript"> 
function PRINT(){ 
win=window.open('tweet/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, hastag=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>



				

<?php
if($_GET["pro"]=="ubah"){
	$id_tweet=$_GET["kode"];
	$sql="select * from `$tbtweet` where `id_tweet`='$id_tweet'";
	$d=getField($conn,$sql);
				$id_tweet=$d["id_tweet"];
				$id_tweet0=$d["id_tweet"];
				$tweet=$d["tweet"];
				$normalisasi=$d["normalisasi"];
				$kategori=$d["kategori"];
				$keterangan=$d["keterangan"];
				$hastag=$d["hastag"];
				$lokasi=$d["lokasi"];
				$pro="ubah";		
}
?>
<link rel="stylesheet" href="js/jquery-ui.css">
  <link rel="stylesheet" href="resources/demos/style.css">
<script src="js/jquery-1.12.4.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion({
      collapsible: true
    });
  } );
  </script>
<div id="accordion">
  <h4>Form Input</h4>
  <div>  
<form action="" method="post" enctype="multipart/form-data">
<table id="table">
<tr>
<td width="30%"><label for="tweet">Tweet</label>
<td width="5%" valign="top"><div align="center">:
</div>
<td width="65%" colspan="2"><input name="tweet" type="text" class="form-control" id="tweet" value="<?php echo $tweet;?>" size="30" /></td>
</tr>


<tr>
<td><label for="hastag">Hastag</label>
<td valign="top"><div align="center">:</div>
<td colspan="2"><input name="hastag" class="form-control" type="text" id="hastag" value="<?php echo $hastag;?>" size="15" /></td></tr>

<tr>
<td><label for="lokasi">Lokasi</label>
<td valign="top"><div align="center">:</div>
<td colspan="2"><input name="lokasi" type="text" class="form-control" id="lokasi" value="<?php echo $lokasi;?>" size="30" /></td></tr>
<tr>
<td height="24"><label for="keterangan">Catatan Tweet</label>
<td><div align="center">:
</div>
<td><textarea name="keterangan" class="form-control" cols="30" id="keterangan"><?php echo $keterangan;?></textarea>
</td>
</tr>


<?php
if($_GET["pro"]=="ubah"){
	?>

<tr>
<td><label for="normalisasi">Normalisasi</label>
<td valign="top"><div align="center">:
</div>
<td colspan="2"><input name="normalisasi" type="text" id="normalisasi" class="form-control" value="<?php echo $normalisasi;?>" size="15" /></td>
</tr>

<tr> 
<td><label for="kategori">Kategori</label>
<td><div align="center">:</div>
<td colspan="2">
<input type="radio" name="kategori" id="kategori"  checked="checked" value="Positif" <?php if($kategori=="Positif"){echo"checked";}?>/>Positif 
<input type="radio" name="kategori" id="kategori" value="Negatif" <?php if($kategori=="Negatif"){echo"checked";}?>/>Negatif
</td></tr>

<?php
}
?>


<tr>
<td>
<td valign="top">
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
         <input name="id_tweet0" type="hidden" id="id_tweet0" value="<?php echo $id_tweet0;?>" />
        <a href="?mnu=tweet"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
</div>
<?php

 $sqld="select distinct(kategori) from `$tbtweet` order by `kategori` asc";
 	$arrd=getData($conn,$sqld);
		foreach($arrd as $dd) {							
				$kategori=$dd["kategori"];
$no=1;				
				?>
<h4><a href="#"><font color="#fff">Data Kategori <?php echo $kategori;?></font></a></h4>
<div>
<br />
Data Tweet <?php echo $kategori;?>: 
| <a href="tweet/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <a href="tweet/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> 
| <a href="tweet/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>
<table id="table">
  <tr bgcolor="#036">
    <th width="3%"><center>no</th>
    <th width="85%"><center>Tweet</th>
    <th width="10%"><center>menu</th>
  </tr>
<?php  
  $sql="select * from `$tbtweet`  where `kategori`='$kategori' order by `id_tweet` asc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
	//--------------------------------------------------------------------------------------------
	$batas   = 10;
	$page = $_GET['page'];
	if(empty($page)){$posawal  = 0;$page = 1;}
	else{$posawal = ($page-1) * $batas;}
	
	$sql2 = $sql." LIMIT $posawal,$batas";
	$no = $posawal+1;
	//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {							
				$id_tweet=$d["id_tweet"];
				$tweet=$d["tweet"];
				$normalisasi=$d["normalisasi"];
				$kategori=$d["kategori"];
				$keterangan=$d["keterangan"];
				$hastag=$d["hastag"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td valign='top'><b>$tweet</b>
				<br><i>$normalisasi</i>
				<br>Hastag: $hastag Lokasi : $lokasi, Cat : $keterangan</td>
				<td align='center'>
<a href='?mnu=tfidf&id=$id_tweet'><img src='ypathicon/11.png' title='Analisa TFIDF + CS'></a>				
<a href='?mnu=tweet&pro=ubah&kode=$id_tweet'><img src='ypathicon/u.png' title='ubah'></a>
<a href='?mnu=tweet&pro=hapus&kode=$id_tweet'><img src='ypathicon/h.png' title='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $tweet pada data tweet ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='9'><blink>Maaf, Data tweet belum tersedia...</blink></td></tr>";}
?>
</table>

<?php
//Langkah 3: Hitung total data dan page 
$jmldata = $jum;
if($jmldata>0){
	if($batas<1){$batas=1;}
	$jmlhal  = ceil($jmldata/$batas);
	echo "<div class=paging>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=tweet'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=tweet'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=tweet'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total Data <b>$jmldata</b> Item</p>";
?>
</div>
<?php }?>
</div>
<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id_tweet=strip_tags($_POST["id_tweet"]);
	$id_tweet0=strip_tags($_POST["id_tweet0"]);
	$tweet=strip_tags($_POST["tweet"]);
	$normalisasi=strip_tags($_POST["normalisasi"]);
	$kategori=strip_tags($_POST["kategori"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	$hastag=strip_tags($_POST["hastag"]);
	$lokasi=strip_tags($_POST["lokasi"]);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbtweet` (
`id_tweet` ,
`tweet` ,
`normalisasi` ,
`kategori` ,
`keterangan` ,
`hastag`,
`lokasi` 
) VALUES (
'', 
'$tweet', 
'$normalisasi',
'$kategori',
'$keterangan',
'$hastag',
'$lokasi'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $id_tweet berhasil disimpan !');document.location.href='?mnu=tweet';</script>";}
		else{echo"<script>alert('Data $id_tweet gagal disimpan...');document.location.href='?mnu=tweet';</script>";}
	}
	else{
$sql="update `$tbtweet` set 
`tweet`='$tweet',
`normalisasi`='$normalisasi' ,
`kategori`='$kategori',
`hastag`='$hastag',
`keterangan`='$keterangan',
`lokasi`='$lokasi'
where `id_tweet`='$id_tweet0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $id_tweet berhasil diubah !');document.location.href='?mnu=tweet';</script>";}
	else{echo"<script>alert('Data $id_tweet gagal diubah...');document.location.href='?mnu=tweet';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_tweet=$_GET["kode"];
$sql="delete from `$tbtweet` where `id_tweet`='$id_tweet'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data tweet $id_tweet berhasil dihapus !');document.location.href='?mnu=tweet';</script>";}
else{echo"<script>alert('Data tweet $id_tweet gagal dihapus...');document.location.href='?mnu=tweet';</script>";}
}
?>

