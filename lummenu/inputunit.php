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
<script type="text/javascript">
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 5000);
</script>

<style>
  .alert {
     width:50%;    
    }
</style>

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
			<li  class="active"><a href="inputunit.php"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg> Kelola Unit</a></li>
			<li><a href="inputasesor.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Kelola Asesor</a></li>
			<li><a href="inputpeserta.php"><svg class="glyph stroked female user"><use xlink:href="#stroked-female-user"/></svg>Kelola Peserta</a></li>
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
			<h4>Kelola Data Unit </h4>
                        
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
   $idunit= $_GET['idunit'];
   $queryuedit = "SELECT * FROM unit WHERE idunit = '$idunit'";
   $hasiluedit = mysql_query($queryuedit);
   $datauedit  = mysql_fetch_array($hasiluedit);
   $idskema=$datauedit['idskema'];
   $idunit =$datauedit['idunit'];
   $kodeunit=$datauedit['kodeunit'];
   $namaunit=$datauedit['namaunit'];
   $ket=$datauedit['keterangan'];
   $status=$datauedit['status'];
 //echo "<form name='myform' method='post' action='".$_SERVER['PHP_SELF']."??op=edit'>";
   echo "<form method=\"post\" action=\"".$_SERVER['PHP_SELF'].
        "?op=update\">";
   echo "<table border=\"0\">";
   ?>
	<div class="formcolumn">
	<div class="dynamiclabel"> 
   	<select id="skema" name="skema" placeholder="Skema" autofocus>
        <?php
          $tampil=mysql_query("SELECT * FROM skema ORDER BY idskema");
			while($r=mysql_fetch_array($tampil)){
   				if ($idskema == $r['idskema']) {
					echo "<option value=$r[idskema] selected>$r[namaskema]</option>";
				}else{
 					echo "<option value=$r[idskema]>$r[namaskema]</option>";}
	}
