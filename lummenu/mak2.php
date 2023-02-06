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
			<li class="active"><a href="mak2.php"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg>FR.AK.02 Rekaman Assesment</a></li>
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
			<h4>Rekaman Assesment</h4>
                        
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

    //$idskema= $_GET['idskema'];
    //$kelompok=$_GET['kelompok'];
    $sqlttdass="select * from lsp_usertbl where id_user='$idasesor'";
    $sqlttdassa=mysql_query($sqlttdass);
    $sqlttdassb=mysql_fetch_array($sqlttdassa);

    $ssl="select * from pemetaan where kelompok='$kelompok' and idskema='$idskema' and tanggal='$tgl' and idasesor='$idasesor'";
    $exec0=mysql_query($ssl);
    //echo "laksl".$ssl;
    echo "<table class=demo-table>";
    echo "<tr><th bgcolor='#006699'>ID Asesi</th><th bgcolor='#006699'>Nama Asesi</th><th bgcolor='#006699'>Tanggal</th><th bgcolor='#006699'>Ket</th><th colspan=2 bgcolor='#006699'>Aksi</th></tr>";
     while($hasil0 = mysql_fetch_array($exec0))
      {

        $cekvlmak4="select idadsesi,idskema,waktu,svalidasi from mak4 where idskema='$idskema' and waktu='$tgl' and idadsesi='".$hasil0['idpeserta']."' and svalidasi='Y' group by idadsesi,idskema,waktu,svalidasi";
      //echo $cekvlmak4;
      $cekvlmak4a=mysql_query($cekvlmak4);
      $cekvlmak4b=mysql_fetch_array($cekvlmak4a);
      
      //if(
      $b=mysql_num_rows($cekvlmak4a);
      //echo "jjj".$cekvlmak4b['loba'];
      //echo trim($b);
     if($b>0){
             $ketvlmak2="<font color=green><span class='glyphicon glyphicon-ok'>Sudah Pernah divalidasi</font>";}
          else{
             $ketvlmak2="<font color=red><span class='glyphicon glyphicon-remove'>Belum Divalidasi</font>";
		
        }


      if($hasil0['statusvalid']=='Y'){
         $ket="Sudah divalidasiiii";
         }else{ $ket="Belum di Validasiii";}
      
      echo "<tr><td>".$hasil0['idpeserta']."</td>";
      echo "<td>".$hasil0['namapeserta']."</td>";
      echo "<td>".$hasil0['tanggal']."</td>";
      echo "<td>".$ketvlmak2."</td>";
      $ei="in";
      echo "<td><a href=\"".$_SERVER['PHP_SELF'].
        "?op=validasiunitdmak2&idasesor=".$hasil0['idasesor']."&k=".$hasil0['kelompok']."&tgl=".$hasil0['tanggal']."&kode=".$ei."&idasesi=".$hasil0['idpeserta']."&nmasesor=".$hasil0['namaasesor']."&idskema=".$idskema."\"><span class='glyphicon glyphicon-check'>Validasi</a></td>";
      //echo "<td><a href=\"".$_SERVER['PHP_SELF'].
        //"?op=validasiaplmak4&idasesor=".$hasil0['idasesor']."&k=".$hasil0['kelompok']."&tgl=".$hasil0['tanggal']."&kode=ed&idasesi=".$hasil0['idpeserta']."&idskema=".$idskema."\"><span class='glyphicon glyphicon-edit'>Edit</a></td></tr>";
       
        echo "<td><a href=\"".$_SERVER['PHP_SELF'].
        "?op=rekommak2&idasesor=".$hasil0['idasesor']."&tgl=".$hasil0['tanggal']."&idasesi=".$hasil0['idpeserta']."&idskema=".$idskema."&nmasesor=".$hasil0['namaasesor']."&ttdass=".$sqlttdassb['linkttd']."\"><span class='glyphicon glyphicon-edit'>Rekomendasi</a></td></tr>";
       }
     echo "<table class=demo-table>";
      
    
}

