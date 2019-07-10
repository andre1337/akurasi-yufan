 <script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>
<h2 class="wow fadeInUp" data-wow-delay="0.3s"><font color="red"><center><u>Update Profil<u></center></font></h2>
<div style="text-align:center; font-family: 'Comic Sans MS', cursive; font-weight: bold;"> 
 <div align="center">
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
  <?php
	$id_admin=$_SESSION["cid"];
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

?>
   
 </div>
<form action="" method="post" enctype="multipart/form-data">
   <div align="center">
     <table id="table">
       
       
       
       
      <tr>
<th width="220"><label for="id_admin">ID Admin</label>
<th width="27">:
<th colspan="2"><b><?php echo $id_admin;?></b></tr>
<tr>
<td><label for="username">username</label>
<td>:<td width="662"><?php echo $username;?>
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
  <td height="24">gambar
    <td>:<td colspan="2"><label for="gambar"></label>
        <input name="gambar" type="file" id="gambar" size="20" /> 
      => <a href='#' onclick='buka("admin/zoom.php?id=<?php echo $id_admin;?>")'><?php echo $gambar0;?></a></td>
</tr>
       
       <tr>
         <td align="left" valign="top">
          <td>
          <td colspan="2" align="left">	<input name="Simpan" type="submit"  class="active" id="Simpan" value="Update Profil" />
            <a href="?mnu=profil_admin"><input name="Batal"   class="active" type="button" id="Batal" value="Batal" /></a>
        </td></tr>
     </table>
   </div>
 </form>

<?php
if(isset($_POST["Simpan"])){
	$id_admin0=strip_tags($_SESSION["cid"]);
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

$sql="update `$tbadmin` set `password`='$password',`telepon`='$telepon' ,`email`='$email', `gambar`='$gambar'  where `id_admin`='$id_admin0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data Berhasil Diubah');document.location.href='?mnu=profil_admin';</script>";}
	else{echo"<script>alert('Data Gagal Diubah');document.location.href='?mnu=profil_admin';</script>";}
	}//else simpan

?>
<div align="center">
  </div>
  <br><br><br>
</div>
