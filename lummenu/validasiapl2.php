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
<script language="javascript">

/*
Auto center window script- Eric King (http://redrival.com/eak/index.shtml)
Permission granted to Dynamic Drive to feature script in archive
For full source, usage terms, and 100's more DHTML scripts, visit http://dynamicdrive.com
*/

var win = null;
function NewWindow(mypage,myname,w,h,scroll){
LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
settings =
'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
win = window.open(mypage,myname,settings)
}

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
<?php 
	if(isset($_SESSION['username'])) 
	{$uname=$_SESSION['username'];}

	$l="SELECT * FROM lsp_usertbl WHERE email='".$uname."'";
	//echo $l;
	$resultx=mysql_query($l);
	$hasilx=mysql_fetch_array($resultx);
	$namax=$hasilx['nama']; 
	$idasesor=$hasilx['id_user'];
	$ttd=$hasilx['linkttd'];
	$idasesorxv=$hasilx['id_user'];
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
			<li class="active"><a href="validasiapl2.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></use></svg> Validasi APL2</a></li>
			<li><a href="asesormain.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></use></svg>FR.IA.08 Portofolio</a></li>
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
			<h4>Validasi APL 2 </h4>
                        
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
			$namaassapl2=$rtgl['namaasesor'];
                //         echo "ll";
   				echo "<option value=$rtgl[tanggal] selected>$rtgl[tanggal]</option> ";
					}
	?>
	</select>
	</div>
	<input type="submit" id="gobutton" value="Lanjutkan" class="button"> 
	<?php echo "<input type=hidden name=namasapl2 value='$namaassapl2'>";
}

else if ($op == "listpeserta")
{
    $idasesor=$_POST['idasesor'];
    $idskema= $_POST['idskema'];
    $kelompok=$_POST['kelompok'];
    $tgl=$_POST['tgl'];
    $namaasesor=$_POST['namasapl2'];    
    $sqluser="select linkttd,id_user from lsp_usertbl where id_user='$idasesor'";
    $sqlusera=mysql_query($sqluser);
    $sqluserb=mysql_fetch_array($sqlusera);
    //echo $sqluser;
    //$idskema= $_GET['idskema'];
    //$kelompok=$_GET['kelompok'];
    $ssl="select * from pemetaan where kelompok='$kelompok' and idskema='$idskema' and tanggal='$tgl' and idasesor='$idasesor'";
    $exec0=mysql_query($ssl);
    //echo "laksl".$ssl;
    echo "<table class=demo-table>";
    echo "<tr><th bgcolor='#006699'>ID Asesi</th><th bgcolor='#006699'>Nama Asesi</th><th bgcolor='#006699'>Tanggal</th><th bgcolor='#006699'>Ket</th><th colspan=2 bgcolor='#006699'>Aksi</th></tr>";
     while($hasil0 = mysql_fetch_array($exec0))
      {

        $cekvlapl2="select idadsesi,idskema,waktu,svalidasi from apl2 where idskema='$idskema' and waktu='$tgl' and idadsesi='".$hasil0['idpeserta']."' and svalidasi='T' group by idadsesi,idskema,waktu,svalidasi";
		//echo $cekvlapl2;
		$cekvlapl2a=mysql_query($cekvlapl2);
		$cekvlapl2b=mysql_fetch_array($cekvlapl2a);
		//if(
		$b=mysql_num_rows($cekvlapl2a);
		//echo "jjj".$cekvlapl2b['loba'];
      
		if($b>0){
             $ketvl2="<font color=red><span class='glyphicon glyphicon-remove'>Belum divalidasi Semua</font>";}
        else{
	      $cekvlaplabc="select idadsesi,idskema,waktu,svalidasi from apl2 where idskema='$idskema' and waktu='$tgl' and idadsesi='".$hasil0['idpeserta']."' group by idadsesi,idskema,waktu";
                //echo $cekvlaplabc;
			$cekvlaplabd=mysql_query($cekvlaplabc);
                $f=mysql_num_rows($cekvlaplabd);
                if($f>0){ 
                  $ketvl2="<font color=green><span class='glyphicon glyphicon-ok'>Sudah Pernah Divalidasi</font>";}
				else{$ketvl2="<font color=green><span class='glyphicon glyphicon-search'>Asesi belum mengisi</font>";}
        }


      if($hasil0['statusvalid']=='Y'){
         $ket="Sudah divalidasi";
      }else{ $ket="Belum di Validasi";}
      
      echo "<tr><td>".$hasil0['idpeserta']."</td>";
      echo "<td>".$hasil0['namapeserta']."</td>";
      echo "<td>".$hasil0['tanggal']."</td>";
      echo "<td>".$ketvl2."</td>";
      $ei="in";
       //if($b>0){ 
            echo "<td><a href=\"".$_SERVER['PHP_SELF'].
        "?op=validasiunitdapl2&idasesor=".$hasil0['idasesor']."&k=".$hasil0['kelompok']."&tgl=".$hasil0['tanggal']."&kode=".$ei."&idasesi=".$hasil0['idpeserta']."&idskema=".$idskema."&lkttd=".$sqluserb['linkttd']."&nmass=".$namaasesor."\"><span class='glyphicon glyphicon-check'>Validasi</a></td>";//}
      //else {
      /// echo "<td><span class='glyphicon glyphicon-check' >Validasi</td>";} 
      //echo "<td><a href=\"".$_SERVER['PHP_SELF']. //"?op=validasiapl2&idasesor=".$hasil0['idasesor']."&k=".$hasil0['kelompok']."&tgl=".$hasil0['tanggal']."&kode=ed&idasesi=".$hasil0['idpeserta']."&idskema=".$idskema."&nmass=".$namaasesor."\"><span class='glyphicon glyphicon-edit'>Edit</a></td>";  
        //echo "<td><a href=\"".$_SERVER['PHP_SELF'].
       // "?op=rekomapl2&idasesor=".$hasil0['idasesor']."&tgl=".$hasil0['tanggal']."&idasesi=".$hasil0['idpeserta']."&idskema=".$idskema."&lkttd=".$sqluserb['linkttd']."&nmass=".$namaasesor."\"><span class='glyphicon glyphicon-edit'>Rekomendasi</a></td></tr>";
       }
     echo "<table class=demo-table>";
}

