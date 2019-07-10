
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
  <h4>Form Import Data Crawling</h4>
  <div>  
<form action="" method="post" enctype="multipart/form-data">
<table width="385">



<tr>
<td><label for="nama">Tulis Kata kunci</label>
<td>:
<td colspan="2"><input name="nama" type="text" id="nama" value="<?php echo $nama;?>" size="30" /></td>
</tr>

<tr>
<td>
<td>
<td colspan="2">	<input name="Cari" type="submit" id="Cari" value="Cari" />
        <a href="?mnu=crawling"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

</div>


<?php

 $sqld="select distinct(keyword) from `tb_crawling` order by `keyword` asc";
 	$arrd=getData($conn,$sqld);
		foreach($arrd as $dd) {							
				$keyword=$dd["keyword"];
$no=1;				
				?>
<h4><a href="#"><font color="#fff">Data keyword <?php echo $keyword;?></font></a></h4>
<div>
Data keyword <?php echo $keyword;?>: 

<br>

<table id="table">
  <tr bgcolor="#036">
    <th width="3%"><center>No</th>
    <th width="80%"><center>Tweet</th>
    <th width="10%"><center>Hapus</th>
  </tr>
<?php  

require_once __DIR__ . '/vendor/autoload.php';
$initos = new \Sastrawi\Stemmer\StemmerFactory();
$bikinos = $initos->createStemmer();

	
  $sql="select * from `tb_crawling` where `keyword`='$keyword' order by `idc` desc";
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
				$idc=$d["idc"];
				$tweet=$d["tweet"];
				$normalisasi=$d["normalisasi"];
				$note=$d["note"];
				$lokasi=$d["lokasi"];
				
				if(strlen($normalisasi)<3){
					$normalisasi=getNorm($bikinos,$tweet);
					$sqld="update  `tb_crawling` set normalisasi='$normalisasi' where `idc`='$idc'";
					$up=process($conn,$sqld);
				}
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td valign='top'><b>$tweet</b>
				<br><i>$normalisasi</i>
				<br>Cat : <u>$lokasi </u></td>
				<td align='center'>
<a href='?mnu=tfidfc&id=$idc'><img src='ypathicon/11.png' title='Analisa TFIDF + CS'></a>					
<a href='?mnu=crawling&pro=hapus&kode=$idc'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $tweet pada data crawling ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data crawling belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=crawling'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=crawling'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=crawling'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total Data Crawling <b>$jmldata</b> Item</p>";
?>


 
</div>
<?php }?>


 
</div>

<br>
 <a href="?mnu=crawling&pro=generate&keyword='<?php echo $keyword;?>'">
 <input name="Generate" type="button" id="Generate" value="Generate Seluruh Data Crawling Baru"  
onClick="return confirm('Apakah Anda benar-benar akan GENERATE TWEET crawling ?..')"/>
 </a>


  
  <?php
  
  if($_GET["pro"]=="hapus"){
$idc=$_GET["kode"];
$sql="delete from `tb_crawling` where `idc`='$idc'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data crawling $idc berhasil dihapus !');document.location.href='?mnu=crawling';</script>";}
else{echo"<script>alert('Data crawling $idc gagal dihapus...');document.location.href='?mnu=crawling';</script>";}
}



function queryTwitter($search) 
{
    $url = "https://api.twitter.com/1.1/search/tweets.json";
    if($search != "")
        $search = "#".$search;
    $query = array( 'count' => 1000, 'q' => urlencode($search), "result_type" => "recent");
    $oauth_access_token = "1132906211412627456-J3ZQoUe8avEg2JtQ13Br2XVPn1DW0G";
    $oauth_access_token_secret = "9bCvokHjkAtTpnw8P7HtVUc89HRlGvhRzkZSepN6CWGvU";
    $consumer_key = "M8O0tnsbDtBzywe4S4r4bjlJH";
    $consumer_secret = "uq1fYzwEgLsDS9ZXyp26ISBSsWrOqEUEu7GmNUo6OjGRUccLJG";

    $oauth = array(
                    'oauth_consumer_key' => $consumer_key,
                    'oauth_nonce' => time(),
                    'oauth_signature_method' => 'HMAC-SHA1',
                    'oauth_token' => $oauth_access_token,
                    'oauth_timestamp' => time(),
                    'oauth_version' => '1.0');

    $base_params = empty($query) ? $oauth : array_merge($query,$oauth);
    $base_info = buildBaseString($url, 'GET', $base_params);
    $url = empty($query) ? $url : $url . "?" . http_build_query($query);

    $composite_key = rawurlencode($consumer_secret) . '&' . rawurlencode($oauth_access_token_secret);
    $oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
    $oauth['oauth_signature'] = $oauth_signature;

    $header = array(buildAuthorizationHeader($oauth), 'Expect:');
    $options = array( CURLOPT_HTTPHEADER => $header,
                      CURLOPT_HEADER => false,
                      CURLOPT_URL => $url,
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_SSL_VERIFYPEER => false);

    $feed = curl_init();
    curl_setopt_array($feed, $options);
    $json = curl_exec($feed);
    curl_close($feed);
    return  ($json);//json_decode
}

