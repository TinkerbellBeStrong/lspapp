<?php
require('pdf/fpdf.php');
//class PDF extends FPDF
include "../lsp_koneksi.php";
$email= trim($_GET['email']);

$query = "SELECT apl1.email2,apl1.namasiswa,apl1.email,apl1.tmplahir,apl1.tgllahir,apl1.jeniskelamin,apl1.kebangsaan,apl1.alamat,apl1.kodepos,apl1.tlprumah,apl1.hp,apl1.tlpkantor,apl1.pendidikan,apl1.namalembaga,apl1.jurusan,apl1.poto,apl1.nik, lsp_usertbl.linkttd FROM apl1 inner join  lsp_usertbl on apl1.email= lsp_usertbl.email WHERE apl1.email = '$email'";
        $hasil = mysql_query($query);
        if(mysql_num_rows($hasil)>0){
   	$data  = mysql_fetch_array($hasil);
   	//$iduser=$data['id_user'];
	$nama=$data['namasiswa'];
	//	$pass=$data['password'];
	//$telp=$data['notelp'];
	$emailuser=$data['email'];
	$tmplahir=$data['tmplahir'];
	$tgllahir=$data['tgllahir'];
	$jeniskelamin=$data['jeniskelamin'];
        $kebangsaan=$data['kebangsaan'];
        $alamat=$data['alamat'];
        $kodepos=$data['kodepos'];
        $rumah=$data['tlprumah'];
		$hp=$data['hp'];
		$nik=$data['nik'];
        $tlpkantor=$data['tlpkantor'];
        $emailuser=$email;
        $pendidikan=$data['pendidikan'];
        $lembaga=$data['namalembaga'];
        $jurusan=$data['jurusan'];
        $poto=$data['poto'];
        $poto="gambardiri/".$poto;
        $poto2="gambardiri/tidakada.png";
        $ttd=$data['linkttd'];
        $ttd="../imgttd/".$ttd;
        $ttd2="../imgttd/tidakada.png"; 
        $tgl = date("d-m-Y", strtotime($tgllahir));
         if($jeniskelamin=='pr'){
            $jk="PEREMPUAN";}
          else {
            $jk="LAKI-LAKI ";}
         $email2=$data['email2'];   
//echo $poto;
//class PDF extends FPDF
//{
//function Header()
//{
  //      $this->Image('gambardiri/1781HUCHIWULANDARI137.jpg',40,175,30);
//}
//}

$pdf = new FPDF('p','mm','A4');
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',12);
// mencetak string 
$pdf->SetY(25);
$pdf->Cell(200,7,'BIODATA PESERTA',0,1,'C');
//$pdf->SetFont('Arial','B',12);
//$pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
//$pdf->Cell(10,7,'',0,1);
//echo $email;
//$pdf->Image('gambardiri/'.$poto,10,10,80);
$pdf->Cell(10,7,'',0,1);
 
$pdf->SetFont('Arial','',10);
$pdf->SetY(35);
$pdf->SetX(20);
$pdf->Cell(25,8,'NAMA LENGKAP PESERTA',0,0,'1',0);
$pdf->SetY(45);
$pdf->SetX(20);
$pdf->Cell(25,8,'TEMPAT LAHIR :',0,0,'1',0);
$pdf->SetY(55);
$pdf->SetX(20);
$pdf->Cell(25,8,'TANGGAL LAHIR',0,0,'1',0);
$pdf->SetY(65);
$pdf->SetX(20);
$pdf->Cell(25,8,'JENIS KELAMIN',0,0,'1',0);
$pdf->SetY(75);
$pdf->SetX(20);
$pdf->Cell(25,8,'KEBANGSAAN',0,0,'1',0);
$pdf->SetY(85);
$pdf->SetX(20);
$pdf->Cell(35,8,'ALAMAT ',0,0,'1',0);
$pdf->SetY(105);
$pdf->SetX(20);
$pdf->Cell(25,8,'NO.TELP ',0,0,'1',0);
$pdf->SetY(115);
$pdf->SetX(20);
$pdf->Cell(32,8,'NO.TELP KANTOR',0,0,'1',0);
$pdf->SetY(125);
$pdf->SetX(20);
$pdf->Cell(32,8,'NO.HP',0,0,'1',0);
$pdf->SetY(135);
$pdf->SetX(20);
$pdf->Cell(32,8,'PENDIDIKAN TERAKHIR',0,0,'1',0);
$pdf->SetY(145);
$pdf->SetX(20);
$pdf->Cell(32,8,'NAMA SEKOLAH/LEMBAGA ',0,0,'1',0);
$pdf->SetY(155);
$pdf->SetX(20);
$pdf->Cell(32,8,'PROGRAM / JURUSAN',0,0,'1',0);
$pdf->SetY(165);
$pdf->SetX(20);
$pdf->Cell(25,8,'KODE POS',0,0,'1',0);
$pdf->SetY(175);
$pdf->SetX(20);
$pdf->Cell(25,8,'EMAIL',0,0,'1',0);
$pdf->SetY(185);
$pdf->SetX(20);
$pdf->Cell(25,8,'NIK',0,0,'1',0);

 
//$pdf->SetFont('Arial','',10);
 
//include 'koneksi.php';
//$mahasiswa = mysqli_query($connect, "select * from mahasiswa");
//while ($row = mysqli_fetch_array($mahasiswa)){
    $pdf->SetY(35);
    $pdf->SetX(75);
    $pdf->Cell(32,8,": ".$nama,0,0,'1',0);
    $pdf->SetY(45);
    $pdf->SetX(75);
    $pdf->Cell(32,8,": ". $tmplahir,0,0,'1',0);
    $pdf->SetY(55);
    $pdf->SetX(75);
    $pdf->Cell(32,8,": ". $tgl,0,0,'1',0);
    $pdf->SetY(65);
    $pdf->SetX(75);
    $pdf->Cell(32,8,": ". $jk,0,0,'1',0);
    $pdf->SetY(75);
    $pdf->SetX(75);
    $pdf->Cell(32,8,": ". $kebangsaan,0,0,'1',0);
    $pdf->SetY(85);
    $pdf->SetX(75);
    $pdf->MultiCell( 130, 10,": ". $alamat, 0);
    //$pdf->Cell(32,8,": ". $alamat,0,0,'1',0);
    $pdf->SetY(105);
    $pdf->SetX(75);
    $pdf->Cell(32,8,": ". $rumah,0,0,'1',0);
    $pdf->SetY(115);
    $pdf->SetX(75);
    $pdf->Cell(32,8,": ". $tlpkantor,0,0,'1',0);
    $pdf->SetY(125);
    $pdf->SetX(75);
    $pdf->Cell(32,8,": ". $hp,0,0,'1',0);
    $pdf->SetY(135);
    $pdf->SetX(75);
    $pdf->Cell(32,8,": ". $pendidikan,0,0,'1',0);
    $pdf->SetY(145);
    $pdf->SetX(75);
    $pdf->Cell(32,8,": ". $lembaga,0,0,'1',0);
    $pdf->SetY(155);
    $pdf->SetX(75);
    $pdf->Cell(32,8,": ". $jurusan,0,0,'1',0);
    $pdf->SetY(165);
    $pdf->SetX(75);
    $pdf->Cell(32,8,": ". $kodepos,0,0,'1',0);
    $pdf->SetY(175);
    $pdf->SetX(75);
    $pdf->Cell(32,8,": ". $email2,0,0,'1',0);
    $pdf->SetY(185);
    $pdf->SetX(75);
    $pdf->Cell(32,8,": ". $nik,0,0,'1',0);
// Page header
     //$pdf->Image('logo.png',10,12,30,0,'','http://www.fpdf.org');
     //$pdf->Image($gbr,55,165,28);
    //$pdf->Image('http://smkn7bandung.sch.id/siswa/gambardiri/1781HUCHIWULANDARI137',60,30,90,0,'JPG');  
      if (!file_exists($poto)){
        $pdf->Image($poto2,30,195,25);}
        
        else {
        $pdf->Image($poto,30,195,25);}
        $pdf->SetY(195);
        $pdf->SetX(155);
        $pdf->Cell(32,8,"Bandung",0,0,'1',0);
        if (!file_exists($ttd)){
        $pdf->Image($ttd2,150,205,20);}
        else {
        $pdf->Image($ttd,150,205,40);}
        $pdf->SetY(220);
        $pdf->SetX(135);
        $pdf->Cell(32,8,$nama,0,0,'1',0);


$pdf->Output(); 
 }else { echo "Belum ada data";}     
?>

