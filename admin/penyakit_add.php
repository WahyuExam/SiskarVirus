<?php
  include "../lib/koneksi.php";
  
  if (isset($_GET['status'])) {
  	$query = mysqli_query($konek, "select max(kd_penyakit) as maxkode from tblpenyakit");
  	$hasil = mysqli_fetch_array($query);
  	$kode  = $hasil['maxkode'];

  	$kode2 = (int) substr($kode,1,2);
  	$kode2++;

  	$kode3 = 'P'.sprintf("%02s",$kode2);
  }
 ?>

 <center><h2>Tambah Data Penyakit</h2></center> <hr>

<?php
  //validasi 
   
   if (isset($_POST['btnsimpan'])) {

   	$kdpenyakit = $_POST['kd_penyakit'];
   	$nmpenyakit = $_POST['nm_penyakit'];
    $pengobatan = $_POST['pengobatan'];

   	$pesanerror =  array ();

   	if (trim($nmpenyakit=="")) {
   		$pesanerror[] = "Nama Penyakit Wajib Diisi";
   	}
     
    $cekdata = mysqli_query($konek, "select * from tblpenyakit where nm_penyakit='$nmpenyakit'");
    if (mysqli_num_rows($cekdata)>=1) {
    	$pesanerror[] = "Nama Penyakit Sudah ada";
    }

    if (trim($pengobatan=='')){
    	$pesanerror[] = "Pengobatan Belum Diisi";
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
     	$simpan = mysqli_query($konek,"insert into tblpenyakit (kd_penyakit, nm_penyakit, nl_penyakit, pengobatan) values ('$kdpenyakit','$nmpenyakit','0','$pengobatan')");
     	if ($simpan) {
     		echo "<meta http-equiv='refresh' content='0; url=?open=Penyakit-Data'>";
     	}
     }
   }
  ?>
 <form action="<?php $_SERVER['SELF']; ?>" method="post" >
    <table >
       <tr>
       	  <td>Kode Penyakit </td>
       	  <td>:</td>
       	  <td><input type="text" name="kd_penyakit" size="14" value="<?php echo $kode3 ;?>" readonly="readonly"/></td>
       </tr>

       <tr>
       	 <td>Nama Penyakit</td>
       	 <td>:</td>
       	 <td><input type="text" name="nm_penyakit" size="80" maxlength="40" autofocus></td>
       </tr>

       <tr>
         <td>Pengobatan</td>
         <td>:</td>
         <td><textarea name="pengobatan" cols="81" rows="6"></textarea></td>
       </tr>

       <tr>
       	  <td></td>
       	  <td>&nbsp;</td>
       	  <td><input type="submit" name="btnsimpan" value="Simpan"></td>
       </tr>
            	
    </table>
 </form>