<?php
include "koneksi.php";

$idk = $_POST['idk'];
$ids = $_POST['ids'];

$lb = mysql_query("select * from tbsiswa where idk=$idk ");
$jd = mysql_num_rows($lb);
if $jd >= 20 {
echo"<script>alert('Kelas Penuh')
	document.location='index.php?hal=pilih_siswa'</script>";
}else{
foreach ($ids as $id){
	mysql_query("update tbsiswa set id_kelas = '$idk' where id_siswa = '$id'");
}
header("location:index.php?hal=masuk_kelas&idk=".$idk);
}
?>