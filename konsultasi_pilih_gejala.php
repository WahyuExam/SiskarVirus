<center><h2> Konsultasi Gejala Penyakit</h2></center><hr>
<?php
  include "lib/koneksi.php";


  if (isset($_POST['btnkonsul'])) {
    $nama        = $_POST['nama'];

    $pesan = array(); 
  	if (trim($nama)=="") {
      $pesan[] = "Nama Wajib Disi";
  	}

  	if (count($_POST['daftargejala'])<=0) {
  		$pesan [] = "Gejala Belum Dipilih";
  	}

    if (count($_POST['daftargejala'])<2) {
      $pesan [] = "Minimal Masukkan 2 Gejala";
    }

  	if (count($pesan)>=1) {
  	  $no=0;
  	     foreach($pesan as $index => $pesanerror) {
  		 $no++;
  		echo "$no. $pesanerror<br>";
  	  }
  			echo "<hr>";
  	}

  	else{
  		$simpan = mysqli_query($konek, "insert into tblpengunjung (nm_pengunjung,tgl_diagnosa) values ('$nama','".date('Y-m-d')."')");
      if ($simpan) {
          echo "<meta http-equiv='refresh' content='0; url=?open=proses_bayes&u=".mysqli_insert_id($konek)."'>";
          $id = mysqli_insert_id($konek);
          $tampil_tbl_bantu = mysqli_query($konek, "select * from tblbantu where id_pengunjung='$id'");
          $data_gejala = $_POST['daftargejala'];
          
          if ($hasil_tampil = mysqli_num_rows($tampil_tbl_bantu)==0) {
             foreach ($data_gejala as $nilai) {
              $simpan_bantu = mysqli_query ($konek, "insert into tblbantu (id_pengunjung, kd_gejala) values ('$id', '$nilai')");
            } 
          } 
          else{
            $hapus_bantu = mysqli_query($konek,"delete from tblbantu where id_pengunjung='$id'");
          }
      } 
  	}
  }
?>

<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
  <table>
  	  <tr>
  	  	 <td>Masukkan Nama </td>
  	  	 <td>:</td>
  	  	 <td><input type="text" name="nama" size="40" maxlength="25" autofocus></td>
  	  </tr>
  </table>
  <hr>

  <table border="0" cellspacing="2" cellpadding="2" width="100%">
     <tr>
     	<td colspan="3" bgcolor="#65a6ff"> Gejala Yang Dialami </td> 
     </tr>

     <?php
       include "lib/koneksi.php";
       $query_gejala = mysqli_query($konek, "select * from tblgejala order by kd_gejala asc ");

       $no=1;

       while ($hasilquery=mysqli_fetch_array($query_gejala)) {
       	if ($no%2==1) {$warna='';} else {$warna='#DDDDDD';}
        echo "<tr bgcolor='$warna'>"; 
        echo "<td colspan='2'> <input type='checkbox' name='daftargejala[]' value='$hasilquery[kd_gejala]'> $hasilquery[kd_gejala] | $hasilquery[nm_gejala]</td>";
        echo "</tr>";
       $no++;
       }    
   
      ?>

  <tr>
  	<td><input type="submit" name="btnkonsul" value="Konsultasi">&nbsp;<input type="reset" name="btnreset" value="Batal"></td>
  </tr>
  </table> 
</form>