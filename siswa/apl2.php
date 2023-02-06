<DOCTYPE html>
<?php
error_reporting(0);
session_start();
?>
<html>
<link href="css/tabel.css" rel="stylesheet" type="text/css" />

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
 
//session_start();
if(isset($_SESSION['username'])) { $unameapl2=$_SESSION['username'];}
else { $unameapl2=$_SESSION['username'];}
$lapl2="SELECT * FROM lsp_usertbl WHERE email='".$unameapl2."'";
$resultxapl2=mysql_query($lapl2);
$hasilxapl2=mysql_fetch_array($resultxapl2);
$namaxapl2=$hasilxapl2['nama'];
//$tglregapl2a=$hasilx 

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

	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><img src="../images/logolsp.png" alt="" height="30"><span><?php echo " ".$namaxapl2 ;?></a>
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
			<li><a href="dashsiswa.php"><svg class="glyph stroked tag"><use xlink:href="#stroked-tag"/></svg>FR.APL. 1</a></li>
			<li class="parent">
			<li  class="active"><a href="apl2.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg></svg>FR.APL. 2</a></li>
			<li><a href="portofolio.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Portofolio</a></li>
			<li><a href="testulis.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>FR.IA.05 Pertanyaan Tertulis</a></li>
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
			<h4>FR-APL-02 ASESMEN MANDIRI</h4>
                        
</div><!--/.row-->
		
		
				
		<!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
<!--data nu baru -->



	<!--<title>Multiple Upload Foto dengan PHP</title>

	<style>

	#progress { position:relative; width:300px;color:#111; border: 1px solid #ddd; padding: 1px;
				 border-radius: 3px;display: none; }
	#bar { background-color: #d2322d; width:0%; height:20px; border-radius: 3px; }
	#percent { position:absolute; display:inline-block; top:3px; left:48%; }

	</style>-->

	<!-- Jquery 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>-->
	<!-- Library Jquery untuk pengiriman form dengan jquery ajax  
	<script src="http://malsup.github.com/jquery.form.js"></script>-->
<?php 
$op = $_GET['op'];
 

