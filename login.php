<?php
session_start();
require_once 'admin/config/config.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Material Design Lite</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="assets/images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="assets/images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="assets/images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="assets/images/favicon.png">
    <link rel="manifest" href="manifest.json">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="assets/css/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    </style>
  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Home</span>
          <div class="mdl-layout-spacer"></div>
          <!-- Number badge on icon -->
          <?php
          if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
          {
            ?>
            <a href="keranjang.php">
              <div class="material-icons mdl-badge mdl-badge--overlap" data-badge="0">account_box</div>
            </a>
            <?php
          } else{
            ?>
            <a href="keranjang.php">
              <div class="material-icons mdl-badge mdl-badge--overlap" data-badge="<?php echo count($_SESSION['keranjang']); ?>">account_box</div>
            </a>
            <?php
            }
          ?>

        </div>
      </header>
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        
        <?php include_once 'drawer.php'; ?>

        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
          <?php include_once 'menu.php'; ?>
        </nav>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <style type="text/css">
            .font__12px{
              font-size: 12px;
            }
          </style>
          <!-- Textfield with Floating Label -->
<form method="POST">
  <div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" name="user" placeholder="Username">
    <label class="mdl-textfield__label" for="sample3">Username</label>
  </div>
  <div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="password" name="pass" placeholder="Password">
    <label class="mdl-textfield__label" for="sample3">Password</label>
  </div>
  <!-- Colored raised button -->
<input type="submit" name="submit" class="mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button--raised mdl-button--colored" value="submit">
</form>

<?php 
	// jika ada tombol simpan (tombol simpan di simpan)
	if (isset($_POST['submit']))
	{
		$user = $_POST["user"];
		$pass = $_POST["pass"];
		//lakukan query ngecek akun di tabel pelanggan di db
		$ambil = $conn->query("SELECT * FROM users
		WHERE username='$user' AND password='$pass'");
		
		//menghitung akun yang terambil
		$num = $ambil->num_rows;
		
		//jika 1 akun yang cocok, maka diloginkan
		if ($num==1)
		{
			//anda suksek login
			//mendapatkan akun dlm beltuk aray
			$akun = $ambil->fetch_assoc();
			//simpan di session pelanggan
			$_SESSION["pelanggan"] = $akun;
			// echo "<script>alert('anda sukses login');</script>";
      echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
      ?>
      <script type="text/javascript">
        swal('LOGIN!', 'Anda berhasil Login!', 'success')
        .then((value) => {
          <?php
          if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"])) {
            echo "location='checkout.php';";
          } else {
           echo "location='index.php';";
          }
          ?>
        });
      </script>
      <?php

			//jika sudah belanja
			// if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"]))
			// {
			// 	echo "<script>location='checkout.php';</script>";
			// }
			// else
			// {
			// 	echo "<script>location='index.php';</script>";
			// }
			
		}
		else
		{
			//anda gagal login
			echo "<script>alert('anda gagal login, periksa akun anda');</script>";
			echo "<script>location='login.php';</script>";
		}
	}
	
	?>
        </div>
      </main>
    </div>
    <script src="assets/js/material.min.js"></script>
    
  </body>
</html>
