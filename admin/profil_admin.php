 <script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>
<h2 class="wow fadeInUp" data-wow-delay="0.3s"><font color="red"><center>
      <u>Profile Admin<u></center></font></h2>
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
<img src='$YPATH/$gambar' width='77' height='80' />
</a>
";
?>
</center>
</td>
</tr>

<tr>
<td height="24"><label for="password">password</label>
<td>:<td><?php echo $password;?></td>
</tr>


<tr>
<td height="24"><label for="telepon">telepon</label>
<td>:<td><?php echo $telepon;?>
</td>
</tr>

<tr>
<td height="24"><label for="email">email</label>
<td>:<td><?php echo $email;?>
</td>
</tr>

       
       <tr>
         <td align="left" valign="top">
          <td>
          <td colspan="2" align="left">	<a href="?mnu=profil_admin2"><input  class="active" name="Simpan" type="button" id="Simpan" value="Update Profil" /></a>
               
        </td></tr>
     </table>
   </div>
 </form>
</div>

<div align="center">
  </div>
  <br><br><br>
</div>
