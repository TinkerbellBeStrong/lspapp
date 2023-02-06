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
<link href="../css/tabelbaru2.css" rel="stylesheet">
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
			<li class="active"><a href="mak5.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"/></use></svg>FR.AK.05 Laporan Assesment</a></li>
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
			<h4>LAPORAN ASESMEN</h4>
                        
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
$nmskema=$_GET['nmskema'];

?>
<form id="formContoh" method="POST" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=listpeserta\"";?>> 
<input type="hidden" name="kelompok" value="<?php echo $kelompok ;?>">
<input type="hidden" name="idskema" value="<?php echo $idskema ;?>">
<input type="hidden" name="idasesor" value="<?php echo $idasesor ;?>">
<input type="hidden" name="nmskema" value="<?php echo $nmskema ;?>">
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
 
else if ($op=="pilihunit")
{
	$idskemamak5=$_GET['idskema'];
	$kelompokmak5=$_GET['kelompok'];
	$namaskemamak5=$_GET['nmskema'];
	$idasesormak5=$_GET['idasesor'];
	$kdskemamak5=$_GET['kdskema'];
	$tglmak5=$_GET['tgl'];
	
	//echo "test ...";?>
    <table class=demo-table width=100%>
	<!--<tr><td colspan="3"><strong>Skema : <?php echo $namaskema; ?></strong></td></tr>-->
	<tr><th colspan='3'><strong> PILIH UNIT</strong> </th></tr>
	<tr><th bgcolor='#006699'>Kode Unit</th><th bgcolor='#006699'>Nama Unit</th><th bgcolor='#006699'>Aksi</th></tr>
	<?php
	$sqlunitmak5="select * from unit where idskema='$idskemamak5' order by kodeunit";
			$execunitmak5=mysql_query($sqlunitmak5);

			//echo $unit;
			
			$i = 0;
			while ($unit2mak5=mysql_fetch_array($execunitmak5)){
				$dunitmak5=$unit2mak5['idunit'];
				//$nunit=$unit2['namaunit'];
				$kodeunitmak5=$unit2mak5['kodeunit'];
				$namaunitmak5=$unit2mak5['namaunit'];
				echo "<tr><td>".$kodeunitmak5." </td><td>".$namaunitmak5." </td> ";
				echo "<td><a href=\"".$_SERVER['PHP_SELF'].
				"?op=listpeserta&idskema2=".$idskemamak5."&kodeunti2=".$kodeunitmak5."&tgl2=".$tglmak5."&nmunit2=".$namaunitmak5."&idunit2=".$dunitmak5."&idasesor2=".$idasesormak5."&kdskema2=".$kdskemamak5."&nmskema2=".$namaskemamak5."&kelompok2=".$kelompokmak5."\"><img src=../images/edit.png>Peserta</a></td>";
				$i++;
				
			}
}	
 
 
else if ($op == "listpeserta")
{
	?>
    <button type="button" class="btn btn-primary" onclick="window.print()">Print Halaman Ini</button>
    <?php
    $idasesor=$_GET['idasesor2'];
    $idskema= $_GET['idskema2'];
    $kelompok=$_GET['kelompok2'];
    $tgl=$_GET['tgl2'];
    $nmskema=$_GET['nmskema2'];
	$kodeskema=$_GET['kdskema2'];
	$idunit=$_GET['idunit2'];
	$nmunit=$_GET['nmskema2'];
	$kdunit=$_GET['kodeunti2'];
    $nmass="select nama,id_user,linkttd from lsp_usertbl  where id_user='$idasesor'";
    ///echo $nmskema;
    $nmassa=mysql_query($nmass);
    $nmassb=mysql_fetch_array($nmassa);
    $ssl="select pemetaan.idpeserta,pemetaan.namapeserta,pemetaan.tanggal from pemetaan where pemetaan.kelompok='$kelompok' and pemetaan.idskema='$idskema' and pemetaan.tanggal='$tgl' and idasesor='$idasesor'";
    $exec0=mysql_query($ssl); ?>
    <form id="obs" name="obsmak5" method="POST" <?php echo "action=\"".$_SERVER['PHP_SELF']."?op=postobsmak5\"";?>>
        <?php
   // $idasesi=$exec0['idpeserta'];
    //echo "laksl".$ssl;
    echo "<input type=hidden name=idasesor value='$idasesor'>";
	echo "<input type=hidden name=kdunit value='$kdunit'>";
	echo "<input type=hidden name=idskema value='$idskema'>";
	echo "<input type=hidden name=tgl value='$tgl'>";
	echo "<input type=hidden name=kelompok value='$kelompok'>";
	echo "<input type=hidden name=idunit value='$idunit'>";
	echo "<input type=hidden name=nmasesor value='".$nmassb['nama']."'>";
	
	//echo "<input type=text name=email value='".$nmassb['nama']."'>";
    echo "<table class=demo-table>";
    echo "<tr><td colspan=6>Judul Skema :".$nmskema."</td></td>";
    echo "<tr><td colspan=6>Nomor : $kodeskema </td></td>";
    echo "<tr><td colspan=6>TUK : Sewaktu</td></td>";
    echo "<tr><td colspan=6>Nama Asesor : ".$nmassb['nama']."</td></td>";
    echo "<tr><td colspan=6>Tanggal : ".$tgl."</td></td>";
	
	echo "<tr><td rowspan=2>Unit Kompetensi : </td><td colspan=5>$nmunit</td></tr>";
	echo "<tr><td colspan=5>$kdunit</td></tr>";
	
  
    echo "<tr><th bgcolor='#006699'>ID Asesi</th><th bgcolor='#006699'>Nama Asesi</th><th bgcolor='#006699'>Tanggal</th><th bgcolor='#006699'>Kompeten</th><th bgcolor='#006699'>Belum Kompeten</th><th bgcolor='#006699'>Keterangan**</th></tr>";
     $i=0;
     while($hasil0 = mysql_fetch_array($exec0))
      {
      $ckmak5="select * from mak5baru where idskema='".$idskema."' and idasesi='".$hasil0['idpeserta']."' and idasesor='".$idasesor."' and idunit='".$idunit."'";
	 //echo $ckmak5;
	 $adackmak5=mysql_query($ckmak5);
	 $adackmak5a=mysql_fetch_array($adackmak5);
	 $ketmak5a=$adackmak5a['ketmak5'];
	 //if(mysql_num_rows($adackmak6)>0){
     //    $ket="Sudah divalidasi";
      //   }else{ $ket="Belum di Validasi";}
      	if($adackmak5a['bk']=='K')
      	{
      		$ckekk5="checked";
      	}
      	else {
      		$ckekk5=" ";
      	}
      	if($adackmak5a['bk']=='BK')
      	{
      		$ckebk5="checked";
      	}
      	else {
      		$ckebk5=" ";
      	}
		
      echo "<tr><td><input type=hidden name=idpeserta".$i." value=".$hasil0['idpeserta'].">".$hasil0['idpeserta']."</td>";
      echo "<td>".$hasil0['namapeserta']."<input type=hidden name=nmpeserta".$i." value='".$hasil0['namapeserta']."'</td>";
      echo "<td>".$hasil0['tanggal']."</td>";
      //echo "<td>".$ket."</td>";
      //$ei="in";
       
        echo "<td><input type=radio name=pcpmak6".$i." value='K' $ckekk5></td>";
		echo "<td><input type=radio name=pcpmak6".$i." value='BK' $ckebk5></td>";
		echo "<td><input type=text  name=ketmak5".$i." value='$ketmak5a' </td></tr>";

       $i++;
       }
  $ttsass="../imgttd/".$nmassb['linkttd'];
   
		echo "<tr><td colspan=6>**Tuliskan Kode dan Judul Unit Kompetensi yang dinyatakan BK pada kolom keterangan </td></tr>";	
		echo "<tr><td colspan=3> Aspek Negatif dan Positif dalam Asesemen</td><td colspan=4> <input type=text name=aspek size=40 value='".$adackmak5a['aspek']."'> </td></tr>";
		echo "<tr><td colspan=3> Pencatatan Penolakan Hasil Asesmen</td><td colspan=4> <input type=text name=tolak size=40 value='".$adackmak5a['penolakan']."'> </td></tr>";
		echo "<tr><td colspan=3> Saran Perbaikan : (Asesor/Personil Terkait)</td><td colspan=4> <input type=text name=saran size=40 value='".$adackmak5a['saran']."'> </td></tr>";
		echo "<tr><td colspan=3> Catatan : </td><td colspan=4> Asesor : </td></tr>";
		echo "<tr><td rowspan=3 colspan=2  ><input type=text name=catatanmak5 size=35 value='".$adackmak5a['catatan']."'><td>Nama </td><td colspan=3>".$nmassb['nama']."</td></tr>";  
		echo "<tr><td>No. Reg </td><td colspan=3></td></tr>";
		echo "<tr><td>Tanda Tangan  </td><td colspan=3><img src=".$ttsass." height=50></td></tr>";  
		echo "<tr><td colspan=6><input type=hidden name='n' value='".$i."'>";
		echo "<input type=submit name=simpan id=gobutton value=Simpan></td></tr>";
	  
	
     echo"</form>";
    
    
}



