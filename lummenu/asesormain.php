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
$ttd=$hasilx['linkttd'];
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
			<li class="active"><a href="asesormain.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></use></svg>FR.IA.08 Portofolio</a></li>
			<li><a href="observasi.php"><svg class="glyph stroked eye"><use xlink:href="#stroked-eye"/></use></svg>FR.IA.01 Observasi</a></li>
			<li><a href="mak2.php"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></use></svg>FR.AK.02 Rekaman Assesment</a></li>
			<li><a href="mak5.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"/></use></svg>FR.AK.05 Laporan Assesment</a></li>
			<li><a href="mak6baru.php"><svg class="glyph stroked map"><use xlink:href="#stroked-map"/></use></svg>FR.AK.06 Meninjau Proses Assesment</a></li>
			<li><a href="rekapasesi.php"><svg class="glyph stroked calendar blank"><use xlink:href="#stroked-calendar-blank"/></use></svg>Rekap Hasil Tes</a></li>
			<li ><a href="mapaasesor.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> FR.MAPA.01 Merencanakan</a></li>
			<li><a href="pihakketiga.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> FR.IA.10 Pihak Ketiga</a></li>
			<li><a href="ceklistintrumen.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> FR.IA.11 Ceklist Instrumen Asesmen</a></li>
			<li ><a href="tandatanganass.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></use></svg> Tanda Tangan</a></li>
			<li role="presentation" class="divider"></li>	
			<li><a href="../logout.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg> Logout</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<h4>Portofolio</h4>
                        
</div><!--/.row-->
		
		<!--/.row-->
				
		<div class="row">
			<div class="col-lg-12">
<!--data nu baru -->

<?php
$op = $_GET['op'];
 
if($op=="pilihtanggal")
{
	$idasesor=$_GET['idasesor'];
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
			    $namaassapl2=$rtgl['namaasesor'];
   				echo "<option value=$rtgl[tanggal] selected>$rtgl[tanggal]</option> ";
					}
?>
	</select>
	</div>
	<input type="submit" id="gobutton" value="Lanjutkan" class="button"> 
	<?php echo "<input type=hidden name=namasporto value='$namaassapl2'> </form>";
}

