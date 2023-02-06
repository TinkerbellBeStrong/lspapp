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
			<li><a href="inputpraktek.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>FR.IA.01 Ceklist Observasi</a></li>
			<li class="active"><a href="inputtestulis.php"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>FR.IA.05 Pertanyaan Tertulis</a></li>
			<li><a href="validasiapl1lsp.php"><svg class="glyph stroked usb flash drive"><use xlink:href="#stroked-usb-flash-drive"/></svg> Validasi APL1</a></li>
			<li><a href="monitorasesi.php"><svg class="glyph stroked desktop computer and mobile"><use xlink:href="#stroked-desktop-computer-and-mobile"/></svg> Monitoring</a></li>
			<li><a href="backupdata.php"><svg class="glyph stroked download"><use xlink:href="#stroked-download"/></svg> Backup data</a></li>
			<li role="presentation" class="divider"></li>	
			<li><a href="../logout.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg> Logout</a></li>
		
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<h4>FR-MPA 03 Tes tulis </h4>
                        
</div><!--/.row-->
					
		<!--/.row-->
				
		<div class="row">
			<div class="col-lg-12">
<!--data nu baru -->
<?php
$op = $_GET['op'];
 
if ($op == "edittulis")
{
	$edit=mysql_query("SELECT * FROM pertanyaan WHERE question_id=".$_GET['idq']);
	$row=mysql_fetch_array($edit);
	//<tr><td>RePassword</td><td>:		<input type=text name=rpassword></td></tr>
	echo "
        <table width=100%>"; ?>
<?php echo "
    
	<form method=POST action=updatesoaltulis.php>
	<input type=hidden name=kodelama value='$row[question_id]'>
        <input type=hidden name=kodesoal value='$row[kd_modul]'>";
	

        $kdm=$row["kd_modul"];
        echo"
	<tr><th colspan=3>Pertanyaan </th></tr>

<tr><td colspan=3><textarea name=pertanyaan id=pertanyaan rows=4 cols=120>$row[question]</textarea></td></tr>
";

  	$id = $row["question_id"]; 
	$kd_modul=$row["kd_modul"];
	$question = $row["question"]; 
	$oa=$row["oa"];
	$ob=$row["ob"];
	$oc=$row["oc"];
	$od=$row["od"];
	$oe=$row["oe"];	
	$alt_5=$row["answer"];
	$alt_1=$row["alt_1"];
	$alt_2=$row["alt_2"];
	$alt_3=$row["alt_3"];
	$alt_4=$row["alt_4"];
    $alt_6=$row["njawab"];
       
	echo "<tr><th> Jawaban</th></tr>
	<tr><td colspan=3><textarea name=jawaban rows=4 cols=120>$row[answer]</textarea></td></tr>
	";
	echo "<tr><th> Option1</th></tr>
	<tr><td colspan=3><textarea name=alt_1 rows=4 cols=120>$row[alt_1]</textarea></td></tr>
	";
	echo "<tr><th> Option2</th></tr>
	<tr><td colspan=3><textarea name=alt_2 rows=4 cols=120>$row[alt_2]</textarea></td></tr>
	";
	echo "<tr><th> Option3</th></tr>
	<tr><td colspan=3><textarea name=alt_3 rows=4 cols=120>$row[alt_3]</textarea></td></tr>
	";
	echo "<tr><th> Option4</th></tr>
	<tr><td colspan=3><textarea name=alt_4 rows=4 cols=120>$row[alt_4]</textarea></td></tr>
	";
	echo"
                <tr><th colspan=2>
                <input  id=gobutton name=dsubmit type=submit value=UBAH>
		<input  id=gobutton nama=dbantal type=button value=BATAL onclick=self.history.back()></th></tr>
	</table>
	</form></div>";


	}
	
else if ($op == "updateprk")
     {
 
       // proses untuk updating data setelah diedit
        $idprk = $_POST['idprk'];
        $instruksi=$_POST['instruksi'];
        $observasi= $_POST['observasi'];
        //$skema=$_POST['skema'];
        //$ket=$_POST['ket'];
        //if($kodeunit == $kodeunitLama){
	  
		$query = "UPDATE praktek SET instruksi='$instruksi',obervasi='$observasi' WHERE idpraktek = '$idprk'"; 
        //echo $query;
        $hasil = mysql_query($query);
   
        if ($hasil) { echo"<script>alert('Sukses ..!');history.go(-2);</script>";}
		else{echo"<script>alert('Gagal ..!');history.go(-1);</script>";}
   }
   
