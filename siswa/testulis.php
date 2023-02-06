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
			<li ><a href="pilihskema.php"><svg class="glyph stroked paperclip"><use xlink:href="#stroked-paperclip"/></svg>Pilih SKema</a></li>
			<li><a href="pilihunit.php"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg>Pilih Unit</a></li>
			<li><a href="dashsiswa.php"><svg class="glyph stroked tag"><use xlink:href="#stroked-tag"/></svg>FR.APL. 1</a></li>
			<li class="parent">
			<li><a href="apl2.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg></svg>FR.APL. 2</a></li>
			<li><a href="portofolio.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Portofolio</a></li>
			<li class="active"><a href="testulis.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>FR.IA.05 Pertanyaan Tertulis</a></li>
			<li><a href="mak5.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>FR.AK.03</a></li>
			<li class="parent ">
			<!--<li><a href="feedtes.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"/></svg>FeedBack</a></li>-->
			<li><a href="statussaya.php"><svg class="glyph stroked map"><use xlink:href="#stroked-map"/></svg>Cek Status</a></li>
			<li><a href="banding.php"><svg class="glyph stroked map"><use xlink:href="#stroked-map"/></svg>FR.AK.04 Banding</a></li>
			<li><a href="rahasia.php"><svg class="glyph stroked map"><use xlink:href="#stroked-map"/></svg>FR.AK.01 Kerahsiaan</a></li>
			<li><a href="ubahpassword.php"><svg class="glyph stroked key "><use xlink:href="#stroked-key"/></svg>Ubah Password</a></li>
			<li class="parent ">				
			<li role="presentation" class="divider"></li>		
			<li><a href="../logout.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg> Logout</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<h4>Pilih Kode Unit untuk mulai TES  </h4>
                        
</div><!--/.row-->
		
		
				
		<!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
<!--data nu baru -->

<?php
$op = $_GET['op'];
 
if ($op == "simpanpilihunit")
{

}
?>
<body>
<hr>
	<?php //echo "<a href=\"".$_SERVER['PHP_SELF'].
        //"?op=tambah&kd_modul=".$data['kd_modul']."\" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'>Tambah</a>";
    ?>
    <table ><tr>
    <th bgcolor='#006699'>No</th>
    <th bgcolor='#006699'>Id Skema</th>	
    <!--<th bgcolor='#006699'>Kode Unit</th>-->
    <th bgcolor='#006699'>Judul Skema</th>
    <th bgcolor='#006699'>Aksi</th>
    
    <!--<th bgcolor='#006699'>Aksi</th>-->
	</tr>
 
	<?php
 
// bagian ini digunakan untuk menampilkan semua data
        $cek="select * from skemasiswa where emailsiswa='$uname' and statusapl2='Y'"; 
      //echo $cek;
		$ada=mysql_query($cek);
		$ada4=mysql_fetch_array($ada);
		$idada4=$ada4['idskema'];
		if(mysql_num_rows($ada)>0){
        $permohonantulis="select * from permohonan where email='$uname'";
        //echo "lll".$permohonantulis;
        $permohonantulisa=mysql_query($permohonantulis);
        $permohonantulisb=mysql_num_rows($permohonantulisa);
        $permohonantulisc=mysql_fetch_array($permohonantulisa);
        if ($permohonantulisb>0) {

        	$tgltestulis="select * from tanggaltes where namatuktes='".$permohonantulisc['tuk']."'";
          //  echo ";;;;".$tgltestulis;
            $tgltestulisa=mysql_query($tgltestulis);
            $tgltestulisb=mysql_fetch_array($tgltestulisa);
            $tglhtes=$tgltestulisb['tgltes'];
            $tglhariiini=date('Y-m-d');
     
        }        

        	if (strlen($tglhtes)>0)
        		{$pesantes="Jadwal Tes Anda Tanggal : ".$tglhtes;}
        	else {
        		$pesantes="Belum ada Jadwal";
        	}
     		//echo "lls".$tglhtes;
	       if ($tglhtes==$tglhariiini){
            

		$no = 1;
		//$query ="SELECT unitsiswa.idskema, unitsiswa.idunit,unit.kodeunit,unit.namaunit FROM unitsiswa inner join unit on unitsiswa.idunit=unit.idunit group by unit.kodeunit";
		//$query="select unitalias.idskema,skema.namaskema from unitalias inner join skema on unitalias.idskema=skema.idskema where unitalias.idskema='".$ada4['idskema']."' group by unitalias.idskema";
		$qmalias="select kdmodulalias from modulalias ";
		$qmaliasa=mysql_query($qmalias);
		$qmaliasaa=mysql_fetch_array($qmaliasa);
		$dua=substr($qmaliasaa['kdmodulalias'], 1,1);
		//echo $dua;
		//if($dua==0){
		if($idada4<10){
			$query="select kd_modul,modul from modul where left(kd_modul,1)='$idada4' and status_soal='aktif' group by left(kd_modul,1)";
		
		 } else {
		$query="select kd_modul,modul from modul where left(kd_modul,2)='$idada4' and status_soal='aktif' group by left(kd_modul,2)"; 	
		 }
//echo $query;
	$hasil = mysql_query($query);
    
	while ($data = mysql_fetch_array($hasil))
		{
		$kdmodul=$data['kd_modul'];
		   echo "<tr>";
		   echo "<td bgcolor='#99CCFF'>".$no."</td>";
		   echo "<td bgcolor='#99CCFF'>".$kdmodul."</td>";
		   echo "<td bgcolor='#99CCFF'>".$data['modul']."</td>";
                   echo "<td><form name='myform' method='GET' action='quis/flatmenu.php' target=_blank>
                          <input type=hidden name=md id=md value=".$data['kd_modul'].">
                          <input type=submit id=gobutton value=Mulai> </form></td>";

		   echo "</tr>";
			   $no++;
		}

		} else {
            	echo "<strong><font color=red>".$pesantes."</font></strong>";
         }  

              }else{ ?>				
				<div class="container">
			  	<div class="alert alert-warning">
			    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    	<strong>APL 2 Belum di validasai / Tidak Ada data  ! </strong> <font color="red">Hubungi Asesor
				</font>
			  	</div>
				</div>
				<?php  }

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
 
} ?>
