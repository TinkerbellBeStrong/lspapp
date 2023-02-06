<DOCTYPE html>
<html>
<link href="css/tabel.css" rel="stylesheet" type="text/css" />

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
<script src="../lummenu/js/lumino.glyphs.js"></script>
<script src="../js/formValidation.min.js"></script>
<script src="../js/framework/bootstrap.min.js"></script>

<script src="../lummenu/js/jquery-2.2.3.min.js"></script>
<script src="../lummenu/js/bootstrap.js"></script>
<script src="../lummenu/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
            $(document).ready(function () {
                $('#tanggal').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
            });
        </script>

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
session_set_cookie_params(3600*2,"/");
session_start();
include "../lsp_koneksi.php";
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
 echo "<center><link href='css/adminstyle.css' rel='stylesheet' type='text/css'><strong> Anda Harus Login Dahulu ...!</strong><br>";
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
  /*width: 200px;*/
  font-size: 13px;
  padding: 7px;
  border: 1px solid #c3c3c3;
  border-radius: 7px;
  
}

form div.dynamiclabel textarea{
	height: 150px;
}

form div.dynamiclabel select{
  
  font-size: 14px;
  padding: 7px;
  border: 1px solid #c3c3c3;
  border-radius: 7px;
  /*text-transform: uppercase*/
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
<script type="text/javascript">
            $(document).ready(function () {
                $('#tanggal').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
            });
        </script>	

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
			nama: {
				validators: {
					notEmpty: {
						message: 'Username Tidak Boleh Kosong'
					}
				}
			},
			
			tmplahir: {
				validators: {
					notEmpty: {
						message: 'Nama Tidak Boleh Kosong'
					}
				}
			},

			tahun: {
				validators: {
					notEmpty: {
						message: 'Tahun Tidak Boleh Kosong'
					}
				}
			},
			alamat: {
				validators: {
					notEmpty: {
						message: 'Tidak Boleh Kosong'
					},
								
				}
			},
                        kodepos: {
				validators: {
					notEmpty: {
						message: 'Tidak boleh kosong'
					},
				}
			},
			pendidikan: {
				validators: {
					notEmpty: {
						message: 'Tidak Boleh Kosong'
					},
				}
			},
			kebangsaan: {
				validators: {
					notEmpty: {
						message: 'Tidak Boleh Kosong'
					},
				}
			},
			lembaga: {
				validators: {
					notEmpty: {
						message: 'Tidak Boleh Kosong'
					},
				}
			},
			jurusan: {
				validators: {
					notEmpty: {
						message: 'Tidak Boleh Kosong'
					},
				}
			}
		}
	})
});
</script>

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
<?php 
session_start();
if(isset($_SESSION['username'])) { $uname=$_SESSION['username'];}
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
			<li ><a href="validasiapl2.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></use></svg> Validasi APL2</a></li>
			<li><a href="asesormain.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></use></svg>FR.IA.08 Portofolio</a></li>
			<li><a href="observasi.php"><svg class="glyph stroked eye"><use xlink:href="#stroked-eye"/></use></svg>FR.IA.01 Observasi</a></li>
			<li><a href="mak2.php"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></use></svg>FR.AK.02 Rekaman Assesment</a></li>
			<li><a href="mak5.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"/></use></svg>FR.AK.05 Laporan Assesment</a></li>
			<li class="active"><a href="mak6baru.php"><svg class="glyph stroked map"><use xlink:href="#stroked-map"/></use></svg>FR.AK.06 Meninjau Proses Assesment</a></li>
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
			<h4>MENINJAU PROSES ASESMENT</h4>
                        
</div><!--/.row-->
		
		
				
		<!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
<!--data nu baru -->



	<title>Mak 5</title>

	<style>

	#progress { position:relative; width:300px;color:#111; border: 1px solid #ddd; padding: 1px;
				 border-radius: 3px;display: none; }
	#bar { background-color: #d2322d; width:0%; height:20px; border-radius: 3px; }
	#percent { position:absolute; display:inline-block; top:3px; left:48%; }

	</style>

	<!-- Jquery 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>-->
	<!-- Library Jquery untuk pengiriman form dengan jquery ajax  
	<script src="http://malsup.github.com/jquery.form.js"></script>-->

</head>

<body>
<?php
$op = $_GET['op'];
 