else if ($op == "deletetulis"){
   		$idprk= $_GET['idtulis'];
   		$query = "SELECT * FROM pertanyaan WHERE question_id = '$idprk'";
   		$hasil = mysql_query($query);
   		$data  = mysql_fetch_array($hasil);
	    $observasi=$data['obervasi'];
	    //$namaunit=$data['namaunit'];
		//echo "<form name='myform' method='post' action='".$_SERVER['PHP_SELF']."??op=edit'>";
	    echo "<form method=\"post\" action=\"".$_SERVER['PHP_SELF'].
		    "?op=deleteposttulis\">";
		echo "<center><input type=text name=idtulis value=".$idprk."></br>Yakin ID ini Akan di hapus ???</center>";
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

else if ($op == "deleteposttulis"){
		$sql="DELETE from pertanyaan WHERE question_id=".$_POST['idtulis'];
		$ok=mysql_query($sql);
		if ($ok) { echo"<script>alert('Sukses ..!');history.go(-2);</script>";}
		else{echo"<script>alert('Gagal ..!');history.go(-1);</script>";}
	}

else if($op=="listtulis"){
$kodeunit=$_GET['kdunit']; 
?>

	<table ><tr><td colspan=6>EDITING ....</td></tr>
    <th bgcolor='#006699'>No</th>
    <th bgcolor='#006699'>Id </th>	
    <th bgcolor='#006699'>Kode Unit</th>
    <th bgcolor='#006699'>Intruksi</th>
    <th bgcolor='#006699'>Aksi</th>
	</tr>
 
	<?php
 
// bagian ini digunakan untuk menampilkan semua data
 
	$no = 1;
	$querypr ="SELECT * FROM pertanyaan where kd_modul='$kodeunit'";
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
		   echo "<td>".$datapr['question_id']."</td>";
		   echo "<td align=left>".$datapr['kd_modul']."</td>";
		   echo "<td align=left>".$datapr['question']."</td>";		   
		   echo "<td><a href=\"".$_SERVER['PHP_SELF'].
					"?op=edittulis&idq=".$datapr['question_id']."\"><img src=../images/edit.png>Edit</a>|<a href=\"".$_SERVER['PHP_SELF'].
        "?op=deletetulis&idtulis=".$datapr['question_id']."\"><img src=../images/delete.png>Hapus</a></td>";
		   echo "</tr>";
			   $no++;
		}
	   echo "</div>";
	
}

else if($op=="importprk"){
	
	echo"<table><tr>";
	echo "<form enctype=multipart/form-data action=uploadtulis.php method=POST>
	</br><strong>Masukan File Soal TES tulis Yang Mau di UPLOAD dengan format (XLS): </strong><input name=uploadedfile type=file /></br>
	<input type=submit id=gobutton value=Upload File />
	</form></div>";

}

else if($op=="bataltulis"){
?>
	<form id="formContoh" method="POST" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=hapustulis\"";?>> 
	<div class="form-group"><strong>Kode Soal :</strong>
	<select id="kodeunit" name="kodeunit" placeholder="Kode Soal" autofocus>
<?php
	$tampilunit="select kd_modul from pertanyaan group by kd_modul";
      $execunit=mysql_query($tampilunit);
      //echo $tampiltgl;
		while($runit=mysql_fetch_array($execunit))
		{
            //         echo "ll";
   				echo "<option value=$runit[kd_modul] selected>$runit[kd_modul] </option> ";
		}
?>
	</select>
	</div>
	<div class="form-group"><strong>Kode Unit :</strong>
	<select id="kodeperunit" name="kodeperunit" placeholder="Kode Unit" autofocus>
<?php
	$tampilunital="select unitalias from pertanyaan group by unitalias";
      $execunital=mysql_query($tampilunital);
      //echo $tampiltgl;
		while($runital=mysql_fetch_array($execunital))
		{
                //         echo "ll";
   				echo "<option value=$runital[unitalias] selected>$runital[unitalias] </option> ";
					}
?>
	</select>
	</div>


	<input type="submit" id="gobutton" value="Lanjutkan" class="button"> 
<?php

}

else if($op=="hapustulis"){
//$kodeunit=$_POST['kodeunit'];
	$kdmodul = $_POST['kodeunit'];
	$kdunitalias=$_POST['kodeperunit'];
	$cekdata="select kd_modul from pertanyaan where kd_modul='$kdmodul' and unitalias='$kdunitalias'";
	$ketemu=mysql_query($cekdata);
	if(mysql_num_rows($ketemu)>0){
	mysql_query("delete from pertanyaan where kd_modul='$kdmodul' and unitalias='$kdunitalias'");
	mysql_query("delete from tbloption where kd_modul='$kdmodul' and tunitalias='$kdunitalias'");
	echo"<script>alert('Sukses ..!');history.go(-2);</script>";
	}else {
	echo"<script>alert('Gagal ..!');history.go(-2);</script>";}


}

else if($op=="uploadgbrtulis"){
?>
<form name="contoh" method="post" action="uploadgambart.php" enctype="multipart/form-data" id="form-upload">
		<input type="file" accept="image/*" name="foto[]" multiple />
		<input type="submit" id="gobutton" value="Upload">
</form>
<?php
}
else if($op=="uploadmodul"){
	echo "<form enctype=multipart/form-data action=postuploadmodul.php method=POST>
	</br><strong>Masukan file kode soal yang akan diupload (xls):</strong></br> <input name=uploadedfile type=file /><br />
	<input type=submit value=Upload File />
	</form>";
}

