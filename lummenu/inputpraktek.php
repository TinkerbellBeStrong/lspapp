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
<link href='../css/tombol.css' rel='stylesheet' type='text/css'>
<script src="js/lumino.glyphs.js"></script>

<script src="../js/jquery-2.2.3.min.js"></script>
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
if ($_SESSION['level'] != 'lsp') {
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
  width: 800px;
  font-size: 14px;
  padding: 7px;
  border: 1px solid #c3c3c3;
  border-radius: 7px;
  
}

form div.dynamiclabel textarea{
	height: 100px;
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
			<li><a href="inputskema.php"><svg class="glyph stroked paperclip"><use xlink:href="#stroked-paperclip"/></svg> Kelola Skema</a></li>
			<li><a href="inputunit.php"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg> Kelola Unit</a></li>
			<li><a href="inputasesor.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Kelola Asesor</a></li>
			<li><a href="inputpeserta.php"><svg class="glyph stroked female user"><use xlink:href="#stroked-female-user"/></svg>Kelola Peserta</a></li>
			<li><a href="inputelemen.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"/></svg> Kelola Komptetensi</a></li>
			<li><a href="inputtempattuk.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg> Kelola Tempat TUK</a></li>
			<li><a href="inputsyarat.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg> Input Persyaratan</a></li>
			<li><a href="inputkumpan.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Input Umpan Balik</a></li>
			<li><a href="inputprosesasesmen.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Input Proses Asesmen</a></li>
			<li><a href="inputpengurus.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Input Pengurus</a></li>
			<li><a href="mapa.php"><svg class="glyph stroked paperclip"><use xlink:href="#stroked-paperclip"/></svg> MAPA</a></li>
			<li><a href="settanggal.php"><svg class="glyph stroked clock"><use xlink:href="#stroked-clock"/></svg> SET Tanggal</a></li>
			<li><a href="pemetaanasesor.php"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"/></use></svg> Atur jadwal</a></li>
			<li class="active"><a href="inputpraktek.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>FR.IA.01 Ceklist Observasi</a></li>
			<li><a href="inputtestulis.php"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>FR.IA.05 Pertanyaan Tertulis</a></li>
			<li><a href="validasiapl1lsp.php"><svg class="glyph stroked usb flash drive"><use xlink:href="#stroked-usb-flash-drive"/></svg> Validasi APL1</a></li>
			<li><a href="monitorasesi.php"><svg class="glyph stroked desktop computer and mobile"><use xlink:href="#stroked-desktop-computer-and-mobile"/></svg> Monitoring</a></li>
			<li><a href="backupdata.php"><svg class="glyph stroked download"><use xlink:href="#stroked-download"/></svg> Backup data</a></li>
			<li role="presentation" class="divider"></li>
			<li><a href="../logout.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg> Logout</a></li>
		</ul>

	</div><!--/.sidebar-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<h4>Kelola Data Obsenvasi </h4>
                        
</div><!--/.row-->		
		<!--/.row-->
		<div class="row">
			<div class="col-lg-12">
<!--data nu baru -->
<?php
$op = $_GET['op'];
 
if ($op == "editprk")
{
   // proses untuk menampilkan data yang akan diedit pada form
   $idpraktek= $_GET['idpraktek'];
   $queryeditprk = "SELECT * FROM praktek WHERE idpraktek = '$idpraktek'";
   $hasileditprk = mysql_query($queryeditprk);
   $dataeditprk  = mysql_fetch_array($hasileditprk);
   //$idskema=$data['idskema'];
   //$idunit =$data['idunit'];
   $instruksi=$dataeditprk['instruksi'];
   $observasi=$dataeditprk['obervasi'];
   //$ket=$data['keterangan'];
   //$status=$data['status'];
	//echo "<form name='myform' method='post' action='".$_SERVER['PHP_SELF']."??op=edit'>";
	echo "<form method=\"post\" action=\"".$_SERVER['PHP_SELF'].
        "?op=updateprk\">";
	echo "<table border=\"0\">";
   ?>
	<div class="formcolumn">
	<div class="dynamiclabel">
    <input id="instruksi" name="instruksi" placeholder="instruksi" type="text" value="<?php echo $instruksi;?> ">
	<label for="instruksi">Instruksi </label>
	</div>
   	<div class="dynamiclabel">
    <textarea id="observasi" name="observasi" placeholder="observasi"><?php echo $observasi;?></textarea>
    <label for="observasi">Observasi </label>
   	</div>
   	
		<?php
   		echo "</table>";
   		echo "<input type=\"hidden\" name=\"idprk\"
         value=\"".$dataeditprk['idpraktek']."\">";
   		//echo "<input type=\"hidden\" name=\"idunit\"value=\"".$data['idunit']."\">";
		?>
		<div class="buttons">
		<input id="gobutton" type="submit" value="Simpan " />
		</div>
		<?php
		echo "</br>";      
		echo "</form>";
	}
	
else if ($op == "updateprk")
     {
       // proses untuk updating data setelah diedit
        $idprk = $_POST['idprk'];
        $instruksi=$_POST['instruksi'];
        $observasi= $_POST['observasi'];
       	$queryuprk = "UPDATE praktek SET instruksi='$instruksi',obervasi='$observasi' WHERE idpraktek = '$idprk'"; 
        //echo $query;
       	$hasiluprk = mysql_query($queryuprk);
        if ($hasiluprk) { echo"<script>alert('Sukses ..!');history.go(-2);</script>";}
			else{echo"<script>alert('Gagal ..!');history.go(-1);</script>";}
		}
else if ($op == "deleteprk"){
   		$idprk= $_GET['idpraktek'];
   		$querydprk = "SELECT * FROM praktek WHERE idpraktek = '$idprk'";
   		$hasildprk = mysql_query($querydprk);
   		$dataprk  = mysql_fetch_array($hasildprk);
	    $observasi=$dataprk['obervasi'];
	    //$namaunit=$data['namaunit'];
		//echo "<form name='myform' method='post' action='".$_SERVER['PHP_SELF']."??op=edit'>";
	    echo "<form method=\"post\" action=\"".$_SERVER['PHP_SELF'].
		    "?op=deletepostprk\">";
		     echo "<center><input type=text name=idpraktek value=".$idprk."></br>Yakin ID ini Akan di hapus ???</center>";
          ?>
	 	<div class="formcolumn">  
   	 	</div>
     	<div class="buttons">
        <?php
       	echo "<input type=submit id=gobutton value=Delete>
        </div> 
        </div>";
          
	echo "</form>";
	echo "<br/><br/><br/>"; 
	} 

else if ($op == "deletepostprk"){
		$sql="DELETE from praktek WHERE idpraktek=".$_POST['idpraktek'];
		$ok=mysql_query($sql);
		if ($ok) { echo"<script>alert('Sukses ..!');history.go(-2);</script>";}
			else{echo"<script>alert('Gagal ..!');history.go(-1);</script>";}
		}

else if($op=="listobser"){
	$kodeunit=trim($_GET['kdunit']); 
?>
    
    <button type="button" class="btn btn-primary" onclick="window.print()">Print Halaman Ini</button>
    
	<table ><tr><td colspan=6>EDITING ....</td></tr>
    <th bgcolor='#006699'>No</th>
    <th bgcolor='#006699'>Id Skema</th>	
    <th bgcolor='#006699'>Kode Unit</th>
    <th bgcolor='#006699'>Intruksi</th>
    <th bgcolor='#006699'>Observasi</th>
    <th bgcolor='#006699'>Aksi</th>
	</tr>
 
	<?php
// bagian ini digunakan untuk menampilkan semua data
	$no = 1;
	$querypr ="SELECT * FROM praktek where kodeunit='$kodeunit'";
	$hasilpr = mysql_query($querypr);
	while ($datapr = mysql_fetch_array($hasilpr))
		{
		$sta=$data['status'];
			if($sta=='Y'){
   				$st="Aktif";
   			}else{ 
				$st="Belum Aktif";}
		   echo "<tr>";
		   echo "<td>".$no."</td>";
		   echo "<td>".$datapr['idskema']."</td>";
		   echo "<td align=left>".$datapr['kodeunit']."</td>";
		   echo "<td align=left>".$datapr['instruksi']."</td>";
		   echo "<td align=left>".$datapr['obervasi']."</td>";
		   echo "<td><a href=\"".$_SERVER['PHP_SELF'].
					"?op=editprk&idpraktek=".$datapr['idpraktek']."\"><img src=../images/edit.png>Edit</a>|<a href=\"".$_SERVER['PHP_SELF'].
        "?op=deleteprk&idpraktek=".$datapr['idpraktek']."\"><img src=../images/delete.png>Hapus</a></td>";
		   echo "</tr>";
			   $no++;
		}
		echo "</div>";
	
}

else if($op=="importprk"){
	echo"<table><tr>";

	echo "<form enctype=multipart/form-data action=uploadprk.php method=POST>
	</br><strong>Masukan File Soal Yang Mau di UPLOAD dengan format (XLS): </strong><input name=uploadedfile type=file /></br>
	<input type=submit id=gobutton value=Upload File />
	</form></div>";
	echo "</br>";
}

else if($op=="batalprk"){
?>
	<form id="formContoh" method="POST" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=hapusprk\"";?>> 
	<div class="form-group"><strong>Kode Unit :</strong>
	<select id="kodeunit" name="kodeunit" placeholder="Kode Unit" autofocus>
	<?php
	$tampilunit="select kodeunit from praktek group by kodeunit";
    $execunit=mysql_query($tampilunit);
      //echo $tampiltgl;
		while($runit=mysql_fetch_array($execunit))
		{
         //echo "ll";
   		 echo "<option value=$runit[kodeunit] selected>$runit[kodeunit] </option> ";
		}
?>
	 </select>
	</div>
	<input type="submit" id="gobutton" value="Lanjutkan" class="button"> 
<?php

}

else if($op=="hapusprk"){
	$kodeunit=$_POST['kodeunit'];
	$sqldel="delete from praktek where kodeunit='$kodeunit'";
	//echo $sqldel;
	$execdel=mysql_query($sqldel);
	if($execdel) echo " Penghapusan .. Selesai";
}

else if($op=="hasiltesprk")
{
echo "<strong>";
  echo "<form method=POST action='daftarnilaiprk.php'>
    Filter Tanggal :<select name =tgl id=tgl >";
	$listmodul=mysql_query("SELECT tanggal FROM rekappraktek group by tanggal desc");
	 while($list=mysql_fetch_array($listmodul)){ 
        echo " <option value=$list[tanggal]> $list[tanggal] </option>";
     } 
	 echo"</select></br>
		<input type=submit id=gobutton name=dsubmit value=Lanjutkan>
		</form>";
		echo "</strong>";
}

?>


<body>
	<?php //echo "<a href=\"".$_SERVER['PHP_SELF'].
        //"?op=tambah&kd_modul=".$data['kd_modul']."\" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'>Tambah</a>";
		echo " <a href=\"".$_SERVER['PHP_SELF'].
        "?op=importprk&email=".$data['email']."\" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'><strong>Upload</strong> </a>";
		echo " <a href=\"".$_SERVER['PHP_SELF'].
        "?op=batalprk&email=".$data['email']."\" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'><strong>Batal </strong> </a>";
		echo " <a href=\"".$_SERVER['PHP_SELF'].
        "?op=hasiltesprk&email=".$data['email']."\"  class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'><strong>Hasil TES </strong> </a>";?>
    <table class=demo-table ><tr>
    <th bgcolor='#006699'>No</th>
    <th bgcolor='#006699'>Id Skema</th>	
    <th bgcolor='#006699'>Kode Unit</th>
    <th bgcolor='#006699'>Nama unit</th>
    <th bgcolor='#006699'></th>
    <!--<th bgcolor='#006699'>Aksi</th>-->
	</tr>
 
	<?php
 
// bagian ini digunakan untuk menampilkan semua data
 
	$no = 1;
	$queryprkmain ="SELECT * FROM unit";
	$hasilprkmain = mysql_query($queryprkmain);
	while ($dataprkmain = mysql_fetch_array($hasilprkmain))
		{
		$sta=$dataprkmain['status'];
			if($sta=='Y'){
   				$st="Aktif";
   			}else{ 
				$st="Belum Aktif";}
			   echo "<tr>";
			   echo "<td bgcolor='#99CCFF'>".$no."</td>";
			   echo "<td bgcolor='#99CCFF'>".$dataprkmain['idskema']."</td>";
			   echo "<td bgcolor='#99CCFF'> <a href=\"".$_SERVER['PHP_SELF'].
				"?op=listobser&kdunit=".$dataprkmain['kodeunit']."\">".$dataprkmain['kodeunit']."</a></td>";
			   echo "<td bgcolor='#99CCFF'>".$dataprkmain['namaunit']."</td>";
			   echo "<td></td>";
			   // echo "<td><a href=\"".$_SERVER['PHP_SELF'].
				//		"?op=edit&idunit=".$data['idunit']."\"><img src=../images/edit.png>Edit</a>|<a href=\"".$_SERVER['PHP_SELF'].
				//"?op=delete&idunit=".$data['idunit']."\"><img src=../images/delete.png>Hapus</a></td>";
				echo "</tr>";
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
<?php } 
   }
 ?>