else if($op=="rekommak2")
    {
	?>
    <button type="button" class="btn btn-primary" onclick="window.print()">Print Halaman Ini</button>
    <?php	
    	//echo "lkdlkl;f";
    $namaasesorttd2=$_GET['nmasesor'];
	$idasesorttd2=$_GET['idasesor'];
	$idadsesittd2=$_GET['idasesi'];
	$tglttd2=$_GET['tgl'];
    $idskttd2=$_GET['idskema'];
    $ttdass=$_GET['ttdass']; 
     $cekduluvlapl2="select idadsesi,idskema,waktu,svalidasi from apl2 where idadsesi='".$idadsesittd2."' and waktu='".$tglttd2."' and svalidasi='T' and idskema ='".$idskttd2."' group by idadsesi,idskema,waktu,svalidasi";
     $cekduluvlapl2a=mysql_query($cekduluvlapl2);
     $cekduluvlapl2b=mysql_num_rows($cekduluvlapl2a);
     //$cekduluvlapl2c=mysql_fetch_array($cekduluvlapl2a);
     //$emailttd=$cekduluvlapl2c['email'];
     //echo "nmnms".$cekduluvlapl2;
     if ($cekduluvlapl2b>0)
     {
      echo "<strong><font color=red>VALIDASI BELUM SELESAI !!!</font></strong> ";
     }
     else 
     {

     $unitmak2="select unitsiswa.idunit,unitsiswa.idadsesi,unit.namaunit from unitsiswa INNER JOIN unit ON unitsiswa.idunit=unit.idunit where unitsiswa.idadsesi=$idadsesittd2";
	 //echo $unitmak2; 
	 $unitmak2a=mysql_query($unitmak2);
	 
	 
        echo "<form id=\"formContoh\" method=\"post\" enctype=\"multipart/form-data\" action=\"".$_SERVER['PHP_SELF'].
        "?op=srekommak2\">";
		
	
        echo "<table>";
		echo "<tr><td>Unit kompetensi</td><td>Observasi demonstrasi</td><td>Portofolio</td><td>Pernyataan Pihak Ketiga Pertanyaan Wawancara</td><td>Pertanyaan lisan</td><td>Pertanyaan tertulis</td><td>Proyek kerja</td><td>Lainnya</td></tr>";
	    $e=0;
		while ($unitmak2b=mysql_fetch_array($unitmak2a)){
			
		$cekduluumak23="select * from unitmak2 where idskemamak2='$idskttd2' and idunitmak2='$unitmak2b[idunit]' and idasesormak2='$idasesorttd2' and idasesimak2='$idadsesittd2'";
		//echo "$cekduluumak23";
		$excekduluumak23=mysql_query($cekduluumak23);
		if(mysql_num_rows($excekduluumak23)>0)
		{
		$arrcekduluumak23=mysql_fetch_array($excekduluumak23);
		$pecahumak2=explode(",",$arrcekduluumak23['jawabanmak2']);
		//echo "klskdsld".$arrcekduluumak23['jawabanmak2'];
		$pecahumak2obs=$pecahumak2[0];
		$pecahumak2por=$pecahumak2[1];
		$pecahumak2ww=$pecahumak2[2];
		$pecahumak2pl=$pecahumak2[3];
		$pecahumak2pt=$pecahumak2[4];
		$pecahumak2pk=$pecahumak2[5];
		$pecahumak2ln=$pecahumak2[6];
		
		if($pecahumak2obs=='obs')
		{
			$cekobs="checked";
		}
		else 
		{
			$cekobs="";
		}
		if($pecahumak2por=='por')
		{
			$cekpor="checked";
		}
		else 
		{
			$cekpor="";
		}
		if($pecahumak2ww=='ww')
		{
			$cekww="checked";
		}
		else 
		{
			$cekww="";
		}
		if($pecahumak2pl=='pl')
		{
			$cekpl="checked";
		}
		else 
		{
			$cekpl="";
		}
		if($pecahumak2pt=='pt')
		{
			$cekpt="checked";
		}
		else 
		{
			$cekpt="";
		}
		
		if($pecahumak2pk=='pk')
		{
			$cekpk="checked";
		}
		else 
		{
			$cekpk="";
		}
		
		if($pecahumak2ln=='ln')
		{
			$cekln="checked";
		}
		else 
		{
			$cekln="";
		}
		
		
		}
		
		echo "<tr><td>$unitmak2b[namaunit] <input type=hidden name=idunitmak2b".$e." value=$unitmak2b[idunit]></td><td><input type=checkbox name=obs".$e." value=obs $cekobs></td><td><input type=checkbox name=por".$e." value=por $cekpor></td><td><input type=checkbox name=ww".$e." value=ww $cekww></td><td><input type=checkbox name=pl".$e." value=pl $cekpl></td><td><input type=checkbox name=pt".$e." value=pt $cekpt></td><td><input type=checkbox name=pk".$e." value=pk $cekpk></td><td><input type=checkbox name=ln".$e." value=ln $cekln></td></tr>";	
		$e++;
		}
		echo "<input type=hidden name=banyake value=$e>";
		echo "</table>";
		echo "</br>";
	$cekrekommak22 = "SELECT * FROM mak2rekom WHERE namarekom = 'mak2' and idskema='$idskttd2' and idasesi='$idadsesittd2' and tanggal='$tglttd2'";
    //echo "hjjasjhajs".$cekrekommak22;
    $cekrekommak22a=mysql_query($cekrekommak22);
    $cekrekommak22b=mysql_num_rows($cekrekommak22a);
    if($cekrekommak22b>0)
    {
    	$cekrekommak22c=mysql_fetch_array($cekrekommak22a);
    	if($cekrekommak22c['pencapaian']=='Y')
    	{
    		$ccapai="checked";
    	} else 
    	{
    		$ccapai=" ";
    	}
    	if($cekrekommak22c['pencapaian']=='T')
    	{
    		$ctcapai="checked";
    	} else 
    	{
    		$ctcapai=" ";
    	}
        
        if($cekrekommak22c['senjang']=='Y')
        {
        	$csenjang="checked";
        } else 
            {
            	$csenjang=" ";
            }
        if($cekrekommak22c['senjang']=='T')
        {
        	$ctsenjang="checked";
        } else 
            {
            	$ctsenjang=" ";
            }
        
        if($cekrekommak22c['saran']=='Y')
           {
           	$csaran="checked";
           }    
           else 
           {
           	$csaran=" ";
           }
           if($cekrekommak22c['saran']=='T')
           {
           	$ctsaran="checked";
           }    
           else 
           {
           	$ctsaran=" ";
           }

           $ccatsenjang=$cekrekommak22c['catsenjang'];
           $ccatsaran=$cekrekommak22c['catsaran'];

    }

    

    $cekdata0mak2 = "SELECT * FROM rekomendasi WHERE namarekom = 'mak2' and idskema='$idskttd2' and idasesi='$idadsesittd2' and tanggal='$tglttd2'";
 		 //echo $cekdata0mak2;
   	$ada02=mysql_query($cekdata0mak2);
   	$adax2=mysql_fetch_array($ada02);
   
    	$lrek2=$adax2['rekom'];
    	$cat2=$adax2['catatan'];
       	if($lrek2=='L'){
      	$klrek2='checked';
     	}else{$klrek2='';}
     	if($lrek2=='T'){
      	$klrek02='checked';
     	}else{$klrek02='';}
    
    $catatan2=$data02['catatan'];        


	$sqlttd2="select * from lsp_usertbl where id_user='$idadsesittd2'";
	//echo $sqlttd;
    $sqlttda2=mysql_query($sqlttd2);
    $sqlttdb2=mysql_fetch_array($sqlttda2);
    $linkttda2="../imgttd/".$sqlttdb2['linkttd'];
	$namapttd2=$sqlttdb2['nama'];
	$emailttd2=$sqlttdb2['email'];
	$linkttdass="../imgttd/".$ttdass;
    //$idasesittd=$sqlttd['id_user'];
	echo"<table>
    <tr><td colspan=5><strong>Umpan balik terhadap pencapaian unjuk kerja </strong></td></tr>
    <tr><td><input  type=radio name=tercapai value='Y' $ccapai></td><td colspan=4>Seluruh Elemen Kompetensi/Kriteria Unjuk Kerja (KUK) yang diujikan telah tercapai</td></tr>
     <tr><td><input  type=radio name=tercapai value='T' $ctcapai></td><td colspan=4>Identifikasi kesenjangan pencapaian unjuk kerja </td></tr>
     <tr><td colspan=5><strong>Identifikasi kesenjangan pencapaian unjuk kerja  </strong></td></tr>
     <tr><td><input  type=radio name=senjang value='T' $ctsenjang></td><td colspan=4>Tidak ada kesenjangan</td></tr>
     <tr><td><input  type=radio name=senjang value='Y' $csenjang></td><td colspan=4>Ditemukan kesenjangan pencapaian, sebagai berikut pada :</br>Kode & Tuliskan JudulUnit Kompetensi Elemen / Kriteria Unjuk Kerja   :</br>
	<textarea name=cttsenjang rows=3 cols=30 >$ccatsenjang</textarea></td></tr>
	<tr><td colspan=5><strong>Saran tindak lanjut hasil asesmen  </strong></td></tr>
	<tr><td><input  type=radio name=ulang value='Y' $csaran></td><td colspan=4>Agar memelihara kompetensi yang telah dicapai </td></tr>
	<tr><td><input  type=radio name=ulang value ='T' $ctsaran></td><td colspan=4>Perlu dilakukan asesmen ulang pada :
Kode dan Judul Unit Kompetensi </br>
<textarea name=cttulang rows=3 cols=30 >$ccatsaran</textarea>
	</td></tr>
     
	<tr><td colspan=2 rowspan=3> Rekomendasi </br><input type=radio name=lrekkp2 value='L' $klrek2 >Kompeten</br> <input type=radio name=lrekkp2 value='T' $klrek02>Belum Kompeten</br> Pada sertifikasi/Klaster Asesmen </br>  yang diujikan</br> <textarea name=cttmak22 rows=3 cols=30 value=>$cat2</textarea></td><td colspan=7><strong> Asesi </strong></td></tr><tr><td>Nama : </td><td colspan=6>$namapttd2</td></tr><tr><td>Tanda Tangan : </td><td colspan=6><img src='$linkttda2'></td>";
    echo"</tr><td colspan=2 rowspan=3> <td colspan=7><strong>Asesor</strong></td></tr><tr><td>Nama : </td><td colspan=6>$namaasesorttd2</td></tr><tr><td>Tanda Tangan : </td><td colspan=6><img src='$linkttdass' height=70></td>";
    echo "</tr><tr><td colspan=9><input type='hidden' name='n' value='".$i."'><input type=submit name=simpan id=gobutton value=Simpan></td>";
    echo" <input type =hidden name=idskttd2 value='$idskttd2'>
         <input type =hidden name=idadsesittd2 value ='$idadsesittd2'>
         <input type =hidden name=tglttd2 value='$tglttd2'>
         <input type =hidden name=idasesorttd2 value='$idasesorttd2'>
         <input type =hidden name=emailttd2 value='$emailttd2'></table></form>";
    }
    }

