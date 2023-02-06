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
			<li><a href="inputelemen.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"/></svg> Kelola Komptetensi</a></li>
			<li><a href="inputtempattuk.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg> Kelola Tempat TUK</a></li>
			<li><a href="inputsyarat.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg> Input Persyaratan</a></li>
			<li><a href="inputkumpan.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Input Umpan Balik</a></li>
			<li><a href="inputprosesasesmen.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Input Proses Asesmen</a></li>
			<li class="active"><a href="inputpengurus.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Input Pengurus</a></li>
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
			<h4><strong>Data Pengurus</strong></h4>
                        
</div><!--/.row-->
		
		<!--/.row-->
				
		<div class="row">
			<div class="col-lg-12">
<!--data nu baru -->
<?php
$op = $_GET['op'];
 
if ($op == "editpengurus")
{
   // proses untuk menampilkan data yang akan diedit pada form
   $idp= $_GET['idp'];
   $queryueditpeng = "SELECT * FROM pengurus WHERE idpengurus = '$idp'";
   //echo $queryueditpeng;
   $hasilueditpeng = mysql_query($queryueditpeng);
   $dataueditpeng  = mysql_fetch_array($hasilueditpeng);
   $nmpeng = $dataueditpeng['namapengurus'];
   $nippeng= $dataueditpeng['nip'];
   //$idskema=$dataueditsy['idskema'];
   $idpeng=$dataueditpeng['idpengurus'];
   echo "<form method=\"post\" action=\"".$_SERVER['PHP_SELF'].
        "?op=updatepeng\">";

   ?>
	<table class=demo-table width=80%>
	<tr><th colspan=2> Edit Pengurus </th></tr>
	<tr><td>
	<label for="nippeng">NIP</label></td><td>
    <input id="nippeng" name="nippeng" placeholder="NIP" type="text" size="25" value="<?php echo $nippeng;?>" autofocus>
	</td></tr>
	<tr><td>
	<label for="nmpeng">Nama Pengurus</label></td><td>
    <input id="nmpeng" name="nmpeng" placeholder="Nama Pengurus" type="text" size="60" value="<?php echo $nmpeng;?> ">
	</td></tr><tr><td>
	<label for="jbpeng">Jabatan</label></td><td>
    <select id="jbpeng" name="jbpeng" placeholder="Jabatan">
          <?php
          $tampilp="SELECT * FROM pengurus WHERE idpengurus = '$idp' ORDER BY idpengurus";
          //echo $tampilkds;
          $tampilpy=mysql_query($tampilp);
    while($rp=mysql_fetch_array($tampilpy)){
          if ($rp['jabatan'] == 'k') {
          echo "<option value=k selected>Ketua Dewan Pengarah</option>";
          echo "<option value=s >Ketua / Direktur</option>";
          echo "<option value=a >Manajer Sertifikasi</option>";
		  echo "<option value=t>Manajer Administrasi</option>";
		  echo "<option value=b>Manajer Manajemen Mutu</option>";
		  echo "<option value=i>Ketua Bidang IT</option>";
		  
		  }
          else if ($rp['jabatan']=='a') {
          echo "<option value=a selected>Manajer Sertifikasi</option>";  
          echo "<option value=k >Ketua Dewan Pengarah </option>";
          echo "<option value=s >Ketua / Direktur</option>";
		  echo "<option value=t>Manajer Administrasi</option>";
		  echo "<option value=b>Manajer Manajemen Mutu</option>";
		  echo "<option value=i>Ketua Bidang IT</option>";
         
          }
		  
          else if ($rp['jabatan']=='s'){
          echo "<option value=s selected >Ketua / Direktur</option>";  
          echo "<option value=k >Ketua Dewan Pengarah</option>";
          echo "<option value=a >Manajer Sertifikasi</option>";
		  echo "<option value=t>Manajer Administrasi</option>";
		  echo "<option value=b>Manajer Manajemen Mutu</option>";
		  echo "<option value=i>Ketua Bidang IT</option>";
			}
			
		  else if ($rp['jabatan']=='t'){
          echo "<option value=s >Ketua / Direktur</option>"; 
          echo "<option value=k >Ketua Dewan Pengarah</option>";
          echo "<option value=a >Manajer Sertifikasi</option>";
		  echo "<option value=t selected >Manajer Administrasi</option>";
		  echo "<option value=b>Manajer Manajemen Mutu</option>";
		    echo "<option value=i>Ketua Bidang IT</option>";
			}
			
			 else if ($rp['jabatan']=='i'){
          echo "<option value=s >Ketua / Direktur</option>"; 
          echo "<option value=k >Ketua Dewan Pengarah</option>";
          echo "<option value=a >Manajer Sertifikasi</option>";
		  echo "<option value=t >Manajer Administrasi</option>";
		  echo "<option value=b>Manajer Manajemen Mutu</option>";
		    echo "<option value=i selected>Ketua Bidang IT</option>";
			}
			
		   else {
          echo "<option value=s >Ketua / Direktur</option>"; 
          echo "<option value=k >Ketua Dewan Pengarah</option>";
          echo "<option value=a >Manajer Sertifikasi</option>";
		  echo "<option value=t >Manajer Administrasi</option>";
		  echo "<option value=b selected >Manajer Manajemen Mutu</option>";
		  echo "<option value=i>Ketua Bidang IT</option>";
			}
	}

?>
	</select>
	</td></tr>
	</table>

  	<?php
   		echo "</table>";
   		echo "<input type=\"hidden\" name=\"idpeng\"
         value=\"".$dataueditpeng['idpengurus']."\">";
   		?>
		<div class="buttons">
		<input id="gobutton" type="submit" value="Simpan " />
		</div>
		<?php
	   echo "</br>";      
	   echo "</form>";
	}

