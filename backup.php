<html>
<head>
<title>Hasil Konsultasi Gejala Penyakit Nyamuk</title>
</head>
<body text="black">
<script>  
	function print_d(){  
	   window.open('<?php echo "user_cetak.php?u=$_GET[u]";?>','_blank');  
	}  
 </script> 
<h2>HASIL DIAGNOSA</h2>
<?php 
include_once "lib/koneksi.php";

if(isset($_POST['btnkonsul'])){
	$user=$_GET['u'];
	echo "<button onClick='print_d()'>Print</button><br/><br/>
		  <b>Gejala yang didiagnosa : </b><br>";

    $dataGejala = $_POST['dfrgejala'];

	$gejala_user=array();
	foreach ($dataGejala as $nilai) {
		$q_gejala = "SELECT * FROM tblgejala WHERE kd_gejala='$nilai'";
		$r_gejala = mysqli_query($konek, $q_gejala) or die ("Error gejala".mysqli_error());
		$gejalaHsl = mysqli_fetch_array($r_gejala);
		echo $gejalaHsl['kd_gejala'].": ".$gejalaHsl['nm_gejala']."<br>";

		//simpan data gejala dalam array
		$gejala_user[$gejalaHsl['kd_gejala']]=$gejalaHsl['nm_gejala'];
	}
	
	//Data Penyakit
	$penyakit=array(); 
	$gebot=array();
	$p=0;
	$q_penyakit = "SELECT kd_penyakit, nl_penyakit FROM tblpenyakit";
	$r_penyakit = mysqli_query($konek, $q_penyakit) or die ("Error penyakit".mysqli_error());
	while($data_penyakit = mysqli_fetch_array($r_penyakit)){
		//$penyakit[$p]=array();
		$penyakit[$p][0]=$data_penyakit['kd_penyakit'];
		$penyakit[$p][1]=$data_penyakit['nl_penyakit'];
		$q=0;
		//Data Gejala Bobot
		foreach ($dataGejala as $cek_gejala) {
			$q_gejala2 = "SELECT tblaturan.nl_prob FROM tblaturan WHERE tblaturan.kd_penyakit='$data_penyakit[kd_penyakit]' AND tblaturan.kd_gejala='$cek_gejala'";
			$r_gejala2 = mysqli_query($konek, $q_gejala2) or die ("Error gejala".mysqli_error());
			$bobot_gejala = mysqli_fetch_array($r_gejala2);
			
			if(mysqli_num_rows($r_gejala2)>=1){
				$gebot[$p][$q][0]=$data_penyakit['kd_penyakit'];
				$gebot[$p][$q][1]=$cek_gejala;
				$gebot[$p][$q][2]=$bobot_gejala['nl_prob'];
			}else{
				$gebot[$p][$q][0]=$data_penyakit['kd_penyakit'];
				$gebot[$p][$q][1]=$cek_gejala;
				$gebot[$p][$q][2]=0;
			}
			$q++;
		}
		$p++;
	}
	
	//hitung gejala bobot
	$atas=array();
	$sum_bawah=array();
	$bawah=array();
	$hit_gebot=array();
	$hit_total=array();
	$hit_persen=array();
	$hit_max=array();
	for ($a=0; $a <= count($penyakit)-1 ; $a++) { 
		for ($b=0; $b <= count($dataGejala)-1 ; $b++) { 
			//hitung atas
			$atas[$a][$b]=$gebot[$a][$b][2]*$penyakit[$a][1];
			//hitung bawah
			for ($c=0; $c <=count($penyakit)-1 ; $c++) { 
				$sum_bawah[$a][$b][$c]=$gebot[$c][$b][2]*$penyakit[$c][1];
			}
			$bawah[$a][$b]=array_sum($sum_bawah[$a][$b]);
			//hitung atas/bawah
			$hit_gebot[$a][$b]=$atas[$a][$b]/$bawah[$a][$b];
		}
		//sum bobot
		$hit_total[$a]=round(array_sum($hit_gebot[$a]), 4);
		//persentase
		$hit_persen[$a][0]=$penyakit[$a][0];
		$hit_persen[$a][1]=round($hit_total[$a]*100/count($dataGejala), 2);
		
	}

	foreach ($hit_persen as $key) {
		//simpan hasil persentase ke temporari
		$yo=implode(',', $key);
		list($sakit, $persen)=explode(',', $yo);
		//$value=json_encode($value);
		$q_persen = "INSERT INTO tbldiagnosa SET id_pengunjung='$user', kd_penyakit='$sakit', persen='$persen' ";
		$r_persen = mysqli_query($konek, $q_persen) or die ("Error gejala".mysqli_error());
	}

	//Hasil konsultasi
	$q_hasilkonsul = "SELECT tbldiagnosa.kd_penyakit, tblpenyakit.nm_penyakit, tbldiagnosa.persen FROM tbldiagnosa INNER JOIN tblpenyakit ON tbldiagnosa.kd_penyakit=tblpenyakit.kd_penyakit WHERE tbldiagnosa.persen=(SELECT MAX(tbldiagnosa.persen) AS persen FROM tbldiagnosa WHERE tbldiagnosa.id_pengunjung='$user') AND tbldiagnosa.id_pengunjung='$user' LIMIT 1";

	$r_hasilkonsul = mysqli_query($konek, $q_hasilkonsul) or die ("Error gejala".mysqli_error());
	$ht_konsultasi = mysqli_fetch_assoc($r_hasilkonsul);
	echo "<br/>
			<strong>Persentasi Penyakit : </strong><br/>
			".$ht_konsultasi['persen']."% Menderita Penyakit ".$ht_konsultasi['nm_penyakit'];
	
	//Simpan Data Konsultasi
	$gejala_user=implode(',', $gejala_user);
	$gejala_user =str_replace(',', ', ', $gejala_user);
	$q_u_gejala = "UPDATE tblpengunjung SET gejala='$gejala_user', penyakit='$ht_konsultasi[nm_penyakit]', nl_bayes='$ht_konsultasi[persen]'  WHERE id_pengunjung='$user'";
	$r_u_gejala = mysqli_query($konek, $q_u_gejala) or die ("Error gejala".mysqli_error());
	//hapus tamporari
	$q_d_gejala = "DELETE FROM tbldiagnosa WHERE id_pengunjung='$user'";
	$r_d_gejala = mysqli_query($konek, $q_d_gejala) or die ("Error gejala".mysqli_error());

	//lihat hitungan
/*	echo "<pre>";
	echo print_r($hit_persen);
	echo "</pre>";*/
    	
}
else{
	echo "<meta http-equiv='refresh' content='0; url=?'>";
}
?>
</body>
</html>