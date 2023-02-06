<!DOCTYPE html>
<?php
error_reporting(0);
//session_set_cookie_params(3600*2,"/");
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
<script src="js/lumino.glyphs.js"></script>
<script src="../js/formValidation.min.js"></script>
<script src="../js/framework/bootstrap.min.js"></script>
<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-datepicker.js"></script>

<link href="../css/tabelbaru2.css" rel="stylesheet">

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
 //if ($_SESSION['level'] != 'lsp') {
 //echo "<center><link href='css/adminstyle.css' rel='stylesheet' type='text/css'>
 // <strong> Anda Tidak Punya Hak ...!</strong><br>";
 // echo "<a href=../lsp_login.php class='btn btn-primary btn-sm' role='button'> Kembali</a></center>"; 
 //} 
 //else 
 //{

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
				<a class="navbar-brand"><span><?php echo $namax ;?></span></a>
				
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

			<li ><a href="inputskema.php"><svg class="glyph stroked paperclip"><use xlink:href="#stroked-paperclip"/></svg> Kelola Skema</a></li>
			<li><a href="inputunit.php"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg> Kelola Unit</a></li>
			<li><a href="inputasesor.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Kelola Asesor</a></li>
			<li  class="active"><a href="inputpeserta.php"><svg class="glyph stroked female user"><use xlink:href="#stroked-female-user"/></svg>Kelola Peserta</a></li>
			<li><a href="inputelemen.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"/></svg> Kelola Komptetensi</a></li>
			<li><a href="inputtempattuk.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg> Kelola Tempat TUK</a></li>
			<li><a href="inputsyarat.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg> Input Persyaratan</a></li>
			<li><a href="inputkumpan.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Input Umpan Balik</a></li>
			<li><a href="inputprosesasesmen.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Input Proses Asesmen</a></li>
			<li><a href="inputpengurus.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Input Pengurus</a></li>
			<li><a href="mapa.php"><svg class="glyph stroked paperclip"><use xlink:href="#stroked-paperclip"/></svg> MAPA</a></li>
			<li><a href="settanggal.php"><svg class="glyph stroked clock"><use xlink:href="#stroked-clock"/></svg> SET Tanggal</a></li>
			<li><a href="pemetaanasesor.php"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"/></use></svg> Atur jadwal</a></li>
			<li><a href="inputpraktek.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>FR.IA.01 Ceklist Observasi</a></li>
			<li><a href="inputtestulis.php"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>FR.IA.05 Pertanyaan Tertulis</a></li>
			<li><a href="validasiapl1lsp.php"><svg class="glyph stroked usb flash drive"><use xlink:href="#stroked-usb-flash-drive"/></svg> Validasi APL1</a></li>
			<li><a href="monitorasesi.php"><svg class="glyph stroked desktop computer and mobile"><use xlink:href="#stroked-desktop-computer-and-mobile"/></svg> Monitoring</a></li>
			<li><a href="backupdata.php"><svg class="glyph stroked download"><use xlink:href="#stroked-download"/></svg> Backup data</a></li>
			<li role="presentation" class="divider"></li>
			<li><a href="../logout.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Logout</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<h4>Kelola Data Peserta </h4>
                        
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
   $iduser= $_GET['iduser']; 
   $queryedit = "SELECT * FROM lsp_usertbl WHERE id_user = '$iduser'";
   $hasiledit = mysql_query($queryedit);
   $dataedit  = mysql_fetch_array($hasiledit);
   $iduser=$dataedit['id_user'];
   $nama=$dataedit['nama'];
   //$pass=$data['password'];
   $telp=$dataedit['notelp'];
   $emailuser=$dataedit['email'];
   // echo $iduser;
   //echo "<form name='myform' method='post' action='".$_SERVER['PHP_SELF']."??op=edit'>";
 
   echo "<form id=\"formContoh\" method=\"post\" action=\"".$_SERVER['PHP_SELF'].
        "?op=update\">";
   echo "<table border=\"0\">"; 
