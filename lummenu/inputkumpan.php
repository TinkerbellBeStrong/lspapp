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
			<li class="active"><a href="inputkumpan.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Input Umpan Balik</a></li>
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
			<h4><strong>Pengeloaan Komponen Umpan Balik</strong></h4>
                        
</div><!--/.row-->
						
		<!--/.row-->
		<div class="row">
			<div class="col-lg-12">
<!--data nu baru -->
<?php
$op = $_GET['op'];
 
if ($op == "editsyaratu")
{
   // proses untuk menampilkan data yang akan diedit pada form
   $idsyaratu= $_GET['idsyaratu'];
   $queryueditsyu = "SELECT * FROM qmak5 WHERE idqmak5 = '$idsyaratu'";
   $hasilueditsyu = mysql_query($queryueditsyu);
   $dataueditsyu  = mysql_fetch_array($hasilueditsyu);
   $nmsyaratu = $dataueditsyu['qmak5'];
   //$idskema=$dataueditsy['idskema'];
   $idsyaratu=$dataueditsyu['idsyaratu'];
   echo "<form method=\"post\" action=\"".$_SERVER['PHP_SELF'].
        "?op=updatesyaratu\">";

   ?>
  <table class=demo-table width=80%><tr><td>
  <label for="syaratu">Komponen Umpan Balik </label>
    <input id="syaratu" name="syaratu" placeholder="Komponen Umpan Balik" type="text" size="90" value="<?php echo $nmsyaratu;?> ">
	</td></tr></table>
  	<?php
   		echo "</table>";
   		echo "<input type=\"hidden\" name=\"idsyaratu\"
         value=\"".$dataueditsyu['idqmak5']."\">";
   		?>
		<div class="buttons">
		<input id="gobutton" type="submit" value="Simpan " />
		</div>
		<?php
	   echo "</br>";      
	   echo "</form>";
	}
	else if ($op == "tambahku")
	{
 		echo "<form method=\"post\" action=\"".$_SERVER['PHP_SELF'].
        "?op=appendku\">";
   		echo "<table border=\"0\">";
  		?>
		<table class=demo-table width=80%><tr><th>
		Tambah Umpan Balik </th></tr><tr><td>
 		
		<tr><td>
		<label for="syaratu">Komponen Umpan Balik</label>   
  		<input id="syaratu" name="syaratu" placeholder="Komponen Umpan Balik" type="text" size="70">
    	</td></tr><tr><td>
		<div class="buttons">
		<input id="gobutton" type="submit" value="Simpan " />
		</div>
		</td></tr>

<?php
		echo "</table>";
		echo "</form>";
	}
else if ($op == "appendku")
     {
      //$idskema=$_POST['skema'];
      $syaratu=$_POST['syaratu'];
      //$kodesya=$_POST['kodesya'];
      		if (!empty($syaratu)){
      			$queryuappendsyaratu = "INSERT INTO qmak5 VALUE('','$syaratu')";
				 // echo $queryuappendsyarat;
				  $berhasilsyaratu = mysql_query($queryuappendsyaratu);
				  if ($berhasilsyaratu) { ?>
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

else if ($op == "updatesyaratu")
     {
       // proses untuk updating data setelah diedit
        $idsyaratu = $_POST['idsyaratu'];
        $syaratu= $_POST['syaratu'];
		// $skema=$_POST['skema'];
		//  $kdsyarat=$_POST['kdsyarat'];
			$queryuupdatesyaratu = "UPDATE qmak5 SET qmak5='$syaratu' WHERE idqmak5 = '$idsyaratu'"; 
        //echo $queryuupdatesyaratu;
        	$hasiluupdatesyaratu = mysql_query($queryuupdatesyaratu);

        		if ($hasiluupdatesyaratu) 
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
else if ($op == "deletesyaratu"){
   		$idsyaratu= $_GET['idsyaratu'];
   		$queryudelsyaratu = "SELECT * FROM qmak5 where idqmak5 = '$idsyaratu'";
   		$hasiludelsyaratu = mysql_query($queryudelsyaratu);
   		$dataudelsyaratu  = mysql_fetch_array($hasiludelsyaratu);
	    $nmsyaratu=$dataudelsyaratu['qmak5'];
		//echo $queryudelsyaratu;
	    //$namaunit=$data['namaunit'];
		//echo "<form name='myform' method='post' action='".$_SERVER['PHP_SELF']."??op=edit'>";
	    echo "<form method=\"post\" action=\"".$_SERVER['PHP_SELF'].
		    "?op=deletepostsyaratu\">";
		     echo "<input type=hidden name=idsyaratu value=".$idsyaratu.">";
          ?>
	 	<table class=demo-table width=80%><tr><td>
          Komponen :  <?php echo $nmsyaratu ; ?> <font color="red">Yakin Akan di hapus ??</font>
		</td></tr><tr><td>
        	<?php
       		echo "<input type=submit id=gobutton value=Delete>
          </td></tr></table>";
          
		echo "</form>";
		echo "<br/><br/><br/>"; 
	} 

else if ($op == "deletepostsyaratu"){
		$sqldelsyaratu="DELETE from qmak5 WHERE idqmak5=".$_POST['idsyaratu'];
		//echo $sqldelsyaratu;
		mysql_query($sqldelsyaratu);
		if($sqldelsyaratu)
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
        "?op=tambahku\" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'></span>Tambah Komponen Umpan Balik</a>";?></th></tr><tr>
    <th bgcolor='#006699'>No</th>
    <th bgcolor='#006699'>Pertanyaan</th>
    <th bgcolor='#006699'>Aksi</th>
	</tr></thead>
	<?php
 
// bagian ini digunakan untuk menampilkan semua data
 
	$no = 1;
	$querykumpan ="SELECT * from qmak5";
	$hasilkumpan = mysql_query($querykumpan);
	while ($datakumpan = mysql_fetch_array($hasilkumpan))
		{
		   echo "<tr>";
		   echo "<td bgcolor='#99CCFF'>".$no."</td>";
		   echo "<td bgcolor='#99CCFF'>".$datakumpan['qmak5']."</td>";  
		   echo "<td >
<a href=\"".$_SERVER['PHP_SELF'].
        "?op=editsyaratu&idsyaratu=".$datakumpan['idqmak5']."\"><span class='glyphicon glyphicon-pencil'>Edit </a>|<a href=\"".$_SERVER['PHP_SELF'].
        "?op=deletesyaratu&idsyaratu=".$datakumpan['idqmak5']."\"><span class='glyphicon glyphicon-remove'>Hapus</a></td>";
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
