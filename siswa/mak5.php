<DOCTYPE html>
<?php
error_reporting(0);
session_start();
?>
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
//error_reporting(0);
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
			<li><a href="pilihskema.php"><svg class="glyph stroked paperclip"><use xlink:href="#stroked-paperclip"/></svg>Pilih SKema</a></li>
			<li><a href="pilihunit.php"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg>Pilih Unit</a></li>
			<li><a href="dashsiswa.php"><svg class="glyph stroked tag"><use xlink:href="#stroked-tag"/></svg>FR.APL 1</a></li>
			<li class="parent">
			<li><a href="apl2.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg></svg>FR.APL 2</a></li>
			<li><a href="portofolio.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Portofolio</a></li>
			<li><a href="testulis.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>FR.IA.05 Pertanyaan Tertulis</a></li>
			<li  class="active"><a href="mak5.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>FR.AK.03</a></li>
			<li class="parent ">
			<!--<li><a href="feedtes.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"/></svg>FeedBack</a></li>-->
			<li><a href="statussaya.php"><svg class="glyph stroked map"><use xlink:href="#stroked-map"/></svg>Cek Status</a></li>
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
			<h4>UMPAN BALIK</h4>
                        
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
 
if($op=="mak5post")
{
$email=trim($_POST['email']);
$idasesi=$_POST['idadsesi'];
$n = $_POST['n'];
$namape=$_POST['namap'];
$tglmak5=$_POST['tglmak5'];
$tglmak5=date('Y-m-d', strtotime($tglmak5));

$tglregmak5=$_POST['tglregmak5'];
$idskema=$_POST['idskema'];
$cttl=$_POST['catl'];;
//echo $cttl;
for ($i=0; $i<=$n-1; $i++)
   {
     if (isset($_POST['mak5yt'.$i]))
     {
     $mak5yt=$_POST['mak5yt'.$i];
     $catatan=$_POST['catatan'.$i];
     $idqmak5=$_POST['idqm5'.$i];
     //echo $idqmak5;
     $cekdulumak5="select * from mak5 where idasesi='$email' and idqmak5='$idqmak5'";
     $cekdulumak5a=mysql_query($cekdulumak5);
     if(mysql_num_rows($cekdulumak5a)>0){
       //echo "<font color=red>Duplikat ..</font>";
	     $updmak="update mak5 set hasil='$mak5yt', catatan='$catatan',catatanlain='$cttl' where  idasesi='$email' and idqmak5='$idqmak5'";
		 $updmaka=mysql_query($updmak);
		 if ($updmaka)
		 {
			 $pperor='Behasil...';
		 }
         
 	}
     else 
        { $sqlinputmak5="insert into mak5 values('','$email','$namape','$idqmak5','$mak5yt','$catatan','$cttl','$tglregmak5','$tglmak5')";
          $execimak5=mysql_query($sqlinputmak5);
          
	//echo $sqlinputmak5; 	
	}
      }
    }
      if($execimak5)
            {  ?>				
				<div class="container">
			  	<div class="alert alert-success">
			    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    	<strong>Sukses ! </strong> <font color="red"> Data berhasil disimpan .
</font>
			  	</div>
				</div>
				<?php }
            else { ?>				
				<div class="container">
			  	<div class="alert alert-warning">
			    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    	<strong>Update Data..  ! </strong> <font color="red"> <?php echo $pperor; ?>
</font>
			  	</div>
				</div>
				<?php }
}
?>
    <button type="button" class="btn btn-primary" onclick="window.print()">Print Halaman Ini</button>
    
