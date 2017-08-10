<?php
 include "../lib/koneksi.php";

 $id = $_GET['kode'];

 $hapus = mysqli_query($konek,"delete from tblaturan where kd_aturan='$id'");

       //proses mencari nilai penyakit;
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
              $nl_prob  = $nl_prob + $kali_nil[$d];
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
?>