else if ($op == "editmodul")
{
   // proses untuk menampilkan data yang akan diedit pada form
   $kd_modul = $_GET['id'];
   $queryeditm = "SELECT * FROM modul WHERE id = '$kd_modul'";
   $hasileditm = mysql_query($queryeditm);
   $dataeditm  = mysql_fetch_array($hasileditm);
 //echo "<form name='myform' method='post' action='".$_SERVER['PHP_SELF']."??op=edit'>";
   echo "<form method=\"post\" action=\"".$_SERVER['PHP_SELF'].
        "?op=update\">";
   echo "<table border=\"0\">";
   echo "<tr>
           <th colspan=2 bgcolor='#99CCFF'>Editing ...
           <input type=\"hidden\" name=\"kd_modul\"
               value=\"".$dataeditm['id']."\"></th>
         </tr>";
   echo "<tr>
         <th bgcolor='#99CCFF'>Modul</th>
         <th><input type=\"text\" name=\"modul\"
              value=\"".$dataeditm['modul']."\"></th></tr>";
	echo "<tr>
         <th bgcolor='#99CCFF'>Jumlah Soal</th>
         <th><input type=\"text\" name=\"jumlah_soal\"
              value=\"".$dataeditm['jumlah_soal']."\"></th></tr>";
	echo "<tr>
         <th bgcolor='#99CCFF'>Status Soal</th>
         <th><input type=\"text\" name=\"status_soal\"
              value=\"".$dataeditm['status_soal']."\"></th></tr>";
	echo "<tr>
         <th bgcolor='#99CCFF'>Waktu (Menit)</th>
         <th><input type=\"text\" name=\"Waktu\"
              value=\"".$dataeditm['Waktu']."\"></th></tr>";
	 echo "<tr>
         <th bgcolor='#99CCFF'>Batas (kali)</th>
         <th><input type=\"text\" name=\"batas\"
              value=\"".$dataeditm['batas']."\"></th></tr>";
     echo "<tr>
         <th bgcolor='#99CCFF'>KKM</th>
         <th><input type=\"text\" name=\"kkm\"
              value=\"".$dataeditm['kkm']."\"></th></tr>";
	echo "<tr>
         <th bgcolor='#99CCFF'>Tanggal</th>
         <th><input type=\"text\" name=\"tanggal\"
              value=\"".$dataeditm['tanggal']."\"></th></tr>";
	echo "<tr>
         <th bgcolor='#99CCFF'>Mulai</th>
         <th><input type=\"text\" name=\"btsawal\"
              value=\"".$dataeditm['btsawal']."\"></th></tr>";
	echo "<tr>
         <th bgcolor='#99CCFF'>Selesai</th>
         <th><input type=\"text\" name=\"btsakhir\"
              value=\"".$dataeditm['btsakhir']."\"></th></tr>";
	echo "</table>";
	//echo "<input type=\"hidden\" name=\"kd_modulLama\"
      //   value=\"".$data['kd_modul']."\">";
	//echo "<input type=\"submit\" name=\"submit\"
     //    value=\"Simpan Perubahan\">";
    echo "<input id=gobutton type=submit value=Simpan>";
   echo "</form>";
}

else if ($op == "update")
     {
 
       // proses untuk updating data setelah diedit
        $id = $_POST['kd_modul'];
        $modul= $_POST['modul'];
		$jumlah= $_POST['jumlah_soal'];
		$status= $_POST['status_soal'];
		$waktu= $_POST['Waktu'];
		$batas= $_POST['batas'];
		$kkm=$_POST['kkm'];
        $tanggal=$_POST['tanggal'];
        $btsawal=$_POST['btsawal'];
        $btsakhir=$_POST['btsakhir'];
		
        //$kd_modulLama = $_POST['id'];
        $queryumodul = "UPDATE modul SET modul = '$modul', jumlah_soal='$jumlah', status_soal='$status', Waktu='$waktu',batas='$batas',kkm='$kkm',tanggal='$tanggal',btsawal='$btsawal',btsakhir='$btsakhir'
                  WHERE id = '$id'"; 
        $hasilumodul = mysql_query($queryumodul);
        
        if ($hasilumodul) echo "Proses Update Sukses";
        else echo "<p>Proses Update Gagal</p>";
     }
	 
else if($op=="hasiltes")
{
	echo "<strong>";
	echo "<form method=POST action='daftarnilai.php'>
        Filter Tanggal :<select name =tgl id=tgl >";
	$listmodul=mysql_query("SELECT tanggal FROM grade group by tanggal desc");
			  while($list=mysql_fetch_array($listmodul)){ 
				echo " <option value=$list[tanggal]> $list[tanggal] </option>";
				} echo"</select></br>
	<input type=submit id=gobutton name=dsubmit value=Lanjutkan>
    </form>";
	echo "</strong>";
}

else if($op=="updatestatus")
{
	$kd_mdl = $_GET['id'];
	$queryust = "SELECT * FROM modul WHERE id = '$kd_mdl'";
	$hasilust = mysql_query($queryust);
	$dataust  = mysql_fetch_array($hasilust);
	$st=strtoupper($dataust['status_soal']);
	//echo $st;
	if($st=='AKTIF'){
      $sbaru='Tidak Aktif';}
    else {
      $sbaru='aktif';}
	$sqlustu="update modul set status_soal='$sbaru' where id='$kd_mdl'";
	$execustu=mysql_query($sqlustu);

}

