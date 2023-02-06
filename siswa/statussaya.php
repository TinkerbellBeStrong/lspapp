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

<link href="../lummenu/css/bootstrap.min.css" rel="stylesheet">
<link href="../lummenu/css/datepicker3.css" rel="stylesheet">
<link href="../lummenu/css/styles.css" rel="stylesheet">
<link href="../lummenu/css/adminstyle.css" rel="stylesheet">
<link href='../css/tombol.css' rel='stylesheet' type='text/css'>
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

<?php
//session_set_cookie_params(3600*2,"/");
//session_start();
include "../lsp_koneksi.php";
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
 echo "<center><link href='css/adminstyle.css' rel='stylesheet' type='text/css'><strong> Anda Harus Login Dahulu ...!</strong><br>";
 echo "<a href=../lsp_login.php class='btn btn-primary btn-sm' role='button'> Kembali</a></center>"; 
}
else{
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
			<li><a href="pilihskema.php"><svg class="glyph stroked paperclip"><use xlink:href="#stroked-paperclip"/></svg>Pilih SKema</a></li>
			<li><a href="pilihunit.php"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg>Pilih Unit</a></li>
			<li><a href="dashsiswa.php"><svg class="glyph stroked tag"><use xlink:href="#stroked-tag"/></svg>FR.APL. 1</a></li>
			<li class="parent">
			<li><a href="apl2.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg></svg>FR.APL. 2</a></li>
			<li><a href="portofolio.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Portofolio</a></li>
			<li><a href="testulis.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>FR.IA.05 Pertanyaan Tertulis</a></li>
			<li><a href="mak5.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>FR.AK.03</a></li>
			<li class="parent ">
			<!--<li><a href="feedtes.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"/></svg>FeedBack</a></li>-->
			<li  class="active"><a href="statussaya.php"><svg class="glyph stroked map"><use xlink:href="#stroked-map"/></svg>Cek Status</a></li>
			<li><a href="banding.php"><svg class="glyph stroked map"><use xlink:href="#stroked-map"/></svg>FR.AK.04 Banding</a></li>
			<li><a href="rahasia.php"><svg class="glyph stroked map"><use xlink:href="#stroked-map"/></svg>FR.AK.01 Kerahsiaan</a></li>
			<li><a href="ubahpassword.php"><svg class="glyph stroked key "><use xlink:href="#stroked-key"/></svg>Ubah Password</a></li>
			<li class="parent ">				
			<li role="presentation" class="divider"></li>		
			<li><a href="../logout.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg> Logout</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<h4>Cek Status </h4>
                        
</div><!--/.row-->
		<!--/.row-->
		<div class="row">
			<div class="col-lg-12">
<!--data nu baru -->
    <button type="button" class="btn btn-primary" onclick="window.print()">Print Halaman Ini</button></br>
    
<?php
$email=trim($uname);
$cekskemasis="Select * from skemasiswa where emailsiswa='$email' ";//and statustest='N' and statusapl2='N'";
//echo $cekskemasis;
$cekskemasisa=mysql_query($cekskemasis);
$cekskemasisb=mysql_fetch_array($cekskemasisa);
$tglrekskema=$cekskemasisb['tglrekskema'];
$idskema=$cekskemasisb['idskema'];

$qpermohonan="select email, tanggal from permohonan where email='$email' and tanggal='$tglrekskema' group by email,tanggal";
//echo $qpermohonan;
$qpermohonana=mysql_query($qpermohonan);
echo "<strong>PERMOHONAN</strong>";
if(mysql_num_rows($qpermohonana)>0){
    while ($qpermohonanb = mysql_fetch_array($qpermohonana)){
    echo "</br>";
    echo " <font color=green ><span class='glyphicon glyphicon-ok'>Sudah Terdaftar </font><strong> Tanggal : ".$qpermohonanb['tanggal']." User Id :  ".$qpermohonanb['email']."</strong>";
   
  //cek validasi
     $cekvlapl2="select idadsesi,idskema,waktu,svalidasi from apl2 where idskema='$idskema' and waktu='$tglrekskema' and email='".$email."' and svalidasi='T' group by idadsesi,idskema,waktu,svalidasi";
      //echo $cekvlapl2;
      $cekvlapl2a=mysql_query($cekvlapl2);
      $cekvlapl2b=mysql_fetch_array($cekvlapl2a);
      
      //if(
      $b=mysql_num_rows($cekvlapl2a);
      //echo "jjj".$cekvlapl2b['loba'];

      
      
      
     if($b>0){
             $ketvl2="<font color=red><span class='glyphicon glyphicon-remove'>Belum divalidasi</font>";}
          else{
	      $cekvlaplabc="select idadsesi,idskema,waktu,svalidasi from apl2 where idskema='$idskema' and waktu='$tglrekskema' and email='".$email."' group by idadsesi,idskema,waktu";
		$cekvlaplabd=mysql_query($cekvlaplabc);
                $f=mysql_num_rows($cekvlaplabd);
                if($f>0){ 
                  $ketvl2="<font color=green><span class='glyphicon glyphicon-ok'>Sudah Divalidasi</font>";}
		else{$ketvl2="<font color=green><span class='glyphicon glyphicon-search'>Asesi belum mengisi</font>";}
          }




    }
} else { echo "</br>";echo "<font color=red> Belum Terdaftar</font>";}

$qapl1="select email2,namasiswa,validasiapl1,idasesi from apl1 where email='$email' group by email";
$qapl1a=mysql_query($qapl1);

echo "</br><strong>BIODATA</strong>";
if(mysql_num_rows($qapl1a)>0){
   	while ($qapl1b = mysql_fetch_array($qapl1a)){
    $idasesist=$qapl1b['idasesi'];
        if($qapl1b['validasiapl1']=='Y') 
        {
        	$ketval="Sudah divalidasi";
        	$wr="green";
        	$sp="glyphicon glyphicon-ok";
        }
        else 
        {
        	$ketval="Belum divalidasi";
        	$wr="red";
        	$sp="glyphicon glyphicon-remove";
        }
        echo "</br>";
        echo " <font color=green ><span class='glyphicon glyphicon-ok'>Sudah Terdaftar </font><strong> Nama : ".$qapl1b['namasiswa']." Email : ".$qapl1b['email2']."<font color=$wr> <span class='".$sp."''>".$ketval."</span></font></strong>";
        
	}
    	
	//echo $idasesist;	
} else { echo "</br>";echo "<font color=red> Belum Terdaftar</font>";}


$qapl2="select email,waktu from apl2 where email='$email' group by email,waktu";
$qapl2a=mysql_query($qapl2);
echo "</br>";
echo "<strong>APL2</strong>";
if(mysql_num_rows($qapl2a)>0){
   	while ($qapl2b = mysql_fetch_array($qapl2a)){
        echo "</br>";
        echo " <font color=green ><span class='glyphicon glyphicon-ok'>Sudah Terdaftar </font><strong>Tanggal : ".$qapl2b['waktu']." User Id : ".$qapl2b['email']."</strong>";
	//cek vlaid
         $cekvlapl2="select idadsesi,idskema,waktu,svalidasi from apl2 where email='".trim($qapl2b['email'])."' and waktu='".$qapl2b['waktu']."' and svalidasi='T' group by idadsesi,idskema,waktu,svalidasi";
      //echo $cekvlapl2;
      $cekvlapl2a=mysql_query($cekvlapl2);
      $cekvlapl2b=mysql_fetch_array($cekvlapl2a);
      
      //if(
      $b=mysql_num_rows($cekvlapl2a);
      //echo "jjj".$cekvlapl2b['loba'];
      $cekdiskemasis="select emailsiswa,statusapl2,idskema from skemasiswa where idskema='$idskema' and emailsiswa='$email' and statusapl2='Y'";
      $cekdiskemasisa=mysql_query($cekdiskemasis);
      $cekdiskemasisb=mysql_num_rows($cekdiskemasisa);
      if($cekdiskemasisb>0)
      
      {

      
     if($b>0){
             $ketvl2="<font color=red><span class='glyphicon glyphicon-remove'>Belum Divalidasi Semua/Sebagian (Hub. Asesor) </font>";}
          else{
	     $ketvl2="<font color=green><span class='glyphicon glyphicon-ok'>Sudah divalidasi</font>";}
          echo ", ".$ketvl2;
       } else 
        {
        	echo "<font color=red><span class='glyphicon glyphicon-remove'>Belum di rekomedasi hubungi asesor</font>";
         
        }  
       }


} else { echo "</br>";echo "<font color=red> Belum Terdaftar</font>";}

$mak5="select idasesi from mak5 where idasesi='$email' group by idasesi";
//echo $mak5;
$mak5a=mysql_query($mak5);
echo "</br>";
echo "<strong>UMPAN BALIK</strong>";
if(mysql_num_rows($mak5a)>0){
   	while ($mak5b = mysql_fetch_array($mak5a)){
        echo "</br>";
        echo " <font color=green ><span class='glyphicon glyphicon-ok'>Sudah Mengisi</font>";
	}	
} else { echo "</br>";echo "<font color=red> Belum Mengisi</font>";}
	$ckrekomedasi ="Select namarekom,idskema,idasesi,rekom,catatan from rekomendasi where idskema='$idskema' and idasesi='".$idasesist."' and namarekom='apl1lsp'";
	//echo $ckrekomedasi;
	$ckrekomedasia=mysql_query($ckrekomedasi);
	$ckrekomedasib=mysql_fetch_array($ckrekomedasia);
	$catatan=$ckrekomedasib['catatan'];
	//echo $ckrekomedasib['rekom']; 
	echo "</br></br>";
	echo "<strong>Rekomendasi APL1</strong> ";
	if (mysql_num_rows($ckrekomedasia)) {
	echo "</br>";
	if($ckrekomedasib['rekom']=='L')
		{
		echo "<font color=green ><span class='glyphicon glyphicon-ok'><strong> Ket : Diterima </strong></font>"; 
		} else 
		{
		echo "<font color=red><strong>Ket : Ditolak</strong></font>";	
		}
		echo "</br> <strong>Catatan : ".$catatan."</strong>";
}

$ckrekomedasiapl2 ="Select namarekom,idskema,idasesi,rekom,catatan from rekomendasi where idasesi='".$idasesist."' and namarekom='apl2'";
$ckrekomedasiaapl2=mysql_query($ckrekomedasiapl2);
$ckrekomedasibapl2=mysql_fetch_array($ckrekomedasiaapl2);
$catatanapl2=$ckrekomedasibapl2['catatan'];
echo "</br></br>";
echo "<strong>Rekomendasi APL2</strong> ";
if (mysql_num_rows($ckrekomedasiaapl2)) {
	echo "</br>";
	if($ckrekomedasibapl2['rekom']=='L')
		{
		echo "<font color=green ><span class='glyphicon glyphicon-ok'><strong> Ket : Diterima </strong></font>"; 
		} else 
		{
		echo "<font color=red><strong>Ket : Ditolak</strong></font>";	
		}
		echo "</br> <strong>Catatan : ".$catatanapl2."</strong>";
}


?>



<!--end databaru-->
		<div>
		</div>
        </div>
        </div> 
		
</body>

</html>

<?php } ?>
