
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>LSP - Dashboard</title>

<link href="../../css/bootstrap.min.css" rel="stylesheet">
<link href="../../css/datepicker3.css" rel="stylesheet">
<link href="../../css/styles.css" rel="stylesheet">
<link href="../../css/adminstyle.css" rel="stylesheet">
<link href='../../css/tombol.css' rel='stylesheet' type='text/css'>
<script src="../js/lumino.glyphs.js"></script>
<script src="../../js/jquery-2.2.3.min.js"></script>
<script src="../../js/formValidation.min.js"></script>
<script src="../../js/framework/bootstrap.min.js"></script>
<script src="../js/jquery-2.2.3.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/bootstrap-datepicker.js"></script>
<link href="../../css/tabelbaru2.css" rel="stylesheet">
<?php
//session_set_cookie_params(3600*2,"/");
session_start();
error_reporting(0);
include "../../lsp_koneksi.php";
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
 echo "<center><link href='css/adminstyle.css' rel='stylesheet' type='text/css'><strong> Anda Harus Login Dahulu ...!</strong><br>";
 echo "<a href=../../lsp_login.php class='btn btn-primary btn-sm' role='button'> Kembali</a></center>"; 
 //echo "sss";
 //$kdmd=$_POST['md'];
 //'$modul=$_POST['modul']; 
}
else{
?>

<body>
<br />

<center>

<table class="demo-table" width="75%">

<!--<tr><th colspan="3"><a href="../logout.php" class='btn btn-primary btn-sm' role='button'>logout</a></th></tr>-->
<tr><th colspan="3">
<?php
if(isset($_SESSION['username'])) { $uname=$_SESSION['username'];}
//include "css/fungsi_indotgl.php";
echo "<p><h4><b> Selamat Datang</b></h4></p>
          <p><h4><p><strong>$_SESSION[nama_lengkap]</strong> </p><p>$_SESSION[username]</p></h4><br>";
//echo "lakls".$kdmd.$modul;
//  echo tgl_indo(date("Y m d")); 
//  echo " | "; 
//  echo date("H:i:s");
//  echo "</p>";
//  echo "</h4><br />";
          ?>
<form method="GET" action="redirectview.php">

  <input id="usern" name="usern" type="hidden" value="<?php echo $uname ;?>">
   <tr><th> KODE TES </th><th>:
   <input id="kmd" name="kmd" type="text" value='<?php echo $_GET[md] ;?>' readonly></td></tr>
  <!-- <tr><th> TOKEN </th><th>: <input id="token" name="token" type="text" style="text-transform:uppercase" ></td></tr>-->
   <tr><th colspan="2"><input  id="lanjutkan" name="lanjutkan" class='btn btn-info' type="submit" value="Lanjutkan"disabled></th></tr>   
   <tr><th colspan=3"><input type="checkbox" name="test" id="ckok" > &nbsp Saya siap jujur dalam pelaksanaan TES ini dan siap mengikuti tatatertib yang ada</th>

</form>
</th></tr>
</table>
<script>	
var checker=document.getElementById('ckok');
var sendbtn=document.getElementById('lanjutkan');
checker.onchange=function(){
lanjutkan.disabled=!this.checked;};
</script>
</body>
<?php } ?>