else if($op=="hapusmodul")
{
   $kd_mdlh = $_GET['id'];
   $queryhap = "Delete FROM modul WHERE id = '$kd_mdlh'";
   $hasilhap = mysql_query($queryhap);
   if($hasilhap){
      echo "Sukses ";}
   else{
      echo "Gagal  ";}   
}

else if($op=="daftarpekerjaan")
{
	echo "<form id=\"formContoh\" method=\"post\" action=\"".$_SERVER['PHP_SELF'].
        "?op=deletekerjaan\">";
?>
	<span class='glyphicon glyphicon-info-sign'><font color=red>Hati-hati MENGHAPUS akan menghapus semua jawaban asesi pada tes tersebut dan harus mengulang</font> 
	<table width="95%" border="0">
	<tr>
    <th bgcolor='#006699'>Cek</th>
    <th bgcolor='#006699'>Kd Unit</th>
    <th bgcolor='#006699'>Waktu(Menit)</th>
	<th bgcolor='#006699'>Email</th>
	<th bgcolor='#006699'>Aksi</th>
	</tr>
 
<?php
 
// bagian ini digunakan untuk menampilkan semua data
 
	$no = 1;
	$query = "SELECT * FROM pertanyaanbck group by nim";
	$hasil = mysql_query($query);
	$i=0;
	while ($data = mysql_fetch_array($hasil))
	{
	$nim=$data['nim'];
	$kdmdl=$data['kd_modul'];
	echo "<tr>";
	echo "<td><input type=checkbox name=nim".$i." value='$nim'></td>";
	echo "<td>$kdmdl<input type=hidden name=kdmdl".$i." value='$kdmdl'></td>";

	//echo "<td>".$data['kd_modul']."</td>";
	echo "<td>".$data['menit']."</td>";	
	echo "<td>".$data['nim']."</td>";
	echo "<td ><a href=".$_SERVER['PHP_SELF'].
        "?op=hapuspekerjaan&email=".$nim."&kdu=".$kdmdl." title=hapus style=height:21px;line-height:21px;><span class='glyphicon glyphicon-trash'>Hapus</a> </td>";
	//echo "<td><form method=link action=konfirmasi.php><input type=text name=kdml value=".$data['kd_modul']."><input type=text name=nim value=".$data['nim']."><input type=text name=nama value=".$d['nama']."><input type=text name=kelas value=".$d['kelas']."><input type=text name=kounter value=".$k."><input id=gobutton type=submit value=Kirim></form></td>";
	echo "</tr>";
	$no++;
	$i++;
	}
	echo "</div>";
	echo "
	<input type='hidden' name='n' value='".$i."' />
	<div class='buttons'>
	<tr><td colspan=6><input id='gobutton' type='submit' value='Hapus yang di cek' /></td></tr></table>";
}

else if($op=="deletekerjaan")
{
	//echo "testt";
	$n=$_POST['n'];
	for ($i=0; $i<=$n-1; $i++)
	{
    if (isset($_POST['nim'.$i]))
     {
     $nim=trim($_POST['nim'.$i]);
     $kdmdl=$_POST['kdmdl'.$i];
     /** $idpemetaan=$_POST['id'.$i];
      $idskema=$_POST['idskema'.$i];
      $idasesi=$_POST['idasesi'.$i];
      $cekdulu="select * from permohonan where id_user='$idasesi' and idskema='$idskema' and statusvalid='Y'";
      $adadulu=mysql_query($cekdulu);
		if(mysql_num_rows($adadulu)>0){
                echo " Tidak bisa di batalkan";
                } else {
      **/
       $hpkerjaan="Delete from pertanyaanbck where nim='$nim' and kd_modul='$kdmdl'";
       //echo $hpkerjaan;
        $okhphk=mysql_query($hpkerjaan);
	if($okhphk){
        $ppsan="sukses";
	}else{
        $ppsan="gagal";}  		
	}
    }
     echo $ppsan ;
}


else if($op=="hapuspekerjaan")
{
	$email=trim($_GET['email']);
	$kdunit=$_GET['kdu'];
	$hpkerjaan="Delete from pertanyaanbck where nim='$email' and kd_modul='$kdunit'";
	//echo $hpkerjaan;
	$okhphk=mysql_query($hpkerjaan);
	if($okhphk){echo "Hapus berhasil";
	}else{echo "Gagal hapus";}

}

else if($op=="uphtes"){
	echo"<table><tr>"; ?>
	<form class="form-horizontal" enctype="multipart/form-data" id="formContoh" method="POST" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=postuphtes\"";?>> 
	<?php 
	//echo "<form enctype=multipart/form-data action=postuploaduser.php method=POST>
	echo "</br><strong>Masukan File hasil tes yang akan di UPLOAD dengan format (XLS): </strong><input name=uploadedfile type=file />
	<input type=submit id=gobutton value=Upload File />
	</form></div></br>";
}

