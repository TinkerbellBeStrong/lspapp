<?php 
include "../../lsp_koneksi.php";


  //--------------------------------------------------------------------------
  // 2) Query database for data
  //--------------------------------------------------------------------------
  
   $vnoa=$_POST['vno'];
   $vkda=$_POST['vkdm'];
   $vnisa=trim($_POST['vnis']);
   $result = mysql_query("SELECT * FROM pertanyaanbck where kd_modul='$vkda' and nim='$vnisa' and nourut='$vnoa'");          //query
   $array = mysql_fetch_row($result);                          //fetch result    

  //--------------------------------------------------------------------------
  // 3) echo result as json 
  //--------------------------------------------------------------------------
  echo json_encode($array);

?>