?>
	</div>
    <div class="dynamiclabel">
    <input id="kodunit" name="kodeunit" placeholder="Kode Unit" type="text" value="<?php echo $kodeunit;?> ">
	<label for="kodeunit">Kode Unit </label>
	</div>
   	<div class="dynamiclabel">
    <input id="namaunit" name="namaunit" placeholder="Nama Unit" type="text" value="<?php echo $namaunit;?>">
    <label for="kodeunit">Nama Unit </label>
   	</div>
   	<div class="dynamiclabel">
    <textarea id="ket" name="ket" placeholder="Keterangan"><?php echo $ket;?></textarea>
    <label for="ket">Keterangan</label>
  	</div>   
  	<div class="dynamiclabel">   
	<select id="status" name="status" placeholder="Status Skema">
          <?php 
           $ak=mysql_query("SELECT * FROM unit");
           while($a=mysql_fetch_array($ak)){
           if ($status==$a['status']) {
                if($status=="Y"){
                  $ap="Aktif";}
                else{ $ap="Belum Aktif";}
               
			echo "<option value=$a[status] selected>$ap</option>";
			}else{
              if($status=="Y"){
                  $ap="Belum";}
                else{ $ap="Aktif";}
			echo "<option value=$a[status] >$ap</option>";}
			}
          ?>
	 	</select>
		<label for="status">Pilih aktif dan Tidak aktif</label>   
		</div>
		</div>
		<?php
   		echo "</table>";
   		echo "<input type=\"hidden\" name=\"kodeunitLama\"
         value=\"".$datauedit['kodeunit']."\">";
   		echo "<input type=\"hidden\" name=\"idunit\"
         value=\"".$datauedit['idunit']."\">";
		?>
		<div class="buttons">
		<input id="gobutton" type="submit" value="Simpan " />
		</div>
		<?php
	   echo "</br>";      
	   echo "</form>";
	}
	else if ($op == "tambah")
	{
 		echo "<form method=\"post\" action=\"".$_SERVER['PHP_SELF'].
        "?op=append\">";
   		echo "<table border=\"0\">";
  		?>

		<div class="formcolumn">
  		<div class="dynamiclabel">   
	 	<select id="skema" name="skema" placeholder="Skema" autofocus>
        <?php
          $tampil=mysql_query("SELECT * FROM skema ORDER BY idskema");
			while($r=mysql_fetch_array($tampil)){
				echo "<option value=$r[idskema]>$r[namaskema]</option>";
			}
			?>
	 	</select>
		<label for="skema">Skema</label>   
		</div>
  		<div class="dynamiclabel">
    	<input id="kodunit" name="kodeunit" placeholder="Kode Unit" type="text">
    	<label for="kodeunit">Kode Unit </label>
   		</div>
  		<div class="dynamiclabel">
    	<input id="namaunit" name="namaunit" placeholder="Nama Unit" type="text">
    	<label for="kodeunit">Nama Unit </label>
   		</div>
   		<div class="dynamiclabel">
    	<textarea id="ket" name="ket" placeholder="Keterangan"></textarea>
    	<label for="ket">Keterangan</label>
  		</div>
   		<div class="dynamiclabel">   
	 	<select id="status" name="status" placeholder="Status Skema">
	  		<option value="Y">Aktif</option>
	  		<option value="N">Belum Aktif</option>
	 	</select>
		<label for="status">Pilih aktif dan Tidak aktif</label>   
	</div>
</div>
<div class="buttons">
<input id="gobutton" type="submit" value="Simpan " />
</div>
<?php
   echo "</table>";
   echo "</form>";
}
else if ($op == "append")
     {
      $idskema=$_POST['skema'];
      $kodeunit=$_POST['kodeunit'];
      $namaunit=$_POST['namaunit'];
      $ket=$_POST['ket'];
      $status=$_POST['status'];  
      $cekdata="select kodeunit from unit where kodeunit='".$kodeunit."'";
	  $ada=mysql_query($cekdata);
		if(mysql_num_rows($ada)>0){
           echo "Gagal Duplikat...";}
      	else {
      		if (!empty($kodeunit)){
      			$queryuappend = "INSERT INTO unit VALUE('','$idskema','$kodeunit','$namaunit','$ket','$status')";
				  //echo $query;
				  $berhasil = mysql_query($queryuappend);
				  if ($berhasil) echo "Proses Sukses";
				  else echo "Proses Gagal";
				  }
      		}
		}

else if ($op == "update")
     {
 
       // proses untuk updating data setelah diedit
 
        $idunit = $_POST['idunit'];
        $kodeunit= trim($_POST['kodeunit']);
        $namaunit= $_POST['namaunit'];
        $skema=$_POST['skema'];
        $ket=$_POST['ket'];
        $status=$_POST['status'];
        $kodeunitLama=trim($_POST['kodeunitLama']);
        if($kodeunit == $kodeunitLama){
	  
			$queryuupdate = "UPDATE unit SET kodeunit='$kodeunit',namaunit='$namaunit',idskema='$skema',keterangan='$ket' WHERE idunit = '$idunit'"; 
            //echo $query;
        	$hasiluupdate = mysql_query($queryuupdate);
   
        		if ($hasiluupdate) echo "Proses Update Sukses";
        		else echo "<p>Proses Update Gagal</p>";
        }else{ 
	  		$cekdata="select kodeunit from unit where kodeunit='".$kodeunit."'";
			  $ada=mysql_query($cekdata);
			  if(mysql_num_rows($ada)>0){
				   echo "Gagal Duplikat ..";}
      		  else {
				$queryuupdate = "UPDATE unit SET kodeunit='$kodeunit',namaunit='$namaunit',idskema='$skema',keterangan='$ket' WHERE idunit = '$idunit'"; 
  			      //echo $query;
  			      $hasil = mysql_query($queryuupdate);
       
  			      if ($hasil) echo "Proses Update Sukses";
  			      else echo "<p>Proses Update Gagal</p>";
        
  		      } 
        }
   }