else if($op=="postuphtes"){
	include "excel_reader2.php";
	//echo "<div id=second>";

	$data = new Spreadsheet_Excel_Reader($_FILES['uploadedfile']['tmp_name']);
	// membaca jumlah baris dari data excel
	$baris = $data->rowcount($sheet_index=0);
	echo $baris ; 
	// nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
	$sukses = 0;
	$gagal = 0;
	//echo "jahsjahsj"; 

	for ($i=4; $i<=$baris; $i++)
	{
		$cekuser=trim($data->val($i, 1));
		$cekkdmodul=$data->val($i, 11);
		$cekkdalias=$data->val($i, 10);
		$cekdata="select nim,kd_modul,kelas from grade where trim(nim)='".$cekuser."' AND kd_modul='".$cekkdmodul."'AND kelas='".$cekkdalias."'";
		echo "ll".$cekdata;
		$ada=mysql_query($cekdata);
		$no=1;
		$kdmodul=$data->val($i, 11);
		$modul= $data->val($i, 12);
	   $nim = trim($data->val($i, 1));
	   $nama = $data->val($i, 2);
	   $salah = $data->val($i, 5);
	   $benar= $data->val($i, 6);
	   $nilai= $data->val($i, 7);
	   $jmlsoal= $data->val($i, 8);
	   $tanggal= $data->val($i, 9);
	   $kelas= $data->val($i, 10);
	   $kkm= $data->val($i, 13);
		//$pass1=md5($password);
		//if(empty($nim)){
		// $baris=$i;
		// }else {
       if(mysql_num_rows($ada)>0)
		{  echo "Duplikat atas nama ". $nama."</br>";
         //echo $query;
         $gagal++;
		}else{
      
		$query="insert into grade (id,kd_modul,modul,nim,nama,salah,benar,jumlah_soal,grade,tanggal,kelas,kkm)values ('','$kdmodul','$modul','$nim','$nama','$salah','$benar','$jmlsoal','$nilai','$tanggal','$kelas','$kkm')";
		//echo $query;
		//$hasil = mysql_query($query);
		} 

	// jika proses insert data sukses, maka counter $sukses bertambah
	// jika gagal, maka counter $gagal yang bertambah
	if ($hasil) { $sukses++;
	} else {
	//echo $query;
	}
    
	//echo "Gagal ...";
	//}
	}
	// tampilan status sukses dan gagal
	//echo "<p><a href=adminmenu.php><img src=img/arrow-left2.png>Kembali</a></p>";
	echo "<h3>Proses import data selesai.</h3>";
	echo "<p>Jumlah data yang sukses diimport : ".$sukses."<br>";
	echo "Jumlah data yang gagal diimport : ".$gagal."</p>";
	//}
	//echo "</div>";
}

else if($op=="inputalias")
{
	?>   
    <table class=demo-table  >
    <tr><th colspan='4'> <?php echo "<a href=\"".$_SERVER['PHP_SELF'].
        "?op=importalias\" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'></span>Import Excel Alias</a>";?></th></tr>	
    <tr>
    <th bgcolor='#006699'>No</th>
    <th bgcolor='#006699'>Kode Alias </th>
    <th bgcolor='#006699'>Nama Unit Alias</th>
    <th bgcolor='#006699'>Aksi</th>
	</tr>
<?php
    $noal = 0;
	$queryalias ="SELECT * FROM unitalias order by kdalias";
	//echo $queryalias;
	$hasilalias = mysql_query($queryalias);
	while ($dataalias = mysql_fetch_array($hasilalias))
		{
		$noal++;
			echo "<tr><td>".$noal."</td>";
			echo "<td>".$dataalias['kdalias']."</td>";
			echo "<td>".$dataalias['namaalias']."</td>";
		    echo "<td><a href=\"".$_SERVER['PHP_SELF'].
					"?op=hapusalias&id=".$dataalias['kdalias']."\"><span class='glyphicon glyphicon-trash'>Hapus</a></td></tr>";	
	    }
	echo "</table>";
}

else if($op=="hapusalias")
{
	$kdalias=$_GET['id'];
	echo "<form method=\"post\" action=\"".$_SERVER['PHP_SELF'].
		    "?op=deletepostalias\">";
	echo "<input type=hidden name=kdalias value=".$kdalias.">";
	echo "<strong> Yakin Kode </strong> $kdalias <strong> Akan di hapus ? </strong>";
	echo "<input type=submit id=gobutton value=Delete>";
	echo "</form>";
}

else if($op=="deletepostalias")
{
	$sqlalias="DELETE from unitalias WHERE kdalias=".$_POST['kdalias'];
	mysql_query($sqlalias);
}

