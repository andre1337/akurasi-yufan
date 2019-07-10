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
win=window.open('vendor/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
  $sql="select `id_vendor` from `$tbvendor` order by `id_vendor` desc";
$q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="VDR".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["id_vendor"];
   
   $bul=substr($idmax,5,2);
   $tah=substr($idmax,3,2);
    if($bul==$bl && $tah==$th){
     $urut=substr($idmax,7,3)+1;
     if($urut<10){$idmax="$kd"."00".$urut;}
     else if($urut<100){$idmax="$kd"."0".$urut;}
     else{$idmax="$kd".$urut;}
    }//==
    else{
     $idmax="$kd"."001";
     }   
   }//jum>0
  else{$idmax="$kd"."001";}
  $id_vendor=$idmax;
?>

<?php
if($_GET["pro"]=="ubah"){
	$id_vendor=$_GET["kode"];
	$sql="select * from `$tbvendor` where `id_vendor`='$id_vendor'";
	$d=getField($conn,$sql);
				$id_vendor=$d["id_vendor"];
				$id_vendor0=$d["id_vendor"];
				$nama_vendor=$d["nama_vendor"];
				$telepon=$d["telepon"];
				$email=$d["email"];
				$alamat=$d["alamat"];
				$username=$d["username"];
				$password=$d["password"];
				$keterangan=$d["keterangan"];
				$status=$d["status"];
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
<th width="66"><label for="id_vendor">Id Vendor</label>
<th width="9">:
<th colspan="2"><b><?php echo $id_vendor;?></b>
</tr>

<tr>
<td><label for="nama_vendor">Nama_Vendor</label>
<td>:
<td colspan="2"><input name="nama_vendor" class="form-control" type="text" id="nama_vendor" value="<?php echo $nama_vendor;?>" size="30" /></td>
</tr>

<tr>
<td height="24"><label for="telepon">Telepon</label>
<td>:<td colspan="2"><input name="telepon" class="form-control" type="text" id="telepon" value="<?php echo $telepon;?>" size="15" />
</td>
</tr>

<tr>
<td height="24"><label for="email">Email</label>
<td>:
<td><input name="email" class="form-control" type="text" id="email" value="<?php echo $email;?>" size="30" />
</td>
</tr>
<tr>
<td height="24"><label for="alamat">Alamat</label>
<td>:
<td><textarea name="alamat" class="form-control" cols="30" id="alamat"><?php echo $alamat;?></textarea>
</td>
</tr>
<tr>
<td height="24"><label for="username">User Name</label>
<td>:
<td><input name="username" class="form-control" type="text" id="username" value="<?php echo $username;?>" size="30" />
</td>
</tr>
<tr>
<td height="24"><label for="password">Password</label>
<td>:
<td><input name="password" class="form-control" type="text" id="password" value="<?php echo $password;?>" size="30" />
</td>
</tr>
<tr>
<td height="24"><label for="keterangan">Keterangan</label>
<td>:<td colspan="2"><textarea name="keterangan" class="form-control" cols="25" id="keterangan"><?php echo $keterangan;?></textarea>
</td>
</tr>

<tr>
<td><label for="status">status</label>
<td>:<td colspan="2">
<input type="radio" name="status" id="status"  checked="checked" value="Aktif" <?php if($status=="Aktif"){echo"checked";}?>/>Aktif 
<input type="radio" name="status" id="status" value="Tidak Aktif" <?php if($status=="Tidak Aktif"){echo"checked";}?>/>Tidak Aktif
</td></tr>
<tr>
<td>
<td>
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id_vendor" type="hidden" id="id_vendor" value="<?php echo $id_vendor;?>" />
        <input name="id_vendor0" type="hidden" id="id_vendor0" value="<?php echo $id_vendor0;?>" />
        <a href="?mnu=vendor"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

</div>

<?php

 $sqld="select distinct(status) from `$tbvendor` order by `status` asc";
 	$arrd=getData($conn,$sqld);
		foreach($arrd as $dd) {							
				$status=$dd["status"];
$no=1;				
				?>
<h4><a href="#">Data Status <?php echo $status;?></a></h4>

<div>


Data vendor: 
| <a href="vendor/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <a href="vendor/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> 
| <a href="vendor/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table id="table">

  <tr bgcolor="#036">
    <th width="3%"><center>no</th>
    <th width="20%"><center>nama vendor</th>
    <th width="15%"><center>keterangan</th>
    <th width="10%"><center>menu</th>
  </tr>
<?php  
  $sql="select * from `$tbvendor` where `status`='$status' order by `id_vendor` desc";
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
				$id_vendor=$d["id_vendor"];
				$nama_vendor=$d["nama_vendor"];
				$telepon=$d["telepon"];
				$email=$d["email"];
				$alamat=$d["alamat"];
				$username=$d["username"];
				$password=$d["password"];
				$keterangan=$d["keterangan"];
				$status=$d["status"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$nama_vendor ($id_vendor) <br> Telp. $telepon - Email : $email <br> Username : $username  <br> Alamat : $alamat</td>
				<td>$keterangan</td>
				<td align='center'>
<a href='?mnu=vendor&pro=ubah&kode=$id_vendor'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=vendor&pro=hapus&kode=$id_vendor'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama_vendor pada data vendor ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data vendor belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=vendor'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=vendor'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=vendor'>Next »</a></span>";
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
	$id_vendor=strip_tags($_POST["id_vendor"]);
	$id_vendor0=strip_tags($_POST["id_vendor0"]);
	$nama_vendor=strip_tags($_POST["nama_vendor"]);
	$telepon=strip_tags($_POST["telepon"]);
	$email=strip_tags($_POST["email"]);
	$alamat=strip_tags($_POST["alamat"]);
	$username=strip_tags($_POST["username"]);
	$password=strip_tags($_POST["password"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	$status=strip_tags($_POST["status"]);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbvendor` (
`id_vendor` ,
`nama_vendor` ,
`telepon` ,
`email` ,
`alamat` ,
`username` ,
`password` ,
`keterangan` ,
`status` 
) VALUES (
'$id_vendor', 
'$nama_vendor', 
'$telepon',
'$email',
'$alamat',
'$username',
'$password',
'$keterangan',
'$status'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $id_vendor berhasil disimpan !');document.location.href='?mnu=vendor';</script>";}
		else{echo"<script>alert('Data $id_vendor gagal disimpan...');document.location.href='?mnu=vendor';</script>";}
	}
	else{
$sql="update `$tbvendor` set 
`nama_vendor`='$nama_vendor',
`telepon`='$telepon' ,
`email`='$email',
`alamat`='$alamat',
`username`='$username',
`password`='$password',
`status`='$status',
`keterangan`='$keterangan' 
where `id_vendor`='$id_vendor0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $id_vendor berhasil diubah !');document.location.href='?mnu=vendor';</script>";}
	else{echo"<script>alert('Data $id_vendor gagal diubah...');document.location.href='?mnu=vendor';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_vendor=$_GET["kode"];
$sql="delete from `$tbvendor` where `id_vendor`='$id_vendor'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data vendor $id_vendor berhasil dihapus !');document.location.href='?mnu=vendor';</script>";}
else{echo"<script>alert('Data vendor $id_vendor gagal dihapus...');document.location.href='?mnu=vendor';</script>";}
}
?>

