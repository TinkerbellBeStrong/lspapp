<?php
// membaca file koneksi.php
include "../lsp_koneksi.php";
	   $a='c:\xampp\mysql\bin\mysqldump';
       $tabel="Backup_Data.sql";
	   //$table_name = $tabel;
       $backup_file  = "./backupdata/".$tabel;
    

	      $command = $a." --user='root' " .$database." > ".$backup_file;
          exec($command);

         if(! $backup_file )
            {
             echo "<strong> Pembuatan Database tabel </strong>". $tabel." Gagal ...</br>";
            } 
             else 
            { 
            
            echo "<strong> Pembuatan Database tabel </strong>". $tabel." Sukses ...</br>";
            }
        //}
    //}  
?>



