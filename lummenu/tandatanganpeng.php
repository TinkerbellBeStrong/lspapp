<!DOCTYPE html>
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


<link href="../css/tabelbaru2.css" rel="stylesheet">

<?php
//session_set_cookie_params(3600*2,"/");
session_start();
include "../lsp_koneksi.php";
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
 echo "<center><link href='css/adminstyle.css' rel='stylesheet' type='text/css'>
 <strong> Anda Harus Login Dahulu ...!</strong><br>";
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
  width: 350px;
  font-size: 14px;
  padding: 7px;
  border: 1px solid #c3c3c3;
  border-radius: 7px;
  text-transform: uppercase
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
$ttd=$hasilx['linkttd'];
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
		<li ><a href="validasiapl2.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></use></svg> Validasi APL2</a></li>
		<li><a href="asesormain.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></use></svg>FR.MPA-02.1-Portofolio</a></li>
<li><a href="observasi.php"><svg class="glyph stroked eye"><use xlink:href="#stroked-eye"/></use></svg>FR.MPA-02.2-Observasi</a></li>
<li><a href="mak2.php"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></use></svg>FORM MAK 02</a></li>
<li><a href="mak5.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"/></use></svg>FORM MAK.05</a></li>
<li><a href="mak6baru.php"><svg class="glyph stroked map"><use xlink:href="#stroked-map"/></use></svg>FORM MAK.06</a></li>
<li><a href="rekapasesi.php"><svg class="glyph stroked calendar blank"><use xlink:href="#stroked-calendar-blank"/></use></svg>Rekap FORM MPA.03</a></li>
<li ><a href="mma.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> MMA</a></li>
<li class="active"><a href="tandatanganass.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></use></svg> Tanda Tangan</a></li>


			<li role="presentation" class="divider"></li>
	
			<li><a href="../logout.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg> Logout</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<h4>FORM Tanda Tangan</h4>
                        
</div><!--/.row-->
		
		
				
		
		<div class="row">
			<div class="col-lg-12">

<?php
 /* ooop */
?>


<body>
</br>

	 <?php echo "<a href=../siswa/ttdb/index.php?id=".$hasilx['id_user']." class='btn btn-primary btn-sm' role='button' "?> onclick="NewWindow(this.href,'name','400','400','yes');return false" <?php echo "> <span class='glyphicon glyphicon-plus'><strong>Tanda Tangan</strong> </a> &nbsp &nbsp";
	 $cekttd=strlen($hasilx['linkttd']);
	 //echo "kajskajsk".$cekttd;
          if ($cekttd<1)
          {
          	$namattd="../imgttd/tidakada.png";
          } else 

          {
          	$namattd="../imgttd/".$hasilx['linkttd'];
          } 

	 ?>
	<table class=demo-table><thead>
	<?php echo "<td><img src='".$namattd."' height=200 width=500></td>";
      ?>
	</thead></table>
        
   		
</body>
</html>
<?php } ?>
