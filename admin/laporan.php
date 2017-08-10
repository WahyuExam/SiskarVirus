<center><h2>Laporan Hasil Konsultasi</h2></center><hr>
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
  <table>
  	 <tr>
  	 	<td>Bulan</td>
  	 	<td>: <select name="bulan">
  	 	         <option valeu="kosong">..........</option>
  	 	         <option value="01">Januari</option>
  	 		     <option value="02">Februari</option>
  	 		     <option value="03">Maret</option>
  	 		     <option value="04">April</option>
  	 		     <option value="05">Mei</option>
  	 		     <option value="06">Juni</option>
  	 		     <option value="07">Juli</option>
  	 		     <option value="08">Agustus</option>
  	 		     <option value="09">September</option>
  	 		     <option value="10">Oktober</option>
  	 		     <option value="11">November</option>
  	 		     <option value="12">Desember</option>
  	 	      </select>
  	 	</td>
  	 </tr>

  	 <tr>
  	 	<td>Tahun</td>
  	 	<td>: <select name="tahun">
                  <option value="kosong">..........</option>
                  <?php
                    $tgl    = date("Y-m-d");
                    $thn    = substr($tgl,0,4);
                    $thndpn = $thn - 5;

                    for ($a=$thn;$a>=$thndpn;$a--) {
                    	echo "<option name=$a>$a</option>";
                    }
                   ?>
              </select>
  	 	</td>
  	 </tr>

  	 <tr>
  	 	<td>&nbsp;</td>
  	 	<td>&nbsp;&nbsp;<input type="submit" name="btnlihat" value="Lihat Data"></td>
  	 </tr>
  </table>
</form>

<?php
 include "../lib/koneksi.php";

 if (isset($_POST['btnlihat'])){
  $tahun = $_POST['tahun'];
  $bulan = $_POST['bulan'];

  $sort_query = mysqli_query($konek,"select * from tblpengunjung where tgl_diagnosa like '%$tahun-$bulan%'");
    if (mysqli_num_rows($sort_query)>0) {
    //echo "<meta http-equiv='refresh' content='0; url=?open=Lihat_data'>";	
    include "lihat_data.php";
 }
 else{
  echo "Data Tidak Ada";
 }
}
?>