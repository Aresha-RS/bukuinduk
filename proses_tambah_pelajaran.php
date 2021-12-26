<?php
include "koneksi.php";

$nama_pelajaran = $_POST['nama_pelajaran'];
$kkm_7 = $_POST['kkm_7'];
$kkm_8 = $_POST['kkm_8'];
$kkm_9 = $_POST['kkm_9'];

$simpan = mysqli_query($connect,"insert into tbpelajaran values ('','$nama_pelajaran','$kkm_7','$kkm_8','$kkm_9')");
if ($simpan){
	echo "<script>alert('Tambah Data Pelajaran Berhasil!');
	document.location='index.php?hal=data_pelajaran'</script>";
} else {
	echo "<script>alert('Tambah Data Pelajaran Gagal!');
	document.location='index.php?hal=tambah_pelajaran'</script>";
}
?>