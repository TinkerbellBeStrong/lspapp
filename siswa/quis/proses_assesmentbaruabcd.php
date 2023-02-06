<html>
<head>
<title></title>
</style>
      
</head>
<body>
<?php 
session_start();
error_reporting(0);
//if(isset($_SESSION['kd_modul'])) { $kdmla=$_SESSION['kd_modul'];}
//if(isset($_SESSION['username'])) { $nima=$_SESSION['username'];}
//error_reporting(0);
include "../../lsp_koneksi.php";
$nama=trim($_POST['nama']);
$nim=trim($_POST['nim']);
//$user=$_SESSION['username'];
//$kelas=trim($_POST['kelas']);
$kmdl=$_POST['kmdl'];
$kmdll=trim($_POST['kmdl']);
$kounter=$_POST['kounter'];
$cekkdalias="select kdalias from unitalias";
$cekkdaliasa=mysql_query($cekkdalias);

while($rowalias=mysql_fetch_array($cekkdaliasa)){
$ckkda=$rowalias['kdalias'];

$resultxx = ("SELECT * FROM pertanyaanbck WHERE kd_modul='$kmdl' AND nim='$nim' AND unitalias='$ckkda' order by question_id,unitalias");
$resultxxx=mysql_query($resultxx);
$cekjumunita=mysql_num_rows($resultxxx);
if ($cekjumunita>0)
{
echo "xxx".$resultxx;
$benar=0;
$banyak=0;
$jawabanabcd="";
while($row=mysql_fetch_array($resultxxx)){
    $nomorsoal=$row["nomorsoal"];
	$tanggall=date("Y-m-d H:i:s");
	$answer=$row["answer"];
   
	$id=$row["question_id"];
        $wreal= date("H:i:s"); 
	//$jawabanabcd = implode(',', $answer);
        
        $njawab=$row["njawab"];
         $jawabanabcd .= $njawab.","; 
	//$q=q.$id;
   $banyak++;
	if($njawab == $answer){
    //echo "benar";
    $benar++;
	//mysql_query("INSERT INTO catatnomor (nomorsoal,kd_modul,nim,nama,skor,tanggal,jawaban,kali) 
	//		VALUES ('$id','$kmdll','$nim','$nama',1,'$tanggall','$njawab','$kounter')");}
	//else { mysql_query("INSERT INTO catatnomor (nomorsoal,kd_modul,nim,nama,skor,tanggal,jawaban,kali) 
	//		VALUES ('$id','$kmdll','$nim','$nama',0,'$tanggall','$njawab','$kounter')");
	}		
}

//$result6 = mysql_query ("SELECT answer FROM pertanyaanbck WHERE kd_modul='$kmdl' AND nim='$nim'");
//$row=mysql_fetch_array($result6);
//foreach($row as $chk1)  
  // {  
    //  $jawabanabcd .= $chk1.",";  
  // }   
//echo $que;


$jumlah=("SELECT * FROM modul WHERE kd_modul='$kmdll'");
$jumlaha=mysql_query($jumlah);
//echo "jum".$jumlah;
$jumlah1=mysql_fetch_array($jumlaha);

//$jumlah_soal=$jumlah1["jumlah_soal"];
$jumlah_soal=$banyak;
$salah=$jumlah_soal-$benar;
$nilai=(100/$jumlah_soal*$benar);
$kkm=$jumlah1["kkm"];
$modul=$jumlah1["modul"];

$result=mysql_query("SELECT * FROM user WHERE nim='$nim'");
$row=mysql_fetch_array($result);

$nama=$row["nama"];

$tanggal=date("Y-m-d H:i:s");



$simok=("INSERT INTO grade (id,kd_modul,modul,nim,nama,salah,benar,jumlah_soal,grade,tanggal,kelas,kkm,ujianke,waktureal)VALUES ('','$kmdll','$modul','$nim','$nama','$salah','$benar','$jumlah_soal','$nilai','$tanggal','$ckkda','$kkm','$kounter','$wreal')");
 //echo $simok;
$simoka=mysql_query($simok);
//echo "simok".$simok;
 if($simoka){
   $que="INSERT INTO jawabanabc (nis,nama,jawaban,ket,kelas,tgl,waktureal)VALUES('$nim','$nama','$jawabanabcd','$kmdll','$kelas','$tanggal','$wreal')";
   $que2=mysql_query($que);
   //  echo $del;
   
// header('location:view_grade2.php');}
//header('location:index2.php?module=home');  
      } else { echo "gagal ...";}
      }
    }
  if($que2){
   $galias="insert into gradealias (idgalias,kodemodul,nim) values ('','$kmdll','$nim')";
   $galiasa=mysql_query($galias);
   $del = ("DELETE FROM pertanyaanbck where kd_modul='$kmdl' AND nim='$nim'");
   $dela=mysql_query($del);
   
   }

  $hasill=mysql_query("SELECT * FROM vhasil");
     $cekdulu=mysql_fetch_array($hasill);
     $cekvhasil=$cekdulu["statushasil"];
   if ($cekvhasil=="Y" OR $cekvhasil=="y"){
echo '<meta http-equiv="refresh" content="0; url=view_grade3.php">';}    
 //include"view_grade3.php";}
elseif($cekvhasil=="S" OR $cekvhasil=="s"){
  echo '<meta http-equiv="refresh" content="0; url=view_grade4.php">';}
     else {//include"view_grade2.php";}
echo '<meta http-equiv="refresh" content="0; url=view_grade2.php">';} 

?>
  
</body>
</html>
