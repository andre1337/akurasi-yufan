<?php
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);  
  ?>
<?php
session_start();
//error_reporting(0);
require_once"konmysqli.php";

$mnu=$_GET["mnu"];
date_default_timezone_set("Asia/Jakarta");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Analisa TFIDF Komentar MRT</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/jquery.bxslider.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" type="text/css" href="css/set1.css" />
	<link href="css/overwrite.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
  </head>
  <body>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
					<span class="sr-only">Menu navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.html"><span>Sentimen MRT Jakarta </span></a>
			</div>
			<div class="navbar-collapse collapse">							
				<div class="menu">
					<ul class="nav nav-tabs" role="tablist">
			<?php
if($_SESSION["cstatus"]=="Super Admin"){	
      echo"
	  <li ";if($mnu=="home"){echo"class='active'";} echo"><a href='index.php?mnu=home'>Home</a></li>
      <li ";if($mnu=="admin"){echo"class='active'";} echo"><a href='index.php?mnu=admin'>Admin</a></li>
	  
	  <li ";if($mnu=="datalatih"){echo"class='active'";} echo"><a href='index.php?mnu=datalatih'>Data Latih</a></li>
	  
	    <li ";if($mnu=="crawling"){echo"class='crawling'";} echo"><a href='index.php?mnu=crawling'>Crawling</a></li>
	  <li ";if($mnu=="tweet"){echo"class='active'";} echo"><a href='index.php?mnu=tweet'>Tweet</a></li>     
	  
	  <li ";if($mnu=="klasifikasi"){echo"class='active'";} echo"><a href='index.php?mnu=klasifikasi'>Klasifikasi</a></li>
	  
	 <li><a href='index.php?mnu=logout'>Logout</a></li>";
}
else if($_SESSION["cstatus"]=="Administrator"){	
      echo"
	  <li ";if($mnu=="home"){echo"class='active'";} echo"><a href='index.php?mnu=home'>Home</a></li>
      <li ";if($mnu=="profil_admin"){echo"class='active'";} echo"><a href='index.php?mnu=profil_admin'>Profil Admin</a></li>
	  
	  <li ";if($mnu=="datalatih"){echo"class='active'";} echo"><a href='index.php?mnu=datalatih'>Data Latih</a></li>
	  
	    <li ";if($mnu=="crawling"){echo"class='crawling'";} echo"><a href='index.php?mnu=crawling'>Crawling</a></li>
	  <li ";if($mnu=="tweet"){echo"class='active'";} echo"><a href='index.php?mnu=tweet'>Tweet</a></li>     
	  
	  <li ";if($mnu=="klasifikasi"){echo"class='active'";} echo"><a href='index.php?mnu=klasifikasi'>Klasifikasi</a></li>
	  
	  <li ";if($mnu=="klasifikasi"){echo"class='active'";} echo"><a href='index.php?mnu=akurasi'>Akurasi Data</a></li>

	 <li><a href='index.php?mnu=logout'>Logout</a></li>";
}

else{
	 echo"<li ";if($mnu=="home"){echo"class='active'";} echo"><a href='index.php?mnu=home'>Home</a></li>";
	 echo"<li><a href='login.php'>Login</a></li>";	 
	}
      ?>
					</ul>
				</div>
			</div>			
		</div>
	</nav>
	
<?php if($mnu=="home" || $mnu==""){?>	
	<div class="container">
		<div class="row">
			<div class="slider">
				<div class="img-responsive">
					<ul class="bxslider">				
						<li><img src="img/mrt3.jpg" alt=""/></li>								
						<li><img src="img/mrt3.jpg" alt=""/></li>	
						<li><img src="img/mrt3.jpg" alt=""/></li>			
					</ul>
				</div>	
			</div>
		</div>
	</div>
<?php } ?>
	<div class="container">
		<div class="row"> <?php if($mnu=="home" || $mnu==""){ echo"";}
		else { echo"<br><br><br><br><br><br>";} ?>
