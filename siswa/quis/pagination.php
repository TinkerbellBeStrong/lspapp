<link href='../../../css/tabel3.css' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="../../js/dropdowncontent.js"></script>
<script type="text/javascript" src="../../js/textsizer.js">


/***********************************************
* Document Text Sizer- Copyright 2003 - Taewook Kang.  All rights reserved.
* Coded by: Taewook Kang (http://www.txkang.com)
* This notice must stay intact for use
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript">
var tenth='';function ninth() {
if (document.all) {(tenth);alert("Tidak diperbolehkan Klik kanan"); return false;}}
function twelfth(e) {
if (document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {(tenth);return false;}}}
if (document.layers) {document.captureEvents(Event.MOUSEDOWN);document.onmousedown=twelfth;}
else{document.onmouseup=twelfth;document.oncontextmenu=ninth;}
document.oncontextmenu=new Function('alert("Tidak diperbolehkan Klik kanan"); return false')

//Cek tombol yang di pijit tidak diijinkan ALT / Windows/ TAB langsung logout
  document.onkeydown=function(e) {
    e=e||window.event;
    if (e.keyCode === 115 ) { 
      e.keyCode = 0;
      alert("Tombol ini tidak diijinkan F4");
      if(e.preventDefault)e.preventDefault();
      else e.returnValue = false;
      return false;
    }
    if(e.keyCode === 18) {
      e.keyCode = 0;
      logoutck()
      return false;}

	if(e.keyCode === 91) {
      e.keyCode = 0;
      logoutck()
      return false;} 

     if (e.keyCode === 9 ) {
      e.keyCode = 0;
      logoutck()
      return false;
    }
     if (e.keyCode === 32 ) {
      e.keyCode = 0;
      alert("Tombol ini tidak diijinkan 32");
      if(e.preventDefault)e.preventDefault();
      else e.returnValue = false;
      return false;
    }
 if (e.keyCode === 8 ) {
      e.keyCode = 0;
      alert("Tombol ini tidak diijinkan 8");
      if(e.preventDefault)e.preventDefault();
      else e.returnValue = false;
      return false;
    }
  }
function logoutck() {
       alert("Anda menekan tombol yang tidak diijinkan ... anda akan di keluarkan dari sistem");
       window.location.href = 'logoutck.php'
}

</script>
<style>

#clock {
/*	background-color:#000;
	border:#999 2px inset;
	padding:6px;
	color:#0FF;
	font-family: 'Orbitron', sans-serif;
    font-size:16px;
    font-weight:bold;
	letter-spacing: 2px;
	display:inline;
*/
padding:1px,1px,1px,1px;
font-weight:bold;
color:green;
background-color:#00CCCC;
/*letter-spacing: 1px;*/
border:solid 0px white;
font-size:25px;
font-family:"Arial Balck", Arial, serif;
}
</style>


