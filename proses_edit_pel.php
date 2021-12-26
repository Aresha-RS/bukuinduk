<?php
include"koneksi.php";

$idp=$_GET['idp'];
$nama_pelajaran = $_POST['nama_pelajaran'];
$kkm_7 = $_POST['kkm_7'];
$kkm_8 = $_POST['kkm_8'];
$kkm_9 = $_POST['kkm_9'];

$ubah=mysqli_query($connect,"UPDATE tbpelajaran set nama_pelajaran='$nama_pelajaran', kkm_7='$kkm_7', kkm_8='$kkm_8', kkm_9='$kkm_9' where id_pelajaran ='$idp'") or die (mysqli_error());
if ($ubah)
{
	header("location:index.php?hal=data_pelajaran&berhasil=ok");
}
else
{
	echo"<script>alert('Data Gagal Diubah')
	document.location='index.php?hal=data_pelajaran'</script>";
}
?>