?>
  <div class="form-group"><strong>Email :</strong> 
   <input type="text" name="emailuser" id="emailuser" placeholder="Email Aktif" class="form-control" value="<?php echo $emailuser; ?>" autofocus required/>
  </div>
  <div class="form-group"><strong>Nama Lengkap :</strong>
   <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" class="form-control" value="<?php echo $nama; ?>" required/>
  </div>
  <div class="form-group"><strong>No Telp :</strong>
   <input type="text" name="notelp" id="notelp" placeholder="Nomor Telp" class="form-control" value="<?php echo $telp; ?>" required/>
  </div>

  <div class="form-group"><strong>Password :</strong>
   <input type="password" name="password1" id="password1" placeholder="Password (Kosong tdk berubah)" class="form-control" >
  </div>
  </div>
   <hr>
   <input type="hidden" name="iduser" value="<?php echo $iduser; ?>">
   <input type="hidden" name="emaillama" value="<?php echo $emailuser; ?>">
   <input type="submit" id="gobutton" value="Simpan"> 
   <!--<a href="setup_registrasi.php" class="button">Register</a>-->
  </form>
</div>
<br/>

<?php

}
else if ($op == "tambah")
{
?>
  
  <form id="formContoh" method="POST" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=append\">";?>
  <hr>
  <div class="form-group"><strong>Username :</strong>
   <input type="text" name="emailuser" id="emailuser" placeholder="Username" class="form-control" autofocus required/>
  </div>
  <div class="form-group"><strong>Nama Lengkap :</strong>
   <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" class="form-control" required/>
  </div>
  <div class="form-group"><strong>No Telp :</strong>
   <input type="text" name="notelp" id="notelp" placeholder="Nomor Telp" class="form-control" required/>
  </div>
  <div class="form-group"><strong>Password :</strong>
   <input type="password" name="password" id="password" placeholder="Password" class="form-control" required/>
  </div>
  <div class="form-group"><strong>Re Password :</strong>
   <input type="password" name="repassword" id="repassword" placeholder="RePassword" class="form-control" required/>
  </div>
<div class="form-group"><strong>Tanggal :</strong>
<select class="form-control" name="tanggal" placeholder="tanggal">
          <?php
          $tampil=mysql_query("SELECT * FROM settanggal where status='A' group by tanggal ");
while($r=mysql_fetch_array($tampil)){
echo "<option value=$r[tanggal]>$r[tanggal]</option>";
}?>
</select>
</div>

   <hr>
   <input type="submit" id="gobutton" value="Simpan" class="button"> 
   <!--<a href="setup_registrasi.php" class="button">Register</a>-->
  </form>
</div>
<br/>

<?php

}
else if ($op == "append")
     {
      $emailuser=$_POST['emailuser'];
	  echo $emailuser;
      $nama=$_POST['nama'];
      $password=md5($_POST['password']);
      $ket=$_POST['ket'];
      $level="peserta";
      $notelp=$_POST['notelp'];
      $tanggal=$_POST['tanggal'];
      $cekdata="select email from lsp_usertbl where email='".$emailuser."'";
	  $ada=mysql_query($cekdata);
	if(mysql_num_rows($ada)>0){
           echo "Gagal Duplikat...";}
      else {
      if (!empty($emailuser)){
		  
      $queryappend = "INSERT INTO lsp_usertbl VALUE('','$nama','$emailuser','$password','1','$tanggal','$level','$notelp','')";
      //echo $query;
      $berhasilappend = mysql_query($queryappend);
      if ($berhasilappend) echo "Proses Sukses";
      else echo "Proses Gagal";
      }
      }
}