else if ($op == "srekommak2")
{
// echo "hjhjshdjsh djskhd jkshdjks hdkjsh dkjshkjdshkjd";
    $idskemarekapl22=$_POST['idskttd2'];
    $idasesirekapl22=$_POST['idadsesittd2'];
    $tglrekapl22=$_POST['tglttd2'];
    $idasesorrekapl22=$_POST['idasesorttd2'];
    $lrekapl22=$_POST['lrekkp2'];
    $catatanrekapl22=$_POST['cttmak22'];
	$emailad2=$_POST['emailttd2'];
    $tercapai=$_POST['tercapai'];
    $senjang=$_POST['senjang'];
    $ulang=$_POST['ulang'];
    $cttsenjang=$_POST['cttsenjang'];
    $cttulang=$_POST['cttulang'];
	
	$banyakumak2=$_POST['banyake'];
	for ($i=0; $i<=$banyakumak2-1; $i++)
	{
	$idunitrekapl22=$_POST['idunitmak2b'.$i];
    $jawabanrekapl22=$_POST['obs'.$i].",".$_POST['por'.$i].",".$_POST['ww'.$i].",".$_POST['pl'.$i].",".$_POST['pt'.$i].",".$_POST['pk'.$i].",".$_POST['ln'.$i];
		
	$cekduluumak2="select * from unitmak2 where idskemamak2='$idskemarekapl22' and idunitmak2='$idunitrekapl22' and idasesormak2='$idasesorrekapl22' and idasesimak2='$idasesirekapl22'";
    $excekduluumak2=mysql_query($cekduluumak2);
    if(mysql_num_rows($excekduluumak2)>0)
	{
	$upunitmak2="update unitmak2 set jawabanmak2='$jawabanrekapl22' where idskemamak2='$idskemarekapl22' and idunitmak2='$idunitrekapl22' and idasesormak2='$idasesorrekapl22' and idasesimak2='$idasesirekapl22'";
	//echo $upunitmak2;
	$exupunitmak2=mysql_query($upunitmak2);
	}		
	else {
		
	
	$insunitmak2="insert into unitmak2 value('','$idskemarekapl22','$idunitrekapl22','$idasesorrekapl22','$idasesirekapl22','$jawabanrekapl22')";
	//echo $insunitmak2;
	$exinsunitmak2=mysql_query($insunitmak2);
	}
	}
	
	
	//echo "lrek".$lrekapl2;
	//echo $catatanrekapl2;
     $cekdata2 = "SELECT * FROM rekomendasi WHERE namarekom = 'mak2' and idskema='$idskemarekapl22' and idasesi='$idasesirekapl22' and tanggal='$tglrekapl22'";
    // echo $cekdata2;
     $ada2=mysql_query($cekdata2);
   	if(mysql_num_rows($ada2)>0){
    $ssqlrekapl22="update rekomendasi set rekom='$lrekapl22' , catatan='$catatanrekapl22' where namarekom = 'mak2' and idskema='$idskemarekapl22' and idasesi='$idasesirekapl22' and tanggal='$tglrekapl22'"; 
    }else{$ssqlrekapl22="insert into rekomendasi value('','mak2','$idskemarekapl22','$idasesorrekapl22','$idasesirekapl22','$lrekapl22','$catatanrekapl22','','$tglrekapl22')";}
    //echo $ssqlrekapl22;
   $execrekapl2=mysql_query($ssqlrekapl22);
   if($execrekapl2){
   	
   	//$updskemasis="update skemasiswa set statusapl2='Y' where idskema='$idskemarekapl2' and emailsiswa='$emailad'";
   	//echo $updskemasis;
   	//$updskemasisa=mysql_query($updskemasis);
   	$cekrekommak2 = "SELECT * FROM mak2rekom WHERE namarekom = 'mak2' and idskema='$idskemarekapl22' and idasesi='$idasesirekapl22' and tanggal='$tglrekapl22'";
   	//echo $cekrekommak2;
   	$cekrekommak2a=mysql_query($cekrekommak2);

   	if(mysql_num_rows($cekrekommak2a)>0) 
   	{
   	$uprekommak2="update mak2rekom set pencapaian='$tercapai', senjang='$senjang', saran='$ulang' , catsenjang='$cttsenjang', catsaran='$cttulang' WHERE namarekom = 'mak2' and idskema='$idskemarekapl22' and idasesi='$idasesirekapl22' and tanggal='$tglrekapl22'";	
	$uprekommak22=mysql_query($uprekommak2);
   	}
   	else 
   	{
   		$inrekommak2="insert into mak2rekom value('','mak2','$idskemarekapl22','$idasesorrekapl22','$idasesirekapl22','$tercapai','$senjang','$ulang','$cttsenjang','$cttulang','$tglrekapl22')";
		$inrekommak2=mysql_query($inrekommak2);
   	}
   	//$upinsuc=mysql_query($uprekommak2);
   	//echo $uprekommak2;
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

else if ($op == "validasiunitdmak2")
{

        $namaasesor=$_GET['nmass'];  
	    $idasesor=$_GET['idasesor'];
        $ie=$_GET['kode'];
        $idadsesi=$_GET['idasesi'];
        $idsk=$_GET['idskema'];
        $tgl=$_GET['tgl'];
	    $kelompok=$_GET['k'];	
	    $nmasesor=$_GET['nmasesor'];
	    $emailuser=trim($uname);
	    
		 echo "<form id=\"formContoh\" method=\"post\" enctype=\"multipart/form-data\" action=\"".$_SERVER['PHP_SELF'].
        "?op=validasiaplmak2\">"; ?>
			<table class=demo-table width=100%>
			<!--<tr><td colspan="3"><strong>Skema : <?php echo $namaskema; ?></strong></td></tr>-->
			<tr><th colspan='3'><strong> PILIH UNIT</strong> </th></tr>
			<tr><th bgcolor='#006699'>Kode Unit</th><th bgcolor='#006699'>Nama Unit</th><th bgcolor='#006699'> Keterangan</th></tr>

			<?php 
	    $sqlunitvapl2="select unitsiswa.idadsesi,unitsiswa.idunit,unit.kodeunit,unit.namaunit,unit.idskema from unitsiswa INNER JOIN unit on unitsiswa.idunit=unit.idunit where unitsiswa.idskema='$idsk' and unitsiswa.idadsesi='$idadsesi' order by unit.kodeunit";
//	    echo $sqlunitvapl2;

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
                                 
                                $sqlcekapl2v="select mak2.idskema,mak2.idadsesi,mak2.idunit,mak2.idelemen,mak2.idsubelemen from mak2 where idadsesi='".$idadsesi."' and idskema='".$idsk."' and idunit='".$dunitvapl2."'";
                                //echo $sqlcekapl2v;
                                
                                //echo $sqlunitupload;
                                $execsqlunitapl2v=mysql_query($sqlcekapl2v);
                                $execsqlunitapl2av=mysql_fetch_array($execsqlunitapl2v);
                                $bykunitapl2v=mysql_num_rows($execsqlunitapl2v);
                                //echo "lakslaksl".$bykunitapl2v;
	                            $idev=$execsqlunitapl2av['idunit'];
                                $sqlelemenapl2v="select count(idelemen) as byk2apl2v from subelemen where idunit='$dunitvapl2'";
                                $execelemenapl2v=mysql_query($sqlelemenapl2v);
                                $execelemenapl2av=mysql_fetch_array($execelemenapl2v);
                                //echo "lll".$sqlelemenapl2v;  
                                $bykelemenapl2v=$execelemenapl2av['byk2apl2v'];

                                $ckjmlval="select count(svalidasi) as bykvalidasi from mak2 where idadsesi='".$idadsesi."' and idskema='".$idsk."' and idunit='".$dunitvapl2."' and svalidasi='Y'";
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
                                
				echo "<tr><td><input type=hidden name=idskema".$i." value='$idskema'><input type=hidden name=idunit".$i." value='$dunitvapl2'><input type=checkbox name=kodeunit".$i." value='$kodeunitvapl2' $stadav> ".$kodeunitvapl2." </td><td>".$namaunitvapl2." </td><td> Seharusnya ".$bykelemenapl2v." Yang di validasi ".$ckjmlvald."</td>";



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
			echo "<input type=hidden name=idskemaz value='".$idsk."'>";
			echo "<input type=hidden name=tglz value='".$tgl."'>";
			echo "<input type=hidden name=kz value='".$kelompok."'>";
			echo "<input type=hidden name=nmasser value='".$nmasesor."'>";
			
			
			
			?>

		</form>
		</td></tr><tr><td colspan="3"><input type="submit" id="gobutton" value="Lanjutkan" class="button"></td></tr></table>
		
		</div>
   <?php }






else if ($op == "validasiaplmak2")

{

//echo "oeoiroeiroer";
?>
 <button type="button" class="btn btn-primary" onclick="window.print()">Print Halaman Ini</button>
 <?php
 echo "<form id=\"formContoh\" method=\"post\" action=\"".$_SERVER['PHP_SELF'].
        "?op=simpanvalidasimak2\">";

        $idasesorm2=$_POST['idasesorz'];
        $iem2=$_POST['kodez'];
        $idadsesim2=$_POST['idasesiz'];
        $idskm2=$_POST['idskemaz'];
        $tglm2=$_POST['tglz'];    
        $kelompokm2=$_POST['kz'];	
	    $emailuser=trim($uname);
	    $nmasesorm2=$_POST['nmasser'];
		$sql="select * from lsp_usertbl where id_user='$idadsesim2'";
		//echo $sql;
		$shasil=mysql_query($sql);
		$sdata=mysql_fetch_array($shasil);
		$namap=$sdata['nama'];
		$idp=$sdata['id_user'];
	    $emailp=$sdata['email']; 

	    $ckskemam2="select * from skema where idskema='$idskm2'";
	    //echo $ckskemam2;
	    $ckskemam2a=mysql_query($ckskemam2);
	    $ckskemam2b=mysql_fetch_array($ckskemam2a);
    
	    echo "<input type=hidden name=tgl value='$tglm2'>";
              echo "<input type=hidden name=kelompok value='$kelompokm2'>"; 
			  
			  echo "<table class=demo-table><tr><td colspan=10>REKAMAN ASESMEN</td></tr>
				<tr><td colspan=10>Nama Skema : ".$ckskemam2b['namaskema']."</td></tr><tr><td colspan=5>
				Nama Peserta : $namap </td><td colspan=5>Tanggal : $tglm2 </td></tr><tr>
				<td colspan=5>Nama Asesor : $nmasesorm2<td colspan=5></td></tr>             
				<tr><td colspan=10> Pada Bagian ini anda di minta untuk menilai diri sendiri terhadap unit kompetensi yang akan di ases</td></tr><tr> 
			       <td colspan=10>Penjelasan untuk Asesor : </br>
				1. 	Asesor mengorganisasikan pelaksanaan asesmen berdasarkan metoda dan instrumen/sumber-sumber asesmen seperti yang tercantum dalam perencanaan asesmen.</br>
				2. Asesor melaksanakan kegiatan pengumpulan bukti serta mendokumentasikan seluruh bukti pendukung yang dapat ditunjukkan oleh Peserta sesuai dengan kriteria unjuk kerja yang dipersyaratkan.</br>
				3. Asesor membuat keputusan apakah Peserta sudah Kompeten (K),  Belum kompeten (BK) atau Asesmen Lanjut (AL), untuk setiap kriteria unjuk kerja berdasarkan bukti-bukti.</br>
				4. Asesor memberikan umpan balik kepada Peserta mengenai pencapaian unjuk kerja dan Peserta juga diminta untuk memberikan umpan balik terhadap proses asesmen yang dilaksanakan (kuesioner).</br>
				5. Asesor dan Peserta bersama-sama menandatangani pelaksanaan asesmen.</br>    
				6. Kolom Jenis Bukti diisi dengan jenis bukti  yang dipilih</td></tr>";
		

        $nn = $_POST['nz'];
		//echo $nn;
		$cc=0;
		$ii=0; 
		$cc=0;
		$ccc=0;
		for ($cma=0; $cma<=$nn-1; $cma++)     		 	//echo "terplikh";
       {
       	//echo $_POST['kodeunit'.$cma];
       	//echo $_POST['idunit'.$cma];
				  if (isset($_POST['kodeunit'.$cma]))
        			{	 
        		//echo $_POST['kodeunit'.$cma];		
				$idunitxyz=$_POST['idunit'.$cma];       		
        		//echo "kjaksj".$idunitxyz;
        		$pjngv=strlen($_POST['kodeunit'.$cma]);
        		if ($pjngv>0 )
        
        	     {

        	     	$ccc++;
               
               if ($ccc <=2  ){
      
        		//echo "terpilih";		      
     $cekdata0 = "SELECT * FROM mak4rekom WHERE idskema='$idskm2' and idasesi='$idadsesim2' and tanggal='$tglm2'";
          //} 	
 		// echo $cekdata0;
   	$ada0=mysql_query($cekdata0);
   	$adax=mysql_fetch_array($ada0);
   
    	$lrek=$adax['rekom'];
    	$cat=$adax['catatan'];
        $umpanb=$adax['umpanb'];
        $idenkes=$adax['idenkes'];
	$saran=$adax['saran'];
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
                          
			      $sqlunit="select unitsiswa.idunit,unitsiswa.idskema,unitsiswa.idadsesi,unit.kodeunit,unit.namaunit from unitsiswa inner join unit on unitsiswa.idunit=unit.idunit where unitsiswa.idskema='$skema' and unitsiswa.idadsesi='$idp' and unitsiswa.idunit='$idunitxyz' order by unitsiswa.idunit";
			    $eunit=mysql_query($sqlunit);
			    //echo $sqlunit;
			      $i=0;
			    echo "<input type=hidden name=idskema value='$skema'>";
			    echo "<input type=hidden name=idadsesi value='$idp'>";
			    echo "<input type=hidden name=email value='$emailp'>";
			    echo "<input type=hidden name=idasesor value='$idasesor'>";
			    while ($dunit=mysql_fetch_array($eunit))
				    {
			   
     
				       $sqelemen="select * from elemen where idunit='".$dunit['idunit']."' and idskema='$skema'";
				       $eelemen=mysql_query($sqelemen);
				      echo "<tr><th colspan=10>".$dunit['kodeunit']." ".$dunit['namaunit']."</th></tr>";
					 $y=0;
					while ($delemen=mysql_fetch_array($eelemen))
      						{
          						$y++;
           	
							    $sqsubelemen="select * from subelemen where idelemen='".$delemen['idelemen']."' and idunit='".$dunit['idunit']."' and idskema='$skema'";
            						$esubelemen=mysql_query($sqsubelemen);
            						//echo $sqsubelemen;	
									///TES BARU 
									
									//ENDTES BARU
									

							    $x=0;
									echo "<tr><th colspan=9>".$y.". ".$delemen['namaelemen']."</th></tr>";
									echo "<tr><td colspan=3><strong>Kriteria Unjuk Kerja</strong></td><td colspan=2><strong>Pencapaian</strong></td><td colspan=2><strong>Keputusan</strong></td><td colspan=5><strong>BUKTI  PENDUKUNG</strong> </td>"; 
									echo "<tr><td colspan=3><strong></strong></td><td><strong>Y</strong></td><td><strong>T</strong><td><strong>K</strong></td><td><strong>BK</strong></td><td></td><td><strong>Bukti Langsung</strong> </td><td><strong>Bukti Tidak Langsung</strong> </td><td><strong>Bukti Tambahan</strong> </td>"; 
									
									while ($dsubelemen=mysql_fetch_array($esubelemen))
									  {
							    			 $idsube=$dsubelemen['idsubelemen'];
										 $kuk=$dsubelemen['pertanyaan'];
              									 $x++;

									         //if($ie=="in"){
                                       //$cekmak2="select * from subelemen where idelemen='".$delemen['idelemen']."' and idunit='".$dunit['idunit']."' and idskema='$skema'";//}// and idsubelemen='".$dsubelemen['idsubelemen']."' and idadsesi='$idp' and waktu='$tgl'"; }
											//else {
//										   $cekmak22="select * from mak4 where idelemen='".$delemen['idelemen']."' and idunit='".$dunit['idunit']."' and idskema='$skema' and idsubelemen='".$dsubelemen['idsubelemen']."' and idadsesi='$idp' and svalidasi='Y' and waktu='$tgl'" ; //}
     								//echo $cekmak4;
									//$rcekmak2=mysql_query($cekmak2);
									//if(mysql_num_rows($rcekmak4)>0){ 
                                      $cekmak22="select * from mak2 where idelemen='".$delemen['idelemen']."' and idunit='".$dunit['idunit']."' and idskema='$skema' and idsubelemen='".$dsubelemen['idsubelemen']."' and idadsesi='$idp' and waktu='$tgl'" ; //}
//                                      echo $cekmak22;
                                      $cekmak22a=mysql_query($cekmak22);
                                      $cekmak22b=mysql_num_rows($cekmak22a);

                                    //$pp='';
									//$ketk="";
    			    				//$ketbk="";
									//$sbukti="";
									//if($ie=="in"){
									//$kdbs0="checked";}else{$kdbs0="";}
									//$kdbs1="";
									//$kdbs2="";
									//$kdbs3="";
								
									//if(mysql_num_rows($rcekmak4)>0)

									//{ 
                                      //if($cekmak22b>0)
                                      //{
                                      	$cekmak22c=mysql_fetch_array($cekmak22a);
										//echo $cekmak22c['tk']; 
										if ($cekmak22c['tk']=='K')
										
										{
											$ketk="checked";
										}
										else
										{
											$ketk=" ";
										}
										if( $cekmak22c['tk']=='BK' )
										{
											$ketbk="checked";
										}
										else
										{
											$ketbk=" ";
										}
										if( $cekmak22c['yt']=='Y' )
										{
											$kety="checked";
										}
										else
										{
											$kety=" ";
										}
										if( $cekmak22c['yt']=='T' )
										{
											$ketyt="checked";
										}
										else
										{
											$ketyt=" ";
										}	
											//echo "kkk".$cekmak22c['YT'].$kety;

																			
									//$hcekmak4=mysql_fetch_array($rcekmak4);
									//while ($hcekmak4=mysql_fetch_row($rcekmak4)){  
 									//echo "abc"; 
									//echo "ook".$hcekmak4['idsubelemen'];    
									 $gambar="../siswa/gambarimages/".$hcekmak4['path']; 
									 $pp="Tampilkan bukti";
									 $sbukti=$cekmak22c['sbukti']; 
									 $pecahdbs=explode(",",$sbukti);
    
									        $dbs0=$pecahdbs[0];
									        $dbs1=$pecahdbs[1];
										$dbs2=$pecahdbs[2];
										$dbs3=$pecahdbs[3];
										//echo "B".$db0;
										if(($dbs0)=='v')
										{
										 $kdbs0="checked";
										}
										else 
										{
										  $kdbs0=" ";	
										}


									    if(($dbs1)=='a')
																		
										{
										 $kdbs1="checked";
										}
										else 
										{
										$kdbs1=" ";	
										}

										if(($dbs2)=='t')
																		
										{
										 $kdbs2="checked";
										}
										else 
										{
										$kdbs2=" ";	
										}
									     
									 //$kbk=$hcekmak4['tk'];
									   // if($kbk=='T')
									//	{$ketbk="checked";}
									//	else{$ketk="checked";}
									//} 
									//	echo $sbukti;								 //$kuk=$hcekmak4['pertanyaan'];
									 //echo $x.$kbk."</br>";
									         
  									 echo"<tr><td colspan=2>".$y.".".$x."</td><td>$kuk<input type=hidden name=idunit".$i." value=".$dunit['idunit']."><input type=hidden name=idelemen".$i." value=".$delemen['idelemen']."></td><td><input type=radio name=py".$i." value=Y $kety></td><td><input type=radio name=py".$i." value=T $ketyt ></td><td><input type=radio name=bk".$i." value=k $ketk ><br/></td><td><input type=radio name=bk".$i." value=bk $ketbk ></td><td><input type=hidden name=idsube".$i." value='$idsube'></td>"; 
//<td><a href=$gambar target=_blank>$pp</td>";
echo"<td><input type=checkbox name=validasia".$i." value='v' $kdbs0></td><td><input type=checkbox name=validasib".$i." value='a' $kdbs1></td><td><input type=checkbox name=validasic".$i." value='t' $kdbs2></td>";
									   //  }else{
										//echo "<tr><th colspan=9> -----tidak ada data----</th>";}
            									 $i++;
                      							 }
 						}
      					}

  				}

  			}
  		}
  		}
  		}
  		} //for 
  		echo "</tr><tr><td colspan=9><input type='hidden' name='n' value='".$i."'><input type=submit name=simpan id=gobutton value=Simpan></td>";
?>
</table class="demo-table">
<!--</td><td><input type=hidden  name="n" value="<?php echo $i ;?>"/>-->
</form>
<?php
}

