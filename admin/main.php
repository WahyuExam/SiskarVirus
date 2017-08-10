  <div id="isi">
    <?php
       if(isset($_SESSION['SES_LOGIN'])) {
          echo "<h2 > Selamat Datang Admin</h2>";
          echo "<p>Pada Halaman ini anda dapat mengelola data, basis aturan dari sistem pakar ini </p>";
          echo "<p>Silahkan pilih menu disebelah kiri, untuk mengelola basis aturan Penyakit dan Gejalanya</p>";
        //  exit;
        }
        else {
        echo "<h2 style='margin:-5px 0px 5px 0px; padding:0px;'>Selamat datang admin........!</h2></p>";
        echo "<b>Anda belum login, silahkan login untuk mengakses sistem ini ";  
       }
    ?>     
  </div>