else if($op=="rekomapl2")
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
	$kelompttd=$_GET['kelomp'];
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
        "?op=srekomapl2\">";
	
    $cekdata0 = "SELECT * FROM rekomendasi WHERE namarekom = 'apl2' and idskema='$idskttd' and idasesi='$idadsesittd' and tanggal='$tglttd'";
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
	echo"<table></tr><td colspan=2 rowspan=3> Rekomendasi </br><input type=radio name=lrekttd value='L' $klrek >Lanjut</br> <input type=radio name=lrekttd value='T' $klrek0>Tidak</td><td colspan=7><strong> Asesi </strong></td></tr><tr><td>Nama : </td><td colspan=6>$namapttd</td></tr><tr><td>Tanda Tangan : </td><td colspan=6><img src='$linkttda'></td>";
    echo"</tr><td colspan=2 rowspan=3> Catatan </br> <textarea name=cttapl2 rows=3 cols=30 value=>$cat</textarea><td colspan=7><strong>Asesor</strong></td></tr><tr><td>Nama : </td><td colspan=6>$namax</td></tr><tr><td>Tanda Tangan : </td><td colspan=6><img src='$ttdass' height=50></td>";
    echo "</tr><tr><td colspan=9><input type='hidden' name='n' value='".$i."'><input type=submit name=simpan id=gobutton value=Simpan></td>";
    echo" <input type =hidden name=idskttd value='$idskttd'>
         <input type =hidden name=idadsesittd value ='$idadsesittd'>
         <input type =hidden name=tglttd value='$tglttd'>
         <input type =hidden name=idasesorttd value='$idasesorttd'>
         <input type =hidden name=emailttd value='$emailttd'>
	 <input type =hidden name=nmasesorttd value='$namaasesorttd'>
	 <input type =hidden name=klttd value='$kelompttd'></table></form>";
    }     

}

