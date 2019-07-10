<?php
$pro="simpan";
$tanggal=WKT(date("Y-m-d"));
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
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
win=window.open('datalatih/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>


<?php



if($_GET["pro"]=="ubah"){
	$id_datalatih=$_GET["kode"];
	$sql="select * from `$tbdatalatih` where `id_datalatih`='$id_datalatih'";
	$d=getField($conn,$sql);
				$id_datalatih=$d["id_datalatih"];
				$id_datalatih0=$d["id_datalatih"];
				$tweet=$d["tweet"];
				$normalisasi=$d["normalisasi"];
				$kategori=$d["kategori"];
				$keterangan=$d["keterangan"];
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
  <h4>Form Input DataLatih</h4>
  <div>  
<form action="" method="post" enctype="multipart/form-data">
<table id="table">


<tr>
<td width="20%"><label for="tweet">Tweet</label>
<td width="3%"><div align="center">:
</div>
<td width="77%" colspan="2"><input name="tweet" class="form-control" type="text" id="tweet" value="<?php echo $tweet;?>" size="30" /></td>
</tr>


<tr>
<td><label for="kategori">Kategori</label>
<td><div align="center">:</div>
<td colspan="2">
<input type="radio" name="kategori" id="kategori"  checked="checked" value="Positif" <?php if($kategori=="Positif"){echo"checked";}?>/>Positif 
<input type="radio" name="kategori" id="kategori" value="Negatif" <?php if($kategori=="Negatif"){echo"checked";}?>/>Negatif
</td></tr>

<tr>
<td height="24"><label for="keterangan">Keterangan</label>
<td><div align="center">:
</div>
<td><textarea name="keterangan" cols="30" id="keterangan" class="form-control"><?php echo $keterangan;?></textarea>
</td>
</tr>

<tr>
<td>
<td>
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
         <input name="id_datalatih0" type="hidden" id="id_datalatih0" value="<?php echo $id_datalatih0;?>" />
        <a href="?mnu=datalatih"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
</div>
<?php

 $sqld="select distinct(kategori) from `$tbdatalatih` order by `kategori` asc";
 	$arrd=getData($conn,$sqld);
		foreach($arrd as $dd) {							
				$kategori=$dd["kategori"];
$no=1;				
				?>
<h4><a href="#"><font color="#fff">Data Kategori <?php echo $kategori;?></font></a></h4>
<div>
Data Kategori <?php echo $kategori;?>: 
| <a href="datalatih/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <a href="datalatih/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> 
| <a href="datalatih/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table id="table">
  <tr bgcolor="#036">
    <th width="3%"><center>no</th>
    <th width="80%"><center>Tweet</th>
    <th width="10%"><center>menu</th>
  </tr>
<?php  

//require_once __DIR__ . '../../vendor/autoload.php';
//$initos = new \Sastrawi\Stemmer\StemmerFactory();
//$bikinos = $initos->createStemmer();


	
	
	
	
	
  $sql="select * from `$tbdatalatih` where `kategori`='$kategori' order by `id_datalatih` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
	//--------------------------------------------------------------------------------------------
	$batas   = 1000;
	$page = $_GET['page'];
	if(empty($page)){$posawal  = 0;$page = 1;}
	else{$posawal = ($page-1) * $batas;}
	
	$sql2 = $sql." LIMIT $posawal,$batas";
	$no = $posawal+1;
	//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {							
				$id_datalatih=$d["id_datalatih"];
				$tweet=$d["tweet"];
				$normalisasi=$d["normalisasi"];
				$kategori=$d["kategori"];
				$keterangan=$d["keterangan"];
				
				//$normalisasi=getNorm($bikinos,$tweet);
				//$sqld="update  `$tbdatalatih` set normalisasi='$normalisasi' where `id_datalatih`='$id_datalatih'";
				//$up=process($conn,$sqld);
				
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td valign='top'><b>$tweet</b>
				<br>Hasil Normalisasi : <i>$normalisasi</i>
				<td align='center'>
<a href='?mnu=datalatih&pro=ubah&kode=$id_datalatih'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=datalatih&pro=hapus&kode=$id_datalatih'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $tweet pada data datalatih ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data datalatih belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=datalatih'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=datalatih'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=datalatih'>Next »</a></span>";
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
	
	require_once __DIR__ . '../../vendor/autoload.php';
$initos = new \Sastrawi\Stemmer\StemmerFactory();
$bikinos = $initos->createStemmer();


	$pro=strip_tags($_POST["pro"]);
	$id_datalatih=strip_tags($_POST["id_datalatih"]);
	$id_datalatih0=strip_tags($_POST["id_datalatih0"]);
	$tweet=strip_tags($_POST["tweet"]);
	$kategori=strip_tags($_POST["kategori"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	
	$normalisasi=getNorm($bikinos,$tweet);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbdatalatih` (
`id_datalatih` ,
`tweet` ,
`normalisasi` ,
`kategori` ,
`keterangan` 
) VALUES (
'', 
'$tweet', 
'$normalisasi',
'$kategori',
'$keterangan'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $id_datalatih berhasil disimpan !');document.location.href='?mnu=datalatih';</script>";}
		else{echo"<script>alert('Data $id_datalatih gagal disimpan...');document.location.href='?mnu=datalatih';</script>";}
	}
	else{
 $sql="update `$tbdatalatih` set 
`tweet`='$tweet',
`normalisasi`='$normalisasi' ,
`kategori`='$kategori',
`keterangan`='$keterangan' 
where `id_datalatih`='$id_datalatih0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $id_datalatih berhasil diubah !');document.location.href='?mnu=datalatih';</script>";}
	else{echo"<script>alert('Data $id_datalatih gagal diubah...');document.location.href='?mnu=datalatih';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_datalatih=$_GET["kode"];
$sql="delete from `$tbdatalatih` where `id_datalatih`='$id_datalatih'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data datalatih $id_datalatih berhasil dihapus !');document.location.href='?mnu=datalatih';</script>";}
else{echo"<script>alert('Data datalatih $id_datalatih gagal dihapus...');document.location.href='?mnu=datalatih';</script>";}
}



function getNorm($bikinos,$tweet){
$stemming=$bikinos->stem($tweet);
$stemmingnew=strtolower($stemming);

$ak=getStopNumber();
$ar=getStopWords();

$wordStop=$stemmingnew;
for($i=0;$i<count($ar);$i++){
 $wordStop =str_replace($ar[$i]." ","", $wordStop); 
}

for($i=0;$i<count($ak);$i++){
 $wordStop =str_replace($ak[$i],"", $wordStop); 
}
$tweetuji=str_replace("  "," ", $wordStop); 
//=====================================================	
 $stemming=$tweetuji;
 return $stemming;
 }
?>

