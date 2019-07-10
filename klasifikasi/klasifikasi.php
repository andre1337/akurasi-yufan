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
win=window.open('klasifikasi/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>


<?php



if($_GET["pro"]=="ubah"){
	$id=$_GET["kode"];
	$sql="select * from `$tbklasifikasi` where `id`='$id'";
	$d=getField($conn,$sql);
				$id=$d["id"];
				$id0=$d["id"];
				$komplain=$d["komplain"];
				$klasifikasi=$d["klasifikasi"];
				$normalisasi=$d["normalisasi"];
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
  <h4>Form Input klasifikasi</h4>
  <div>  
<form action="" method="post" enctype="multipart/form-data">
<table id="table">


<tr>
<td width="20%"><label for="komplain">Komplain</label>
<td width="3%"><div align="center">:
</div>
<td width="77%" colspan="2"><input name="komplain" class="form-control" type="text" id="komplain" value="<?php echo $komplain;?>" size="30" /></td>
</tr>
<tr>
<td><label for="klasifikasi">Klasifikasi</label>
<td><div align="center">:</div>
<td colspan="2">
<input type="radio" name="klasifikasi" id="klasifikasi"  checked="checked" value="Pelayanan" <?php if($klasifikasi=="Pelayanan"){echo"checked";}?>/>Pelayanan 
<input type="radio" name="klasifikasi" id="klasifikasi" value="Prasarana" <?php if($klasifikasi=="Prasarana"){echo"checked";}?>/>Prasarana
<input type="radio" name="klasifikasi" id="klasifikasi" value="Aksesibilitas" <?php if($klasifikasi=="Aksesibilitas"){echo"checked";}?>/>Aksesibilitas
<input type="radio" name="klasifikasi" id="klasifikasi" value="Konektivitas" <?php if($klasifikasi=="Konektivitas"){echo"checked";}?>/>Konektivitas
</td></tr>


<tr>
<td height="24"><label for="normalisasi">normalisasi</label>
<td><div align="center">:
</div>
<td><textarea name="normalisasi" cols="30" id="normalisasi" class="form-control"><?php echo $normalisasi;?></textarea>
</td>
</tr>

<tr>
<td>
<td>
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
         <input name="id0" type="hidden" id="id0" value="<?php echo $id0;?>" />
        <a href="?mnu=klasifikasi"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
</div>
<?php

 $sqld="select distinct(klasifikasi) from `$tbklasifikasi` order by `klasifikasi` asc";
 	$arrd=getData($conn,$sqld);
		foreach($arrd as $dd) {							
				$klasifikasi=$dd["klasifikasi"];
$no=1;				
				?>
<h4><a href="#"><font color="#fff">Data klasifikasi <?php echo $klasifikasi;?></font></a></h4>
<div>
Data klasifikasi <?php echo $klasifikasi;?>: 
| <a href="klasifikasi/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <a href="klasifikasi/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> 
| <a href="klasifikasi/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table id="table">
  <tr bgcolor="#036">
    <th width="3%"><center>no</th>
    <th width="60%"><center>Komplain</th>
	<th width="20%"><center>Normalisasi</th>
    <th width="10%"><center>menu</th>
  </tr>
<?php  
  $sql="select * from `$tbklasifikasi` where `klasifikasi`='$klasifikasi' order by `id` desc";
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
				$id=$d["id"];
				$komplain=$d["komplain"];
				$klasifikasi=$d["klasifikasi"];
				$normalisasi=$d["normalisasi"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$komplain</td>
				<td>$normalisasi</td>
				<td align='center'>
<a href='?mnu=klasifikasi&pro=ubah&kode=$id'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=klasifikasi&pro=hapus&kode=$id'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $komplain pada data klasifikasi ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data klasifikasi belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=klasifikasi'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=klasifikasi'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=klasifikasi'>Next »</a></span>";
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
	$id=strip_tags($_POST["id"]);
	$id0=strip_tags($_POST["id0"]);
	$komplain=strip_tags($_POST["komplain"]);
	$klasifikasi=strip_tags($_POST["klasifikasi"]);
	$normalisasi=strip_tags($_POST["normalisasi"]);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbklasifikasi` (
`id` ,
`komplain` ,
`klasifikasi` ,
`normalisasi` 
) VALUES (
'', 
'$komplain', 
'$klasifikasi',
'$normalisasi'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $id berhasil disimpan !');document.location.href='?mnu=klasifikasi';</script>";}
		else{echo"<script>alert('Data $id gagal disimpan...');document.location.href='?mnu=klasifikasi';</script>";}
	}
	else{
 $sql="update `$tbklasifikasi` set 
`komplain`='$komplain',
`klasifikasi`='$klasifikasi' ,
`normalisasi`='$normalisasi'
where `id`='$id0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $id berhasil diubah !');document.location.href='?mnu=klasifikasi';</script>";}
	else{echo"<script>alert('Data $id gagal diubah...');document.location.href='?mnu=klasifikasi';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id=$_GET["kode"];
$sql="delete from `$tbklasifikasi` where `id`='$id'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data klasifikasi $id berhasil dihapus !');document.location.href='?mnu=klasifikasi';</script>";}
else{echo"<script>alert('Data klasifikasi $id gagal dihapus...');document.location.href='?mnu=klasifikasi';</script>";}
}



function getNorm($bikinos,$komplain){
$stemming=$bikinos->stem($komplain);
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
$komplainuji=str_replace("  "," ", $wordStop); 
//=====================================================	
 $stemming=$komplainuji;
 return $stemming;
 }
?>