else if ($op == "validasiunitdapl2")
{

    $namaasesor=$_GET['nmass'];  
	$idasesor=$_GET['idasesor'];
    $ie=$_GET['kode'];
    $idadsesi=$_GET['idasesi'];
    $idsk=$_GET['idskema'];
    $tgl=$_GET['tgl'];
	$kelompok=$_GET['k'];	
	$emailuser=trim($uname);
	$linkttda=$_GET['lkttd'];
	    
		 echo "<form id=\"formContoh\" method=\"post\" enctype=\"multipart/form-data\" action=\"".$_SERVER['PHP_SELF'].
        "?op=vapl22\">"; ?>
			<table class=demo-table width=100%>
			<!--<tr><td colspan="3"><strong>Skema : <?php echo $namaskema; ?></strong></td></tr>-->
			<tr><th colspan='3'><strong> PILIH UNIT</strong> </th></tr>
			<tr><th bgcolor='#006699'>Kode Unit</th><th bgcolor='#006699'>Nama Unit</th><th bgcolor='#006699'> Keterangan</th></tr>

			<?php 
	    $sqlunitvapl2="select unitsiswa.idadsesi,unitsiswa.idunit,unit.kodeunit,unit.namaunit,unit.idskema from unitsiswa INNER JOIN unit on unitsiswa.idunit=unit.idunit where unitsiswa.idskema='$idsk' and unitsiswa.idadsesi='$idadsesi' order by unit.kodeunit";
		//   echo $sqlunitvapl2;
	    $execunitvapl2=mysql_query($sqlunitvapl2);
			//echo $unit;
			
			$i = 0;
			while ($unit2vapl2=mysql_fetch_array($execunitvapl2)){
				$dunitvapl2=$unit2vapl2['idunit'];
				//$nunit=$unit2['namaunit'];
				$kodeunitvapl2=$unit2vapl2['kodeunit'];
				$namaunitvapl2=$unit2vapl2['namaunit'];
                                $idskemavapl2=$unit2vapl2['idskema'];
                                //$idasesiunit=$unit2['idasesi'];
                                //$sqlbykel="select count(idelemen) as bykel from upload where idskema='$skema' AND idunit='$dunit' AND idasesi='$idasesi'"; 
                                                                                   
                                $sqlcekapl2v="select apl2.idskema,apl2.idadsesi,apl2.idunit,apl2.idelemen,apl2.idsubelemen from apl2 where idadsesi='".$idadsesi."' and idskema='".$idsk."' and idunit='".$dunitvapl2."'";
                                //echo $sqlcekapl2;
                                
                                //echo $sqlunitupload;
                                $execsqlunitapl2v=mysql_query($sqlcekapl2v);
                                $execsqlunitapl2av=mysql_fetch_array($execsqlunitapl2v);
                                $bykunitapl2v=mysql_num_rows($execsqlunitapl2v);
                                //echo "lakslaksl".$bykunitapl2v;
	                            $idev=$execsqlunitapl2av['idunit'];
                                $sqlelemenapl2v="select count(idelemen) as byk2apl2v from subelemen where idunit='$idev'";
                                $execelemenapl2v=mysql_query($sqlelemenapl2v);
                                $execelemenapl2av=mysql_fetch_array($execelemenapl2v);
                                //echo "lll".$sqlelemenapl2v;  
                                $bykelemenapl2v=$execelemenapl2av['byk2apl2v'];
                                	if($bykelemenapl2v<1) {
                                		$seharus="  ";
                                		$wr="red";
                                	}else 
                                	{
                                		$seharus=" Seharusnya ".$bykelemenapl2v ;
                                		$wr="green";
                                	}
                                $ckjmlval="select count(svalidasi) as bykvalidasi from apl2 where idadsesi='".$idadsesi."' and idskema='".$idsk."' and idunit='".$dunitvapl2."' and svalidasi='Y'";
                                $ckjmlvala=mysql_query($ckjmlval);
                                $ckjmlvalb=mysql_fetch_array($ckjmlvala);
                                $ckjmlvald=$ckjmlvalb['bykvalidasi'];
                                //echo $ckjmlval;
                                //echo $bykunitapl2;
				if($bykunitapl2v>0 and $ckjmlvald==$bykelemenapl2v){
                                   $stadav='disabled';
                                   //echo $stada;
                               }
				else { $stadav=' ';}
                                
				echo "<tr><td><input type=hidden name=idskema".$i." value='$idskema'><input type=hidden name=idunit".$i." value='$dunitvapl2'><input type=checkbox name=kodeunit".$i." value='$kodeunitvapl2' $stadav> ".$kodeunitvapl2." </td><td>".$namaunitvapl2." </td><td> Diisi asesi ".$bykunitapl2v."<font color=$wr>$seharus </font> Yang di validasi ".$ckjmlvald."</td>";



				?>
				<?php
				$i++;
				
			}
		//}
			echo "<input type=hidden name='nz' value='".$i."' />";
			echo "<input type=hidden name=emailuserapl2 value='".$emailuser."'>";
			echo "<input type=hidden name=idasesorz value='".$idasesor."'>";
			echo "<input type=hidden name=kodez value='".$ie."'>";
			echo "<input type=hidden name=idasesiz value='".$idadsesi."'>";
			echo "<input type=hidden name=idskemaz value='".$idskemavapl2."'>";
			echo "<input type=hidden name=tglz value='".$tgl."'>";
			echo "<input type=hidden name=kz value='".$kelompok."'>";
			echo "<input type=hidden name=nmasser value='".$namaasesor."'>";
			echo "<input type=hidden name=linkttda2 value='".$linkttda."'>";
			
			?>
		</form>

		</td></tr><tr><td colspan="1"><input type="submit" id="gobutton" value="Lanjutkan" class="button"></td>
		<?php echo "<td colspan=2><a href=\"".$_SERVER['PHP_SELF'].
        "?op=rekomapl2&idasesor=".$idasesor."&tgl=".$tgl."&idasesi=".$idadsesi."&idskema=".$idskemavapl2."&kelomp=".$kelompok."&lkttd=".$linkttda."&nmass=".$namaasesor."\" class='btn btn-success'>Rekomendasi</a></td></tr>";
		echo "</table>";

 }