else if ($op == "listpeserta")
{
    $idasesor=$_POST['idasesor'];
    $idskema= $_POST['idskema'];
    $kelompok=$_POST['kelompok'];
    $tgl=$_POST['tgl'];
    $namaasesor=$_POST['namasporto'];
    $sqluser="select linkttd,id_user from lsp_usertbl where id_user='$idasesor'";
    $sqlusera=mysql_query($sqluser);
    $sqluserb=mysql_fetch_array($sqlusera);
    $ssl="select * from pemetaan where kelompok='$kelompok' and idskema='$idskema' and tanggal='$tgl' and idasesor='$idasesor'";
    $exec0=mysql_query($ssl);
    //echo "laksl".$ssl;
    echo "<table class=demo-table>";
    echo "<thead><tr><th bgcolor='#006699'>ID Asesi</th><th bgcolor='#006699'>Nama Asesi</th><th bgcolor='#006699'>Tanggal</th><th bgcolor='#006699'>Ket</th><th colspan=2 bgcolor='#006699'>Aksi</th></tr></thead>";
     while($hasil0 = mysql_fetch_array($exec0))
      {
      $cekvlapl1="select idasesi,idskema,waktu,statusvalid from upload where idskema='$idskema' and waktu='$tgl' and idasesi='".$hasil0['idpeserta']."' and statusvalid='N' group by idasesi,idskema,waktu,statusvalid";
      //echo $cekvlapl1;
      $cekvlapl1a=mysql_query($cekvlapl1);
      //$cekvlapl1b=mysql_fetch_array($cekvlapl1a);
      $b=mysql_num_rows($cekvlapl1a);
      //echo "nilai b".$b;       
       if($b>0){
             $ketvl="<font color=red><span class='glyphicon glyphicon-remove'>Belum divalidasi</font>";}
       else{
		$cekvlaplabcd="select idasesi,idskema,waktu,statusvalid from upload where idskema='$idskema' and waktu='$tgl' and idasesi='".$hasil0['idpeserta']."' group by idasesi,idskema,waktu";
        //echo $cekvlaplabcd;
		$cekvlaplabde=mysql_query($cekvlaplabcd);
        $c=mysql_num_rows($cekvlaplabde);
        //echo "nilai ".$c;
                if($c>0){ 
                  $ketvl="<font color=green><span class='glyphicon glyphicon-ok'>Sudah Divalidasi</font>";}
				else{$ketvl="<font color=green><span class='glyphicon glyphicon-search'>Asesi belum mengisi</font>";}

       }
      
      echo "<tr><td>".$hasil0['idpeserta']."</td>";
      echo "<td>".$hasil0['namapeserta']."</td>";
      echo "<td>".$hasil0['tanggal']."</td>";
      echo "<td>".$ketvl."</td>";
      $ei="in";
      if($b>0){ 
      //echo "<td><a href=\"".$_SERVER['PHP_SELF'].
      //  "?op=validasi&idasesor=".$hasil0['idasesor']."&k=".$hasil0['kelompok']."&tgl=".$hasil0['tanggal']."&kode=".$ei."&idasesi=".$hasil0['idpeserta']."&idskema=".$idskema."\"><span class='glyphicon glyphicon-check' >Validasi</a></td>";
       echo "<td><a href=\"".$_SERVER['PHP_SELF'].
        "?op=validasiunitporto&idasesor=".$hasil0['idasesor']."&k=".$hasil0['kelompok']."&tgl=".$hasil0['tanggal']."&kode=".$ei."&idasesi=".$hasil0['idpeserta']."&idskema=".$idskema."&nmass=".$namaasesor."\"><span class='glyphicon glyphicon-check'>Validasi</a></td>";
       }
       else 
       { echo "<td><span class='glyphicon glyphicon-check' >Validasi</td>";} 
       
		//echo "<td><a href=\"".$_SERVER['PHP_SELF']. //"?op=validasi&idasesor=".$hasil0['idasesor']."&k=".$hasil0['kelompok']."&tgl=".$hasil0['tanggal']."&kode=ed&idasesi=".$hasil0['idpeserta']."&idskema=".$idskema."\"><span class='glyphicon glyphicon-edit'>Edit</a></td></tr>";
        echo "<td><a href=\"".$_SERVER['PHP_SELF'].
        "?op=rekompro&idasesor=".$hasil0['idasesor']."&tgl=".$hasil0['tanggal']."&idasesi=".$hasil0['idpeserta']."&idskema=".$idskema."&lkttd=".$sqluserb['linkttd']."&nmass=".$namaasesor."\"><span class='glyphicon glyphicon-edit'>Rekomendasi</a></td></tr>";
       
    }
    echo "<table class=demo-table>";
      
    
}

