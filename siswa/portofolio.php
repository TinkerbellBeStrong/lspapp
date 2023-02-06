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
			<li ><a href="dashsiswa.php"><svg class="glyph stroked tag"><use xlink:href="#stroked-tag"/></svg>FR.APL. 1</a></li>
			<li class="parent">
			<li><a href="apl2.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg></svg>FR.APL. 2</a></li>
			<li class="active"><a href="portofolio.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Portofolio</a></li>
			<li><a href="testulis.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>FR.IA.05 Pertanyaan Tertulis</a></li>
			<li><a href="mak5.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>FR.AK.03</a></li>
			<li class="parent ">
			<!--<li><a href="feedtes.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"/></svg>FeedBack</a></li>-->
			<li><a href="statussaya.php"><svg class="glyph stroked map"><use xlink:href="#stroked-map"/></svg>Cek Status</a></li>
			<li><a href="banding.php"><svg class="glyph stroked map"><use xlink:href="#stroked-map"/></svg>FR.AK.04 Banding</a></li>
			<li><a href="rahasia.php"><svg class="glyph stroked map"><use xlink:href="#stroked-map"/></svg>FR.AK.01 Kerahsiaan</a></li>
			<li><a href="ubahpassword.php"><svg class="glyph stroked key "><use xlink:href="#stroked-key"/></svg>Ubah Password</a></li>
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
 
