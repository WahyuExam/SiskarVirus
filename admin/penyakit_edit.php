<center><h2> Ubah Data Penyakit </h2></center> <hr>
<?php
 include "../lib/koneksi.php";

 $kdpenyakit = $_POST['kd_penyakit'];
 $nmpenyakit = $_POST['nm_penyakit'];
 $pengobatan = $_POST['pengobatan'];

 //validasi 
if (isset($_POST['btnsimpan'])) {

    $pesanerror = array();
    if (trim($nmpenyakit)=="") {
     	$pesanerror[] = "Nama Penyakit Wajib Diisi";
    }

    if (trim($pengobatan)==""){
      $pesanerror[] = "Pengobatan Wajib Diisi";
    }

     $ceksql = mysqli_query($konek, "select * from tblpenyakit where nm_penyakit='$nmpenyakit' AND NOT(nm_penyakit='".$_POST['txtlama']."')");
    if (mysqli_num_rows($ceksql) >=1) {
    	$pesanerror[] = "Nama Penyakit Sudah Ada"; 
    } 

     //tampilkam isi pesan error;

    if (count($pesanerror)>=1) {
 	  $no=0;
    	foreach($pesanerror as $indek => $isi_pesan) {
 	    	$no++;
 	    	echo "$no. $isi_pesan";
    	}
   	echo "<hr>";
   }
   else {
   	$update = mysqli_query($konek,"update tblpenyakit set nm_penyakit='$nmpenyakit', pengobatan='$pengobatan' where kd_penyakit='$kdpenyakit'");
   	if ($update) {
   		echo  "<meta http-equiv='refresh' content='0; url=?open=Penyakit-Data'>";
   	}
   	exit;
   }
}
 ?>

<?php
 $kdpenyakit=$_GET['kode'];

 $data = mysqli_query($konek, "select * from tblpenyakit where kd_penyakit='$kdpenyakit'");

 $hasil = mysqli_fetch_array($data);

// $dataNama	= isset($_POST['nm_gejala']) ? $_POST['nm_gejala'] : $hasil['nm_gejala'];
// echo "$dataNama";
 ?>

  <form action="<?php $_SERVER['SELF']; ?>" method="post" >
    <table >
       <tr>
       	  <td>Kode Penyakit </td>
          <td>:</td>
       	  <td><input type="text" name="kd_penyakit" size="14" value="<?php echo $hasil['kd_penyakit'] ;?>" readonly="readonly"/></td>
       </tr>

       <tr>
       	 <td>Nama Penyakit</td>
         <td>:</td>
       	 <td><input type="text" name="nm_penyakit" size="80" maxlength="30" value="<?php echo $hasil['nm_penyakit'] ;?>" autofocus> 
       	       <input type="hidden" name="txtlama" value="<?php echo $hasil['nm_penyakit'];?>" />
       	 </td>
       </tr>

       <tr>
         <td>Pengobatan</td>
         <td>:</td>
         <td><textarea cols="81" rows="6" name="pengobatan"><?php echo $hasil['pengobatan']; ?></textarea></td>
       </tr>

       <tr>
       	  <td>&nbsp;</td>
          <td>&nbsp;</td>
       	  <td><input type="submit" name="btnsimpan" value="Simpan"></td>
       </tr>
            	
    </table>
 </form>