else if ($op == "delete"){
   		$idunit= $_GET['idunit'];
   		$queryudelete = "SELECT * FROM unit WHERE idunit = '$idunit'";
   		$hasiludelete = mysql_query($queryudelete);
   		$dataudelete  = mysql_fetch_array($hasiludelete);
	    $kodeunit=$dataudelete['kodeunit'];
	    $namaunit=$dataudelete['namaunit'];

		  $cekuele="select idunit from elemen where idunit = '$idunit'";
		  $cekuelea=mysql_query($cekuele);
		  $cekueleb=mysql_num_rows($cekuelea);
      if ($cekueleb>0)
      {
        ?>
    <div class="container">
        <div class="alert alert-warning">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Gagal hapus Unit..! Elemen kompetensi sudah terisi silahkan hapus dulu ....</strong>
        </div>
      </div> <?php
      } else 
      {

	 //echo "<form name='myform' method='post' action='".$_SERVER['PHP_SELF']."??op=edit'>";
	    echo "<form method=\"post\" action=\"".$_SERVER['PHP_SELF'].
		    "?op=deletepost\">";
		     echo "<input type=hidden name=idunit value=".$idunit.">";
          ?>
	 	<div class="formcolumn">
          Kode <?php echo $kodeunit." ".$namaunit ?> <strong>Yakin Akan di hapus ???</strong>
   	 	</div>
     	<div class="buttons">
        	<?php
       		echo "<input type=submit id=gobutton value=Delete>
        </div> 
        </div>";
          
	echo "</form>";
	echo "<br/><br/><br/>"; 
	} 
}

