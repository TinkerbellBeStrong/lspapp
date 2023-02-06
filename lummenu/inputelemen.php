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
<link href="css/bootstrap-theme.min.css" rel="stylesheet">
<link href='../css/tombol.css' rel='stylesheet' type='text/css'>
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
}, 5000);
</script>

<style>
  .alert {
     width:70%;    
    }
</style>

<link href="../css/tabelbaru2.css" rel="stylesheet">

<?php
//session_set_cookie_params(3600*2,"/");
//error_reporting(0);
//session_start();
include "../lsp_koneksi.php";
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
 echo "<center><link href='css/adminstyle.css' rel='stylesheet' type='text/css'>
 <strong> Anda Harus Login Dahulu ...!</strong><br>";
 echo "<a href=../lsp_login.php class='btn btn-primary btn-sm' role='button'> Kembali</a></center>"; 
}
else{
if ($_SESSION['level'] != 'lsp') {
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
			namaelemen: {
				validators: {
					notEmpty: {
						message: 'Tidak Boleh Kosong'
					}
				}
			},
			
			kodeelemen: {
				validators: {
					notEmpty: {
						message: 'Tidak Boleh Kosong'
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
			<li ><a href="inputskema.php"><svg class="glyph stroked paperclip"><use xlink:href="#stroked-paperclip"/></svg> Kelola Skema</a></li>
			<li><a href="inputunit.php"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg> Kelola Unit</a></li>
			<li><a href="inputasesor.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Kelola Asesor</a></li>
			<li><a href="inputpeserta.php"><svg class="glyph stroked female user"><use xlink:href="#stroked-female-user"/></svg>Kelola Peserta</a></li>
			<li  class="active"><a href="inputelemen.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"/></svg> Kelola Komptetensi</a></li>
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
			<h4>Kelola Data Elemen Kompetensi Dan Sub Elemen </h4>
                        
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
   $idelemen= $_GET['idelemen']; 
   $queryedite = "SELECT * FROM elemen WHERE idelemen = '$idelemen'";
   $hasiledite = mysql_query($queryedite);
   $dataedite  = mysql_fetch_array($hasiledite);
   $idelemen=$dataedite['idelemen'];
   $namaelemen=$dataedite['namaelemen'];
   $kodeelemen=$dataedite['kodeelemen'];
   $idskema=$dataedite['idskema'];
   $idunit=$dataedite['idunit'];
   
   //$pass=$data['password'];
   // echo $iduser;
 //echo "<form name='myform' method='post' action='".$_SERVER['PHP_SELF']."??op=edit'>";
 
   echo "<form id=\"formContoh\" method=\"post\" action=\"".$_SERVER['PHP_SELF'].
        "?op=update\">";
   echo "<table border=\"0\">"; 
?>
  <div class="form-group"><strong>Skema :</strong>
  <select class="form-control" id="idskema" name="idskema" placeholder="Skema" autofocus>
        
<?php
    $tampil=mysql_query("SELECT * FROM skema ORDER BY idskema");
    while($r=mysql_fetch_array($tampil)){
    if ($idskema == $r['idskema']) {
       echo "<option value=$r[idskema] selected>$r[namaskema]</option> ";
    }else{
       echo "<option value=$r[idskema]>$r[namaskema]</option>";}
    }
?>
   </select>

</div>
   <div class="form-group"><strong>Unit :</strong>
   <select class="form-control" id="idunit" name="idunit" placeholder="Skema">
        <?php
       $tampil=mysql_query("SELECT * FROM unit ORDER BY idunit");
       while($r=mysql_fetch_array($tampil)){
        if ($idunit == $r['idunit']) {
          echo "<option value=$r[idunit] selected>$r[namaunit]</option>";
		}else{
			echo "<option value=$r[idunit]>$r[namaunit]</option>";}
		}
?>
	</select>

	</div>


	<div class="form-group"><strong>Kode Elemen :</strong> 
	<input type="text" name="kodeelemen" id="kodeelemen" placeholder="Kode Elemen" class="form-control" value="<?php echo $kodeelemen; ?>"required/>
	</div>
	<div class="form-group"><strong>Nama Elemen :</strong>    <input type="text" name="namaelemen" id="namaelemen" placeholder="Nama Elemen" class="form-control" value="<?php echo $namaelemen; ?>" required/>
	</div>
	</div>
	<hr>
	<input type="hidden" name="idelemen" value="<?php echo $idelemen; ?>">
	<input type="hidden" name="kodeelemenlama" value="<?php echo $kodeelemen; ?>">
	<input type="hidden" name="idskemalama" value="<?php echo $idskema; ?>">
    <input type="hidden" name="idunitlama" value="<?php echo $idunit; ?>">
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
        "?op=appendelemen\">";?>
  <hr>
	<div class="form-group"><strong>Skema :</strong>
	<select class="form-control" id="idskema" name="idskema" placeholder="Skema" autofocus>
        <?php
         $tampil=mysql_query("SELECT * FROM skema ORDER BY idskema");
		while($r=mysql_fetch_array($tampil)){
		 echo "<option value=$r[idskema]>$r[namaskema]</option>";
		}
?>
	</select>

	</div>
	<div class="form-group"><strong>Unit :</strong>
	<select class="form-control" id="idunit" name="idunit" placeholder="unit" >
        <?php
        $tampil=mysql_query("SELECT * FROM unit ORDER BY idunit");
		while($r=mysql_fetch_array($tampil)){
		 echo "<option value=$r[idunit]>$r[namaunit]</option>";
		}
?>
	 </select>

	</div>
  
	<div class="form-group"><strong>Kode Elemen : </strong> 
	<input type="text" name="kodeelemen" id="kodeelemen"  class="form-control" required/>
	</div>
	<div class="form-group"><strong>Nama Elemen:</strong>
    <input type="text" name="namaelemen" id="namaelemen" class="form-control" required/>
	</div>
     
	<hr>
	<input type="submit" id="gobutton" value="Simpan" class="button"> 
	<!--<a href="setup_registrasi.php" class="button">Register</a>-->
  </form>
</div>
<br/>

<?php

}
else if ($op == "appendelemen")
     {
      $idskema=$_POST['idskema'];
      //echo $idskema;
      $idunit=$_POST['idunit'];	
      $kodeelemen=$_POST['kodeelemen'];
      $namaelemen=$_POST['namaelemen'];
      $cekdata="select * from elemen where kodeelemen='".$kodeelemen."' and idskema='".$idskema."' and idunit='".$idunit."'";
       //echo $cekdata;
		$ada=mysql_query($cekdata);
		if(mysql_num_rows($ada)>0){
           echo " <div class=bs-example><div class=alert alert-success fade in>
        <a href=inputelemen.php class=close data-dismiss=alert>&times;</a>
        <strong>Duplikat!</strong> 
    </div></div>";}
		else {
		if (!empty($kodeelemen)){
		$queryappe = "INSERT INTO elemen VALUE('',$idskema,'$idunit','$kodeelemen','$namaelemen')";
		//echo $query;
		$berhasilappe = mysql_query($queryappe);
		if ($berhasilappe) //echo "Proses Sukses";
		echo " <div class=bs-example><div class=alert alert-success fade in>
        <a href=inputelemen.php class=close data-dismiss=alert>&times;</a>
        <strong>Success!</strong> Data Tersimpan.
		</div></div>";
		else echo  " <div class=bs-example><div class=alert alert-success fade in>
        <a href=inputelemen.php class=close data-dismiss=alert>&times;</a>
        <strong>Gagal!</strong> Gagal tersimpan.
		</div></div>";
		}
		}
}

else if ($op == "update")
     {
       // proses untuk updating data setelah diedit
        $idskema = trim($_POST['idskema']);
        $idunit= trim($_POST['idunit']);
        $idelemen= $_POST['idelemen'];
        $kodeelemen=trim($_POST['kodeelemen']);
        $namaelemen=$_POST['namaelemen'];
        $idskemalama = trim($_POST['idskemalama']);
        $idunitlama= trim($_POST['idunitlama']);
        $kodeelemenlama= trim($_POST['kodeelemenlama']);
        if($idskema == $idskemalama and $idunit==$idunitlama and $kodelemen=$kodeelemenlama){    
        
		$queryupe = "UPDATE elemen SET namaelemen='$namaelemen' WHERE idelemen = '$idelemen'";
        //echo $query;
        $hasilupe = mysql_query($queryupe);
        if ($hasilupe) echo "Proses Update Sukses";
        else echo "<p>Proses Update Gagal</p>";
        }else{ 
          //echo $emailuser;
		$cekdata="select kodeelemen,idskema,idunit from elemen where kodeelemen='".$kodeelemen."' and idskema='".$idskema."' and idunit='".$idunit."'" ;
		$ada=mysql_query($cekdata);
		if(mysql_num_rows($ada)>0){
           echo "Gagal Duplikat ..";}
          else {
		$queryupe = "UPDATE elemen SET idskema='$idskema',idunit='$idunit',kodelemen='$kodeelemen',namaelemen='$namaelemen' WHERE idelemen = '$idelemen'";}
        //echo $query;
        $hasilupe = mysql_query($queryupe);
        echo "<table><tr><th>";
        if ($hasilupe) echo "Proses Update Sukses</th></th>";
        else echo "<p>Proses Update Gagal</p></th></tr></table>";
        
        }
     }
	 
else if ($op == "delete"){
   $idelemen= $_GET['idelemen'];
   //echo $idelemen;
   $querydele = "SELECT * FROM elemen WHERE idelemen = '$idelemen'";
   $hasildele = mysql_query($querydele);
   $datadele  = mysql_fetch_array($hasildele);
   $idelemen=$datadele['idelemen'];
   $namaelemen=$datadele['namaelemen'];
   $cekdsubel="select idelemen from subelemen WHERE idelemen='$idelemen'";
   $cekdsubela=mysql_query($cekdsubel);
   $cekdsubelb=mysql_num_rows($cekdsubela);
   if ($cekdsubelb)
   {
     ?>
		<div class="container">
        <div class="alert alert-warning">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Gagal hapus Elemen..! Sub Elemen kompetensi sudah terisi silahkan hapus dulu ....</strong>
        </div>
		</div> <?php

   }else 
   {
		//echo "<form name='myform' method='post' action='".$_SERVER['PHP_SELF']."??op=edit'>";
		echo "<form id=formContoh method=\"post\" action=\"".$_SERVER['PHP_SELF'].
        "?op=deletepost\">";
         
          ?>
		<div class="formcolumn">
    	<div class="dynamiclabel">
    	<?php echo "<font color=red> HATI-HATI Ini akan sekaligus menghapus sub elemen !!!!</font></br>Elemen  <strong>".$datadele['namaelemen']."</strong> Ini Akan di hapus ?"; ?>
    	<label for="kodeelemen">Apakah Yakin Akan di Hapus ?</label>
		</div> 
       <div class="buttons">
        <?php 
        echo "<br /><input type=hidden name=idelemen value=".$idelemen.">";
		echo "<input type=submit id=gobutton value=Delete>
	
        </div></div>";
          
		echo "</form>";
		echo "<br/><br/><br/><br/>"; 
	} 
	}

else if ($op == "deletepost"){
	$sql="DELETE from elemen WHERE idelemen=".$_POST['idelemen'];
	mysql_query($sql);
	//$sql="DELETE from subelemen WHERE idelemen=".$_POST['idelemen'];
	//mysql_query($sql);
	}

else if ($op == "subelemen"){
   $idelemen= $_GET['idelemen'];
   //echo $idelemen;
   $query = "SELECT * FROM elemen WHERE idelemen = '$idelemen'";
   $hasil = mysql_query($query);
   $data  = mysql_fetch_array($hasil);
   $idelemen=$data['idelemen'];
   $namaelemen=$data['namaelemen'];
   $kodeelemen=$data['kodeelemen'];
   $idskema=$data['idskema'];
   $idunit=$data['idunit'];


	echo "<form id=\"formContoh\" method=\"post\" action=\"".$_SERVER['PHP_SELF'].
        "?op=subelemenpost\">";
	echo "<table border=\"0\">"; 
?>
	<div class="form-group"><strong>Banyak Sub Elemen Yang Mau di input? :</strong> 
	<input type="text" name="banyak" id="banyak" placeholder="0-9" class="form-control" autofocus required/>
	</div>

    <input type="hidden" name="idskema" value="<?php echo $idskema ;?>">
	<input type="hidden" name="idunit" id ="idunit" value="<?php echo $idunit ;?>">
	<input type="hidden" name="idelemen" value="<?php echo $idelemen ;?>">
    <input type="hidden" name="kodeelemen" value="<?php echo $kodeelemen ;?>">
    <div class="buttons">
    <input type="submit" id="gobutton" value="Lanjutkan">
    </div>

<?php
}

else if ($op == "subelemenpost"){
		$banyak=$_POST['banyak'];
		//echo "loba". $banyak;
		$idskema =$_POST['idskema'];
        $idunit=$_POST['idunit'];
        $idelemen= $_POST['idelemen'];
        $kodeelemen=trim($_POST['kodeelemen']);
		echo "<form id=\"formContoh\" method=\"post\" action=\"".$_SERVER['PHP_SELF'].
        "?op=subelemenpostsimpan\">";

?>	
        <input type="hidden" name="idskema" value="<?php echo $idskema ;?>">
		<input type="hidden" name="idunit" id ="idunit" value="<?php echo $idunit ;?>">
		<input type="hidden" name="idelemen" value="<?php echo $idelemen ;?>">
        <input type="hidden" name="kodeelemen" value="<?php echo $kodeelemen ;?>">
		<?php echo "
		<table>
			<tr>
				<td>No</td>
			<td>Kode Sub Elemen</td>
			<td>Komponen Sub Elemen</td>
			</tr>";

			for($i=0; $i<$banyak; $i++){
			$nomor = $i + 1;
			$r=mysql_fetch_array($tampil);
			//$tanggal=date('Y-m-d');
			echo "
			<tr>
			<td> $nomor </td>
			<td><input type=text name=kodesubelemen[] size=15></td>
			<td><textarea name=pertanyaan[] rows=4 cols=70></textarea></td>

			</tr>
			";

			}
			echo "
			</table>

				 <div class=buttons>
					<input type=submit id=gobutton value=Simpan>
					</div>";
			echo "</form>";

}
else if($op=="subelemenpostsimpan"){
        $idskema =$_POST['idskema'];
        $idunit=$_POST['idunit'];
        $idelemen= $_POST['idelemen'];
        $kodeelemen=trim($_POST['kodeelemen']);
		$jumlah = count($_POST['kodesubelemen']);
		echo $jumlah;	
		for($i=0; $i<$jumlah; $i++){
		$urut	= $i+1;
		$kodesubelemen	= $_POST['kodesubelemen'][$i];
		$pertanyaan	= $_POST['pertanyaan'][$i]; 
		//jika mau dimasukkan ke databases, silahkan buat query anda disini
		$query="insert into subelemen VALUE('','$idskema','$idunit','$idelemen','$kodesubelemen','$pertanyaan')";
		//echo $query;
		$hasil = mysql_query($query);
		}
		if($hasil){
			echo "Proses sukses...";}
		else{ echo"gagal";}

}

else if($op=="kelolasubelemen"){
		$idelemen= $_GET['idelemen'];
		$query0 ="SELECT * FROM elemen WHERE idelemen='$idelemen'";
		$hasil0 = mysql_query($query0);
		$data0 = mysql_fetch_array($hasil0);
		$namaelemen=$data0['namaelemen'];

?>
 Daftar Komponen dari elemen :<strong><?php echo $namaelemen ; ?></strong> 
	<table>
	<tr>
    <th bgcolor='#006699'>No</th>
    <!--<th bgcolor='#006699'>Id Sub</th>	
    <th bgcolor='#006699'>Id Skema</th>
    <th bgcolor='#006699'>Id Unit</th>
    <th bgcolor='#006699'>Id Elemen</th>-->
    <th bgcolor='#006699'>Kode Subelemen</th>   
    <th bgcolor='#006699'>Komponen</th>
    <th bgcolor='#006699'>Aksi</th>
	</tr>
 
<?php
// bagian ini digunakan untuk menampilkan semua data
 
	$no = 1;
	$query ="SELECT * FROM subelemen WHERE idelemen='$idelemen'";
	$hasil = mysql_query($query);
	while ($data = mysql_fetch_array($hasil))
	{

	   echo "<tr>";
	   echo "<td bgcolor='#99CCFF'>".$no."</td>";
	   //echo "<td bgcolor='#99CCFF'>".$data['idsubelemen']."</td>";
	   //echo "<td bgcolor='#99CCFF'>".$data['idskema']."</td>";
	   //echo "<td bgcolor='#99CCFF'>".$data['idunit']."</td>";
	   //echo "<td bgcolor='#99CCFF'>".$data['idelemen']."</td>";
	   echo "<td bgcolor='#99CCFF' align=left>".$data['kodesubelemen']."</td>";
	   echo "<td bgcolor='#99CCFF' align=left>".$data['pertanyaan']."</td>";
		
	   echo "<td><a href=\"".$_SERVER['PHP_SELF'].
			"?op=editpertanyaan&idsubelemen=".$data['idsubelemen']."\"><span class='glyphicon glyphicon-pencil'>Edit</a> | <a href=\"".$_SERVER['PHP_SELF'].
			"?op=deletekelolasubelemen&idsubelemen=".$data['idsubelemen']."\"><span class='glyphicon glyphicon-remove'>Hapus</a></td>";
	   echo "</tr>";
	   $no++;
     }
	echo "</table>";

}

else if($op=="deletekelolasubelemen"){
	$idsubelemen= $_GET['idsubelemen'];
   //echo $idelemen;
	$query = "SELECT * FROM subelemen WHERE idsubelemen = '$idsubelemen'";
	$hasil = mysql_query($query);
	$data  = mysql_fetch_array($hasil);
	$idsubelemen=$data['idsubelemen'];
	$pertanyaan=$data['pertanyaan'];
	$cekddapl2="select idsubelemen from apl2 where idsubelemen='$idsubelemen'";
	$cekddapl2a=mysql_query($cekddapl2);
	$cekddapl2b=mysql_num_rows($cekddapl2a);

   if($cekddapl2b>0)
   {
   	?>
    <div class="container">
        <div class="alert alert-warning">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Gagal hapus sub elemen..! Sub Elemen ini sudah di gunakan peserta di apl2 ....</strong>
        </div>
      </div> <?php

   }

   else {
 //echo "<form name='myform' method='post' action='".$_SERVER['PHP_SELF']."??op=edit'>";
   echo "<form id=formContoh method=\"post\" action=\"".$_SERVER['PHP_SELF'].
        "?op=deletepertanyaan\">";
         
          ?>
		<div class="formcolumn">
    	<div class="dynamiclabel">
    	<?php echo "Pertanyaan Ini Akan di hapus ? <strong>".$data['pertanyaan'];?></strong>
    	</div> 
		<div class="buttons">
        <?php 
        echo "<br /><input type=hidden name=idsubelemen value=".$idsubelemen.">";
		echo "<input type=submit id=gobutton value=Hapus>
	
        </div></div>";
          
echo "</form>";
echo "<br/><br/><br/><br/>"; 
}
}

else if($op=="deletepertanyaan"){
	$sql="DELETE from subelemen WHERE idsubelemen=".$_POST['idsubelemen'];
	mysql_query($sql);
}

else if ($op=="importelemen")
   {
    ?>
    <form class="form-horizontal" enctype="multipart/form-data" id="formContoh" method="POST" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=postuploadelemen\"";?>>
           
    <table class=demo-table>
    <tr><td>
    <label for="ieskema">Pilih Skema</label></td><td>
    <select id="ieskema" name="ieskema" placeholder="Skema" autofocus>
          <?php
          $tampilime="SELECT * FROM skema ORDER BY idskema";
          //echo $tampilkds;
          $tampilimae=mysql_query($tampilime);
		while($rime=mysql_fetch_array($tampilimae)){
          $idskemae=$rime['idskema'];
          echo "<option value='$idskemae'>".$rime['namaskema']." ->(".$idskemae.") </option>";
          }
          echo "</select></td></tr><tr><td>";
          echo "<label for='ieunit'>Pilih Unit</label></td><td>";
          echo "<select id='ieunit' name='ieunit' placeholder='Unit' >";
          $tampilue="select * from unit order by idunit";
          $tampiluea=mysql_query($tampilue);
      	  while($rimeu=mysql_fetch_array($tampiluea)){
          $ideu=$rimeu['idunit'];
          echo "<option value='$ideu'>".$rimeu['namaunit']." ->(".$ideu.") </option>";
          }
        
           ?>  
				</select></td></tr><tr><td colspan="2">         
                <div class="form-group">
                <label class="control-label col-lg-4">Upload User file Excel </label>
                <div class="col-lg-8"><input name=uploadedfile type="file" >
                <?php echo "<input type=submit  class='btn btn-success btn-line' value=Upload&nbsp;File />"; ?></div>
                </div>
                </form>
                </td></tr>
    <?php
		echo "</td></tr></table>";
   }
else if ($op=="postuploadelemen")
{

	 include "excel_reader2.php";
		$data = new Spreadsheet_Excel_Reader($_FILES['uploadedfile']['tmp_name']);
		$baris = $data->rowcount($sheet_index=0);
		$sukses = 0;
		$gagal = 0;
		$gagald= 0;
		$nmdup='';
		$ieskema=$_POST['ieskema'];
		$ieunit=$_POST['ieunit'];
		for ($i=2; $i<=$baris; $i++)
		{
		   $no=1;
		// membaca data nim (kolom ke-1)
		//$kelompok = $data->val($i, 1);
		   $kdel = $data->val($i, 2);
		   $nmel = $data->val($i, 3);
		   //$ket = $data->val($i, 4);
			if(empty($kdel)){
			  $baris=$i;
			  }else {
		   $cekdataelemen="select kodeelemen from elemen where kodeelemen='$kdel'";
		   //echo $cekdataelemen;
		   $cekdataelemena=mysql_query($cekdataelemen);
		   $cekdataelemenb=mysql_num_rows($cekdataelemena);
		   //echo "ksdjskd".$cekdataunitb;
		  if($cekdataelemenb>0)
		  {
         $kodeel3=$kodeel3." ".$kdel;
        //$gagald++;
		  } 
      else 
      {
       
		$queryielemen="insert into elemen values ('','$ieskema','$ieunit','$kdel','$nmel')";
		//echo $queryielemen;
		$hasilel = mysql_query($queryielemen); 
      }

    } 
   
    // jika proses insert data sukses, maka counter $sukses bertambah
    // jika gagal, maka counter $gagal yang bertambah
    if ($hasilel) $sukses++;
    else $gagal++;
   }
    echo "<h3><font color=green>Proses import data selesai.</h3>";
    echo "<p>Jumlah data yang sukses diimport : ".$sukses."</font><br>";
    echo "<font color=red>Jumlah data yang gagal diimport : ".$gagal."<br>";
    echo "duplikat kode elemen" .$kodeel3."</font></p>";   
	//echo "ok";
}

else if($op=="importsubelemen")
{
    ?>
    <form class="form-horizontal" enctype="multipart/form-data" id="formContoh" method="POST" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=postuploadsubelemen\"";?>>
           
    <table class=demo-table>
    <tr><td>
    <label for="iesubskema">Pilih Skema</label></td><td>
    <select id="iesubskema" name="iesubskema" placeholder="Skema" autofocus>
          <?php
          $tampilimsube="SELECT * FROM skema ORDER BY idskema";
          //echo $tampilkds;
          $tampilimasube=mysql_query($tampilimsube);
		while($rimsube=mysql_fetch_array($tampilimasube)){
          $idskemasube=$rimsube['idskema'];
          echo "<option value='$idskemasube'>".$rimsube['namaskema']." ->(".$idskemasube.") </option>";
          }
          echo "</select></td></tr><tr><td>";  
          echo "<label for='iesubunit'>Pilih Unit</label></td><td>";
          echo "<select id='iesubunit' name='iesubunit' placeholder='Unit' >";
          $tampilusube="select * from unit order by idunit";
          $tampilusubea=mysql_query($tampilusube);
      	  while($rimsubeu=mysql_fetch_array($tampilusubea)){
          $idsubeu=$rimsubeu['idunit'];
          echo "<option value='$idsubeu'>".$rimsubeu['namaunit']." ->(".$idsubeu.")</option>";
          }
          echo "</select></td></tr><tr><td>";
          echo "<label for='ielemen'>Pilih Elemen</label></td><td>";
          echo "<select id='ielemen' name='ielemen' placeholder='Elemen' >";
          $tampilelemen="select * from elemen order by idelemen";
          $tampilelemena=mysql_query($tampilelemen);
      	  while($rimelemen=mysql_fetch_array($tampilelemena)){
          $idelemen=$rimelemen['idelemen'];
          echo "<option value='$idelemen'>".$rimelemen['namaelemen']." ->(".$idelemen.") </option>";
          }        
           ?>  
				</select></td></tr><tr><td colspan="2">         
                <div class="form-group">
                <label class="control-label col-lg-4">Upload  Dari File Excel </label>
                <div class="col-lg-8"><input name=uploadedfile type="file" >
                <?php echo "<input type=submit  class='btn btn-success btn-line' value=Upload&nbsp;File />"; ?></div>
                </div>
                </form>
                </td></tr>
    <?php
    echo "</td></tr></table>";
}

else if ($op=="postuploadsubelemen")
{

	 include "excel_reader2.php";
		$data = new Spreadsheet_Excel_Reader($_FILES['uploadedfile']['tmp_name']);
		$baris = $data->rowcount($sheet_index=0);
		$sukses = 0;
		$gagal = 0;
		$gagald= 0;
		$nmdup='';
		$isubeskema=$_POST['iesubskema'];
		$isubeunit=$_POST['iesubunit'];
		$isubelemen=$_POST['ielemen'];
		for ($i=2; $i<=$baris; $i++)
		{
		   $no=1;
		// membaca data nim (kolom ke-1)
		//$kelompok = $data->val($i, 1);
		   $kdsubel = $data->val($i, 2);
		   $nmsubel = $data->val($i, 3);
		   //$ket = $data->val($i, 4);
			if(empty($kdsubel)){
			  $baris=$i;
			  }else {
		   $cekdatasubelemen="select kodesubelemen from subelemen where kodesubelemen='$kdsubel'";
		   //echo $cekdataelemen;
		   $cekdatasubelemena=mysql_query($cekdatasubelemen);
		   $cekdatasubelemenb=mysql_num_rows($cekdatasubelemena);
		   //echo "ksdjskd".$cekdataunitb;
		  if($cekdatasubelemenb>0)
		  {
			 $kodesubel3=$kodesubel3." ".$kdsubel;
			//$gagald++;
		  } 
		  else 
		  {
		$queryisubelemen="insert into subelemen values ('','$isubeskema','$isubeunit','$isubelemen','$kdsubel','$nmsubel')";
		//echo $queryisubelemen;
		$hasilsubel = mysql_query($queryisubelemen); 
		   }
    } 
   
    // jika proses insert data sukses, maka counter $sukses bertambah
    // jika gagal, maka counter $gagal yang bertambah
    if ($hasilsubel) $sukses++;
    else $gagal++;
    
    
  
   }
    echo "<h3><font color=green>Proses import data selesai.</h3>";
    echo "<p>Jumlah data yang sukses diimport : ".$sukses."</font><br>";
    echo "<font color=red>Jumlah data yang gagal diimport : ".$gagal."<br>";
    echo "duplikat kode elemen" .$kodesubel3."</font></p>";
}
?>


<body>

<?php echo "<a href=\"".$_SERVER['PHP_SELF'].
        "?op=tambah\" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'></span>Tambah Elemen</a>";?>
<?php echo "<a href=\"".$_SERVER['PHP_SELF'].
        "?op=importelemen\" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'></span>Import Excel elemen</a>";?>
<?php echo "<a href=\"".$_SERVER['PHP_SELF'].
        "?op=importsubelemen\" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'></span>Import Excel subelemen</a>";?>

<table class=demo-table><thead>
<tr>
    <th width = 5% bgcolor='#006699'>No</th>
    <th width = 5% bgcolor='#006699'>ID elemen</th>	
    <th width = 8% bgcolor='#006699'>Kode Elemen</th>
    <th width = 40% bgcolor='#006699'>Nama Elemen</th>
    <th width = 12% bgcolor='#006699'>Kode Unit / Jumlah Sub Elemen</th>
    <th colspan=4 bgcolor='#006699'>Aksi</th>
</tr></thead>
 
<?php
 
// bagian ini digunakan untuk menampilkan semua data
 

$no = 1;
$query ="SELECT elemen.idunit,elemen.kodeelemen,elemen.namaelemen,elemen.idelemen,unit.kodeunit FROM elemen inner join unit on elemen.idunit=unit.idunit order by unit.kodeunit";
$hasil = mysql_query($query);
while ($data = mysql_fetch_array($hasil))
{
   $cekjumsube="select count(idelemen) as jsubel from subelemen where idelemen='".$data['idelemen']."'";
   //echo $cekjumsube;
   $cekjumsubea=mysql_query($cekjumsube);
   $cekjumsubeb=mysql_fetch_array($cekjumsubea);

   echo "<tr>";
   echo "<td bgcolor='#99CCFF'>".$no."</td>";
   echo "<td bgcolor='#99CCFF'>".$data['idelemen']."</td>";
   echo "<td bgcolor='#99CCFF' align=left>".$data['kodeelemen']."</td>";
   echo "<td bgcolor='#99CCFF' align=left width=30%>".$data['namaelemen']."</td>";
   echo "<td bgcolor='#99CCFF' align=left>".$data['idunit']."->".$data['kodeunit']." / ".$cekjumsubeb['jsubel']."</td>";
   //echo "<td bgcolor='#99CCFF' align=left>".$cekjumsubeb['jsubel']."</td>";
   echo "<td><a href=\"".$_SERVER['PHP_SELF'].
        "?op=kelolasubelemen&idelemen=".$data['idelemen']."\" <span class='glyphicon glyphicon-list-alt'>Kelola Sub</a>
  	</td>";
   echo "<td><a href=\"".$_SERVER['PHP_SELF'].
        "?op=edit&idelemen=".$data['idelemen']."\"><span class='glyphicon glyphicon-pencil'>Edit</a> | <a href=\"".$_SERVER['PHP_SELF'].
        "?op=delete&idelemen=".$data['idelemen']."\"><span class='glyphicon glyphicon-remove'>Hapus</a> | <a href=\"".$_SERVER['PHP_SELF'].
        "?op=subelemen&idelemen=".$data['idelemen']."\" <span class='glyphicon glyphicon-plus'>Tambah Sub</a></td>";
   echo "</tr>";
   $no++;
}
   echo "</table></div>";
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
