<!DOCTYPE html>
<?php
error_reporting(0);
session_start();
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>LSP - Dashboard</title>
<link href="../lummenu/css/bootstrap.min.css" rel="stylesheet">
<link href="../lummenu/css/datepicker3.css" rel="stylesheet">
<link href="../lummenu/css/styles.css" rel="stylesheet">
<link href="../lummenu/css/adminstyle.css" rel="stylesheet">
<link href='../css/tombol.css' rel='stylesheet' type='text/css'>
<link href="../css/tabelbaru2.css" rel="stylesheet">
<script src="../js/jquery.min.js"></script>
<script src="../lummenu/js/lumino.glyphs.js"></script>
<script src="../js/formValidation.min.js"></script>
<script src="../js/framework/bootstrap.min.js"></script>
<script src="../lummenu/js/jquery-2.2.3.min.js"></script>
<script src="../lummenu/js/bootstrap.js"></script>
<script src="../lummenu/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);
</script>
<style>
	.alert {
		 width:50%;    
		}
</style>
<?php
//error_reporting(0);
//session_set_cookie_params(3600*2,"/");
//session_start();
include "../lsp_koneksi.php";
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
 echo "<center><link href='css/adminstyle.css' rel='stylesheet' type='text/css'>
 <strong> Anda Harus Login Dahulu ...!</strong><br>";
 echo "<a href=../lsp_login.php class='btn btn-primary btn-sm' role='button'> Kembali</a></center>"; 
}
else{
//session_start();
if(isset($_SESSION['username'])) { $unamerahasia=$_SESSION['username'];}
else { $unamerahasia=$_SESSION['username'];}
$lrahasia="SELECT * FROM lsp_usertbl WHERE email='".$unamerahasia."'";
$resultrahasia=mysql_query($lrahasia);
$hasilrahasia=mysql_fetch_array($resultrahasia);
$namarahasia=$hasilrahasia['nama'];
$idrahasia=$hasilrahasia['id_user'];
$linkttdrhs=$hasilrahasia['linkttd'];

//$tglregapl2a=$hasilx 	
	

//else 
//{


?>
<script type="text/javascript">
$(document).ready (function() {
	$('#formContoh').formValidation({
		framework: 'bootstrap',
		excluded: 'disabled',

		icon: {
			valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			namaasesor: {
				validators: {
					notEmpty: {
						message: 'Username Tidak Boleh Kosong'
					}
				}
			},
			
			nama: {
				validators: {
					notEmpty: {
						message: 'Nama Tidak Boleh Kosong'
					}
				}
			},

			notelp: {
				validators: {
					notEmpty: {
						message: 'Tidak Boleh Kosong'
					}
				}
			},
			password: {
				validators: {
					notEmpty: {
						message: 'Tidak Boleh Kosong'
					},
					identical: {
						field: 'repassword',
						message: 'Password Tidak sama'
					}					
				}
			},
                        repassword: {
				validators: {
					notEmpty: {
						message: 'Confirm Password Tidak Sama'
					},
					identical: {
						field: 'password',
						message: 'Password Tidak sama'
					},
                                        stringlenght:{
					max :6,
                                        message: 'Minimal 6'
					}	  
				
				}
			},
			emailuser: {
				validators: {
					notEmpty: {
						message: 'Email Tidak Boleh Kosong'
					},
					emailAddress: {
						message: 'Email Tidak Valid'
					}
				}
			}
		}
	})
});
</script>

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
<?php /*if(isset($_SESSION['username'])) { $uname=$_SESSION['username'];}
$l="SELECT * FROM lsp_usertbl WHERE email='".$uname."'";
$resultx=mysql_query($l);
$hasilx=mysql_fetch_array($resultx);
$namax=$hasilx['nama']; 
$idasesor=$hasilx['id_user'];
*/
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
			<li><a href="pilihskema.php"><svg class="glyph stroked paperclip"><use xlink:href="#stroked-paperclip"/></svg>Pilih SKema</a></li>
			<li><a href="pilihunit.php"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg>Pilih Unit</a></li>
			<li><a href="dashsiswa.php"><svg class="glyph stroked tag"><use xlink:href="#stroked-tag"/></svg>FR.APL. 1</a></li>
			
			<li><a href="apl2.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg></svg>FR.APL. 2</a></li>
			<li><a href="portofolio.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Portofolio</a></li>
			<li><a href="testulis.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>FR.IA.05 Pertanyaan Tertulis</a></li>
			<li><a href="mak5.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>FR.AK.03</a></li>
			<!--<li><a href="feedtes.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"/></svg>FeedBack</a></li>-->
			<li><a href="statussaya.php"><svg class="glyph stroked map"><use xlink:href="#stroked-map"/></svg>Cek Status</a></li>
			<li><a href="banding.php"><svg class="glyph stroked map"><use xlink:href="#stroked-map"/></svg>FR.AK.04 Banding</a></li>
			<li class="active"><a href="rahasia.php"><svg class="glyph stroked map"><use xlink:href="#stroked-map"/></svg>FR.AK.01 Kerahsiaan</a></li>
			<li><a href="ubahpassword.php"><svg class="glyph stroked key "><use xlink:href="#stroked-key"/></svg>Ubah Password</a></li>
			
			<li role="presentation" class="divider"></li>		
			<li><a href="../logout.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg> Logout</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<h4>PERSETUJUAN ASESMEN DAN KERAHASIAAN</h4>
                        
</div><!--/.row-->
		
		<!--/.row-->
			
		<div class="row">
			<div class="col-lg-12">
<!--data nu baru -->

<?php
$op = $_GET['op'];

if ($op == "rahasiafrm")
{
	?>
    <button type="button" class="btn btn-primary" onclick="window.print()">Print Halaman Ini</button>
    <?php
	$namaasesibrhs = $_GET['namaase'];
	$idasesibrhs= $_GET['iduser'];
	$idasesorbrhs= $_GET['idasesor'];
	$namaasesorbrhs= $_GET['namaaseso'];
	$tglasesmenbrhs = $_GET['tglasemen'];
	$idskemabrhs = $_GET['idskema'];
	$linkttdbbrhs=$_GET['linkttd'];
	$linkttdbbrhs="../imgttd/".$linkttdbbrhs;
	//$tglasesmenb=
	//echo "slksld".$linkttdbb;
    $sqlttdasesor="SELECT * FROM lsp_usertbl WHERE id_user='".$idasesorbrhs."'";
	$resultttdasesor=mysql_query( $sqlttdasesor);
	$hasilttdasesor=mysql_fetch_array($resultttdasesor);
	$linkttdasesor=$hasilttdasesor['linkttd'];
    $linkttdasesor="../imgttd/".$linkttdasesor;
	//echo $sqlttdasesor;
	
	$sqlskemarhs="select * from skema where idskema='$idskemabrhs'";
	$execskemarhs=mysql_query($sqlskemarhs);
	$listskemarhs = mysql_fetch_array($execskemarhs);
	$namaskemarhs=$listskemarhs['namaskema'];
	$kodeskemarhs=$listskemarhs['kodeskema'];
	
	 $ssqlrhscekd="select * from rahasia where idskemarhs='".$idskemabrhs."' and idasesorrhs='".$idasesorbrhs."' and idasesirhs='".$idasesibrhs."'";
	 
	  //  echo "klkdlskd".$ssqlrhscekd."</br>";
        $adarhscek=mysql_query($ssqlrhscekd);
        $rowrhscek=mysql_num_rows($adarhscek);
         //echo "hh".$adak; 
		if($rowrhscek>0){
		//	echo "ada";
		$adadataarrhs=mysql_fetch_array($adarhscek);
		$adabuktibrhs=$adadataarrhs['buktirhs'];
		$adatukrhs=$adadataarrhs['tukrhs'];
		$adatglbrhs=$adadataarrhs['tglrhs'];
		$adawakturhs=$adadataarrhs['wakturhs'];
		$adatukb=$adadataarrhs['tukb'];
		$adatgltetap=$adadataarrhs['tgltetap'];
		//echo "lklaksa". $adaketb;
		$pecahbuktibrhs=explode(",",$adabuktibrhs);
		$bukrhsa=$pecahbuktibrhs[0];
		$bukrhsb=$pecahbuktibrhs[1];
		$bukrhsc=$pecahbuktibrhs[2];
		$bukrhsd=$pecahbuktibrhs[3];
		$bukrhse=$pecahbuktibrhs[4];
		$pecahtukrhs=explode(",",$adatukrhs);
		$tkrhsa=$pecahtukrhs[0];
		$tkrhsb=$pecahtukrhs[1];
		$tkrhsc=$pecahtukrhs[2];
		//$adaalasan=$adadataarr['alasan'];
		 if($tkrhsa=='on'){
          $ctkrhsaay="checked";}
         else {
          $ctkrhsaay=" ";}
		  if($tkrhsb=='on'){
          $ctkrhsaby="checked";}
         else {
          $ctkrhsaby=" ";}
		 if($tkrhsc=='on'){
          $ctkrhsacy="checked";}
         else {
          $ctkrhsacy=" ";} 
		  
		 if($bukrhsa=='on'){
          $cbukrhsay="checked";}
         else {
          $cbukrhsay=" ";}	
		 if($bukrhsb=='on'){
          $cbukrhsby="checked";}
         else {
          $cbukrhsby=" ";}	
		 if($bukrhsc=='on'){
          $cbukrhscy="checked";}
         else {
          $cbukrhscy=" ";}	
		  if($bukrhsd=='on'){
          $cbukrhsdy="checked";}
         else {
          $cbukrhsdy=" ";}	
		  if($bukrhse=='on'){
          $cbukrhsey="checked";}
         else {
          $cbukrhsey=" ";}	
		 
    ?>
	<form id="rhs" name="rhs" method="POST" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=postrhs\"";?>>
	<?php
	
	echo "<input type=hidden name=idasesorrhs value='$idasesorbrhs'>";
	echo "<input type=hidden name=idadsesirhs value='$idasesibrhs'>";
	echo "<input type=hidden name=idskemarhs value='$idskemabrhs'>";
	//echo "<input type=text name=tglrhs value='$tgl'>";
	
	echo "<table width=95% class=demo-table>";
	echo "<tr><td colspan=8>Persetujuan Asesmen ini untuk menjamin bahwa Asesi telah diberi arahan secara rinci tentang perencanaan dan proses asesmen</td></tr>";
	echo "<tr><td rowspan=2 colspan=4>Skema Sertifikasi(KKNI/Okupasi/Klaster)</td><td><strong>Judul : $namaskemarhs </strong></td></tr>";
	echo "<tr><td><strong>Nomor : $kodeskemarhs  </strong></td></tr>";
	echo "<tr><td colspan=4><strong>TUK</strong></td><td><input type=checkbox name=sw $ctkrhsaay>Sewaktu <input type=checkbox name=tk $ctkrhsaby>Tempat Kerja <input type=checkbox name=md $ctkrhsacy>Mandiri</td></tr>";
	echo "<tr><td bgcolor='#99CCFF' colspan=4><strong>Nama Asesi</td><td>$namaasesibrhs</td></tr>";
	echo "<tr><td bgcolor='#99CCFF' colspan=4>Nama Asesor </td><td>$namaasesorbrhs</strong></td></tr>";
	//$o=0; Tanggal Asesment : $tglasesmenb
	//$p=1;
	//$q=2;
   $tglban=date("Y-m-d");
   
	//$listunit = mysql_fetch_array($execunit);
    
    //$ssql="select * from praktek where idskema='$idskema' and kodeunit='".$listunit['kodeunit']."'";    
    echo "<tr><td colspan=4 rowspan=5><strong>Bukti yang di kumpulkan </strong></td><td><strong><input type=checkbox name=porto $cbukrhsay> TL : Verifikasi Portofolio</strong></td></tr>";
	echo "<tr><td><strong><input type=checkbox name=ttulis $cbukrhsby > T: Hasil Tes Tulis</strong></td></tr>";
	echo "<tr><td><strong><input type=checkbox name=tlisan $cbukrhscy> T: Hasil Tes Lisan</strong></td></tr>";
	echo "<tr><td><strong><input type=checkbox name=wawancara $cbukrhsdy> T: Hasil Wawancara</strong></td></tr>";
	echo "<tr><td><strong><input type=checkbox name=obser $cbukrhsey> L : Observasi Langsung</strong></td></tr>";
	echo "<tr><td colspan=4 rowspan=3><strong>Pelaksanaan asesmen disepakati
pada</strong></td><td>Hari/Tanggal : <strong><input type=text name=hari size=40 value='$adatglbrhs'></td></tr>";
	echo "<tr><td>Waktu : <strong><input type=text name=waktu size=40 value='$adawakturhs'></td></tr>";
	echo "<tr><td>TUK : <strong><input type=text name=tuk size=40 value='$adatukb'></td></tr>";
	echo "<tr><td colspan=8><strong>Asesi : </br>Bahwa Saya Sudah Mendapatkan Penjelasan Hak dan Prosedur Banding Oleh Asesor.</strong></td></tr>";
	echo "<tr><td colspan=8><strong>Asesor : </br>Menyatakan tidak akan membuka hasil pekerjaan yang saya peroleh karena penugasan saya sebagai Asesor dalam pekerjaan Asesmen kepada siapapun atau organisasi apapun selain kepada pihak yang berwenang sehubungan dengan kewajiban saya sebagai Asesor yang ditugaskan oleh LSP.</strong></td></tr>";
	echo "<tr><td colspan=8><strong>Asesi : </br>Saya setuju mengikuti asesmen dengan pemahaman bahwa informasi yang dikumpulkan hanya digunakan untuk pengembangan profesional dan hanya dapat diakses oleh orang tertentu saja.</strong></td></tr>";
	echo "<tr><td colspan=3>Tanda tangan Asesor </br><img src='$linkttdasesor' </td><td colspan=2>     Tanggal : <input type=text name=tglban value='$adatgltetap'></strong></td></tr>";
	echo "<tr><td colspan=3>Tanda tangan Asesi</br><img src='$linkttdbbrhs' </td><td colspan=2>     Tanggal : <input type=text name=tglrhs value='$adatgltetap'></strong></td></tr>";
    //$exec=mysql_query($ssql);
     
      echo "<tr><td>";
	  echo "<input type=hidden name='n' value='3'>";
      echo "</td></tr>";
      echo "<tr><td colspan=7><input type=submit name=simpan id=gobutton value=Simpan></td></tr>";
      echo "</table>";
		
		
 		}	
		else {
	?>
	<form id="rhs" name="rhs" method="POST" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=postrhs\"";?>>
	<?php
	
	echo "<input type=hidden name=idasesorrhs value='$idasesorbrhs'>";
	echo "<input type=hidden name=idadsesirhs value='$idasesibrhs'>";
	echo "<input type=hidden name=idskemarhs value='$idskemabrhs'>";
	//echo "<input type=text name=tglrhs value='$tgl'>";
	
	echo "<table width=95% class=demo-table>";
	echo "<tr><td colspan=8>Persetujuan Asesmen ini untuk menjamin bahwa Asesi telah diberi arahan secara rinci tentang perencanaan dan proses asesmen</td></tr>";
	echo "<tr><td rowspan=2 colspan=4>Skema Sertifikasi(KKNI/Okupasi/Klaster)</td><td><strong>Judul : $namaskemarhs </strong></td></tr>";
	echo "<tr><td><strong>Nomor : $kodeskemarhs  </strong></td></tr>";
	echo "<tr><td colspan=4><strong>TUK</strong></td><td><input type=checkbox name=sw>Sewaktu <input type=checkbox name=tk>Tempat Kerja <input type=checkbox name=md>Mandiri</td></tr>";
	echo "<tr><td bgcolor='#99CCFF' colspan=4><strong>Nama Asesi</td><td>$namaasesibrhs</td></tr>";
	echo "<tr><td bgcolor='#99CCFF' colspan=4>Nama Asesor </td><td>$namaasesorbrhs</strong></td></tr>";
	//$o=0; Tanggal Asesment : $tglasesmenb
	//$p=1;
	//$q=2;
   $tglban=date("Y-m-d");
   
	//$listunit = mysql_fetch_array($execunit);
    
    //$ssql="select * from praktek where idskema='$idskema' and kodeunit='".$listunit['kodeunit']."'";    
    echo "<tr><td colspan=4 rowspan=5><strong>Bukti yang di kumpulkan </strong></td><td><strong><input type=checkbox name=porto> TL : Verifikasi Portofolio</strong></td></tr>";
	echo "<tr><td><strong><input type=checkbox name=ttulis > T: Hasil Tes Tulis</strong></td></tr>";
	echo "<tr><td><strong><input type=checkbox name=tlisan> T: Hasil Tes Lisan</strong></td></tr>";
	echo "<tr><td><strong><input type=checkbox name=wawancara> T: Hasil Wawancara</strong></td></tr>";
	echo "<tr><td><strong><input type=checkbox name=obser> L : Observasi Langsung</strong></td></tr>";
	echo "<tr><td colspan=4 rowspan=3><strong>Pelaksanaan asesmen disepakati
pada</strong></td><td>Hari/Tanggal : <strong><input type=text name=hari size=40></td></tr>";
	echo "<tr><td>Waktu : <strong><input type=text name=waktu size=40></td></tr>";
	echo "<tr><td>TUK : <strong><input type=text name=tuk size=40></td></tr>";
	echo "<tr><td colspan=8><strong>Asesi : </br>Bahwa Saya Sudah Mendapatkan Penjelasan Hak dan Prosedur Banding Oleh Asesor.</strong></td></tr>";
	echo "<tr><td colspan=8><strong>Asesor : </br>Menyatakan tidak akan membuka hasil pekerjaan yang saya peroleh karena penugasan saya sebagai Asesor dalam pekerjaan Asesmen kepada siapapun atau organisasi apapun selain kepada pihak yang berwenang sehubungan dengan kewajiban saya sebagai Asesor yang ditugaskan oleh LSP.</strong></td></tr>";
	echo "<tr><td colspan=8><strong>Asesi : </br>Saya setuju mengikuti asesmen dengan pemahaman bahwa informasi yang dikumpulkan hanya digunakan untuk pengembangan profesional dan hanya dapat diakses oleh orang tertentu saja.</strong></td></tr>";
	echo "<tr><td colspan=3>Tanda tangan Asesor </br><img src='$linkttdasesor' </td><td colspan=2>     Tanggal : <input type=text name=tglban value=$tglban readonly></strong></td></tr>";
	echo "<tr><td colspan=3>Tanda tangan Asesi</br><img src='$linkttdbbrhs' </td><td colspan=2>     Tanggal : <input type=text name=tglrhs value=$tglban readonly></strong></td></tr>";
    //$exec=mysql_query($ssql);
     
      echo "<tr><td>";
	  echo "<input type=hidden name='n' value='3'>";
      echo "</td></tr>";
      echo "<tr><td colspan=7><input type=submit name=simpan id=gobutton value=Simpan></td></tr>";
      echo "</table>";
	}
}

else if($op=="postrhs")
{
	//$email=trim($_POST['email']);
	$idsrhs=$_POST['idskemarhs'];
	$idasesirhs=$_POST['idadsesirhs'];
	$idasesorhs=$_POST['idasesorrhs'];
	$tukrhs=$_POST['sw'].",".$_POST['tk'].",".$_POST['md'];
	$buktirhs=$_POST['porto'].",".$_POST['ttulis'].",".$_POST['tlisan'].",".$_POST['wawancara'].",".$_POST['obser'];
	$harirhs=$_POST['hari'];
	$wakturhs=$_POST['waktu'];
	$tukrhsb=$_POST['tuk'];
	$tgltetaprhs=$_POST['tglrhs'];
	//$tgl=$_POST['tglban'];
	//$kelompok=$_POST['kelompok'];
	//$n = $_POST['n'];
	$sukses=0;
	$gagal=0;
	$ntot=0;
	$sup=0;
	//echo $kelompok;
	//for ($i=0; $i<=$n-1; $i++)
	//{
     
     //if (isset($_POST['jls']) and isset($_POST['dis']) and isset($_POST['ol']) )
     //{
	  
       	//$ketbb=$_POST['jls'].",".$_POST['dis'].",".$_POST['ol'];
      
        $cekdatarhs="select * from rahasia where idskemarhs='".$idsrhs."' and idasesorrhs='".$idasesorhs."' and idasesirhs='".$idasesirhs."'";
		//echo "klkdlskd".$cekdatarhs."</br>";
        $adarhs=mysql_query($cekdatarhs);
        $adakrhs=mysql_num_rows($adarhs);
         //echo "hh".$adak; 
		if($adakrhs>0){
        $ssqlrhsu="update rahasia set buktirhs='$buktirhs',tukrhs='$tukrhs', tglrhs='$harirhs', wakturhs='$wakturhs', tukb='$tukrhsb', tgltetap='$tgltetaprhs' where idskemarhs='".$idsrhs."' and idasesirhs='".$idasesirhs."' and idasesorrhs='".$idasesorhs."'";
        //echo $ssqlrhsu;
        $okrhspu=mysql_query($ssqlrhsu);
         if($okrhspu){
         	$sup++;
         }

          }else { 

        $ssqlrhsp="insert into rahasia value('','$idsrhs','$idasesirhs','$idasesorhs','$buktirhs','$tukrhs','$harirhs','$wakturhs','$tukrhsb','$tgltetaprhs')";
        //echo $ssqlrhsp;
        $okrahasia=mysql_query($ssqlrhsp);	
        if ($okrahasia) {
		$sukses++;
		
                  } else { $gagal++; }
               }	
     //}   
	echo "<strong><font color=green>Sukses Simpan Baru :</font> ".$sukses ;
	echo "<font color=red></br>Gagal  :</font> ".$gagal;
	echo "<font color=green></br>Berhasil Update :</font> ".$sup."</strong>"; ?>
	<form id="formContoh" method="post" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=listpeserta\"";?>> 
	<?php

	echo "<input type=hidden name=tgl value='$tgl'>";
	echo "<input type=hidden name=idskema value='$ids'>";
	echo "<input type=hidden name=kelompok value='$kelompok'>";
	echo "<input type=hidden name=idasesor value='$idasesor'>";
	echo "<input type=hidden name=idasesi value='$idasesi'>";
	//echo "<td><a href=\"".$_SERVER['PHP_SELF'].
        "?op=sblobservasi&kode=".$ei."&k=".$kelompok."&tgl=".$tgl."&idasesi=".$idasesi."&idskema=".$ids."\" class='btn btn-primary btn-sm' role='button' >Klik disini , Lanjutkan... </a></td></br>";

	//echo "<script>history.go(-2);</script>";
	?>

	<?php
}





?>


<body>
<br/>
<?php
$queryrahasia ="SELECT * FROM pemetaan where idpeserta='$idrahasia'";
//echo $querybanding;
$hasilrahasia = mysql_query($queryrahasia);
//$hasilbandingarr=mysql_fetch_array($querybanding);
//$ada=mysql_query($);
   	if(mysql_num_rows($hasilrahasia)>0){
?>

<table class="demo-table" >
<tr>
    <th bgcolor='#006699'>No</th>
  	<th bgcolor='#006699'>Nama Peserta</th>
    <th bgcolor='#006699'>Paket</th>
    <th bgcolor='#006699'>Skema</th>
    <th bgcolor='#006699'>Nama Asesor</th>
    <th bgcolor='#006699' colspan='2'>Aksi</th>
</tr>
 
<?php
 
// bagian ini digunakan untuk menampilkan semua data
 
$no = 1;
//$queryobanding ="SELECT * FROM pemetaan where idasesor='$idasesor' group by kelompok,idskema";
//$hasilobanding = mysql_query($queryobvmain);
//echo $query;
while ($dataorahasia = mysql_fetch_array($hasilrahasia))
{
   $ssqlrahasia="select * from skema where idskema=".$dataorahasia['idskema'];
   //echo $ssql;
   $execrahasia=mysql_query($ssqlrahasia);
   $barisrhs=mysql_fetch_array($execrahasia);
   $namaskrahasia=$barisrhs['namaskema'];
   echo "<tr>";
   echo "<td bgcolor='#99CCFF'>".$no."</td>";
   echo "<td bgcolor='#99CCFF'>".$namarahasia."</td>";
   echo "<td bgcolor='#99CCFF' align=left>".$dataorahasia['kelompok']."</td>";
   echo "<td bgcolor='#99CCFF' align=left>".$dataorahasia['idskema']."</td>";
   echo "<td bgcolor='#99CCFF' align=left>".$dataorahasia['namaasesor']."</td>";
   echo "<td><a href=\"".$_SERVER['PHP_SELF'].
        "?op=rahasiafrm&iduser=".$idrahasia."&namaaseso=".$dataorahasia['namaasesor']."&idasesor=".$dataorahasia['idasesor']."&idskema=".$dataorahasia['idskema']."&tglasemen=".$dataorahasia['tanggal']."&linkttd=".$linkttdrhs."&namaase=".$namarahasia."\"><img src=../images/edit.png>Isi Form Kerahasiaan</a> 
    </td>";
   echo "</tr>";
   $no++;
}
echo "</div>";
}else{ echo "Belum ada jadwal";}

?>

<!--end databaru-->
		<div>
		</div>		
        </div>
        </div> 

<script type="text/javascript">
function myclick()
{ 
var bb=document.getElementById("nili").value;
var aa=document.getElementById("aaaa").value;
var cc='v';
f=cc+bb;
var v=document.getElementById(f).value='abc';


alert(bb);
} 
</script>


			
</body>

</html>

<?php 
  //}	 
} ?>