else if ($op == "update")
     {
 
       // proses untuk updating data setelah diedit
        $iduser = $_POST['iduser'];
        $emailuser= trim($_POST['emailuser']);
        $nama= $_POST['nama'];
        $notelp=$_POST['notelp'];
        $pass=md5($_POST['password1']);
        $emaillama=trim($_POST['emaillama']);
        if($emailuser == $emaillama){    
        if(empty($pass)){
	      $queryupdate = "UPDATE lsp_usertbl SET email='$emailuser',nama='$nama',notelp='$notelp' WHERE id_user = '$iduser'";
        }else{
	      $queryupdate = "UPDATE lsp_usertbl SET email='$emailuser',nama='$nama',notelp='$notelp',password='$pass' WHERE id_user = '$iduser'";
         }
 
        //echo $query;
        $hasilupdate = mysql_query($queryupdate);
        if ($hasilupdate) echo "Proses Update Sukses";
        else echo "<p>Proses Update Gagal</p>";
        }else{ 
          echo $emailuser;
	     $cekdata="select email from lsp_usertbl where email='".$emailuser."'";
	     $ada=mysql_query($cekdata);
	  if(mysql_num_rows($ada)>0){
           echo "Gagal Duplikat ..";}
          else {
    if(empty($pass)){
	 $query = "UPDATE unit SET email='$emailuser',nama='$nama',notelp='$notelp' WHERE id_user = '$iduser'";
        }else{
	 $query = "UPDATE lsp_usertbl SET email='$emailuser',nama='$nama',notelp='$notelp',password='$pass' WHERE id_user = '$iduser'";}
         //echo $query;
        $hasil = mysql_query($query);
        echo "<table><tr><th>";
        if ($hasil) echo "Proses Update Sukses</th></th>";
        else echo "<p>Proses Update Gagal1</p></th></tr></table>";
        
        } 
        }
     }
else if ($op == "delete"){

   $iduser= $_GET['iduser'];
   $querydelete = "SELECT * FROM lsp_usertbl WHERE id_user = '$iduser'";
   $hasildelete = mysql_query($querydelete);
   $datadelete  = mysql_fetch_array($hasildelete);
   $iduser=$datadelete['id_user'];
   $nama=$datadelete['nama'];
 //echo "<form name='myform' method='post' action='".$_SERVER['PHP_SELF']."??op=edit'>";
   echo "<form id=formContoh method=\"post\" action=\"".$_SERVER['PHP_SELF'].
        "?op=deletepost\">";
         echo "<input type=hidden name=iduser value=".$iduser.">";
          ?>
	 <div class="formcolumn">
    	Yakin Asesor : <strong><?php echo $nama ?></strong>  Akan di hapus ? 
        <div class="buttons">
        <?php
       echo "<input type=submit id=gobutton value=Delete>
	
        </div></div>";
          
   echo "</form>";
   echo "<br/><br/><br/><br/>"; 
} 

else if ($op == "deletepost"){
 $sql="DELETE from lsp_usertbl WHERE id_user=".$_POST['iduser'];
 mysql_query($sql);
}

else if($op=="impeserta"){
echo"<table><tr>"; ?>
<form class="form-horizontal" enctype="multipart/form-data" id="formContoh" method="POST" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=postuploaduser\"";?>> 
<?php 
//echo "<form enctype=multipart/form-data action=postuploaduser.php method=POST>
 echo "</br><strong>Masukan File Peserta yang akan di UPLOAD dengan format (XLS): </strong><input name=uploadedfile type=file />
 <input type=submit id=gobutton value=Upload File />
 </form></div></br>";

}

else if($op=="postuploaduser"){
include "excel_reader2.php";
//echo "<div id=second>";
//echo "ade ";
 $data = new Spreadsheet_Excel_Reader($_FILES['uploadedfile']['tmp_name']);
 // membaca jumlah baris dari data excel
 $baris = $data->rowcount($sheet_index=0);
 
 // nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
 $sukses = 0;
 $gagal = 0;
//echo "jahsjahsj"; 

 for ($i=2; $i<=$baris; $i++)
{
       $cekuser=trim($data->val($i, 3));
       $cekdata="select email from lsp_usertbl where trim(email)='".$cekuser."'";
       $ada=mysql_query($cekdata);
       $no=1;
	   $nama = $data->val($i, 2);
	   $nim = trim($data->val($i, 3));
	   $password = $data->val($i, 4);
	   $status= $data->val($i, 5);
	   $kode= $data->val($i, 6);
	   $level= trim($data->val($i, 7));
	   $notlp= $data->val($i, 8);
	   $pass1=md5($password);
	   $linkttd=' ';
    if(empty($nim)){
      $baris=$i;
      }else {
       if(mysql_num_rows($ada)>0)
      {  echo "Duplikat atas nama ". $nama."</br>";
       //  echo $query;
         $gagal++;
       }else{
      
$query="insert into lsp_usertbl (id_user,nama,email,password,status,kode,level,notelp,linkttd)values ('','$nama','$nim','$pass1','$status','$kode','$level','$notlp','$linkttd')";
//echo $query;
$hasil = mysql_query($query);
} 

// jika proses insert data sukses, maka counter $sukses bertambah
// jika gagal, maka counter $gagal yang bertambah
if ($hasil) { $sukses++;
   } else {
   echo $query;}
    
   //echo "Gagal ...";
  }
}
// tampilan status sukses dan gagal
//echo "<p><a href=adminmenu.php><img src=img/arrow-left2.png>Kembali</a></p>";
echo "<h3>Proses import data selesai.</h3>";
echo "<p>Jumlah data yang sukses diimport : ".$sukses."<br>";
echo "Jumlah data yang gagal diimport : ".$gagal."</p>";
//}
//echo "</div>";
}