<?php 
session_set_cookie_params(3600*2,"/");
session_start();
error_reporting(0);
include "../../lsp_koneksi.php";
//include("../connect.php");
//$a=$_GET[md];
//echo $a;
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
 echo "<center><link href='css/adminstyle.css' rel='stylesheet' type='text/css'><strong> Anda Harus Login Dahulu ...!</strong><br>";
 echo "<a href=../../lsp_login.php class='btn btn-primary btn-sm' role='button'> Kembali</a></center>"; 
}
else{
//if(isset($_SESSION['toker'])) { $toker=$_SESSION['toker'];}
//$toker= $_SESSION['toker'];
$user=$_SESSION['username'];

$waktuk=time();
//PERIKSA APAKAH USER UDAH UJIAN ATAU BELUM
$periksa=mysql_query("SELECT nim,kodemodul FROM gradealias WHERE nim='$user' AND kodemodul ='$_GET[md]'");
//echo $periksa;
$periksa3=mysql_num_rows($periksa);
	$result=mysql_query("SELECT * FROM modul WHERE kd_modul='$_GET[md]'");
  	$baris=mysql_fetch_array($result);
        $batas=$baris['batas'];
        //$tok=$baris['token'];
//if ($tok==$toker){
if($periksa3 >=$batas){ //ganti angka satu jika variabel cekmodul, cekmodul1 dan variabel batas diaktifkan
echo"<center><table><tr><th><H4> Batas ujian soal ini adalah  ' $batas ' kali,  Anda telah mengikuti ujian pada modul ini ' $periksa3 'kali .. Silahkan tutup jendela ini</H4></th></tr>
</table></center>";
?>
<center>
</center>
<?php }else{ 
$insertSQL="insert into statuskerja (nim, statusk,waktu) values ('$user','Y',$waktuk)";
//echo $insertSQL;
mysql_query($insertSQL);
?>

<?php
session_set_cookie_params(3600*2,"/");
session_start();
error_reporting(0);
//include('../connect.php');
$per_page = 1; 

//getting number of rows and calculating no of pages
$sql = "select * from pertanyaan where kd_modul='$_GET[md]'";
//echo $sql;
$rsd = mysql_query($sql);
$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page)


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>....</title>
	
	<script type="text/javascript" src="../public/assets/js/jquery.min.js"></script>
	<script id="source" language="javascript" type="text/javascript">
	
	$(document).ready(function(){
		
	//Display Loading Image
	function Display_Load()
	{
	    $("#loading").fadeIn(900,0);
		$("#loading").html("<img src='loading1.gif' height='20%'/>");
	}
	//Hide Loading Image
	function Hide_Load()
	{
		$("#loading").fadeOut('slow');
	};
	

   //Default Starting Page Results
   
	//$("#pagination li:first").css({'color' : '#FF0084'}).css({'border' : 'solid #dddddd 1px'}).css({'background-color' : 'yellow'});
	
	Display_Load();
	
	$("#content").load("pagination_data.php?page=1", Hide_Load());



	//Pagination Click
	$("#pagination li").click(function(){
			
		Display_Load();
		
		//Loading Data
		var pageNum = this.id;
		var mmenit=document.User.TimeLeft.value;
                var vwreal=document.User.Watch.value;
		var vkdmdl=document.p1.kmdl.value;
		var vnim=document.p1.nim.value;
                $.post('updatewaktu.php',{vmenit: mmenit, kodemd: vkdmdl, usern: vnim, wreal:vwreal  });
			
			 $.ajax({ 
			      type: 'post',	                                    
			      url: 'api.php',                         
			      data: {vkdm:vkdmdl,vnis:vnim,vno:pageNum,},                       
			      dataType: 'json',                    
			      success: function(data)          
			      {
				var vnomor = data[8];        
				var vkdmodul = data[1];              
				var vnjawab = data[4];           
				var vnis = data[5]; 
				 //alert(vnjawab); 
					if (vnjawab=!''){
						document.getElementById(vnomor).style.backgroundColor = "green";
						//document.getElementById(vnomor).style.fontSize="1.2em";
						document.getElementById(vnomor).style.color="white";}
					//document.getElementById(vnomor).style.backgroundColor = "yellow";
					//document.getElementById(vnomor).style.color="black";}
                                        //else {document.getElementById(vnomor).style.backgroundColor = "green";}
					//if(vnjawab == 'A' ){
					//CSS Styles
					//$("#pagination li")
					 
					//.css({'border' : 'solid white 1px'})
					//.css({'color' : 'black'})
					//.css({'background-color' : 'red'})
					//}
					//else {
					//$("#pagination li")
					 
					//.css({'border' : 'solid white 1px'})
					//.css({'color' : 'black'})
					//.css({'background-color' : 'yellow'})
					//}
					//$(this)
					//.css({'color' : 'blue'})
					//.css({'border' : 'solid #FF0084 1px'})
					//.css({'background-color' : 'yellow'});}

					       
			      } 
			    });
		
				
                $("#content").load("pagination_data.php?page=" + pageNum, Hide_Load());
		
	});
	
	
});

	</script>


<style>
body { margin: 0; padding: 0; font-family:Verdana; font-size:13px }

a
{
text-decoration:none;
color:#B2b2b2;

}

a:hover
{

color:#DF3D82;
text-decoration:underline;

}
#loading { 
width: 100%; 
position: absolute;
}

#pagination
{
padding:1px;
text-align:left;
/*margin-left:1px;*/

}
li{	
background-color:yellow;
list-style: none; 
float: left;
width:17px;
font-size:17px;
text-align:center;
/*margin-right: 16px; */
padding:8px;
border:solid 1px white;
color:black; 
}
li:hover
{ 
color:red; 
cursor: pointer; 
}


h1 {font-size:180%;}
h2 {font-size:150%;}
h3 {font-size:125%;}
h4 {font-size:100%;}
h5 {font-size:90%;}
h6 {font-size:80%;}



</style>


</head>

<body>

<center>
<!--<img src=../public/assets/img/logo4.png width="60%">-->
<?php 
//echo "mm".$baris[kd_modul];
$_SESSION['kd_modul']=$baris[kd_modul] ?>
<table><tr ><!--<th>SOAL <?php echo $baris[modul];?></th>--> 
<?php echo "<td rowspan=2 align=right>&nbsp&nbsp </td></tr><tr><td></td><td align=left rowspan=2>$_SESSION[nama_lengkap] </td><td>&nbsp&nbsp</td>"?>
<!--<?php echo "<th> NIS : "; if(isset($_SESSION['username'])) { echo trim($_SESSION['username']);} ?>-->

