<?php
  include "../lib/koneksi.php";
  
  $batas = 5;
  $halaman = $_GET['hal'];
  if (empty($halaman)) {
  	$posisi = 0;
  	$halaman = 1;
  }
  else {
  	$posisi = ($halaman-1) * $batas;
  }


//  if (isset($_POST['btnlihat'])) {
  	$tahun = $_POST['tahun'];
  	$bulan = $_POST['bulan'];

    switch($bulan) {
    	case '01':
    	$bulan_nama = "Januari"; break;

    	case '02':
    	$bulan_nama = "Februari"; break;

    	case '03':
    	$bulan_nama = "Maret"; break;

    	case '04':
    	$bulan_nama = "April"; break;

    	case '05':
    	$bulan_nama = "Mei"; break;

    	case '06':
    	$bulan_nama = "Juni"; break;

    	case '07':
    	$bulan_nama = "Juli"; break;

    	case '08':
    	$bulan_nama = "Agustus"; break;

    	case '09':
    	$bulan_nama = "September"; break;

    	case '10':
    	$bulan_nama = "Oktober"; break;

    	case '11':
    	$bulan_nama = "November"; break;

    	case '12':
    	$bulan_nama = "Desember"; break;

    }
   
     echo "<center><h3>Laporan Hasil Diagnosa Bulan ".$bulan_nama." Tahun ".$tahun."</h3></center><hr>";
     echo "<table border='1' width='100%'>
          <tr>
  	        <th align='center'>No</th>
  	        <th align='center' width='15%'>Tgl Diagnosa</th>
         	<th align='center'>Nama Pengunjung</th>
        	<th align='center'>Gejala yang Dialami</th>
          	<th>Diagnosa Penyakit</th>
          </tr>";


    $no=$posisi+1;
  	$query_lap = mysqli_query($konek,"select * from tblpengunjung where tgl_diagnosa like '%$tahun-$bulan%' LIMIT $posisi,$batas");
    //if (mysqli_num_rows($query_lap)>=1) {
    	while ($hasil = mysqli_fetch_array($query_lap)) {
    		$tgll = $hasil[tgl_diagnosa];
    		$thn = substr($tgll, 0,4);
    		$bln = substr($tgll, 5,2);
    		$tgl = substr($tgll, 8,2);
    		$hsl = $tgl.'-'.$bln.'-'.$thn;

  		echo "<tr>
  		         <td align='center'>$no</td>
  		         <td align='center'>$hsl</td>
  		         <td>$hasil[nm_pengunjung]</td>
  		         <td>$hasil[gejala]</td>
  		         <td>$hasil[penyakit]</td> 
            </tr>";
            $no++;
    	}

  //  }
  //  else {
  //  	echo "Data Tidak ada";
  //  }
  //}
 ?>
</table>
<?php
   $query2     = mysqli_query($konek,"select * from tblpengunjung where tgl_diagnosa like '%$tahun-$bulan%'");
   $jmldata    = mysqli_num_rows ($query2);
   $jmlhalaman = ceil($jmldata / $batas);

   echo "<br> Halaman : ";

   for ($a=1;$a<=$jmlhalaman;$a++) 
   if ($a != $halaman) {
   	echo "<a href='?open=Lihat_data&hal=$a'>$a</a> | ";
   }
   else {
   	echo "<b>$a</b> | ";
   }
 ?>     