else if($op=="updatestatus")
{
 $idus = $_GET['id'];
 
   $queryust = "SELECT * FROM lsp_usertbl WHERE id_user = '$idus'";
   $hasilust = mysql_query($queryust);
   $dataust  = mysql_fetch_array($hasilust);
   $st=$dataust['status'];
   //echo $st;
   if($st=='1'){
      $sbaru='0';}
    else {
      $sbaru='1';}
   $sqlustu="update lsp_usertbl set status='$sbaru' where id_user='$idus'";
   $execustu=mysql_query($sqlustu);

}
else if ($op == "ubahpassword")
{

$editpass="SELECT * FROM lsp_usertbl where id_user='".$_GET['idasesi']."'";
$editpassa=mysql_query($editpass);
//echo $editpass;	
	$rpass=mysql_fetch_array($editpassa);
	//<tr><td>RePassword</td><td>:		<input type=text name=rpassword></td></tr>
        $namap=$rpass['nama'];
echo "<form id=\"formContoh\" method=\"post\" action=\"".$_SERVER['PHP_SELF'].
    "?op=postubahpass\">";
echo "<div id=three>

	<input type=hidden name=iduser value='$rpass[id_user]'>
		<table width=60%>       
        <th colspan=2><h4><strong>Reset Password</strong></h4></th>
		<tr><td>Nama Asesi </td><td>: $namap </td></tr>		
		<tr><td>Password</td><td>:
		<input type=text name=passwordubah> * </td></tr>
		<tr><td colspan=2>*)Apabila tidak diubah, dikosongkan saja</td></tr>
		<tr><td colspan=2>
        <input class=submit name=dsubmit type=submit value=Kirim>
		</td></tr>
	</table>
	</form></div>";

}
else if ($op=="postubahpass"){

  $iduser=$_POST['iduser'];
  $passu=trim($_POST['passwordubah']);
  // echo "siap".  $passu;  
if (!empty($passu)){
		$pass1=md5($passu);
		$sqlup="UPDATE lsp_usertbl SET password='$pass1' where id_user='$iduser'";
                //echo $sqlup;
                $suks=mysql_query($sqlup);
                if($suks) 
		{ echo " Perubahan Sukses ...";}
		else { echo "gagal....";} 

} else { echo "<font color='green'>Tidak ada perubahan password </font>";}
}

