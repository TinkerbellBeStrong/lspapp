<link href="css/tabel.css" rel="stylesheet" type="text/css" />
<table cellspacing='0'><tr><td>
<?php
 
$dir_foto = "../imgsoal/";

if ( !empty($_FILES['foto']['name']) ) {

	for ( $i = 0; $i < count( $_FILES['foto']['name']); $i++ ) {

		$nama_foto = $_FILES['foto']['name'][$i];
		$ext = pathinfo( $nama_foto, PATHINFO_EXTENSION );
		$ekstensi = array('jpg','jpeg','png','gif','JPG','bmp','BMP'); // Ektensi yg diterima
		 chmod($nama_foto, 0777);
		//filter ektensi foto yang diterima
		if( in_array( $ext, $ekstensi ) ) {
		 
			//maks ukuran foto 500kb
			//if( $_FILES['foto']['size'][$i] < 200000 ) {
				 
				if ( move_uploaded_file( $_FILES['foto']['tmp_name'][$i], $dir_foto . $nama_foto ) ) {

					
					echo "Gambar <b>" . $_FILES['foto']['name'][$i] . "</b> Berhasil <br />";
				
				} else {
					echo "Gambar <b>" . $_FILES['foto']['name'][$i] . " </b>Gagal <br />";
				}

			//} else {

			//	echo "Ukuran foto terlalu besar, maksimum 500kb. <br />";
			//}

		} else {

			echo "Format  " . $_FILES['foto']['name'][$i] . "  tidak didukung. <br>";
		}

	}

} else {

	echo "Foto masih kosong.";
}

?>

</td></tr>
<tr><td><?php echo $i." File Terupload Selesai"; ?></td></tr>
</table>
<?php echo"<script>alert('Proses selesai..!');history.go(-1);</script>";?>