if ($op == "listsubkompetensi")
{
    ?>
    <button type="button" class="btn btn-primary" onclick="window.print()">Print Halaman Ini</button>
    <?php
$emailuserapl2= trim($unameapl2);
$namaass=$_POST['namaass'];
$namap=$_POST['namap'];
$tglregg=$_POST['tglregg'];
$cektglpel="select * from permohonan where email='$emailuserapl2' and tanggal='$tglregg'";
$cektglpela=mysql_query($cektglpel);
$cektglpelb=mysql_fetch_array($cektglpela);
$tglpel=$cektglpelb['tanggalp'];
//echo "lklkl".$tglpel;
echo "<form id=\"formContoh\" method=\"post\" action=\"".$_SERVER['PHP_SELF'].
        "?op=simpanapl2\" onSubmit=\"return confirm('Apakah yakin sudah MEMILIH semua dan ingin disimpan ??')\" >";
echo "<table class=demo-table><tr><td colspan=8>FR-APL-02 ASESMEN MANDIRI</td></tr><tr><td colspan=4>
        Nama Peserta : $namap </td><td colspan=4> </td></tr><tr>
        <td colspan=4>Nama Asesor : $namaass<td colspan=4></td></tr>             
        <tr><td colspan=8> Pada Bagian ini anda di minta untuk menilai diri sendiri terhadap unit kompetensi yang akan di ases</td></tr><tr> 
       <td colspan=8>1. Pelajari seluruh standar Kriteria Unjuk Kerja  (KUK), batasan variabel, panduan penilaian dan aspek kritis serta yakinkan bahwa anda sudah benar-benar memahami seluruh isinya.</br>
2. Laksanakan penilaian mandiri dengan mempelajari dan menilai kemampuan yang anda miliki secara obyektif terhadap seluruh daftar pertanyaan yang ada, serta tentukan apakah sudah kompeten (K) atau belum kompeten (BK). </br>  
3. Siapkan bukti-bukti yang anda anggap relevan terhadap unit kompetensi, serta ‘matching’-kan setiap bukti yang ada terhadap setiap elemen/KUK, konteks variable, pengetahuan dan keterampilan yang dipersyaratkan serta aspek kritis</br>
4. Asesor dan asesi menandatangi form Asesmen Mandiri.</td></tr>";
  

$n = $_POST['n'];
$cc=0;
$ii=0; 
$cc=0;
$ccc=0;
$zi=0;
for ($c=0; $c<=$n-1; $c++)
   		{
     if (isset($_POST['idunit'.$c]))

     		 {
			  
                       //echo $_POST['kodeunit'.$c];
                       $pjng=strlen($_POST['kodeunit'.$c]);
                       
                    if ($pjng>0)
                       	{ 
               $ccc++;
               
               if ($ccc <=2  ){
               	//echo "satu";
         $idskemaapl2=$_POST['idskema'.$c];
         $idunitxxapl2=$_POST['idunit'.$c];
         //echo $idunitxxapl2;
$sql="select * from lsp_usertbl where email='$emailuserapl2'";
	$shasil=mysql_query($sql);
	$sdata=mysql_fetch_array($shasil);
	$namap=$sdata['nama'];
	$idp=$sdata['id_user'];
    $tgluser=$sdata['kode'];
 
    
    $sqlunit="select unitsiswa.idunit,unitsiswa.idskema,unitsiswa.idadsesi,unit.kodeunit,unit.namaunit from unitsiswa inner join unit on unitsiswa.idunit=unit.idunit where unitsiswa.idskema='$idskemaapl2' and unitsiswa.idadsesi='$idp' and unit.idunit='$idunitxxapl2' order by unitsiswa.idunit";
    //echo $sqlunit;
    $eunit=mysql_query($sqlunit);
      $i=0;
    echo "<input type=hidden name=idskema value='$idskemaapl2'>";
    echo "<input type=hidden name=idadsesi value='$idp'>";
    echo "<input type=hidden name=email value='$emailuserapl2'>";
     while ($dunit=mysql_fetch_array($eunit))
    {
   
       $sqelemen="select * from elemen where idunit='".$idunitxxapl2."' and idskema='".$idskemaapl2."'";
       //echo $sqelemen;
       $eelemen=mysql_query($sqelemen);
      echo "<tr><th colspan=8>".$dunit['namaunit']."</th></tr>";
         $y=0;
        while ($delemen=mysql_fetch_array($eelemen))
      	{
          $y++;
           	
           $sqsubelemen="select * from subelemen where idelemen='".$delemen['idelemen']."' and idunit='".$idunitxxapl2."' and idskema='".$idskemaapl2."'";
            $esubelemen=mysql_query($sqsubelemen);

            $x=0;
                        echo "<tr><th colspan=8>".$delemen['namaelemen']."</th></tr>";
                        echo "<tr><td colspan=3><strong>NO</strong></td><td><strong>SUB KOMPETENSI</strong></td><td><strong>K</strong></td><td><strong>BK</strong></td><td colspan=2><strong>BUKTI  PENDUKUNG</strong> </td></tr>"; 
                        
			while ($dsubelemen=mysql_fetch_array($esubelemen))
			{
              $idsube=$dsubelemen['idsubelemen'];
              $cekdiapl2="select idskema,idunit,idelemen,idsubelemen,idadsesi,tk from apl2 where idskema='".$idskemaapl2."' and idunit='".$idunitxxapl2."' and idelemen='".$delemen['idelemen']."' and idsubelemen='".$idsube."' and idadsesi='".$idp."'";
              //echo $cekdiapl2;
              $cekdiapl2a=mysql_query($cekdiapl2);
              $cekdiapl2b=mysql_fetch_array($cekdiapl2a);
              $cekdiapl2c=$cekdiapl2b['tk'];
              //echo $cekdiapl2c;
              if(mysql_num_rows($cekdiapl2a)>0);
                {
                	//echo "adadad";
                	if ($cekdiapl2c=='K')
                	{
                	$kapl2='checked';
                    }
                     else 
                    {
                	 $kapl2='';
                    }
                    if($cekdiapl2b['tk']=='BK')
                    {
                    	$bkapl2='checked';
                    }
                    else
                    {
                    	$bkapl2='';
                    }
                }
                //echo $kapl2;

              //echo $cekdiapl2;
              $x++;
           
               echo"<tr><td colspan=3>".$y.".".$x."</td><td>".$dsubelemen['pertanyaan']."<input type=hidden name=idunit".$zi." value=".$dunit['idunit'].">";
               echo"<input type=hidden name=idelemen".$zi." value=".$delemen['idelemen']."></td>";
               echo"<td><input type=radio name=bk".$zi." value=k $kapl2><br/></td>";
               echo"<td><input type=radio name=bk".$zi." value=bk $bkapl2></td>";
               echo"<td><input type=hidden name=idsube".$zi." value='$idsube'></td>";?></td><td><input type="file" name="fotox2[]" disabled="disabled"/></td>
       <?php

             $i++; 
             $zi++;    
                       }
        
 	     }
      }

      	//untuk ccc
          } 
         }//else {$pesantdkp="ANDA TIDAK MEMILIH UNIT TIDAK ADA SUB KOMPETENSI YANG DI TAMPILKAN";}
      }
      //untuk for 
        }
        echo "<strong><font color=red>$pesantdkp</font></strong>";
     
      ?>

       </tr>
       <tr><td colspan="8"><strong><font color="red">Hanya dijinkan per 2 unit di pilih !!</font></strong>
       <tr><td colspan="9">
       <div class="form-group"><strong>Tanggal Pelaksanaan :</strong>
    	<input type="text" name="tglpelapl2" id="tanggal" placeholder="Tanggal Pelaksaan" class="form-control" value="<?php echo $tglpel; ?>" readonly/>
        </div>
       <div class="form-group"><strong>Tanggal Regestrisai :</strong>
    	        <input type="text" name="tglregapl2" placeholder="Tanggal Reg" class="form-control" value=" <?php echo $tgluser ; ?>" readonly/>
                </div>
         
			<!--<div class="form-group"><strong>Tanggal : (Sesuaikan dengan jadwal)</strong>
        	<select class="form-control" name="tanggal" placeholder="Skema">
          	<?php
          	$tampil=mysql_query("SELECT * FROM permohonan where email='$emailuser' group by tanggal ");
			while($r=mysql_fetch_array($tampil)){
			echo "<option value=$r[tanggal]>$r[tanggal]</option>";
			}
		echo "</select"; 
		?>--></td></tr>
		<!--<tr><td colspan="9"><input type="file" name="foto" required /><font color=red>File Berbentuk PDF dengan ukuran Maks 1MB dan namafile jangan menggunakan spasi</font></td></tr>-->
 		<tr><td  colspan="9"><input type="hidden"  name="n" value="<?php echo $zi ;?>"/>
		<input type="submit" name="upload-foto" id="gobutton" value="Simpan"></td></tr>   
		</font>
		</div>
		</div>
	</form>
				<?php
				


}

