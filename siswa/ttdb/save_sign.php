<?php 
        include "../../lsp_koneksi.php";
        $iduserttd=$_POST['iduser'];
	$result = array();
	$imagedata = base64_decode($_POST['img_data']);
	//$filename = md5(date("dmYhisA"));
	//Location to where you want to created sign image
	$filename = $iduserttd;
        $file_name = '../../imgttd/'.$filename.'.png';
        $filename2 = $iduserttd.'.png';
	file_put_contents($file_name,$imagedata);
	$result['status'] = 1;
	$result['file_name'] = $file_name;
        $cekdata1pp = "SELECT * FROM lsp_usertbl WHERE id_user = '$iduserttd'";
   			$ada1pp=mysql_query($cekdata1pp);
   				if(mysql_num_rows($ada1pp)>0){      
					$querypp = "UPDATE lsp_usertbl SET linkttd='$filename2' WHERE id_user = '$iduserttd' ";	
        				$hasilpp = mysql_query($querypp);
				 $hasilpp;	
				}
	echo json_encode($result);
        
?>