else if ($op == "deletepost"){
		$sql="DELETE from unit WHERE idunit=".$_POST['idunit'];
		mysql_query($sql);
	 }

   else if ($op=="import")
   {
    ?>
    <form class="form-horizontal" enctype="multipart/form-data" id="formContoh" method="POST" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=postuploadunit\"";?>>
           
    <table class=demo-table>
     <tr><td>
    <label for="iskema">Pilih Skema</label></td><td>
    <select id="iskema" name="iskema" placeholder="Skema" autofocus>
          <?php
          $tampilim="SELECT * FROM skema ORDER BY idskema";
          //echo $tampilkds;
          $tampilima=mysql_query($tampilim);
      while($rim=mysql_fetch_array($tampilima)){
          $idskema=$rim['idskema'];

          echo "<option value='$idskema'>".$rim['namaskema']." </option>";
          }
           ?>           
                        <div class="form-group">
                        <label class="control-label col-lg-4">Upload Dari File Excel </label>
                        <div class="col-lg-8"><input name=uploadedfile type="file" >
                    <?php echo "<input type=submit  class='btn btn-success btn-line' value=Upload&nbsp;File />"; ?></div>
                    </div>
                    </form>
                    </select></td></tr>
    <?php
    echo "</td></tr></table>";
   }
   
   else if ($op=="postuploadunit")
   {
    include "excel_reader2.php";
    $data = new Spreadsheet_Excel_Reader($_FILES['uploadedfile']['tmp_name']);
    $baris = $data->rowcount($sheet_index=0);
    $sukses = 0;
    $gagal = 0;
    $gagald= 0;
    $nmdup='';
    $iskema=$_POST['iskema'];
    for ($i=2; $i<=$baris; $i++)
    {
       $no=1;
       // membaca data nim (kolom ke-1)
       //$kelompok = $data->val($i, 1);
       $idske=$data->val($i,1);
       $kdunit = $data->val($i, 2);
       $nmunit = $data->val($i, 3);
       $ket = $data->val($i, 4);
        if(empty($kdunit)){
          $baris=$i;
          }else{

       $cekdataunit="select kodeunit from unit where kodeunit='$kdunit' and idskema='$idske'";
       //echo $cekdataunit;
       $cekdataunita=mysql_query($cekdataunit);
       $cekdataunitb=mysql_num_rows($cekdataunita);

       //echo "ksdjskd".$cekdataunitb;
      if($cekdataunitb>0)
      {
         $kodeunit3=$kodeunit3." ".$kdunit;

        //$gagald++;
      } 
      else 
      {
       
    $queryiunit="insert into unit values ('','$iskema','$kdunit','$nmunit','$ket','Y')";
    //echo $queryiunit;
    $hasil = mysql_query($queryiunit); 
       }

    } 
   
    // jika proses insert data sukses, maka counter $sukses bertambah
    // jika gagal, maka counter $gagal yang bertambah
    if ($hasil) $sukses++;
    else $gagal++;
    
    
  
   }
    echo "<h3><font color=green>Proses import data selesai.</h3>";
    echo "<p>Jumlah data yang sukses diimport : ".$sukses."</font><br>";
    echo "<font color=red>Jumlah data yang gagal diimport : ".$gagal."<br>";
    echo "duplikat kode unit" .$kodeunit3."</font></p>";
      }
	else if ($op=="elemendansub")
   {
    
    $idunitceka=$_GET['idunitcek'];
    $idskemaceka=$_GET['$idskemacek'];
    $sqeunitunit="select * from unit where idunit='".$idunitceka."'";
    //echo "ss".$sqeunitunit;
    $sqeunitunitb=mysql_query($sqeunitunit);
    $sqeunitunitc=mysql_fetch_array($sqeunitunitb);
    //echo $idskemaceka;
     $sqelemenunit="select * from elemen where idunit='".$idunitceka."' order by idelemen";
     //echo $sqelemenunit;
     $sqelemenunita=mysql_query($sqelemenunit);
     echo "<table width=90%>";
     echo "<tr><th colspan=5>".$sqeunitunitc['kodeunit'].", ".$sqeunitunitc['namaunit']."</th></tr>";
     echo "<tr><th>ID Elemen</th><th> kode elemen </th><th> nama elemen </th><th colspan=2></th></tr>";
     while ($sqelemenunitc=mysql_fetch_array($sqelemenunita))
     {
      echo "<tr><td><b>".$sqelemenunitc['idelemen']."</td>";
      echo "<td><b>".$sqelemenunitc['kodeelemen']."</td>";
      echo "<td><b>".$sqelemenunitc['namaelemen']."</b></td><td></td><td></td></tr>";
     
     
     }
      $sqsubelemenunit="select * from subelemen where idunit='".$idunitceka."' order by idelemen";
      $sqsubelemenunita=mysql_query($sqsubelemenunit);
      echo "<tr><th><th>id elemen</th><th> kode sub elemen </th><th colspan=2> nama sub elemen </th></tr>";
      while ($sqsubelemenunitb=mysql_fetch_array($sqsubelemenunita))

       {
        
         echo "<tr><td></td><td>".$sqsubelemenunitb['idelemen']."</td><td>".$sqsubelemenunitb['kodesubelemen']."</td>
         <td>".$sqsubelemenunitb['pertanyaan']."</td><td><a href=\"".$_SERVER['PHP_SELF'].
        "?op=deletesubelemenunit&idsubelemenunit=".$sqsubelemenunitb['idsubelemen']."\"><span class='glyphicon glyphicon-remove'>Hapus</a></td></tr>";

       }

   echo "</table>";
   }

 else if($op=="deletesubelemenunit"){
$idsubelemenunit= $_GET['idsubelemenunit'];
   //echo $idelemen;
   $queryseunit = "SELECT * FROM subelemen WHERE idsubelemen = '$idsubelemenunit'";
   $hasilseunit = mysql_query($queryseunit);
   $dataseunit  = mysql_fetch_array($hasilseunit);
   $idsubelemenseunit=$dataseunit['idsubelemen'];
   $pertanyaanseunit=$dataseunit['pertanyaan'];
   
   $cekddapl2seunit="select idsubelemen from apl2 where idsubelemen='$idsubelemenunit'";
   $cekddapl2aseunit=mysql_query($cekddapl2seunit);
   $cekddapl2bseunit=mysql_num_rows($cekddapl2aseunit);

   if($cekddapl2bseunit>0)
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
        "?op=deletepertanyaanseunit\">";
         
          ?>
   <div class="formcolumn">
      <div class="dynamiclabel">
      <?php echo "Pertanyaan Ini Akan di hapus ? <strong>".$dataseunit['pertanyaan'];?></strong>
      </div> 
       <div class="buttons">
        <?php 
        echo "<input type=hidden name=idsubelemenseunit value=".$idsubelemenseunit.">";
       echo "<input type=submit id=gobutton value=Hapus>
  
        </div></div>";
          
echo "</form>";
echo "</br></br></br></br>"; 
}

 }