else if ($op == "vapl22")
{
    ?>
    <button type="button" class="btn btn-primary" onclick="window.print()">Print Halaman Ini</button>
    <?php
	echo "<form id=\"formContoh\" method=\"post\" action=\"".$_SERVER['PHP_SELF'].
        "?op=simpanvalidasiapl2\">";
    $namaasesor=$_POST['nmasser'];
    $idasesorq=$_POST['idasesorz'];
    $ieq=$_POST['kodez'];
    $idadsesiq=$_POST['idasesiz'];
    $idskq=$_POST['idskemaz'];
    $tgl=$_POST['tglz'];
	$kelompokq=$_POST['kz'];	
	$emailuser=trim($uname);
	$linkttda2=$_POST['linkttda2'];
    // echo "cek".$idadsesiq;	
	//echo "nama asesor ".$namaasesor;
	$sql="select * from lsp_usertbl where id_user='$idadsesiq'";
	//echo $sql;
	$shasil=mysql_query($sql);
	$sdata=mysql_fetch_array($shasil);
	$namap=$sdata['nama'];
	$idp=$sdata['id_user'];
    $emailp=$sdata['email'];
        echo "<table class=demo-table><tr><td colspan=9><strong>FR-APL-02 ASESMEN MANDIRI</strong></td></tr>
        <tr><td colspan=4><strong>
				Nama Peserta : $namap </strong></td><td colspan=5>Tanggal : $tgl </td></tr><tr>
				<td colspan=4><strong>Nama Asesor : $namaasesor</strong><td colspan=5></td></tr>             
				<tr><td colspan=9> Pada Bagian ini anda di minta untuk menilai diri sendiri terhadap unit kompetensi yang akan di ases</td></tr><tr> 
			       <td colspan=8>1. Pelajari seluruh standar Kriteria Unjuk Kerja  (KUK), batasan variabel, panduan penilaian dan aspek kritis serta yakinkan bahwa anda sudah benar-benar memahami seluruh isinya.</br>
2. Laksanakan penilaian mandiri dengan mempelajari dan menilai kemampuan yang anda miliki secara obyektif terhadap seluruh daftar pertanyaan yang ada, serta tentukan apakah sudah kompeten (K) atau belum kompeten (BK). </br>  
3. Siapkan bukti-bukti yang anda anggap relevan terhadap unit kompetensi, serta ‘matching’-kan setiap bukti yang ada terhadap setiap elemen/KUK, konteks variable, pengetahuan dan keterampilan yang dipersyaratkan serta aspek kritis</br>
4. Asesor dan asesi menandatangi form Asesmen Mandiri.</td></tr>";
        
	$nn = $_POST['nz'];
	//echo $nn;
	$cc=0;
	$ii=0; 
	$cc=0;
	$ccc=0;
	for ($cba=0; $cba<=$nn-1; $cba++)     		 	//echo "terplikh";
       {
        //echo $cba;
        if (isset($_POST['kodeunit'.$cba]))
        	{ 
				$idunitxyz=$_POST['idunit'.$cba];       		
        		$pjngv=strlen($_POST['kodeunit'.$cba]);
        		//echo "terpilih";
        	     if ($pjngv>0 )
        
        	     {
        	     	$ccc++;
               if ($ccc <=2  ){
               	//echo $idunitxyz;
				//if($ieq=="ed"){
				//$cekdata0 = "SELECT * FROM rekomendasi WHERE namarekom = 'apl2' and idskema='$idskq' and idasesi='$idadsesiq' and tanggal='$tgl'";
				//} 	
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
		$cek="select * from skemasiswa where emailsiswa='$emailp'"; //and statustesp='N'"; 
		$ada=mysql_query($cek);
        //echo $cek;
		if(mysql_num_rows($ada)>0){
			$data  = mysql_fetch_array($ada);
	        $skema=$data['idskema'];
	        $statusapl1=$data['statusapl1'];
                //echo "lklkl";
	        if($statusapl1=='Y')
	 		{
			$spemet="select * from pemetaan where idskema='$skema' and idpeserta='$idp'";
			$execpe=mysql_query($spemet);
			$hpemet=mysql_fetch_array($execpe);
			$namaass=$hpemet["namaasesor"];
			$tgl=$hpemet["tanggal"];
			//echo $namaass;
			  $ske="select * from skema where idskema='$skema'";  
			  $ske1=mysql_query($ske);
			  $ske2=mysql_fetch_array($ske1);
			  $namaskema=$ske2['namaskema'];
                         
              echo "<input type=hidden name=tgl value='$tgl'>";
              echo "<input type=hidden name=kelompok value='$kelompok'>"; 
			  echo "<tr><td colspan=9></td></tr>";
		
			      $sqlunit="select unitsiswa.idunit,unitsiswa.idskema,unitsiswa.idadsesi,unit.kodeunit,unit.namaunit from unitsiswa inner join unit on unitsiswa.idunit=unit.idunit where unitsiswa.idskema='$skema' and unitsiswa.idadsesi='$idp' and unitsiswa.idunit='$idunitxyz' order by unitsiswa.idunit";
			      //echo $sqlunit;
			    $eunit=mysql_query($sqlunit);
			      $i=0;
			    echo "<input type=hidden name=idskema value='$skema'>";
			    echo "<input type=hidden name=idadsesi value='$idp'>";
			    echo "<input type=hidden name=email value='$emailp'>";
			    echo "<input type=hidden name=idasesor value='$idasesor'>";
			   
			    while ($dunit=mysql_fetch_array($eunit))
				    {
			   
				       $sqelemen="select * from elemen where idunit='".$dunit['idunit']."' and idskema='$skema'";
				       //echo $sqelemen;
				       $eelemen=mysql_query($sqelemen);
						echo "<tr><th colspan=9>".$dunit['kodeunit']." ".$dunit['namaunit']."</th></tr>";
						$y=0;
						while ($delemen=mysql_fetch_array($eelemen))
      						{
          						$y++;
           	
							    $sqsubelemen="select * from subelemen where idelemen='".$delemen['idelemen']."' and idunit='".$dunit['idunit']."' and idskema='$skema'";
							 //   echo $sqsubelemen;
							$esubelemen=mysql_query($sqsubelemen);

							    $x=0;
									echo "<tr><th colspan=9>".$y.". ".$delemen['namaelemen']."</th></tr>";
									echo "<tr><td colspan=3><strong>NO KUK</strong></td><td><strong>SUB KOMPETENSI</strong></td><td><strong>K</strong></td><td><strong>BK</strong></td><td colspan=2><strong>BUKTI  PENDUKUNG</strong> </td><td colspan=2><strong>VALIDASI</strong> </td>"; 
									
									while ($dsubelemen=mysql_fetch_array($esubelemen))
									  {
							    			 $idsube=$dsubelemen['idsubelemen'];
										 $kuk=$dsubelemen['pertanyaan'];
              									 $x++;
									         //if($ieq=="in"){
                                                                                 $cekapl2="select * from apl2 where idelemen='".$delemen['idelemen']."' and idunit='".$dunit['idunit']."' and idskema='$skema' and idsubelemen='".$dsubelemen['idsubelemen']."' and idadsesi='$idp' and waktu='$tgl'"; //}
										 $cekgbrapl1="select idasesi,buktiapl1 from apl1 where idasesi='$idp'";
                                                                                 //echo $cekgbrapl1;
										 $cekgbrapl1a=mysql_query($cekgbrapl1);
                                                                                 $cekgbrapl1b=mysql_fetch_array($cekgbrapl1a);
											//else {
										//$cekapl2="select * from apl2 where idelemen='".$delemen['idelemen']."' and idunit='".$dunit['idunit']."' and idskema='$skema' and idsubelemen='".$dsubelemen['idsubelemen']."' and idadsesi='$idp' and svalidasi='Y' and waktu='$tgl'" ; }
     								
									$rcekapl2=mysql_query($cekapl2);
									//if(mysql_num_rows($rcekapl2)>0){ 
                                                                        $pp='';
									$ketk="";
    			    				$ketbk="";
									$sbukti="";
									$kdbs0="";
									$kdbs1="";
									$kdbs2="";
									$kdbs3="";
								
									if(mysql_num_rows($rcekapl2)>0)

									{ 
										//	echo $cekapl2;
									
									$hcekapl2=mysql_fetch_array($rcekapl2);
									//while ($hcekapl2=mysql_fetch_row($rcekapl2)){  
 									//echo "gambar". $hcekapl2['path'];
									//echo "ook".$hcekapl2['idsubelemen'];    
									 $gambar="../siswa/gambarimages/".$cekgbrapl1b['buktiapl1']; 
									// echo $gambar;
									 $pp="Tampilkan bukti";
									 $sbukti=$hcekapl2['sbukti']; 
									 $pecahdbs=explode(",",$sbukti);
    
									        $dbs0=$pecahdbs[0];
									        $dbs1=$pecahdbs[1];
										$dbs2=$pecahdbs[2];
										$dbs3=$pecahdbs[3];
										//echo "B".$db0;
										if(trim($dbs0)=='v')
										{
										 $kdbs0="checked";
										}
									       if(!empty($dbs1))
										{
										 $kdbs1="checked";
										}
									       if(!empty($dbs2))
										{
										 $kdbs2="checked";
										}
									       if(!empty($dbs3))
										{
										 $kdbs3="checked";
										}
									  
									 /*$kbk=$hcekapl2['tk'];
									    if($kbk=='K')
										{$ketk="checked";}
										else{$ketbk="checked";}*/
									//} 
									//	echo $sbukti;								 //$kuk=$hcekapl2['pertanyaan'];
									 //echo $ketbk."</br>";
									 $kbk=$hcekapl2['tk'];
									    if($kbk=='K')
										{$ketk="../images/ceklist.png";}
										else{$ketbk="../images/ceklist.png";}

  									 echo"<tr><td colspan=3>".$y.".".$x."</td><td>$kuk<input type=hidden name=idunit".$i." value=".$dunit['idunit']."><input type=hidden name=idelemen".$i." value=".$delemen['idelemen']."></td><td><img src=$ketk><br/></td><td><img src=$ketbk></td><td><input type=hidden name=idsube".$i." value='$idsube'></td></td><td><a href=$gambar target=_blank>$pp</td>";
echo"<td><input type=checkbox name=validasia".$i." value='v' $kdbs0>V<input type=checkbox name=validasib".$i." value='a' $kdbs1>A<input type=checkbox name=validasic".$i." value='t' $kdbs2>T <input type=checkbox name=validasid".$i." value='m' $kdbs3>M</td>";
									     }else{
										echo "<tr><th colspan=9> -----Asesi belum mengisi----</th>";}
            									 $i++;
            									 //echo "nilai si".$i;
                      							 }
 						}
      					}
					
  				}

		}


?>

<!--</td><td><input type=hidden  name="n" value="<?php echo $i ;?>"/>-->

<?php
		 }
		 }
		 }

       } //for 
        echo "<input type=hidden name=lkttda value='$linkttda2'>";
        echo "<input type=hidden name=nmsor value='$namaasesor'>";
		echo "<input type=hidden name=klmpk value='$kelompokq'>";
        echo "</tr><tr><td colspan=9><input type=checkbox name=test id=ckok > Sudah di validasi</td>";
        echo "</tr><tr><td colspan=9><input type='hidden' name='n' value='".$i."'><input id=lanjutkan name=lanjutkan class='btn btn-info' type=submit value=Lanjutkan disabled>  </td></table>";
		echo" </form>";
?>
<script>
var checker=document.getElementById('ckok');
var sendbtn=document.getElementById('lanjutkan');
checker.onchange=function(){
lanjutkan.disabled=!this.checked;};
</script>
<?php
}

