<!DOCTYPE html>
<?php
error_reporting(0);
//session_start();
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>LSP - Dashboard</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link href="css/adminstyle.css" rel="stylesheet">
<link href='../css/tombol.css' rel='stylesheet' type='text/css'>
<script src="js/lumino.glyphs.js"></script>

<script src="../js/jquery-2.2.3.min.js"></script>
<script src="../js/formValidation.min.js"></script>
<script src="../js/framework/bootstrap.min.js"></script>


<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-datepicker.js"></script>

<link href="../css/tabelbaru2.css" rel="stylesheet">

<?php
//session_set_cookie_params(3600*2,"/");
session_start();
include "../lsp_koneksi.php";
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
 echo "<center><link href='css/adminstyle.css' rel='stylesheet' type='text/css'>
 <strong> Anda Harus Login Dahulu ...!</strong><br>";
 echo "<a href=../lsp_login.php class='btn btn-primary btn-sm' role='button'> Kembali</a></center>"; 
}
else{
if ($_SESSION['level'] != 'lsp') {
echo "<center><link href='css/adminstyle.css' rel='stylesheet' type='text/css'>
 <strong> Anda Tidak Punya Hak ...!</strong><br>";
 echo "<a href=../lsp_login.php class='btn btn-primary btn-sm' role='button'> Kembali</a></center>"; 
} 
else 
{

?>

<style>
form div.dynamiclabel{ /* div container for each form field with pop up label */
  display: block;
  margin: 5px 2px 6px 15px;
  font: 16px;
  position: relative;
}

form div.formcolumn{ /* column div inside form */
width: 49%;
float: left;
}

form div.formcolumn:first-of-type{
margin-right: 1%; /* 2% margin after first column */
}

form div.dynamiclabel input[type="text"], form div.dynamiclabel textarea{
  width: 350px;
  font-size: 14px;
  padding: 7px;
  border: 1px solid #c3c3c3;
  border-radius: 7px;
  text-transform: uppercase
}

form div.dynamiclabel textarea{
	height: 150px;
}

form div.dynamiclabel select{
  width: 200px;
  font-size: 14px;
  padding: 7px;
  border: 1px solid #c3c3c3;
  border-radius: 7px;
  text-transform: uppercase
}

form div.buttons{
clear: both;
text-align: center;
}

form div input.button{
margin-top: 2EM;
width: 35%;
box-shadow: 0 0 10px gray;
text-transform: uppercase;
cursor: pointer;
min-width: 100px;
max-width: 600px;
color: white;
font-weight: bold;
letter-spacing: 10px;
text-shadow: 0 -2px 1px #8a8a8a;
background: rgb(169,3,41);
background: -moz-linear-gradient(top,  rgba(169,3,41,1) 0%, rgba(143,2,34,1) 44%, rgba(109,0,25,1) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(169,3,41,1)), color-stop(44%,rgba(143,2,34,1)), color-stop(100%,rgba(109,0,25,1)));
background: -webkit-linear-gradient(top,  rgba(169,3,41,1) 0%,rgba(143,2,34,1) 44%,rgba(109,0,25,1) 100%);
background: -o-linear-gradient(top,  rgba(169,3,41,1) 0%,rgba(143,2,34,1) 44%,rgba(109,0,25,1) 100%);
background: -ms-linear-gradient(top,  rgba(169,3,41,1) 0%,rgba(143,2,34,1) 44%,rgba(109,0,25,1) 100%);
background: linear-gradient(to bottom,  rgba(169,3,41,1) 0%,rgba(143,2,34,1) 44%,rgba(109,0,25,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a90329', endColorstr='#6d0019',GradientType=0 );
}

form div input.button:active{
text-shadow: 0 0 1px #8a8a8a;
background: rgb(109,0,25);
background: -moz-linear-gradient(top,  rgba(109,0,25,1) 0%, rgba(143,2,34,1) 56%, rgba(169,3,41,1) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(109,0,25,1)), color-stop(56%,rgba(143,2,34,1)), color-stop(100%,rgba(169,3,41,1)));
background: -webkit-linear-gradient(top,  rgba(109,0,25,1) 0%,rgba(143,2,34,1) 56%,rgba(169,3,41,1) 100%);
background: -o-linear-gradient(top,  rgba(109,0,25,1) 0%,rgba(143,2,34,1) 56%,rgba(169,3,41,1) 100%);
background: -ms-linear-gradient(top,  rgba(109,0,25,1) 0%,rgba(143,2,34,1) 56%,rgba(169,3,41,1) 100%);
background: linear-gradient(to bottom,  rgba(109,0,25,1) 0%,rgba(143,2,34,1) 56%,rgba(169,3,41,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#6d0019', endColorstr='#a90329',GradientType=0 );
}



form div.dynamiclabel label{ /* pop up label style */
  position: absolute;
  left: 0;
  background: lightyellow;
  border: 1px solid yellow;
  border-radius: 2px;
  padding: 3px 7px;
  box-shadow: 4px 1px 5px gray;
  font-weight: bold;
	-webkit-backface-visibility: hidden;
	top: 7px; /* initial top position of label relative to dynamiclabel container */
  -moz-transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  -webkit-transition: all 0.4s ease-in-out; /* Safari doesn't seem to support cubic-bezier values beyond 0 to 1, so use keyword value instead */
  -o-transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  opacity: 0;
  z-index: -1;
}


form div.dynamiclabel > *:focus{ /* when user focuses on child element inside div.dynamiclabel */
  border: 1px solid #45bcd2;
  box-shadow: 0 0 8px 2px #98d865;
}


form div.dynamiclabel > *:focus + label{ /* label style when user focuses on child element inside div.dynamiclabel */
  opacity: 1;
  z-index:100;
	top: -35px; /* Post top position of label on focus relative to dynamiclabel container */
	-ms-transform: rotate(-3deg);
	-moz-transform: rotate(-3deg);
	-webkit-transform: rotate(-3deg);
  transform: rotate(-3deg);
}


@media screen and (max-width: 480px){ /* responsive form settings, when window width is 480px or less */

	form div.dynamiclabel{
	font-size: 14px; /* decrease form font size */
	}

	form div.dynamiclabel .formcolumn{
	width: 100%;
	float: none;
	}
	
	form div.dynamiclabel .formcolumn:first-of-type{
	margin-right: 0; /* remove right margin from first form column */
	}

	form div.dynamiclabel .formcolumn:nth-of-type(2){
	padding-top: 2em; /* add padding to top of 2nd form column, so there is a gap between the 1st and 2nd column */
	}

	form div.dynamiclabel select{
	width: 98%;
	}

}


</style>

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
<?php if(isset($_SESSION['username'])) { $uname=$_SESSION['username'];}
$l="SELECT * FROM lsp_usertbl WHERE email='".$uname."'";
$resultx=mysql_query($l);
$hasilx=mysql_fetch_array($resultx);
$namax=$hasilx['nama']; 
?>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><img src="../images/logolsp.png" alt="" height="30"><span><?php echo " ".$namax ;?></a>
                                <a class="user-menu" href="#"><img src="../images/logobnsp.png" alt="" height="30"><span></a>
				
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<!--<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>-->
		<ul class="nav menu">
			<li><a href="inputskema.php"><svg class="glyph stroked paperclip"><use xlink:href="#stroked-paperclip"/></svg> Kelola Skema </a></li>
			<li ><a href="inputunit.php"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg> Kelola Unit</a></li>
			<li><a href="inputasesor.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Kelola Asesor</a></li>
			<li><a href="inputpeserta.php"><svg class="glyph stroked female user"><use xlink:href="#stroked-female-user"/></svg>Kelola Peserta</a></li>
			<li><a href="inputelemen.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"/></svg> Kelola Komptetensi</a></li>
			<li><a href="inputtempattuk.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg> Kelola Tempat TUK</a></li>
			<li><a href="inputsyarat.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg> Input Persyaratan</a></li>
			<li><a href="inputkumpan.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Input Umpan Balik</a></li>
			<li><a href="inputprosesasesmen.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Input Proses Asesmen</a></li>
			<li><a href="inputpengurus.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Input Pengurus</a></li>
			<li class="active" ><a href="mapa.php"><svg class="glyph stroked paperclip"><use xlink:href="#stroked-paperclip"/></svg> MAPA</a></li>
			<li><a href="settanggal.php"><svg class="glyph stroked clock"><use xlink:href="#stroked-clock"/></svg> SET Tanggal</a></li>
			<li><a href="pemetaanasesor.php"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"/></use></svg> Atur jadwal</a></li>
			<li><a href="inputpraktek.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>FR.IA.01 Ceklist Observasi</a></li>
			<li><a href="inputtestulis.php"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>FR.IA.05 Pertanyaan Tertulis</a></li>
			<!--<li><a href="inputfeed.php"><svg class="glyph stroked usb flash drive"><use xlink:href="#stroked-usb-flash-drive"/></svg> Feedback</a></li>-->
			<li><a href="validasiapl1lsp.php"><svg class="glyph stroked usb flash drive"><use xlink:href="#stroked-usb-flash-drive"/></svg> Validasi APL1</a></li>
			<li><a href="monitorasesi.php"><svg class="glyph stroked desktop computer and mobile"><use xlink:href="#stroked-desktop-computer-and-mobile"/></svg> Monitoring</a></li>
			<li><a href="backupdata.php"><svg class="glyph stroked download"><use xlink:href="#stroked-download"/></svg> Backup data</a></li>

			<li role="presentation" class="divider"></li>
			<li><a href="../logout.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Logout</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<div class=buttons><tr>MERENCANAKAN AKTIVITAS DAN PROSES ASESMEN</div>
                        
</div><!--/.row-->
		
		
				
		
		<div class="row">
			<div class="col-lg-12">

<?php
	$op = $_GET['op'];
 
	if ($op == "mapa")
	{
	?>
    <button type="button" class="btn btn-primary" onclick="window.print()">Print Halaman Ini</button>
    <?php
	  //echo "heee";
	  $xmmaskema= $_GET['mmanamaskema'];
	  $xmmakskema = $_GET['mmakodeskema'];
	  $xmmaids=$_GET['mmaidskema'];
	  echo "<form method=\"post\" action=\"".$_SERVER['PHP_SELF'].
        "?op=postmapa\">";
		
	echo "<input type=hidden name=vmmaids value='$xmmaids'>";	
	
	$xcariddtmma="select * from mma where idskemamma='$xmmaids'";
	$xexeccari=mysql_query($xcariddtmma);
	$xtemuddtmma=mysql_num_rows($xexeccari);
	$xarrmma=mysql_fetch_array($xexeccari);
	$xoreleva=$xarrmma['oreleva'];
	$xypenyusun=$xarrmma['penyusun'];
	$xyvalid=$xarrmma['valid'];
	//echo "valid".$xyvalid;
	if($xtemuddtmma>0)
	{
	$pecahkandidat =explode(",",$xarrmma['kandidat']);
    $vkandidat1=$pecahkandidat[0];
	$vkandidat2=$pecahkandidat[1];
	$vkandidat3=$pecahkandidat[2];
	if($vkandidat1=='on')
	{
		$kandidatck='checked';
	}
	else 
	{
	$kandidatck='';	
	}
	if($vkandidat2=='on')
	{
		$kandidatck2='checked';
	}
	else 
	{
	$kandidatck2='';	
	}
	if($vkandidat3=='on')
	{
		$kandidatck3='checked';
	}
	else 
	{
	$kandidatck3='';	
	}
	
	$pecahtujuan =explode(",",$xarrmma['tujuan']);
    $vtujuan1=$pecahtujuan[0];
	$vtujuan2=$pecahtujuan[1];
	$vtujuan3=$pecahtujuan[2];
	$vtujuan4=$pecahtujuan[3];
	$vtujuan5=$pecahtujuan[4];
	
	if($vtujuan1=='on')
	{
		$tujuanck='checked';
	}
	else 
	{
	$tujuanck='';	
	}
	if($vtujuan2=='on')
	{
		$tujuanck2='checked';
	}
	else 
	{
	$tujuanck2='';	
	}
	if($vtujuan3=='on')
	{
		$tujuanck3='checked';
	}
	else 
	{
	$tujuanck3='';	
	}
	if($vtujuan4=='on')
	{
		$tujuanck4='checked';
	}
	else 
	{
	$tujuanck4='';	
	}
	if($vtujuan5=='on')
	{
		$tujuanck5='checked';
	}
	else 
	{
	$tujuanck5='';	
	}
	
	$pecahlinkungan =explode(",",$xarrmma['linkungan']);
    $vlinkungan1=$pecahlinkungan[0];
	$vlinkungan2=$pecahlinkungan[1];
		
	if($vlinkungan1=='on')
	{
		$linkunganck='checked';
	}
	else 
	{
	$linkunganck='';	
	}
	if($vlinkungan2=='on')
	{
		$linkunganck2='checked';
	}
	else 
	{
	$linkunganck2='';	
	}
	$pecahpeluang =explode(",",$xarrmma['peluang']);
    $vpeluang1=$pecahpeluang[0];
	$vpeluang2=$pecahpeluang[1];
	
	
	if($vpeluang1=='on')
	{
		$peluangck='checked';
	}
	else 
	{
	$peluangck='';	
	}
	if($vpeluang2=='on')
	{
		$peluangck2='checked';
	}
	else 
	{
	$peluangck2='';	
	}
	$pecahhubungan =explode(",",$xarrmma['hubungan']);
    $vhubungan1=$pecahhubungan[0];
	$vhubungan2=$pecahhubungan[1];
	$vhubungan3=$pecahhubungan[2];
	
	
	if($vhubungan1=='on')
	{
		$hubunganck='checked';
	}
	else 
	{
	$hubunganck='';	
	}
	if($vhubungan2=='on')
	{
		$hubunganck2='checked';
	}
	else 
	{
	$hubunganck2='';	
	}
	if($vhubungan3=='on')
	{
		$hubunganck3='checked';
	}
	else 
	{
	$hubunganck3='';	
	}

	$pecahmelakukan =explode(",",$xarrmma['melakukan']);
    $vmelakukan1=$pecahmelakukan[0];
	$vmelakukan2=$pecahmelakukan[1];
	$vmelakukan3=$pecahmelakukan[2];
	
	
	if($vmelakukan1=='on')
	{
		$melakukanck='checked';
	}
	else 
	{
	$melakukanck='';	
	}
	if($vmelakukan2=='on')
	{
		$melakukanck2='checked';
	}
	else 
	{
	$melakukanck2='';	
	}
	if($vmelakukan3=='on')
	{
		$melakukanck3='checked';
	}
	else 
	{
	$melakukanck3='';	
	}
	
	$pecahkonfirmasi =explode(",",$xarrmma['konfirmasi']);
    $vkonfirmasi1=$pecahkonfirmasi[0];
	$vkonfirmasi2=$pecahkonfirmasi[1];
	$vkonfirmasi3=$pecahkonfirmasi[2];
	$vkonfirmasi4=$pecahkonfirmasi[3];
	$vkonfirmasi5=$pecahkonfirmasi[4];
	
	if($vkonfirmasi1=='on')
	{
		$konfirmasick='checked';
	}
	else 
	{
	$konfirmasick='';	
	}
	if($vkonfirmasi2=='on')
	{
		$konfirmasick2='checked';
	}
	else 
	{
	$konfirmasick2='';	
	}
	if($vkonfirmasi3=='on')
	{
		$konfirmasick3='checked';
	}
	else 
	{
	$konfirmasick3='';	
	}
	if($vkonfirmasi4=='on')
	{
		$konfirmasick4='checked';
	}
	else 
	{
	$konfirmasick4='';	
	}
	
	$pecahtolakukur =explode(",",$xarrmma['tolakukur']);
    $vtolakukur1=$pecahtolakukur[0];
	$vtolakukur2=$pecahtolakukur[1];
	$vtolakukur3=$pecahtolakukur[2];
	$vtolakukur4=$pecahtolakukur[3];
	$vtolakukur5=$pecahtolakukur[4];
	
	if($vtolakukur1=='on')
	{
		$tolakukurck='checked';
	}
	else 
	{
	$tolakukurck='';	
	}
	if($vtolakukur2=='on')
	{
		$tolakukurck2='checked';
	}
	else 
	{
	$tolakukurck2='';	
	}
	if($vtolakukur3=='on')
	{
		$tolakukurck3='checked';
	}
	else 
	{
	$tolakukurck3='';	
	}
	if($vtolakukur4=='on')
	{
		$tolakukurck4='checked';
	}
	else 
	{
	$tolakukurck4='';	
	}
	if($vtolakukur5=='on')
	{
		$tolakukurck5='checked';
	}
	else 
	{
	$tolakukurck5='';	
	}
	
	//echo "Ada ..";
	echo "<table width=95% class=demo-table>";
	echo "<tr><td colspan=8>Persetujuan Asesmen ini untuk menjamin bahwa Asesi telah diberi arahan secara rinci tentang perencanaan dan proses asesmen</td></tr>";
	echo "<tr><td rowspan=2 colspan=4>Skema Sertifikasi(KKNI/Okupasi/Klaster)</td><td><strong>Judul : $xmmaskema </strong></td></tr>";
	echo "<tr><td><strong>Nomor : $xmmakskema  </strong></td></tr>";
	echo "<tr><td colspan=6><strong>Menentukan Pendekatan Asesmen</strong></td></tr>";
	
	echo "<tr><td colspan=4><strong>Kandidat</strong></td><td><input type=checkbox name=roa1 $kandidatck>Hasil pelatihan dan / atau pendidikan:</br><input type=checkbox name=roa2 $kandidatck2>Pekerja berpengalaman </br><input type=checkbox name=roa3 $kandidatck3>Pelatihan / belajar mandiri</td></tr>";
	
	echo "<tr><td colspan=4><strong>Tujuan Asesmen</strong></td><td><input type=checkbox name=rob1 $tujuanck>Sertifikasi</br><input type=checkbox name=rob2 $tujuanck2>Sertifikasi </br><input type=checkbox name=rob3 $tujuanck3>Pengakuan Kompetensi Terkini (PKT)</br><input type=checkbox name=rob4 $tujuanck4>Rekognisi Pembelajaran Lampau</br><input type=checkbox name=rob5 $tujuanck5>Lainnya</br></td></tr>";
	
   $tglban=date("Y-m-d");
     
    echo "<tr><td colspan=4 rowspan=4><strong>Bukti yang di kumpulkan </strong></td><td><strong>Lingkungan <input type=checkbox name=roc1 $linkunganck > Tempat kerja nyata <input type=checkbox name=roc2 $linkunganck2> Tempat kerja simulasi</strong></td></tr>";
	
	echo "<tr><td><strong>Peluang untuk mengumpulkanbukti dalam sejumlah situasi</br><input type=checkbox name=rod1 $peluangck> Tersedia</br><input type=checkbox name=rod2 $peluangck2> Terbatas</strong></td></tr>";
	
	echo "<tr><td>Hubungan antara standar kompetensi dan: </br><strong><input type=checkbox name=roe1 $hubunganck> Bukti untuk mendukung asesmen / RPL </br><input type=checkbox name=roe2 $hubunganck2> Aktivitas kerja di tempat kerja Asesi: </br><input type=checkbox name=roe3 $hubunganck3> Kegiatan Pembelajaran:</br></strong></td></tr>";
	
	echo "<tr><td><strong>Siapa yang melakukan asesmen / RPL</br><input type=checkbox name=rof1 $melakukanck> Lembaga Sertifikasi</br><input type=checkbox name=rof2 $melakukanck2> Organisasi Pelatihan</br> <input type=checkbox name=rof3 $melakukanck3> Asesor Perusahaan</br></strong></td></tr>";
	
	echo "<tr><td colspan=4><strong>Konfirmasi dengan orang yang relevan</strong></td><td><input type=checkbox name=rog1 $konfirmasick>Manajer sertifikasi LSP</br><input type=checkbox name=rog2 $konfirmasick2>Master Asesor / Master Trainer / Asesor Utama Kompetensi </br><input type=checkbox name=rog3 $konfirmasick3>Manajer Pelatihan Lembaga Training terakreditasi / Lembaga Training terdaftar</br><input type=checkbox name=rog4 $konfirmasick4>Lainnya</br></td></tr>";

	echo "<tr><td colspan=4><strong>Tolok Ukur Asesmen</strong></td><td><input type=checkbox name=roh1 $tolakukurck>Standar Kompetensi:</br><input type=checkbox name=roh2 $tolakukurck2>Kriteria asesmen dari kurikulum pelatihan</br><input type=checkbox name=roh3 $tolakukurck3>Spesifikasi kinerja suatu perusahaan atau industri</br><input type=checkbox name=roh4 $tolakukurck4>Spesifikasi Produk:</br><input type=checkbox name=roh5 $tolakukurck5>Pedoman khusus:</br></td></tr>";

	echo"<tr><td colspan=6></td></tr>"; 
	echo"<tr><td colspan=6>Konfirmasi Orang yang relepan : </br><select name=orelepan id=orelepan>"; 
	$pengurus="select namapengurus,idpengurus from pengurus ";
	 $execpeng=mysql_query($pengurus);
	 while($rpeng=mysql_fetch_array($execpeng))
		 
		{
		if($xoreleva==$rpeng['idpengurus'])
	     {
   		 echo "<option value=$rpeng[idpengurus] selected>$rpeng[namapengurus] </option> ";
		 }
		 else 
		 {
		  echo "<option value=$rpeng[idpengurus]>$rpeng[namapengurus] </option> ";	 
		 }
		}
	echo "</select>";
	
	echo"<tr><td colspan=6></td></tr>"; 
	echo"<tr><td colspan=6>Penyusun dan Validator</br>Penyusun : <select name=openyusun id=openyusun>";
	$pengurus="select namapengurus,idpengurus from pengurus ";
	 $execpeng=mysql_query($pengurus);
	 while($rpeng=mysql_fetch_array($execpeng))
		{
         if($xypenyusun==$rpeng['idpengurus'])
	     {
   		 echo "<option value=$rpeng[idpengurus] selected>$rpeng[namapengurus] </option> ";
		 }
		 else 
		 {
		  echo "<option value=$rpeng[idpengurus]>$rpeng[namapengurus] </option> ";	 
		 }
		}
	echo "</select>";

	echo "</select></br>Validator : <select name=validr id=validr>";
	$pengurus="select namapengurus,idpengurus from pengurus ";
	 $execpeng=mysql_query($pengurus);
	 while($rpeng=mysql_fetch_array($execpeng))
		{
         if($xyvalid==$rpeng['idpengurus'])
	     {
   		 echo "<option value=$rpeng[idpengurus] selected>$rpeng[namapengurus]</option> ";
		 }
		 else 
		 {
		  echo "<option value=$rpeng[idpengurus]>$rpeng[namapengurus]</option> ";	 
		 }
		}
	echo "</select></td></tr>"; 
	

    //$exec=mysql_query($ssql);
     
	
	  echo "<input type=hidden name='n' value='3'>";
      echo "</td></tr>";
      echo "<tr><td colspan=7><input type=submit name=simpan id=gobutton value=Simpan></td></tr>";
	
	}		
	else 
    {		
	
	echo "<table width=95% class=demo-table>";
	echo "<tr><td colspan=8>Persetujuan Asesmen ini untuk menjamin bahwa Asesi telah diberi arahan secara rinci tentang perencanaan dan proses asesmen</td></tr>";
	echo "<tr><td rowspan=2 colspan=4>Skema Sertifikasi(KKNI/Okupasi/Klaster)</td><td><strong>Judul : $xmmaskema </strong></td></tr>";
	echo "<tr><td><strong>Nomor : $xmmakskema  </strong></td></tr>";
	echo "<tr><td colspan=6><strong>Menentukan Pendekatan Asesmen</strong></td></tr>";
	
	echo "<tr><td colspan=4><strong>Kandidat</strong></td><td><input type=checkbox name=roa1>Hasil pelatihan dan / atau pendidikan:</br><input type=checkbox name=roa2>Pekerja berpengalaman </br><input type=checkbox name=roa3>Pelatihan / belajar mandiri</td></tr>";
	
	echo "<tr><td colspan=4><strong>Tujuan Asesmen</strong></td><td><input type=checkbox name=rob1>Sertifikasi</br><input type=checkbox name=rob2>Sertifikasi </br><input type=checkbox name=rob3>Pengakuan Kompetensi Terkini (PKT)</br><input type=checkbox name=rob4>Rekognisi Pembelajaran Lampau</br><input type=checkbox name=rob5>Lainnya</br></td></tr>";
	
   $tglban=date("Y-m-d");
     
    echo "<tr><td colspan=4 rowspan=4><strong>Bukti yang di kumpulkan </strong></td><td><strong>Lingkungan <input type=checkbox name=roc1 > Tempat kerja nyata <input type=checkbox name=roc2> Tempat kerja simulasi</strong></td></tr>";
	
	echo "<tr><td><strong>Peluang untuk mengumpulkanbukti dalam sejumlah situasi</br><input type=checkbox name=rod1 > Tersedia</br><input type=checkbox name=rod2> Terbatas</strong></td></tr>";
	
	echo "<tr><td>Hubungan antara standar kompetensi dan: </br><strong><input type=checkbox name=roe1> Bukti untuk mendukung asesmen / RPL </br><input type=checkbox name=roe2> Aktivitas kerja di tempat kerja Asesi: </br><input type=checkbox name=roe3> Kegiatan Pembelajaran:</br></strong></td></tr>";
	
	echo "<tr><td><strong>Siapa yang melakukan asesmen / RPL</br><input type=checkbox name=rof1> Lembaga Sertifikasi</br><input type=checkbox name=rof2> Organisasi Pelatihan</br> <input type=checkbox name=rof3> Asesor Perusahaan</br></strong></td></tr>";
	
	echo "<tr><td colspan=4><strong>Konfirmasi dengan orang yang relevan</strong></td><td><input type=checkbox name=rog1 $ctkrhsaay>Manajer sertifikasi LSP</br><input type=checkbox name=rog2>Master Asesor / Master Trainer / Asesor Utama Kompetensi </br><input type=checkbox name=rog3>Manajer Pelatihan Lembaga Training terakreditasi / Lembaga Training terdaftar</br><input type=checkbox name=rog4>Lainnya</br></td></tr>";

	echo "<tr><td colspan=4><strong>Tolok Ukur Asesmen</strong></td><td><input type=checkbox name=roh1>Standar Kompetensi:</br><input type=checkbox name=roh2>Kriteria asesmen dari kurikulum pelatihan</br><input type=checkbox name=roh3>Spesifikasi kinerja suatu perusahaan atau industri</br><input type=checkbox name=roh4>Spesifikasi Produk:</br><input type=checkbox name=roh5>Pedoman khusus:</br></td></tr>";

	echo"<tr><td colspan=6></td></tr>"; 
	echo"<tr><td colspan=6>Konfirmasi Orang yang relepan : </br><select name=orelepan id=orelepan>"; 
	$pengurus="select namapengurus,idpengurus from pengurus ";
	 $execpeng=mysql_query($pengurus);
	 while($rpeng=mysql_fetch_array($execpeng))
		{
         //echo "ll";
   		 echo "<option value=$rpeng[idpengurus]>$rpeng[namapengurus] </option> ";
		}
	echo "</select>";
	
	echo"<tr><td colspan=6></td></tr>"; 
	echo"<tr><td colspan=6>Penyusun dan Validator</br>Penyusun : <select name=openyusun id=openyusun>";
	$pengurus="select namapengurus,idpengurus from pengurus ";
	 $execpeng=mysql_query($pengurus);
	 while($rpeng=mysql_fetch_array($execpeng))
		{
         //echo "ll";
   		 echo "<option value=$rpeng[idpengurus]>$rpeng[namapengurus] </option> ";
		}
	echo "</select>";

	echo "</select></br>Validator : <select name=validr id=validr>";
	$pengurus="select namapengurus,idpengurus from pengurus ";
	 $execpeng=mysql_query($pengurus);
	 while($rpeng=mysql_fetch_array($execpeng))
		{
         //echo "ll";
   		 echo "<option value=$rpeng[idpengurus]>$rpeng[namapengurus]</option> ";
		}
	echo "</select></td></tr>"; 
	

    //$exec=mysql_query($ssql);
     
	
	  echo "<input type=hidden name='n' value='3'>";
      echo "</td></tr>";
      echo "<tr><td colspan=7><input type=submit name=simpan id=gobutton value=Simpan></td></tr>";
	}
      echo "</table> </form>";
	  
	}
	
	else if ($op == "postmapa")
	{
 	//echo "heee";
	$ymmaids=$_POST['vmmaids'];
    $xrelepan=$_POST['orelepan'];
	$xpenyusun=$_POST['openyusun'];
	$xvalidr=$_POST['validr'];
	$xroa=$_POST['roa1'].",".$_POST['roa2'].",".$_POST['roa3'];
	$xrob=$_POST['rob1'].",".$_POST['rob2'].",".$_POST['rob3'].",".$_POST['rob4'].",".$_POST['rob5'];
	$xroc=$_POST['roc1'].",".$_POST['roc2'];
	$xrod=$_POST['rod1'].",".$_POST['rod2'];
	$xroe=$_POST['roe1'].",".$_POST['roe2'].",".$_POST['roe3'];
	$xrof=$_POST['rof1'].",".$_POST['rof2'].",".$_POST['rof3'];
	$xrog=$_POST['rog1'].",".$_POST['rog2'].",".$_POST['rog3'].",".$_POST['rog4'];
	$xroh=$_POST['roh1'].",".$_POST['roh2'].",".$_POST['roh3'].",".$_POST['roh4'].",".$_POST['roh5'];
	$cariddtmma="select * from mma where idskemamma='$ymmaids'";
	$execcari=mysql_query($cariddtmma);
	$temuddtmma=mysql_num_rows($execcari);
	if($temuddtmma>0)
	{
		//echo "sudah ada";
		$upmma="update mma set kandidat='$xroa',tujuan='$xrob',linkungan='$xroc',peluang='$xrod', hubungan='$xroe', melakukan='$xrof',konfirmasi='$xrog',tolakukur='$xroh',oreleva='$xrelepan',penyusun='$xpenyusun',valid='$xvalidr' where idskemamma='$ymmaids'";
		//echo $upmma;
		$execupmma=mysql_query($upmma);
			if ($execupmma)
	{
		echo "Update Sukses..";
	}
	else 
	{
		echo "Update Gagal...";
	}
	}
	else 
	{
    $insmma="INSERT INTO mma value('','$ymmaids','$xroa','$xrob','$xroc','$xrod','$xroe','$xrof','$xrog','$xroh','$xrelepan','$xpenyusun','$xvalidr')";
	//echo "kjakjsk".$insmma;
	$execinsmma=mysql_query($insmma);
	if ($execinsmma)
	{
		echo "Suksess..";
	}
	else 
	{
		echo "Gagal...";
	}
	}
	
	}
	
?>


<body>
</br>

	
	<table class=demo-table><thead>
	<tr>
    <th>No</th>	
    <th>ID SKEMA</th>
    <th bgcolor='#006699'>Kode Skema</th>
    <th bgcolor='#006699'>Nama Skema</th>
    <th bgcolor='#006699'>Action</th>
	</tr>
        </thead>
         
	<?php
 
// bagian ini digunakan untuk menampilkan semua data
 
	$no = 1;
	$querysskema ="SELECT * FROM skema";
	$hasilsskema = mysql_query($querysskema);
	while ($datasskema = mysql_fetch_array($hasilsskema))
	{
   		echo "<tr>";
		   echo "<td bgcolor='#99CCFF'>".$no."</td>";
		   echo "<td bgcolor='#99CCFF'>".$datasskema['idskema']."</td>";
		   echo "<td bgcolor='#99CCFF'>".$datasskema['kodeskema']."</td>";
   			echo "<td bgcolor='#99CCFF' align=left>".$datasskema['namaskema']."</td>";
   			echo "<td bgcolor='#99CCFF'><a href=\"".$_SERVER['PHP_SELF'].
        "?op=mapa&mmanamaskema=".$datasskema['namaskema']."&mmaidskema=".$datasskema['idskema']."&mmakodeskema=".$datasskema['kodeskema']."\"><span class='glyphicon glyphicon-pencil'>MAPA</a></td>";
   			echo "</tr>";
   		$no++;
	}
   	echo "</div>";
	?>

		<div>
		</div>
        </div>
         </div> 
			
</body>
</html>
<?php 
 }
 }?>
