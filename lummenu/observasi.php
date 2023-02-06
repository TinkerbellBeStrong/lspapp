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

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link href="css/adminstyle.css" rel="stylesheet">
<link href='../css/tombol.css' rel='stylesheet' type='text/css'>
<link href="../css/tabelbaru2.css" rel="stylesheet">
<script src="js/lumino.glyphs.js"></script>
<script src="../js/jquery-2.2.3.min.js"></script>
<script src="../js/formValidation.min.js"></script>
<script src="../js/framework/bootstrap.min.js"></script>
<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
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
if ($_SESSION['level'] != 'asesor') {
echo "<center><link href='css/adminstyle.css' rel='stylesheet' type='text/css'>
 <strong> Anda Tidak Punya Hak ...!</strong><br>";
 echo "<a href=../lsp_login.php class='btn btn-primary btn-sm' role='button'> Kembali</a></center>"; 
} 
else 
{


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
<?php if(isset($_SESSION['username'])) { $uname=$_SESSION['username'];}
$l="SELECT * FROM lsp_usertbl WHERE email='".$uname."'";
$resultx=mysql_query($l);
$hasilx=mysql_fetch_array($resultx);
$namax=$hasilx['nama']; 
$idasesor=$hasilx['id_user'];
$linkttdas=$hasilx['linkttd'];
$linkttdas="../imgttd/".$linkttdas;

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
			<li><a href="validasiapl2.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></use></svg> Validasi APL2</a></li>
			<li><a href="asesormain.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></use></svg>FR.IA.08 Portofolio</a></li>
			<li class="active"><a href="observasi.php"><svg class="glyph stroked eye"><use xlink:href="#stroked-eye"/></use></svg>FR.IA.01 Observasi</a></li>
			<li><a href="mak2.php"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></use></svg>FR.AK.02 Rekaman Assesment</a></li>
			<li><a href="mak5.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"/></use></svg>FR.AK.05 Laporan Assesment</a></li>
			<li><a href="mak6baru.php"><svg class="glyph stroked map"><use xlink:href="#stroked-map"/></use></svg>FR.AK.06 Meninjau Proses Assesment</a></li>
			<li><a href="rekapasesi.php"><svg class="glyph stroked calendar blank"><use xlink:href="#stroked-calendar-blank"/></use></svg>Rekap Hasil Tes</a></li>
			<li ><a href="mapaasesor.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg>FR.MAPA.01 Merencanakan</a></li>
			<li><a href="pihakketiga.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> FR.IA.10 Pihak Ketiga</a></li>
			<li><a href="ceklistintrumen.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> FR.IA.11 Ceklist Instrumen Asesmen</a></li>
			<li ><a href="tandatanganass.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></use></svg> Tanda Tangan</a></li>
			<li role="presentation" class="divider"></li>	
			<li><a href="../logout.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg> Logout</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<h4>Observasi</h4>
                        
</div><!--/.row-->
		
		<!--/.row-->
			
		<div class="row">
			<div class="col-lg-12">
<!--data nu baru -->

<?php
$op = $_GET['op'];

if($op=="pilihtanggal")
{
$idskema= $_GET['idskema'];
$kelompok=$_GET['kelompok'];

?>
<form id="formContoh" method="POST" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=listpeserta\"";?>> 
<input type="hidden" name="kelompok" value="<?php echo $kelompok ;?>">
<input type="hidden" name="idskema" value="<?php echo $idskema ;?>">
<input type="hidden" name="idasesor" value="<?php echo $idasesor ;?>">
<div class="form-group"><strong>Pilih Tanggal :</strong>
<select id="tgl" name="tgl" placeholder="Tanggal" autofocus>
<?php
      $tampiltgl="select * from pemetaan where kelompok='$kelompok' and idskema='$idskema' and idasesor='$idasesor' group by tanggal";
      $exectgl=mysql_query($tampiltgl);
      //echo $tampiltgl;
		while($rtgl=mysql_fetch_array($exectgl))
		{
                //         echo "ll";
   				echo "<option value=$rtgl[tanggal] selected>$rtgl[tanggal]</option> ";
		}
?>
	 </select>
</div>
<input type="submit" id="gobutton" value="Lanjutkan" class="button"> 
<?php
}
 
else if ($op == "listpeserta")
{
    $idasesor=$_POST['idasesor'];
    $idskema= $_POST['idskema'];
    $kelompok=$_POST['kelompok'];
    $tgl=$_POST['tgl'];
    $ssl="select * from pemetaan where kelompok='$kelompok' and idskema='$idskema' and tanggal='$tgl' and idasesor='$idasesor'";
    $exec0=mysql_query($ssl);
    //echo "laksl".$ssl;
    echo "<table class=demo-table>";
    echo "<tr><th bgcolor='#006699'>ID Asesi</th><th bgcolor='#006699'>Nama Asesi</th><th bgcolor='#006699'>Tanggal</th><th colspan=2 bgcolor='#006699'>Aksi</th></tr>";
     while($hasil0 = mysql_fetch_array($exec0))
      {
      if($hasil0['statusvalid']=='Y'){
         $ket="Sudah divalidasi";
         }else{ $ket="Belum di Validasi";}
      
		echo "<tr><td>".$hasil0['idpeserta']."</td>";
		echo "<td>".$hasil0['namapeserta']."</td>";
		echo "<td>".$hasil0['tanggal']."</td>";
		//echo "<td>".$ket."</td>";
		$ei="in";
		echo "<td><a href=\"".$_SERVER['PHP_SELF'].
        "?op=sblobservasi&kode=".$ei."&k=".$hasil0['kelompok']."&tgl=".$hasil0['tanggal']."&idasesi=".$hasil0['idpeserta']."&idskema=".$idskema."\"><img src=../images/edit.png> Daftar Unit </a></td>";
		/***
		echo "<td><a href=\"".$_SERVER['PHP_SELF'].
        "?op=observasi&kode=ed&k=".$hasil0['kelompok']."&tgl=".$hasil0['tanggal']."&idasesi=".$hasil0['idpeserta']."&idskema=".$idskema."\"><img src=../images/edit.png>Edit</a></td></tr>";**/
      }
		echo "<table class=demo-table>";
      
    
    
}

else if($op=="sblobservasi")
{
$idskema= $_GET['idskema'];
$idasesi= $_GET['idasesi'];
$tgl= $_GET['tgl'];
$kelompok=$_GET['k'];


$ie=$_GET['kode'];
//echo $ie;
$sqlunit="select * from unit where idskema='$idskema'";

$execunit=mysql_query($sqlunit);


$sqlskema="select * from skema where idskema='$idskema'";
$execskema=mysql_query($sqlskema);
$listskema = mysql_fetch_array($execskema);
$namaskema=$listskema['namaskema'];

$sqladsesi="select * from lsp_usertbl where id_user='$idasesi'";
$execadsesi=mysql_query($sqladsesi);
$listadsesi = mysql_fetch_array($execadsesi);
$namaadsesi=$listadsesi['nama'];
$emailadsesi=$listadsesi['email'];
$lkttdasesi=$listadsesi['linkttd'];
$sqlunitz="select unitsiswa.idunit,unitsiswa.idskema,unitsiswa.idadsesi,unit.kodeunit,unit.namaunit from unitsiswa inner join unit on unitsiswa.idunit=unit.idunit where unitsiswa.idskema='$idskema' and unitsiswa.idadsesi='$idasesi'";
//echo $sqlunitz;
$execunitz=mysql_query($sqlunitz); 

echo "<input type=hidden name=idasesor value='$idasesor'>";
echo "<input type=hidden name=idadsesi value='$idasesi'>";
echo "<input type=hidden name=idskema value='$idskema'>";
echo "<input type=hidden name=tgl value='$tgl'>";
echo "<input type=hidden name=kelompok value='$kelompok'>";
echo "<input type=hidden name=email value='$emailadsesi'>";
?>
<table class="demo-table" >
<tr>
    <span class='glyphicon glyphicon-asterisk'><font color=red>Kalau Ket tidak berubah klik refresh / F5.</font>
    <th bgcolor='#006699'>Idasesi</th>	
    <th bgcolor='#006699'>idunit</th>
    <th bgcolor='#006699'>Kode Unit</th>
    <th bgcolor='#006699'>Nama Unit </th>
    <th bgcolor='#006699'>Ket </th>
    <th bgcolor='#006699' colspan='2'>Aksi</th>
    
</tr>

<?php
while ($daftaobservasi = mysql_fetch_array($execunitz))
{

	$cekobser="select idunit,idadsesi from rekappraktek where idunit='".$daftaobservasi['idunit']."' and idadsesi='".$daftaobservasi['idadsesi']."' group by idunit,idadsesi";
	//echo $cekobser;
	$cekobsera=mysql_query($cekobser); 
	$g=mysql_num_rows($cekobsera);
	if($g>0){
	$keto="<font color=green><span class='glyphicon glyphicon-ok'>Pernah di observasi</font>";}
	else { $keto="<font color=red><span class='glyphicon glyphicon-remove'>Belum diobservasi</font>";}
	$idasesiobs=$daftaobservasi['idadsesi'];
	$idskemaobs=$daftaobservasi['idskema'];
	echo "<tr><td>".$daftaobservasi['idadsesi']."</td>";
	echo "<td>".$daftaobservasi['idunit']."</td>";
	echo "<td>".$daftaobservasi['kodeunit']."</td>";
	echo "<td>".$daftaobservasi['namaunit']."</td>";
	echo "<td>$keto</td>";

	echo "<td><a href=\"".$_SERVER['PHP_SELF'].
			"?op=observasi&kode=in&kou=".$daftaobservasi['kodeunit']."&idass=".$idasesor."&k=".$kelompok."&tgl=".$tgl."&idasesi=".$daftaobservasi['idadsesi']."&idskema=".$daftaobservasi['idskema']."\"><span class='glyphicon glyphicon-check'>Observasi</a></td>";
	echo "</td></tr>";
}
echo "<tr><td colspan=6><a href=\"".$_SERVER['PHP_SELF'].
   "?op=rekomproobser&emailad=".$emailadsesi."&ttdasesi=".$lkttdasesi."&nmasesi=".$namaadsesi."&k=".$kelompok."&idass=".$idasesor."&tgl=".$tgl."&idasesi=".$idasesiobs."&idskema=".$idskemaobs."\" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-edit'>Rekomendasi</a></br></td></tr></table>";

}

else if ($op == "observasi")
{
	?>
    <button type="button" class="btn btn-primary" onclick="window.print()">Print Halaman Ini</button>
    <?php
	
	$idskema= $_GET['idskema'];
	$idasesi= $_GET['idasesi'];
	$tgl= $_GET['tgl'];
	$kelompok=$_GET['k'];
	$kodeu=$_GET['kou'];
	$idasesor=$_GET['idass'];
	$ie=$_GET['kode'];
	//echo $ie;
	$sqlunit="select * from unit where idskema='$idskema'";
	$execunit=mysql_query($sqlunit);
	$sqlskema="select * from skema where idskema='$idskema'";
	$execskema=mysql_query($sqlskema);
	$listskema = mysql_fetch_array($execskema);
	$namaskema=$listskema['namaskema'];
	$nomorskemaob=$listskema['kodeskema'];
	$sqladsesi="select * from lsp_usertbl where id_user='$idasesi'";
	$execadsesi=mysql_query($sqladsesi);
	$listadsesi = mysql_fetch_array($execadsesi);
	$namaadsesi=$listadsesi['nama'];
	$emailadsesi=$listadsesi['email'];
	$linkttd1=$listadsesi['linkttd'];
	$linkttd1="../imgttd/".$linkttd1;
	$sqlunit="select unitsiswa.idunit,unitsiswa.idskema,unitsiswa.idadsesi,unit.kodeunit,unit.namaunit from unitsiswa inner join unit on unitsiswa.idunit=unit.idunit where unitsiswa.idskema='$idskema' and unitsiswa.idadsesi='$idasesi' and unit.kodeunit='$kodeu'";
	$execunit=mysql_query($sqlunit); 
	//echo "<form name=contoh method=post action=postobservasi.php enctype=multipart/form-data id=form-upload>";
	//if($ie=='in'){
	?>
	<form id="obs" name="obs" method="POST" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=postobs\"";?>>
	<?php
	echo "<input type=hidden name=idasesor value='$idasesor'>";
	echo "<input type=hidden name=idadsesi value='$idasesi'>";
	echo "<input type=hidden name=idskema value='$idskema'>";
	echo "<input type=hidden name=tgl value='$tgl'>";
	echo "<input type=hidden name=kelompok value='$kelompok'>";
	echo "<input type=hidden name=email value='$emailadsesi'>";

	//echo "<table width=95% class=demo-table><tr><td bgcolor='#99CCFF' colspan=8> <strong>Nama Skema : $namaskema </br>Nama Adsesi : $namaadsesi </strong></td></tr>";
	echo "<table width=95% class=demo-table> <tr><td colspan=7><strong>Skema sertifikasi : $namaskema </br>No. Skema Sertifikasi : $nomorskemaob </strong></td></tr>";	
	echo"<tr><td colspan=7><strong>TUK  : Sewaktu</strong></td></tr>";
	echo"<tr><td colspan=7><strong>Nama Asesor : $namax </strong></td></tr>";
	echo"<tr><td colspan=7><strong>Nama Asesi : $namaadsesi </strong></td></tr>";
	echo"<tr><td colspan=7><strong>Tanggal : $tgl </strong></td></tr>";
	echo"<tr><td colspan=7><strong>PANDUAN BAGI ASESOR </strong></td></tr>";
	echo"<tr><td colspan=7><strong>Lengkapi nama unit kompetensi, elemen, dan kriteria unjuk kerja sesuai kolom dalam tabel.</br>Istilah Acuan Pembanding dengan SOP/spesifikasi produk dari industri/organisasi dari tempat kerja atau simulasi tempat kerja</br>Beri tanda centang (v) pada kolom K jika Anda yakin asesi dapat melakukan/mendemonstrasikan tugas sesuai KUK, atau centang (v) pada kolom BK bila sebaliknya.</br>Penilaian Lanjut diisi bila hasil belum dapat disimpulkan, untuk itu gunakan metode lain
sehingga keputusan dapat dibuat</strong></td></tr>";
	//$i=0;
	$listunit = mysql_fetch_array($execunit);
	//while ($listunit = mysql_fetch_array($execunit))
	// {  
	//echo "<form id=\"formContoh\" method=\"post\" action=\"postobservasi.php\">";
    
	/*if($ie=='in'){
    $ssql="select * from praktek where idskema='$idskema' and kodeunit='".$listunit['kodeunit']."'";
    }else{$ssql="select rekappraktek.idrpraktek,rekappraktek.idskema,rekappraktek.idadsesi,rekappraktek.bunit,rekappraktek.kodeunit,rekappraktek.idpraktek,rekappraktek.idasesor,rekappraktek.tanggal,rekappraktek.pencapaians,rekappraktek.penilaians,praktek.instruksi,praktek.obervasi from rekappraktek inner join praktek on rekappraktek.idpraktek=praktek.idpraktek where rekappraktek.idskema='$idskema' and rekappraktek.idadsesi='$idasesi' and rekappraktek.kodeunit='".$listunit['kodeunit']."' and rekappraktek.idasesor='$idasesor' and rekappraktek.tanggal='$tgl'";} */
    $ssql="select * from praktek where idskema='$idskema' and kodeunit='".$listunit['kodeunit']."'";
    //$ssqlzz="select rekappraktek.idrpraktek,rekappraktek.idskema,rekappraktek.idadsesi,rekappraktek.bunit,rekappraktek.kodeunit,rekappraktek.idpraktek,rekappraktek.idasesor,rekappraktek.tanggal,rekappraktek.pencapaians,rekappraktek.penilaians,praktek.instruksi,praktek.obervasi from rekappraktek inner join praktek on rekappraktek.idpraktek=praktek.idpraktek where rekappraktek.idskema='$idskema' and rekappraktek.idadsesi='$idasesi' and rekappraktek.kodeunit='".$listunit['kodeunit']."' and rekappraktek.idasesor='$idasesor' and rekappraktek.tanggal='$tgl'";
    //$ssqlzza=mysql_query($ssqlzz);
    //$ssqlzzb=mysql_num_rows($ssqlzz);
   //echo $ssql;
    echo "<tr><td bgcolor=bluelight colspan=3><strong>KODE UNIT :".$listunit['kodeunit']."</strong></td><td colspan=2 rowspan=2><strong>Pencapaian</strong></td><td colspan=2 rowspan=2><strong>Rekomendasi</strong></td></tr><tr><td colspan=7><strong>NAMA UNIT : ".$listunit['namaunit']."</strong></td></tr><tr><td><strong>Langkah Kerja</strong></td><td colspan=2><strong>Kriteria Unjuk Kerja</strong></td><td><strong>Ya</strong></td><td><strong>Tidak</strong></td><td><strong>K</strong></td><td><strong>BK</strong></td></tr>";
    $exec=mysql_query($ssql);
      //echo $listunit['kodeunit']."</br";
      $i=0;
      $xjj=0;
      while ($list = mysql_fetch_array($exec)){
        $idpr=$list['idpraktek'];      
        $xjj++;
        $ssqlzz="select rekappraktek.idrpraktek,rekappraktek.idskema,rekappraktek.idadsesi,rekappraktek.bunit,rekappraktek.kodeunit,rekappraktek.idpraktek,rekappraktek.idasesor,rekappraktek.tanggal,rekappraktek.pencapaians,rekappraktek.penilaians,praktek.instruksi,praktek.obervasi from rekappraktek inner join praktek on rekappraktek.idpraktek=praktek.idpraktek where rekappraktek.idskema='$idskema' and rekappraktek.idadsesi='$idasesi' and rekappraktek.kodeunit='".$listunit['kodeunit']."' and rekappraktek.idasesor='$idasesor' and rekappraktek.tanggal='$tgl' and rekappraktek.idpraktek='".$idpr."'";
        $ssqlzza=mysql_query($ssqlzz);
        $ssqlzzb=mysql_num_rows($ssqlzza);
        //echo $ssqlzzb;
        //if($ie=='in'){
		//  echo "<tr><td>".$list['instruksi']."<input type=hidden name=idunit".$i." value=".$listunit['idunit']."><input type=hidden name=kodeunit".$i." value=".$listunit['kodeunit']."></td><td>".$list['obervasi']."</td><td><input type=hidden name=idpraktek".$i." value=".$list['idpraktek']."></td><td><input type=radio name=pcp".$i." value='Y' checked> </td><td><input type=radio name=pcp".$i." value='T'></td><td><input type=radio name=bk".$i." value='K' checked></td><td><input type=radio name=bk".$i." value='BK'></td></tr>";
        // }else{
         //$cky="";
         //$ckt="";
         //$ckk="";
         //$ckbk="";
         if($ssqlzzb>0){
         	$ssqlzzd=mysql_fetch_array($ssqlzza);
         //echo $ssqlzzd['pencapaians'];
         if($ssqlzzd['pencapaians']=='Y'){
          $cky="checked";}
         else {
          $cky=" ";}

          if($ssqlzzd['pencapaians']=='T')
          {
          $ckt="checked";}
         else {
          $ckt=" ";}

		if($ssqlzzd['penilaians']=='K'){
          $ckk="checked";}
         else {
          $ckk=" ";}
           
        if($ssqlzzd['penilaians']=='BK'){
          $ckbk="checked";}
         else {
          $ckbk=" ";}
		           
       }
       else {
       	$ckk="checked";
       	$cky="checked";
       }


        echo "<tr><td>".$list['instruksi']."<input type=hidden name=idunit".$i." value=".$listunit['idunit']."><input type=hidden name=kodeunit".$i." value=".$listunit['kodeunit']."></td><td>".$list['obervasi']."</td><td><input type=hidden name=idpraktek".$i." value=".$list['idpraktek']."><input type=hidden name=idrpraktek".$i." value=".$ssqlzzd['idrpraktek']."></td><td><input type=radio name=pcp".$i." value='Y' $cky></td><td><input type=radio name=pcp".$i." value='T' $ckt></td><td><input type=radio name=bk".$i." value='K' $ckk></td><td><input type=radio name=bk".$i." value='BK' $ckbk></td></tr>";
		$bunit=$list['bunit'];
		// }
		$i++;
      
      }
      echo "<tr><td>";
      //$b=$ccunit;
	  //if($ie=='in'){
      echo "<input type=hidden id=aaunit name=aaunit".$listunit['idunit']." value='$xjj'>"; 
      echo "<input type=hidden name='n' value='".$i."'>";
      //    }
      // else {
      //echo "<input type=hidden id=aaunit name=aaunit".$listunit['idunit']." value='$bunit'>"; 
	  //echo "<input type=hidden name='n' value='".$i."'>";
      //  }
      echo "</td></tr>";
	  echo "<tr><td colspan=2>Nama Asesi : </br> $namaadsesi </td><td colspan=5><img src=$linkttd1></td></tr>";
	   echo "<tr><td colspan=2>Nama Asesor : </br> $namax </td><td colspan=5><img src=$linkttdas></td></tr>";
	  //}
      echo "<tr><td colspan=7><input type=submit name=simpan id=gobutton value=Simpan></td></tr>";
      echo "</table>";
}

else if($op=="postobs")
{
	$email=trim($_POST['email']);
	$ids=$_POST['idskema'];
	$idasesi=$_POST['idadsesi'];
	$idasesor=$_POST['idasesor'];
	$tgl=$_POST['tgl'];
	$kelompok=$_POST['kelompok'];
	$n = $_POST['n'];
	$sukses=0;
	$gagal=0;
	$ntot=0;
	$sup=0;
	//echo $kelompok;
	for ($i=0; $i<=$n-1; $i++)
	{
     
     if (isset($_POST['pcp'.$i]) and isset($_POST['bk'.$i]) )
     {
	   //echo $i;
       	$idunit = $_POST['idunit'.$i];
       	$idpraktek = $_POST['idpraktek'.$i];
       	$bk=$_POST['bk'.$i];
       	$yt=$_POST['pcp'.$i];
        $kodeunit=$_POST['kodeunit'.$i];
        $idrpraktek=$_POST['idrpraktek'.$i];
        //echo "iiid".$idpraktek;
                // echo "abc".$aahitung;
         //if($bk=='K'){
        //  $ni=50;}
        //  else {$ni=0;}
		$aaunit=$_POST['aaunit'.$idunit];
        if($yt=='Y'){
            	
        	$aahitung=(100/$aaunit);
		}
		else { $aahitung=0;}
        // $ntot=$ni+$ny;
        $cekdata="select * from rekappraktek where idskema='".$ids."' and idunit='".$idunit."' and idpraktek='".$idpraktek."' and idadsesi='".$idasesi."' and idasesor='".$idasesor."'";
		//echo $cekdata."</br>";
        $ada=mysql_query($cekdata);
        $adak=mysql_num_rows($ada);
         //echo "hh".$adak; 
		if($adak>0){
        $ssqlrekapu="update rekappraktek set pencapaians='$yt',penilaians='$bk', niai='$aahitung' where idskema='".$ids."' and idunit='".$idunit."' and idpraktek='".$idpraktek."' and idadsesi='".$idasesi."' and idasesor='".$idasesor."' and idrpraktek='".$idrpraktek."'";
        //echo $ssqlrekapu;
        $okrekapu=mysql_query($ssqlrekapu);
         if($okrekapu){
         	$sup++;
         }
          //echo "Terjadi duplikate</br>";
          }else { 
	 
		//echo $ids.",".$idasesi.",".$idasesor.",".$idunit.",".$idpraktek.",".$bk.",".$yt.",";
        $ssqlrekapp="insert into rekappraktek value('','$ids','$idunit','$kodeunit','$idpraktek','$idasesor','$idasesi','$yt','$bk','$tgl','$aahitung','$aaunit')";
        //echo $ssqlrekapp;
        $okrekapp=mysql_query($ssqlrekapp);	
        if ($okrekapp) {
		$sukses++;
		//$updatesksiswa="update skemasiswa set statustest='Y' where emailsiswa='$email' and idskema='$ids'";
                //$execupdate=mysql_query($updatesksiswa);
                  } else { $gagal++; }
               }
		// else $gagal=$x-$sukses;
     } //else { echo"<script>alert('Tidak ada/kuranglengkap pilihan !');history.go(-1);</script>";}     
 
	}
	// echo"<script>alert('proses selesai.... !');history.go(-2);</script>";
	//if($sup){
	//	$gagal=$sup; }
	//	else {
	//$gagal=$n-$sukses;}
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
	echo "<td><a href=\"".$_SERVER['PHP_SELF'].
        "?op=sblobservasi&kode=".$ei."&k=".$kelompok."&tgl=".$tgl."&idasesi=".$idasesi."&idskema=".$ids."\" class='btn btn-primary btn-sm' role='button' >Klik disini , Lanjutkan... </a></td></br>";

	//echo "<script>history.go(-2);</script>";
	?>
	<!--</br><input type="submit" id="gobutton" value="Proses selesai.. Lanjutkan" class="button"> -->
	<?php
}

else if($op=="rekomproobser")
{

    $namaasesittdr=$_GET['nmasesi'];
	$idasesorttdr=$_GET['idass'];
	$idadsesittdr=$_GET['idasesi'];
	$tglttdr=$_GET['tgl'];
    $idskttdr=$_GET['idskema'];
    $ttdasesir=$_GET['ttdasesi'];
    $ttdasesir="../imgttd/".$ttdasesir;
    $ttdemailr=$_GET['emailad'];
    $ttdkelompok=$_GET['k']; 
     //$cekduluvlapl2="select idadsesi,idskema,waktu,svalidasi from apl2 where idadsesi='".$idadsesittd."' and waktu='".$tglttd."' and svalidasi='T' and idskema ='".$idskttd."' group by idadsesi,idskema,waktu,svalidasi";
     //$cekduluvlapl2a=mysql_query($cekduluvlapl2);
     //$cekduluvlapl2b=mysql_num_rows($cekduluvlapl2a);
     //$cekduluvlapl2c=mysql_fetch_array($cekduluvlapl2a);
     //$emailttd=$cekduluvlapl2c['email'];
     //echo "nmnms".$cekduluvlapl2b;
     //if ($cekduluvlapl2b>0)
     //{
      //echo "<strong><font color=red>VALIDASI BELUM SELESAI !!!</font></strong> ";
     //}
     //else 
     //{


    echo "<form id=\"formContoh\" method=\"post\" enctype=\"multipart/form-data\" action=\"".$_SERVER['PHP_SELF'].
        "?op=srekomproobs\">";
	
    $cekdata0r = "SELECT * FROM rekomendasi WHERE namarekom = 'obs' and idskema='$idskttdr' and idasesi='$idadsesittdr' and tanggal='$tglttdr'";
 		 //echo $cekdata0;
   	$ada0r=mysql_query($cekdata0r);
   	$adaxr=mysql_fetch_array($ada0r);
   
    	$lrekr=$adaxr['rekom'];
    	$catr=$adaxr['catatan'];
       	if($lrekr=='L'){
      	$klrekr='checked';
     	}else{$klrekr='';}
     	if($lrekr=='T'){
      	$klrek0r='checked';
     	}else{$klrek0r='';}
    
    $catatanr=$data0r['catatan'];        


	$sqlttdr="select * from lsp_usertbl where id_user='$idasesorttdr'";
	//echo $sqlttd;
    $sqlttdar=mysql_query($sqlttdr);
    $sqlttdbr=mysql_fetch_array($sqlttdar);
    $linkttdar="../imgttd/".$sqlttdbr['linkttd'];
	$namapttdr=$sqlttdbr['nama'];
	$emailttdr=$sqlttdbr['email'];
    //$idasesittd=$sqlttd['id_user'];
	//echo"<table></tr><td colspan=2 rowspan=3>Rekomendasikan Asesor: </br><input type=radio name=lrekttd value='L' $klrek >Kompetensi</br> <input type=radio name=lrekttd value='T' $klrek0>Uji Kompetensi</td><td colspan=7><strong> Asesi </strong></td></tr><tr><td>Nama : </td><td colspan=6>$namapttd</td></tr><tr><td>Tanda Tangan : </td><td colspan=6><img src='$linkttda'></td>";

	echo"<table width=80%></tr><td colspan=2 rowspan=3>Rekomendasi Asesor: </br><td colspan=7><strong> Asesi </strong></td></tr><tr><td>Nama : </td><td colspan=6>$namaasesittdr</td></tr><tr><td>Tanda Tangan : </td><td colspan=6><img src='$ttdasesir'></td>";
    echo"</tr><td colspan=2 rowspan=3>Catatan :  </br> <textarea name=catatanr rows=3 cols=30 value=>$catr</textarea><td colspan=7><strong>Asesor</strong></td></tr><tr><td>Nama : </td><td colspan=6>$namapttdr</td></tr><tr><td>Tanda Tangan : </td><td colspan=6><img src='$linkttdar' height=70></td>";
    echo "</tr><tr><td colspan=9><input type='hidden' name='n' value='".$i."'><input type=submit name=simpan id=gobutton value=Simpan></td>";
    echo"<input type =hidden name=idskttdo value='$idskttdr'>
         <input type =hidden name=idadsesittdo value ='$idadsesittdr'>
         <input type =hidden name=tglttdo value='$tglttdr'>
         <input type =hidden name=idasesorttdo value='$idasesorttdr'>
         <input type =hidden name=emailttdo value='$ttdemailr'>
	 <input type =hidden name=kelompokttddo value='$ttdkelompok'></table></form>";
    //}     


}



else if ($op == "srekomproobs")
{
 
   /* $idasesor=$_POST['idasesor'];
    $idskema= $_POST['idskema'];
    $kelompok=$_POST['kelompok'];
    $tgl=$_POST['tgl'];
*/
    $idskemarekaplo=$_POST['idskttdo'];
    $idasesirekaplo=$_POST['idadsesittdo'];
    $tglrekaplo=$_POST['tglttdo'];
    $idasesorrekaplo=$_POST['idasesorttdo'];
    $lrekaplo=$_POST['lrekttdo'];
    $catatanrekaplo=$_POST['catatanr'];
	$emailado=$_POST['emailttdo'];
    $kelompoklo=$_POST['kelompokttddo'];

	//echo "lrek".$lrekapl2;
	//echo $catatanrekapl2;
     $cekdatao = "SELECT * FROM rekomendasi WHERE namarekom = 'obs' and idskema='$idskemarekaplo' and idasesi='$idasesirekaplo' and tanggal='$tglrekaplo'";
     //echo $cekdatao;
   $adao=mysql_query($cekdatao);
   	if(mysql_num_rows($adao)>0){
    $ssqlrekaplo="update rekomendasi set catatan='$catatanrekaplo' where namarekom = 'obs' and idskema='$idskemarekaplo' and idasesi='$idasesirekaplo' and tanggal='$tglrekaplo'"; 
    }else{$ssqlrekaplo="insert into rekomendasi value('','obs','$idskemarekaplo','$idasesorrekaplo','$idasesirekaplo','$lrekaplo','$catatanrekaplo','','$tglrekaplo')";}
    //echo $ssqlrekapl2;
   $execrekaplo=mysql_query($ssqlrekaplo);
   if($execrekaplo){
   	
   	$updskemasiso="update skemasiswa set statustesp='Y' where idskema='$idskemarekaplo' and emailsiswa='$emailado'";
   	//echo $updskemasiso;
   	$updskemasisao=mysql_query($updskemasiso);

   	
   	?><div class="container">
			  <div class="alert alert-success">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>Penyimpanan Sukses ..!</strong>
			  </div>
			</div> <?php 
   } else {
   	?>
   	<div class="container">
			  <div class="alert alert-warning">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>Penyimpanan Gagal ..!</strong>
			  </div>
			</div> <?php
   }
?>
<form id="formContoh" method="post" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=listpeserta\"";?>> 
<input type="hidden" name="kelompok" value="<?php echo $kelompoklo ;?>">
<input type="hidden" name="idskema" value="<?php echo $idskemarekaplo ;?>">
<input type="hidden" name="idasesor" value="<?php echo $idasesorrekaplo ;?>">
<input type="hidden" name="tgl" value="<?php echo $tglrekaplo ;?>">
<input type="submit" id="gobutton" value="Lanjutkan" class="button"> 
</form>
<?php
}


else if($op=="updateobs")
{
$email=trim($_POST['email']);
$ids=$_POST['idskema'];
$idasesi=$_POST['idadsesi'];
$idasesor=$_POST['idasesor'];
$tgl=$_POST['tgl'];
$kelompok=$_POST['kelompok'];
$n = $_POST['n'];
$sukses=1;
$gagal=0;
$ntot=0;
$ni=0;
$ny=0;

for ($i=0; $i<=$n-1; $i++)
   {
     
     if (isset($_POST['pcp'.$i]) and isset($_POST['bk'.$i]) )
     {
	   //echo $i;
       	$idunit = $_POST['idunit'.$i];
       	$idpraktek = $_POST['idpraktek'.$i];
       	$bk=$_POST['bk'.$i];
       	$yt=$_POST['pcp'.$i];
        $kodeunit=$_POST['kodeunit'.$i];
        $idrpraktek=$_POST['idrpraktek'.$i];
	//$aaunit=$_POST['aaunit'.$idunit];
	//$aahitung=(100/$aaunit);

	if($yt=='Y'){
            	$aaunit=$_POST['aaunit'.$idunit];
        	$aahitung=(100/$aaunit);
	}
        else { $aahitung=0;}
	

        //$cekdata="select * from rekappraktek where idskema='".$ids."' and idunit='".$idunit."' and idpraktek='".$idpraktek."' and idadsesi='".$idasesi."' and idasesor='".$idasesor."'";
	 //echo $cekdata."</br>";
        //$ada=mysql_query($cekdata);
	//if(mysql_num_rows($ada)>0){
         // echo "Terjadi duplikate</br>";
         // }else { 
	 
	//echo $ids.",".$idasesi.",".$idasesor.",".$idunit.",".$idpraktek.",".$bk.",".$yt.",";
        $ssqlrekapu="update rekappraktek set pencapaians='$yt',penilaians='$bk', niai='$aahitung' where idskema='".$ids."' and idunit='".$idunit."' and idpraktek='".$idpraktek."' and idadsesi='".$idasesi."' and idasesor='".$idasesor."' and idrpraktek='".$idrpraktek."'";
        //echo $ssql;
        $okrekapu=mysql_query($ssqlrekapu);	
        if ($okrekapu) { 
		$sukses++;
		$updatesksiswa="update skemasiswa set statustest='Y' where emailsiswa='$email' and idskema='$ids'";
                $execupdate=mysql_query($updatesksiswa);}


           //    }

		// else $gagal=$x-$sukses;
     } //else { echo"<script>alert('Tidak ada/kuranglengkap pilihan !');history.go(-1);</script>";}     
 
}
// echo"<script>alert('proses selesai.... !');history.go(-2);</script>";
$gagal=$n-$sukses;
echo "Sukses :".$sukses ;
echo "</br>Gagal  :".$gagal;?>
<form id="formContoh" method="post" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=listpeserta\"";?>> 
<?php


echo "<input type=hidden name=tgl value='$tgl'>";
echo "<input type=hidden name=idskema value='$ids'>";
echo "<input type=hidden name=kelompok value='$kelompok'>";
echo "<input type=hidden name=idasesor value='$idasesor'>";
echo "<input type=hidden name=idasesi value='$idasesi'>";
echo "<script>history.go(-2);</script>";
?>
<!--</br><input type="submit" id="gobutton" value="Proses selesai.. Lanjutkan" class="button">--> 
<?php
}



?>


<body>
<br/>
<?php
$queryobmain ="SELECT * FROM pemetaan where idasesor='$idasesor' group by kelompok,idskema";
//echo $queryobmain;
$hasilobmain = mysql_query($queryobmain);
//$ada=mysql_query($);
   	if(mysql_num_rows($hasilobmain)>0){
?>

<table class="demo-table" >
<tr>
    <th bgcolor='#006699'>No</th>	
    <th bgcolor='#006699'>Paket</th>
    <th bgcolor='#006699'>Skema</th>
    <th bgcolor='#006699'>Nama Skema</th>
    <th bgcolor='#006699' colspan='2'>Aksi</th>
</tr>
 
<?php
 
// bagian ini digunakan untuk menampilkan semua data
 
$no = 1;
$queryobvmain ="SELECT * FROM pemetaan where idasesor='$idasesor' group by kelompok,idskema";
$hasilobvmain = mysql_query($queryobvmain);
//echo $query;
while ($dataobvmain = mysql_fetch_array($hasilobvmain))
{
   $ssqlmain="select * from skema where idskema=".$dataobvmain['idskema'];
   //echo $ssql;
   $execssql=mysql_query($ssqlmain);
   $baris=mysql_fetch_array($execssql);
   $namaskema=$baris['namaskema'];
   echo "<tr>";
   echo "<td bgcolor='#99CCFF'>".$no."</td>";
   //echo "<td bgcolor='#99CCFF'>".$data['id_user']."</td>";
   echo "<td bgcolor='#99CCFF' align=left>".$dataobvmain['kelompok']."</td>";
   echo "<td bgcolor='#99CCFF' align=left>".$dataobvmain['idskema']."</td>";
   echo "<td bgcolor='#99CCFF' align=left>".$namaskema."</td>";
   echo "<td><a href=\"".$_SERVER['PHP_SELF'].
        "?op=pilihtanggal&idskema=".$dataobvmain['idskema']."&kelompok=".$dataobvmain['kelompok']."\"><img src=../images/edit.png>Tampilkan Peserta</a> 
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
  }	 
} ?>