if ($op == "edit")
{
   // proses untuk menampilkan data yang akan diedit pada form
   $email= $_GET['email'];
   $cek="select * from skemasiswa where emailsiswa='$email'";// and statustesp='N'";
   $ada=mysql_query($cek);
   $ac=mysql_fetch_array($ada);
   $idskemac=$ac['idskema'];
   if(mysql_num_rows($ada)>0){ 
     $cek2="select * from unitsiswa where email='$email' and idskema='$idskemac'";
     //echo $cek2;
     $ada2=mysql_query($cek2);
     if(mysql_num_rows($ada2)>0){ 
        $cekdata = "SELECT * FROM apl1 WHERE email = '$email'";
        $ada=mysql_query($cekdata);
   	if(mysql_num_rows($ada)>0){
    	$query = "SELECT * FROM apl1 WHERE email = '$email'";
        $hasil = mysql_query($query);
		$data  = mysql_fetch_array($hasil);
		$iduser=$data['idsiswa'];
		$nama=$data['namasiswa'];
		//	$pass=$data['password'];
		//$telp=$data['notelp'];
		$emailuser=$data['email'];
		$tmplahir=$data['tmplahir'];
		$tgllahir=$data['tgllahir'];
		$jeniskelamin=$data['jeniskelamin'];
        $kebangsaan=$data['kebangsaan'];
        $alamat=$data['alamat'];
        $kodepos=$data['kodepos'];
        $rumah=$data['tlprumah'];
		$hp=$data['hp'];
        $tlpkantor=$data['tlpkantor'];
        $emailuser=$email;
        $pendidikan=$data['pendidikan'];
        $lembaga=$data['namalembaga'];
        $jurusan=$data['jurusan'];
        $emailuser2=$data['email2'];
        $poto=$data['poto'];
        
        $tgl = date("d-m-Y", strtotime($tgllahir));
        //echo $tgllahir."lklas".$tgl;
     	}

        else {
        $query = "SELECT * FROM lsp_usertbl WHERE email = '$email'";
        $hasil = mysql_query($query);
   		$data  = mysql_fetch_array($hasil);
   		$iduser=$data['id_user'];
	   	$nama=$data['nama'];
	   //	$pass=$data['password'];
	   	//$telp=$data['notelp'];
	   $emailuser=$data['email'];
           //$emailuser2=$data['email2'];
  		}
   		// echo $iduser;
 		//echo "<form name='myform' method='post' action='".$_SERVER['PHP_SELF']."??op=edit'>";
 
		echo "<form id=\"formContoh\" method=\"post\" enctype=\"multipart/form-data\" action=\"".$_SERVER['PHP_SELF'].
        "?op=update\">";
		?>
		<table width="95%" class="demo-table">
		<tr><td colspan="2" border="0" bgcolor='#006699'><strong>A. Biodata Peserta</strong></td><tr><td>
		<table border="0" width="90%" class="demo-table">
		<thead>
								   
		<tr><td colspan="2">
		   <div class="form-group"><strong>Nama Lengkap :</strong>
			<div class="dynamiclabel">
			<input type="text" name="nama" id="nama" placeholder="Nama Lengkap"  value="<?php echo $nama; ?>" size="50" autofocus required readonly/>
		  </div>
		  </div>
		 </td></tr>
		</td></tr><tr><td colspan="2">
		   <div class="form-group"><strong>Tempat Lahir :</strong>
			<div class="dynamiclabel">
			<input type="text" name="tmplahir" id="tmplahir"  size="50" value="<?php echo $tmplahir; ?>"required/>
		  </div>
		  </div>
		 </td></tr>
			<tr><td colspan="2"> 
		   <div class="form-group"><strong>Tanggal Lahir :</strong>
		   <div class="dynamiclabel">
				        <label for="tanggal"></label>
				        <input type="text" name="tanggal" id="tanggal" value="<?php echo $tgl ;?>" />
				    </div>
				    </div>
		   </td></tr>
		   <tr><td colspan="2">
		   <div class="form-group"><strong>Jenis Kelamin :</strong>
		   <div class="dynamiclabel">
   				<?php if($jeniskelamin=='lk'){?>
   						<input type="radio" name="jk" value="lk" <?php echo checked ;?>/>Laki-laki<br/>
   						<input type="radio" name="jk" value="pr"/>Perempuan<br/>
    					<?php }else if ($jeniskelamin=='pr'){ ?>
						<input type="radio" name="jk" value="lk"/>Laki-laki<br/>
					   <input type="radio" name="jk" value="pr" <?php echo checked ;?> />Perempuan<br/>
   				<?php }else{ ?>
					   <input type="radio" name="jk" value="lk"/>Laki-laki<br/>
					   <input type="radio" name="jk" value="pr" />Perempuan<br/>
					   <?php } ?>
					   </div>
					   </div>
					   </td></tr>
					   <tr><td colspan="2">
					   <div class="form-group"><strong>Kebangsaan:</strong>
					   <div class="dynamiclabel">
					   <input type="text" name="kebangsaan" id="kebangsaan" size="10" value="<?php echo $kebangsaan; ?>" required/>
					   </div>
					   </div>
					   </td></tr>
					   <tr><td>
					   <div class="form-group"><strong>Alamat:</strong>
					   <div class="dynamiclabel">
					   <textarea name="alamat" id="alamat" cols="50" required/><?php echo $alamat; ?></textarea>
					   </div>
					   </div>
					   </td>
					   <td>
					   <div class="form-group"><strong>Kode Pos:</strong>
					   <div class="dynamiclabel">
					   <input type="text" name="kodepos" id="kodepos" size="10" value="<?php echo $kodepos; ?>"required/>
					   </div>
					   </div>
					   </td></tr>
					   <tr><td>
					   <div class="form-group"><strong>No Telp Rumah:</strong>
					   <div class="dynamiclabel">
					   <input type="text" name="rumah" id="rumah" size="15" value="<?php echo $rumah; ?>">
					   </div>
					   </div>
					   </td>
					   <td>
					   <div class="form-group"><strong>No Telp Kantor:</strong>
					   <div class="dynamiclabel">
					   <input type="text" name="kantor" id="Kantor" size="15" value="<?php echo $tlpkantor; ?>">
					   </div>
					   </div>
					   </td></tr>
					   <tr><td>
					   <div class="form-group"><strong>Hp:</strong>
					   <div class="dynamiclabel">
					   <input type="text" name="hp" id="hp" size="15" value="<?php echo $hp; ?>" required/>
					   </div>
					   </div>
					   </td>
					   
					<td>
					   <div class="form-group"><strong>Email Aktif</strong>
					   <div class="dynamiclabel">
					   <input type="text" name="emailuser2" id="emailuser2" placeholder="Email Aktif" value="<?php echo $emailuser2; ?>" size="40" required/>
					   </div>
					   </div>
					   </td>
					   <td>
					   <div class="form-group"><strong></strong>
					   <div class="dynamiclabel">
					   <input type="hidden" name="emailuser" id="emailuser" placeholder="Email Aktif" value="<?php echo $emailuser; ?>" size="30" readonly/>
					   </div>
					   </div>
					   </td></tr>
						   <tr><td colspan="2">
						   <div class="form-group"><strong>Pendidikan Terakhir:</strong>
						   <div class="dynamiclabel">
						   <input type="text" name="pendidikan" id="pendidikan" size="50" value="<?php echo $pendidikan; ?>"required/>
						   </div>
						   </div>
						   </td></tr></table>
						   <tr><td colspan="2" border="0" bgcolor='#006699'><strong>B. Data Pendidikan</strong> </td><tr><td>
						   <table width="95%" class="demo-table">
						   <tr><td colspan="2">
						   <div class="form-group"><strong>Nama Sekolah / lembaga:</strong>
						   <div class="dynamiclabel">
						   <input type="text" name="lembaga" id="lembaga" size="70" value="<?php echo $lembaga; ?>" required/>
						   </div>
						   </div>
						   </td></tr>
						   <tr><td colspan="2">
						   <div class="form-group"><strong>Jurusan / Program :</strong>
						   <div class="dynamiclabel">
						   <input type="text" name="jurusan" id="jurusan" size="50" value="<?php echo $jurusan; ?>" required/>										
						   </div>
						   </div>
						   </td></tr><tr>
                                              <!---  
						<td>File Photo <font color='red'> ( Ukuran file max 100kb dan type file jpg,png)</font> <input type="file" name="fotox3" /></td> -->
						</tr>
						</table>
						</thead> 	
        				</table>					    
					   <input type="hidden" name="iduser" value="<?php echo $iduser; ?>">
					   <input type="hidden" name="emaillama" value="<?php echo $emailuser; ?>">
					   <input type="submit" id="gobutton" value="Simpan"> 
					   <!--<a href="setup_registrasi.php" class="button">Register</a>-->
				
					   </form>
						</div>
						<?php //} else {
						//echo "Data belum ada silahkan klik lengkapi...";} ?>
						<br/>

						<?php
		} else { echo "<font color=red>Anda belum memilih unit minimal 1 unit untuk skema ini..</font>";}
         } else { ?>				
				<div class="container">
			  	<div class="alert alert-warning">
			    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    	<strong>Skema Belum Di pilih!</strong> ....
				</div>
				<?php  }		
	}

