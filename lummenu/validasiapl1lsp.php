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
<script src="../js/formValidation.min.js"></script>
<script src="../js/framework/bootstrap.min.js"></script>
<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
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
			<li><a href="inputtestulis.php"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>FR.IA.05 Pertanyaan Tertulis</a></li>
			<li class="active"><a href="validasiapl1lsp.php"><svg class="glyph stroked usb flash drive"><use xlink:href="#stroked-usb-flash-drive"/></svg> Validasi APL1</a></li>
			<li><a href="monitorasesi.php"><svg class="glyph stroked desktop computer and mobile"><use xlink:href="#stroked-desktop-computer-and-mobile"/></svg> Monitoring</a></li>
			<li><a href="backupdata.php"><svg class="glyph stroked download"><use xlink:href="#stroked-download"/></svg> Backup data</a></li>
			<li role="presentation" class="divider"></li>
			<li><a href="../logout.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Logout</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<h4><strong> Validasi APL1 </strong></h4>
                        
</div><!--/.row-->
		
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
<!--data nu baru -->

<?php
$op = $_GET['op'];

if ($op == "listpesertalsp")
{
    $tgl=$_POST['tgl'];    
    $cekvlapl1="select apl1.namasiswa,apl1.email,apl1.email2,apl1.validasiapl1,apl1.buktiapl1,apl1.idasesi, skemasiswa.tglrekskema,skemasiswa.idskema from apl1 INNER JOIN skemasiswa ON apl1.email = skemasiswa.emailsiswa where skemasiswa.tglrekskema='$tgl'"; 
	$cekvlapl1a=mysql_query($cekvlapl1);
     ?>
    Cari Nama Peserta <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari Nama .." title="Type in a name">
    <?php
    echo "<table class=demo-table id=myTable>";
    echo "<thead><tr><th colspan=8>validasi apl1 lsp</th></tr><tr><th bgcolor='#006699'>Nama Asesi</th><th bgcolor='#006699'>Permohonan</th><th bgcolor='#006699'>Pengajuan</th><th bgcolor='#006699'>Biodata</th><th bgcolor='#006699'>Ket</th><th colspan=2 bgcolor='#006699'>Aksi</th></tr></thead>";
     while($cekvlapl1c=mysql_fetch_array($cekvlapl1a))
      {

      $b=mysql_num_rows($cekvlapl1a);
 
           if($b==0)
           	{$ketvl="<font color=green><span class='glyphicon glyphicon-search'>Belum mengisi</font>";
	              $yed='y';
	        } else 
	        {
	        	if($cekvlapl1c['validasiapl1']=='N')
	        	{
				$ketvl="<font color=red><span class='glyphicon glyphicon-remove'>Belum divalidasi</font>";
	             $ved='y';

	        	} else 
	        	{
				$ketvl="<font color=blue><span class='glyphicon glyphicon-ok'>Sudah Divalidasi</font>";
                  $ved='n';

	        	}

	        }
	        
      $buktiapl1t=$cekvlapl1c['buktiapl1'];
      
      $buktiapl1="<a href=../siswa/gambarimages/".$cekvlapl1c['buktiapl1']." target=_blank>Lihat Bukti</a>";
      echo "<tr><td>".$cekvlapl1c['namasiswa']."</td>";
      echo "<td><a href=\"validasiapl1lsp2.php?idasesi=".$cekvlapl1c['idasesi']."&idskema=".$cekvlapl1c['idskema']."\" ";?>onclick="NewWindow(this.href,'name','700','1300','no');return false" <?php echo "><span class='glyphicon glyphicon-check'>Cek permohonan</a></td>";
      //$email2y=
      echo"<td>$buktiapl1</td>";
      echo"<td align=left><a href=../siswa/biodatasiswapdf.php?email=" .trim($cekvlapl1c['email']) ;?> onclick="NewWindow(this.href,'name','700','1300','no');return false" <?php echo "><span class='glyphicon glyphicon-user'>Biodata </a></td>";
      echo "<td>".$ketvl."</td>";
      $ei="in";
      if($b>0){ 
      echo "<td><a href=\"".$_SERVER['PHP_SELF'].
        "?op=validasidataapl&idasesi=".$cekvlapl1c['idasesi']."&tgllsp=".$tgl."&emailps=".$cekvlapl1c['email']."\"><span class='glyphicon glyphicon-check' >Validasi</a></td>";
      
       }
       else 
       { echo "<td><span class='glyphicon glyphicon-check' >Validasi</td>";
		} 
       }
     echo "<table class=demo-table>";

}
else if ($op == "validasidataapl")
 {
	 ?>
    <button type="button" class="btn btn-primary" onclick="window.print()">Print Halaman Ini</button>
    <?php
 	$idasesi=$_GET['idasesi'];
 	$tgllsp=$_GET['tgllsp'];
 	$emailsya=$_GET['emailps'];
	echo "<form id=\"formContoh\" method=\"post\" action=\"".$_SERVER['PHP_SELF'].
        "?op=simpanvalidasilsp\">";
 	$ceksya="select * from skemasiswa where emailsiswa='$emailsya'"; // and statusapl2='N'"and statustesp='N'
	// echo $ceksya;
	 $adasya=mysql_query($ceksya);
	 $execsy=mysql_fetch_array($adasya);
	 $idskemasya=$execsy['idskema'];
	 
	 $listsy="select * from syarat where idskema='$idskemasya' and kodesyarat='1'";
	 $listsya=mysql_query($listsy);	 
	 echo "<table class=demo-table  width=90%>";
	 echo "<tr><th colspan=5>Bukti kelengkapan persyaratan dasar permohonan</th></tr>";
	 echo "<tr><th rowspan=2 align=center bgcolor='#006699'>NO</th><th rowspan=2 bgcolor='#006699'>Bukti persyaratan </th><th colspan=2 bgcolor='#006699'>Ada</th><th rowspan=2 bgcolor='#006699'>Tidak ada</th></tr>";
		echo "<tr><th bgcolor='#006699'>Memenuhi syarat</td><th bgcolor='#006699'>Tidak memenuhi syarat</td></tr>";
	    $nom=1;
	    $ii=0;
   while($listsyb=mysql_fetch_array($listsya)){
    $idsyarata=$listsyb['idsyarat'];
    echo "<tr><td>".$nom."</td>";
    echo "<td>".$listsyb['syarat']."</td>";
    $ceksyaratpdulu="Select * from syaratsiswa where idskema='$idskemasya' and idasesi='$idasesi' and idsyarat='$idsyarata'";
    //echo $ceksyaratpdulu;
    $ceksyaratpdulua=mysql_query($ceksyaratpdulu);
    $ceksyaratpdulub=mysql_num_rows($ceksyaratpdulua);
    $ceksyaratpduluc=mysql_fetch_array($ceksyaratpdulua);
    if($ceksyaratpdulub>0)
    {
    	if($ceksyaratpduluc['ceklista']=='mms')
    	{
    	//echo "mms".$ii;
    	$ckllistsya="checked";
    	}else 
    	 {
    	 	$ckllistsya=" ";
    	 }
    	if($ceksyaratpduluc['ceklista']=='tmms')
    	{
    	//echo "mms".$ii;
    	$ckllistsyb="checked";
    	}else 
    	 {
    	 	$ckllistsyb=" ";
    	 }
    	if($ceksyaratpduluc['ceklista']=='tdk')
    	{
    	//echo "mms".$ii;
    	$ckllistsyac="checked";
    	}else 
    	 {
    	 	$ckllistsyac=" ";
    	 }    
    } 
    
    echo "<td><input type=hidden name=idsyaratsatu".$ii." value='$idsyarata'><input type=radio name=adamsy".$ii." value='mms' $ckllistsya></td><td><input type=radio name=adamsy".$ii." value='tmms' $ckllistsyb></td><td><input type=radio name=adamsy".$ii." value='tdk' $ckllistsyac></td></tr>";
    $nom++;
    $ii++;
	} 
	 echo "<table class=demo-table  width=90%>";
	 echo "<tr><th colspan=5>Bukti kelengkapan kompetensi relevan</th></tr>";
	 echo "<tr><th rowspan=2 align=center bgcolor='#006699'>NO</th><th rowspan=2 bgcolor='#006699'>Bukti persyaratan </th><th colspan=2 bgcolor='#006699'>Lampiran bukti</th></tr>";
		echo "<tr><th bgcolor='#006699'>Ada</td><th bgcolor='#006699'>Tidak Ada</td></tr>";
	 $listsyb="select * from syarat where idskema='$idskemasya' and kodesyarat='2'";
	 
	 $listsyab=mysql_query($listsyb);
	 
	 $nomb=1;
	 $iib=0;
	 
   while($listsybb=mysql_fetch_array($listsyab)){
    $idsyaratab=$listsybb['idsyarat'];
    //$idsyaratd=$listsybb['']
    echo "<tr><td>".$nomb."</td>";
    echo "<td>".$listsybb['syarat']."</td>";
    $ceksyaratpduluz="Select * from syaratsiswa where idskema='$idskemasya' and idasesi='$idasesi' and idsyarat='$idsyaratab'";
   // echo $ceksyaratpdulu;
    $ceksyaratpduluaz=mysql_query($ceksyaratpduluz);
    $ceksyaratpdulubz=mysql_num_rows($ceksyaratpduluaz);
    $ceksyaratpdulucz=mysql_fetch_array($ceksyaratpduluaz);
    if($ceksyaratpdulucz['ceklistb']=='Y')
    	{
    	//echo "mms".$ii;
    	$ckllistsyaz="checked";
    	}else 
    	 {
    	 	$ckllistsyaz=" ";
    	 }
    	 if($ceksyaratpdulucz['ceklistb']=='T')
    	{
    	//echo "mms".$ii;
    	$ckllistsyazz="checked";
    	}else 
    	 {
    	 	$ckllistsyazz=" ";
    	 }
		echo "<td><input type=hidden name=idsyaratdua".$iib." value='$idsyaratab'><input type=radio name=adamsyaxx".$iib." value='Y' $ckllistsyaz></td><td><input type=radio name=adamsyaxx".$iib." value='T' $ckllistsyazz></td></tr>";
		$nomb++;
		$iib++;
	} 

 	//echo $idasesi;
 	    $apl1skemasiswa="select skemasiswa.idskema,skemasiswa.emailsiswa,skemasiswa.statusapl1,skemasiswa.statusapl2,skemasiswa.statustest,skema.idskema,skema.namaskema from skemasiswa inner join skema on skemasiswa.idskema = skema.idskema where skemasiswa.emailsiswa='$emailsya' and (skemasiswa.statusapl1='N' or skemasiswa.statusapl2='N')";
 	    $apl1skemasiswaa=mysql_query($apl1skemasiswa);
 	    $apl1skemasiswaab=mysql_fetch_array($apl1skemasiswaa);
 	    //echo $apl1skemasiswa;
        
 	    $apl1abcd="SELECT lsp_usertbl.email as emailusr,lsp_usertbl.linkttd,lsp_usertbl.id_user, apl1.namasiswa, apl1.email as email,apl1.buktiapl1,apl1.poto FROM lsp_usertbl left JOIN apl1 ON lsp_usertbl.email=apl1.email where apl1.idasesi='".$idasesi."'";
 		//$apl1abcd="select namasiswa,validasiapl1 from apl1 where idasesi='".$idasesi."' group by idasesi";
        $apl1abcde=mysql_query($apl1abcd);
        $apl1abcdef=mysql_fetch_array($apl1abcde);
        $linkttda="../imgttd/".$apl1abcdef['linkttd'];
 		$cekdata0 = "SELECT * FROM rekomendasi WHERE namarekom = 'apl1lsp' and idskema='".$idskemasya."'and idasesi='$idasesi'";
        //echo $cekdata0;
		$ada0=mysql_query($cekdata0);
		$adax=mysql_fetch_array($ada0);
		$idrekom=$adax['idrekomendasi'];
		$lrek=$adax['rekom'];
		$cat=$adax['catatan'];
		if($lrek=='L'){
		 $klrek='checked';
		}else{$klrek='';}
		if($lrek=='T'){
         $klrek0='checked';
		}else{$klrek0='';}
        $pengurusapl1="select * from pengurus where jabatan='a'";
		$pengurusaapl1=mysql_query($pengurusapl1);
		$pengurusbapl1=mysql_fetch_array($pengurusaapl1);
		$pttdapl1="../imgttd/".$pengurusbapl1['ttd'];
        //echo $pengurusapl1;
        echo "<input type=hidden name=idskemalsp value='".$idskemasya."'>";
        echo "<input type=hidden name=idasesilsp value='".$apl1abcdef['id_user']."'>";
        echo "<input type=hidden name=tgllsp value=".$tgllsp.">";
        echo "<input type=hidden name=emailusrlsp value='".$apl1abcdef['emailusr']."'>";
        echo "<input type=hidden name=idrekomlm value='".$idrekom."'>";
        
	echo "<table><tr><td><strong>".$apl1skemasiswaab['namaskema']."</strog></td></tr>"; /*<tr><td><a href=\"validasiapl1lsp2.php?idasesi=".$idasesi."&idskema=".$apl1skemasiswaab['idskema']."\" ";?>onclick="NewWindow(this.href,'name','700','1300','no');return false" <?php echo "><span class='glyphicon glyphicon-check'>Cek Unit dan Pengajuan Sertifikasi </a></td><td align=left><a href=../siswa/biodatasiswapdf.php?email=" .trim($apl1abcdef['email']) ;?> onclick="NewWindow(this.href,'name','700','1300','no');return false" <?php echo "><span class='glyphicon glyphicon-user'>Tampilkan biodata </a></td></tr>*/ echo "</table><table><tr><td  rowspan=4 width=50%><strong>Rekomendasi di isi LSP</strong> </br>Berdasarkan ketentuan persyaratan dasar pemohon,</br>pemohon <strong>(Diterima/Ditolak)</strong>: </br><input type=radio name=lsprekom value='L' $klrek>Diterima</br> <input type=radio name=lsprekom value='T' $klrek0>Ditolak</br>sebagai peserta sertifikasi</td></tr><tr><td colspan=2><strong>Pemohon : </strong> </td></tr><tr><td>Nama  </td><td>".$apl1abcdef['namasiswa']."</td></tr><tr><td> Tanda tangan  </td><td><img src='".$linkttda."'></td></tr></tr><tr><td  rowspan=5 width=50%><strong>Catatan : </strong></br><textarea name=cttlsp rows=3 cols=40 value=>$cat</textarea> </td></tr><tr><td colspan=2>Admin LSP </td></tr><tr><td>Nama  </td><td>".$pengurusbapl1['namapengurus']."</td></tr><tr><td>NIK LSP </td><td></td></tr><tr><td>Tanda Tangan  </td><td><img src='$pttdapl1'></td></tr><tr><td colspan=3><input type='hidden' name='na' value='".$ii."'>
	 <input type='hidden' name='nb' value='".$iib."'> <input type=submit id=gobutton value=Simpan class=button></td></tr> </table></form>";
 }

 else if ($op == "simpanvalidasilsp")
 {
  $idskemalspa=$_POST['idskemalsp'];
  $idasesilspa=$_POST['idasesilsp'];
  $lsprekoma=$_POST['lsprekom'];
  $cttlspa=$_POST['cttlsp'];
  $tgllspa=$_POST['tgllsp'];
  $emailusrlsp=$_POST['emailusrlsp'];
  $idrekoml=$_POST['idrekomlm'];
  $na=$_POST['na'];
  $nb=$_POST['nb'];
  //echo "na".$na;
  
  for ($o=0; $o<=$na-1; $o++)
   {

    if(isset($_POST['adamsy'.$o]))
    {
     $idsyaratc=$_POST['idsyaratsatu'.$o];
     $adamsyx=$_POST['adamsy'.$o];     
     $ceksyaratp="Select * from syaratsiswa where idskema='$idskemalspa' and idasesi='$idasesilspa' and idsyarat='$idsyaratc'";
     //echo $ceksyaratp;
     $ceksyaratpa=mysql_query($ceksyaratp);
     $ceksyaratpb=mysql_num_rows($ceksyaratpa);
    if ($ceksyaratpb>0 )
     {
     	$ubahsysis="update syaratsiswa set ceklista='".$adamsyx."' where    idskema='".$idskemalspa."' and idasesi='".$idasesilspa."' and idsyarat='".$idsyaratc."'";
		 
     }
        else
        {
        	$ubahsysis="insert into syaratsiswa(idsyaratsiswa,idsyarat,idskema,idasesi,ceklista) value ('','$idsyaratc','$idskemalspa','$idasesilspa','$adamsyx')";
        }
        //echo $ubahsysis;
        $execubahsysis=mysql_query($ubahsysis);
    }
   }
       
   for ($b=0; $b<=$nb-1; $b++)
   {
      if(isset($_POST['adamsyaxx'.$b]))
    {
     $idsyaratcb=$_POST['idsyaratdua'.$b];	
     //echo $idsyaratcb;
     $adamsyax=$_POST['adamsyaxx'.$b];
     $ceksyaratp="Select * from syaratsiswa where idskema='$idskemalspa' and idasesi='$idasesilspa' and idsyarat='$idsyaratcb'";
     $ceksyaratpd=mysql_query($ceksyaratp);
     $ceksyaratpe=mysql_num_rows($ceksyaratpd);
     if($ceksyaratpe>0)
     {
     	$ubahsysisz="update syaratsiswa set ceklistb='".$adamsyax."' where    idskema='".$idskemalspa."' and idasesi='".$idasesilspa."' and idsyarat='".$idsyaratcb."'";	
     } else 
     {
     	$ubahsysisz="insert into syaratsiswa(idsyaratsiswa,idsyarat,idskema,idasesi,ceklistb) value ('','$idsyaratcb','$idskemalspa','$idasesilspa','$adamsyax')";
     } 
        //echo $ubahsysisz;
     $execubahsysisz=mysql_query($ubahsysisz);
    }  
    }

	$cekdatalsp = "SELECT * FROM rekomendasi WHERE namarekom = 'apl1lsp' and idskema='$idskemalspa' and idasesi='$idasesilspa' and tanggal='$tgllspa'";
	//echo "cek dulu".$cekdatalsp;
	$adalsp=mysql_query($cekdatalsp);
   	if(mysql_num_rows($adalsp)>0){
    //$ssqlllsp="bismillah";
    $ssqlllsp="UPDATE rekomendasi SET rekom ='$lsprekoma', catatan='$cttlspa' where namarekom = 'apl1lsp' and idskema='$idskemalspa' and idasesi='$idasesilspa' and tanggal='$tgllspa'"; 

    }else{$ssqlllsp="insert into rekomendasi value('','apl1lsp','$idskemalspa','LSP','$idasesilspa','$lsprekoma','$cttlspa','','$tgllspa')";}
   //echo "yang aktif".$ssqlllsp;
	$exec=mysql_query($ssqlllsp);
	$updatesksiswalsp="update skemasiswa set statusapl1='Y' where emailsiswa='$emailusrlsp' and idskema='$idskemalspa' and tglrekskema='$tgllspa'";
	//echo $updatesksiswalsp;
	$execulsp=mysql_query($updatesksiswalsp);
	$updatepermohonanlsp="update permohonan set statusvalid='Y' where idskema='$idskemalspa' and id_user='$idasesilspa' and tanggal='$tgllspa'";
         //echo $updatepermohonan;
	$proslsp=mysql_query($updatepermohonanlsp);
	$updateapl1lsp="update apl1 set validasiapl1='Y' where idasesi='$idasesilspa'";
	$uppostlsp=mysql_query($updateapl1lsp);
	if ($uppostlsp) 
	{ echo "<form id=\"formContoh\" method=\"post\" action=\"".$_SERVER['PHP_SELF'].
        "?op=listpesertalsp\">";
        echo "<input type=hidden name=tgl value=".$tgllspa.">";
        echo "<input type=submit id=gobutton value=Sukses&nbsp;Klik&nbsp;untuk&nbsp;melanjutkan></form>";
        //echo"<script>alert('Sukses ..!');history.go(-3);</script>";
        ?>
  	
  <?php }
	else { ?>
  	<div class="container">
			  	<div class="alert alert-warning">
			    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    	<strong>Gagal!</strong> ....
				</div>
  <?php }
 }

?>

<body>
<br/>
<form id="formContoh" method="POST" <?php echo "action=\"".$_SERVER['PHP_SELF'].
        "?op=listpesertalsp\"";?>> 
<input type="hidden" name="kelompok" value="<?php echo $kelompok ;?>">
<input type="hidden" name="idskema" value="<?php echo $idskema ;?>">
<!--<input type="hidden" name="idasesor" value="<?php echo $idasesor ;?>">-->

<div class="form-group"><strong>Pilih Tanggal :</strong>
<select id="tgl" name="tgl" placeholder="Tanggal" autofocus>
<?php
      $tampiltgl="select * from skemasiswa group by tglrekskema";
      $exectgl=mysql_query($tampiltgl);
      //echo $tampiltgl;
		while($rtgl=mysql_fetch_array($exectgl))
		{
                //         echo "ll";
   			echo "<option value=$rtgl[tglrekskema] selected>$rtgl[tglrekskema]</option> ";
		}
?>
	 </select>
	</div>
	<input type="submit" id="gobutton" value="Lanjutkan" class="button"> 
<!--end databaru-->
		<div>
		</div>
	    </div>
        </div> 

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>		
</body>
</html>
<?php 
   }
  } ?>