else if ($op == "simpanvalidasimak2")
{

//$idpermohonan=$_POST['idpermohonan'];
$idasesor=$_POST['idasesor'];
$idskema=$_POST['idskema'];
$idasesi=$_POST['idadsesi'];
$email=$_POST['email'];
$n=$_POST['n'];
$tgl=$_POST['tgl'];
$kelompok=$_POST['kelompok'];
$umpanb=$_POST['umpanb'];
$idenkes=$_POST['idenkes'];
$saran=$_POST['saran'];
for ($i=0; $i<=$n-1; $i++)
   {
     
     if (isset($_POST['validasia'.$i]) or isset($_POST['validasib'.$i]) or isset($_POST['validasic'.$i]))
     {
       //echo "oook";
     $idunit=$_POST['idunit'.$i];
     $idelemen= $_POST['idelemen'.$i];
     $idsubelemen= $_POST['idsube'.$i];	
     $validasi0=$_POST['validasia'.$i];
     $validasi1=$_POST['validasib'.$i];
     $validasi2=$_POST['validasic'.$i];
     //$validasi3=$_POST['validasid'.$i];
     $allvalidasi=$validasi0.",".$validasi1.",".$validasi2; //,".$validasi3;
     
     
     //echo $idelemen;
     $py=$_POST['py'.$i];
     $bk=$_POST['bk'.$i];
     $cekmak4ada="select * from mak2 where idelemen='".$idelemen."' and idunit='".$idunit."' and idskema='$idskema' and idsubelemen='".$idsubelemen."' and idadsesi='$idasesi' and svalidasi='Y' and waktu='$tgl'" ;
     $cekmak4adaa=mysql_query($cekmak4ada);
     //echo  $cekmak4ada;
     $cekmak4adab=mysql_num_rows($cekmak4adaa);
     if($cekmak4adab>0){
    $sqlupdate="update mak2 set tk='$bk',YT='$py',sbukti='$allvalidasi', svalidasi='Y' where idskema='$idskema' and idadsesi='$idasesi' and idelemen='$idelemen' and idsubelemen='$idsubelemen' and waktu='$tgl'";}
      else {
     $sqlupdate="insert into  mak2 value('','$idskema','$idunit','$idelemen','$idsubelemen','$idasesi','$email','$tgl','$bk','$allvalidasi','Y','$py')";}
    //echo $sqlupdate;
     //echo $sqlupdate;
     $exec=mysql_query($sqlupdate);
     }

    }
    

    ?>
<form id="formContoh" method="POST" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=listpeserta\"";?>> 
<?php
echo "<input type=hidden name=tgl value='$tgl'>";
echo "<input type=hidden name=idskema value='$idskema'>";
echo "<input type=hidden name=kelompok value='$kelompok'>";
echo "<input type=hidden name=idasesor value='$idasesor'>";
?>
</br><input type="submit" id="gobutton" value="Proses selesai.. Lanjutkan" class="button"> 
<?php


}




?>


<body>
<br/>
<?php
$queryvmain ="SELECT * FROM pemetaan where idasesor='$idasesor' group by kelompok,idskema";
$hasilvmain = mysql_query($queryvmain);
//$ada=mysql_query($);
   	if(mysql_num_rows($hasilvmain)>0){
?>

<table class="demo-table">
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
$queryvvmain ="SELECT * FROM pemetaan where idasesor='$idasesor' group by kelompok,idskema";
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
