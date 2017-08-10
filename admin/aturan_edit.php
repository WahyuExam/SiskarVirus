<?php 
  include "../lib/koneksi.php";
 ?>

<center><h2>Ubah Data Aturan</h2></center><hr>

<?php
  $id          = $_GET['kode'];
  $kd_penyakit = $_POST['cmbpenyakit'];
  $kd_gejala   = $_POST['cmbgejala']; 
  $nilai       = $_POST['nil_pro'];
//  $nilai       = str_replace(",",".",$nilai);

  if (isset($_POST['btnsimpan'])) {
  	$pesanerror = array();

  	if ($_POST['cmbpenyakit']=="Kosong") {
  		$pesanerror[] = "Penyakit Belum Dipilih";
  	}

  	if ($_POST['cmbgejala']=="Kosong") {
  		$pesanerror[] = "Gejala Belum Dipilih";
  	}

  	$angka = "^[0-9]+$";
  	$titik = "^\.+$";
  	if (trim($_POST['nil_pro']=="")) {
  		$pesanerror[] = "Nilai Probabilitas Belum Diisi";
  	}
  	elseif (!preg_match("/^[0-9].*$/", $_POST['nil_pro'])) {
  		$pesanerror[] = "Inputan Nilai Probabilitas Hanya Berupa Angka dan Titik (.)";
  	}

  	$kodesama = mysqli_query($konek, "select * from tblaturan where kd_penyakit='$kd_penyakit' and kd_gejala='$kd_gejala' and not (kd_gejala='".$_POST['cmbgejalalama']."') ");
  	if ($hasil = mysqli_num_rows($kodesama)>=1) {
  		$pesanerror[] = "Data Sudah ada";
  	} 

  	//tamplkan 
  	if (count($pesanerror)>=1) {
  		$no = 0;
  		foreach ($pesanerror as $index => $isi_pesan) {
  			$no++;
  			echo "$no. $isi_pesan <br>";
  		}
    echo "<hr>"; 
  	}
  	else { 
      $simpandata = mysqli_query($konek,"update tblaturan set kd_gejala='$kd_gejala', nl_prob='$nilai' where kd_aturan='$id'");


  		//Perhitungan Probabilitas penyakit;
  		//menampilkan semua isi tabel penyakit;

  		$list_penyakit = array();
  		$lst_penyakit  = mysqli_query($konek, "select * from tblpenyakit order by kd_penyakit asc");
  		while ($hslpenyakit   = mysqli_fetch_array($lst_penyakit)) {
  			$list_penyakit[] = $hslpenyakit[kd_penyakit];
  		}

  		//lakukan looping untuk mencari nilai porbabias penyakit setiap gejala di tabel aturan;
        $list_nilai_prob = array ();
        $bagi_nil = array ();
        $kali_nil = array ();

  		for ($a=0;$a<=count($list_penyakit)-1;$a++){
  			$sortnilgejala = mysqli_query($konek, "select * from tblaturan where kd_penyakit='$list_penyakit[$a]'");            
  			$jumlah_nil = 0;
  			$nl_prob    = 0;

  			while ($hasilsort = mysqli_fetch_array($sortnilgejala)) {
                $list_nilai_prob[] = $hasilsort[nl_prob];
  			    $jumlah_nil = $jumlah_nil + $hasilsort[nl_prob];

                //membagi dan mengali setiap gejala dengan $jumlah_nil
                for ($b=0;$b<=count($list_nilai_prob)-1;$b++){
            	   $bagi_nil[$b] = $list_nilai_prob[$b] / $jumlah_nil;
            	   $kali_nil[$b] = $list_nilai_prob[$b] * $bagi_nil[$b];   
                }

            }
           
           //nilai probabilitas penyakit
           for ($d=0;$d<=count($kali_nil)-1;$d++){
              $nl_prob      = $nl_prob + $kali_nil[$d];
           }

           //membersihkan isi array
           unset($list_nilai_prob);
           unset($bagi_nil);
           unset($kali_nil);
           $nl_prob = number_format($nl_prob,4);            
           
           $simpan_nilai = mysqli_query ($konek, "update tblpenyakit set nl_penyakit='$nl_prob' where kd_penyakit='$list_penyakit[$a]'");
           if ($simpan_nilai) {
           	  echo "<meta http-equiv='refresh' content='0; url=?open=Basis-Aturan'>";
           }
  		}
    } 
  }
 ?>


 <?php
  $query = "select * from tblaturan where kd_aturan='$id'";

  $tampil        = mysqli_query($konek,$query);
  $hasiltampil   = mysqli_fetch_array($tampil);
 // $data_id       = isset($_POST['nil_pro']) ? $_POST['nil_pro'] : $hasiltampil['kd_aturan'];//       $hasil[kd_aturan];
 // $data_penyakit = isset($_POST['cmbpenyakit']) ? $_POST['cmbpenyakit'] : $hasiltampil['kd_penyakit'];//$hasil[kd_penyakit];
 // $data_gejala   = isset($_POST['cmbgejala']) ? $_POST['cmbgejala'] : $hasiltampil['kd_gejala'];
 // $data_nilia    = isset($_POST['nil_pro']) ? $_POST['nil_pro'] : $hasiltampil['nl_prob'];

  ?>