if($op=="mak7post")
{
$email=trim($_POST['email']);
$idasesi=$_POST['idadsesi'];
$n = $_POST['n'];
$tgl=$_POST['tanggal'];
$idskema=$_POST['idskema'];
$cttl=$_POST['catl'];;
//$rvalidasi=$_POST['rvalidasi'];
$rvalid=$_POST['rvalid'];
$idpengurus=$_POST['pengm6'];
$tanggal=$_POST['tanggal'];
//$tanggal2=date_format($tanggal,"Y-m-d");
$tanggal2=date('Y-m-d', strtotime($tanggal));
//echo "kajskasj".$idskema;
for ($i=0; $i<=$n-1; $i++)
   {
    if (isset($_POST['validasia'.$i]) or isset($_POST['validasib'.$i]) or isset($_POST['validasic'.$i]) or isset($_POST['validasid'.$i])or isset($_POST['valida']) or isset($_POST['validb']) or isset($_POST['validc'])or isset($_POST['validd']) or isset($_POST['valide']) )
     {
     $rvalidasi=$_POST['rvalidasi'.$i];
     $validasi0=$_POST['validasia'.$i];
     $validasi1=$_POST['validasib'.$i];
     $validasi2=$_POST['validasic'.$i];
     $validasi3=$_POST['validasid'.$i];
     $allvalidasi=$validasi0.",".$validasi1.",".$validasi2.",".$validasi3;
     //$allvalidasi=$validasi0.",".$validasi1;
     $valida=$_POST['valida'];
     $validb=$_POST['validb'];
     $validc=$_POST['validc'];
     $validd=$_POST['validd'];
     $valide=$_POST['valide'];
     $allvalid=$valida.",".$validb.",".$validc.",".$validd.",".$valide;
     $idqmak7=$_POST['idqmak7'.$i];

    //echo $idqmak7;
     $cekdulumak7="select * from mak7 where email='$email' and idqmak7='$idqmak7' and idskemamak7='$idskema'";
     $cekdulumak7a=mysql_query($cekdulumak7);
     //echo $cekdulumak7;
     
     if(mysql_num_rows($cekdulumak7a)>0){
       //echo "<font color=red>update ..</font>";
	$update="update mak7 set validasi='$allvalidasi',valid='$allvalid',rvalidasi='$rvalidasi', rvalid='$rvalid', tglreg='$tanggal2', idpeninjau='$idpengurus' where email='$email' and idqmak7='$idqmak7' and idskemamak7='$idskema'";
	//echo $update;
     $exup=mysql_query($update);
 	 }
     else 
        { $sqlinputmak7="insert into mak7 values('','$email','$idqmak7','$allvalidasi','$allvalid','$rvalidasi','$rvalid','$idskema','$tanggal2','$idpengurus')";
          $execimak7=mysql_query($sqlinputmak7);
         
	//echo $sqlinputmak7; 	
	}
      }
    }
      if($execimak7 or $exup){
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

else if($op=="mak6br")
{
    ?>
    <button type="button" class="btn btn-primary" onclick="window.print()">Print Halaman Ini</button>
    <?php
	$emailuser=trim($uname);
	$kodeskema=$_GET['kodeskema'];
	$namaskema=$_GET['nmskema'];
	$idskemamak6=$_GET['idskema'];
	$sql="select * from lsp_usertbl where email='$emailuser'";
	$shasil=mysql_query($sql);
	$sdata=mysql_fetch_array($shasil);
	$namap=$sdata['nama'];
	$idp=$sdata['id_user'];
	$ttdmak6="../imgttd/".$sdata['linkttd'];
	?> <form id="formContoh" method="POST" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=mak7post\"";?>> 
     <?php 
	
    $tglmak6=date("Y-m-d");
    echo "<table width=95% class=demo-table><tr><td colspan=6>MENINJAU PROSES ASESMEN</td></tr><tr>";
    echo "<tr><td colspan=6>Judul Skema :".$namaskema."</td></td>";
    echo "<tr><td colspan=6>Nomor : $kodeskema </td></td>";
    echo "<tr><td colspan=6>TUK : Sewaktu</td></td>";
    echo "<tr><td colspan=6>Nama Asesor : ".$namap."</td></td>";
    //echo "<tr><td colspan=6>Tanggal :</td></td>";
    echo "  
        <tr> 
		<td colspan=6>Penjelasan :</br>
		1. Peninjauan seharusnya dilakukan oleh asesor yang mensupervisi implementasi asesmen</br>
		2. Jika tinjauan dilakukan oleh asesor lain, tinjauan akan dilakukan setelah seluruh proses implementasi asesmen telah selesai.</br>
		3. Peninjauan dapat dilakukan secara terpadu dalam skema sertifikasi dan / atau peserta kelompok yang homogen.</br>";
   
      $i=0;
      $num=1;
    echo "<input type=hidden name=idskema value='$idskemamak6'>";
    //echo "<input type=hidden name=idadsesi value='$idp'>";
    echo "<input type=hidden name=email value='$emailuser'>";
    
    $sqlqmak7="SELECT * FROM qmak7";
    $sqlqmak7a=mysql_query($sqlqmak7);
    
    echo "<tr><th rowspan=2 align=center bgcolor='#006699'>NO</th><th bgcolor='#006699' rowspan=2>ASPEK YANG DI KAJI ULANG</th><th colspan=4 bgcolor='#006699'>Hasil kaji ulang</th></tr>";
    echo "<tr><th bgcolor='#006699'>Valid</th><th bgcolor='#006699'>Reliable</th><th bgcolor='#006699'>flexible</th><th bgcolor='#006699'>Adil</th>";
	//echo <th bgcolor='#006699'>Rekomendasi Perbaikan</th></tr>";
    		while($sqlqmak7b=mysql_fetch_array($sqlqmak7a)){
                    $cekdmak7="select * from mak7 where email='$emailuser' and idqmak7='".$sqlqmak7b['idqmak7']."' and idskemamak7='$idskemamak6'";
                    //echo $cekdmak7;
		     $cekdmak7a=mysql_query($cekdmak7);
	          $kdbs0="";
              $kdbs1="";
		      $kdbs2="";
              $kdbs3="";
		      $kdbsa="";
              $kdbsb="";
		      $kdbsc="";
              $kdbsd="";
		      $kdbsd="";
		     if(mysql_num_rows($cekdmak7a)>0){
                       $cekdmak7b=mysql_fetch_array($cekdmak7a);
					   $idpeninjau=$cekdmak7b['idpeninjau'];
					   $tanggal=$cekdmak7b['tglreg'];
                       $rval=$cekdmak7b['rvalidasi'];
                       $rva=$cekdmak7b['rvalid'];
					   $sbuki=$cekdmak7b['validasi']; 
						//echo $sbuki;
						$pecahr=explode(",",$sbuki);
                        //echo $pecahr;
						$dbs0=$pecahr[0];
						$dbs1=$pecahr[1];
						$dbs2=$pecahr[2];
						$dbs3=$pecahr[3];
						//echo "B".$db0.$db1;
						if(trim($dbs0)=='v')
						{
						$kdbs0="checked";
						}
						if(trim($dbs1)=='r')
						{
						$kdbs1="checked";
						}
						if(trim($dbs2)=='f')
						{
						$kdbs2="checked";
						}
						if(trim($dbs3)=='a')
						{
						$kdbs3="checked";
						}
						$sbuki2=$cekdmak7b['valid']; 
						//echo $sbuki;
						 $pecahrr=explode(",",$sbuki2);
                         //echo $pecahr;
						 $dbsa=$pecahrr[0];
						 $dbsb=$pecahrr[1];
						 $dbsc=$pecahrr[2];
						 $dbsd=$pecahrr[3];
						 $dbse=$pecahrr[4];
						 //echo "B".$db0.$db1;
						 if(trim($dbsa)=='v')
						 {
						 $kdbsa="checked";						
						 }
						 if(trim($dbsb)=='r')
						 {
						 $kdbsb="checked";
						 }
						 if(trim($dbsc)=='f')
						 {
						 $kdbsc="checked";
						 }
						 if(trim($dbsd)=='i')
						 {
						 $kdbsd="checked";
						 }
						 if(trim($dbse)=='t')
						 {
						 $kdbse="checked";
						 }

									  
                     //echo "ada";
		     }
                echo "<tr><td>".$num."</td><td><input type=hidden name=idqmak7".$i." value='".$sqlqmak7b['idqmak7']."'>".$sqlqmak7b['pertanyaan']."</td><td><input type=checkbox name=validasia".$i." value='v' $kdbs0></td><td><input type=checkbox name=validasib".$i." value='r' $kdbs1></td><td><input type=checkbox name=validasic".$i." value='f' $kdbs2></td><td><input type=checkbox name=validasid".$i." value='a' $kdbs3><input type=hidden name=rvalidasi".$i." value=".$rval."></td></tr>";
		$num++;
                $i++;
		}
        
	?>       

       	       <!-- <tr><td colspan=6>Rekomendasi perbaikan :<input type=text name=rvalidasi size=50 value="<?php echo $rval; ?>"></td></tr>-->
        </table>
        <table class="demo-table">
        <?php echo "<tr><th bgcolor='#006699' rowspan=2 align=center>NO</th><th bgcolor='#006699' rowspan=2>ASPEK YANG DI KAJI ULANG</th><th bgcolor='#006699' colspan=5>Pemenuhan terhadap prinsip-prinsip asesmen</th></tr>";
		echo "<tr><th bgcolor='#006699'>Task Kill</th><th bgcolor='#006699'>Task Mgmnt  Skill</th><th bgcolor='#006699'>Contingency Mgmnt Skil</th><th bgcolor='#006699'>Job Role/ Environment
Skill</th><th bgcolor='#006699'>Transfer Skill</th></tr>";
		echo "<tr><td>".$num."</td><td>Konsistensi keputusan asesmen Bukti dari berbagai asesmen diperiksa untuk konsistensi dimensi kompetensi</td><td><input type=checkbox name=valida value='v' $kdbsa></td><td><input type=checkbox name=validb value='r' $kdbsb></td><td><input type=checkbox name=validc value='f' $kdbsc></td><td><input type=checkbox name=validd value='i' $kdbsd></td><td><input type=checkbox name=valide value='t' $kdbse></td></tr>";?>
        <tr><td colspan=7>Rekomendasi perbaikan :<input type=text name=rvalid size=50 value="<?php echo $rva; ?>"></td></tr>
		<?php
		echo "<tr><th colspan=7> Nama Peninjau</th></tr>";
		echo "<tr><td colspan=3> Nama  </td><td colspan=2>";
		$pengurusm6="select namapengurus,idpengurus,ttd from pengurus ";		
	    $execpengm6=mysql_query($pengurusm6);
        echo "<select name=pengm6 id=pengm6>"; 	    
		while($rpengm6=mysql_fetch_array($execpengm6))
		
		{
		if($idpeninjau==$rpengm6['idpengurus'])
	     {
		 $pttd="../imgttd/".$rpengm6['ttd'];	 
		 echo "<option value=$rpengm6[idpengurus] selected>$rpengm6[namapengurus] </option> ";
		 }
		 else 
		 {
		 echo "<option value=$rpengm6[idpengurus]>$rpengm6[namapengurus] </option> ";	 
		 }
		}
	    echo "</select>";
	    echo "</td>";
    	
		echo "<tr><td colspan=3> Tanda Tangan  </td><td colspan=2><img src=".$pttd." height=50> </td></tr>";    ?>	
		<tr><td colspan=3><div class="form-group">Tanggal </td><td colspan=2>
		        <div class="dynamiclabel">
				<label for="tanggal"></label>
				<input type="text" name="tanggal" id="tanggal" value="<?php echo $tanggal ;?>" />
				</div>
				</div></td></tr> 
		</table></br>    	
			
		<tr><td  colspan="9"><input type="hidden"  name="n" value="<?php echo $i ;?>"/>
		<input type="submit" name="simpan" id="gobutton" value="Simpan"></td></tr>
        
		<?php
		//$pengurus="select * from pengurus where jabatan='s'";
		//$pengurusa=mysql_query($pengurus);
		//$pengurusb=mysql_fetch_array($pengurusa);
		//$pttd="../imgttd/".$pengurusb['ttd'];
		

}

?>

<!--<form name="contoh" method="post" action="mak7post.php" enctype="multipart/form-data" id="form-upload" onSubmit="return confirm('Apakah yakin sudah MEMILIH semua dan ingin disimpan ??')">-->
<table class="demo-table">
<?php
echo "<tr><th bgcolor='#006699'>No</th><th bgcolor='#006699'>Judul Skema </th><th bgcolor='#006699'>Aksi</th>";
$skema="select idskema,namaskema,kodeskema from skema where status='Y'";
$skemaa=mysql_query($skema);
$nom=1;
while ($skemab=mysql_fetch_array($skemaa))
{
 echo "<tr><td>".$nom."</td>";	
 echo "<td>".$skemab['namaskema']."</td>";
 echo "<td><a href=\"".$_SERVER['PHP_SELF'].
        "?op=mak6br&idskema=".$skemab['idskema']."&nmskema=".$skemab['namaskema']."&kodeskema=".$skemab['kodeskema']."\"><span class='glyphicon glyphicon-check'>Ceklist Form</a></td></tr>";
 $nom++;
}

	  

?>
</table>




</table>
	</form>

	<!-- untuk progress bar -->
	<div id="progress">
	<div id="bar"></div>
	<div id="percent">0%</div>
	</div>
	<br/>
	<!-- pesan setelah proses upload -->
	<div id="message"></div>

</div>

<script>

$(document).ready(function() {

var options = {
	beforeSend: function() {

		$("#progress").show();
		$("#bar").width('0%');
		$("#message").html("");
		$("#percent").html("0%");
		$("#upload-foto").attr("disabled",""); // Membuat button upload jadi tidak bisa terklik
		$("#upload-foto").html("Memproses...");
	 
	},
	uploadProgress: function(event, position, total, percentComplete) {

		$("#bar").width(percentComplete+'%');
		$("#percent").html(percentComplete+'%');

	},
	success:function(data, textStatus, jqXHR,ui) {
		$("#percent").html("100%");
		$("#progress").hide();
		$("#message").html(data);
		$("#upload-foto").removeAttr("disabled");
		$("#upload-foto").html("Upload");
		$("input[type='file']").val('');

	},
	error: function() {
		$("#message").html("<span style='color:red'> ERROR: Tidak dapat mengupload</span>");
	}
 
};
 
// kirim form dengan opsi yang telah dibuat diatas
$("#form-upload").ajaxForm(options);
 
});

</script>
<?php }
}
 ?>
</body>
</html>