else if ($op == "update")
     		{
 
       		// proses untuk updating data setelah diedit 
        	$iduser = $_POST['iduser'];        
		   //$iduser=$data['id_user'];
		   	$nama=$_POST['nama'];
		   	$emailuser=$_POST['email'];
		   	$tmplahir=$_POST['tmplahir'];
			$tgllahir=$_POST['tanggal'];
		    $jeniskelamin=$_POST['jk'];
		    $kebangsaan=$_POST['kebangsaan'];
		    $alamat=$_POST['alamat'];
		    $kodepos=$_POST['kodepos'];
		    $tlprumah=$_POST['rumah'];
			$hp=$_POST['hp'];
        	$tlpkantor=$_POST['kantor'];
		    $pendidikan=$_POST['pendidikan'];
		    $lembaga=$_POST['lembaga'];
		    $jurusan=$_POST['jurusan'];
		    $email=trim($_POST['emailuser']);
            $email2=trim($_POST['emailuser2']);
			//$dir_foto = "gambardiri/";
			//echo $nama;
	   		//echo $emailuser;
	   		//echo $tmplahir;
		    $my_date = date('Y-m-d', strtotime($tgllahir));
            
		    $cekdata1 = "SELECT * FROM apl1 WHERE email = '$uname'";
   			$ada1=mysql_query($cekdata1);
   				if(mysql_num_rows($ada1)>0){      
					$query = "UPDATE apl1 SET 				namasiswa='$nama',tmplahir='$tmplahir',tgllahir='$my_date',jeniskelamin='$jeniskelamin',kebangsaan='$kebangsaan', alamat='$alamat', kodepos='$kodepos', tlprumah='$tlprumah', hp='$hp', tlpkantor='$tlpkantor', email='$email', pendidikan='$pendidikan', namalembaga='$lembaga',jurusan='$jurusan',email2='$email2' WHERE email = '$email'";		} else 
        		{
       			$query = "INSERT INTO apl1 VALUE ('','$nama','$tmplahir','$my_date','$jeniskelamin','$kebangsaan','$alamat','$kodepos','$tlprumah', '$hp','$tlpkantor','$email','$pendidikan','$lembaga','$jurusan','$nama_foto','$email2','','N','$iduser')";
 		        }
       
        //echo $query;
 		       $hasil = mysql_query($query);
 			       if ($hasil) { //echo "Proses Update Biodata Sukses , DAN  <font color=red> ".$potopes."</font>"; 
				?>				
				<div class="container">
			  	<div class="alert alert-success">
			    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    	<strong>Biodata Sukses di simpan !</strong> ....<font color="red"><?php echo $potopes ; ?></font>
			  	</div>
				</div>
				<?php }
                               
 			       else { echo "<p>Proses Update Gagal</p>";}
        
}

else if ($op == "pengajuanserti")
     {
      $emailuser=trim($uname);
		$sql="select * from lsp_usertbl where email='$emailuser'";
		$shasil=mysql_query($sql);
		$sdata=mysql_fetch_array($shasil);
                $tgluser=$sdata['kode'];      
	
	$cektgl="select * from settanggal where status='A' AND tanggal='$tgluser'";
        //echo $cektgl;
        $ada=mysql_query($cektgl);
   	if(mysql_num_rows($ada)>0){

		$emailuser=trim($uname);
		$sql="select * from lsp_usertbl where email='$emailuser'";
		$shasil=mysql_query($sql);
		$sdata=mysql_fetch_array($shasil);
		$namap=$sdata['nama'];
		$idp=$sdata['id_user'];
		$cek="select * from skemasiswa where emailsiswa='$emailuser' and statustesp='N'";
		//echo $cek;
		//$ada=mysql_query($cek);	
		$ada=mysql_query($cek);
			if(mysql_num_rows($ada)>0){
			$data  = mysql_fetch_array($ada);
			$skema=$data['idskema'];
			$ske="select * from skema where idskema='$skema'";
  
  			$ske1=mysql_query($ske);
  			$ske2=mysql_fetch_array($ske1);
  			$namaskema=$ske2['namaskema'];
                        

			$sqlunit="select unitsiswa.idunit,unitsiswa.idskema,unitsiswa.idadsesi,unit.kodeunit,unit.namaunit from unitsiswa inner join unit on unitsiswa.idunit=unit.idunit where unitsiswa.idskema='$skema' and unitsiswa.idadsesi='$idp'";
    //                    echo $sqlunit;
			$execunit=mysql_query($sqlunit);
                          

			echo "<table width=95% class=demo-table><tr><td colspan=2> <strong>Nama Skema : $namaskema </strong></td></tr><tr><th>Kode Unit (terpilih)</td><th>Nama Unit </th></tr>";
			while ($listunit = mysql_fetch_array($execunit))
   				{
 	  				echo "<tr><td>".$listunit['kodeunit']."</td><td>".$listunit['namaunit']."</td></tr>";
   				}
 				echo "</table>";


			echo "<form id=\"formContoh\" method=\"post\" action=\"".$_SERVER['PHP_SELF'].
        "?op=simpanpermohonan\" onSubmit=\"return confirm('Apakah yakin sudah MEMILIH semua dan ingin disimpan ??')\" >";
			echo "<input type=hidden name=email value='$emailuser'>";
		echo "<input type=hidden name=namap value='$namap'>";
		echo "<input type=hidden name=idp value='$idp'>";
		echo"
		<div class=form-group><strong></strong>
   		<div class=dynamiclabel>
 		<input type=hidden name=skema value='$skema' readonly>
  		</div>
  		</div>";
?>
	<table class="demo-table">
	<!--<tr><td colspan="3"><strong>Skema : <?php echo $namaskema; ?></strong></td></tr>-->
	<tr><td bgcolor='#006699' align='left'><strong> Bagian 2. Data Permohonan Sertifikasi</strong> </td></tr><tr><td>
	<div class="form-group"><strong>Tujuan asesmen:</strong>
	<div class="dynamiclabel">
   	<input type="checkbox" name="tasesmena" value="rp"> RPL
   	<input type="checkbox" name="tasesmenb" value="pp"> Pecapaian Proses Pembelajaran
   	<input type="checkbox" name="tasesmenc" value="rc"> RCC
   	<input type="checkbox" name="tasesmend" value="sr"> Sertifikasi
   	<input type="checkbox" name="tasesmene" value="la">Lainnya...
   	<input type="text" name="lain" >    
	</div>
	</div>
	<div class="form-group"><strong>Skema Sertifikasi:</strong>
   	<div class="dynamiclabel">
   	<input type="checkbox" name="skemasa" value="un"> Unit
   	<input type="checkbox" name="skemasb" value="kl" > Klaster
   	<input type="checkbox" name="skemasc" value="ok"> Okupasi
   	<input type="checkbox" name="skemasd" value="kk"> KKNI
	</div>
   	</div>
	<div class="form-group"><strong>Konte asesmen:</strong>
   	<div class="dynamiclabel">
   	<input type="checkbox" name="kasesmena" value="si"> TUK Simulasi
   	<input type="checkbox" name="kasesmenb" value="tk" > Tempat Kerja
   ,dengan karakter 
   	<input type="checkbox" name="karaktera" value="pr"> Produk
   	<input type="checkbox" name="karakterb" value="si"> Sistem
   	<input type="checkbox" name="karakterc" value="tkk" > Tempat Kerja
	</div>
   	</div>
	<div class="form-group"><strong>Acuan Pembanding:</strong>
   	<div class="dynamiclabel">
   		<input type="checkbox" name="acuana" value="sk"> Standar Kompetensi
   		<input type="checkbox" name="acuanb" value="sp"> Standar Produk
   		<input type="checkbox" name="acuanc" value="ss"> Standar sistem
   		<input type="checkbox" name="acuand" value="re"> Regulasi sistem
   		<input type="checkbox" name="acuane" value="so"> SOP
	</div>
   	</div>
	<div class="form-group"><strong>TUK :</strong>
	<select class="form-control" id="idtuk" name="idtuk" placeholder="TUK" autofocus>
        
	<?php
      	$tampil=mysql_query("SELECT * FROM tuk");
		while($r=mysql_fetch_array($tampil)){
			echo "<option value=$r[idtuk] selected>$r[namatuk]</option> ";
		}
         
	?>
	 </select>   
      </div>

      
        <div class="form-group"><strong>Tanggal Pelaksanaan :</strong>
    	<input type="text" name="tglpel" id="tanggal" placeholder="Tanggal Pelaksaan" class="form-control" required/>
        </div>
 
         <div class="form-group"><strong>Tanggal Regestrisai :</strong>
    	<input type="text" name="tanggalp" placeholder="Tanggal Reg" class="form-control" value=" <?php echo $tgluser ; ?>" readonly/>
        </div> 
        
<!--        <div class="form-group"><strong>Tanggal : (Sesuaikan dengan jadwal)</strong>
        <select class="form-control" name="tanggal" placeholder="Skema">
          <?php
          $tampil=mysql_query("SELECT * FROM  settanggal where status='A' group by tanggal ");
		while($r=mysql_fetch_array($tampil)){
		echo "<option value=$r[tanggal]>$r[tanggal] -- $r[ket]</option>";}
		echo "</select";

           ?>
        --> 
	 </div>
	 </tr><tr><td colspan="3"><input type="submit" id="gobutton" value="Simpan" class="button"></td></tr></td></tr></table>

	<?php
	} else { 
	?>				
				<div class="container">
			  	<div class="alert alert-warning">
			    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    	<strong>Skema Belum Di pilih!</strong> ....
				</div>
				<?php        }
      }else {
	?>				
				<div class="container">
			  	<div class="alert alert-warning">
			    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    	<strong>Tanggal Belum di Set</strong> Hubungi Asesor atau bagian LSP....
				</div>
				<?php  }
}