else if($op=="deletepertanyaanseunit")
{
$sqlseunit="DELETE from subelemen WHERE idsubelemen=".$_POST['idsubelemenseunit'];
$delseunit=mysql_query($sqlseunit);
if($delseunit)
{
?><button onclick="goBackdup()">Berhasil di hapus ...</button>
    <script>
      function goBackdup() {
        window.history.go(-2);
      }
      </script>


         <?php
       }
}
  ?>


<body>
	<?php echo "<a href=\"".$_SERVER['PHP_SELF'].
        "?op=tambah\" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'></span>Tambah Unit</a>";?>
  <?php echo "<a href=\"".$_SERVER['PHP_SELF'].
        "?op=import\" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'></span>Import Excel Unit</a>";?>


	<table class=demo-table></thead><tr>
    <th bgcolor='#006699'>No</th>
    <th bgcolor='#006699'>Id Unit</th>
    <th bgcolor='#006699'>Id Skema</th>	
    <th bgcolor='#006699'>Kode Unit</th>
    <th bgcolor='#006699'>Nama unit</th>
    <th bgcolor='#006699'>Keterangan</th>
    <th bgcolor='#006699'>Status</th>
    <th bgcolor='#006699'>Aksi</th>
	</tr></thead>
 
	<?php
 
// bagian ini digunakan untuk menampilkan semua data
 
	$no = 1;
	$queryumain ="SELECT * FROM unit";
	$hasilumain = mysql_query($queryumain);
	while ($dataumain = mysql_fetch_array($hasilumain))
		{
		$sta=$dataumain['status'];
			if($sta=='Y'){
   				$st="Aktif";
   			}else{ 
				$st="Belum Aktif";}
		   echo "<tr>";
		   echo "<td bgcolor='#99CCFF'>".$no."</td>";
		   echo "<td bgcolor='#99CCFF'><a href=".$_SERVER['PHP_SELF'].
        "?op=elemendansub&idunitcek=".$dataumain['idunit']."&idskemacek=".$dataumain['idskema']." class='btn btn-primary btn-sm' role='button'>".$dataumain['idunit']."</a></td>";
       echo "<td bgcolor='#99CCFF'>".$dataumain['idskema']."</td>";
		   echo "<td bgcolor='#99CCFF' align=left>".$dataumain['kodeunit']."</td>";
		   echo "<td bgcolor='#99CCFF' align=left>".$dataumain['namaunit']."</td>";
		   echo "<td bgcolor='#99CCFF' align=left>".$dataumain['keterangan']."</td>";
		   echo "<td bgcolor='#99CCFF' align=left>".$st."</td>";
		   echo "<td >
<a href=\"".$_SERVER['PHP_SELF'].
        "?op=edit&idunit=".$dataumain['idunit']."\"><span class='glyphicon glyphicon-pencil'>Edit </a>|<a href=\"".$_SERVER['PHP_SELF'].
        "?op=delete&idunit=".$dataumain['idunit']."\"><span class='glyphicon glyphicon-remove'>Hapus</a></td>";
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
<?php 
   }
 } ?>
