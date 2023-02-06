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
			<li class="active"><a href="pihakketiga.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> FR.IA.10 Pihak Ketiga</a></li>
			<li><a href="ceklistintrumen.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> FR.IA.11 Ceklist Instrumen Asesmen</a></li>
			<li ><a href="tandatanganass.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></use></svg> Tanda Tangan</a></li>
			<li role="presentation" class="divider"></li>	
			<li><a href="../logout.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg> Logout</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<h4>Klarifikasi Pihak Ketiga</h4>
                        
</div><!--/.row-->
		
		<!--/.row-->
				
		<div class="row">
			<div class="col-lg-12">
<!--data nu baru -->

<?php
$op = $_GET['op'];
 
if($op=="pilihtanggalpk")
{
	$idasesorpk=$_GET['idasesor'];
	$idskemapk= $_GET['idskema'];
	$kelompokpk=$_GET['kelompok'];

	?>
	<form id="formContoh" method="POST" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=listpesertapk\"";?>> 
	<input type="hidden" name="kelompokpk" value="<?php echo $kelompokpk ;?>">
	<input type="hidden" name="idskemapk" value="<?php echo $idskemapk ;?>">
	<input type="hidden" name="idasesorpk" value="<?php echo $idasesorpk ;?>">

	<div class="form-group"><strong>Pilih Tanggal :</strong>
	<select id="tglpk" name="tglpk" placeholder="Tanggal" autofocus>
	<?php
      $tampiltglpk="select * from pemetaan where kelompok='$kelompokpk' and idskema='$idskemapk' and idasesor='$idasesorpk' group by tanggal";
      $exectglpk=mysql_query($tampiltglpk);
      //echo $tampiltgl;
		while($rtglpk=mysql_fetch_array($exectglpk))
		{
                //         echo "ll";
			    $namaassapk=$rtglpk['namaasesor'];
   				echo "<option value=$rtglpk[tanggal] selected>$rtglpk[tanggal]</option> ";
					}
?>
	</select>
	</div>
	<input type="submit" id="gobutton" value="Lanjutkan" class="button"> 
	<?php echo "<input type=hidden name=namasportopk value='$namaassapk'> </form>";
}


else if ($op == "listpesertapk")
{
    $idasesorpkk=$_POST['idasesorpk'];
    $idskemapkk= $_POST['idskemapk'];
    $kelompokpkk=$_POST['kelompokpk'];
    $tglpkk=$_POST['tglpk'];
    $namaasesorpkk=$_POST['namasportopk'];
    $sqluserpkk="select linkttd,id_user from lsp_usertbl where id_user='$idasesorpkk'";
    $sqluserapkk=mysql_query($sqluserpkk);
    $sqluserbpkk=mysql_fetch_array($sqluserapkk);
    $sslpkk="select * from pemetaan where kelompok='$kelompokpkk' and idskema='$idskemapkk' and tanggal='$tglpkk' and idasesor='$idasesorpkk'";
    $exec0pkk=mysql_query($sslpkk);
    //echo "laksl".$ssl;
    echo "<table class=demo-table>";
    echo "<thead><tr><th bgcolor='#006699'>ID Asesi</th><th bgcolor='#006699'>Nama Asesi</th><th bgcolor='#006699'>Tanggal</th><th colspan=2 bgcolor='#006699'>Aksi</th></tr></thead>";
     while($hasil0pkk = mysql_fetch_array($exec0pkk))
      {
      
      
      echo "<tr><td>".$hasil0pkk['idpeserta']."</td>";
      echo "<td>".$hasil0pkk['namapeserta']."</td>";
      echo "<td>".$hasil0pkk['tanggal']."</td>";

		echo "<td><a href=\"".$_SERVER['PHP_SELF'].
        "?op=pkob&idasesor=".$hasil0pkk['idasesor']."&kelompok=".$kelompokpkk."&tgl=".$hasil0pkk['tanggal']."&idasesi=".$hasil0pkk['idpeserta']."&idskema=".$idskemapkk."&lkttd=".$sqluserbpkk['linkttd']."&nmass=".$namaasesorpkk."\"><span class='glyphicon glyphicon-edit'>Tampilkan Unit</a></td></tr>";
       
    }
    echo "<table class=demo-table>";
      
	  
    
}

