<center><h2> Ubah Data Gejala</h2></center> <hr>
<?php
 include "../lib/koneksi.php";

 $kdgejala = $_POST['kd_gejala'];
 $nmgejala = $_POST['nm_gejala'];

 //validasi 
if (isset($_POST['btnsimpan'])) {

    $pesanerror = array();
    if (trim($nmgejala)=="") {
     	$pesanerror[] = "Nama Gejala Wajib Diisi";
    }

     $ceksql = mysqli_query($konek, "select * from tblgejala where nm_gejala='$nmgejala' AND NOT(nm_gejala='".$_POST['txtlama']."')");
    if (mysqli_num_rows($ceksql) >=1) {
    	$pesanerror[] = "Nama Gejala Sudah Ada"; 
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
   	$update = mysqli_query($konek,"update tblgejala set nm_gejala='$nmgejala' where kd_gejala='$kdgejala'");
   	if ($update) {
   		echo  "<meta http-equiv='refresh' content='0; url=?open=Gejala-Data'>";
   	}
   	exit;
   }
}
 ?>

<?php
 $kdgejala=$_GET['kode'];

 $data = mysqli_query($konek, "select * from tblgejala where kd_gejala='$kdgejala'");

 $hasil = mysqli_fetch_array($data);

// $dataNama	= isset($_POST['nm_gejala']) ? $_POST['nm_gejala'] : $hasil['nm_gejala'];
// echo "$dataNama";
 ?>

  <form action="<?php $_SERVER['SELF']; ?>" method="post" >
    <table >
       <tr>
       	  <td>Kode Gejala </td>
       	  <td>: <input type="text" name="kd_gejala" size="14" value="<?php echo $hasil['kd_gejala'] ;?>" readonly="readonly"/></td>
       </tr>

       <tr>
       	 <td>Nama Gejala</td>
       	 <td>: <input type="text" name="nm_gejala" size="80" maxlength="80" value="<?php echo $hasil['nm_gejala'] ;?>" autofocus> 
       	       <input type="hidden" name="txtlama" value="<?php echo $hasil['nm_gejala'];?>" />
       	 </td>
       </tr>

       <tr>
       	  <td></td>
       	  <td>&nbsp;&nbsp;<input type="submit" name="btnsimpan" value="Simpan"></td>
       </tr>
            	
    </table>
 </form>