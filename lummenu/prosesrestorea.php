<?php
// membaca file koneksi.php
include "../lsp_koneksi.php";
// membaca tabel-tabel yang dipilih dari form

       $a='c:\xampp\mysql\bin\mysql';
       $tabel="Backup_Data.sql";

	 // $table_name = $tabel;
      $backup_file  = "./backupdata/".$tabel;
       if(file_exists( $backup_file)) {
         $pesan="File Backup ditemukan Restore selesai.";}
         else {
         $pesan="File tidak di temukan !!!";}
		 
		 $command = $a." --user='root'  ".$database." < ".$backup_file;
	
	//echo $command;
        exec($command);
		
      
?>