else if ($op == "simpanpermohonan")
     {
		$email=trim($_POST['email']);
		$ids=$_POST['skema'];
		$idp=$_POST['idp'];
		$namap=$_POST['namap'];
                

		//$tasesmen = implode(',', $_POST['tasesmen']);
		$lain=$_POST['lain'];
		//$skemas=implode(',', $_POST['skemas']);
		//$kasesmen=implode(',', $_POST['kasesmen']);
		//$karakter=implode(',', $_POST['karakter']);
		//$acuan=implode(',', $_POST['acuan']);
		$tasesmen = $_POST['tasesmena'].",".$_POST['tasesmenb'].",".$_POST['tasesmenc'].",".$_POST['tasesmend'].",".$_POST['tasesmene'];
		$skemas=$_POST['skemasa'].",".$_POST['skemasb'].",".$_POST['skemasc'].",".$_POST['skemasd'];		
		$kasesmen=$_POST['kasesmena'].",".$_POST['kasesmenb'];
	    $karakter=$_POST['karaktera'].",".$_POST['karakterb'].",".$_POST['karakterc'];
        $acuan=$_POST['acuana'].",".$_POST['acuanb'].",".$_POST['acuanc'].",".$_POST['acuand'].",".$_POST['acuane'];
		$tuk=$_POST['idtuk'];
        $tanggal=$_POST['tanggalp'];
        $tglp=$_POST['tglpel'];
        $tglpp = date('Y-m-d', strtotime($tglp));
        //echo "skema".$acuan;
		$cek="select * from permohonan where email='$email' and idskema='$ids' and tanggal='$tanggal'";
     	//echo $cek;
     	$ada=mysql_query($cek);
		if(mysql_num_rows($ada)>0){
    		?>				
				<div class="container">
			  	<div class="alert alert-warning">
			    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    	<strong>Terjadi Duplikat data  !</strong> ....
			  	</div>
				</div>
				<?php }
    	else {

		$query = "INSERT INTO permohonan  (idpermohonan,idskema,id_user,nama,email,tujuanasesmen,lainnya,sertifikasi,kontekasesmen,karakteristik,acuanp,tuk,tanggal,tanggalp) VALUE('','$ids','$idp','$namap','$email','$tasesmen','$lain','$skemas','$kasesmen','$karakter','$acuan','$tuk','$tanggal','$tglpp')";


      //echo $query;
      $berhasil = mysql_query($query);
      if ($berhasil) { ?>
		<div class="container">
			  	<div class="alert alert-success">
			    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    	<strong>Penyimpanan Data Berhasil  !</strong> ....
			  	</div>
				</div>	<?php }
	
       else { ?><div class="container">
			  	<div class="alert alert-warning">
			    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    	<strong>Penyimpanan data gagal !</strong> ....
			  	</div>
				</div> <?php }
	}
	}