else if ($op == "tambahpengurus")
	{
 		echo "<form method=\"post\" action=\"".$_SERVER['PHP_SELF'].
        "?op=appendpengurus\">";
   		echo "<table border=\"0\">";
  		?>
		<table class=demo-table width=80%><tr><th colspan="2">
		Tambah Pengurus </th></tr>
 		
		<tr><td>
		<label for="nip">NIP/NO REG</label></td><td>   
  		<input id="nip" name="nip" placeholder="NIP / No Reg" type="text" size="50">
		</td></tr>
		<tr><td>
		<label for="namap">Nama </label></td><td>   
		<input id="namap" name="namap" placeholder="Nama Pengurus" type="text" size="50">
		</td></tr>
		<tr><td><label for="jabat">Jabatan </label></td><td>   
		<select id="jabat" name="jabat" placeholder="Jabatan">
		<option value="k">Ketua Dewan Pengarah </option>
		<option value="s">Ketua / Direktur </option>
		<option value="a">Manajer Sertifikasi</option>
		<option value="t">Manajer Administrasi</option>
		<option value="b">Manajer Manajemen Mutu</option>
		<option value="i">Ketua Bidang IT</option>
		</select></td></tr>
		<tr><td colspan="2">
		<div class="buttons">
		<input id="gobutton" type="submit" value="Simpan " />
		</div>
		</td></tr>

<?php
   echo "</table>";
   echo "</form>";
}
else if ($op == "appendpengurus")
     {
      //$idskema=$_POST['skema'];
      $nip=$_POST['nip'];
      $namap=$_POST['namap'];
      $jabat=$_POST['jabat'];
      //$kodesya=$_POST['kodesya'];
    if (!empty($nip)){
      			$queryuappendpengurus = "INSERT INTO pengurus VALUE('','$namap','$nip','$jabat','')";
			//	  echo $queryuappendpengurus;
				  $berhasilpengurus = mysql_query($queryuappendpengurus);
				  if ($berhasilpengurus) { ?>
		<div class="container">
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
      		
	}

else if ($op == "updatepeng")
    {
       // proses untuk updating data setelah diedit
        $idpeng = $_POST['idpeng'];
        $nippeng= $_POST['nippeng'];
        $nmpeng=$_POST['nmpeng'];
        $jbpeng=$_POST['jbpeng'];
		// $skema=$_POST['skema'];
		//  $kdsyarat=$_POST['kdsyarat'];
		$queryuupdatepeng = "UPDATE pengurus SET namapengurus='$nmpeng',nip='$nippeng',jabatan='$jbpeng' WHERE idpengurus = '$idpeng'"; 
        //echo $queryuupdatesyaratu;
        $hasiluupdatepeng = mysql_query($queryuupdatepeng);
   
        if ($hasiluupdatepeng) 
        { ?>
		<div class="container">
        <div class="alert alert-success">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Update Sukses ..!</strong>
        </div>
		</div> <?php 
		} else {
		?>
		<div class="container">
        <div class="alert alert-warning">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Update Gagal ..!</strong>
        </div>
		</div> <?php
		}                       
	}
else if ($op == "deletepengurus"){
   		$idp= $_GET['idp'];
   		$queryudelpengurus = "SELECT * FROM pengurus where idpengurus = '$idp'";
   		//echo $queryudelpengurus;
		$hasiludelpengurus = mysql_query($queryudelpengurus);
   		$dataudelpengurus  = mysql_fetch_array($hasiludelpengurus);
	    $nmpengurus=$dataudelpengurus['namapengurus'];
		//echo $queryudelsyaratu;
	    //$namaunit=$data['namaunit'];
		//echo "<form name='myform' method='post' action='".$_SERVER['PHP_SELF']."??op=edit'>";
	    echo "<form method=\"post\" action=\"".$_SERVER['PHP_SELF'].
		    "?op=deletepostpengurus\">";
		     echo "<input type=hidden name=idp value=".$idp.">";
          ?>
	 	<table class=demo-table width=80%><tr><td>
          Nama  :  <?php echo $nmpengurus ; ?> <font color="red">Yakin Akan di hapus ??</font>
		</td></tr><tr><td>
     
        	<?php
       		echo "<input type=submit id=gobutton value=Delete>
          </td></tr></table>";
          
		echo "</form>";
		echo "<br/><br/><br/>"; 
	} 

else if ($op == "deletepostpengurus"){
		$sqldelpengurus="DELETE from pengurus WHERE idpengurus=".$_POST['idp'];
		//echo $sqldelpengurus;
		mysql_query($sqldelpengurus);
		if($sqldelpengurus)
		{ ?>
		<div class="container">
        <div class="alert alert-success">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Hapus Sukses ..!</strong>
        </div>
		</div> <?php 
		} else {
    ?>
		<div class="container">
        <div class="alert alert-warning">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Hapus Gagal ..!</strong>
        </div>
		</div> <?php
		}      
	 }
	?>


<body>
	<!--<?php echo "<a href=\"".$_SERVER['PHP_SELF'].
        "?op=tambahkomponenu\" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'></span>Tambah Komponen Umpan Balik</a>";?>-->

	<table class=demo-table></thead><tr>
    <th colspan=5 align=left ><?php echo "<a href=\"".$_SERVER['PHP_SELF'].
        "?op=tambahpengurus\" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'></span>Tambah Pengurus</a>";?></th></tr><tr>
    <th bgcolor='#006699'>No</th>
    <th bgcolor='#006699'>NIP/NO REG </th>
    <th bgcolor='#006699'>Nama  </th>
    <th bgcolor='#006699'>Jabatan</th>
    <th bgcolor='#006699'>Tanda Tangan</th>
    <th bgcolor='#006699' colspan=2>Aksi</th>
	</tr></thead>
 
	<?php
 
	// bagian ini digunakan untuk menampilkan semua data
 
	$no = 1;
	$querypengurus ="SELECT * from pengurus";
	$hasilpengurus = mysql_query($querypengurus);
	while ($datapengurus = mysql_fetch_array($hasilpengurus))
	{
   
      if($datapengurus['jabatan']=='k' )
      {
        $kjabat="Ketua Dewan Pengarah";
      }
      else if($datapengurus['jabatan']=='s')
      {
        $kjabat="Ketua / Direktur ";
      }
	  else if($datapengurus['jabatan']=='a')
      {
        $kjabat="Manajer Sertifikasi";
      }
	  else if($datapengurus['jabatan']=='b')
      {
        $kjabat="Manajer Manajemen Mutu";
      }
	  else if($datapengurus['jabatan']=='i')
      {
        $kjabat="Ketua Bidang IT";
      }
	  
      else {
       $kjabat="Manajer Administrasi"; 
      }
      $cekttdpeng=strlen($datapengurus['ttd']);
          if ($cekttdpeng<1)
          {
            $ttdpeng="../imgttd/tidakada.png";
          } else 
          {
            $ttdpeng="../imgttd/".$datapengurus['ttd'];
          } 
       //   echo $ttdpeng;
			echo "<tr>";
			echo "<td bgcolor='#99CCFF'>".$no."</td>";
			echo "<td bgcolor='#99CCFF'>".$datapengurus['nip']."</td>";
			echo "<td bgcolor='#99CCFF'>".$datapengurus['namapengurus']."</td>";
			echo "<td bgcolor='#99CCFF'>".$kjabat."</td>";
			echo "<td bgcolor='#99CCFF'><img src=".$ttdpeng." height='40'></td>";
			echo "<td >
<a href=\"".$_SERVER['PHP_SELF'].
        "?op=editpengurus&idp=".$datapengurus['idpengurus']."\"><span class='glyphicon glyphicon-pencil'>Edit </a>|<a href=\"".$_SERVER['PHP_SELF'].
        "?op=deletepengurus&idp=".$datapengurus['idpengurus']."\"><span class='glyphicon glyphicon-remove'>Hapus</a></td>";
			echo "<td>";
			echo "<a href=../siswa/ttdb/ttdpeng.php?id=".$datapengurus['nip']." class='btn btn-primary btn-sm' role='button' "?> onclick="NewWindow(this.href,'name','400','400','yes');return false" <?php echo "> <span class='glyphicon glyphicon-plus'><strong>Tanda Tangan</strong> </a></td></tr>";

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