else if ($op=="importalias")
{
?>
	<form class="form-horizontal" enctype="multipart/form-data" id="formContoh" method="POST" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=uploadpostalias\"";?>>          
    <table class=demo-table>
     <tr><td>
         <div class="form-group">
         <label class="control-label col-lg-4">Upload File Excel </label>
         <div class="col-lg-8"><input name=uploadedfilee type="file" >
         <?php echo "<input type=submit  class='btn btn-success btn-line' value=Upload&nbsp;File />"; ?></div>
         </div>
         </form>
         </td></tr>
		<?php
		echo "</table>";
}

else if($op=="uploadpostalias")
{
	include "excel_reader2.php";
    $dataas = new Spreadsheet_Excel_Reader($_FILES['uploadedfilee']['tmp_name']);
    $barisas = $dataas->rowcount($sheet_index=0);
    $suksesas = 0;
    $gagalas = 0;
    $gagaldas= 0;
    //$nmdup='';
	for ($ii=2; $ii<=$barisas; $ii++)
    {
    	//echo "ab";
		$noi=1;
		// membaca data nim (kolom ke-1)
		//$kelompok = $data->val($i, 1);
		$skemaalias = $dataas->val($ii, 2);
		$kdalias = $dataas->val($ii, 3);
		$nmalias = $dataas->val($ii, 4);
		$nmasli  = $dataas->val($ii, 5);
		//$ket = $data->val($i, 4);
        if(empty($kdalias)){
          $barisas=$ii;
          }else {
		$cekdataunitalias="select kdalias from unitalias where kdalias='$kdalias'";
		//echo "aslaklsa".$cekdataunitalias;
		$cekdataunitaliasa=mysql_query($cekdataunitalias);
		$cekdataunitaliasb=mysql_num_rows($cekdataunitaliasa);
		//echo "ksdjskd".$cekdataunitb;
		if($cekdataunitaliasb>0)
		{
         $kodeunitalias3=$kodeunitalias3." ".$kdalias;
        //$gagald++;
		} 
		else 
		{
       
		$queryiunitalias="insert into unitalias values ('','$skemaalias','$kdalias','$nmalias','$nmasli')";
		//echo ";a;al;als".$queryiunitalias;
		$hasilas = mysql_query($queryiunitalias); 
		}

		} 
   
		// jika proses insert data sukses, maka counter $sukses bertambah
		// jika gagal, maka counter $gagal yang bertambah
		if ($hasilas) $suksesas++;
		else $gagalas++;
    
    
  
	}
    echo "<h3><font color=green>Proses import data selesai.</h3>";
    echo "<p>Jumlah data yang sukses diimport : ".$suksesas."</font><br>";
    echo "<font color=red>Jumlah data yang gagal diimport : ".$gagalas."<br>";
    echo "duplikat kode unit" .$kodeunitalias3."</font></p>";
	//echo "ok";
}

else if ($op == "tambahsett")
{

	echo "<form id=\"formContoh\" method=\"post\" action=\"".$_SERVER['PHP_SELF'].
        "?op=simpansett\">";
	?>
	<table class=demo-table width=90%><thead><tr>
	<td size="10"><strong>Tanggal    </strong></td><td>
    <input type="text" name="tanggaltes" id="tanggaltes" placeholder="Tahun/Bulan/Hari(2019-04-01)"></td></tr><tr>
	<td size="10"><strong>TUK </strong>
	</td><td> 
	<select class="form-control" id="idtuktes" name="idtuktes" placeholder="TUK">    
	<?php
	  	$tampiltes=mysql_query("SELECT * FROM tuk");
		while($rtes=mysql_fetch_array($tampiltes)){
			if($rtes['idtuk']==$tukptes) {
            
			echo "<option value=$rtes[idtuk] selected>$rtes[namatuk]</option> ";}
			else 
			{
			 echo "<option value=$rtes[idtuk]>$rtes[namatuk]</option> ";	
			}
		}
         
	?>
	 </select>   
     </div></td></tr>
	<!--<td><strong>Status </strong></td><td> :
	<input type="radio" name="yt" value="a" checked> Aktif <input type="radio" name="yt" value="t"> Tidak Aktif </td></tr><tr>-->
	<td colspan="2"><input type="submit" name="simpan" id="gobutton" value="Simpan"></td></tr></thead></table>
	<?php   
}

else if($op=="simpansett")
{
	$tgltes=$_POST['tanggaltes'];
	$idtuktes=$_POST['idtuktes'];
	$tanggaltes = date('Y-m-d', strtotime($tgltes));
	$cekdatates = "SELECT * FROM tanggaltes WHERE namatuktes = '$idtuktes'";
	$adates=mysql_query($cekdatates);
   	if(mysql_num_rows($adates)>0){
         ?><button onclick="goBackdup()">Duplikat.. Klik disini</button>
		<script>
			function goBackdup() {
			  window.history.go(-2);
			}
			</script>
         <?php }
    else{
		$ssqltgltes="insert into tanggaltes value('','$idtuktes','$tanggaltes')";
		$exectgltes=mysql_query($ssqltgltes);
		// echo $ssql;
		if($exectgltes){ 

    	?> <button onclick="goBackt()">Sukses.. Klik disini</button>

			<script>
			function goBackt() {
			  window.history.go(-2);
			}
			</script>

    	<?php
		}
          else{echo "gagal ...";}
	}
}

