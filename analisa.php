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
	background-color:#ddd;
	
}

#table td, #table th {
    border: 1px solid #696969;
    padding: 8px;
}



#table th {
	 padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #A9A9A9;
    color: white;
}
</style>
<script type="text/javascript"> 
function PRINT(){ 
win=window.open('pengajuan/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php

	$id_pengajuan=$_GET["id"];
	$sql="select * from `$tbpengajuan` where `id_pengajuan`='$id_pengajuan'";
	$d=getField($conn,$sql);
				$id_pengajuan=$d["id_pengajuan"];
				$id_pengajuan0=$d["id_pengajuan"];
				$tanggal=WKT($d["tanggal"]);
				$judul=$d["judul"];
				$status=$d["status"];
				$nim=$d["nim"];
				$nama=getMahasiswa($conn,$nim);

				$rekapitulasi=$d["rekapitulasi"];
				$catatan=$d["catatan"];

?>
    <link rel="stylesheet" href="jsacor/jquery-ui.css">
    <link rel="stylesheet" href="resources/demos/style.css">
    <script src="jsacor/jquery-1.12.4.js"></script>
    <script src="jsacor/jquery-ui.js"></script>
    <script>
    $( function() {
    $( "#accordion" ).accordion({
    collapsible: true
    });
    } );
    </script>
<div id="accordion">
  <h4>Analisa TF IDF Data</h4>
  <div>


<table id="table">

<tr>
<td height="24"><label for="nim">NIM</label>
<td>:<td colspan="2"><?php echo $nim;?></td>
</tr>


<tr>
<td height="24"><label for="nim">Nama</label>
<td>:<td colspan="2"><?php echo $nama;?></td>
</tr>

<tr>
<td><label for="status">Judul</label>
<td>:<td colspan="2"><?php echo $judul;?>
</td></tr>
 
<tr>
<th colspan='3'>
</th></tr>
 
</table>

<?php
require_once __DIR__ . '/vendor/autoload.php';

error_reporting(0);

//$judul="sistem informasi geografis jalur busway transjakarta basis web";
				
$initos = new \Sastrawi\Stemmer\StemmerFactory();
$bikinos = $initos->createStemmer();
$stemming=$bikinos->stem($judul);
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
$juduluji=str_replace("  "," ", $wordStop); 
//=====================================================	
 $stemming=$juduluji;
 $arAsli=explode(".",$stemming);
 $jumk=count($arAsli);

 $AR=explode(" ",$stemming);
 $AR=array_unique($AR);

$m=0;
for($i=0;$i<count($AR);$i++){
 if(strlen($AR[$i])>1){
  $arUnix[$m]=$AR[$i]; 
  $m++;
 }
 }
 //======================================
 

				
 $sql="select * from `$tbdatalatih`  order by `id_datalatih` asc limit 0,10";		//					
	$arr=getData($conn,$sql);
	$i=0;
	$arStem[0]=$stemming;
	$gabungan=$stemming." ";
		foreach($arr as $d) {							
				$id_datalatih0=$d["id_datalatih"];
				$judul=$d["judul"];
				$judul0=$d["judul"];
				$nim0=$d["nim"];
				
					$arKode[$i]=$id_datalatih0;
					$arKat[$i]=$d["nim"];
					
				
				
				$arAslidoc[$i]=$judul0;
				
				//==================
				
				$stemming2=$bikinos->stem($judul0);
					$stemmingnew2=strtolower($stemming2);
					$wordStop2=$stemmingnew2;
					for($y=0;$y<count($ar);$y++){
					 $wordStop2 =str_replace($ar[$y]." ","", $wordStop2); 
					}

					for($y=0;$y<count($ak);$y++){
					 $wordStop2 =str_replace($ak[$y],"", $wordStop2); 
					}
					$judulfilter=str_replace("  "," ", $wordStop2); 

				//==================
				$gabungan.=$judulfilter." ";
				$arStem[$i+1]=$judulfilter;
				$arDoc[$i]=$judulfilter;
				$arKe[$i]="Dokumen ke-".($i+1);
				 $TOT[$i]=0;
		$i++;		
		}
		$jumk=$i;
 //======================================
 
 
 $arAsli=explode(" ",$gabungan);
  $arUnix0=array_unique($arAsli);
  
  $ii=0;
  for($i=0;$i<count($arUnix0);$i++){
	  if($arUnix0[$i]==""){}
	  else{
		  $arUnix[$ii]=$arUnix0[$i];
		  $ii++;
		}
	  }
	  
 $jumb=count($arUnix);
 
echo"<table width='300%' border='1'>";
echo"<tr><td>Kata";
echo"<td>Q";
 for($i=0;$i<$jumk;$i++){
  $u=$i+1;
  echo"<td>D".$u; 
 }
 echo"<td>df";
 echo"<td>IDF";
 echo"<td>QDF";
 for($i=0;$i<$jumk;$i++){
	  $u=$i+1;
	  echo"<td>QD".$u; 
 }

  for($i=0;$i<$jumk;$i++){
  	$u=$i+1;
  	echo"<td>QDFD".$u; 
 }

echo"<td>Q<sup>2</sup>";
  for($i=0;$i<$jumk;$i++){
  	$u=$i+1;
  	echo"<td>D<sup>2</sup>".$u; 
 }



echo"</tr>";
 
 $bar=count($arUnix);
 for($i=0;$i<$bar;$i++){
  $kata=$arUnix[$i];
  $hitung=0;
 echo"<tr><td>".$kata."</td>";
 $jumada=0;
 
   for($j=0;$j<$jumk+1;$j++){
    $ada=getHit($kata,$arStem[$j]);
    $M[$i][$j]=$ada;
    if($ada>0){
		$jumada++;
	}
	echo"<td>".$ada;
   }
 // $log=log($jumk+1,10)/$jumada; 
  $log=log(($jumk)/$jumada,10); 
 $log=abs($log);
 echo"<td>$jumada</td>";//idf
 echo"<td>log($jumk/$jumada)=$log";
 
   for($j=0;$j<$jumk+1;$j++){
		$N[$i][$j]=$M[$i][$j] * $log;
		$N2[$i][$j]=pow($N[$i][$j],2);
		
		$TOT[$j]=$TOT[$j]+$N[$i][$j];
		echo "<td>".$N[$i][$j];
   }
   
  for($j=1;$j<$jumk+1;$j++){
    $NN[$i][$j-1]=$N[$i][0] * $N[$i][$j];
    echo "<td>".$NN[$i][$j-1];
   }


  for($j=0;$j<$jumk+1;$j++){
    echo "<td>".$N2[$i][$j];
   }
   
 echo"</tr>"; 
 }//for i


   for($j=0;$j<$jumk;$j++){//kolom
	  $TOT1[$j]=0;
	  	for($k=0;$k<$bar;$k++){//baris
    		$TOT1[$j]+=$NN[$k][$j];
		}
   }

	  for($j=0;$j<$jumk+1;$j++){
			$TOT2[$j]=0;
			for($k=0;$k<$bar;$k++){//baris
					$TOT2[$j]+=$N2[$k][$j];
			}
	   }
   
//------------------------------------
echo"<tr><td>Kata";
echo"<td>Q";
 for($i=0;$i<$jumk;$i++){
  $u=$i+1;
  echo"<td>D".$u; 
 }
 echo"<td>df";
 echo"<td>IDF";
 echo"<td>QDF";
 for($i=0;$i<$jumk;$i++){
	  $u=$i+1;
	  echo"<td>QD".$u; 
 }

  for($i=0;$i<$jumk;$i++){
  	echo"<td>".$TOT1[$i]; 
 }

  for($i=0;$i<$jumk+1;$i++){
  	echo"<td>".$TOT2[$i]; 
 }



echo"</tr>";

echo"</table>"; 

$statustx="Diterima";
$catatan="";
$reakpitulasi="";
$Q=pow($TOT2[0],0.5);
//TOT1 mulai dari 0 krn tak ada Q
//TOT2 mulai dari 1 krn ada Q
$gab.="Ambang threshold kesamaan >= $kesamaan % Adalah Ditolak</br>";
$gab.="Qvalue=$TOT2[0]<sup>0.5</sup> =".$Q."<br><br>";
$gab.="Cosine Similarity Terhadap tiap-tiap dokumen:<br>";
 for($i=1;$i<$jumk;$i++){
	$E=pow($TOT2[$i],0.5);
	$ES=$TOT2[$i]."<sup>0.5</sup>";
	$QS=$TOT2[0]."<sup>0.5</sup>";
	
	$D=pow(($TOT1[$i-1]*$TOT2[0]),0.5);
	$DS="(".$TOT2[0]." x ".$TOT1[$i-1].")<sup>0.5</sup>";
	$H[$i-1]=$D/($Q * $E)+0;
	$PRO[$i-1]=round($H[$i-1]*100,2);
	$kes="<font color='green'>Diterima</font>";
	$CS="CSvalue<sub>$i</sub> =$DS/($QS x ".$ES.")";
	if($PRO[$i-1]>=$kesamaan){
		$kes="<font color='red'>Kemiripan >=$kesamaan ->Ditolak</font>";
		$catatan.=$arAslidoc[$i-1]." (".$PRO[$i-1]." %),";
		$rekapitulasi.=$arDoc[$i-1]."->CS:".$CS.", ";
		$statustx="Ditolak";
		}
	$PROK[$i-1]=$kes;
	
	$HS[$i-1]=$i.".".$arAslidoc[$i-1]."<br>&nbsp;&nbsp;&nbsp;<b>Stemming:</b><i>".$arDoc[$i-1]."</i>
	<br>$CS";
	
	$gab.=$HS[$i-1]."<br>";
	$gab.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; .:Doc".$i."=>".$H[$i-1]." =>".$PRO[$i-1]." % .:".$PROK[$i-1]."<hr>";

 }
echo $gab;
echo"<h1>Kesimpulan:".$statustx."</h1>";
 $sql="UPDATE `$tbpengajuan` set status= '$statustx',catatan='$catatan',rekapitulasi='$rekapitulasi' where `id_pengajuan`='$id_pengajuan'";
$up=process($conn,$sql);

	?>


</div>


</div>





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
function swap(&$arr, $a, $b) {
    $tmp = $arr[$a];
    $arr[$a] = $arr[$b];
    $arr[$b] = $tmp;
}
?>
    
    
    

<?php
function getStopWords()
    {
        return array(
            'yang', 'untuk', 'pada', 'ke', 'para', 'namun', 'menurut', 'antara', 'dia', 'dua',
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

?>