else if($op=="pkob")
{
$idskema= $_GET['idskema'];
$idasesi= $_GET['idasesi'];
$tgl= $_GET['tgl'];
$kelompok=$_GET['kelompok'];
$namasesor=$_GET['nmass'];
$llinkttd=$_GET['lkttd'];


$ie=$_GET['kode'];
//echo $ie;
$sqlunit="select * from unit where idskema='$idskema'";

$execunit=mysql_query($sqlunit);


$sqlskema="select * from skema where idskema='$idskema'";
$execskema=mysql_query($sqlskema);
$listskema = mysql_fetch_array($execskema);
$namaskema=$listskema['namaskema'];
$kodeskema=$listskema['kodeskema'];

$sqladsesi="select * from lsp_usertbl where id_user='$idasesi'";
$execadsesi=mysql_query($sqladsesi);
$listadsesi = mysql_fetch_array($execadsesi);
$namaadsesi=$listadsesi['nama'];
$emailadsesi=$listadsesi['email'];
//$lkttdasesi=$listadsesi['linkttd'];
$sqlunitz="select unitsiswa.idunit,unitsiswa.idskema,unitsiswa.idadsesi,unit.kodeunit,unit.namaunit from unitsiswa inner join unit on unitsiswa.idunit=unit.idunit where unitsiswa.idskema='$idskema' and unitsiswa.idadsesi='$idasesi'";
//echo $sqlunitz;
$execunitz=mysql_query($sqlunitz); 

echo "<input type=hidden name=idasesor value='$idasesor'>";
echo "<input type=hidden name=idadsesi value='$idasesi'>";
echo "<input type=hidden name=idskema value='$idskema'>";
echo "<input type=hidden name=tgl value='$tgl'>";
echo "<input type=hidden name=kelompok value='$kelompok'>";
echo "<input type=hidden name=email value='$emailadsesi'>";
//echo "<input type=text name=nmasesor value='$namasesor'>";

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
	//echo "<td>$keto</td>";

	echo "<td colspan=2><a href=\"".$_SERVER['PHP_SELF'].
			"?op=frmpihakketiga&kode=in&kou=".$daftaobservasi['kodeunit']."&lttd=".$ttdfrm."&namaunit=".$daftaobservasi['namaunit']."&idunit=".$daftaobservasi['idunit']."&idass=".$idasesor."&namaskema=".$namaskema."&kodeskema=".$kodeskema."&nmasesi=".$namaadsesi."&k=".$kelompok."&tgl=".$tgl."&idasesi=".$daftaobservasi['idadsesi']."&nmasesor=".$namasesor."&idskema=".$daftaobservasi['idskema']."\"><span class='glyphicon glyphicon-check'>Formulir</a></td>";
	echo "</td></tr>";
}


}




