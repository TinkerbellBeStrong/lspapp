<!DOCTYPE html>
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


<?php
error_reporting(0);
//session_set_cookie_params(3600*2,"/");
session_start();
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
			<li class="active"><a href="rekapasesi.php"><svg class="glyph stroked calendar blank"><use xlink:href="#stroked-calendar-blank"/></use></svg>Rekap Hasil Tes</a></li>
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
			<h4>REKAP HASIL TES ASESI </h4>
                        
</div><!--/.row-->
		
		
				
		<!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
<!--data nu baru -->

<form id="formContoh" method="POST" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=hasilgrade\"";?>> 
<!--<input type="hidden" name="kelompok" value="<?php echo $kelompok ;?>">
<input type="hidden" name="idskema" value="<?php echo $idskema ;?>">-->
<input type="hidden" name="idasesorrekap" value="<?php echo $idasesor ;?>">
<div class="form-group"><strong>Pilih Tanggal :</strong>
<select id="tgl" name="tgl" placeholder="Tanggal" autofocus>
<?php
      $tampiltgl="select * from grade  group by tanggal";
      $exectgl=mysql_query($tampiltgl);
      //echo $tampiltgl;
		while($rtgl=mysql_fetch_array($exectgl))
		{
                //         echo "ll";
   				echo "<option value=$rtgl[tanggal] selected>$rtgl[tanggal]</option> ";
					}
?>
	 </select>

<!--<div><strong>Pilih Asesi :</strong>
<select id="asei" name="asei" placeholder="Asesi">
<?php
$sqlunitsisz="Select pemetaan.idpeserta,pemetaan.idasesor,lsp_usertbl.nama,lsp_usertbl.email from pemetaan inner join lsp_usertbl on pemetaan.idpeserta = lsp_usertbl.id_user where pemetaan.idasesor='$idasesor' order by lsp_usertbl.nama";
$exeunitsisz=mysql_query($sqlunitsisz);
      //echo $tampiltgl;
		while($rasei=mysql_fetch_array($exeunitsisz))
		{
                //         echo "ll";
   				echo "<option value=$rasei[email] selected>$rasei[nama] -- $rasei[email]</option> ";
					}
?>
	 </select>
</div>-->
</div>

<input type="submit" id="gobutton" value="Lanjutkan" class="button"> 

<?php 
$op = $_GET['op'];
 
if($op=="hasilgrade")
{

$tgl=$_POST['tgl'];
$asei=$_POST['asei'];
$idasesorrekap=$_POST['idasesorrekap'];
echo "<table width=90% >";

//$sqluser="SELECT * from lsp_usertbl email=";
//echo $sqlgrade;
//$exeuser=mysql_query($sqlunit);
//while ($rowunit=mysql_fetch_array($exeunit)){
//$idunit=$rowunit['idunit'];
//$kdunit=$rowunit['kodeunit'];

//echo "<tr><td>".$kdunit."</td></tr>";
//echo "<tr><th colspan=3 bgcolor='#006699'>Nama</th></tr>";
$dataPerPage = 10;
if(isset($_GET['page']))
{
    $noPage = $_GET['page'];
} 





else $noPage = 1;
$offset = ($noPage - 1) * $dataPerPage;

$sqlunitsisgrade="Select pemetaan.idpeserta,pemetaan.idasesor,lsp_usertbl.nama,lsp_usertbl.email from pemetaan inner join lsp_usertbl on pemetaan.idpeserta = lsp_usertbl.id_user where pemetaan.idasesor='$idasesor'";// and lsp_usertbl.email='$asei' "; //LIMIT $offset, $dataPerPage";
//echo $sqlunitsisgrade;
$exeunitsisgrade=mysql_query($sqlunitsisgrade);
while ($rowunitsisgrade=mysql_fetch_array($exeunitsisgrade)){
$namagrade=$rowunitsisgrade['nama'];
$emailgrade=trim($rowunitsisgrade['email']);
echo "<tr><td colspan=6 bgcolor='#819FF7'><strong> NAMA ASESI : ".$namagrade."</strong></td></tr>";
$sqlgrade="Select grade.nim,grade.kelas,grade.kd_modul,grade.grade,grade.tanggal,unitalias.namaalias,unitalias.kdalias from grade inner join unitalias on grade.kelas=unitalias.kdalias  where grade.nim='$emailgrade' and grade.tanggal='$tgl'";
//echo $sqlgrade;
$exegrade=mysql_query($sqlgrade);
echo "<tr>";
echo "<td bgcolor='#A9D0F5'>No. </td><td colspan=1 bgcolor='#A9D0F5'><strong>Kode Unit</strong></td>";
echo "<td bgcolor='#A9D0F5'><strong>Nama Unit</strong></td><td bgcolor='#A9D0F5'><strong>Hasil Tes</strong></td><td bgcolor='#A9D0F5'><strong>Keterangan</strong></td><td bgcolor='#A9D0F5'><strong>Total</strong></td></tr>";
$totalgrade=0;
$hit=0;
while ($rowgrade=mysql_fetch_array($exegrade)){
$hit++;
//echo $hit;
if($rowgrade['grade']<75)
 {
 $ket="Belum Kompeten";
 $wr="red";} 
 else {
 $wr="green";
 $ket="Kompeten";}
$totalgrade=$totalgrade+$rowgrade['grade'];
echo "<tr>";
echo "<td>".$hit."</td>";
echo "<td>".$rowgrade['kdalias']."</td>";
echo "<td>".$rowgrade['namaalias']."</td>";
echo "<td>".$rowgrade['grade']."</td>";
//echo "<td>".$rowgrade['tanggal']."</td>";
echo "<td><font color=$wr> $ket </font>";
echo "<td>".$totalgrade."
</td>
</tr>";
}
echo "<tr><td colspan=3><strong> Rata-Rata </strong></td><td colspan=3><strong>(".$totalgrade."/".$hit.") = ".($totalgrade/$hit)."</strong></td></tr>";

//$kdunit2=$rowunit['kodeunit'];
//echo "<td>".$kdunit."</td>";

//echo $kdunit."</br>";
//$sqlgrade="select nim,nama,GROUP_CONCAT(if(kd_modul='".$kdunit."', grade, NULL)) AS '$kdunit2' from grade group by nim,nama";
//echo $sqlgrade;
//$exegrade=mysql_query($sqlgrade);
//$dave= mysql_query($sqlgrade);

}
/***
echo"<tr><td colspan=4><center>";

$query   = "SELECT COUNT(*) AS jumData FROM pemetaan where idasesor='$idasesor'";
$hasil  = mysql_query($query);
$data     = mysql_fetch_array($hasil);
$jumData = $data['jumData'];
$jumPage = ceil($jumData/$dataPerPage);
if ($noPage > 1) echo  "<a href='".$_SERVER['PHP_SELF']."?page=".($noPage-1)."'>&lt&lt; Prev</a>";
for($page = 1; $page <= $jumPage; $page++)
{
         if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
         {   
            if (($showPage == 1) && ($page != 2))  echo "..."; 
            if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "...";
            if ($page == $noPage) echo " <span class=active_tnt_link><b> ".$page." </b></span> ";
            else echo "<a href='".$_SERVER['PHP_SELF']."?page=".$page."'> ".$page."</a> ";
            $showPage = $page;          
         }
}
 
// menampilkan link next

if ($noPage < $jumPage) echo "<a href='".$_SERVER['PHP_SELF']."?page=".($noPage+1)."'>Next &gt&gt;</a>";
***/
echo "</center></td></tr></table>";

}

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
