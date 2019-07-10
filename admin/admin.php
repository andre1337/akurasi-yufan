<?php

$tanggal=WKT(date("Y-m-d"));
$pro="simpan";
$gambar0="avatar.jpg";
$status="Aktif";
//$PATH="ypathcss";
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
win=window.open('admin/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
  $sql="select `id_admin` from `$tbadmin` order by `id_admin` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $kd="ADM";
		if($jum > 0){
			$d=mysqli_fetch_array($q);
			$idmax=$d["id_admin"];
			$urut=substr($idmax,3,2)+1;//01
				if($urut<10){$idmax="$kd"."0".$urut;}
				else{$idmax="$kd".$urut;}
			}
		else{$idmax="$kd"."01";}
		
  $id_admin=$idmax;
?>
<?php
if($_GET["pro"]=="ubah"){
	$id_admin=$_GET["kode"];
	$sql="select * from `$tbadmin` where `id_admin`='$id_admin'";
	$d=getField($conn,$sql);
				$id_admin=$d["id_admin"];
				$id_admin0=$d["id_admin"];
				$username=$d["username"];
				$password=$d["password"];
				$telepon=$d["telepon"];
				$email=$d["email"];
				$status=$d["status"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
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
<th width="220"><label for="id_admin">ID Admin</label>
<th width="27">:
<th colspan="2"><b><?php echo $id_admin;?></b></tr>
<tr>
<td><label for="username">username</label>
<td>:<td width="662"><input name="username" class="form-control" type="text" id="username" value="<?php echo $username;?>" size="20" />
</td>
<td width="258" rowspan="4">
<center>
<?php 
echo"<a href='#' onclick='buka(\"admin/zoom.php?id=$id_admin\")'>
<img src='$YPATH/$gambar0' width='77' height='80' />
</a>
";
?>
</center>
</td>
</tr>

<tr>
<td height="24"><label for="password">password</label>
<td>:<td><input name="password" type="password" id="password" class="form-control" value="<?php echo $password;?>" size="20" /></td>
</tr>


<tr>
<td height="24"><label for="telepon">telepon</label>
<td>:<td><input name="telepon" type="text" id="telepon" class="form-control" value="<?php echo $telepon;?>" size="15" />
</td>
</tr>

<tr>
<td height="24"><label for="email">email</label>
<td>:<td><input name="email" type="text" id="email" class="form-control" value="<?php echo $email;?>" size="25" />
</td>
</tr>

<tr>
<td><label for="status">status</label>
<td>:<td colspan="2">
<input type="radio" name="status" id="status"  checked="checked" value="Super Admin" <?php if($status=="Super Admin"){echo"checked";}?>/>Super Admin 
<input type="radio" name="status" id="status" value="Administrator" <?php if($status=="Administrator"){echo"checked";}?>/>Administrator
</td></tr>

<tr>
  <td height="24">gambar
    <td>:<td colspan="2"><label for="gambar"></label>
        <input name="gambar" type="file" id="gambar" size="20" /> 
      => <a href='#' onclick='buka("admin/zoom.php?id=<?php echo $id_admin;?>")'><?php echo $gambar0;?></a></td>
</tr>

<tr>
<td>
<td>
<td colspan="2"><input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="gambar0" type="hidden" id="gambar0" value="<?php echo $gambar0;?>" />
        <input name="id_admin" type="hidden" id="id_admin" value="<?php echo $id_admin;?>" />
        <input name="id_admin0" type="hidden" id="id_admin0" value="<?php echo $id_admin0;?>" />
        <a href="?mnu=admin"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
</div>
<?php

 $sqld="select distinct(status) from `$tbadmin` order by `status` asc";
 	$arrd=getData($conn,$sqld);
		foreach($arrd as $dd) {							
				$status=$dd["status"];
$no=1;				
				?>
<h4><a href="#"><font color="#fff">Data Status <?php echo $status;?></font></a></h4>
<div>
<br />
Data Admin: 
| <a href="admin/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <a href="admin/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> 
| <a href="admin/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table id="table">
  <tr bgcolor="#036">
    <th width="3%">No</td>
	<th width="10%">Gambar</td>
    <th width="30%">ID Admin</td>
    <th width="15%">Menu</td>
  </tr>
<?php  
  $sql="select * from `$tbadmin` where `status`='$status' order by `id_admin` desc";
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
				$id_admin=$d["id_admin"];
				$username=$d["username"];
				$password=$d["password"];
				$telepon=$d["telepon"];
				$email=$d["email"];
				$status=$d["status"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td><div align='center'>";
echo"<a href='#' onclick='buka(\"admin/zoom.php?id=$id_admin\")'>
<img src='$YPATH/$gambar' width='40' height='40' /></a></div>";
				echo"</td>
				<td><a href='mailto:$email'><b>ID : $id_admin </b></a><br> Telepon : $telepon - Username : $username</td>
				<td><div align='center'>
<a href='?mnu=admin&pro=ubah&kode=$id_admin'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=admin&pro=hapus&kode=$id_admin'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama pada data admin ?..\")'></a></div></td>
				</tr>";
				
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data admin belum tersedia...</blink></td></tr>";}
?>
</table>

<?php
$jmldata = $jum;
if($jmldata>0){
	if($batas<1){$batas=1;}
	$jmlhal  = ceil($jmldata/$batas);
	echo "<div class=paging>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=admin'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=admin'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=admin'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
echo "<p align=center>Total data <b>$jmldata</b> item</p>";
?>
</div>
<?php }?>
</div>
<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id_admin=strip_tags($_POST["id_admin"]);
	$id_admin0=strip_tags($_POST["id_admin"]);
	$username=strip_tags($_POST["username"]);
	$password=strip_tags($_POST["password"]);
	$telepon=strip_tags($_POST["telepon"]);
	$email=strip_tags($_POST["email"]);
	$status=strip_tags($_POST["status"]);
	
	$gambar0=strip_tags($_POST["gambar0"]);
	if ($_FILES["gambar"] != "") {
		@copy($_FILES["gambar"]["tmp_name"],"$YPATH/".$_FILES["gambar"]["name"]);
		$gambar=$_FILES["gambar"]["name"];
		} 
	else {$gambar=$gambar0;}
	if(strlen($gambar)<1){$gambar=$gambar0;}
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbadmin` (
`id_admin` ,
`username` ,
`password` ,
`telepon` ,
`email` ,
`status` ,
`gambar` 
) VALUES (
'$id_admin', 
'$username',
'$password', 
'$telepon',
'$email',
'$status', 
'$gambar'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('Data $id_admin berhasil disimpan !');document.location.href='?mnu=admin';</script>";}
		else{echo"<script>alert('Data $id_admin gagal disimpan...');document.location.href='?mnu=admin';</script>";}
	}
	else{
	$sql="update `$tbadmin` set `username`='$username',`password`='$password',`telepon`='$telepon' ,`email`='$email',`status`='$status',
	`gambar`='$gambar'  where `id_admin`='$id_admin0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data $id_admin berhasil diubah !');document.location.href='?mnu=admin';</script>";}
		else{echo"<script>alert('Data $id_admin gagal diubah...');document.location.href='?mnu=admin';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_admin=$_GET["kode"];
$sql="delete from `$tbadmin` where `id_admin`='$id_admin'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('Data $id_admin berhasil dihapus !');document.location.href='?mnu=admin';</script>";}
	else{echo"<script>alert('Data $id_admin gagal dihapus...');document.location.href='?mnu=admin';</script>";}
}
?>

