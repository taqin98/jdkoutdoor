<?php include 'config/config.php'; 
session_start();


//jika tidak ada session pelanggan (blm login).mk dilarikan ke login
if (isset($_SESSION["admin"]))
{
	echo "<script>location='index.php';</script>";
}

   

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Material Design Lite</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="../assets/images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="../assets/images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="../assets/images/favicon.png">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="../assets/css/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.material.min.css">
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
  <body class="mdl-color--blue-500">
    <div class="demo-layout mdl-layout  mdl-layout--fixed-header">
      <!-- <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row" style="padding:  0 20px 0 20px;">
          <span class="mdl-layout-title"><i class="material-icons">arrow_back</i></span>

        </div>
      </header> -->

      <main class="mdl-layout__content mdl-color--blue-500">
      	<div class="mdl-grid demo-content">
      		<style type="text/css">
      			.font__12px{
      				font-size: 12px;
      			}
      		</style>
          <div class="mdl-card mdl-cell mdl-cell--12-col">
            
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
          </div>

      	</div>
      </main>
    </div>
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
    		$akun = $ambil->fetch_assoc();
    		$_SESSION["admin"] = $akun;
    		
    		if ($akun['level'] == 1) {
    			# code...
    			echo "<script>alert('anda sukses login');</script>";
    			echo "<script>location='index.php';</script>";

    		} else {
    			echo "Gagal";
    		}
    		

    	}
    	else
    	{
			//anda gagal login
    		echo "<script>alert('anda gagal login, periksa akun anda');</script>";
    		echo "<script>location='login.php';</script>";
    	}
    }

    ?>
    <script src="../assets/js/material.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.material.min.js"></script>
    <script type="text/javascript">
    	$('#example').DataTable({
    		"scrollX": false
    	})
    </script>
  </body>
</html>