else if($op=="rekompro")
{

 ?>
 <button type="button" class="btn btn-primary" onclick="window.print()">Print Halaman Ini</button>
 <?php
	$namaasesorttd=$_GET['nmass'];
	$idasesorttd=$_GET['idasesor'];
	$idadsesittd=$_GET['idasesi'];
	$tglttd=$_GET['tgl'];
    $idskttd=$_GET['idskema'];
    $ttdass=$_GET['lkttd'];
    $ttdass="../imgttd/".$ttdass; 
     $cekduluvlapl2="select idadsesi,idskema,waktu,svalidasi from apl2 where idadsesi='".$idadsesittd."' and waktu='".$tglttd."' and svalidasi='T' and idskema ='".$idskttd."' group by idadsesi,idskema,waktu,svalidasi";
     $cekduluvlapl2a=mysql_query($cekduluvlapl2);
     $cekduluvlapl2b=mysql_num_rows($cekduluvlapl2a);
     //$cekduluvlapl2c=mysql_fetch_array($cekduluvlapl2a);
     //$emailttd=$cekduluvlapl2c['email'];
     //echo "nmnms".$cekduluvlapl2b;
     if ($cekduluvlapl2b>0)
     {
		echo "<strong><font color=red>VALIDASI BELUM SELESAI !!!</font></strong> ";
     }
     else 
     {
		echo "<form id=\"formContoh\" method=\"post\" enctype=\"multipart/form-data\" action=\"".$_SERVER['PHP_SELF'].
        "?op=srekompro\">";
		$cekdata0 = "SELECT * FROM rekomendasi WHERE namarekom = 'pro' and idskema='$idskttd' and idasesi='$idadsesittd' and tanggal='$tglttd'";
 		 //echo $cekdata0;
		$ada0=mysql_query($cekdata0);
		$adax=mysql_fetch_array($ada0);
    	$lrek=$adax['rekom'];
    	$cat=$adax['catatan'];
       	if($lrek=='L'){
      	$klrek='checked';
     	}else{$klrek='';}
     	if($lrek=='T'){
      	$klrek0='checked';
     	}else{$klrek0='';}
		$catatan=$data0['catatan'];        
		$sqlttd="select * from lsp_usertbl where id_user='$idadsesittd'";
		//echo $sqlttd;
		$sqlttda=mysql_query($sqlttd);
		$sqlttdb=mysql_fetch_array($sqlttda);
		$linkttda="../imgttd/".$sqlttdb['linkttd'];
		$namapttd=$sqlttdb['nama'];
		$emailttd=$sqlttdb['email'];
		//$idasesittd=$sqlttd['id_user'];
		echo"<table></tr><td colspan=2 rowspan=3> Peserta telah memenuhi / belum memenuhi seluruh </br>pencapaian kriteria unjuk kerja direkomendasikan : </br><input type=radio name=lrekttd value='L' $klrek >Kompetensi</br> <input type=radio name=lrekttd value='T' $klrek0>Uji Kompetensi</td><td colspan=7><strong> Asesi </strong></td></tr><tr><td>Nama : </td><td colspan=6>$namapttd</td></tr><tr><td>Tanda Tangan : </td><td colspan=6><img src='$linkttda'></td>";
		echo"</tr><td colspan=2 rowspan=3> <td colspan=7><strong>Asesor</strong></td></tr><tr><td>Nama : </td><td colspan=6>$namax</td></tr><tr><td>Tanda Tangan : </td><td colspan=6><img src='$ttdass' height=50></td>";
		echo "</tr><tr><td colspan=9><input type='hidden' name='n' value='".$i."'><input type=submit name=simpan id=gobutton value=Simpan></td>";
		echo"<input type =hidden name=idskttd value='$idskttd'>
         <input type =hidden name=idadsesittd value ='$idadsesittd'>
         <input type =hidden name=tglttd value='$tglttd'>
         <input type =hidden name=idasesorttd value='$idasesorttd'>
         <input type =hidden name=emailttd value='$emailttd'></table></form>";
    }     


}