else if($op=="hapustest")
{
	$idtgltes=$_GET['idtgl'];
	$hapustes="delete from tanggaltes where idtgltes='$idtgltes'";
	$ehapustes=mysql_query($hapustes);
	//echo $hapus;
    if($ehapustes){ ?> <button onclick="goBackhap()">Sukses.. Klik disini</button>
		<script>
			function goBackhap() {
			  window.history.go(-1);
			}
			</script>


         <?php }
          else{echo "gagal ...";}
}

else if($op=="edittest")
{
	$idtgltes=$_GET['idtgl'];
	$kettes=$_GET['tk'];
	$tanggal=$_GET['tanggal'];
	$st=$_GET['st'];
	$tanggal = date("d-m-Y", strtotime($tanggal));
	echo "<form id=\"formContoh\" method=\"post\" action=\"".$_SERVER['PHP_SELF'].
        "?op=updatetest\">";

?>
	<table><tr>
	<td><strong>Tanggal    </strong></td><td> : 
    <input type="text" name="tanggaltes" id="tanggaltes" placeholder="Tanggal Tes" value="<?php echo $tanggal;?>"></td></tr><tr>
	<td><div class="form-group"><strong>TUK :</strong></td><td>
	<select class="form-control" id="idtuktes" name="idtuktes" placeholder="TUK" autofocus>
        
	<?php $tampiltesedit=mysql_query("SELECT * FROM tuk");
		while($redit=mysql_fetch_array($tampiltesedit)){
			if($redit['idtuk']==$kettes) {
            
			echo "<option value=$redit[idtuk] selected>$redit[namatuk]</option> ";}
			else 
			{
			 echo "<option value=$redit[idtuk]>$redit[namatuk]</option> ";	
			}
		}
	?>
	</select>   
    </div></td>
	</tr><tr>
	<td colspan="2"><input type="submit" name="simpan" id="gobutton" value="Simpan"><input type="hidden" name="idtese" value="<?php echo $idtgltes;?>"></td></tr></table>
	<?php
}

else if ($op=="updatetest")
{
	$tgltesu=$_POST['tanggaltes'];
	$kettesu=$_POST['idtuktes'];
	//$yt=$_POST['yt'];
	$idtesu=$_POST['idtese'];
	$tanggaltesu = date('Y-m-d', strtotime($tgltesu));
	$cekdatates = "SELECT * FROM tanggaltes WHERE namatuktes = '$kettesu'";
	$adates=mysql_query($cekdatates);
   	//if(mysql_num_rows($adates)>0){
	$tesup="update tanggaltes set tgltes='$tanggaltesu',namatuktes='$kettesu' where idtgltes='$idtesu'";
	//echo $up;
	$teseup=mysql_query($tesup);
    if($teseup){ ?> <button onclick="goBackedit()">Sukses.. Klik disini</button>
		<script>
			function goBackedit() {
			  window.history.go(-2);
			}
			</script>
         <?php }
          else{echo "gagal ...";}
	//}

}



else if($op=="settanggaltes")
{
	//echo "<a href=\"".$_SERVER['PHP_SELF'].
	//      "?op=tambahsett\" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'></span>Tambah Tanggal</a>";?>
	<table class=demo-table width=100%><thead>
	<tr><th colspan='4' ><?php echo "<a href=\"".$_SERVER['PHP_SELF'].
        "?op=tambahsett\" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'></span>Tambah Tanggal</a>";?></th></tr>
	<tr><th colspan='4' bgcolor='#006699'>SET TANGGAL TES TUK</th>
	<tr>
    <th bgcolor='#006699'>No</th>	
    <th bgcolor='#006699'>Tanggal Tes</th>
    <th bgcolor='#006699'>Nama TUK</th>
    <!--<th bgcolor='#006699'>Status</th>-->
    <th bgcolor='#006699'>Aksi</th>
	</tr></thead>

	<?php
// bagian ini digunakan untuk menampilkan semua data
 
	$no = 1;
	$querysetmaintes ="SELECT tanggaltes.idtgltes,tanggaltes.namatuktes,tanggaltes.tgltes,tuk.namatuk FROM tanggaltes inner join  tuk on tanggaltes.namatuktes=tuk.idtuk ";
	//echo $querysetmaintes;
	$hasilsetmaintes = mysql_query($querysetmaintes);
	while ($datasetmaintes = mysql_fetch_array($hasilsetmaintes))
	{

	echo "<tr>";
	echo "<td bgcolor='#99CCFF'>".$no."</td>";
	//echo "<td bgcolor='#99CCFF'>".$data['id_user']."</td>";
	echo "<td bgcolor='#99CCFF' align=left>".$datasetmaintes['tgltes']."</td>";
	echo "<td bgcolor='#99CCFF' align=left>".$datasetmaintes['namatuk']."</td>";
	//echo "<td bgcolor='#99CCFF' align=left>".$datasetmain['status']."</td>";
  	//echo "<td align=left><strong><a href=\"".$_SERVER['PHP_SELF'].
		//			"?op=updatestatust&id=".$datasetmain['idtanggal']."\"><font color=$warset><span class='glyphicon glyphicon-refresh'> ".$ketset."</font></strong></td>";
	echo "<td><a href=\"".$_SERVER['PHP_SELF'].
        "?op=edittest&tanggal=".$datasetmaintes['tgltes']."&tk=".$datasetmaintes['namatuktes']."&idtgl=".$datasetmaintes['idtgltes']."\"><span class='glyphicon glyphicon-pencil'>Edit</a> | <a href=\"".$_SERVER['PHP_SELF'].
        "?op=hapustest&idtgl=".$datasetmaintes['idtgltes']."\"><span class='glyphicon glyphicon-remove'>Hapus</a></td>";
	echo "</tr>";
	$no++;
	}
	echo "</div>";

}
?>


