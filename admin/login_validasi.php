<?php 
if(isset($_POST['btnLogin'])){
	$pesanError = array();
	if ( trim($_POST['txtUser'])=="") {
		$pesanError[] = "Data <b> Username </b>  tidak boleh kosong !";		
	}
	if (trim($_POST['txtPassword'])=="") {
		$pesanError[] = "Data <b> Password </b> tidak boleh kosong !";		
	}
	
	# Baca variabel form
	$txtUser 	= $_POST['txtUser'];
	$txtUser 	= str_replace("'","&acute;",$txtUser);
	
	$txtPassword=$_POST['txtPassword'];
	$txtPassword= str_replace("'","&acute;",$txtPassword);
	
	# JIKA ADA PESAN ERROR DARI VALIDASI
	if (count($pesanError)>=1 ){
		echo "<div class='mssgBox'>";
		echo "<img src='../gambar/attention.png'> <br><hr>";
			$noPesan=0;
			foreach ($pesanError as $indeks=>$pesan_tampil) { 
			$noPesan++;
				echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";	
			} 
		echo "</div> <br>"; 
		
		// Tampilkan lagi form login
		include "login.php";
	}
	else {
		# LOGIN CEK KE TABEL USER LOGIN
		$koneksidb = mysqli_connect("localhost","root","","dbvirus");
		$mySql = "SELECT * FROM tbladmin WHERE pengguna='".$txtUser."' AND sandi='".$txtPassword."'";
		$myQry = mysqli_query($koneksidb,$mySql) or die ("Query Salah : ".mysqli_error());
		$myData= mysqli_fetch_array($myQry);
		
		# JIKA LOGIN SUKSES
		if(mysqli_num_rows($myQry) >=1) {
			$_SESSION['SES_LOGIN'] = $myData['pengguna']; 
			// Refresh
			echo "<meta http-equiv='refresh' content='0; url=?open=Halaman-Utama'>";
		}
		else {
			echo "<p><center>Login Gagal Pengguna atau Kata Sandi Salah</center></p>";
		}
	}
} // End POST
?>