<form name=User> 
<th> Waktu Sisa : </th>
<th>
<INPUT id=clock name=TimeLeft size=8></font> 
<INPUT name=TimeTaken type=hidden>
<INPUT name=Watch type=hidden></th>
<td align="left">&nbsp&nbsp<a href="javascript:ts('body',1)"><strong>+A</a> || <a
href="javascript:ts('body',-1)">-A</strong></a>&nbsp&nbsp</td></tr></table><table width=90%>

<?php
$sqlvste="Select * from vsessay";
//echo "$sqlvste";
$execsqlvste=mysql_query($sqlvste); 
$cekvste = mysql_fetch_array($execsqlvste);
if ($cekvste["stsessay"]=='y'){
  echo "<tr>";
$sqlessay="Select * from soalessay where kodesoal='$_GET[md]'";
$execsqlessay=mysql_query($sqlessay);
//echo $sqlessay;
$cekessay = mysql_num_rows($execsqlessay);
if ($cekessay>0){
    echo "<tr><th><center><font color=blue><strong> SOAL ESSAY </center></strong></font></th></tr><tr><td>";
    $g=1;
    while ($rowessay=mysql_fetch_array($execsqlessay)) {
    $listessay=$rowessay['soalessay'];
      if($g%2 !== 0 ){
    echo "&nbsp&nbsp&nbsp&nbsp". $g.". ".$listessay."</br>";
       } else {
        echo "<strong>  &nbsp&nbsp&nbsp&nbsp". $g.". ".$listessay."</strong></br>";}

     $g++; 
    }

 }
}
?>
</td></tr>
</table>
</table></center>
</FORM>
<form id="p1" name="p1" action="proses_assesmentbaruabcd.php" method="post" onSubmit="return confirm('Apakah yakin sudah selesai ??')">
<?php


  	$result=mysql_query("SELECT * FROM modul WHERE kd_modul='$_GET[md]'");
    $result;
  	$baris=mysql_fetch_array($result);
        $vmenit=$baris["Waktu"];
        $vacaksoal=$baris["acak"];
        $kmodul=$baris["kd_modul"];
        $nmodul=$baris["modul"];
        //$unitalias=$baris["unitalias"];
  	?>

<?php if(isset($_SESSION['username'])) { $su=$_SESSION['username'];} ?> 
<input type="hidden" name="nim" value="
<?php if(isset($_SESSION['username'])) { echo $_SESSION['username'];} ?>">
<input type="hidden" name="nama" value="
<?php if(isset($_SESSION['nama_lengkap'])) { echo $_SESSION['nama_lengkap'];} ?>">
<input type="hidden" name="kmdl" value="
<?php if(isset($_SESSION['kd_modul'])) { echo $_SESSION['kd_modul'];} ?>">
<input type="hidden" name="kelas" value="
<?php if(isset($_SESSION['kelas'])) { echo $_SESSION['kelas'];} ?>">
<?php 
$periksa4=$periksa3+1;?>
<input type="hidden" name="kounter" value="<?php echo $periksa4 ; ?>">
<center>
<table>
<?php echo "<tr><td>Kode Soal : <strong>$kmodul</td><td>*_* Nama Mapel : <strong>$nmodul</strong></td></tr>"; ?>
</table>
</center>
<?php 
$cekada  = ("SELECT * FROM pertanyaanbck WHERE nim='$su' AND kd_modul='$_GET[md]'");
      $cekada0=mysql_query($cekada);
      $cekada1 = mysql_num_rows($cekada0);
      //echo $cekada1; 
     if ($cekada1 < 1  ){
     $del = mysql_query("DELETE FROM pertanyaanbck where kd_modul='$_GET[md]' AND nim='$su'"); 
     $acak = array();
     $no=1;
     //echo "tah acak ".$vacaksoal;
     if($vacaksoal=='1'){
      while (($row=mysql_fetch_array($rsd))) {
        array_push($acak, $row);
        }
        shuffle($acak);
        foreach( $acak as $row ) {
        //echo "akjsakjkas";
  	$id = $row["question_id"]; 
	$kd_modul=$row["kd_modul"];
	$question = $row["question"]; 
	$alt_5=$row["oa"];
	$unitalias=$row["unitalias"];
      //  echo "aaaaaa";
	//$alt_1=$row["alt_1"];
	//$alt_2=$row["alt_2"];
	//$alt_3=$row["alt_3"];
	//$alt_4=$row["alt_4"];
        //srand ((float)microtime()*1000000);
//$tambahkan = mysql_query ("INSERT INTO pertanyaanbck (question_id,kd_modul,question,answer,alt_1,alt_2,alt_3,alt_4,nim,menit) VALUES ($id,'$kd_modul','$question','$alt_5','$alt_1','$alt_2','$alt_3','$alt_4','$su','$vmenit')");
$tambahkan = ("INSERT INTO pertanyaanbck (question_id,kd_modul,question,answer,njawab,nim,menit,nourut,unitalias) VALUES ($id,'$kd_modul','$question','$alt_5','','$su','$vmenit','$no','$unitalias')");
 $tambahkana=mysql_query($tambahkan);
 //echo $tambahkan; 
 $no++;
        } 
       //echo "gghghgh";
      }
      else 
      {
	while (($row=mysql_fetch_array($rsd))) {
        //array_push($acak, $row);
        //}
        //shuffle($acak);
        //foreach( $acak as $row ) {
        
  	$id = $row["question_id"]; 
	$kd_modul=$row["kd_modul"];
	$question = $row["question"]; 
	$alt_5=$row["oa"];
	//echo "tttttttttt";
        
	//$alt_1=$row["alt_1"];
	//$alt_2=$row["alt_2"];
	//$alt_3=$row["alt_3"];
	//$alt_4=$row["alt_4"];
        //srand ((float)microtime()*1000000);
//$tambahkan = mysql_query ("INSERT INTO pertanyaanbck (question_id,kd_modul,question,answer,alt_1,alt_2,alt_3,alt_4,nim,menit) VALUES ($id,'$kd_modul','$question','$alt_5','$alt_1','$alt_2','$alt_3','$alt_4','$su','$vmenit')");
$tambahkan = mysql_query ("INSERT INTO pertanyaanbck (question_id,kd_modul,question,answer,njawab,nim,menit,nourut) VALUES ($id,'$kd_modul','$question','$alt_5','','$su','$vmenit','$no')");
 $no++;
       }
      }
     } ?>

