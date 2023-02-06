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
$ttdfrm=$hasilx['linkttd'];
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
			<li><a href="observasi.php"><svg class="glyph stroked eye"><use xlink:href="#stroked-eye"/></use></svg>FR.IA.01 Observasi</a></li>
			<li><a href="mak2.php"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></use></svg>FR.AK.02 Rekaman Assesment</a></li>
			<li><a href="mak5.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"/></use></svg>FR.AK.05 Laporan Assesment</a></li>
			<li><a href="mak6baru.php"><svg class="glyph stroked map"><use xlink:href="#stroked-map"/></use></svg>FR.AK.06 Meninjau Proses Assesment</a></li>
			<li><a href="rekapasesi.php"><svg class="glyph stroked calendar blank"><use xlink:href="#stroked-calendar-blank"/></use></svg>Rekap Hasil Tes</a></li>
			<li ><a href="mapaasesor.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> FR.MAPA.01 Merencanakan</a></li>
			<li><a href="pihakketiga.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> FR.IA.10 Pihak Ketiga</a></li>
			<li class="active"><a href="ceklistintrumen.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> FR.IA.11 Ceklist Instrumen Asesmen</a></li>
			<li ><a href="tandatanganass.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></use></svg> Tanda Tangan</a></li>
			<li role="presentation" class="divider"></li>	
			<li><a href="../logout.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg> Logout</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<h4>CEKLIS MENINJAU INSTRUMEN ASESMEN</h4>
                        
</div><!--/.row-->
		
		<!--/.row-->
				
		<div class="row">
			<div class="col-lg-12">
<!--data nu baru -->

<?php
$op = $_GET['op'];
 
if($op=="pilihtglceklist")
{
	$idasesorckl=$_GET['idasesor'];
	$idskemackl= $_GET['idskema'];
	$kelompokckl=$_GET['kelompok'];

	?>
	<form id="formContoh" method="POST" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=listpesertackl\"";?>> 
	<input type="hidden" name="kelompokckl" value="<?php echo $kelompokckl ;?>">
	<input type="hidden" name="idskemackl" value="<?php echo $idskemackl ;?>">
	<input type="hidden" name="idasesorckl" value="<?php echo $idasesorckl ;?>">

	<div class="form-group"><strong>Pilih Tanggal :</strong>
	<select id="tglckl" name="tglckl" placeholder="Tanggal" autofocus>
	<?php
      $tampiltglckl="select * from pemetaan where kelompok='$kelompokckl' and idskema='$idskemackl' and idasesor='$idasesorckl' group by tanggal";
      $exectglckl=mysql_query($tampiltglckl);
      //echo $tampiltgl;
		while($rtglckl=mysql_fetch_array($exectglckl))
		{
                //         echo "ll";
			    $namaassackl=$rtglckl['namaasesor'];
   				echo "<option value=$rtglckl[tanggal] selected>$rtglckl[tanggal]</option> ";
					}
?>
	</select>
	</div>
	<input type="submit" id="gobutton" value="Lanjutkan" class="button"> 
	<?php echo "<input type=hidden name=namasportockl value='$namaassackl'> </form>";
}