else if ($op=="kompetensi")

   {

        $emailuser=trim($uname);
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
 			       "?op=kompetensi1\">";
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
			<tr><th colspan='3'><strong> PILIH UNIT</strong> </th></tr>
			<tr><th bgcolor='#006699'>Kode Unit</th><th bgcolor='#006699'>Nama Unit</th></tr>

			<?php 
			//$unit="Select * from unit where idskema='$skema'";
			$sqlunit="select unitsiswa.idadsesi,unitsiswa.idunit,unit.kodeunit,unit.namaunit,unit.idskema from unitsiswa INNER JOIN unit on unitsiswa.idunit=unit.idunit where unitsiswa.idskema='$skema' and unitsiswa.idadsesi='$idasesi' order by unit.kodeunit";
                        //echo $sqlunit;
			$execunit=mysql_query($sqlunit);

                        

			//echo $unit;
			
			$i = 0;
			while ($unit2=mysql_fetch_array($execunit)){
				$dunit=$unit2['idunit'];
				//$nunit=$unit2['namaunit'];
				$kodeunit=$unit2['kodeunit'];
				$namaunit=$unit2['namaunit'];
                                $idskema=$unit2['idskema'];
                                //$idasesiunit=$unit2['idasesi'];
                                //$sqlbykel="select count(idelemen) as bykel from upload where idskema='$skema' AND idunit='$dunit' AND idasesi='$idasesi'"; 
                                 
                                $sqlunitupload="select upload.idskema,upload.idasesi,upload.idunit,idelemen from upload where idskema='$skema' AND idunit='$dunit' AND idasesi='$idasesi'";
                                
                                //echo $sqlunitupload;
                                $execsqlunitup=mysql_query($sqlunitupload);
                                $execsqlunitup2=mysql_fetch_array($execsqlunitup);
                                $bykunit=mysql_num_rows($execsqlunitup);
	                        $ide=$execsqlunitup2['idunit'];
                                $sqlelemenupload="select count(idelemen) as byk2 from elemen where idunit='$ide'";
                                $execelemenupload=mysql_query($sqlelemenupload);
                                $execelemenupload2=mysql_fetch_array($execelemenupload);
                                //echo $sqlelemenupload;  
                                $bykelemen=$execelemenupload2['byk2'];
				if(mysql_num_rows($execsqlunitup)>0 and $bykunit==$bykelemen){
                                   $stada='disabled';
                                   //echo $stada;
                               }
				else { $stada=' ';}
                                
				echo "<tr><td><input type=hidden name=idskema".$i." value='$idskema'><input type=hidden name=idunit".$i." value='$dunit'><input type=checkbox name=kodeunit".$i." value='$kodeunit'".$stada."> ".$kodeunit." </td><td>".$namaunit." </td>";



				?>
				<?php
				$i++;
				
			}
		//}
			echo "<input type='hidden' name='n' value='".$i."' />";
			?>

		</form>
		</td></tr><tr><td colspan="3"><input type="submit" id="gobutton" value="Lanjutkan" class="button"></td></tr></table>

<?php } else { ?>				
				<div class="container">
			  	<div class="alert alert-warning">
			    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    	<strong>Skema Belum Di pilih!</strong> ....
				</div>
				<?php  } 

	

    }

