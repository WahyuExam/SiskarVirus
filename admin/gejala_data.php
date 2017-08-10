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

<center><h2>Data Gejala</h2></center><hr>

<?php
  $query = "select * from tblgejala order by kd_gejala asc limit $posisi,$batas ";
  $tampil = mysqli_query($konek,$query); 
 ?>

<table border="0" cellpadding="2" width="100%">
  <tr>
      <form action="?open=Gejala-Add&status=tambah" target="_self" method="Post">
          <td colspan="2" rowspan="2"> <input type="submit" name="btntambah" value="Tambah Data" /></td>
      </form>  
  </tr>
  <tr></tr>

  <tr bgcolor="#CCCCCC">
    <!--<th> No </th> !-->  
    <th width="15%"> Kode Gejala </th>
    <th> Nama Gejala </th>
    <th colspan="2" width="10%"> Action </th>
  </tr>

  <?php
   $no = $posisi+1;

   while ($data = mysqli_fetch_array($tampil)) {
   	if ($no%2==1) {$warna='';} else {$warna='#F5F5F5';}

   	echo "<tr bgcolor=$warna>
   	         <td align='center'>$data[kd_gejala]</td>
   	         <td>$data[nm_gejala]</td>
   	         <td align='center'><a href='?open=Gejala-Edit&kode=$data[kd_gejala]' target='_self' alt='Edit Data'>Ubah</a></td> 
             <td align='center'><a href='?open=Gejala-Hapus&kode=$data[kd_gejala]' target='_self' alt='Delete Data'>Hapus</a></td>
          </tr>";
     $no++;
   }

   echo "</table>";
   
   $query2     = mysqli_query($konek, "select * from tblgejala order by kd_gejala asc");
   $jmldata    = mysqli_num_rows ($query2);
   $jmlhalaman = ceil($jmldata / $batas);

   echo "<br> Halaman : ";

   for ($a=1;$a<=$jmlhalaman;$a++) 
   if ($a != $halaman) {
   	echo "<a href='?open=Gejala-Data&halaman=$a'>$a</a> | ";
   }
   else {
   	echo "<b>$a</b> | ";
   }

?>