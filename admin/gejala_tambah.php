<?php
  include "../lib/koneksi.php";
  
  if (isset($_GET['status'])) {
  	$query = mysqli_query($konek, "select max(kd_gejala) as maxkode from tblgejala");
  	$hasil = mysqli_fetch_array($query);
  	$kode  = $hasil['maxkode'];

  	$kode2 = (int) substr($kode,1,2);
  	$kode2++;

  	$kode3 = 'G'.sprintf("%02s",$kode2);
  }
 ?>

 <center><h2>Tambah Data Gejala</h2></center> <hr>

<?php
  //validasi 
   
   if (isset($_POST['btnsimpan'])) {

   	$kdgejala = $_POST['kd_gejala'];
   	$nmgejala = $_POST['nm_gejala'];

   	$pesanerror =  array ();

   	if (trim($nmgejala=="")) {
   		$pesanerror[] = "Nama Gejala Wajib Diisi";
   	}
     
    $cekdata = mysqli_query($konek, "select * from tblgejala where nm_gejala='$nmgejala'");
    if ($hasil = mysqli_num_rows($cekdata)>=1) {
    	$pesanerror[] = "Nama Gejala Sudah ada";
    }
    

     if (count($pesanerror) >=1 ) {
     	$no=0;
     	foreach ($pesanerror as $index => $isi_pesan) {
     		$no++;
     		echo "$no. $isi_pesan".'<br>';
     	}
     echo " <hr> <br>";	
     }
     else {
     	$simpan = mysqli_query($konek,"insert into tblgejala (kd_gejala, nm_gejala) values ('$kdgejala','$nmgejala')");
     	if ($simpan) {
     		echo "<meta http-equiv='refresh' content='0; url=?open=Gejala-Data'>";
     	}
     }
   }
  ?>
 <form action="<?php $_SERVER['SELF']; ?>" method="post" >
    <table>
       <tr>
       	  <td>Kode Gejala </td>
       	  <td>: <input type="text" name="kd_gejala" size="14" value="<?php echo $kode3 ;?>" readonly="readonly"/></td>
       </tr>

       <tr>
       	 <td>Nama Gejala</td>
       	 <td>: <input type="text" name="nm_gejala" size="80" maxlength="80" autofocus></td>
       </tr>

       <tr>
       	  <td></td>
       	  <td>&nbsp;&nbsp;<input type="submit" name="btnsimpan" value="Simpan"></td>
       </tr>
    </table>
 </form>