else if ($op == "validasiunitporto")
{
		//echo "laklask"; 
        $namaasesor=$_GET['nmass'];  
	    $idasesor=$_GET['idasesor'];
        $ie=$_GET['kode'];
        $idadsesi=$_GET['idasesi'];
        $idsk=$_GET['idskema'];
        $tgl=$_GET['tgl'];
	    $kelompok=$_GET['k'];	
	    $emailuser=trim($uname);
	    echo "<form id=\"formContoh\" method=\"post\" enctype=\"multipart/form-data\" action=\"".$_SERVER['PHP_SELF'].
        "?op=validasi\">"; ?>
		<table class=demo-table width=100%>
		<!--<tr><td colspan="3"><strong>Skema : <?php echo $namaskema; ?></strong></td></tr>-->
		<tr><th colspan='3'><strong> PILIH UNIT</strong> </th></tr>
		<tr><th bgcolor='#006699'>Kode Unit</th><th bgcolor='#006699'>Nama Unit</th><th bgcolor='#006699'> Keterangan</th></tr>
		<?php 
	    $sqlunitporto="select unitsiswa.idadsesi,unitsiswa.idunit,unit.kodeunit,unit.namaunit,unit.idskema from unitsiswa INNER JOIN unit on unitsiswa.idunit=unit.idunit where unitsiswa.idskema='$idsk' and unitsiswa.idadsesi='$idadsesi' order by unit.kodeunit";
//	    echo $sqlunitporto;
	    $execunitporto=mysql_query($sqlunitporto);
			//echo $unit;
			$i = 0;
			while ($unitporto=mysql_fetch_array($execunitporto)){
				$dunitporto=$unitporto['idunit'];
				//$nunit=$unit2['namaunit'];
				$kodeunitporto=$unitporto['kodeunit'];
				$namaunitporto=$unitporto['namaunit'];
                                $idskemavporto=$unitporto['idskema'];
                                //$idasesiunit=$unit2['idasesi'];
                                //$sqlbykel="select count(idelemen) as bykel from upload where idskema='$skema' AND idunit='$dunit' AND idasesi='$idasesi'"; 
                                 
                                $sqlcekapporto="select upload.idskema,upload.idasesi,upload.idunit,upload.idelemen from upload where idasesi='".$idadsesi."' and idskema='".$idsk."' and idunit='".$dunitporto."'";
                                //echo $sqlcekapporto;
                                
                                //echo $sqlunitupload;
                                $execsqlunitaporto=mysql_query($sqlcekapporto);
                                $unitportov=mysql_fetch_array($execsqlunitaporto);
                                $bykunitportov=mysql_num_rows($execsqlunitaporto);
                                //echo "lakslaksl".$unitportovx;
	                            $idevporto=$unitportov['idunit'];
                                //echo $idevporto;
                                $sqlelemenportov="select count(idelemen) as bykportov from elemen where idunit='$idevporto'";
                                $execelemenportov=mysql_query($sqlelemenportov);
                                $execelemenportoav=mysql_fetch_array($execelemenportov);
                                //echo "lll".$sqlelemenportov;  
                                $bykelemenportov=$execelemenportoav['bykportov'];
                                if($bykelemenportov<1) {
                                		$seharusov="  ";
                                		$wrov="red";
                                	}else 
                                	{
                                		$seharusov=" Seharusnya ".$bykelemenportov;
                                		$wrov="green";
                                	}
                                //echo "xxxx".$bykelemenportov;
                                $ckjmlvalpor="select count(idasesi) as bykporto from upload where idasesi='".$idadsesi."' and idskema='".$idsk."' and idunit='".$dunitporto."' and statusvalid='Y'";
                                $ckjmlvalapor=mysql_query($ckjmlvalpor);
                                $ckjmlvalbpor=mysql_fetch_array($ckjmlvalapor);
                                $ckjmlvaldpor=$ckjmlvalbpor['bykporto'];
                                //echo $ckjmlvalpor;
                                //echo $bykunitapl2;
				if($bykunitportov>0 and $ckjmlvaldpor==$bykelemenportov){
                                   $stadavpor='disabled';
                                   //echo $stada;
                               }
				else { $stadavpor=' ';}
                                
				echo "<tr><td><input type=hidden name=idskema".$i." value='$idskema'><input type=hidden name=idunit".$i." value='$dunitporto'><input type=checkbox name=kodeunit".$i." value='$kodeunitporto' $stadavpor> ".$kodeunitporto." </td><td>".$namaunitporto." </td><td> Diisi asesi ".$bykunitportov." <font color=$wrov>$seharusov </font> Yang di validasi ".$ckjmlvaldpor."</td>";



				?>
				<?php
				$i++;
				
			}
		//}
			echo "<input type=hidden name='np' value='".$i."' />";
			echo "<input type=hidden name=emailuserapl2 value='".$emailuser."'>";
			echo "<input type=hidden name=idasesorp value='".$idasesor."'>";
			echo "<input type=hidden name=kodep value='".$ie."'>";
			echo "<input type=hidden name=idasesip value='".$idadsesi."'>";
			echo "<input type=hidden name=idskemap value='".$idskemavporto."'>";
			echo "<input type=hidden name=tglp value='".$tgl."'>";
			echo "<input type=hidden name=kp value='".$kelompok."'>";
			echo "<input type=hidden name=nmasserp value='".$namaasesor."'>";
			
			
			
			?>

		</form>
		</td></tr><tr><td colspan="3"><input type="submit" id="gobutton" value="Lanjutkan" class="button"></td></tr></table>

   <?php

}