else if ($op == "simpanvalidasiapl2")
{
	//$idpermohonan=$_POST['idpermohonan'];
	$nmasesor=$_POST['nmsor'];
	//echo "kajkajs".$_POST['nmsor'];
	$idasesor=$_POST['idasesor'];
	$idskema=$_POST['idskema'];
	$idasesi=$_POST['idadsesi'];
	$email=$_POST['email'];
	$n=$_POST['n'];
	$tgl=$_POST['tgl'];
	$klmpk=$_POST['klmpk'];
	$lkttda=$_POST['lkttda'];

	//echo "lakslask".$klmpk;
	for ($i=0; $i<=$n-1; $i++)
	{
     
     //if (isset($_POST['validasia'.$i]) or isset($_POST['validasib'.$i]) or isset($_POST['validasic'.$i]) or isset($_POST['validasid'.$i]) )
     //{
       //echo "oook";
     $idunit=$_POST['idunit'.$i];
     $idelemen= $_POST['idelemen'.$i];
     $idsubelemen= $_POST['idsube'.$i];	
     $validasi0=$_POST['validasia'.$i];
     $validasi1=$_POST['validasib'.$i];
     $validasi2=$_POST['validasic'.$i];
     $validasi3=$_POST['validasid'.$i];
     $allvalidasi=$validasi0.",".$validasi1.",".$validasi2.",".$validasi3;
     
     //echo $idelemen;
     //$lt=$_POST['lt'.$i];
     $sqlupdate="update apl2 set sbukti='$allvalidasi', svalidasi='Y' where idskema='$idskema' and idadsesi='$idasesi' and idelemen='$idelemen' and idsubelemen='$idsubelemen' and waktu='$tgl'";
     //echo $sqlupdate;
     $exec=mysql_query($sqlupdate);
     //}

    } ?>
	<form id="formContoh" method="POST" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=validasiunitdapl2\"";?>> 
	<!--<?php
	echo "<input type=hidden name=tgl value='$tgl'>";
	echo "<input type=hidden name=idskema value='$idskema'>";	
	echo "<input type=hidden name=kelompok value='$klmpk'>";
	echo "<input type=hidden name=idasesor value='$idasesor'>";
	?>-->
	<?php
	if($exec){
	echo "<td><a href=\"".$_SERVER['PHP_SELF'].
        "?op=validasiunitdapl2&idasesor=".$idasesor."&k=".$klmpk."&tgl=".$tgl."&kode=".$ei."&idasesi=".$idasesi."&idskema=".$idskema."&lkttd=".$lkttda."&nmass=".$nmasesor."\" class='btn btn-info'>Sukses Lanjutkan</a></td>";}
	?>

	<!--</br><input type="submit" id="gobutton" value="Proses selesai.. Lanjutkan" class="button"> -->
	<?php


}