<form action="<?php $_SERVER['SELF'];?>" method="post">
  <table>
    <tr>
      <td>Nama Penyakit</td>
      <td>: <select name="cmbpenyakit" disabled>
               <option value="Kosong">....................</option>
                  <?php
                     $penyakit = mysqli_query($konek,"select * from tblpenyakit order by kd_penyakit asc");
                     while($hasilpenyakit = mysqli_fetch_array($penyakit)) {
                       if ($hasilpenyakit[kd_penyakit]==$hasiltampil[kd_penyakit]){
                        $cek = " selected";
                       }
                       else{
                        $cek = "";
                       }
                     	echo "<option value='$hasilpenyakit[kd_penyakit]' $cek>$hasilpenyakit[kd_penyakit] | $hasilpenyakit[nm_penyakit]</option>";
                     }
                  ?>
          </select>
          <input type="hidden" name="cmbpenyakitlama" value="<?php echo $hasiltampil[kd_penyakit];?>">
      </td>   
    </tr>

    <tr>
      <td>Nama Gejala</td>
      <td>: <select name="cmbgejala">
               <option value="Kosong">....................</option>
                  <?php
                      $gejala = mysqli_query($konek,"select * from tblgejala order by kd_gejala asc");
                     while($hasilgejala = mysqli_fetch_array($gejala)) {
                       if ($hasilgejala[kd_gejala]==$hasiltampil[kd_gejala]){
                        $cek = " selected";
                       }
                       else{$cek = "";}
                     	echo "<option value='$hasilgejala[kd_gejala]' $cek>$hasilgejala[kd_gejala] | $hasilgejala[nm_gejala]</option>";
                     }
                  ?>
          </select>
          <input type="hidden" name="cmbgejalalama" value="<?php echo $hasiltampil[kd_gejala];?>">
      </td>   
    </tr>

    <tr>
      <td>Nilai Probabilitas</td>
      <td>: <select name="nil_pro">
               <option value="Kosong">.....</option>
               <?php
                for ($a=10;$a<=90;$a+=10) {
                  $b=$a/100;
                  if ($hasiltampil[nl_prob]==$b) {
                    $cek = "selected";
                  }
                  else
                  {
                    $cek='';
                  }
                  echo "<option value=\"$b\" $cek>$b";
                }
                ?>
            </select>
            <input type="hidden" name="nilailama" value="<?php// echo $data_nilia ;?>">
      </td>
    </tr>

    <tr>
    	<td>&nbsp;</td>
    	<td>&nbsp;&nbsp;<input type="submit" name="btnsimpan" value="Simpan"></td>
    </tr>
  </table>
</form>