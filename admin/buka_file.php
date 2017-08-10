<?php
# KONTROL MENU PROGRAM
if($_GET) {
	// Jika mendapatkan variabel URL ?page
	switch($_GET['open']){				
		case '' :
			if(!file_exists ("main.php")) die ("Empty Main Page!"); 
			include "main.php";	break;
			
		case 'Halaman-Utama' :
			if(!file_exists ("main.php")) die ("File program tidak ditemukan !"); 
			include "main.php";	break;
			
		case 'Login' :
			if(!file_exists ("login.php")) die ("File program tidak ditemukan !"); 
			include "login.php"; break;
			
		case 'Login-Validasi' :
			if(!file_exists ("login_validasi.php")) die ("File program tidak ditemukan !"); 
			include "login_validasi.php"; break;
			
		case 'Logout' :
			if(!file_exists ("login_out.php")) die ("File program tidak ditemukan !"); 
			include "login_out.php"; break;	

		case 'Ubah-Sandi' :
			if(!file_exists ("ubah_sandi.php")) die ("File program tidak ditemukan !"); 
			include "ubah_sandi.php"; break;	

		# PAKAR LOGIN
		case 'Pakar-Password' :				
			if(!file_exists ("pakar_password.php")) die ("File program tidak ditemukan !"); 
			include "pakar_password.php";	 break;		

		# PAKAR LOGIN
		case 'Pakar-Data' :				
			if(!file_exists ("pakar_data.php")) die ("File program tidak ditemukan !"); 
			include "pakar_data.php";	 break;		
		case 'Pakar-Add' :				
			if(!file_exists ("pakar_add.php")) die ("File program tidak ditemukan !"); 
			include "pakar_add.php";	 break;		
		case 'Pakar-Edit' :				
			if(!file_exists ("pakar_edit.php")) die ("File program tidak ditemukan !"); 
			include "pakar_edit.php"; break;	
		case 'Pakar-Delete' :				
			if(!file_exists ("pakar_delete.php")) die ("File program tidak ditemukan !"); 
			include "pakar_delete.php"; break;	

		# GEJALA
		case 'Gejala-Data' :
			if(!file_exists ("gejala_data.php")) die ("File program tidak ditemukan !"); 
			include "gejala_data.php"; break;		
		case 'Gejala-Add' :
			if(!file_exists ("gejala_tambah.php")) die ("File program tidak ditemukan !"); 
			include "gejala_tambah.php";	break;		
		case 'Gejala-Hapus' :
			if(!file_exists ("gejala_delete.php")) die ("File program tidak ditemukan !"); 
			include "gejala_delete.php"; break;		
		case 'Gejala-Edit' :
			if(!file_exists ("gejala_edit.php")) die ("File program tidak ditemukan !"); 
			include "gejala_edit.php"; break;	
			
		# PENYAKIT
		case 'Penyakit-Data' :
			if(!file_exists ("penyakit_data.php")) die ("File program tidak ditemukan !"); 
			include "penyakit_data.php"; break;		
		case 'Penyakit-Add' :
			if(!file_exists ("penyakit_add.php")) die ("File program tidak ditemukan !"); 
			include "penyakit_add.php"; break;		
		case 'Penyakit-Delete' :
			if(!file_exists ("penyakit_delete.php")) die ("File program tidak ditemukan !"); 
			include "penyakit_delete.php"; break;		
		case 'Penyakit-Edit' :
			if(!file_exists ("penyakit_edit.php")) die ("File program tidak ditemukan !"); 
			include "penyakit_edit.php"; break;	
			
		# ATURAN
		case 'Basis-Aturan' :
			if(!file_exists ("aturan_data.php")) die ("File program tidak ditemukan !"); 
			include "aturan_data.php"; break;		
		case 'Aturan-Add' :
			if(!file_exists ("aturan_add.php")) die ("File program tidak ditemukan !"); 
			include "aturan_add.php"; break;		
		case 'Aturan-Hapus' :
			if(!file_exists ("aturan_delete.php")) die ("File program tidak ditemukan !"); 
			include "aturan_delete.php"; break;		
		case 'Aturan-Edit' :
			if(!file_exists ("aturan_edit.php")) die ("File program tidak ditemukan !"); 
			include "aturan_edit.php"; break;			

		# KONSULTASI
		case 'Proses1' :
			if(isset($_GET['page'])=='pengunjung'){
				if(!file_exists ("../pengunjung.php")) die ("File program tidak ditemukan !"); 
				include "../pengunjung.php"; 
			}
		break;
		case 'Proses2' :
			if(isset($_GET['page'])=='konsultasi_pilih_gejala'){
				if(!file_exists ("../konsultasi_pilih_gejala.php")) die ("File program tidak ditemukan !"); 
				include "../konsultasi_pilih_gejala.php"; 
			}
		break;

		#RIWAYAT
		case 'Laporan' :
			if(!file_exists ("laporan.php")) die ("File program tidak ditemukan !"); 
			include "laporan.php"; break;	
		# REPORT INFORMASI / LAPORAN DATA

		case 'Lihat_data' :
		    if (!file_exists("lihat_data.php")) die ("File program tidak ditemukan !");
		    include "lihat_data.php";
		    break;	
		
		default:
			if(!file_exists ("main.php")) die ("Empty Main Page!"); 
			include "main.php";						
		break;
	}

}
else {
	// Jika tidak mendapatkan variabel URL : ?page
	if(!file_exists ("main.php")) die ("File program tidak ditemukan !"); 
	include "main.php";	
}
?>