else if ($op == "srekomapl2")
{
    $idskemarekapl2=$_POST['idskttd'];
    $idasesirekapl2=$_POST['idadsesittd'];
    $tglrekapl2=$_POST['tglttd'];
    $idasesorrekapl2=$_POST['idasesorttd'];
    $lrekapl2=$_POST['lrekttd'];
    $catatanrekapl2=$_POST['cttapl2'];
	$emailad=$_POST['emailttd'];
    $nmasesorapl2=$_POST['nmasesorttd'];
    $klapl2=$_POST['klttd'];
	//echo "lrek".$lrekapl2;
	//echo $catatanrekapl2;
    $cekdata = "SELECT * FROM rekomendasi WHERE namarekom = 'apl2' and idskema='$idskemarekapl2' and idasesi='$idasesirekapl2' and tanggal='$tglrekapl2'";
    //echo $cekdata;
	$ada=mysql_query($cekdata);
   	if(mysql_num_rows($ada)>0){
    $ssqlrekapl2="update rekomendasi set rekom='$lrekapl2' , catatan='$catatanrekapl2' where namarekom = 'apl2' and idskema='$idskemarekapl2' and idasesi='$idasesirekapl2' and tanggal='$tglrekapl2'"; 
    }else{$ssqlrekapl2="insert into rekomendasi value('','apl2','$idskemarekapl2','$idasesorrekapl2','$idasesirekapl2','$lrekapl2','$catatanrekapl2','','$tglrekapl2')";}
    //echo $ssqlrekapl2;
	$execrekapl2=mysql_query($ssqlrekapl2);
	if($execrekapl2){
   	$updskemasis="update skemasiswa set statusapl2='Y' where idskema='$idskemarekapl2' and emailsiswa='$emailad'";
   	//echo $updskemasis;
   	$updskemasisa=mysql_query($updskemasis);
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


	echo "<form id=\"formContoh\" method=\"post\" enctype=\"multipart/form-data\" action=\"".$_SERVER['PHP_SELF'].
			"?op=listpeserta\">";
	echo "<input type=hidden name=tgl value='$tglrekapl2'>";
	echo "<input type=hidden name=idskema value='$idskemarekapl2'>";
	echo "<input type=hidden name=kelompok value='$klapl2'>";
	echo "<input type=hidden name=namasapl2 value='$nmasesorapl2'>";
	echo "<input type=hidden name=idasesor value='$idasesorrekapl2'>";
	echo "<input type=submit id=gobutton value=Lanjutkan class='button'>";
	echo "</form>";

}


?>


<body>
<br/>
	<?php
	$cekduluttd="select id_user,linkttd from lsp_usertbl where id_user='$idasesorxv'";
	//echo $cekduluttd;
	$cekduluttda=mysql_query($cekduluttd);
	$cekduluttdb=mysql_fetch_array($cekduluttda);
	$cekduluttdc=strlen($cekduluttdb['linkttd']);
	if ($cekduluttdc>0)
	{
	$queryvmain ="SELECT * FROM pemetaan where idasesor='$idasesorxv' group by kelompok,idskema";
	$hasilvmain = mysql_query($queryvmain);
	//echo $queryvmain;
	//$ada=mysql_query($);
   	if(mysql_num_rows($hasilvmain)>0){
	?>

	<table class=demo-table >
	<tr>
    <th bgcolor='#006699'>No</th>	
    <th bgcolor='#006699'>Kelompok</th>
    <th bgcolor='#006699'>Skema</th>
    <th bgcolor='#006699'>Nama Skema</th>
    <th bgcolor='#006699' colspan='2'>Aksi</th>
	</tr>
 
<?php
 
	// bagian ini digunakan untuk menampilkan semua data
	$no = 1;
	$queryvvmain ="SELECT * FROM pemetaan where idasesor='$idasesorxv' group by kelompok,idskema";
	$hasilvvmain = mysql_query($queryvvmain);
	while ($datavvmain = mysql_fetch_array($hasilvvmain))
	{
	$ssql="select * from skema where idskema=".$datavvmain['idskema'];
	//echo $ssql;
	$execssql=mysql_query($ssql);
	$baris=mysql_fetch_array($execssql);
	$namaskema=$baris['namaskema'];
	echo "<tr>";
	echo "<td bgcolor='#99CCFF'>".$no."</td>";
	//echo "<td bgcolor='#99CCFF'>".$data['id_user']."</td>";
	echo "<td bgcolor='#99CCFF' align=left>".$datavvmain['kelompok']."</td>";
	echo "<td bgcolor='#99CCFF' align=left>".$datavvmain['idskema']."</td>";
	echo "<td bgcolor='#99CCFF' align=left>".$namaskema."</td>";  	
	echo "<td><a href=\"".$_SERVER['PHP_SELF'].
        "?op=pilihtanggal&idskema=".$datavvmain['idskema']."&kelompok=".$datavvmain['kelompok']."\"><span class='glyphicon glyphicon-user'>Tampilkan Peserta</a> 
    </td>";
	echo "</tr>";
	$no++;
	}
	echo "</div>";
	}else{ echo "Belum ada jadwal";}
	} else 
	{
	?>
   	<div class="container">
			  <div class="alert alert-warning">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>Tanda tangan belum diisi</strong>
			  </div>
			</div> <?php
	}
?>

<!--end databaru-->
		<div>
		</div>
		</div>
        </div> 
			
</body>
</html>

<?php } 
}
?>