else if ($op == "listpesertackl")
{
    $idasesorckll=$_POST['idasesorckl'];
    $idskemackll= $_POST['idskemackl'];
    $kelompokckll=$_POST['kelompokckl'];
    $tglckll=$_POST['tglckl'];
    $namaasesorckll=$_POST['namasportockl'];
    $sqluserckll="select linkttd,id_user from lsp_usertbl where id_user='$idasesorckll'";
    $sqluserackll=mysql_query($sqluserckll);
    $sqluserbckll=mysql_fetch_array($sqluserackll);
    $sslckll="select * from pemetaan where kelompok='$kelompokckll' and idskema='$idskemackll' and tanggal='$tglckll' and idasesor='$idasesorckll'";
    $exec0ckll=mysql_query($sslckll);
    //echo "laksl".$ssl;
    echo "<table class=demo-table>";
    echo "<thead><tr><th bgcolor='#006699'>ID Asesi</th><th bgcolor='#006699'>Nama Asesi</th><th bgcolor='#006699'>Tanggal</th><th colspan=2 bgcolor='#006699'>Aksi</th></tr></thead>";
     while($hasil0ckll = mysql_fetch_array($exec0ckll))
      {
      
      
      echo "<tr><td>".$hasil0ckll['idpeserta']."</td>";
      echo "<td>".$hasil0ckll['namapeserta']."</td>";
      echo "<td>".$hasil0ckll['tanggal']."</td>";

		echo "<td><a href=\"".$_SERVER['PHP_SELF'].
        "?op=cklob&idasesor=".$hasil0ckll['idasesor']."&kelompok=".$kelompokckll."&tgl=".$hasil0ckll['tanggal']."&idasesi=".$hasil0ckll['idpeserta']."&idskema=".$idskemackll."&lkttd=".$sqluserbckll['linkttd']."&nmass=".$namaasesorckll."\"><span class='glyphicon glyphicon-edit'>Tampilkan Unit</a></td></tr>";
       
    }
    echo "<table class=demo-table>";
      
	  
    
}

else if($op=="cklob")
{
$idskemacklll= $_GET['idskema'];
$idasesicklll= $_GET['idasesi'];
$idasesorcklll=$_GET['idasesor'];
$tglcklll= $_GET['tgl'];
$kelompokcklll=$_GET['kelompok'];
$namasesorcklll=$_GET['nmass'];
$llinkttdcklll=$_GET['lkttd'];


$ie=$_GET['kode'];
//echo $ie;
$sqlunitckl="select * from unit where idskema='$idskemacklll'";

$execunitckl=mysql_query($sqlunitckl);


$sqlskemackl="select * from skema where idskema='$idskemacklll'";
$execskemackl=mysql_query($sqlskemackl);
$listskemackl = mysql_fetch_array($execskemackl);
$namaskemackl=$listskemackl['namaskema'];
$kodeskemackl=$listskemackl['kodeskema'];

$sqladsesickl="select * from lsp_usertbl where id_user='$idasesicklll'";
$execadsesickl=mysql_query($sqladsesickl);
$listadsesickl = mysql_fetch_array($execadsesickl);
$namaadsesickl=$listadsesickl['nama'];
$emailadsesickl=$listadsesickl['email'];
//$lkttdasesi=$listadsesi['linkttd'];
$sqlunitzckl="select unitsiswa.idunit,unitsiswa.idskema,unitsiswa.idadsesi,unit.kodeunit,unit.namaunit from unitsiswa inner join unit on unitsiswa.idunit=unit.idunit where unitsiswa.idskema='$idskemacklll' and unitsiswa.idadsesi='$idasesicklll'";
//echo $sqlunitz;
$execunitzckl=mysql_query($sqlunitzckl); 

echo "<input type=hidden name=idasesorcklll value='$idasesorcklll'>";
echo "<input type=hidden name=idadsesicklll value='$idasesicklll'>";
echo "<input type=hidden name=idskemacklll value='$idskemacklll'>";
echo "<input type=hidden name=tglcklll value='$tglcklll'>";

?>
<table class="demo-table" >
<tr>
    <!--<span class='glyphicon glyphicon-asterisk'><font color=red>Kalau Ket tidak berubah klik refresh / F5.</font>-->
    <th bgcolor='#006699'>Idasesi</th>	
    <th bgcolor='#006699'>idunit</th>
    <th bgcolor='#006699'>Kode Unit</th>
    <th bgcolor='#006699'>Nama Unit </th>
     <!--<th bgcolor='#006699'>Ket </th>-->
    <th bgcolor='#006699' colspan='2'>Aksi</th>
    
</tr>

<?php
while ($daftackl = mysql_fetch_array($execunitzckl))
{

	$cekckl="select idunit,idadsesi from rekappraktek where idunit='".$daftackl['idunit']."' and idadsesi='".$daftackl['idadsesi']."' group by idunit,idadsesi";
	//echo $cekobser;
	$cekckll=mysql_query($cekckl); 
	$gckl=mysql_num_rows($cekckll);
	if($gckl>0){
	$ketockl="<font color=green><span class='glyphicon glyphicon-ok'>Pernah di observasi</font>";}
	else { $ketockl="<font color=red><span class='glyphicon glyphicon-remove'>Belum diobservasi</font>";}
	$idasesiobsckl=$daftackl['idadsesi'];
	$idskemaobsckl=$daftackl['idskema'];
	echo "<tr><td>".$daftackl['idadsesi']."</td>";
	echo "<td>".$daftackl['idunit']."</td>";
	echo "<td>".$daftackl['kodeunit']."</td>";
	echo "<td>".$daftackl['namaunit']."</td>";
	//echo "<td>$keto</td>";

	echo "<td colspan=2><a href=\"".$_SERVER['PHP_SELF'].
			"?op=frmpceklis&kode=in&kou=".$daftackl['kodeunit']."&lttd=".$ttdfrm."&namaunit=".$daftackl['namaunit']."&idunit=".$daftackl['idunit']."&idass=".$idasesorcklll."&namaskema=".$namaskemackl."&kodeskema=".$kodeskemackl."&nmasesi=".$namaadsesickl."&k=".$kelompokcklll."&tgl=".$tglcklll."&idasesi=".$daftackl['idadsesi']."&nmasesor=".$namasesorcklll."&idskema=".$daftackl['idskema']."\"><span class='glyphicon glyphicon-check'>Formulir Ceklis</a></td>";
	echo "</td></tr>";
}


}


