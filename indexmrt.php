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
$kesamaan=60;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>WELCOME TO WEB CEK SKRIPSI SKRIPSI</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>
<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/hmm.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="index.html">Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="index2.html">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.html">Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.html">Dashboard 4</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="chart.html">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="table.html">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">   <a href="index.php?mnu=home">
                    
					<center><h2><font size="30">UVN</font></h2></center>
                </a></div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
					
					       <?php
if ($_SESSION["cstatus"]=="Administrator"){	
      echo"
	  <li><a href='index.php?mnu=home'><i class='fas fa-table'></i>Home</a></li>
      <li><a href='index.php?mnu=admin'><i class='fas fa-chart-bar'></i>Admin</a></li>
		<li><a href='index.php?mnu=dosen'><i class='zmdi zmdi-settings'></i>Dosen</a></li>	
		<li><a href='index.php?mnu=mahasiswa'><i class='zmdi zmdi-account'></i>Mahasiswa</a></li>
	  <li><a href='index.php?mnu=datalatih'><i class='fas fa-copy'></i>Data Latih</a></li>
	  <li><a href='index.php?mnu=pengajuan'><i class='far fa-check-square'></i>Pengajuan</a></li>
      <li><a href='index.php?mnu=logout'><i class='far fa-check-square'></i>Logout</a></li>";
}
else if ($_SESSION["cstatus"]=="Dosen"){	
      echo"
	  <li><a href='index.php?mnu=home'><i class='fas fa-table'></i>Home</a></li>
  <li><a href='index.php?mnu=profil'><i class='fas fa-copy'></i>Profil</a></li>	
  <li><a href='index.php?mnu=ddatalatih'><i class='fas fa-copy'></i>Data Latih</a></li>	
	<li><a href='index.php?mnu=dmahasiswa'><i class='zmdi zmdi-account'></i>Mahasiswa</a></li>
	  <li><a href='index.php?mnu=dpengajuan'><i class='far fa-check-square'></i>Pengajuan</a></li>
      <li><a href='index.php?mnu=logout'><i class='far fa-check-square'></i>Logout</a></li>";
}

else{
	 echo"<li><a href='index.php?mnu=home'><i class='fas fa-table'></i>Home</a></li>";
	 echo"<li><a href='login.php'><i class='far fa-check-square'></i>Login</a></li>";	 
	}
      ?>
                      
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            
                            <div class="header-button">
                                <div class="noti-wrap"></div>
                                    <div class="noti__item js-item-menu">
                                        
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image"> 
									
                                           
                                        </div>
                                        <div class="content">
									
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
									
														
                                                </div>
                                            <div class="account-dropdown__footer">
									
													
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
              <div class="noti__item js-item-menu"></div>
                <div class="section__content section__content--p30">
 <?php 
				
if($mnu=="admin"){require_once"admin/admin.php";}
else if($mnu=="mahasiswa"){require_once"mahasiswa/mahasiswa.php";}
else if($mnu=="dosen"){require_once"dosen/dosen.php";}
else if($mnu=="datalatih"){require_once"datalatih/datalatih.php";}
else if($mnu=="pengajuan"){require_once"pengajuan/pengajuan.php";}

else if($mnu=="dmahasiswa"){require_once"mahasiswa/dmahasiswa.php";}
else if($mnu=="profil"){require_once"dosen/profil.php";}
else if($mnu=="profil2"){require_once"dosen/profil2.php";}

else if($mnu=="ddatalatih"){require_once"datalatih/ddatalatih.php";}
else if($mnu=="dpengajuan"){require_once"pengajuan/dpengajuan.php";}

else if($mnu=="login"){require_once"login.php";}
else if($mnu=="logout"){require_once"logout.php";}
else if($mnu=="analisa"){require_once"analisa.php";}
else {require_once"home.php";}

 ?>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS--><?php if($mnu=="home" || $mnu=="login" || $mnu=="pendaftaran"|| $mnu==""){?>
    <script src="vendor/jquery-3.2.1.min.js"></script><?php }?>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->

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
function getMHS($conn,$kode){
$field="nama_mhs";
$sql="SELECT `$field` FROM `tb_mahasiswa` where `nim`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
function getMahasiswa($conn,$kode){
$field="nama_mhs";
$sql="SELECT `$field` FROM `tb_mahasiswa` where `nim`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}

function getDosen($conn,$kode){
$field="nama_dosen";
$sql="SELECT `$field` FROM `tb_dosen` where `nidn`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}	


?>