function buildBaseString($baseURI, $method, $params)
{
    $r = array(); 
    ksort($params);
    foreach($params as $key=>$value){
        $r[] = "$key=" . rawurlencode($value); 
    }
    return $method."&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r)); 
}

function buildAuthorizationHeader($oauth)
{
    $r = 'Authorization: OAuth '; 
    $values = array(); 
    foreach($oauth as $key=>$value)
        $values[] = "$key=\"" . rawurlencode($value) . "\""; 
    $r .= implode(', ', $values); 
    return $r; 
}



if(isset($_POST["Cari"])){
	
	$nama=$_POST["nama"];
	$json=queryTwitter($nama);
	$jsonArr = json_decode($json,true);   
	$X=$jsonArr["statuses"];

$p=count($X[0]);

  
    
    
echo"<button><a href='?mnu=crawling&pro=simpan&nama=$nama'>SIMPAN HASIL CRAWLING ?</a></button>";

echo "Tersedia $p Data ntuk Kata $nama <hr>";
echo "<table id='table' border='1px'>";
echo "<tr bgcolor='#036'>";
echo "<th width='%'><center>No</th>";
echo "<th width='80%'><center>Tweet</th>";
echo "<th width='10%'><center>Lokasi</th>";
	for($i=0;$i<$p;$i++){
        echo "<tr>";
		$no=$i+1;
        echo "<td> $no </td>";
		
		$pesan=$X[$i]["text"];
        echo "<td> $pesan </td>";
        
		$lokasi=$X[$i]["user"]["location"];
	   echo "<td>$lokasi</td>";
       echo "</tr>";
	
}//loop

echo "</table";
}




