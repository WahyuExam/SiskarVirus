<?php
  include "../lib/koneksi.php";

  $batas = 10;
  $halaman = $_GET['halaman'];
  if (empty($halaman)) {
  	$posisi = 0;
  	$halaman = 1;
  }
  else {
  	$posisi = ($halaman-1) * $batas;
  }
 ?>

<center><h2>Data Basis Aturan</h2></center><hr>

<?php
 // $query = "select * from tblgejala limit $posisi,$batas";
  $query = "select a.kd_aturan, b.kd_penyakit, b.nm_penyakit, c.kd_gejala, c.nm_gejala, a.nl_prob from tblaturan a, tblpenyakit b, tblgejala c where a.kd_penyakit=b.kd_penyakit and a.kd_gejala=c.kd_gejala order by b.kd_penyakit asc, c.kd_gejala asc limit $posisi, $batas";

  $tampil = mysqli_query($konek,$query); 
 ?>

<table border="0" cellpadding="2" width="100%">
  <tr>
      <form action="?open=Aturan-Add&status=tambah" target="_self" method="Post">
          <td colspan="2" rowspan="2"> <input type="submit" name="btntambah" value="Tambah Data" /></td>
      </form>  
  </tr>
  <tr></tr>

  <tr bgcolor="#CCCCCC">
    <th> No </th>  
    <th width="20%"> Nama Penyakit </th>
    <th> Nama Gejala </th>
    <th> Nilai Probabilitas (%) </th> 
    <th colspan="2" width="10%"> Action </th>
  </tr>

  <?php
   $no = $posisi+1;

   while ($data = mysqli_fetch_array($tampil)) {
   	if ($no%2==1) {$warna='';} else {$warna='#F5F5F5';}

   	echo "<tr bgcolor=$warna>
             <td align='center'>$no</td>  
   	         <td>$data[nm_penyakit]</td>
   	         <td>$data[nm_gejala]</td>
             <td align='center'>$data[nl_prob]</td>
   	         <td align='center'><a href='?open=Aturan-Edit&kode=$data[kd_aturan]' target='_self' alt='Edit Data'>Ubah</a></td> 
             <td align='center'><a href='?open=Aturan-Hapus&kode=$data[kd_aturan]' target='_self' alt='Delete Data'>Hapus</a></td>
          </tr>";
     $no++;
   }

   echo "</table>";

   $semuadata  ="select a.kd_aturan, b.kd_penyakit, b.nm_penyakit, c.kd_gejala, c.nm_gejala, a.nl_prob from tblaturan a, tblpenyakit b, tblgejala c where a.kd_penyakit=b.kd_penyakit and a.kd_gejala=c.kd_gejala order by b.kd_penyakit asc, c.kd_gejala asc";

   $query2     = mysqli_query($konek, $semuadata);
   $jmldata    = mysqli_num_rows ($query2);
   $jmlhalaman = ceil($jmldata / $batas);

   echo "<br> Halaman : ";

   for ($a=1;$a<=$jmlhalaman;$a++) 
   if ($a != $halaman) {
   	echo "<a href='?open=Basis-Aturan&halaman=$a'>$a</a> | ";
   }
   else {
   	echo "<b>$a</b> | ";
   }

?>