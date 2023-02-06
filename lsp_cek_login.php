<?php
error_reporting(0);
include "lsp_koneksi.php";
$usern  = mysql_real_escape_string($_POST['username']);
$pass   = md5(mysql_real_escape_string($_POST[password]));
$login  = mysql_query("SELECT * FROM lsp_usertbl WHERE email='$usern' AND password='$pass' AND status='1'");
$ketemu = mysql_num_rows($login);
$r      = mysql_fetch_array($login);
//echo "<input type=text name=uidpes value".$_POST[username].">";
// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  $_SESSION['username']=$r[email];
  $_SESSION['password']=$r[password];
  $_SESSION['nama_lengkap']=$r[nama];
  $_SESSION['status']=$r[status];
  $_SESSION['level']=$r[level];
  if($r[level]=='lsp'){
   //echo "lsp";}
    header('location:lummenu/inputskema.php');
	}
    else if($r[level]=='asesor') {
    header('location:lummenu/validasiapl2.php');
	}
    else { header('location:siswa/pilihskema.php?uidpes='.$r[email]);
	}
 //header('location:index2.php?module=home');}
 }
 else{
  echo "<link href=css/adminstyle.css rel=stylesheet type=text/css>";
  echo "<center>Login gagal! username & password tidak benar<br>";
  echo "<a href=lsp_login.php><b>ULANGI LAGI</b></a></center>";
 }
?>
