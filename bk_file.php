<?php
# KONTROL MENU PROGRAM
if($_GET) {
  // Jika mendapatkan variabel URL ?page
  switch($_GET['open']){        
    case '' :
      if(!file_exists ("public/beranda.php")) die ("Empty Main Page!"); 
      include "public/beranda.php"; break;
      
    case 'Halaman-Utama' :
      if(!file_exists ("public/beranda.php")) die ("File program tidak ditemukan !"); 
      include "public/beranda.php"; break;
      
    case 'konsultasi_gejala_penyakit' :
      if(!file_exists ("konsultasi_pilih_gejala.php")) die ("File program tidak ditemukan !"); 
      include "konsultasi_pilih_gejala.php"; break;
           

    # KONSULTASI

    case 'proses_bayes' :
     if (!file_exists("hitung_bayes.php")) die ("File program tidak ditemukan !");
     include "hitung_bayes.php"; break;

    case 'Proses2' :
      if(isset($_GET['page'])=='konsultasi_pilih_gejala'){
        if(!file_exists ("../konsultasi_pilih_gejala.php")) die ("File program tidak ditemukan !"); 
        include "../konsultasi_pilih_gejala.php"; 
      }
    break;

    default:
      if(!file_exists ("public/beranda.php")) die ("Empty Main Page!"); 
      include "public/beranda.php";           
    break;
  }

}
else {
  // Jika tidak mendapatkan variabel URL : ?page
  if(!file_exists ("public/beranda.php")) die ("File program tidak ditemukan !"); 
  include "public/beranda.php"; 
}
?>