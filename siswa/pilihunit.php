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
<link href="../css/tabelbaru2.css" rel="stylesheet">

<script src="../js/jquery.min.js"></script>
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
}, 4000);
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
if(!isset($_SESSION['username'])) { $unameunit=$_SESSION['username'];
//$a=0;
}
else { $unameunit=$_SESSION['username'];
//$a=1; 
}
if (isset($_GET['uidpes'])) 
	{ $unameunit1=$_GET['uidpes'];}
else { 
$unameunit1="kosong";}
if ($unameunit1=='kosong'){
	$unameunit1=$unameunit;
}
$lpunit="SELECT * FROM lsp_usertbl WHERE email='".$unameunit1."'";
$resultxpunit=mysql_query($lpunit);
$hasilxpunit=mysql_fetch_array($resultxpunit);
$namaxpunit=$hasilxpunit['nama']; 
$emailpesunit=$hasilxpunit['email'];
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
<!--
<?php 
if(isset($_SESSION['username'])) { $unameunit=$_SESSION['username'];}
else { $unameunit=$_SESSION['username']; }
$lpunit="SELECT * FROM lsp_usertbl WHERE email='".$unameunit."'";
$resultxpunit=mysql_query($lpunit);
$hasilxpunit=mysql_fetch_array($resultxpunit);
$namaxpunit=$hasilxpunit['nama']; 
?>-->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><img src="../images/logolsp.png" alt="" height="30"><span><?php echo " ".$namaxpunit ;?></a>
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
			<li><?php echo "<a href=pilihskema.php?uidpes=".$unameunit1 .">";?><svg class="glyph stroked paperclip"><use xlink:href="#stroked-paperclip"/></svg>Pilih SKema</a></li>
			<li class="active"><?php echo "<a href=pilihunit.php?uidpes=".$unameunit1 .">";?><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg>Pilih Unit</a></li>
			<li><?php echo "<a href=dashsiswa.php?uidpes=".$unameunit1 .">";?><svg class="glyph stroked tag"><use xlink:href="#stroked-tag"/></svg>FR.APL. 1</a></li>
			<li class="parent">
			<li><?php echo "<a href=apl2.php?uidpes=".$unameunit1 .">";?><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg></svg>FR.APL. 2</a></li>
			<li><?php echo "<a href=portofolio.php?uidpes=".$unameunit1 .">";?><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Portofolio</a></li>
			<li><?php echo "<a href=testulis.php?uidpes=".$unameunit1 .">";?><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>FR.IA.05 Pertanyaan Tertulis</a></li>
			<li><?php echo "<a href=mak5.php?uidpes=".$unameunit1 .">";?><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>FR.AK.03</a></li>
			<li class="parent ">
			<!--<li><a href="feedtes.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"/></svg>FeedBack</a></li>-->
			<li><?php echo "<a href=statussaya.php?uidpes=".$unameunit1 .">";?><svg class="glyph stroked map"><use xlink:href="#stroked-map"/></svg>Cek Status</a></li>
			<li><a href="banding.php"><svg class="glyph stroked map"><use xlink:href="#stroked-map"/></svg>FR.AK.04 Banding</a></li>
			<li><a href="rahasia.php"><svg class="glyph stroked map"><use xlink:href="#stroked-map"/></svg>FR.AK.01 Kerahsiaan</a></li>
			<li><?php echo "<a href=ubahpassword.php?uidpes=".$unameunit1 .">";?><svg class="glyph stroked key "><use xlink:href="#stroked-key"/></svg>Ubah Password</a></li>				
			<li role="presentation" class="divider"></li>		
			<li><a href="../logout.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg> Logout</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<h4>Pilih Unit </h4>
                        
</div><!--/.row-->
		
		
				
		<!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
<!--data nu baru -->

<?php
$op = $_GET['op'];
 
