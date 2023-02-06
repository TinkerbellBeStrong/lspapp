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
<link href="css/bootstrap-theme.min.css" rel="stylesheet">
<link href='../css/tombol.css' rel='stylesheet' type='text/css'>
<link href="../css/tabelbaru2.css" rel="stylesheet">
<script src="js/lumino.glyphs.js"></script>
<script src="../js/jquery-2.2.3.min.js"></script>
<script src="../js/formValidation.min.js"></script>
<script src="../js/framework/bootstrap.min.js"></script>
<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<link href="../css/tabelbaru2.css" rel="stylesheet">
<script type="text/javascript">
            $(document).ready(function () {
                $('#tanggal').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
            });
        </script>
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
if ($_SESSION['level'] != 'lsp') {
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
			namaelemen: {
				validators: {
					notEmpty: {
						message: 'Tidak Boleh Kosong'
					}
				}
			},
			
			kodeelemen: {
				validators: {
					notEmpty: {
						message: 'Tidak Boleh Kosong'
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
			<li><a href="inputskema.php"><svg class="glyph stroked paperclip"><use xlink:href="#stroked-paperclip"/></svg> Kelola Skema</a></li>
			<li><a href="inputunit.php"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg> Kelola Unit</a></li>
			<li><a href="inputasesor.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Kelola Asesor</a></li>
			<li><a href="inputpeserta.php"><svg class="glyph stroked female user"><use xlink:href="#stroked-female-user"/></svg>Kelola Peserta</a></li>
			<li><a href="inputelemen.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"/></svg> Kelola Komptetensi</a></li>
			<li><a href="inputtempattuk.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg> Kelola Tempat TUK</a></li>
			<li><a href="inputsyarat.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg> Input Persyaratan</a></li>
			<li><a href="inputkumpan.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Input Umpan Balik</a></li>
			<li><a href="inputprosesasesmen.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Input Proses Asesmen</a></li>
			<li><a href="inputpengurus.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Input Pengurus</a></li>
			<li><a href="mapa.php"><svg class="glyph stroked paperclip"><use xlink:href="#stroked-paperclip"/></svg> MAPA</a></li>
			<li><a href="settanggal.php"><svg class="glyph stroked clock"><use xlink:href="#stroked-clock"/></svg> SET Tanggal</a></li>
			<li class="active"><a href="pemetaanasesor.php"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"/></use></svg> Atur jadwal</a></li>
			<li><a href="inputpraktek.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>FR.IA.01 Ceklist Observasi</a></li>
			<li><a href="inputtestulis.php"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>FR.IA.05 Pertanyaan Tertulis</a></li>
			<li><a href="validasiapl1lsp.php"><svg class="glyph stroked usb flash drive"><use xlink:href="#stroked-usb-flash-drive"/></svg> Validasi APL1</a></li>
			<li><a href="monitorasesi.php"><svg class="glyph stroked desktop computer and mobile"><use xlink:href="#stroked-desktop-computer-and-mobile"/></svg> Monitoring</a></li>
			<li><a href="backupdata.php"><svg class="glyph stroked download"><use xlink:href="#stroked-download"/></svg> Backup data</a></li>
			<li role="presentation" class="divider"></li>
			<li><a href="../logout.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg> Logout</a></li>
		</ul>

	</div><!--/.sidebar-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<h4>Atur Jadwal </h4>
                        
</div><!--/.row-->
		
		<!--/.row-->
		<div class="row">
			<div class="col-lg-12">
<!--data nu baru -->
<?php
$op = $_GET['op'];
 
if ($op == "setpemetaan")
{
	$iduser=$_GET['iduser'];
	$namaasesor=$_GET["namaa"];

	$cektgl="select * from settanggal where status='A'";
	$ada=mysql_query($cektgl);
		if(mysql_num_rows($ada)>0){
	echo "<form id=\"formContoh\" method=\"post\" action=\"".$_SERVER['PHP_SELF'].
			"?op=setpemetaan1\">";
	echo "<input type=hidden name=iduser value='$iduser'>";
	echo "<input type=hidden name=namaa value='$namaasesor'>";
	?>
	<div class="form-group"><strong>Pilih Skema yang mau diSET :</strong>
	<select class="form-control" id="idskema" name="idskema" placeholder="Skema" autofocus>
			  <?php
			  $tampil=mysql_query("SELECT * FROM skema ORDER BY idskema");
	while($r=mysql_fetch_array($tampil)){
	echo "<option value=$r[idskema]>$r[namaskema]</option>";
	}
	echo "</select";
	?>

	<div class="form-group"><strong>Pilih Paket/Group :</strong>
	<select class="form-control" id="kelompok" name="kelompok" placeholder="kelompok">
	<?php 
	$v=1;
	while ($v<=30){
	echo "<option value=$v>Paket $v</option>";
	$v++;
	}
	echo "</select>";
	?>
	<select class="form-control" name="tanggal" placeholder="Skema">
			  <?php
			  $tampil=mysql_query("SELECT * FROM settanggal where status='A' group by tanggal ");
	while($r=mysql_fetch_array($tampil)){
	echo "<option value=$r[tanggal]>$r[tanggal]</option>";
	}
	echo "</select";

	//<div class="form-group"><strong>Tanggal :</strong>
	  //  <input type="text" name="tanggal" id="tanggal" placeholder="Tanggal" class="form-control">
	  //</div>
	 //<?php
	echo "
	<p>
	<div class='buttons'>
	<input id='gobutton' type='submit' value='Lanjutkan' /></td></tr>";
	}else {
	echo "<font color=red>Tanggal belum di set..</font>";}
	}

	else if ($op == "setpemetaan1")
	{
	echo "<form id=\"formContoh\" method=\"post\" action=\"".$_SERVER['PHP_SELF'].
			"?op=prosespemetaan1\">";

	$idasesor=$_POST["iduser"];
	$kelompok=$_POST["kelompok"];
	$idskema=$_POST["idskema"];
	$tanggal=$_POST["tanggal"];
	$namaasesor=$_POST["namaa"];
	//echo "llll".$tanggal; 
	if(empty($tanggal)){
		echo"<script>alert('Tanggal masih kosong !');history.go(-1);</script>"; }
		else{
		$cekdata="select * from permohonan where idskema='".$idskema."' and statuspmt='N' and statusvalid='Y'";
		//echo "llll".$cekdata;
		$ada=mysql_query($cekdata);	
		if(mysql_num_rows($ada)>0){    
			$sqla="select * from lsp_usertbl where id_user='$idasesor'";
			$ahasil=mysql_query($sqla);
			$ahasil1=mysql_fetch_array($ahasil);
			$namaas=$ahasil1["nama"];
			//$sql="select permohonan.id_user,permohonan.nama,permohonan.tanggal,apl1.namalembaga,apl1.jurusan from permohonan inner join apl1 on permohonan.email=apl1.email where permohonan.idskema='$idskema' and  permohonan.statuspmt='N' and permohonan.tanggal='$tanggal' order by permohonan.nama";
			//echo $sql;
			$sql="select * from lsp_usertbl where kode='$tanggal' order by nama";
			echo $sql;
			$hasil=mysql_query($sql);
			echo"<input type=hidden name=idasesor value=$idasesor>";
			echo"<input type=hidden name=idskema value=$idskema>";
			echo"<input type=hidden name=tanggal value=$tanggal>";
			echo"<input type=hidden name=kelompok value=$kelompok>";
			echo"<input type=hidden name=namaasesor value='$namaasesor'>";

			echo "<table width=90% class=demo-table>";
			echo "<tr><td bgcolor='#006699' colspan=2><strong> Asesor : $namaas | Paket $kelompok | Tanggal : $tanggal</strong></td></tr>";
			echo "<tr><td bgcolor='#99CCFF'>ID User (Asesi) </td><td bgcolor='#99CCFF'>Nama </td></tr>"; 
			$i=0;
			while ($data=mysql_fetch_array($hasil)){
			$iduser=$data["id_user"];
			$nama=$data["nama"];
			$lembaga=$data["namalembaga"];
			$jurusan=$data["jurusan"];
			$cekpeme="Select * from pemetaan where idpeserta='$iduser' and idskema='$idskema'";
			//echo "ll".$cekpeme;
			$cekpemea=mysql_query($cekpeme);
			$cekpemeaa=mysql_fetch_array($cekpemea);
			if(mysql_num_rows($cekpemea)>0){
			echo "<tr><td><font color=red> Sudah dipetakan </font> -->".$cekpemeaa['namaasesor']."</td><td>$nama -> <font color=red>$jurusan </font>-> <font color=green>$lembaga </font><input type=hidden name=nama".$i." value='$nama'></td></tr>";
			} else {
			echo "<tr><td><input type=checkbox name=id".$i." value='$iduser'> ".$iduser." </td><td>$nama -> <font color=red>$jurusan </font>-> <font color=green>$lembaga </font><input type=hidden name=nama".$i." value='$nama'></td></tr>";
			}

			$i++;
			}
			echo "<p>

		<input type='hidden' name='n' value='".$i."' />
		<div class='buttons'>
		<tr><td colspan=2><input id='gobutton' type='submit' value='Simpan' /></td></tr></table>";
		}else{echo"<script>alert('Tidak Ada Permohonan dalam skema ini !');history.go(-1);</script>";}
		}
		echo "</form>";
}

else if ($op == "prosespemetaan1")
{
	$n = $_POST['n'];
	$idasesor=$_POST["idasesor"];
	$kelompok=$_POST["kelompok"];
	$idskema=$_POST["idskema"];
	$tanggal=$_POST["tanggal"];
	$tanggal = date('Y-m-d', strtotime($tanggal));
	$namaasesor=$_POST["namaasesor"];
	for ($i=0; $i<=$n-1; $i++)
	{
    if (isset($_POST['id'.$i]))
     {
		$idasesi = $_POST['id'.$i];
		$nasesi=$_POST['nama'.$i];
		$cekdulupem="select * from pemetaan where idskema='$idskema' and idasesor='$idasesor' and kelompok='$kelompok' and tanggal='$tanggal' and idpeserta='$idasesi'";
		//echo $cekdulupem;
		$cekdulupema=mysql_query($cekdulupem);
		$cekdulupemb=mysql_num_rows($cekdulupema);
		if ($cekdulupemb>0)
        { echo "Duplikat ... ";}
		else {    	
		$sql="insert into pemetaan value('','$idskema','$idasesor','$namaasesor','$kelompok','$tanggal','$idasesi','$nasesi','N')";
		//echo $sql;
		$ece=mysql_query($sql);
		if ($ece)
		{
		$rubah="update permohonan set statuspmt='Y' where idskema='$idskema' and id_user='$idasesi' and tanggal='$tanggal'";
		$rece=mysql_query($rubah);
		if($rece)
		{
     	echo " Sukses ...";
		}
		}
     
		}
	}
   }
}

else if ($op == "listpemetaan")
{
	?>
    <button type="button" class="btn btn-primary" onclick="window.print()">Print Halaman Ini</button>
    <?php
	$idasesor=$_GET['iduser'];
	echo "<form id=\"formContoh\" method=\"post\" action=\"".$_SERVER['PHP_SELF'].
        "?op=batalpemetaan\">";

	$sql="select * from pemetaan where idasesor='$idasesor'";
	$ece=mysql_query($sql);
	if(mysql_num_rows($ece)>0){  
		echo "<table class=demo-table>
		<tr>
		<th bgcolor='#006699'>Batalkan</th>
		<th bgcolor='#006699'>ID Skema</th>	
		<th bgcolor='#006699'>ID Asesi</th>
		<th bgcolor='#006699'>Nama </th>
		<th bgcolor='#006699'>Kelompok </th>
		<th bgcolor='#006699'>Tanggal </th>    
		</tr>";
		$i=0;
		while ($data=mysql_fetch_array($ece)){
		$idpemetaan=$data["idpemetaan"];
		$idasesi=$data["idpeserta"];
		$nama=$data["namapeserta"];
		$idskema=$data["idskema"];
		$kelompok=$data["kelompok"];
		$tanggal=$data["tanggal"];
		//echo "<tr><td>$i</td>";
		echo "<td><input type=checkbox name=id".$i." value='$idpemetaan'></td>";
		echo "<td>$idskema<input type=hidden name=idskema".$i." value='$idskema'></td>";
		echo "<td>$idasesi<input type=hidden name=idasesi".$i." value='$idasesi'></td>";
		echo "<td>$nama</td>";
		echo "<td>$kelompok</td>";
		echo "<td>$tanggal</td></tr>";
		$i++;
		}
	echo "
	<input type='hidden' name='n' value='".$i."' />
	<div class='buttons'>
	<tr><td colspan=6><input id='gobutton' type='submit' value='Proses' /></td></tr></table>";
	}else {echo"<script>alert('Belum ada data untuk asesor ini !');history.back;</script>";}
	echo "</form>";
}

else if ($op == "batalpemetaan")
{
	$n=$_POST['n'];
	for ($i=0; $i<=$n-1; $i++)
	{
    if (isset($_POST['id'.$i]))
     {
      $idpemetaan=$_POST['id'.$i];
      $idskema=$_POST['idskema'.$i];
      $idasesi=$_POST['idasesi'.$i];
      //    } else {
      $hapus="delete from pemetaan where idpemetaan='$idpemetaan'";
      //echo $hapus."</br>";
      $exec=mysql_query($hapus);
      $rubah="update permohonan set statuspmt='N' where idskema='$idskema' and id_user='$idasesi'";
      //echo $rubah;
      $exec=mysql_query($rubah);
      		//}
		}
    }


}
?>

<body>
<br/>
<!--<?php echo "<a href=\"".$_SERVER['PHP_SELF'].
        "?op=tambah&kd_modul=".$data['kd_modul']."\" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'></span>Tambah</a>";?>-->
	<table class=demo-table width=100%><thead>
	<tr>
    <th bgcolor='#006699'>No</th>	
    <th bgcolor='#006699'>Nama Asesor</th>
    <th bgcolor='#006699'>No Telp</th>
    <th bgcolor='#006699'>Email </th>
    <th bgcolor='#006699'>Seting Pemetaan </th>
	</tr></thead>
 
<?php
 
// bagian ini digunakan untuk menampilkan semua data
 
$no = 1;
$querypmmain ="SELECT * FROM lsp_usertbl where level='asesor'";
$hasilpmmain = mysql_query($querypmmain);
while ($datapmmain = mysql_fetch_array($hasilpmmain))
{
   echo "<tr>";
   echo "<td bgcolor='#99CCFF'>".$no."</td>";
   //echo "<td bgcolor='#99CCFF'>".$data['id_user']."</td>";
   echo "<td bgcolor='#99CCFF' align=left>".$datapmmain['nama']."</td>";
   echo "<td bgcolor='#99CCFF' align=left>".$datapmmain['notelp']."</td>";
   echo "<td bgcolor='#99CCFF' align=left>".$datapmmain['email']."</td>"; 	
   echo "<td><a href=\"".$_SERVER['PHP_SELF'].
        "?op=setpemetaan&namaa=".$datapmmain['nama']."&iduser=".$datapmmain['id_user']."\"><span class='glyphicon glyphicon-plus'>Set</a> | <a href=\"".$_SERVER['PHP_SELF'].
        "?op=listpemetaan&iduser=".$datapmmain['id_user']."\"> <span class='glyphicon glyphicon-pencil'>Lihat</a></td>";
   echo "</tr>";
   $no++;
}
   echo "</div>";
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