if(isset($_GET["pro"]) && $_GET["pro"]=="simpan"){
	
	
require_once __DIR__ . '/vendor/autoload.php';
$initos = new \Sastrawi\Stemmer\StemmerFactory();
$bikinos = $initos->createStemmer();


	$nama=$_GET["nama"];
	$json=queryTwitter($nama);
	$jsonArr = json_decode($json,true);   
	$X=$jsonArr["statuses"];

$p=count($X[0]);
echo "Telah Tersimpan $p Data ntuk Kata $nama <hr>"."<table> 
    <tr>
        <td> No   </td>
        <td> Tweets Text   </td>
        <td> Location   </td>
        
    <tr>";

	for($i=0;$i<$p;$i++){
        echo "<tr>";
        $no=$i+1;
		echo "<td> $no </td>";
		
		$pesan=$X[$i]["text"];
        echo "<td> $pesan </td>";

		$lokasi=$X[$i]["user"]["location"];
	echo "<td>".$no."=".$pesan."->".$lokasi."</td>";
    echo "</tr>";
	$normalisasi=getNorm($bikinos,$pesan);
				
	$sql=" INSERT INTO `tb_crawling` (
`idc` ,
`tweet` ,
`lokasi` ,
`note` 
) VALUES (
'', 
'$pesan', 
'$lokasi',
'$normalisasi'
)";
	
$simpan=process($conn,$sql);
	
		
}//loop
echo "</table>";
echo "<script>alert('Simpan Hasill Crawling sebanyak $p kata $nama berhasil.... !');document.location.href='?mnu=crawling';</script>";
		
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



  <?php
  
  if($_GET["pro"]=="generate"){
	
	$K=5;
require_once __DIR__ . '/vendor/autoload.php';
error_reporting(0);
		
$initos = new \Sastrawi\Stemmer\StemmerFactory();
$bikinos = $initos->createStemmer();


$ak=getStopNumber();
$ar=getStopWords();

	
	  $sqlh="select * from `tb_crawling` where `label`=''  order by `idc` desc";//
		$jumh=getJum($conn,$sqlh);
		if($jumh > 0){}
		$arrh=getData($conn,$sqlh);
		foreach($arrh as $dh) {							
				$idc=$dh["idc"];
				$tweet=$dh["tweet"];
				$normalisasi=$dh["normalisasi"];
				$note=$dh["note"];
				$lokasi=$dh["lokasi"];
				
 $stemming=$normalisasi;

 $sql="select * from `$tbdatalatih` 	  order by `id_datalatih` asc 	";	
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
				$arTweetAsli[$i]=$tweet0;
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
 
//echo"<table width='100%' border='1'>";
//echo"<tr><td>Kata";
//echo"<td>Q";
 for($i=0;$i<$jumk;$i++){
  $u=$i+1;
  //echo"<td>D".$u; 
 }
 //echo"<td>df";
 //echo"<td>IDF";
 //echo"<td>QDF";
 for($i=0;$i<$jumk;$i++){
	  $u=$i+1;
	  //echo"<td>QD".$u; 
 }

  for($i=0;$i<$jumk;$i++){
  	$u=$i+1;
  	//echo"<td>QDFD".$u; 
 }

//echo"<td>Q<sup>2</sup>";
  for($i=0;$i<$jumk;$i++){
  	$u=$i+1;
  	//echo"<td>D<sup>2</sup>".$u; 
 }



//echo"</tr>";
 
 $bar=count($arUnix);
 for($i=0;$i<$bar;$i++){
  $kata=$arUnix[$i];
  $hitung=0;
 //echo"<tr><td>".$kata."</td>";
 $jumada=0;
 
   for($j=0;$j<$jumk+1;$j++){
    $ada=getHit($kata,$arStem[$j]);
    $M[$i][$j]=$ada;
    if($ada>0){
		$jumada++;
	}
	//echo"<td>".$ada;
   }
  $log=log(($jumk)/$jumada,10); 
 $log=abs($log);
 //echo"<td>$jumada</td>";//idf
 //echo"<td>log($jumk/$jumada)=$log";
 
   for($j=0;$j<$jumk+1;$j++){
		$N[$i][$j]=$M[$i][$j] * $log;
		$N2[$i][$j]=pow($N[$i][$j],2);
		
		$TOT[$j]=$TOT[$j]+$N[$i][$j];
		//echo "<td>".$N[$i][$j];
   }
   
  for($j=1;$j<$jumk+1;$j++){
    $NN[$i][$j-1]=$N[$i][0] * $N[$i][$j];
    //echo "<td>".$NN[$i][$j-1];
   }


  for($j=0;$j<$jumk+1;$j++){
    //echo "<td>".$N2[$i][$j];
   }
   
 //echo"</tr>"; 
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
//echo"<tr><td>Kata";
//echo"<td>Q";
 for($i=0;$i<$jumk;$i++){
  $u=$i+1;
  //echo"<td>D".$u; 
 }
 //echo"<td>df";
 //echo"<td>IDF";
 //echo"<td>QDF";
 for($i=0;$i<$jumk;$i++){
	  $u=$i+1;
	  //echo"<td>QD".$u; 
 }

  for($i=0;$i<$jumk;$i++){
  	//echo"<td>".$TOT1[$i]; 
 }

  for($i=0;$i<$jumk+1;$i++){
  	//echo"<td>".$TOT2[$i]; 
 }



//echo"</tr>";

//"</table>"; 

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

	
	$HS[$i-1]="Tweet $i.".$arTweetAsli[$i-1]." : <b>$kat</b><br>
	<b>Stemming:</b><i>".$arDoc[$i-1]." </i>
	<br>$CS";
	
	$gab.=$HS[$i-1]."<br>";
	$gab.="Tweet-".$i."=>".$H[$i-1]." =>".$PRO[$i-1]." % <hr>";
 }
//echo $gab;


  $array_count = $jumk+1;
        for($x = 1; $x < $array_count; $x++){
            for($a = 1 ;  $a < $array_count - 1 ; $a++){
                if($a < $array_count ){
                    if($PRO[$a] < $PRO[$a + 1] ){
                            swap($PRO, $a, $a+1);
							swap($arTweetAsli, $a, $a+1);
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
	$gab.="<b>Kalimat: $stemming</b>";
	$gab.="<table border='1'><tr><td>No<td>Dokumen ke<td>Tweet<td>Bobot<td>Kategori</tr>";
	 for($i=1;$i<7;$i++){//$jumk
		 $no=$i;
		 $kat=$arKat[$i];
		$gab.="<tr><td>$no<td>Tweet $no<td>
		$arTweetAsli[$i]
		<br>
		<i>$arStem[$i]</i><td>$PRO[$i]%<td>$kat</tr>";
		
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

 $sql="Update `tb_crawling` set kategori='".strtolower($kes)."',label='1' where `idc`='$idc'";
$up=process($conn,$sql);
	  
  }//for each loop
	  
  }//if isset
	  ?>