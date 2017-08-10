<center><h2>Ubah Kata Sandi</h2></center><hr>

<?php
   include "../lib/koneksi.php";

   $kode_lama = $_POST['sandilama'];
   $kode_baru = $_POST['sandibaru'];

   if (isset($_POST['btnsimpan'])) {
     $pesanerror   = array();
   	 $ceksandilama = mysqli_query($konek, "select * from tbladmin where sandi='$kode_lama'");

   	 if ($hasilsama = mysqli_num_rows($ceksandilama) == 0) {
   	 	$pesanerror[] = "Kata Sandi Lama Tidak ada"; 
   	 }

   	 if (trim($kode_lama)=="") {
   	 	$pesanerror[] = "Sandi Lama Belum Diisi";
   	 }

   	 if (trim($kode_baru)=="") {
   	 	$pesanerror[] = "Sandi Baru Belum Diisi";
   	 }


   	 if (count($pesanerror) >= 1) {
   	 	$no=0;
   	 	foreach ($pesanerror as $indek => $isi_pesan) {
   	 		$no++;
   	 		echo "$no. $isi_pesan <br>";
   	 	}
   	 	echo '<hr>';
   	 }
     else {
        $simpansandi = mysqli_query($konek, "Update tbladmin set sandi='$kode_baru' where pengguna='admin'");

        if ($simpansandi) {
        	echo "<meta http-equiv='refresh' content='0; url=?open=Ubah-sandi'>";
        }
     }
   }

 ?>
 <form action="<?php $_SERVER['SELF'];?>" method="post">
   <table>
   	  <tr>
   	    <td>Kata Sandi Lama </td>
   	    <td>: <input type="text" name="sandilama"></td>
   	  </tr>

   	  <tr>
   	    <td>Kata Sandi Baru </td>
   	    <td>: <input type="text" name="sandibaru"></td>
   	  </tr>

   	  <tr>
   	  	<td>&nbsp;</td>
   	  	<td>&nbsp;&nbsp;<input type="submit" name="btnsimpan" value="Simpan"></td>
   	  </tr>
   </table>
 </form>