else if ($op == "editbio")
{
   
    $email= $_GET['email'];
    $queryesiswa = "SELECT * FROM apl1 WHERE email = '$email'";
    $hasilesiswa = mysql_query($queryesiswa);
   	$dataesiswa  = mysql_fetch_array($hasilesiswa);
   	$iduser=$dataesiswa['idsiswa'];
	$nama=$dataesiswa['namasiswa'];
	//	$pass=$data['password'];
	//$telp=$data['notelp'];
	$emailuser=$dataesiswa['email'];
	$tmplahir=$dataesiswa['tmplahir'];
	$tgllahir=$dataesiswa['tgllahir'];
	$jeniskelamin=$dataesiswa['jeniskelamin'];
    $kebangsaan=$dataesiswa['kebangsaan'];
    $alamat=$dataesiswa['alamat'];
    $kodepos=$dataesiswa['kodepos'];
    $rumah=$dataesiswa['tlprumah'];
	$hp=$dataesiswa['hp'];
    $tlpkantor=$dataesiswa['tlpkantor'];
    $emailuser=$email;
    $pendidikan=$dataesiswa['pendidikan'];
    $lembaga=$dataesiswa['namalembaga'];
    $jurusan=$dataesiswa['jurusan'];
    $potolink=$dataesiswa['poto'];  
    $tgl = date("d-m-Y", strtotime($tgllahir));
	echo "<form id=\"formContoh\" method=\"post\" enctype=\"multipart/form-data\" action=\"".$_SERVER['PHP_SELF'].
        "?op=updatebio\">";
		?>
		<table width="95%">
		<tr><td colspan="2" border="0" bgcolor='#006699'><strong>A. Biodata Peserta</strong></td><tr><td>
		<table border="0" width="90%">
		<thead>
								   
		<tr><td colspan="2">
		   <div class="form-group"><strong>Nama Lengkap :</strong>
			<div class="dynamiclabel">
			 <input type="text" name="nama" id="nama" placeholder="Nama Lengkap"  value="<?php echo $nama; ?>" size="50" autofocus required/>
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
					   <div class="form-group"><strong>Email:</strong>
					   <div class="dynamiclabel">
					   <input type="text" name="emailuser" id="emailuser" placeholder="Email Aktif" value="<?php echo $emailuser; ?>" size="30" readonly/>
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
						   <table width="95%">
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
                        <?php if (empty($potolink)){ ?>
						   </td></tr><tr>
						   <td>File Photo <font color='red'> ( Ukuran file max 100kb dan type file jpg,png)</font> <input type="file" name="fotox3" /></td>
						    </tr><?php } else { ?>
                                                    </td></tr>
						   <tr><td colspan="2">
						   <div class="form-group"><strong>Nama Photo :</strong>
						   <div class="dynamiclabel">
						   <input type="text" name="xpoto" id="xpoto" size="50" value="<?php echo $potolink; ?>" readonly/>										
						   </div>
						   </div><?php } ?>
						</table>
						</thead> 	
        				</table>					    
					   <input type="hidden" name="iduser" value="<?php echo $iduser; ?>">
					   <input type="hidden" name="emaillama" value="<?php echo $emailuser; ?>">
					   <input type="submit" id="gobutton" value="Simpan"> 
					   <!--<a href="setup_registrasi.php" class="button">Register</a>-->
				
					   </form>
					  </div>
	
<?php
}
else if ($op == "updatebio")
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
			$dir_foto = "../siswa/gambardiri/";
			//echo $nama;
	   		//echo $emailuser;
	   		//echo $tmplahir;
		    $my_date = date('Y-m-d', strtotime($tgllahir));
                     $namasa=explode(" ", $nama);
                     $namasb=$namasa[0].$namasa[1];
                     $fpoto=$_FILES['fotox3']['name'];
                     if(!empty($fpoto)){
	             $nama_foto =$iduser.$namasb.$_FILES['fotox3']['name'];
                                          //echo  $nama_foto;
                     $ext = pathinfo( $nama_foto, PATHINFO_EXTENSION );
		$ekstensi = array('png','PNG','jpg','JPG'); // Ektensi yg diterima
                 if( in_array( $ext, $ekstensi ) ) {
          		if( $_FILES['fotox3']['size']< 100000 ) {
                        if ( move_uploaded_file( $_FILES['fotox3']['tmp_name'], $dir_foto . $nama_foto ) ) {
                           $potopes="Photo Sukses ...";}
                        else { $potopes=" Photo Gagal .., Ukuran photo teralalu besar atau type bukan PNG";}
                        
        	 } else { $potopes=" Photo Gagal .., Ukuran photo teralalu besar";}
			} else { $potopes=" Photo Gagal ..,type bukan PNG";}
			
		    } else {
                     echo "kosong";
                     $nama_foto=$_POST['xpoto'];}

   				   
		$queryusiswa = "UPDATE apl1 SET 				namasiswa='$nama',tmplahir='$tmplahir',tgllahir='$my_date',jeniskelamin='$jeniskelamin',kebangsaan='$kebangsaan', alamat='$alamat', kodepos='$kodepos', tlprumah='$tlprumah', hp='$hp', tlpkantor='$tlpkantor', email='$email', pendidikan='$pendidikan', namalembaga='$lembaga',jurusan='$jurusan',poto='$nama_foto' WHERE email = '$email'";		
       
        //echo $query;
 		       $hasilusiswa = mysql_query($queryusiswa);
               		$upuser="Update lsp_usertbl set nama='$nama' WHERE email = '$email'";
			$hasilupuser = mysql_query($upuser);
 			       if ($hasilusiswa) echo "Proses Update Biodata Sukses , DAN  <font color=red> ".$potopes."</font>";
 			       else echo "<p>Proses Update Gagal</p>";
 
     }