else if ($op == "simpanapl2")
{
	//echo "apapa";
	$email=trim($_POST['email']);
	//$ids=$_POST['idskema'];
	$idasesi=$_POST['idadsesi'];
	//$tgl = date('Y-m-d H:i:s');
	$dir_foto = "image/";
	$n = $_POST['n'];
	$dir_foto = "gambarimages/";
	$tglpelapl2=$_POST['tglpelapl2'];
	$idskema=$_POST['idskema'];
	$tglregapl2=$_POST['tglregapl2'];
	$tglpelapl2 = date('Y-m-d', strtotime($tglpelapl2));
	//echo $n;
	$sukses=0;
	$gagal=0;
	$dupp=0;
	$ggdupp=0;
	for ($i=0; $i<=$n-1; $i++)
   {
    //echo "aa";
     if (isset($_POST['bk'.$i]))
     {
     $cb=$_POST['bk'.$i];
     
     $idelemen=$_POST['idelemen'.$i];
     $subel=$_POST['idsube'.$i];
     $idunit=$_POST['idunit'.$i];     
                                  $cekdulu="select * from apl2 where idskema='$idskema' and idunit='$idunit' and idelemen='$idelemen' and idsubelemen='$subel' and idadsesi='$idasesi'";
                                   //echo $cekdulu;
				   $adulu=mysql_query($cekdulu);
				   if(mysql_num_rows($adulu)>0){
                                     //$dupp++;
                                     $rubahapl2="update apl2 set tk='".$cb."' where idskema='$idskema' and idunit='$idunit' and idelemen='$idelemen' and idsubelemen='$subel' and idadsesi='$idasesi'";
                                     //echo $rubahapl2;
                                     $rubahapl2a=mysql_query($rubahapl2);
                                     if($rubahapl2a) $dupp++;
                                     else $ggdupp++;
                                     //echo " Sebagian / Seluruh Data terjadi duplikate</br>"; 
				     //echo"<script>alert('Data Sudah Ada terjadi duplikate !');history.go(-1);</script>";
                                     }
				     else {
 				   
                                   
                                   $ssql="insert into apl2 (id,idskema,idunit,idelemen,idsubelemen,idadsesi,email,path,tanggalpapl2,waktu,tk)  value('','$idskema','$idunit','$idelemen','$subel','$idasesi','$email','$nama_foto','$tglpelapl2','$tglregapl2','$cb')";
                                   //echo $ssql;
				   $ok=mysql_query($ssql);
				                   if ($ok) $sukses++;
				      else $gagal++;
					} 
				
	            $sk=$sukses;
                $gl=$gagal;
                $dp=$dupp;
                $dpg=$ggdupp;
                //echo "<script>alert('Proses .. selesai');history.go(-1);</script>";

			}else {
			$ppilih='Belum memilih sebagian atau semuanya ..';
			//echo "Belum memilih sebagian atau semuanya ..";
			//echo "<script>alert('Selesai ...');history.go(-1);</script>";
			}
			}
				
			echo "<script>alert('$kosong $ukuran $pphoto-- Sukses simpan = '+$sk+' Gagal simpan= '+$gl+' Sukses update = '+$dupp+' Gagal update = '+$ggdupp);</script>";
			?><!--<div class="container">
							<div class="alert alert-success">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							</div>
							</div>	-->

<?php }
else if ($op == "uploadbuktiapl2")
 {
   $namab=$_GET['namas'];
   //$iduserb=$_GET['id'];
   $emailb=$_GET['email'];
   $idskemapt=$_GET['idskemapt'];
	echo "<form id=\"formContoh\" method=\"post\" enctype=\"multipart/form-data\" action=\"".$_SERVER['PHP_SELF'].
        "?op=uploadbuktipostapl2\">";
   //echo "<input type=hidden name=namas value=$namab>";
	echo "<input type=hidden name=idskemapt2 value=$idskemapt>";
	echo "<input type=hidden name=email value=$emailb>";
	echo "<table class=demo-table  width=80%>";
	echo "<th colspan=2><h4><strong>Upload File Pendukung </strong></h4></th>";
	echo "<tr><td>Silahkan pilih File Poto <font color='red'> ( Ukuran file max 2MB dan type file pdf, PDF)</font></td><td> <input type='file' name='fotox4'/></td></tr>";
	echo "<tr><td colspan=2><input type='submit' id='gobutton' value='Kirim '></td></tr>";
	echo "<tr><td colspan=2><font color=red> * Pastikan semua subkompetensi sudah diisi, jika ada penambahan unit atau sub kompetensi silahkan upload ulang bukti pendukung</font></td></tr></table>";
 }
 