<form id="formContoh" method="POST" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=mak5post\"";?>> 
<!--<form name="contoh" method="post" action="mak5post.php" enctype="multipart/form-data" id="form-upload" onSubmit="return confirm('Apakah yakin sudah MEMILIH semua dan ingin disimpan ??')">-->
<table class="demo-table">
<?php
  
	$emailuser=trim($uname);
	$sql="select * from lsp_usertbl where email='$emailuser'";
	$shasil=mysql_query($sql);
	$sdata=mysql_fetch_array($shasil);
	$namap=$sdata['nama'];
	$idp=$sdata['id_user'];
        $tgluser=$sdata['kode'];
	$cek="select * from skemasiswa where emailsiswa='$emailuser' ";//and statustesp='N'"; 
	$ada=mysql_query($cek);
	if(mysql_num_rows($ada)>0){
		$data  = mysql_fetch_array($ada);
	$skema=$data['idskema'];
	$statusapl1=$data['statusapl1'];
	if($statusapl1=='Y')
	 {
        $spemet="select * from pemetaan where idskema='$skema' and idpeserta='$idp'";
        $execpe=mysql_query($spemet);
        $hpemet=mysql_fetch_array($execpe);
        $namaass=$hpemet["namaasesor"];
        //$tgl=$hpemet["tanggal"];
		  $ske="select * from skema where idskema='$skema'";  
		  $ske1=mysql_query($ske);
		  $ske2=mysql_fetch_array($ske1);
		  $namaskema=$ske2['namaskema'];
		  
		  echo "<table width=95% class=demo-table><tr><td colspan=5>UMPAN BALIK</td></tr><tr><td colspan=2>
				Nama Peserta : $namap </td><td colspan=3> </td></tr><tr>
				<td colspan=2>Nama Asesor : $namaass<td colspan=3></td></tr>             
				";
        
   
      $i=0;
      $num=1;
		echo "<input type=hidden name=idskema value='$skema'>";
		echo "<input type=hidden name=idadsesi value='$idp'>";
		echo "<input type=hidden name=email value='$emailuser'>";
		echo "<input type=hidden name=namap value='$namap'>";
		$sqlqmak5="SELECT * FROM qmak5";
		$sqlqmak5a=mysql_query($sqlqmak5);
		echo "<tr><th rowspan=2 align=center bgcolor='#006699'>NO</th><th rowspan=2 bgcolor='#006699'>KOMPONEN</th><th colspan=2 bgcolor='#006699'>Hasil</th><th rowspan=2 bgcolor='#006699'>Catatan/Komentar Asesi</th></tr>";
		echo "<tr><th bgcolor='#006699'>Ya</td><th bgcolor='#006699'>Tidak</td></tr>";
		
				while($sqlqmak5b=mysql_fetch_array($sqlqmak5a)){
				$cekduludimak5="select * from mak5 where idasesi='$emailuser' and idqmak5='".$sqlqmak5b['idqmak5']."'";
				$cekduludimak5a=mysql_query($cekduludimak5);
				$cekduludimak5b=mysql_fetch_array($cekduludimak5a);
				$hasilcek=$cekduludimak5b['hasil'];
				$catatancek=$cekduludimak5b['catatan'];
				$ctlcek=$cekduludimak5b['catatanlain'];
				if($hasilcek=='y')
				{
					$hasilceky='checked';
				}else 
				{
					$hasilceky='';
				}
				if($hasilcek=='t')
				{
					$hasilcekt='checked';
				}else 
				{
					$hasilcekt='';
				}
				
				
				
                echo "<tr><td>".$num."</td><td>".$sqlqmak5b['qmak5']."</td><td><input type=radio name=mak5yt".$i." value='y' $hasilceky></td><td><input type=radio name=mak5yt".$i." value='t' $hasilcekt></td><td><input type=text name=catatan".$i." value='$catatancek'><input type=hidden name=idqm5".$i." value=".$sqlqmak5b['idqmak5']."></tr>";
		$num++;
                $i++;
		}
        echo "<tr><td colspan=5>Catatan lain kalau ada <input type=text name=catl value='$ctlcek'></td></tr>";
	?>       

       <tr><td colspan="9">
	<!--<div class="form-group"><strong>Tanggal : (Sesuaikan dengan jadwal)</strong>
        	<select class="form-control" name="tanggal" placeholder="Skema">
          	<?php
          	$tampil=mysql_query("SELECT * FROM permohonan where email='$emailuser' group by tanggal ");
		while($r=mysql_fetch_array($tampil)){
			echo "<option value=$r[tanggal]>$r[tanggal]</option>";
		}
		echo "</select"; 
		?>-->
                <div class="form-group"><strong>Tanggal Pelaksanaan :</strong>
    	<input type="text" name="tglmak5" id="tanggal" placeholder="Tanggal Pelaksaan" class="form-control" required/>
        </div>
       <div class="form-group"><strong>Tanggal Regestrisai :</strong>
    	        <input type="text" name="tglregmak5" placeholder="Tanggal Reg" class="form-control" value=" <?php echo $tgluser ; ?>" readonly/>
                </div>
		</td></tr>
		<tr><td  colspan="9"><input type="hidden"  name="n" value="<?php echo $i ;?>"/>
		<input type="submit" name="upload-foto" id="gobutton" value="Simpan"></td></tr> <?php
      }else {echo "APL1 BELUM DI VALIDASI/TIDAK ADA DATA";}
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
<?php } ?>
</body>
</html>