else if($op=="postobsmak5")
{
$aspek=$_POST['aspek'];	
$tolak=$_POST['tolak'];
$saran=$_POST['saran'];
$catatan=$_POST['catatanmak5'];
$nmasesor=$_POST['nmasesor'];
$kdunit=$_POST['kdunit'];
$email=trim($_POST['email']);
$ids=$_POST['idskema'];
//$idasesi=$_POST['idadsesi'];
$idasesor=$_POST['idasesor'];
$tgl=$_POST['tgl'];
$kelompok=$_POST['kelompok'];
$n = $_POST['n'];
$idunit= $_POST['idunit'];


$sukses=0;
$gagal=0;
$ntot=0;
for ($i=0; $i<=$n-1; $i++)
   {
     
     if (isset($_POST['pcpmak6'.$i]))
     {
        
		//echo "alkslaskl";
       	$nmpeserta = $_POST['nmpeserta'.$i];
       	$idasesi=$_POST['idpeserta'.$i];
       	//$idpraktek = $_POST['idpraktek'.$i];
       	//$bk=$_POST['bk'.$i];
       	$bk=$_POST['pcpmak6'.$i];
       	$ketmak5=$_POST['ketmak5'.$i];
       //	echo "fgfgfg".$ketmak5;
        //$kodeunit=$_POST['kodeunit'.$i];
                // echo "abc".$aahitung;
         //if($bk=='K'){
        //  $ni=50;}
        //  else {$ni=0;}
	
        // $ntot=$ni+$ny;

        $cekdata="select * from mak5baru where idskema='".$ids."' and idasesi='".$idasesi."' and idasesor='".$idasesor."' and idunit='".$idunit."'";
	 echo $cekdata;
       $ada=mysql_query($cekdata);
	if(mysql_num_rows($ada)>0){
          //echo "Terjadi duplikate</br>";
          $sqlmk5="update mak5baru set bk='$bk', ketmak5='$ketmak5', aspek='$aspek',penolakan='$tolak',saran='$saran',catatan='$catatan' where idskema='".$ids."' and idunit='".$idunit."' and idasesi='".$idasesi."' and idasesor='".$idasesor."'";
          $sqlm=mysql_query($sqlmk5);
	       }else { 
	  
	    $sqlmak5="insert into mak5baru value('','$ids','$idunit','$idasesi','$idasesor','$bk','$kelompok','$ketmak5','$aspek','$tolak','$saran','$catatan','$nmasesor','$nmpeserta','$kdunit')";
        //echo $sqlmak5;
        $okmak6=mysql_query($sqlmak5);
                	
       
               }
		// else $gagal=$x-$sukses;
     } //else { echo"<script>alert('Tidak ada/kuranglengkap pilihan !');history.go(-1);</script>";}     
//if($okmak6){echo "sukses..";} else {echo "gagal ..";} 
}
echo"<script>alert('proses selesai.... !');history.go(-2);</script>";
?>
<!--<form id="formContoh" method="post" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=listpeserta\"";?>> -->
<?php 
/**
echo "<input type=hidden name=tgl value='$tgl'>";
echo "<input type=hidden name=idskema value='$ids'>";
echo "<input type=hidden name=kelompok value='$kelompok'>";
echo "<input type=hidden name=idasesor value='$idasesor'>";
echo "<input type=hidden name=idasesi value='$idasesi'>";
**/
//echo "<script>history.go(-1);</script>";
?>

<!--</br><input type="submit" id="gobutton" value="Proses selesai.. Lanjutkan" class="button">-->

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
$sukses=0;
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

<table class="demo-table">
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
        "?op=pilihunit&idskema=".$dataobvmain['idskema']."&tgl=".$dataobvmain['tanggal']."&idasesor=".$idasesor."&kdskema=".$baris['kodeskema']."&nmskema=".$namaskema."&kelompok=".$dataobvmain['kelompok']."\"><img src=../images/edit.png>Tampilkan Unit</a> 
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