else if($op=="frmpceklis")
{
	?>
    <button type="button" class="btn btn-primary" onclick="window.print()">Print Halaman Ini</button>
    <?php
	$namaasesifrmckl=$_GET['nmasesi'];
	$namaskemafrmckl=$_GET['namaskema'];
	$kodeskemafrmckl=$_GET['kodeskema'];
	$kodeunitfrmckl=$_GET['kou'];
	$namaunitfrmckl=$_GET['namaunit'];
	$idasesifrmckl=$_GET['idasesi'];
	$idasesorfrmckl=$_GET['idass'];
	$idunitfrmckl=$_GET['idunit'];
	$tglfrmckl=$_GET['tgl'];
	$idskemafrmckl=$_GET['idskema'];
	$namaasesorfrmckl=$_GET['nmasesor'];
	$linkttdfrmckl=$_GET['lttd'];
	$linkttdfrmckl="../imgttd/".$linkttdfrmckl;
	?>
<form id="ckl" name="ckl" method="POST" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=postcklfrm\"";?>>
	<?php
	echo "<input type=hidden name=idasesorformckl value='$idasesorfrmckl'>";
	echo "<input type=hidden name=idadsesiformckl value='$idasesifrmckl'>";
	echo "<input type=hidden name=idskemaformckl value='$idskemafrmckl'>";
	echo "<input type=hidden name=tglformckl value='$tglfrmckl'>";
	echo "<input type=hidden name=idunitformckl value='$idunitfrmckl'>";
	
	$cekdatapckl="select * from cekinstrumen where idskemacek='".$idskemafrmckl."' and idasesorcek='".$idasesorfrmckl."' and idasesicek='".$idasesifrmckl."' and idunitcek='".$idunitfrmckl."'";
	//echo "kjskajska".$cekdatapckl;
    $adapckl=mysql_query($cekdatapckl);
    $adakpckl=mysql_num_rows($adapckl);
	$datapcklfrm=mysql_fetch_array($adapckl);
	
	$tglpcklfrm=$datapcklfrm['tglcek'];
	$jawabancklfrm=$datapcklfrm['jawabancek'];
	$komencklfrm=$datapcklfrm['komencek'];
	
	$pecahjawabckl=explode(",",$jawabancklfrm);
	$insfrm=$pecahjawabckl[0];
	$inffrm=$pecahjawabckl[1];
	$kegfrm=$pecahjawabckl[2];
	$tinfrm=$pecahjawabckl[3];
	$tingfrm=$pecahjawabckl[4];
	$confrm=$pecahjawabckl[5];
	$dipfrm=$pecahjawabckl[6];
	$tugfrm=$pecahjawabckl[7];
	
	
	if($insfrm=='Y'){
          $insy="checked";}
         else {
          $insy=" ";}	
	if($insfrm=='T'){
          $inst="checked";}
         else {
          $inst=" ";}	
	if($inffrm=='Y'){
          $infy="checked";}
         else {
          $infy=" ";}	
	if($inffrm=='T'){
          $inft="checked";}
         else {
          $cinft=" ";}	
	if($kegfrm=='Y'){
          $kegy="checked";}
         else {
          $kegy=" ";}	
	if($kegfrm=='T'){
          $kegt="checked";}
         else {
          $kegt=" ";}	
	if($tinfrm=='Y'){
          $tiny="checked";}
         else {
          $tiny=" ";}	
	if($tinfrm=='T'){
          $tint="checked";}
         else {
          $tint=" ";}	
	if($tingfrm=='Y'){
          $tingy="checked";}
         else {
          $tingy=" ";}	
	if($tingfrm=='T'){
          $tingt="checked";}
         else {
          $tingt=" ";}	
	if($confrm=='Y'){
          $cony="checked";}
         else {
          $cony=" ";}	
	if($confrm=='T'){
          $cont="checked";}
         else {
          $cont=" ";}	
	if($dipfrm=='Y'){
          $dipy="checked";}
         else {
          $dipy=" ";}	
	if($dipfrm=='T'){
          $dipt="checked";}
         else {
          $dipt=" ";}	
	if($tugfrm=='Y'){
          $tugy="checked";}
         else {
          $tugy=" ";}	
	if($tugfrm=='T'){
          $tugt="checked";}
         else {
          $tugt=" ";}			  
		 		  
   // echo "hh".$cekdatapktt; 
	if($adakpckl>0){
	//	echo "ada ...";
	echo "<table width=95% class=demo-table> <tr><td colspan=5><strong>Skema sertifikasi : $namaskemafrmckl </br>No. Skema Sertifikasi : $kodeskemafrmckl  </strong></td></tr>	
	
	<tr><td bgcolor='#99CCFF' colspan=8> <strong>Nama Asesi : $namaasesifrmckl </br>Nama Asesor : $namaasesorfrmckl </br>Tanggal Asesment : $tglfrmckl
	</strong></td></tr>";
	
   //$tglckl=date("Y-m-d");
   
	//$listunit = mysql_fetch_array($execunit);
    
    //$ssql="select * from praktek where idskema='$idskema' and kodeunit='".$listunit['kodeunit']."'"; 
	echo "<tr><td colspan=5></td></tr>";	
    echo "<tr><td colspan=5><strong>PANDUAN BAGI ASESOR</td></tr>";
	echo "<tr><td colspan=5><strong>Isilah tabel ini sesuai dengan informasi sesuai pertanyaan/pernyataan dalam table dibawah ini </td></tr>";
	echo "<tr><td colspan=5><strong>Beri tanda centang (v) pada hasil penilaian instrumen asesmen berdasarkan tinjauan anda dengan jastifikasi professional anda. </td></tr>";
	echo "<tr><td colspan=5><strong>Berikan komentar dengan jastifikasi profesional anda</td></tr>";
	echo "<tr><td colspan=5></td></tr>";
	echo "<tr><td rowspan=2><strong>Uji Komputenesi</td><td><strong>Kode Unit</td><td colspan=3>$kodeunitfrmckl</td></tr> ";
	echo "<tr><td><strong>Judul Unit Unit</td><td colspan=3>$namaunitfrmckl</td></tr> ";
	echo "<tr><td colspan=5></td></tr>";
	
	echo "<tr><td colspan=3><strong>Kegiatan Asesmen</strong></td><td><strong>Ya</strong></td><td><strong>Tidak</strong></td></tr>";
	
	echo "<tr><td colspan=3><strong>Instruksi perangkat asesmen dan kondisi asesmen diidentifikasi dengan jelas </strong></td><td><strong><input type=radio name=ins value='Y' $insy></strong></td><td><strong><input type=radio name=ins value='T' $inst></strong></td></tr>";
	echo "<tr><td colspan=3><strong>Informasi tertulis dituliskan secara tepat </strong></td><td><strong><input type=radio name=inf value='Y' $infy></strong></td><td><strong><input type=radio name=inf value='T' $inft></strong></td></tr>";
	echo "<tr><td colspan=3><strong>Kegiatan asesmen membahas persyaratan bukti untuk kompetensi atau kompetensi
yang diases </strong></td><td><strong><input type=radio name=keg value='Y' $kegy></strong></td><td><strong><input type=radio name=keg value='T' $kegt></strong></td></tr>";
	echo "<tr><td colspan=3><strong>Tingkat kesulitan bahasa, literasi, dan berhitung sesuai dengan tingkat unit kompetensi yang dinilai</strong></td><td><strong><input type=radio name=tin value='Y' $tiny></strong></td><td><strong><input type=radio name=tin value='T' $tint></strong></td></tr>";
	echo "<tr><td colspan=3><strong>Tingkat kesulitan kegiatan sesuai dengan kompetensi atau kompetensi yang diases. </strong></td><td><strong><input type=radio name=ting value='Y' $tingy></strong></td><td><strong><input type=radio name=ting value='T' $tingt></strong></td></tr>";
    echo "<tr><td colspan=3><strong>Contoh, benchmark dan / atau ceklis asesmen tersedia untuk digunakan dalam pengambilan keputusan asesmen.</strong></td><td><strong><input type=radio name=con value='Y' $cony></strong></td><td><strong><input type=radio name=con value='T' $cont></strong></td></tr>";
	 echo "<tr><td colspan=3><strong>Diperlukan modifikasi (seperti yang diidentifikasi dalam Komentar)</strong></td><td><strong><input type=radio name=dip value='Y' $dipy></strong></td><td><strong><input type=radio name=dip value='T' $dipt></strong></td></tr>";
	 echo "<tr><td colspan=3><strong>Tugas asesmen siap digunakan </strong></td><td><strong><input type=radio name=tug value='Y' $tugy></strong></td><td><strong><input type=radio name=tug value='T' $tugt></strong></td></tr>"; 
	//

	echo "<tr></tr>";
	
	echo "<tr><td colspan=2>Nama Asesor  </br> $namaasesorfrmckl</td><td>     Tanggal : <input type=text name=tglckl value=$tglpcklfrm> <img src='$linkttdfrmckl'></strong></td><td colspan=2><strong>Ada komentar lain: <input type=text name=komenckl size=70 value='$komencklfrm'></strong></td></tr>";
	}
	
     else {
	
	echo "<table width=95% class=demo-table> <tr><td colspan=5><strong>Skema sertifikasi : $namaskemafrmckl </br>No. Skema Sertifikasi : $kodeskemafrmckl  </strong></td></tr>	
	
	<tr><td bgcolor='#99CCFF' colspan=8> <strong>Nama Asesi : $namaasesifrmckl </br>Nama Asesor : $namaasesorfrmckl </br>Tanggal Asesment : $tglfrmckl
	</strong></td></tr>";
	
   $tglckl=date("Y-m-d");
   
	//$listunit = mysql_fetch_array($execunit);
    
    //$ssql="select * from praktek where idskema='$idskema' and kodeunit='".$listunit['kodeunit']."'"; 
	echo "<tr><td colspan=5></td></tr>";	
    echo "<tr><td colspan=5><strong>PANDUAN BAGI ASESOR</td></tr>";
	echo "<tr><td colspan=5><strong>Isilah tabel ini sesuai dengan informasi sesuai pertanyaan/pernyataan dalam table dibawah ini </td></tr>";
	echo "<tr><td colspan=5><strong>Beri tanda centang (v) pada hasil penilaian instrumen asesmen berdasarkan tinjauan anda dengan jastifikasi professional anda. </td></tr>";
	echo "<tr><td colspan=5><strong>Berikan komentar dengan jastifikasi profesional anda</td></tr>";
	echo "<tr><td colspan=5></td></tr>";
	echo "<tr><td rowspan=2><strong>Uji Komputenesi</td><td><strong>Kode Unit</td><td colspan=3>$kodeunitfrmckl</td></tr> ";
	echo "<tr><td><strong>Judul Unit Unit</td><td colspan=3>$namaunitfrmckl</td></tr> ";
	echo "<tr><td colspan=5></td></tr>";
	
	echo "<tr><td colspan=3><strong>Kegiatan Asesmen</strong></td><td><strong>Ya</strong></td><td><strong>Tidak</strong></td></tr>";
	
	echo "<tr><td colspan=3><strong>Instruksi perangkat asesmen dan kondisi asesmen diidentifikasi dengan jelas </strong></td><td><strong><input type=radio name=ins value='Y'></strong></td><td><strong><input type=radio name=ins value='T'></strong></td></tr>";
	echo "<tr><td colspan=3><strong>Informasi tertulis dituliskan secara tepat </strong></td><td><strong><input type=radio name=inf value='Y'></strong></td><td><strong><input type=radio name=inf value='T'></strong></td></tr>";
	echo "<tr><td colspan=3><strong>Kegiatan asesmen membahas persyaratan bukti untuk kompetensi atau kompetensi
yang diases </strong></td><td><strong><input type=radio name=keg value='Y'></strong></td><td><strong><input type=radio name=keg value='T'></strong></td></tr>";
	echo "<tr><td colspan=3><strong>Tingkat kesulitan bahasa, literasi, dan berhitung sesuai dengan tingkat unit kompetensi yang dinilai</strong></td><td><strong><input type=radio name=tin value='Y'></strong></td><td><strong><input type=radio name=tin value='T'></strong></td></tr>";
	echo "<tr><td colspan=3><strong>Tingkat kesulitan kegiatan sesuai dengan kompetensi atau kompetensi yang diases. </strong></td><td><strong><input type=radio name=ting value='Y'></strong></td><td><strong><input type=radio name=ting value='T'></strong></td></tr>";
    echo "<tr><td colspan=3><strong>Contoh, benchmark dan / atau ceklis asesmen tersedia untuk digunakan dalam pengambilan keputusan asesmen.</strong></td><td><strong><input type=radio name=con value='Y'></strong></td><td><strong><input type=radio name=con value='T'></strong></td></tr>";
	 echo "<tr><td colspan=3><strong>Diperlukan modifikasi (seperti yang diidentifikasi dalam Komentar)</strong></td><td><strong><input type=radio name=dip value='Y'></strong></td><td><strong><input type=radio name=dip value='T'></strong></td></tr>";
	 echo "<tr><td colspan=3><strong>Tugas asesmen siap digunakan </strong></td><td><strong><input type=radio name=tug value='Y'></strong></td><td><strong><input type=radio name=tug value='T'></strong></td></tr>"; 
	//

	echo "<tr><td colspan=5></td></tr>";
	
	echo "<tr><td colspan=2>Nama Asesor  </br> $namaasesorfrmckl</td><td>     Tanggal : <input type=text name=tglckl value=$tglckl> <img src='$linkttdfrmckl'></strong></td><td colspan=2><strong>Ada komentar lain: <input type=text name=komenckl size=70></strong></td></tr>";
    //$exec=mysql_query($ssql);
	 } 
      echo "<tr><td colspan=5>";
	  //echo "<input type=hidden name='n' value='3'>";
      echo "</td></tr>";
      echo "<tr><td colspan=7><input type=submit name=simpan id=gobutton value=Simpan></td></tr>";
      echo "</table>";

}