else if ($op == "kompetensi1")
     {
		 ?>
    <button type="button" class="btn btn-primary" onclick="window.print()">Print Halaman Ini</button>
    <?php
        $n = $_POST['n'];
 		$cc=0;
        $i=0; 
        $emailuser=trim($uname);
		$sql="select * from lsp_usertbl where email='$emailuser'";
		$shasil=mysql_query($sql);
		$sdata=mysql_fetch_array($shasil);
        $tgluser=$sdata['kode'];  
	    $idasesi=$sdata['id_user'];    
        $cektgl="select * from settanggal where status='A' AND tanggal='$tgluser'";
		$ada=mysql_query($cektgl);
   	    if(mysql_num_rows($ada)>0){
		$cek="select * from skemasiswa where emailsiswa='$emailuser'"; // and statustesp='N'";
		$ada=mysql_query($cek);
        $adaada=mysql_fetch_array($ada);
        $skema=$adaada['idskema'];
		if(mysql_num_rows($ada)>0){
		$cekpermohonan="Select * from permohonan where idskema='$skema' and email='$emailuser'";
        $cekpermo=mysql_query($cekpermohonan);
		if(mysql_num_rows($cekpermo)>0){
		echo "<form id=\"formContoh\" method=\"post\" action=\"".$_SERVER['PHP_SELF'].
 			       "?op=kompetensi3\">";
			//echo "<form name=contoh method=post action=uploadgambar1satuphoto.php enctype=multipart/form-data id=form-upload onSubmit=\"return confirm('Apakah yakin sudah MEMILIH semua dan ingin disimpan ??')\" >";
			echo "<input type=hidden name=email value='$emailuser'>";
			echo "<input type=hidden name=idasesi value='$idasesi'>";
			echo"
			<div class=form-group><strong></strong>
			   <div class=dynamiclabel>
 				<input type=hidden name=skema value='$skema' readonly>
  			   </div>
  			</div>";
	        ?>
	<table class="demo-table">
	<!--<tr><td colspan="3"><strong>Skema : <?php echo $namaskema; ?></strong></td></tr>-->
	<tr><td bgcolor='#006699' align='left' colspan='3'><strong> Bagian 3. Bukti Pendukung</strong> </td></tr>
	<tr><td>Elemen Kompetensi</td><td>Bukti Relevan</td><td>Upload</td></tr> <?php
                $cc=0;
                $ccc=0;
		//echo $_POST['kodeunit'.$cc]."kkkkkk";
		for ($c=0; $c<=$n-1; $c++)
   		{
                 //echo $c;

     		 if (isset($_POST['idunit'.$c]))

     		 {
			  
                       //echo $_POST['kodeunit'.$c];
                       $pjng=strlen($_POST['kodeunit'.$c]);
                       
                    if ($pjng>0)
                       	{ 
			$ccc++;
                    
			?>
                        
                 <?php
                      //echo "lklsdk".$c;
                      //echo $ccc;
                      if ($ccc <= 2 ){
						$idskema=$_POST['idskema'.$c];
						$idunitxx=$_POST['idunit'.$c];
						//echo $idskema;
						$unit="Select * from elemen where idskema='$idskema' and idunit='$idunitxx'";
                        //echo $unit;
						$unit1=mysql_query($unit);
		                
						while ($unit2=mysql_fetch_array($unit1)){	
							
						$dunit=$unit2['idunit'];
						//$nunit=$unit2['namaunit'];
						$delemen=$unit2['idelemen'];
						$nelemen=$unit2['namaelemen'];
						$cekduludiupload="select * from upload where idskema='$idskema' and idasesi='$idasesi' and idunit='$idunitxx' and idelemen='$delemen'";
						$cekduludiuploada=mysql_query($cekduludiupload);
						$cekduludiuploadb=mysql_fetch_array($cekduludiuploada);
						$tglupl=$cekduludiuploadb['tanggalpapl1'];
						$pecahuplod=explode(",",$cekduludiuploadb['bukti']);
						$arrpecaha=$pecahuplod[0];
						$arrpecahb=$pecahuplod[1];
						$arrpecahc=$pecahuplod[2];
						$arrpecahd=$pecahuplod[3];
						$arrpecahe=$pecahuplod[4];
						$arrpecahf=$pecahuplod[5];
						$arrpecahg=$pecahuplod[6];
						$arrpecahh=$pecahuplod[7];
						
						if($arrpecaha=='sk')
						{
							$arrpecahay='checked';			
						} else 
						{
							$arrpecahay='';
						}
						
						if($arrpecahb=='sr')
						{
							$arrpecahby='checked';			
						} else 
						{
							$arrpecahby='';
						}
						
						if($arrpecahc=='cp')
						{
							$arrpecahcy='checked';			
						} else 
						{
							$arrpecahcy='';
						}
						
						if($arrpecahd=='jd')
						{
							$arrpecahdy='checked';			
						} else 
						{
							$arrpecahdy='';
						}
						
						if($arrpecahe=='ws')
						{
							$arrpecahey='checked';			
						} else 
						{
							$arrpecahey='';
						}
						
						if($arrpecahf=='de')
						{
							$arrpecahfy='checked';			
						} else 
						{
							$arrpecahfy='';
						}
						
						if($arrpecahg=='pe')
						{
							$arrpecahgy='checked';			
						} else 
						{
							$arrpecahgy='';
						}
						
						if($arrpecahh=='l')
						{
							$arrpecahhy='checked';			
						} else 
						{
							$arrpecahhy='';
						}
						
						echo "<tr><td><input type=checkbox name=unit".$i." value='$delemen' checked> ".$nelemen." </td><td><input type=hidden name=eunit".$i." value='$dunit'><input type=checkbox name=buktia".$i." value='sk' $arrpecahay>SK <input type=checkbox name=buktib".$i." value='sr' $arrpecahby>SR <input type=checkbox name=buktic".$i." value='cp' $arrpecahcy>CP<input type=checkbox name=buktid".$i." value='jd' $arrpecahdy>JD <input type=checkbox name=buktie".$i." value='ws' $arrpecahey>WS <input type=checkbox name=buktif".$i." value='de' $arrpecahfy>De <input type=checkbox name=buktig".$i." value='pe' $arrpecahgy>Pe<input type=checkbox id=buktih name=buktih".$i." value='l' $arrpecahhy>L  ";
									
						?>
						<?php
						$i++;                        
						?>
								   
						<!---</td><td><input type="file" accept="image/*" name="foto[]"/>-->
						</td><td><input type="file" name="fotox2[]" disabled="disabled" />			
						<?php
						 }
			} else {echo "<font color=red><strong>Anda memilih lebih dari 2 .. , Hanya 2 saja yang ditampilkan</strong></font>";}
			
			?>
	                </td></tr><tr><td colspan="3">
			<?php
                        $cc++;
			 
                         } 
			}
			}
			
				        echo "<input type='hidden' name='n' value='".$i."' />";
                        ?>			

		<div class="form-group"><strong>Tanggal Pelaksanaan :</strong>
    	<input type="text" name="tglpelapl1" id="tanggal" placeholder="Tanggal Pelaksaan" class="form-control" required/>
        </div>
                <div class="form-group"><strong>Tanggal Regestrisai :</strong>
    	        <input type="text" name="tglreg" placeholder="Tanggal Reg" class="form-control" value=" <?php echo $tgluser ; ?>" readonly/>
                </div>

                <!--</td></tr><tr><td colspan="3"><input type="file" name="foto" ><font color=red>File Berbentuk PDF dengan ukuran Maks 2MB dan namafile jangan menggunakan spasi</font></td></tr>-->
		
		<tr><td colspan="3"><input type="submit" id="gobutton" value="Simpan" class="button"></td></tr></table>

		SK = Sertifikasi atau Kualifikasi(contoh : pelatihan, keahlian)</br>
		SR = Surat referensi dari supervision/perusahaan mengenai pekerjaan anda</br>
		CP = Contoh Pekerjaan yang pernah anda buat (produk jadi)</br>
		JD = Job description dari perusahaan mengenai pekerjaan anda</br>
		WS = Wawancara dengan supervisor , teman sebaya atau klien</br>
		De = Demonstrasi pekerjaan/keterampilan yang dipersyaratkan</br>
		Pe = Pengalaman Idustri (On teh job training, magang,kerja praktek,dll)</br>
		 L  = Bukti-bukti lainnya yang relevan  
		</form>
		<?php   

		           } else {  ?>				
				<div class="container">
			  	<div class="alert alert-warning">
			    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    	<strong>Anda belum mengisi pengajuan sertifikasi</strong> ....
				</div>
				<?php }   
                } else { 
               ?>				
				<div class="container">
			  	<div class="alert alert-warning">
			    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    	<strong>Anda belum memilih skema</strong> ....
				</div>
				<?php  
            }
		} else { ?>				
				<div class="container">
			  	<div class="alert alert-warning">
			    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    	<strong>Tanggal Belum Di set !</strong> Hubungi asesor / LSP..
				</div>
				<?php  }


			                   
                   
                                   
                  
	}