else if ($op == "validasi")
{
	?>
	<button type="button" class="btn btn-primary" onclick="window.print()">Print Halaman Ini</button>
	<?php
	$idasesor=$_POST['idasesorp'];
	$idskema= $_POST['idskemap'];
	$idasesi= $_POST['idasesip'];
	$ie=$_POST['kodep'];
	$tgl=$_POST['tglp'];
	$kelompok=$_POST['kp'];
	//echo $ie;
	//echo "akjskajskajskajs";
	$sqlunit="select * from unit where idskema='$idskema'";
	//echo $sqlunit;
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
	echo "<table width=95% class=demo-table><tr><td colspan=2> <strong>Nama Skema : $namaskema </br>Nama Asesi : $namaadsesi <a href=../siswa/biodatasiswa.php?email=$emailadsesi target=_blank> Tampilkan Biodata Lengkap </a></strong></td></tr>";

	$nnp = $_POST['np'];
	//echo $nn;
	$ccp=0;
	$iip=0; 
	$ccp=0;
	$cccp=0;
	$w=0;
	$i = 0;
	for ($cbap=0; $cbap<=$nnp-1; $cbap++)     		 	//echo "terplikh";
	{
	  if (isset($_POST['kodeunit'.$cbap]))
        	{ 
        		$idunitxyzp=$_POST['idunit'.$cbap];       		
        		$pjngvp=strlen($_POST['kodeunit'.$cbap]);
        	     //echo "terpilih".$idunitxyzp;
        	     if ($pjngvp>0 )
        
        	     {

        	     	$cccp++;
               
               if ($cccp <=2  ){


				$sqlunit="select unitsiswa.idunit,unitsiswa.idskema,unitsiswa.idadsesi,unit.kodeunit,unit.namaunit from unitsiswa inner join unit on unitsiswa.idunit=unit.idunit where unitsiswa.idskema='$idskema' and unitsiswa.idadsesi='$idasesi'";
				$execunit=mysql_query($sqlunit);
				//echo $sqlunit;
				//echo "<table width=95% class=demo-table><tr><td colspan=2> <strong>Nama Skema : $namaskema </br>Nama Adsesi : $namaadsesi <a href=../siswa/biodatasiswa.php?email=$emailadsesi target=_blank> Tampilkan Biodata Lengkap </a></strong></td></tr>";
				/* echo "<tr><th bgcolor='#006699'>Kode Unit ( Dipilih Siswa ) </td><th bgcolor='#006699'>Nama Unit </th></tr>";
				while ($listunit = mysql_fetch_array($execunit))
				{
				echo "<tr><td>".$listunit['kodeunit']."</td><td>".$listunit['namaunit']."</td></tr>";
				}
				echo "</table>"; */


				$cekdata0 = "SELECT * FROM rekomendasi WHERE namarekom = 'apl1' and idskema='$idskema' and idasesi='$idasesi'";
				// echo $cekdata0;
				$ada0=mysql_query($cekdata0);
				$adax=mysql_fetch_array($ada0);
				$lrek=$adax['rekom'];
				$cat=$adax['catatan'];
				if($lrek=='L'){
				$klrek='checked';
				}else{$klrek='';}
				if($lrek=='T'){
				$klrek0='checked';
				}else{$klrek0='';}
				$catatan=$data0['catatan'];
  

				echo "<form id=\"formContoh\" method=\"post\" action=\"".$_SERVER['PHP_SELF'].
        "?op=simpanvalidasi\">";
    
				//if($ie=='in'){
				$ssql="select * from permohonan where idskema='$idskema' and id_user='$idasesi' and tanggal='$tgl'";
				//}else{$ssql="select * from permohonan where idskema='$idskema' and id_user='$idasesi'";}
				//echo $ssql;
				$exec=mysql_query($ssql);
				//$listx=mysql_fetch_array($exec);
				//$namaadsesi=$listx['nama'];
				//  if(mysql_num_rows($exec)>0)
				//{
    
				echo "<input type=hidden name=emailadsesi value='$emailadsesi'>";
   
				echo "<table width=95% class=demo-table><tr>";
				//if($ie=='in'){
				$ssql1="select * from upload where idskema='$idskema' and idasesi='$idasesi' and waktu='$tgl' and idunit='$idunitxyzp' order by statusvalid";//anstatusvalid='N'";
				//}else{$ssql1="select * from upload where idskema='$idskema' and idasesi='$idasesi' and statusvalid='Y' and waktu='$tgl' order by statusvalid";}
				//echo $ssql1;

				$exec1=mysql_query($ssql1);
				//if(mysql_num_rows($exec1)>0){
				//echo "kjkasjkas"; 

					while ($list1 = mysql_fetch_array($exec1)){
					$id=$list1['id'];
					$idskema1=$list1['idskema'];
					$idasesi1=$list1['idasesi'];
					$email=$list1['email'];
					$idunit=$list1['idunit'];
					$idelemen=$list1['idelemen'];
					$bukti=$list1['bukti'];
					$path=$list1['Path'];
					$dbukti=$list1['dbukti'];
					$lt=$list1['lt'];
					//tambahan 
					$unitapl1="select * from unit where idunit='$idunit'";
					//echo $unitapl1;
					$unitapl1a=mysql_query($unitapl1);
					$unitapl1b=mysql_fetch_array($unitapl1a);
					$nmunitapl1=$unitapl1b['namaunit'];
					$kdunitapl1=$unitapl1b['kodeunit'];

					//echo $idelemen.$dbukti;
					$status=$list1['statusvalid'];
					if($status=='Y') {
					  $val="SV";
					}else{ $val="BV";}
					$pecahdb=explode(",",$dbukti);
					
					$db0=$pecahdb[0];
					$db1=$pecahdb[1];
					$db2=$pecahdb[2];
					$db3=$pecahdb[3];
						//echo "B".$db0;
					if(trim($db0)=='v')
						{
						 $kdb0="checked";
						}else{$kdb0="";}
					   if(!empty($db1))
						{
						 $kdb1="checked";
						}else{$kdb1="";}
					   if(!empty($db2))
						{
						 $kdb2="checked";
						}else{$kdb2="";}
					   if(!empty($db3))
						{
						 $kdb3="checked";
						}else{$kdb3="";}
						
					

					$pecahbu=explode(",",$bukti);
					$bu0=$pecahbu[0];
					$bu1=$pecahbu[1];
					$bu2=$pecahbu[2];
					$bu3=$pecahbu[3];
					$bu4=$pecahbu[4];
					$bu5=$pecahbu[5];
					$bu6=$pecahbu[6];
					$bu7=$pecahbu[7];
					   // echo "bukti".$bu6;
						if(!empty($bu0))
						{
						 $kbu0="checked";
						}else {$kbu0="";}
						if(!empty($bu1))
						{
						 $kbu1="checked";
						}else {$kbu1="";}
						if(!empty($bu2))
						{
						 $kbu2="checked";
						}else {$kbu2="";}
						if(!empty($bu3))
						{
						 $kbu3="checked";
						}else {$kbu3="";}
						if(!empty($bu4))
						{
						 $kbu4="checked";
						}else {$kbu4="";}
						if(!empty($bu5))
						{
						 $kbu5="checked";
						}else {$kbu5="";}
						if(!empty($bu6))
						{
						 $kbu6="checked";
						}else {$kbu6="";}
					if(!empty($bu7))
						{
						 $kbu7="checked";
						}else {$kbu7="";}
							
						
						if($lt=='Y')
						{
						 $l="checked";
						}else{$l="";}
						if($lt=='T')
						{ 
						$t="checked";
						}else{$t="";}

						//echo "s".$kdb0;
					echo"</tr><tr><th bgcolor='#006699'colspan=7>Nama Unit : $nmunitapl1 </th></tr><tr><th bgcolor='#006699'colspan=7>Kode Unit : $kdunitapl1 </th></tr><th colspan=7 bgcolor='#006699'> Kompetensi dan Bukti Pendukung </th></tr><tr>";
					echo"<th bgcolor='#006699'></th><th bgcolor='#006699'>Elemen Kompetensi</th><th colspan=2 bgcolor='#006699'>Bukti Yang relevan</th><th bgcolor='#006699'>Kesesuain Bukti</th><th bgcolor='#006699'>Memadai</th><th bgcolor='#006699'>Ket</th></tr><tr>";	
					$ssql2="select * from elemen where idskema='$idskema' and idunit='$idunit' and idelemen='$idelemen'";
					$exec2=mysql_query($ssql2);
					$list2 = mysql_fetch_array($exec2);
					$namae=$list2['namaelemen'];
					echo "<td><input type=hidden name=idelemen".$i." value='$idelemen'><input type=hidden name=idunit".$i." value='$idunit'></td>";
					echo "<td>".$namae."</td>";
					echo "<td><input type=checkbox name=bukti[] value='sk'$kbu0 disabled='disabled'>SR
						<input type=checkbox name=bukti[] value='sr'$kbu1 disabled='disabled'>SR 
						<input type=checkbox name=bukti[] value='cp' $kbu2 disabled='disabled'>CP 
						<input type=checkbox name=bukti[] value='jd' $kbu3 disabled='disabled'>JD
						<input type=checkbox name=bukti[] value='ws'$kbu4 disabled='disabled'>WS 
						<input type=checkbox name=bukti[] value='de'$kbu5 disabled='disabled'>De 
						<input type=checkbox name=bukti[] value='pe'$kbu6 disabled='disabled'>Pe 
						<input type=checkbox name=bukti[] value='l' $kbu7 disabled='disabled'>L</td>";
							echo"<td><a href=../siswa/gambarimages/".$path." target=_blank> Tampilkan Dokumen $idelemen </a></td>";
							echo"<td><input type=checkbox name=validasia".$i." value='v' $kdb0>V
						   <input type=checkbox name=validasib".$i." value='a' $kdb1>A <input type=checkbox name=validasic".$i." value='t' $kdb2>T 			     <input type=checkbox name=validasid".$i." value='m' $kdb3>M</td>";
								//echo "<td><input type=checkbox name=validasi0".$i." value='v' $kdb0>$kdb0</td>";
								 echo "<td><input type=radio name=lt".$i." value='Y' $l>Y <input type=radio name=lt".$i." value='T' $t>T</td>";
					echo "<td>$val</td>";
					$i++;
					$w++;
					}
	
			} //isset dan lain-lain
			}
			}
     //for 
		}
    
      
    /*echo"</tr><td colspan=2 rowspan=3> Rekomendasi </br><input type=radio name=lrek value='L' $klrek >Lanjut</br> <input type=radio name=lrek value='T' $klrek0>Tidak</td><td colspan=5>Asesi :</td></tr><tr><td>Nama : </td><td colspan=4>$namaadsesi</td></tr><tr><td>Tanda Tangan : </td><td colspan=4></td>";
	echo"</tr><td colspan=2 rowspan=3> Catatan </br><input type=text name=catatan value=$cat><td colspan=5>Asesor :</td></tr><tr><td>Nama : </td><td colspan=4>$namax</td></tr><tr><td>Tanda Tangan : </td><td colspan=4><img src='$ttd' height=50></td>";
    echo "</tr><tr><td colspan=7><input type='hidden' name='n' value='".$i."'><input type=submit name=simpan id=gobutton value=Simpan></td>"; 
    echo "</tr>*/
    echo "</tr><tr><td colspan=7><input type=hidden name='npor' value='".$w."'>";
    echo "<input type=hidden name=idskema value='$idskema'>";
	echo "<input type=hidden name=idasesi value='$idasesi'>";
	echo "<input type=hidden name=kelompok value='$kelompok'>";
	echo "<input type=hidden name=idasesor value='$idasesor'>";
	echo "<input type=hidden name=tgl value='$tgl'>";
	echo "<input type=submit name=simpan id=gobutton value=Simpan></td>";  
    echo "</table>";
	echo "</form>";
	//}
}