else if($op=="postcklfrm")
{
	//$email=trim($_POST['email']);
	$idskemapockl=$_POST['idskemaformckl'];
	$idasesipockl=$_POST['idadsesiformckl'];
	$idasesorpockl=$_POST['idasesorformckl'];
	$idunitpockl=$_POST['idunitformckl'];
	$tglpockl=$_POST['tglckl'];
	$komenpockl=$_POST['komenckl'];
	
	$n = $_POST['n'];
	$sukses=0;
	$gagal=0;
	$ntot=0;
	$sup=0;
	//echo $kelompok;
	//for ($i=0; $i<=$n-1; $i++)
	//{
     
     if (isset($_POST['ins']) and isset($_POST['inf']) and isset($_POST['keg'])  and isset($_POST['tin']) and isset($_POST['ting'])  and isset($_POST['con'])  and isset($_POST['dip'])  and isset($_POST['tug']) )
     {
	  
       	$ketcklfrm=$_POST['ins'].",".$_POST['inf'].",".$_POST['keg'].",".$_POST['tin'].",".$_POST['ting'].",".$_POST['con'].",".$_POST['dip'].",".$_POST['tug'];
      
        $cekdatackl="select * from cekinstrumen where idskemacek='".$idskemapockl."' and idasesorcek='".$idasesorpockl."' and idasesicek='".$idasesipockl."' and idunitcek='".$idunitpockl."'";
		echo "klkdlskd".$cekdatackl."</br>";
        $adackl=mysql_query($cekdatackl);
        $adakckl=mysql_num_rows($adackl);
         //echo "hh".$adak; 
		if($adakckl>0){
		
	   $ssqlcklu="update cekinstrumen set jawabancek='$ketcklfrm',tglcek='$tglpockl', komencek='$komenpockl' where idskemacek='".$idskemapockl."' and idasesorcek='".$idasesorpockl."' and idasesicek='".$idasesipockl."' and idunitcek='".$idunitpockl."'";
        //echo $ssqlphku;
        $okpcklu=mysql_query($ssqlcklu);
         if($okpcklu){
         	$sup++;
         }
          //echo "ada ..";
          }else { 

        $ssqlpockl="insert into cekinstrumen value('','$idskemapockl','$idasesorpockl','$idasesipockl','$idunitpockl','$ketcklfrm','$tglpockl','$komenpockl')";
        //echo $ssqlpockl;
        $okcklpkt=mysql_query($ssqlpockl);	
        if ($okcklpkt) {
		$sukses++;
		
                  } else { $gagal++; }
               }	
     }   
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
	$queryceklist ="SELECT * FROM pemetaan where idasesor='$idasesor' group by kelompok,idskema";
	$hasilceklist = mysql_query($queryceklist);
	//$ada=mysql_query($);
   	if(mysql_num_rows($hasilceklist)>0){
?>
	<table class=demo-table  >
	<thead>
	<tr>
    <th bgcolor='#aaff99'>No</th>	
    <th bgcolor='#aaff99'>Paket</th>
    <th bgcolor='#aaff99'>Skema</th>
    <th bgcolor='#006699'>Nama Skema</th>
    <th bgcolor='#006699' colspan='2'>Aksi</th>
    
	</tr>
	</thead> 
	<?php
 
// bagian ini digunakan untuk menampilkan semua data
 
	$no = 1;
	//echo $query;
	while ($dataceklist = mysql_fetch_array($hasilceklist))
	{
		$ssqlceklist="select * from skema where idskema=".$dataceklist['idskema'];
		//echo $ssql;
		$execssqlceklist=mysql_query($ssqlceklist);
		$barisceklist=mysql_fetch_array($execssqlceklist);
		$namaskemaceklist=$barisceklist['namaskema'];
		echo "<tr>";
		echo "<td bgcolor='#99CCFF'>".$no."</td>";
		//echo "<td bgcolor='#99CCFF'>".$data['id_user']."</td>";
		echo "<td bgcolor='#99CCFF' align=left>".$dataceklist['kelompok']."</td>";
		echo "<td bgcolor='#99CCFF' align=left>".$dataceklist['idskema']."</td>";
		echo "<td bgcolor='#99CCFF' align=left>".$namaskemaceklist."</td>";  	
		echo "<td><a href=\"".$_SERVER['PHP_SELF'].
        "?op=pilihtglceklist&idasesor=".$dataceklist['idasesor']."&idskema=".$dataceklist['idskema']."&kelompok=".$dataceklist['kelompok']."\"><span class='glyphicon glyphicon-user'>Tampilkan Peserta</a> 
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
			
</body>
</html>

<?php 
 }
} ?>