<?php 
if($mnu=="admin"){require_once"admin/admin.php";}
else if($mnu=="profil_admin"){require_once"admin/profil_admin.php";}
else if($mnu=="akurasi"){require_once"akurasi.php";}
else if($mnu=="profil_admin2"){require_once"admin/profil_admin2.php";}
else if($mnu=="datalatih"){require_once"datalatih/datalatih.php";}
else if($mnu=="tweet"){require_once"tweet/tweet.php";}
else if($mnu=="klasifikasi"){require_once"klasifikasi/klasifikasi.php";}
else if($mnu=="login"){require_once"login.php";}
else if($mnu=="tfidf"){require_once"tfidf.php";}
else if($mnu=="tfidfc"){require_once"tfidfc.php";}
else if($mnu=="logout"){require_once"logout.php";}
else if($mnu=="crawling"){require_once"crawling.php";}
else {require_once"home.php";}
				
 ?>



		</div>
	</div>

	<footer>
		<div class="inner-footer">
			<div class="container">
				
				</div>
			</div>
		
		
		<div class="last-div">
			<div class="container">
				<div class="row">
					<div class="copyright">
						© 2019 Sentimen Analisis MRT | <a target="_blank" href="http://mrtjakarta.com">MRT Jakarta</a>
					</div>	
                    <!-- 
                        All links in the footer should remain intact. 
                        Licenseing information is available at: http://bootstraptaste.com/license/
                        You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=eNno
                    -->				
				</div>
			</div>
			<div class="container">
				<div class="row">
					<ul class="social-network">
						<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus fa-1x"></i></a></li>
					</ul>
				</div>
			</div>
			
			<a href="" class="scrollup"><i class="fa fa-chevron-up"></i></a>	
				
			
		</div>	
	</footer>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --><?php if($mnu=="home" || $mnu=="tfidf" || $mnu==""){ ?>
    <script src="js/jquery-2.1.1.min.js"></script><?php }?> 
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.isotope.min.js"></script>
	<script src="js/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="js/fliplightbox.min.js"></script>
	<script src="js/functions.js"></script>	
	<script type="text/javascript">$('.portfolio').flipLightBox()</script>
  </body>
</html>



<?php function RP($rupiah){return number_format($rupiah,"2",",",".");}?>
<?php
function WKT($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,0,4);

$judul_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei","Juni", "Juli", "Agustus", "September","Oktober", "November", "Desember");
$wk=$tanggal." ".$judul_bln[(int)$bulan]." ".$tahun;
return $wk;
}
?>
<?php
function WKTP($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,2,2);