else if ($op == "simpanvalidasi")
{
$idasesor=$_POST['idasesor'];
$kelompok=$_POST['kelompok'];
$idpermohonan=$_POST['idpermohonan'];
$idskema=$_POST['idskema'];
$idasesi=$_POST['idasesi'];
$n=$_POST['npor'];
$tgl=$_POST['tgl'];
//echo "nilai".$n;
for ($i=0; $i<=$n-1; $i++)
   {
   	 //echo "lklk".$_POST['validasia'.$i];
     if (isset($_POST['validasia'.$i]) or isset($_POST['validasib'.$i]) or isset($_POST['validasic'.$i]) or isset($_POST['validasid'.$i]) )
     {
     $idelemen= $_POST['idelemen'.$i];
     $validasi0=$_POST['validasia'.$i];
     $validasi1=$_POST['validasib'.$i];
     $validasi2=$_POST['validasic'.$i];
     $validasi3=$_POST['validasid'.$i];
     $idunitcc=$_POST['idunit'.$i];
     $allvalidasi=$validasi0.",".$validasi1.",".$validasi2.",".$validasi3;
     
     //echo $idelemen;
     $lt=$_POST['lt'.$i];
     $sqlupdate="update upload set dbukti='$allvalidasi', lt='$lt',statusvalid='Y' where idskema='$idskema' and idasesi='$idasesi' and idelemen='$idelemen' and idunit='$idunitcc'";
     //echo $sqlupdate;
     $exec=mysql_query($sqlupdate);
     }

    }
    $lrek=$_POST['lrek'];
    $catatan=$_POST['catatan'];
	$emailad=$_POST['emailadsesi'];
     $exec=mysql_query($ssql);
    //echo $ssql;
    $updatesksiswa="update skemasiswa set statusapl1='Y' where emailsiswa='$emailad' and idskema='$idskema'";
    $execu=mysql_query($updatesksiswa);
    $cekupl="select * from upload where statusvalid='N'";
    $execupl=mysql_query($cekupl);
  ?>
   <form id="formContoh" method="POST" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=listpeserta\"";?>> 
<?php
echo "<input type=hidden name=idasesor value='$idasesor'>";
echo "<input type=hidden name=tgl value='$tgl'>";
echo "<input type=hidden name=idskema value='$idskema'>";
echo "<input type=hidden name=kelompok value='$kelompok'>";
?>
</br><input type="submit" id="gobutton" value="Proses selesai.. Lanjutkan" class="button"> 
<?php

   //echo"<script>alert('Sukses ..!');history.go(-2);</script>";}
   //else{echo"<script>alert('Gagal ..!');history.go(-1);</script>";}

}
else if ($op == "srekompro")
{
	
	
$idskemarekapl2=$_POST['idskttd'];
    $idasesirekapl2=$_POST['idadsesittd'];
    $tglrekapl2=$_POST['tglttd'];
    $idasesorrekapl2=$_POST['idasesorttd'];
    $lrekapl2=$_POST['lrekttd'];
    $catatanrekapl2=$_POST['cttapl2'];
	$emailad=$_POST['emailttd'];

	//echo "lrek".$lrekapl2;
	//echo $catatanrekapl2;
     $cekdata = "SELECT * FROM rekomendasi WHERE namarekom = 'pro' and idskema='$idskemarekapl2' and idasesi='$idasesirekapl2' and tanggal='$tglrekapl2'";
     //echo $cekdata;
   $ada=mysql_query($cekdata);
   	if(mysql_num_rows($ada)>0){
    $ssqlrekapl2="update rekomendasi set rekom='$lrekapl2' , catatan='$catatanrekapl2' where namarekom = 'pro' and idskema='$idskemarekapl2' and idasesi='$idasesirekapl2' and tanggal='$tglrekapl2'"; 
    }else{$ssqlrekapl2="insert into rekomendasi value('','pro','$idskemarekapl2','$idasesorrekapl2','$idasesirekapl2','$lrekapl2','$catatanrekapl2','','$tglrekapl2')";}
    //echo $ssqlrekapl2;
   $execrekapl2=mysql_query($ssqlrekapl2);
   if($execrekapl2){
   	
   	$updskemasis="update skemasiswa set statusapl2='Y' where idskema='$idskemarekapl2' and emailsiswa='$emailad'";
   	//echo $updskemasis;
   	//$updskemasisa=mysql_query($updskemasis);

   	
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

}


?>


<body>
<br/>
<?php
	$query ="SELECT * FROM pemetaan where idasesor='$idasesor' group by kelompok,idskema";
	$hasil = mysql_query($query);
	//$ada=mysql_query($);
   	if(mysql_num_rows($hasil)>0){
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
	while ($data = mysql_fetch_array($hasil))
	{
		$ssql="select * from skema where idskema=".$data['idskema'];
		//echo $ssql;
		$execssql=mysql_query($ssql);
		$baris=mysql_fetch_array($execssql);
		$namaskema=$baris['namaskema'];
		echo "<tr>";
		echo "<td bgcolor='#99CCFF'>".$no."</td>";
		//echo "<td bgcolor='#99CCFF'>".$data['id_user']."</td>";
		echo "<td bgcolor='#99CCFF' align=left>".$data['kelompok']."</td>";
		echo "<td bgcolor='#99CCFF' align=left>".$data['idskema']."</td>";
		echo "<td bgcolor='#99CCFF' align=left>".$namaskema."</td>";  	
		echo "<td><a href=\"".$_SERVER['PHP_SELF'].
        "?op=pilihtanggal&idasesor=".$data['idasesor']."&idskema=".$data['idskema']."&kelompok=".$data['kelompok']."\"><span class='glyphicon glyphicon-user'>Tampilkan Peserta</a> 
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