else if($op=="frmpihakketiga")
{
	?>
    <button type="button" class="btn btn-primary" onclick="window.print()">Print Halaman Ini</button>
    <?php
	
	$namaasesifrm=$_GET['nmasesi'];
	$namaskemafrm=$_GET['namaskema'];
	$kodeskemafrm=$_GET['kodeskema'];
	$kodeunitfrm=$_GET['kou'];
	$namaunitfrm=$_GET['namaunit'];
	$idasesifrm=$_GET['idasesi'];
	$idasesorfrm=$_GET['idass'];
	$idunitfrm=$_GET['idunit'];
	$tglfrm=$_GET['tgl'];
	$idskemafrm=$_GET['idskema'];
	$namaasesorfrm=$_GET['nmasesor'];
	$linkttdfrm=$_GET['lttd'];
	$linkttdfrm="../imgttd/".$linkttdfrm;
	?>
<form id="ban" name="ban" method="POST" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=postpktfrm\"";?>>
	<?php
	echo "<input type=hidden name=idasesor value='$idasesorfrm'>";
	echo "<input type=hidden name=idadsesi value='$idasesifrm'>";
	echo "<input type=hidden name=idskema value='$idskemafrm'>";
	echo "<input type=hidden name=tgl value='$tglfrm'>";
	echo "<input type=hidden name=idunit value='$idunitfrm'>";
	$cekdatapktt="select * from pihakketiga where idskemaphktiga='".$idskemafrm."' and idasesorphktiga='".$idasesorfrm."' and idasesiphktiga='".$idasesifrm."' and idunitphktiga='".$idunitfrm."'";
    $adapktt=mysql_query($cekdatapktt);
    $adakpktt=mysql_num_rows($adapktt);
	$datapkttfrm=mysql_fetch_array($adapktt);
	$tempatkptfrm=$datapkttfrm['tempatkerja'];
	$alamatpfrm=$datapkttfrm['alamat'];
	$notlppfrm=$datapkttfrm['notlp'];
	$hubuganpfrm=$datapkttfrm['hubunganphktiga'];
	$lamakpfrm=$datapkttfrm['lamaphktiga'];
	$dekatpfrm=$datapkttfrm['dekatphktiga'];
	$pengalamanpfrm=$datapkttfrm['pengalamanphktiga'];
	$standarpfrm=$datapkttfrm['standarphktiga'];
	$kebutuhanpfrm=$datapkttfrm['kebutuhanphktiga'];
	$komentarpfrm=$datapkttfrm['komenphktiga'];
	$jawabanfrm=$datapkttfrm['jawabanphktiga'];
	$pecahjawabphktiga=explode(",",$jawabanfrm);
	$timfrm=$pecahjawabphktiga[0];
	$harfrm=$pecahjawabphktiga[1];
	$tugasfrm=$pecahjawabphktiga[2];
	$adapfrm=$pecahjawabphktiga[3];
	$responfrm=$pecahjawabphktiga[4];
	$sediafrm=$pecahjawabphktiga[5];
	if($timfrm=='Y'){
          $ctimy="checked";}
         else {
          $ctimy=" ";}	
	if($timfrm=='T'){
          $ctimt="checked";}
         else {
          $ctimt=" ";}	
	if($harfrm=='Y'){
          $chary="checked";}
         else {
          $chary=" ";}	
	if($harfrm=='T'){
          $chart="checked";}
         else {
          $chart=" ";}	
	if($tugasfrm=='Y'){
          $ctugasy="checked";}
         else {
          $ctugasy=" ";}	
	if($tugasfrm=='T'){
          $ctugast="checked";}
         else {
          $ctugast=" ";}	
	if($adapfrm=='Y'){
          $cadapy="checked";}
         else {
          $cadapy=" ";}	
	if($adapfrm=='T'){
          $cadapt="checked";}
         else {
          $cadapt=" ";}	
	if($responfrm=='Y'){
          $crespony="checked";}
         else {
          $crespony=" ";}	
	if($responfrm=='T'){
          $crespont="checked";}
         else {
          $crespont=" ";}	
	if($sediafrm=='Y'){
          $csediay="checked";}
         else {
          $csediay=" ";}	
	if($sediafrm=='T'){
          $csediat="checked";}
         else {
          $csediat=" ";}	
		  

		  
		  
		  
   // echo "hh".$cekdatapktt; 
	if($adakpktt>0){
		
		//echo "ada ..";
		
		echo "<table width=95% class=demo-table> <tr><td colspan=5><strong>Skema sertifikasi : $namaskemafrm </br>No. Skema Sertifikasi : $kodeskemafrm  </strong></td></tr>	
	
	<tr><td bgcolor='#99CCFF' colspan=8> <strong>Nama Asesi : $namaasesifrm </br>Nama Asesor : $namaasesorfrm </br>Tanggal Asesment : $tglfrm
	</strong></td></tr>";
	
   $tglban=date("Y-m-d");
   
	//$listunit = mysql_fetch_array($execunit);
    
    //$ssql="select * from praktek where idskema='$idskema' and kodeunit='".$listunit['kodeunit']."'"; 
	echo "<tr><td colspan=5></td></tr>";	
    echo "<tr><td colspan=5><strong>PANDUAN BAGI ASESOR</td></tr>";
	echo "<tr><td colspan=5><strong>Lengkapi formulir ini sesuai dengan pertanyaan/pertanyaan dalam tabel ini secara seksama </td></tr>";
	echo "<tr><td colspan=5></td></tr>";
	echo "<tr><td rowspan=2><strong>Uji Komputenesi</td><td><strong>Kode Unit</td><td colspan=3>$kodeunitfrm</td></tr> ";
	echo "<tr><td><strong>Judul Unit Unit</td><td colspan=3>$namaunitfrm</td></tr> ";
	echo "<tr><td colspan=5></td></tr>";
	echo "<tr><td colspan=5>Nama Pengawas/penyelia/atasan/orang lain di perusahaan :</td></tr>";
	echo "<tr><td>Tempat kerja :</td><td colspan=4> <input type=text name=tkerja size=80 value='$tempatkptfrm'></td> </tr>";
	echo "<tr><td>Alamat :</td><td colspan=4> <input type=text name=talamat size=80 value='$alamatpfrm'></td> </tr>";
	echo "<tr><td>No. Telepon :</td><td colspan=4> <input type=text name=tnotlp size=20 value='$notlppfrm'></td> </tr>";
	echo "<tr><td></td></tr>";
    echo "<tr><td colspan=3><strong>Pertanyaan </strong></td><td><strong>Ya</strong></td><td><strong>Tidak</strong></td></tr>";
	//
	echo "<tr><td colspan=3><strong>Apakah asesi bekerja dengan mempertimbangkan Kesehatan, Keamanan dan Keselamatan Kerja?  </strong></td><td><strong><input type=radio name=tim value='Y' $ctimy></strong></td><td><strong><input type=radio name=tim value='T' $ctimt></strong></td></tr>";
	echo "<tr><td colspan=3><strong>Apakah asesi berinteraksi dengan harmonis didalam kelompoknya? </strong></td><td><strong><input type=radio name=har value='Y' $chary></strong></td><td><strong><input type=radio name=har value='T' $chart></strong></td></tr>";
	echo "<tr><td colspan=3><strong>Apakah asesi dapat mengelola tugas-tugas secara bersamaan?  </strong></td><td><strong><input type=radio name=tugas value='Y' $ctugasy></strong></td><td><strong><input type=radio name=tugas value='T' $ctugast></strong></td></tr>";
	echo "<tr><td colspan=3><strong>Apakah asesi dapat dengan cepat beradaptasi dengan peralatan dan lingkungan yang baru?  </strong></td><td><strong><input type=radio name=adap value='Y' $cadapy></strong></td><td><strong><input type=radio name=adap value='T' $cadapt></strong></td></tr>";
	echo "<tr><td colspan=3><strong>Apakah asesi dapat merespon dengan cepat masalah-masalah yang ada di tempat kerjanya?  </strong></td><td><strong><input type=radio name=respon value='Y' $crespony></strong></td><td><strong><input type=radio name=respon value='T'$crespont></strong></td></tr>";
    echo "<tr><td colspan=3><strong>Apakah Anda bersedia dihubungi jika verifikasi lebih lanjut dari pernyataan ini diperlukan?</strong></td><td><strong><input type=radio name=sedia value='Y' $csediay></strong></td><td><strong><input type=radio name=sedia value='T' $csediat></strong></td></tr>";	
	//
	echo "<tr><td colspan=5><strong>Apa hubungan Anda dengan asesi? <input type=text name=hubungan size=70 value='$hubuganpfrm'></strong></td></tr>";
	echo "<tr><td colspan=5><strong>Berapa lama Anda bekerja dengan asesi? <input type=text name=lama size=70 value='$komentarpfrm'></strong></td></tr>";
	echo "<tr><td colspan=5><strong>Seberapa dekat Anda bekerja dengan asesi di area yang dinilai?<input type=text name=dekat size=70 value='$dekatpfrm'></strong></td></tr>";
	echo "<tr><td colspan=5><strong>Apa pengalaman teknis dan / atau kualifikasi Anda di bidang yang dinilai? (termasuk asesmen atau
kualifikasi pelatihan)<input type=text name=pengalaman size=70 value='$pengalamanpfrm'></strong></td></tr>";
	echo "<tr><td colspan=5><strong>Secara keseluruhan, apakah Anda yakin asesi melakukan sesuai standar yang diminta oleh unit kompetensi secara konsisten?<input type=text name=standar size=70 value='$standarpfrm'></strong></td></tr>";
	echo "<tr><td colspan=5><strong>Identifikasi kebutuhan pelatihan lebih lanjut untuk asesi: <input type=text name=kebutuhan size=70 value='$kebutuhanpfrm'></strong></td></tr>";
	echo "<tr><td colspan=5><strong>Ada komentar lain: <input type=text name=komen size=70 value='$komentarpfrm'></strong></td></tr>";
	
	echo "<tr><td colspan=3>Tanda tangan <img src='$linkttdfrm' </td><td colspan=2>     Tanggal : <input type=text name=tglban value=$tglban readonly></strong></td></tr>";
    
	}
     else {
	
	echo "<table width=95% class=demo-table> <tr><td colspan=5><strong>Skema sertifikasi : $namaskemafrm </br>No. Skema Sertifikasi : $kodeskemafrm  </strong></td></tr>	
	
	<tr><td bgcolor='#99CCFF' colspan=8> <strong>Nama Asesi : $namaasesifrm </br>Nama Asesor : $namaasesorfrm </br>Tanggal Asesment : $tglfrm
	</strong></td></tr>";
	
   $tglban=date("Y-m-d");
   
	//$listunit = mysql_fetch_array($execunit);
    
    //$ssql="select * from praktek where idskema='$idskema' and kodeunit='".$listunit['kodeunit']."'"; 
	echo "<tr><td colspan=5></td></tr>";	
    echo "<tr><td colspan=5><strong>PANDUAN BAGI ASESOR</td></tr>";
	echo "<tr><td colspan=5><strong>Lengkapi formulir ini sesuai dengan pertanyaan/pertanyaan dalam tabel ini secara seksama </td></tr>";
	echo "<tr><td colspan=5></td></tr>";
	echo "<tr><td rowspan=2><strong>Uji Komputenesi</td><td><strong>Kode Unit</td><td colspan=3>$kodeunitfrm</td></tr> ";
	echo "<tr><td><strong>Judul Unit Unit</td><td colspan=3>$namaunitfrm</td></tr> ";
	echo "<tr><td colspan=5></td></tr>";
	echo "<tr><td colspan=5>Nama Pengawas/penyelia/atasan/orang lain di perusahaan :</td></tr>";
	echo "<tr><td>Tempat kerja :</td><td colspan=4> <input type=text name=tkerja size=80></td> </tr>";
	echo "<tr><td>Alamat :</td><td colspan=4> <input type=text name=talamat size=80></td> </tr>";
	echo "<tr><td>No. Telepon :</td><td colspan=4> <input type=text name=tnotlp size=20></td> </tr>";
	echo "<tr><td></td></tr>";
    echo "<tr><td colspan=3><strong>Pertanyaan </strong></td><td><strong>Ya</strong></td><td><strong>Tidak</strong></td></tr>";
	//
	echo "<tr><td colspan=3><strong>Apakah asesi bekerja dengan mempertimbangkan Kesehatan, Keamanan dan Keselamatan Kerja?  </strong></td><td><strong><input type=radio name=tim value='Y'></strong></td><td><strong><input type=radio name=tim value='T'></strong></td></tr>";
	echo "<tr><td colspan=3><strong>Apakah asesi berinteraksi dengan harmonis didalam kelompoknya? </strong></td><td><strong><input type=radio name=har value='Y'></strong></td><td><strong><input type=radio name=har value='T'></strong></td></tr>";
	echo "<tr><td colspan=3><strong>Apakah asesi dapat mengelola tugas-tugas secara bersamaan?  </strong></td><td><strong><input type=radio name=tugas value='Y'></strong></td><td><strong><input type=radio name=tugas value='T'></strong></td></tr>";
	echo "<tr><td colspan=3><strong>Apakah asesi dapat dengan cepat beradaptasi dengan peralatan dan lingkungan yang baru?  </strong></td><td><strong><input type=radio name=adap value='Y'></strong></td><td><strong><input type=radio name=adap value='T'></strong></td></tr>";
	echo "<tr><td colspan=3><strong>Apakah asesi dapat merespon dengan cepat masalah-masalah yang ada di tempat kerjanya?  </strong></td><td><strong><input type=radio name=respon value='Y'></strong></td><td><strong><input type=radio name=respon value='T'></strong></td></tr>";
    echo "<tr><td colspan=3><strong>Apakah Anda bersedia dihubungi jika verifikasi lebih lanjut dari pernyataan ini diperlukan?</strong></td><td><strong><input type=radio name=sedia value='Y'></strong></td><td><strong><input type=radio name=sedia value='T'></strong></td></tr>";	
	//
	echo "<tr><td colspan=5><strong>Apa hubungan Anda dengan asesi? <input type=text name=hubungan size=70></strong></td></tr>";
	echo "<tr><td colspan=5><strong>Berapa lama Anda bekerja dengan asesi? <input type=text name=lama size=70></strong></td></tr>";
	echo "<tr><td colspan=5><strong>Seberapa dekat Anda bekerja dengan asesi di area yang dinilai?<input type=text name=dekat size=70></strong></td></tr>";
	echo "<tr><td colspan=5><strong>Apa pengalaman teknis dan / atau kualifikasi Anda di bidang yang dinilai? (termasuk asesmen atau
kualifikasi pelatihan)<input type=text name=pengalaman size=70></strong></td></tr>";
	echo "<tr><td colspan=5><strong>Secara keseluruhan, apakah Anda yakin asesi melakukan sesuai standar yang diminta oleh unit kompetensi secara konsisten?<input type=text name=standar size=70></strong></td></tr>";
	echo "<tr><td colspan=5><strong>Identifikasi kebutuhan pelatihan lebih lanjut untuk asesi: <input type=text name=kebutuhan size=70></strong></td></tr>";
	echo "<tr><td colspan=5><strong>Ada komentar lain: <input type=text name=komen size=70></strong></td></tr>";
	
	echo "<tr><td colspan=3>Tanda tangan <img src='$linkttdfrm' </td><td colspan=2>     Tanggal : <input type=text name=tglban value=$tglban readonly></strong></td></tr>";
    //$exec=mysql_query($ssql);
	 } 
      echo "<tr><td>";
	  //echo "<input type=hidden name='n' value='3'>";
      echo "</td></tr>";
      echo "<tr><td colspan=7><input type=submit name=simpan id=gobutton value=Simpan></td></tr>";
      echo "</table>";

}