$judul_bln=array(1=> "Jan", "Feb", "Mar", "Apr", "Mei","Jun", "Jul", "Agu", "Sep","Okt", "Nov", "Des");
$wk=$tanggal." ".$judul_bln[(int)$bulan]."'".$tahun;
return $wk;
}
?>
<?php
function BAL($tanggal){
	$arr=explode(" ",$tanggal);
	if($arr[1]=="Januari"||$arr[1]=="January"){$bul="01";}
	else if($arr[1]=="Februari"||$arr[1]=="February"){$bul="02";}
	else if($arr[1]=="Maret"||$arr[1]=="March"){$bul="03";}
	else if($arr[1]=="April"){$bul="04";}
	else if($arr[1]=="Mei"||$arr[1]=="May"){$bul="05";}
	else if($arr[1]=="Juni"||$arr[1]=="June"){$bul="06";}
	else if($arr[1]=="Juli"||$arr[1]=="July"){$bul="07";}
	else if($arr[1]=="Agustus"||$arr[1]=="August"){$bul="08";}
	else if($arr[1]=="September"){$bul="09";}
	else if($arr[1]=="Oktober"||$arr[1]=="October"){$bul="10";}
	else if($arr[1]=="November"){$bul="11";}
	else if($arr[1]=="Nopember"){$bul="11";}
	else if($arr[1]=="Desember"||$arr[1]=="December"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>	

<?php
function BALP($tanggal){
	$arr=explode(" ",$tanggal);
	if($arr[1]=="Jan"){$bul="01";}
	else if($arr[1]=="Feb"){$bul="02";}
	else if($arr[1]=="Mar"){$bul="03";}
	else if($arr[1]=="Apr"){$bul="04";}
	else if($arr[1]=="Mei"){$bul="05";}
	else if($arr[1]=="Jun"){$bul="06";}
	else if($arr[1]=="Jul"){$bul="07";}
	else if($arr[1]=="Agu"){$bul="08";}
	else if($arr[1]=="Sep"){$bul="09";}
	else if($arr[1]=="Okt"){$bul="10";}
	else if($arr[1]=="Nov"){$bul="11";}
	else if($arr[1]=="Nop"){$bul="11";}
	else if($arr[1]=="Des"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>


<?php
function process($conn,$sql){
$s=false;
$conn->autocommit(FALSE);
try {
  $rs = $conn->query($sql);
  if($rs){
	    $conn->commit();
	    $last_inserted_id = $conn->insert_id;
 		$affected_rows = $conn->affected_rows;
  		$s=true;
  }
} 
catch (Exception $e) {
	echo 'fail: ' . $e->getMessage();
  	$conn->rollback();
}
$conn->autocommit(TRUE);
return $s;
}

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getField($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$d= $rs->fetch_assoc();
	$rs->free();
	return $d;
}

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	//foreach($arr as $row) {
	//  echo $row['nama_kelas'] . '*<br>';
	//}
	
	$rs->free();
	return $arr;
}
function getAdmin($conn,$kode){
$field="username";
$sql="SELECT `$field` FROM `tb_admin` where `kode_admin`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}


?>



 <?php
 
 function getHit($kal,$kalimat){
  $ar=explode(" ",$kalimat);
  $ada=0;
  for($i=0;$i<count($ar);$i++){
   if($kal==$ar[$i]){$ada++;}
   }//for
  return $ada;
  } 
 ?>
  
    
    

<?php
function getStopWords()
    {
        return array(
            'yang', 'untuk','kereta','roda','api', 'pada', 'ke', 'para', 'namun', 'menurut', 'antara', 'dia', 'dua',
            'ia', 'seperti', 'jika', 'jika', 'sehingga', 'kembali', 'dan', 'tidak', 'ini', 'karena',
            'kepada', 'oleh', 'saat', 'harus', 'sementara', 'setelah', 'belum', 'kami', 'sekitar',
            'bagi', 'serta', 'di', 'dari', 'telah', 'sebagai', 'masih', 'hal', 'ketika', 'adalah',
            'itu', 'dalam', 'bisa', 'bahwa', 'atau', 'hanya', 'kita', 'dengan', 'akan', 'juga',
            'ada', 'mereka', 'sudah', 'saya', 'terhadap', 'secara', 'agar', 'lain', 'anda',
            'begitu', 'mengapa', 'kenapa', 'yaitu', 'yakni', 'daripada', 'itulah', 'lagi', 'maka',
            'tentang', 'demi', 'dimana', 'kemana', 'pula', 'sambil', 'sebelum', 'sesudah', 'supaya',
            'guna', 'kah', 'pun', 'sampai', 'sedangkan', 'selagi', 'sementara', 'tetapi', 'apakah',
            'kecuali', 'sebab', 'selain', 'seolah', 'seraya', 'seterusnya', 'tanpa', 'agak', 'boleh',
            'dapat', 'dsb', 'dst', 'dll', 'dahulu', 'dulunya', 'anu', 'demikian', 'tapi', 'ingin',
            'juga', 'nggak', 'mari', 'nanti', 'melainkan', 'oh', 'ok', 'seharusnya', 'sebetulnya',
            'setiap', 'setidaknya', 'sesuatu', 'pasti', 'saja', 'toh', 'ya', 'walau', 'tolong',
            'tentu', 'amat', 'apalagi', 'bagaimanapun'
        );
    }


function getStopNumber()
    {
        return array(
            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '!', '@', '#', '$', '%'
        );
    }
 
 
 
function getUnix($array){
error_reporting(0);
$unique = array_flip(array_flip($array));
//print_r($unique);
$jd=count($array);
//echo $jd."#<br>";
$m=0;
for($i=0;$i<$jd;$i++){
 if(strlen($unique[$i])>0){
  //echo "$m =".$unique[$i]."<br>";
  $M[$m]=$unique[$i];
  $m++;
 }
}
 return $M;
}

 function swap(&$arr, $a, $b) {
        $tmp = $arr[$a];
        $arr[$a] = $arr[$b];
        $arr[$b] = $tmp;
    }
?>