else if ($op == "batpeserta")
{
?>
<form class="form-horizontal" enctype="multipart/form-data" id="formContoh" method="POST" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=batuploadpes\"";?>> 
                <!--<form class="form-horizontal" enctype="multipart/form-data" action="postuploaduser.php" method="POST">-->
                     <div class="form-group">
                        <label class="control-label col-lg-4">Pilih Kelas yang akan di batalkan</label>
                        <div class="col-lg-4">
                            <select name="kelas" id="kelas" class="validate[required] form-control">
                                <?php $listpes=mysql_query("SELECT notelp FROM lsp_usertbl where level='peserta' group by notelp");
			  	while($listpesa=mysql_fetch_array($listpes)){ 
        				echo " <option value=$listpesa[notelp]> $listpesa[notelp] </option>";
        			}?>
                            </select>
                        </div>
                    
                   
                    <?php echo "<input class='btn btn-success btn-line' type=submit  value=Batalkan />"; ?></div>
                    </div>
                </form>
<?php
}

else if ($op == "batuploadpes")
{
$kodebat=$_POST['kelas'];
$batuppeserta=" select * from lsp_usertbl where notelp='$kodebat'";
//echo $batuppeserta;
$batuppesertaa=mysql_query($batuppeserta);
$batuppesertab=mysql_num_rows($batuppesertaa);
if ( $batuppesertab>0)
{
 $batuppesertadel="DELETE FROM lsp_usertbl WHERE notelp='$kodebat'";
 $batuppesertadela=mysql_query($batuppesertadel);
 if($batuppesertadela)
 {
 	echo " Pembatalan Sukses ...</br>";
 }
 else 
 {
 	echo " Pembatalan Gagal ...</br>";
 }
}
else 
{
	echo "Data tidak ketemu ....</br>";
}
}

?>


<body>
<?php echo "<a href=\"".$_SERVER['PHP_SELF'].
        "?op=tambah\" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'></span>Tambah</a>";
 echo " <a href=\"".$_SERVER['PHP_SELF'].
        "?op=impeserta \" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'>Upload peserta </a>";
echo " <a href=\"".$_SERVER['PHP_SELF'].
        "?op=batpeserta \" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'>Batal Upload </a></br>";
        ?>
<table align="left" class='demo-table' width="50%">
<tr><td><input type="button" value="REFRESH" onclick="window.location='inputpeserta.php'">
<form method="post" action="inputpeserta.php">
<input type="hidden" name="sqlaction" value="SEARCH">
<tr><td>Kriteria pencarian :
<select name="txtkriteria">
<option value="nama"> NAMA
</select>
<input type="text" name="txtcari">
<input type="submit" value="CARI"><br></td>
<tr> 
</table></br>
<table class=demo-table width=100%><thead>
<tr>
    <th bgcolor='#006699'>No</th>
    	
    <th bgcolor='#006699'>Nama Peserta</th>
    <th bgcolor='#006699'>Username </th>
    <th bgcolor='#006699'>Status</th>
    <th bgcolor='#006699'>Tanggal Reg</th>
    <th colspan='4' bgcolor='#006699'>Aksi</th>