else if($op=="postpktfrm")
{
	//$email=trim($_POST['email']);
	$idskemapfrm=$_POST['idskema'];
	$idasesipfrm=$_POST['idadsesi'];
	$idasesorpfrm=$_POST['idasesor'];
	$idunitpfrm=$_POST['idunit'];
	$tglpfrm=$_POST['tgl'];
	$tempatkpfrm=$_POST['tkerja'];
	$alamatpfrm=$_POST['talamat'];
	$notlppfrm=$_POST['tnotlp'];
	$hubuganpfrm=$_POST['hubungan'];
	$lamakpfrm=$_POST['lama'];
	$dekatpfrm=$_POST['dekat'];
	$pengalamanpfrm=$_POST['pengalaman'];
	$standarpfrm=$_POST['standar'];
	$kebutuhanpfrm=$_POST['kebutuhan'];
	$komentarpfrm=$_POST['komen'];
	//$kelompok=$_POST['kelompok'];
	$n = $_POST['n'];
	$sukses=0;
	$gagal=0;
	$ntot=0;
	$sup=0;
	//echo $kelompok;
	//for ($i=0; $i<=$n-1; $i++)
	//{
     
     if (isset($_POST['tim']) and isset($_POST['har']) and isset($_POST['tugas'])  and isset($_POST['adap']) and isset($_POST['respon'])  and isset($_POST['sedia']) )
     {
	  
       	$ketpktfrm=$_POST['tim'].",".$_POST['har'].",".$_POST['tugas'].",".$_POST['adap'].",".$_POST['respon'].",".$_POST['sedia'];
      
        $cekdatapkt="select * from pihakketiga where idskemaphktiga='".$idskemapfrm."' and idasesorphktiga='".$idasesorpfrm."' and idasesiphktiga='".$idasesipfrm."' and idunitphktiga='".$idunitpfrm."'";
		//echo "klkdlskd".$cekdatapkt."</br>";
        $adapkt=mysql_query($cekdatapkt);
        $adakpkt=mysql_num_rows($adapkt);
         //echo "hh".$adak; 
		if($adakpkt>0){
		
	   $ssqlphku="update pihakketiga set jawabanphktiga='$ketpktfrm',tempatkerja='$tempatkpfrm', alamat='$alamatpfrm', notlp='$notlppfrm', hubunganphktiga='$hubuganpfrm', lamaphktiga='$lamakpfrm', dekatphktiga='$dekatpfrm', pengalamanphktiga='$pengalamanpfrm', standarphktiga='$standarpfrm', kebutuhanphktiga='$kebutuhanpfrm',komenphktiga='$komentarpfrm' where idskemaphktiga='".$idskemapfrm."' and idasesiphktiga='".$idasesipfrm."' and idasesorphktiga='".$idasesorpfrm."'  and idunitphktiga='".$idunitpfrm."'";
        //echo $ssqlphku;
        $okphkpu=mysql_query($ssqlphku);
         if($okphkpu){
         	$sup++;
         }
          //echo "ada ..";
          }else { 

        $ssqlpktp="insert into pihakketiga value('','$idskemapfrm','$idasesipfrm','$idasesorpfrm','$idunitpfrm','$ketpktfrm','$tempatkpfrm','$alamatpfrm','$notlppfrm','$hubuganpfrm','$lamakpfrm','$dekatpfrm','$pengalamanpfrm','$standarpfrm','$kebutuhanpfrm','$komentarpfrm')";
        //echo $ssqlpktp;
        $okbandingpkt=mysql_query($ssqlpktp);	
        if ($okbandingpkt) {
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
	$queryptiga ="SELECT * FROM pemetaan where idasesor='$idasesor' group by kelompok,idskema";
	$hasilptiga = mysql_query($queryptiga);
	//$ada=mysql_query($);
   	if(mysql_num_rows($hasilptiga)>0){
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
	while ($dataptiga = mysql_fetch_array($hasilptiga))
	{
		$ssqlptiga="select * from skema where idskema=".$dataptiga['idskema'];
		//echo $ssql;
		$execssqlptiga=mysql_query($ssqlptiga);
		$barisptiga=mysql_fetch_array($execssqlptiga);
		$namaskemaptiga=$barisptiga['namaskema'];
		echo "<tr>";
		echo "<td bgcolor='#99CCFF'>".$no."</td>";
		//echo "<td bgcolor='#99CCFF'>".$data['id_user']."</td>";
		echo "<td bgcolor='#99CCFF' align=left>".$dataptiga['kelompok']."</td>";
		echo "<td bgcolor='#99CCFF' align=left>".$dataptiga['idskema']."</td>";
		echo "<td bgcolor='#99CCFF' align=left>".$namaskemaptiga."</td>";  	
		echo "<td><a href=\"".$_SERVER['PHP_SELF'].
        "?op=pilihtanggalpk&idasesor=".$dataptiga['idasesor']."&idskema=".$dataptiga['idskema']."&kelompok=".$dataptiga['kelompok']."\"><span class='glyphicon glyphicon-user'>Tampilkan Peserta</a> 
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
