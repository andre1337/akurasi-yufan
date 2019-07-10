<?php
$pro="simpan";
$tanggal=WKT(date("Y-m-d"));
	$K=5;
	
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

				
	$idc=$_GET["id"];
	$sql="select * from `tb_crawling` where `idc`='$idc'";
	$d=getField($conn,$sql);
				$tweet=$d["tweet"];
				$normalisasi=$d["normalisasi"];
				$note=$d["note"];
				$lokasi=$d["lokasi"];
				$keyword=$d["keyword"];


?>
    
<div id="accordion">
  <h4>Analisa Tweet TF IDF Data</h4>
  <div>


<table id="table">

<tr>
<td><label for="status">Tweet</label>
<td>:<td colspan="2"><?php echo $tweet;?>
</td></tr>

<tr>
<td height="24"><label for="hastag">Hastag</label>
<td>:<td colspan="2"><?php echo $keyword;?></td>
</tr>


<tr>
<td height="24"><label for="hastag">Lokasi</label>
<td>:<td colspan="2"><?php echo $lokasi;?></td>
</tr>


 
<tr>
<th colspan='3'>
</th></tr>
 
</table>

<?php
require_once __DIR__ . '/vendor/autoload.php';

error_reporting(0);
		
$initos = new \Sastrawi\Stemmer\StemmerFactory();
$bikinos = $initos->createStemmer();
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

				
 $sql="select * from `$tbdatalatih` 	  order by `id_datalatih` asc 	";		//				limit 0,10	
	$arr=getData($conn,$sql);
	$i=0;
	$arStem[0]=$stemming;
	$gabungan=$stemming." ";
		foreach($arr as $d) {							
				$id_datalatih0=$d["id_datalatih"];
				$tweet=$d["tweet"];
				$tweet0=$d["tweet"];
				$hastag0=$d["hastag"];
				$kategori=$d["kategori"];
				$tweetfilter=$d["normalisasi"];
				
					$arKode[$i]=$id_datalatih0;
					$arKat[$i]=$kategori;
					$arTweets[$i]=$tweet0;
				
				//==================
				/*
					$stemming2=$bikinos->stem($tweet0);
					$stemmingnew2=strtolower($stemming2);
					$wordStop2=$stemmingnew2;
					for($y=0;$y<count($ar);$y++){
					 $wordStop2 =str_replace($ar[$y]." ","", $wordStop2); 
					}

					for($y=0;$y<count($ak);$y++){
					 $wordStop2 =str_replace($ak[$y],"", $wordStop2); 
					}
					$tweetfilter=str_replace("  "," ", $wordStop2); 
					*/
				//==================
				$gabungan.=$tweetfilter." ";
				$arStem[$i+1]=$tweetfilter;
				$arDoc[$i]=$tweetfilter;
				$arKe[$i]="Tweet ke-".($i+1);
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
 
echo"<table width='100%' border='1'>";
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

$catatan="";
$reakpitulasi="";
$Q=pow($TOT2[0],0.5);

$gab.="Qvalue=$TOT2[0]<sup>0.5</sup> =".$Q."<br><br>";
$gab.="Cosine Similarity Terhadap tiap-tiap Tweet:<br>";
 for($i=1;$i<=$jumk;$i++){
	 $kat=$arKat[$i-1];
	 
	$E=pow($TOT2[$i],0.5);
	$ES=$TOT2[$i]."<sup>0.5</sup>";
	$QS=$TOT2[0]."<sup>0.5</sup>";
	
	$D=pow(($TOT1[$i-1]*$TOT2[0]),0.5);
	$DS="(".$TOT2[0]." x ".$TOT1[$i-1].")<sup>0.5</sup>";
	$H[$i-1]=$D/($Q * $E)+0;
	$PRO[$i-1]=round($H[$i-1]*100,2);
	$CS="CSvalue<sub>$i</sub> =$DS/($QS x ".$ES.")";

	
	$HS[$i-1]="Tweet $i.".$arTweets[$i-1]." : <b>$kat</b><br>
	<b>Stemming:</b><i>".$arDoc[$i-1]." </i>
	<br>$CS";
	
	$gab.=$HS[$i-1]."<br>";
	$gab.="Tweet-".$i."=>".$H[$i-1]." =>".$PRO[$i-1]." % <hr>";
 }
echo $gab;
 $sql="UPDATE `$tbtweet` set status= '$statustx',catatan='$catatan',rekapitulasi='$rekapitulasi' where `id_tweet`='$id_tweet'";
//$up=process($conn,$sql);



  $array_count = $jumk+1;
        for($x = 1; $x < $array_count; $x++){
            for($a = 1 ;  $a < $array_count - 1 ; $a++){
                if($a < $array_count ){
                    if($PRO[$a] < $PRO[$a + 1] ){
                            swap($PRO, $a, $a+1);
							swap($arTweets, $a, $a+1);
							swap($H, $a, $a+1);
							swap($HS, $a, $a+1);
							swap($arKat, $a, $a+1);
							swap($arKode, $a, $a+1);
							swap($arStem, $a, $a+1);
							
                    }
                }
            }
        }
		
		

	$jp=0;$jn=0;
	$gab="<h1>Hasil Perangkingan</h1>";
	$gab.="<table border='1'><tr><td>No<td>Dokumen ke<td>Tweet<td>Bobot<td>Kategori</tr>";
	 for($i=1;$i<$jumk;$i++){
		 $no=$i;
		 $kat=$arKat[$i];
		$gab.="<tr><td>$no<td>Tweet $no<td>$arStem[$i]<td>$PRO[$i]%<td>$kat</tr>";
		
		if($no<=$K && $PRO[$i]>0){
			if($kat=="negatif"){
				$jn++;
			}
			else{
				$jp++;
			}
		}
	 }
	 $gab.="</table>";
	 echo $gab;
	 $kes="Positif";
	 if($jn>$jp){$kes="Negatif";}
	 echo "Jumlah Positif: $jp, Jumlah Negatf: $jn -> Kesimpulan KNN $K K adalah Kategori <b>$kes</b>";

$sql="Update `tb_crawling` set normalisasi='$stemming',kategori='".strtolower($kes)."' where `idc`='$idc'";
$hapus=process($conn,$sql);
	?>


</div>


</div>



