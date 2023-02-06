<link href="../../css/bootstrap.min.css" rel="stylesheet">
<link href="../../css/datepicker3.css" rel="stylesheet">
<link href="../../css/styles.css" rel="stylesheet">
<link href="../../css/adminstyle.css" rel="stylesheet">
<link href='../../css/tombol.css' rel='stylesheet' type='text/css'>
<script src="../js/lumino.glyphs.js"></script>
<script src="../../js/jquery-2.2.3.min.js"></script>
<script src="../../js/formValidation.min.js"></script>
<script src="../../js/framework/bootstrap.min.js"></script>
<script src="../js/jquery-2.2.3.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/bootstrap-datepicker.js"></script>
<link href="../../css/tabelbaru2.css" rel="stylesheet">
<?php
//cek lanjutan dari menu sebelumnya apa sudah sesuai semuanya
session_start();
error_reporting(0);
include "../../lsp_koneksi.php";
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
 echo "<center><link href='css/adminstyle.css' rel='stylesheet' type='text/css'><strong> Anda Harus Login Dahulu ...!</strong><br>";
 echo "<a href=../../lsp_login.php class='btn btn-primary btn-sm' role='button'> Kembali</a></center>"; 
 //echo "sss";
}
else{
if(isset($_SESSION['username'])) { $uname=$_SESSION['username'];}


$resultabc="SELECT * FROM modul WHERE kd_modul ='".$_GET['kmd']."'";
//echo $resultabc;
$resultabcd=mysql_query($resultabc);

$cketemu = mysql_num_rows($resultabcd);
//echo "laklsakls".$ketemu;
if(!isset($_GET['test'])){
echo "<table class=demo-table><tr><th>Anda Belum Centang Kejujuran</th></tr><tr><th>
<input type=button onclick=window.history.back() value=Batalkan></th></tr></table> "; }
else {
if ($cketemu > 0){

echo "<center>";
//echo "<img src=../public/assets/img/logo4.png width='60%'>";
echo "<table class='demo-table' width=60%>";
?>
<form name=User> 
<tr><th colspan='3'> Klik lanjutkan atau Halaman ini akan di Lanjukan secara otomastis ...  </th></tr>
<tr><th colspan='3' align="center">
<INPUT style="font-size:2.5em;border:0px solid #ff0000" id=clock name=TimeLeft size='2'>
<INPUT name=TimeTaken type=hidden>
<INPUT name=Watch type=hidden></th></tr></table>
</form>
<?php
$xm='30';
$barisx=mysql_fetch_array($resultabcd);
$cekada  = mysql_query("SELECT * FROM pertanyaanbck WHERE nim='$uname' AND kd_modul='$_GET[kmd]'");
      $cekada1 = mysql_num_rows($cekada);
     //if ($cekada1> 0){
       $r="pagination.php"; //}
     //else{ $r="view_assesment.php";} 
       $ra="paginationlistening.php";
 
        $cekadalisten  = mysql_query("SELECT * FROM vlistening");
        $cekadalistena =mysql_fetch_array($cekadalisten);
        $cekadalistenb=$cekadalistena['vlistening'];
        if ($cekadalistenb=='y'){
 ?>     <form method="GET" action="<?php echo $ra ; ?>"> <?php } else { ?>
	<form id="ljt" name="ljt" method="GET" action="<?php echo $r ; ?>"> <?php } ?>
<?php
//$_SESSION['toker']=$_GET['token'];
//if(isset($_SESSION['toker'])) { $toker=$_SESSION['toker'];}

// muncul verifikasi soal sesuai tidak
//echo $uname;
echo "<center>";
//echo "<img src=../public/assets/img/logo4.png width='60%'>";
echo "<table class='demo-table' width=60%>";	
        echo "<tr><th colspan=3> TES ONLINE </th></tr>";
        echo "<tr><td> SOAL </td><td> : </td><td>" .$barisx[modul]. "</td></tr>";
        echo "<tr><td> Jumlah Soal  </td><td> : </td><td>" .$barisx[jumlah_soal]. "</td></tr>";
	echo "<tr><td> Waktu  </td><td> : </td><td>" .$barisx[Waktu]. " Menit </td></tr>"; 
        echo "<input name=md id=md type=hidden value='$_GET[kmd]'";
        //echo "<tr><td ><input name=tok id=tok type=text value=$toker></td></tr>";
        
        echo "<tr><td colspan=3> * Batalkan jika ada ketidak sesuaian </td></tr>";
        echo "<tr><td colspan=3><input id=gobutton type=submit value=Lanjutkan>"; ?>    
	<input id="gobutton" type="button" onclick="window.history.back()" value="Batalkan"></td></tr>
<?php
 } 
else {
echo "<tr><th> Kode tidak valid cek kembali !! Hubungi pengawas</th></tr><tr><th>
<input type=button onclick=window.history.back() value=Batalkan></th></tr></table> "; }
}}?>


<SCRIPT>
// =============================================================================
// =============================================================================
// The files is belong to InVirCom
// You can copy it or print it, but do not edit/delete 
// the messages and the copyright above and below this page
// Created by InVirCom (C) July 1998, Last edited May 2002 modify by aris3t in 2005
// banksoal@invir.com
// http://www.invir.com
// =============================================================================
// =============================================================================

var TimeOver = true
var n=<?=$xm ?>

function getJam(Tanggal)
{
   //Jam =  (Tanggal.getHours() < 10) ? "0"  + Tanggal.getHours()  + ":" : Tanggal.getHours() + ":"
   //Jam += (Tanggal.getMinutes() < 10) ? "0" + Tanggal.getMinutes() + ":" : Tanggal.getMinutes() + ":"
   Jam = (Tanggal.getSeconds() < 10) ? "0" + Tanggal.getSeconds() : Tanggal.getSeconds()
   return Jam
}

function dispJam()
{
   TglCur = new Date()
   document.User.Watch.value = getJam(TglCur)
   document.User.TimeTaken.value = getWaktu(TglCur,TglStart)
    
   if ((Tgl.getTime() - TglCur.getTime()) <= 0)
   {
      if(TimeOver) TimeOverWarn()
      document.User.TimeLeft.value = "Lanjutkan ...."
   }
   else
      document.User.TimeLeft.value = getWaktu(Tgl,TglCur)
   setTimeout("dispJam()",1000)
 
}

function getWaktu(Tgl,TglCur)
{
   TmLf = Tgl.getTime() - TglCur.getTime()
   TmLfHours = Math.floor(TmLf/3600000) 
   TmLfMinutes = Math.floor((TmLf%3600000)/60000)
   TmLfSeconds = Math.round((TmLf%60000)/1000)
   //TmLfStr = (TmLfHours < 10) ? "0" + TmLfHours + ":" : TmLfHours + ":"
   //TmLfStr += (TmLfMinutes < 10) ? "0" + TmLfMinutes + ":" : TmLfMinutes + ":"
   TmLfStr = (TmLfSeconds < 10) ? "0" + TmLfSeconds : TmLfSeconds
   return TmLfStr
}

function TimeOverWarn()
{
   
	  //alert("Waktu anda sudah habis"); 
	  document.ljt.submit()
	  TimeOver = true
	  return true
}

//=========================================//


Tanggal =  new Date()
Tgl = new Date()
TglStart = new Date()

ArrayBulan = new Array("Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember")
Tahun = (Tanggal.getYear()  <= 99) ? "19"  + Tanggal.getYear() : Tanggal.getYear()
TglStr = Tanggal.getDate()  + " " + ArrayBulan[Tanggal.getMonth()] + " " + Tahun

Tgl.setTime(Tgl.getTime() + n * 1 * 1000)  // n adalah menit asli 120 menit = 120 * 60 * 1000 jadi 1 menit

dispJam()

</SCRIPT>