else if ($op == "kompetensi3")
   {
	$dup=0;
    $suk=0;
    $email=trim($_POST['email']);
	$ids=$_POST['skema'];
	$idasesi=$_POST['idasesi'];
	$n = $_POST['n'];
    $tgl=$_POST['tglreg'];
	$tglpapl1=$_POST['tglpelapl1'];
	$tglppapl1 = date('Y-m-d', strtotime($tglpapl1));
        
	for ($i=0; $i<=$n-1; $i++)
    {
      // echo $i;
       
       if (isset($_POST['unit'.$i]))
       //echo $_POST['unit'.$i];
     {
     if (isset($_POST['buktia'.$i]) or isset($_POST['buktib'.$i]) or isset($_POST['buktic'.$i]) or isset($_POST['buktid'.$i]) or isset($_POST['buktie'.$i]) or isset($_POST['buktif'.$i]) or isset($_POST['buktig'.$i]) or isset($_POST['buktih'.$i]))
     {	
	   //echo $i;
       	$unit = $_POST['unit'.$i];
       	$eunit = $_POST['eunit'.$i];
       	$bukti=$_POST['buktia'.$i];
       	$bukti1=$_POST['buktib'.$i];
		$bukti2=$_POST['buktic'.$i];
       	$bukti3=$_POST['buktid'.$i];
		$bukti4=$_POST['buktie'.$i];
		$bukti5=$_POST['buktif'.$i];
       	$bukti6=$_POST['buktig'.$i];
       	$bukti7=$_POST['buktih'.$i];
           
		$allbukti=$bukti.",".$bukti1.",".$bukti2.",".$bukti3.",".$bukti4.",".$bukti5.",".$bukti6.",".$bukti7;
       //echo "B".$allbukti;

		$cekdata = "SELECT * FROM upload WHERE email = '$email' and idskema='$ids' and idunit='$eunit' and idelemen='$unit' and waktu='$tgl'";
        // echo $cekdata;           
            $ada=mysql_query($cekdata);
            if(mysql_num_rows($ada)>0){
				
				$sqlupd="update upload set bukti='$allbukti', tanggalpapl1='$tglppapl1' where idskema='$ids' and idasesi='$idasesi' and idunit='$eunit' and idelemen='$unit'";
				$sqlupda=mysql_query($sqlupd);
				//echo $sqlupd;
				if ($sqlupda) {
                  $dup++;
				}  
                   }
             else {
            	$ql="insert into upload (id,idskema,idasesi,email,idunit,idelemen,bukti,path,waktu,tanggalpapl1) value ('','$ids','$idasesi','$email','$eunit','$unit','$allbukti','$nama_foto','$tgl','$tglppapl1')";
                 $sukses = mysql_query($ql);
                 if ($sukses){
                    $suk++;
                  }
               }
                

       }
     
     }	
    }
          ?>				
				<div class="container">
			  	<div class="alert alert-warning">
			    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    	<strong>Sukses = <?php echo $suk; ?> Update = <?php echo $dup; ?></strong> ....
				</div>
				<?php
}

else if ($op == "uploadbuktiz")
 {
   $namabp=$_GET['namas'];
   //$iduserb=$_GET['id'];
   $emailbp=$_GET['email'];
   $ceksyaps="select * from skemasiswa where emailsiswa='$emailbp' and statustesp='N'";
   //echo $ceksyaps;
   $ceksyapsa=mysql_query($ceksyaps);
   $ceksyapsb=mysql_fetch_array($ceksyapsa);
   $idskemasyac=$ceksyapsb['idskema'];   
   //$listsyps="select * from syarat where idskema='$idskemasyac' and kodesyarat='1'";
   

   echo "<form id=\"formContoh\" method=\"post\" enctype=\"multipart/form-data\" action=\"".$_SERVER['PHP_SELF'].
        "?op=uploadbuktipostp\">";
   echo "<input type=hidden name=namas value=$namabp>";
   //echo "<input type=text name=iduser value=$iduserb>";
   echo "<input type=hidden name=email value=$emailbp>";
   echo "<input type=hidden name=idskema value=$idskemasyac>";
   echo "<table class=demo-table  width=80%>";
   echo "<th colspan=2><strong>Upload File Pendukung sesuai dengan syarat di atas </strong></th>";
	echo "<tr><td>Silahkan pilih File Poto <font color='red'> ( Ukuran file max 2MB dan type file pdf,PDF)</font></td><td> <input type='file' name='fotox4'/></td></tr>";
	echo "<tr><td colspan=2><input type='submit' id='gobutton' value='Kirim '></td></tr><tr><td colspan=2> <font color=red>Kalau ada penambahan Unit/Kompetensi harap upload ulang</table>";
 }

 else if ($op == "uploadbuktipostp")
 { 
    $nama=$_POST['namas'];
    //$iduser=$_POST['iduser'];
    $email=$_POST['email'];
    $idskema=$_POST['idskema'];
    //echo $nama;
    $namasc=explode(" ", $nama);
    $namaffpor=$_FILES['fotox4']['name'];
    $namaffpor=str_replace(" ", "", $namaffpor);
    $dir_foto = "gambarimages/";
    $namasd=$namasc[0];
	$nama_foto ='porto'.$email.$namaffpor;
                     //echo  $nama_foto;
    $ext = pathinfo( $nama_foto, PATHINFO_EXTENSION );
	$ekstensi = array('pdf','PDF'); // Ektensi yg diterima
               if( in_array( $ext, $ekstensi ) ) {
          		if( $_FILES['fotox4']['size']<2000000 ) {
                        if ( move_uploaded_file( $_FILES['fotox4']['tmp_name'], $dir_foto . $nama_foto ) ) { ?>
			<div class="container">
			  <div class="alert alert-success">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>Sukses!</strong>file terkirim ...
			  </div>
			</div> <?php
			$cekdata1p = "SELECT * FROM upload WHERE email = '$email' and idskema='$idskema'";
   			$ada1p=mysql_query($cekdata1p);
   				if(mysql_num_rows($ada1p)>0){      
					$queryp = "UPDATE upload SET upload.path='$nama_foto' WHERE email = '$email' and idskema='$idskema'";	
				$hasilp = mysql_query($queryp);				
				}
			     }
                        else { ?>
			<div class="container">
			  <div class="alert alert-success">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>Penyimpanan Gagal ..!</strong>
			  </div>
			</div> 
			<?php	}
        	 } else { ?>
			<div class="container">
			  <div class="alert alert-warning">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>Penyimpanan Gagal ..!</strong>Ukuran File terlalu besar
			  </div>
			</div> 
			<?php
			}
			} else { ?>
			<div class="container">
			  <div class="alert alert-warning">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>Penyimpanan Gagal ..!</strong>type bukan PDF atau file kosong atau Ukuran file terlalu besar
			  </div>
			</div> 
			<?php	
			}

 } 