<body>
</br>
	<?php //echo "<a href=\"".$_SERVER['PHP_SELF'].
        //"?op=tambah&kd_modul=".$data['kd_modul']."\" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'>Tambah</a>";
	echo " <a href=\"".$_SERVER['PHP_SELF'].
        "?op=inputalias \" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'><strong>Input Kode Alias</strong> </a>";

	echo " <a href=\"".$_SERVER['PHP_SELF'].
        "?op=importprk&email=".$data['email']."\" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'><strong>Upload Soal </strong> </a>";
	echo " <a href=\"".$_SERVER['PHP_SELF'].
        "?op=bataltulis&email=".$data['email']."\" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'><strong>Batal </strong> </a>";
	echo " <a href=\"".$_SERVER['PHP_SELF'].
        "?op=uploadgbrtulis&email=".$data['email']."\" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'><strong>Upload Gambar Tes </strong> </a>";
	echo " <a href=\"".$_SERVER['PHP_SELF'].
        "?op=uploadmodul&email=".$data['email']."\"  class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'><strong>Upload Kode </strong> </a>";
	echo " <a href=\"".$_SERVER['PHP_SELF'].
        "?op=hasiltes&email=".$data['email']."\"  class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'><strong>Hasil TES </strong> </a>";
	echo " <a href=\"".$_SERVER['PHP_SELF'].
        "?op=daftarpekerjaan \"  class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'><strong>Daftar Asesi sedang Tes </strong> </a>";
	echo " <a href=\"".$_SERVER['PHP_SELF'].
        "?op=uphtes \" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'><strong>Upload Hasil Tes </strong> </a>";
	echo " <a href=\"".$_SERVER['PHP_SELF'].
        "?op=settanggaltes \" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'><strong>Set Tanggal Tes TUK </strong> </a>";?>


    <table class=demo-table  ><tr>
    <th bgcolor='#006699'>No</th>
    <th bgcolor='#006699'>Id</th>	
    <th bgcolor='#006699'>Kode Unit</th>
    <th bgcolor='#006699'>Nama unit</th>
    <th bgcolor='#006699'>Status </th>
    <th colspan='3' bgcolor='#006699'>Aksi</th>
	</tr>
 
	<?php
 
// bagian ini digunakan untuk menampilkan semua data
 
	$no = 1;
	//$querytulmain ="SELECT modul.id,modul.status_soal,modul.kd_modul,unit.namaunit FROM modul inner join unit on modul.kd_modul=unit.kodeunit";
	$querytulmain="select * from modul";
	$hasiltulmain = mysql_query($querytulmain);
	while ($datatulmain = mysql_fetch_array($hasiltulmain))
		{
		$sta=$datatulmain['status_soal'];
			if($sta=='aktif'){
   				$st="green";
   			}else{ 
				$st="red";}
		   echo "<tr>";
		   echo "<td bgcolor='#99CCFF'>".$no."</td>";
		   echo "<td bgcolor='#99CCFF'>".$datatulmain['id']."</td>";
		   echo "<td bgcolor='#99CCFF' align=left>".$datatulmain['kd_modul']."</td>";
		   echo "<td bgcolor='#99CCFF' align=left>".$datatulmain['modul']."</td>";
	       echo "<td bgcolor='#99CCFF' align=left><strong><a href=\"".$_SERVER['PHP_SELF'].
					"?op=updatestatus&id=".$datatulmain['id']."\"><font color=$st><span class='glyphicon glyphicon-refresh'>".$datatulmain['status_soal']."</font></strong></td>";
		  
		   echo "<td><a href=\"".$_SERVER['PHP_SELF'].
					"?op=editmodul&id=".$datatulmain['id']."\"><span class='glyphicon glyphicon-edit'>Edit</a>";
		   echo "<td><a href=\"".$_SERVER['PHP_SELF'].
					"?op=hapusmodul&id=".$datatulmain['id']."\"><span class='glyphicon glyphicon-trash'>Hapus</a>";
			echo "<td><form name='myform' method='GET' action='../siswa/quis/paginationadmin.php' target=_blank>
                          <input type=hidden name=md value=".$datatulmain['kd_modul'].">
                          <input type=submit id=gobutton value=Preview> </form></td>";
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
