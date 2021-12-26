<?php
include "koneksi.php";

$idk = $_GET['idk'];
$ids = $_GET['ids'];

mysql_query("update tbsiswa set id_kelas = '0' where id_siswa = '$ids'");
header("location:index.php?hal=masuk_kelas&idk=".$idk);
?>