<?php $resulta="SELECT * FROM pertanyaanbck WHERE nim='$su' AND kd_modul='$_GET[md]'";
       
  	$aa=mysql_query($resulta);
        //$a=mysql_fetch_array($aa);
        //$amenit=$a["menit"];
        $kdmm=$a['question_id'];
	//echo $amenit;
?>
        

	<div align="center">				
<table width="95%">
<th>
			<ul id="pagination">
				<?php
				//Show page links
				//for($i=1; $i<=$pages; $i++)
				//{      
									       	
				//	echo '<li id="'.$i.'">'.$i.'</li>';
				//}
					$i=1;
				   while ($a=mysql_fetch_array($aa))
					{
                                        //echo $a["question"];
					$amenit=$a["menit"];
					$abcjawab=$a["njawab"];
					if (!empty($abcjawab))
                                             { 
						echo '<li id="'.$i.'" style=background-color:green; ><font color=white>'.$i.'</li></font>';}
					    else {echo '<li id="'.$i.'">'.$i.'</li>';  }
						
						$i++;					
					}

				?>
        
	</ul>	</th></table>
		
        <div id="loading" ></div>
	<div id="content" ></div>



</form>
</body>
</html>
<?php } 
//} else { 
//echo "<link href='css/adminstyle.css' rel='stylesheet' type='text/css'>
// <center>Validasi token gagal <br>";
 // echo "<a href=../index.php><b>Logout</b></a></center>";}
  
}?>
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
var n=<?=$amenit ?>
//var n=30;
function getJam(Tanggal)
{
   Jam =  (Tanggal.getHours() < 10) ? "0"  + Tanggal.getHours()  + ":" : Tanggal.getHours() + ":"
   Jam += (Tanggal.getMinutes() < 10) ? "0" + Tanggal.getMinutes() + ":" : Tanggal.getMinutes() + ":"
   Jam += (Tanggal.getSeconds() < 10) ? "0" + Tanggal.getSeconds() : Tanggal.getSeconds()
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
      document.User.TimeLeft.value = "Habis"
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
   TmLfStr = (TmLfHours < 10) ? "0" + TmLfHours + ":" : TmLfHours + ":"
   TmLfStr += (TmLfMinutes < 10) ? "0" + TmLfMinutes + ":" : TmLfMinutes + ":"
   TmLfStr += (TmLfSeconds < 10) ? "0" + TmLfSeconds : TmLfSeconds
   return TmLfStr
}

function TimeOverWarn()
{
   
	  alert("Waktu anda sudah habis"); 
	  document.p1.submit()
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

Tgl.setTime(Tgl.getTime() + n * 60 * 1000)  // n adalah menit asli 120 menit = 120 * 60 * 1000 jadi 1 menit

dispJam()

</SCRIPT>

