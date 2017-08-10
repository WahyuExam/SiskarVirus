<?php
 include "../lib/koneksi.php";

 if (isset($_GET['kode'])) {
    $kode     = $_GET['kode'];
 	$hapus    = mysqli_query($konek, "delete from tblpenyakit where kd_penyakit='$kode'");
 	$hapuspny = mysqli_query($konek, "delete from tblaturan where kd_penyakit='$kode'");
 	if ($hapus) {
 		echo "<meta http-equiv='refresh' content='0; url=?open=Penyakit-Data'>";
 	}
 	else
 		echo "Data yang Dihapus Tidak ada";
 }
?>