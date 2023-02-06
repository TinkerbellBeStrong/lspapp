<html>
<head>
<title></title>
</style>
      
</head>
<body>
<?php 
session_start();
error_reporting(0);
$nid=$_POST['nid'];
$nim=trim($_POST['usern']);
$kdmdl=$_POST['kodemd'];
$jawaban=$_POST['jawaban'];
$lastnom=$_POST['ylastnom'];

//$menit=$_POST['menit'];
include "../../lsp_koneksi.php";
//$sql1="insert into a (jawaban) value ('$nim')";
//mysql_query($sql1);

$sql="UPDATE pertanyaanbck SET njawab='$jawaban' where question_id='$nid' AND nim='$nim' AND kd_modul='$kdmdl'";
                //echo $sql;
              mysql_query($sql);
$xsql="UPDATE pertanyaanbck SET lastnom='$lastnom' where nim='$nim' AND kd_modul='$kdmdl'";
		mysql_query($xsql);      


?>  
lkalsk
</body>
</html>