else if ($op == "uploadbuktipostapl2")
 { 
    //$nama=$_POST['namas'];
    //$iduser=$_POST['iduser'];
    $email=$_POST['email'];
    $idskemapt2=$_POST['idskemapt2'];
    //echo $nama;
    //$namasc=explode(" ", $nama);
    $namaffapl2=$_FILES['fotox4']['name'];
    $namaffapl2=str_replace(" ", "", $namaffapl2);
    $dir_foto = "gambarimages/";
    $namasd=$namasc[0];
	$nama_foto ='apl2'.$email.$namaffapl2;
    //echo  $nama_foto;
    $ext = pathinfo( $nama_foto, PATHINFO_EXTENSION );
	$ekstensi = array('pdf','PDF'); // Ektensi yg diterima
              if( in_array( $ext, $ekstensi ) ) {
          		if( $_FILES['fotox4']['size']<2000000 ) {
                if ( move_uploaded_file( $_FILES['fotox4']['tmp_name'], $dir_foto . $nama_foto ) ) { 
			             
				$cekdatadapl2 = "SELECT * FROM apl2 WHERE email = '$email'";
				$ada1apl2=mysql_query($cekdatadapl2);
   				if(mysql_num_rows($ada1apl2)>0){      
				$querydapl2 = "update apl2 set path='".$nama_foto."' where idskema='$idskemapt2' and email='$email'";
					//echo $querydapl2;
				$hasilapl2 = mysql_query($querydapl2);
				if($hasilapl2) { $pptapl2=' update poto ke data sukses ';}
				else {$pptapl2='update poto ke data gagal';}
                 ?>
                 <div class="container">
				<div class="alert alert-success">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong><?php echo $pptapl2; ?> dan Upload file berhasil</strong>
				</div>
				</div> <?php
				}
			    }
                 else { ?>
				<div class="container">
				<div class="alert alert-success">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>Penyimpanan Gagal ..!</strong>Ukuran File terlalu besar
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

?>


<!--<body>-->
<?php
        $emailuser=trim($unameapl2);
		$cek="select * from skemasiswa where emailsiswa='$emailuser'"; // and statustesp='N'";
		//echo $cek;
 		//$ada=mysql_query($cek);
		$ada=mysql_query($cek);
		if(mysql_num_rows($ada)>0){
			$data  = mysql_fetch_array($ada);
    			//$b=mysql_fetch_rows($ada);
			$skema=$data['idskema'];
			$statusapl1=$data['statusapl1'];
			$cekapl1apl2="select idasesi,validasiapl1,email from apl1 where email='".$emailuser."'";
			$cekapl1apl2a=mysql_query($cekapl1apl2);
			$cekapl1apl2b=mysql_fetch_array($cekapl1apl2a);
			$validasiapl1apl2=$cekapl1apl2b['validasiapl1'];

  			$ske="select * from skema where idskema='$skema'";
  			$ske1=mysql_query($ske);
  			$ske2=mysql_fetch_array($ske1);
  			$namaskema=$ske2['namaskema'];
			$cekid="select * from lsp_usertbl where email='$emailuser'";
    			//echo $cekid;
    		$cekid1=$ske1=mysql_query($cekid);
			$cekid2=mysql_fetch_array($cekid1);
			$tglreg=$cekid2['kode'];
    		$idasesi=$cekid2['id_user'];
    		$namaasesi=$cekid2['nama'];
            $ckrekomendasiapl2="Select namarekom,idskema,idasesi,rekom,tanggal from rekomendasi where namarekom='apl1lsp' and idasesi='".$idasesi."' and idskema='".$skema."'";
             //echo $ckrekomendasiapl2;
            $ckrekomendasiapl2a=mysql_query($ckrekomendasiapl2);
            $ckrekomendasiapl2b=mysql_fetch_array($ckrekomendasiapl2a);
            $rekomapl2=$ckrekomendasiapl2b['rekom'];
            $spemet="select namaasesor from pemetaan where idskema='$skema' and idpeserta='$idasesi'";
        	$execpe=mysql_query($spemet);
        	$hpemet=mysql_fetch_array($execpe);
        	$namaass=$hpemet["namaasesor"];

            if($statusapl1=='Y' and $validasiapl1apl2=='Y' and $rekomapl2=='L'){
		
			echo "<form id=\"formContoh\" method=\"post\" action=\"".$_SERVER['PHP_SELF'].
 			       "?op=listsubkompetensi\">";
			//echo "<form name=contoh method=post action=uploadgambar1.php enctype=multipart/form-data id=form-upload>";
			echo "<input type=hidden name=email value='$emailuser'>";
			echo "<input type=hidden name=idasesi value='$idasesi'>";
			echo "<input type=hidden name=namap value='$namaasesi'>";
			echo "<input type=hidden name=namaass value='$namaass'>";
			echo "<input type=hidden name=tglregg value='$tglreg'>";
			echo"
			<div class=form-group><strong></strong>
			   <div class=dynamiclabel>
 				<input type=hidden name=skema value='$skema' readonly>
  			   </div>
  			</div>";
			//echo "<a href=\"".$_SERVER['PHP_SELF'].
        //"?op=uploadbuktiapl2&email=".$emailuser."&idskemapt=".$skema."\" class='btn btn-primary btn-sm' role='button'> <span class='glyphicon glyphicon-plus'></span>Upload Bukti APL2</a>";
			?>
			<table class=demo-table width=100%>
			<!--<tr><td colspan="3"><strong>Skema : <?php echo $namaskema; ?></strong></td></tr>-->
			<tr><th colspan='3'><strong> PILIH UNIT</strong> </th></tr>
			<tr><th bgcolor='#006699'>Kode Unit</th><th bgcolor='#006699'>Nama Unit</th><th bgcolor='#006699'> Keterangan</th></tr>

			<?php 
			//$unit="Select * from unit where idskema='$skema'" ;
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
                                 
                                $sqlcekapl2="select apl2.idskema,apl2.idadsesi,apl2.idunit,apl2.idelemen,apl2.idsubelemen from apl2 where idadsesi='".$idasesi."' and idskema='".$skema."' and idunit='".$dunit."'";
                                //echo $sqlcekapl2;
                                
                                //echo $sqlunitupload;
                                $execsqlunitapl2=mysql_query($sqlcekapl2);
                                $execsqlunitapl2a=mysql_fetch_array($execsqlunitapl2);
                                $bykunitapl2=mysql_num_rows($execsqlunitapl2);

	                            $ide=$execsqlunitapl2a['idunit'];
                                $sqlelemenapl2="select count(idelemen) as byk2apl2 from subelemen where idunit='$ide'";
                                $execelemenapl2=mysql_query($sqlelemenapl2);
                                $execelemenapl2a=mysql_fetch_array($execelemenapl2);
                                //echo "lll".$sqlelemenapl2;  
                                $bykelemenapl2=$execelemenapl2a['byk2apl2'];
                                //echo $bykelemenapl2;
                                //echo $bykunitapl2;
				if(mysql_num_rows($execsqlunitapl2)>0 and $bykunitapl2==$bykelemenapl2){
                                   $stada='disabled';
                                   //echo $stada;
                               }
				else { $stada=' ';}
                                
				echo "<tr><td><input type=hidden name=idskema".$i." value='$idskema'><input type=hidden name=idunit".$i." value='$dunit'><input type=checkbox name=kodeunit".$i." value='$kodeunit'".$stada."> ".$kodeunit." </td><td>".$namaunit." </td><td> Diisi ".$bykunitapl2." Seharusnya ".$bykelemenapl2."</td>";



				?>
				<?php
				$i++;
				
			}
		//}
			echo "<input type='hidden' name='n' value='".$i."' />";
			echo "<input type=hidden name=emailuserapl2 value='".$emailuser."'>";
			?>

		</form>
		</td></tr><tr><td colspan="3"><input type="submit" id="gobutton" value="Lanjutkan" class="button"></td></tr></table>
         
<?php 
      } 
      else { ?>
      			<div class="container">
			  	<div class="alert alert-warning">
			    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    	<strong>Apl1 Belum di validasi atau anda di tolak , hubungi LSP !</strong> ....
				</div>
			
      <?php }
       }else { ?>				
				<div class="container">
			  	<div class="alert alert-warning">
			    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    	<strong>Skema Belum Di pilih!</strong> ....
				</div>
				<?php  } 

	

 } ?>
</body>
</html>
