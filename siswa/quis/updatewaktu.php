<html>
<head>
<title></title>
</style>
      
</head>
<body>
<?php 
session_start();
error_reporting(0);
//$nid=$_POST['nid'];
$nim=trim($_POST['usern']);
$kdmdl=$_POST['kodemd'];
$vwreal=trim($_POST['wreal']);
$mmenit=trim($_POST['vmenit']);
$arr = explode(":", $mmenit);
$amenit=$arr[0] * 60 + $arr[1] ;
$vamenit=$amenit;
include "../../lsp_koneksi.php";
//$sql1="insert into a (jawaban) value ('$nim')";
//mysql_query($sql1);

//echo '<script language="javascript">';
//echo 'alert("message successfully sent")';
//echo '</script>';
$sql="UPDATE pertanyaanbck SET menit='$vamenit',waktureal='$vwreal' where nim='$nim' AND kd_modul='$kdmdl'";
                //echo $sql;
              mysql_query($sql);
?>  
</body>
</html>
