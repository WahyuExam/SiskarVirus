<!DOCTYPE html>
<html>
  <head>
  	  <title> Sistem Pakar Virus</title>
  	  <link rel="stylesheet" href="../css/desig1.css">
  </head>

  <body>
  	 <div id="wrapper">
  	    <div id="header">
  	      <img src="../gambar/header.jpg" alt="Gagal Memuat Gambar" />
  	     
  	      <div id="tampil_menu">
  	        <?php
             $tanggal = date("Y-m-d");
             $thn = substr($tanggal,0,4);
             $bln = substr($tanggal, 5,2);
             $tgl = substr($tanggal, 8,2);

             if ($bln=='01') $namabulan = 'Januari';
             elseif ($bln=='02') $namabulan ='Februari';
             elseif ($bln=='03') $namabulan ='Maret';
             elseif ($bln=='04') $namabulan ='April';
             elseif ($bln=='05') $namabulan ='Mei';
             elseif ($bln=='06') $namabulan ='Juni';
             elseif ($bln=='07') $namabulan ='Juli';
             elseif ($bln=='08') $namabulan ='Agustus';
             elseif ($bln=='09') $namabulan ='September';
             elseif ($bln=='10') $namabulan ='Oktober';
             elseif ($bln=='11') $namabulan ='November';
             elseif ($bln=='12') $namabulan ='Desember';

             $namahari = date('l', strtotime($tanggal));

             if ($namahari=='Sunday') $namabln='Minggu';
             elseif ($namahari=='Monday') $namabln='Senin';
             elseif ($namahari=='Tuesday') $namabln='Selasa';
             elseif ($namahari=='Wednesday') $namabln='Rabu';
             elseif ($namahari=='Thursday') $namabln='Kamis';
             elseif ($namahari=='Friday') $namabln='Jumat';
             elseif ($namahari=='Saturday') $namabln='Sabtu';
            
            echo "<b>$namabln, $tgl $namabulan $thn</b>"; 
  	         ?>
  	      </div>
  	    </div>
          <div id="sidebar">
           <?php
              if(isset($_SESSION['SES_LOGIN'])){
              # JIKA YANG LOGIN LEVEL ADMIN, menu di bawah yang dijalankan
          ?>
              <ul id="simple">
              <li><a href="?open=halaman-utama" title="Halaman Utama">Beranda</a></li>
              <li><a href="?open=Penyakit-Data" title="Penyakit-Data">Data Penyakit</a></li>
              <li><a href="?open=Gejala-Data" title="Gejala-Data">Data Gejala</a></li>
              <li><a href="?open=Basis-Aturan" title="Basis-Aturan">Basis Aturan</a></li>
              <li><a href="?open=Laporan" title="Laporan">Laporan</a></li>
              <li><a href="?open=Ubah-Sandi" title="Ubah-Sandi">Ubah Kata Sandi</a></li>
              <li><a href="?open=Logout" title="Logout (Exit)">Logout</a></li>
            </ul>
          <?php 
          }
           else {
          # JIKA BELUM LOGIN (BELUM ADA SESION LEVEL YG DIBACA)
           ?>
             <ul id="simple">
                <li><a href='?open=Login' title='Login System'>Login</a></li> 
             </ul>
           <?php
           }
           ?>
        </div>

 