else if ($op == "uploadpotos")
 {
   $nama=$_GET['namas'];
   $iduser=$_GET['id'];
   $email=$_GET['email'];
   echo "<form id=\"formContoh\" method=\"post\" enctype=\"multipart/form-data\" action=\"".$_SERVER['PHP_SELF'].
        "?op=uploadpotospost\">";
   echo "<input type=hidden name=namas value=$nama>";
   echo "<input type=hidden name=iduser value=$iduser>";
   echo "<input type=hidden name=email value=$email>";
   echo "<table class=demo-table  width=60%>";
   echo "<th colspan=2><h4><strong>Upload Photo</strong></h4></th>";
	echo "<tr><td>Silahkan pilih File Poto <font color='red'> ( Ukuran file max 100kb dan type file jpg,png)</font></td><td> <input type='file' name='fotox3'/></td></tr>";
	echo "<tr><td colspan=2><input type='submit' id='gobutton' value='Kirim '></td></tr></table>";
 } 

else if ($op == "uploadpotospost")
 {
    
    $nama=$_POST['namas'];
    $iduser=$_POST['iduser'];
    $email=$_POST['email'];
    //echo $nama;
    $namasa=explode(" ", $nama);
    $dir_foto = "gambardiri/";
    $namasb=$namasa[0];
	$nama_foto =$iduser.$namasb.$_FILES['fotox3']['name'];
                     //echo  $nama_foto;
    $ext = pathinfo( $nama_foto, PATHINFO_EXTENSION );
		$ekstensi = array('png','PNG','jpg','JPG'); // Ektensi yg diterima
              if( in_array( $ext, $ekstensi ) ) {
          		if( $_FILES['fotox3']['size']<100000 ) {
                        if ( move_uploaded_file( $_FILES['fotox3']['tmp_name'], $dir_foto . $nama_foto ) ) { ?>
			<div class="container">
			  <div class="alert alert-success">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>Sukses!</strong>Photo terkirim ...
			  </div>
			</div> <?php
			$cekdata1p = "SELECT * FROM apl1 WHERE email = '$email'";
   			$ada1p=mysql_query($cekdata1p);
   				if(mysql_num_rows($ada1p)>0){      
					$queryp = "UPDATE apl1 SET poto='$nama_foto' WHERE email = '$email'";	
				$hasilp = mysql_query($queryp);				
				}
			     }
                        else { ?>
			<div class="container">
			  <div class="alert alert-success">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>Photo Gagal ..!</strong>
			  </div>
			</div> 
			<?php	}
        	 } else { ?>
			<div class="container">
			  <div class="alert alert-warning">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>Photo Gagal ..!</strong>Ukuran File terlalu besar
			  </div>
			</div> 
			<?php
			}
			} else { ?>
			<div class="container">
			  <div class="alert alert-warning">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>Photo Gagal ..!</strong>type bukan PNG atau file kosong
			  </div>
			</div> 
			<?php	
			}
  }

	?>


<body>
<br/>
 
<?php
 
// bagian ini digunakan untuk menampilkan semua data
 $cekdata = "SELECT * FROM apl1 WHERE email = '$uname'";
   $ada=mysql_query($cekdata);
   	if(mysql_num_rows($ada)>0){
        $pesan="Edit Biodata";
        
        }else {
        $pesan="Lengkapi Biodata "; }
	echo "<table align=left class=demo-table >";
	$no = 1;
	$query ="SELECT lsp_usertbl.id_user,lsp_usertbl.nama,lsp_usertbl.email as emailusr,lsp_usertbl.linkttd, apl1.email as email ,apl1.email2 as email2,apl1.buktiapl1,apl1.poto FROM lsp_usertbl left JOIN apl1 ON lsp_usertbl.email=apl1.email where lsp_usertbl.email='$uname' ";
	//echo $query;
        
	$hasil = mysql_query($query);
	while ($data = mysql_fetch_array($hasil))
		{
          //echo "kjaksjaksj".$data['emailusr'];    	
       /* echo "<a href=\"".$_SERVER['PHP_SELF'].
        "?op=ttddigital&iduser=".$data['id_user']."\" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'><strong>Tanda Tangan</strong> </a> &nbsp &nbsp";*/
			echo " <a href=\"".$_SERVER['PHP_SELF'].
        "?op=kompetensi&email=".$data['email']."\" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'><strong>Kompetensi </strong> </a>  &nbsp";
        echo " <a href=\"".$_SERVER['PHP_SELF'].
        "?op=uploadbuktiz&email=".$data['email']."&namas=".$data['nama']."\" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'><strong>Bukti Pendukung</strong> </a>"; 

   //echo "</tr>";
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

<?php } ?>