if ($op == "simpanpilihunit")
{

		$email=trim($_POST['email']);
		$ids=$_POST['skema'];
		$idadsesi=$_POST['idasesi'];
		$n = $_POST['n'];
		for ($i=0; $i<=$n-1; $i++)
   		{
     		 if (isset($_POST['kodeunit'.$i]))
     		 {
                        $idunit=$_POST['idunit'.$i];
			$kodeunit=$_POST['kodeunit'.$i];
                        //$kodeunit
                        //echo "pilih";
                        $cekdata = "SELECT * FROM unitsiswa WHERE idskema='$ids' and idunit='$idunit' and idadsesi='$idadsesi'";
            		//echo $cekdata;
            		$ada=mysql_query($cekdata);
   	       		 if(mysql_num_rows($ada)>0)
             			 { //echo "<font color=red>Sebagian data atau semua data yang anda pilih terjadi duplikate</font>";
                         $kodeunit2=$kodeunit2." ".$kodeunit;
                         //echo $kodeunit2;
                         $ketg="Terjadi Duplikat di unit ". $kodeunit2;	
				}
                         else {
                        $ketg2=$ketg;
                        $kodeunit3=$kodeunit3." ".$kodeunit;
			$ssql="insert into unitsiswa value ('','$ids','$idunit','$idadsesi','$email','T')";}
                        //echo $ssql;
			$exec=mysql_query($ssql);
                              
                    }      	
                        
		}
		if($exec){//echo "<font color=red>Sukses ...</font>";
                  echo " <div class='container'>";
			  echo "<div class='alert alert-success'>";
			    echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <strong>Sukses unit </strong>".$kodeunit3. "  <font color=red>".$ketg2."</font>
			  </div>
			</div>";}
		else {//echo "<font color=red>Gagal .... </font>";
			echo " <div class='container'>";
			  	echo "<div class='alert alert-warning'>";
			    	echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    	<strong>Gagal! </strong> Terjadi Duplikat...".$kodeunit2."
			  	</div>
				</div>";
                      }

	
}

	        $emailuser=trim($unameunit1);
		$cek="select * from skemasiswa where emailsiswa='$emailuser'";// and statustesp='N'";
		//echo $cek;
 		//$ada=mysql_query($cek);
		$ada=mysql_query($cek);
		if(mysql_num_rows($ada)>0){
			$data  = mysql_fetch_array($ada);
    			//$b=mysql_fetch_rows($ada);
			$skema=$data['idskema'];
  			$ske="select * from skema where idskema='$skema'";
  			$ske1=mysql_query($ske);
  			$ske2=mysql_fetch_array($ske1);
  			$namaskema=$ske2['namaskema'];
			$cekid="select * from lsp_usertbl where email='$emailuser'";
    			//echo $cekid;
    			$cekid1=$ske1=mysql_query($cekid);
			$cekid2=mysql_fetch_array($cekid1);
    			$idasesi=$cekid2['id_user'];

			

		  
			echo "<form id=\"formContoh\" method=\"post\" action=\"".$_SERVER['PHP_SELF'].
 			       "?op=simpanpilihunit\">";
			//echo "<form name=contoh method=post action=uploadgambar1.php enctype=multipart/form-data id=form-upload>";
			echo "<input type=hidden name=email value='$emailuser'>";
			echo "<input type=hidden name=idasesi value='$idasesi'>";


			echo"
			<div class=form-group><strong></strong>
			   <div class=dynamiclabel>
 				<input type=hidden name=skema value='$skema' readonly>
  			   </div>
  			</div>";
			
			?>
			<table class=demo-table width=100%>
			<!--<tr><td colspan="3"><strong>Skema : <?php echo $namaskema; ?></strong></td></tr>-->
                       
			<tr><th colspan='3'><strong> PILIH UNIT <?php echo "*".$a; ?></strong> </th></tr>
			<tr><th bgcolor='#006699'>Kode Unit</th><th bgcolor='#006699'>Nama Unit</th></tr>

			<?php 
			//$unit="Select * from unit where idskema='$skema'";
			$sqlunit="select * from unit where idskema='$skema' order by kodeunit";
			$execunit=mysql_query($sqlunit);

			//echo $unit;
			
			$i = 0;
			while ($unit2=mysql_fetch_array($execunit)){
				$dunit=$unit2['idunit'];
				//$nunit=$unit2['namaunit'];
				$kodeunit=$unit2['kodeunit'];
				$namaunit=$unit2['namaunit'];
				echo "<tr><td><input type=hidden name=idunit".$i." value='$dunit'><input type=checkbox name=kodeunit".$i." value='$kodeunit'> ".$kodeunit." </td><td>".$namaunit." </td> ";

				?>
				<?php
				$i++;
				
			}
		//}
			echo "<input type='hidden' name='n' value='".$i."' />";
			?>

		</form>
		</td></tr><tr><td colspan="3"><input type="submit" id="gobutton" value="Simpan" class="button"></td></tr></table>

<?php } else { ?>				
				<div class="container">
			  	<div class="alert alert-warning">
			    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    	<strong>Skema Belum Di pilih!</strong> ....
				</div>
				<?php  } ?>

		
	


<!--end databaru-->
		<div>
		</div>
		
        </div>
        </div> 
		
</body>

</html>

<?php } ?>