</tr></thead>
 
<?php
 $dataPerPage = 25;
if(isset($_GET['page']))
{
    $noPage = $_GET['page'];
} 
else $noPage = 1;
$offset = ($noPage - 1) * $dataPerPage;
if($_POST['sqlaction']=="SEARCH"){
$querymain="Select * from lsp_usertbl WHERE level='peserta' and ".
$_POST['txtkriteria']." LIKE '%".
$_POST['txtcari']."%' order by id_user DESC LIMIT $offset, $dataPerPage";
} else {
$querymain="select * from lsp_usertbl where level='peserta' order by id_user DESC LIMIT $offset, $dataPerPage";
}

// bagian ini digunakan untuk menampilkan semua data
 
$no = 1;
//$querymain ="SELECT * FROM lsp_usertbl where level='peserta'";
$hasilmainpes = mysql_query($querymain);
while ($datamainpes = mysql_fetch_array($hasilmainpes))
{
    if($datamainpes['status']==1) {
    $ketsta="Aktif";
    $war="green";}

    else {
    $ketsta="Belum Aktif";
    $war="red";}
   echo "<tr>";
   echo "<td bgcolor='#99CCFF'>".$no."</td>";
   //echo "<td bgcolor='#99CCFF'>".$data['id_user']."</td>";
   echo "<td bgcolor='#99CCFF' align=left>".$datamainpes['nama']."</td>";
   echo "<td bgcolor='#99CCFF' align=left>".$datamainpes['email']."</td>";
    echo "<td align=left><strong><a href=\"".$_SERVER['PHP_SELF'].
					"?op=updatestatus&id=".$datamainpes['id_user']."\"><font color=$war><span class='glyphicon glyphicon-refresh'>".$ketsta."</font></strong></td>";
echo "<td bgcolor='#99CCFF' align=left>".$datamainpes['kode']."</td>";
//echo "<td align=left><a href=../siswa/biodatasiswapdf.php?email=" .trim($datamainpes['email']). " target=_blank><span class='glyphicon glyphicon-user'>Preview</a></td>";
//echo "<td align=left><a href=\"".$_SERVER['PHP_SELF'].
  //      "?op=editbio&email=".$datamainpes['email']."\" title='Edit Biodata'><span class='glyphicon glyphicon-pencil'>Edit Biodata</a></td>";
echo "<td><a href=\"".$_SERVER['PHP_SELF'].
        "?op=ubahpassword&idasesi=".$datamainpes['id_user']."\"><span class='glyphicon glyphicon-refresh'>Reset Password</a>";
   //echo "<td bgcolor='#99CCFF' align=left>".$ketsta."</td>";
  	//echo "<td><a href=\"".$_SERVER['PHP_SELF'].
        //"?op=ubahpassword&idasesi=".$row[0]."\"><span class='glyphicon glyphicon-refresh'>Reset Pass</a>
   //| 
      echo "<td><a href=\"".$_SERVER['PHP_SELF'].
        "?op=delete&iduser=".$datamainpes['id_user']."\"><span class='glyphicon glyphicon-remove'>Hapus</a></td>";
   echo "</tr>";
   $no++;
}
echo"<tr><td colspan=11><center>";
$query   = "SELECT COUNT(*) AS jumData FROM lsp_usertbl where level='peserta'";
$hasil  = mysql_query($query);
$data     = mysql_fetch_array($hasil);
$jumData = $data['jumData'];
$jumPage = ceil($jumData/$dataPerPage);
if ($noPage > 1) echo  "<a href='".$_SERVER['PHP_SELF']."?page=".($noPage-1)."' class='btn btn-primary btn-sm' role='button'> </span>&lt; Kembali</a>";
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

if ($noPage < $jumPage) echo "<a href='".$_SERVER['PHP_SELF']."?page=".($noPage+1)."' class='btn btn-primary btn-sm' role='button'> </span>Lanjutkan &gt;</a>";
echo "</center></td></tr></table>";



   echo "</div>";
?>

<!--end databaru-->
			<div>
		</div>
		
                </div>
         </div> 
			
</body>

</html>

<?php 
  //}
 } ?>
