<?php
session_start();
//koneksi ke database
include 'admin/config/config.php';
?>
<?php
//jika tidak ada session pelanggan (blm login).mk dilarikan ke login
if (!isset($_SESSION["pelanggan"]))
{
    //echo "<script>alert('Anda harus Login');</script>";
    //echo "<script>location='login.php';</script>";
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
      setTimeout(function () {
        swal({
          title: "WARNING !!",
          text: "Anda Harus Login!!",
          icon: "error",
          timer: 2000,
        });
      }, 10 );

      window.setTimeout(function () {
        window.location.replace('login.php');
      }, 2000 );
      //alert("Anda tidak punya akses kesini");
    </script>
    <?php
}
   
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

    <link rel="shortcut icon" href="/assets/images/favicon.png">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="assets/css/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="search">
              <label class="mdl-textfield__label" for="search">Enter your query...</label>
            </div>
          </div>
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
      <?php
           $user = $_SESSION['pelanggan']['username'];
       ?>
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
          <?php
          $query = $conn->query("SELECT * FROM users WHERE username = '$user'");
          $userData = $query->fetch_assoc();
          ?>
          <table style="width: 100%;">
          	<tr>
          		<td>Username</td>
          		<td>:</td>
          		<td><?= $userData['username']; ?></td>
          	</tr>
          	<tr>
          		<?php
          		if (isset($userData['nama']) == NULL) {
          			# code...
          			?>
          			<td>Nama</td>
          			<td>:</td>
          			<td>Data belum dilengkapi</td>
          			<?php
          		} else {
          			?>
          			<td>Nama</td>
          			<td>:</td>
          			<td><?= $userData['nama']; ?></td>
          			<?php
          		}
          		?>
          	</tr>
          	<tr>
          		<?php
          		if (isset($userData['hp']) == NULL) {
          			# code...
          			?>
          			<td>Nomor Hp</td>
          			<td>:</td>
          			<td>Data belum dilengkapi</td>
          			<?php
          		} else {
          			?>
          			<td>Nomor Hp</td>
          			<td>:</td>
          			<td><?= $userData['hp']; ?></td>
          			<?php
          		}
          		?>
          	</tr>
          	<tr>
          		<?php
          		if (isset($userData['alm']) == NULL) {
          			# code...
          			?>
          			<td>Alm</td>
          			<td>:</td>
          			<td>Data belum dilengkapi</td>
          			<?php
          		} else {
          			?>
          			<td>Alm</td>
          			<td>:</td>
          			<td><?= $userData['alm']; ?></td>
          			<?php
          		}
          		?>
          	</tr>
          	<?php
          	if ($userData['nama'] == NULL) {
          		# code...
          		?>
          		<tr>
          			<td></td>
          			<td></td>
          			<td><a href="#" id="form" class="mdl-button mdl-js-button mdl-button--raised mdl-button--raised mdl-button--colored mdl-color--blue-red-900 mdl-color-text--white">Edit</a></td>
          		</tr>
          		<?php
          	} else {

          	}
          	?>
          </table>

          <form method="POST" enctype="multipart/form-data" id="form_view" style="visibility: hidden;">
          	<div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          		<input class="mdl-textfield__input" type="text" name="nm">
          		<label class="mdl-textfield__label" for="sample3">Nama Pelanggan</label>
          	</div>
          	<div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          		<label>Kartu Identitas Asli (KTP/SIM/PASSPORT)</label>
          		<input class="mdl-textfield__input" type="file" name="foto">
          	</div>
          	<div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          		<input class="mdl-textfield__input" type="text" name="alm">
          		<label class="mdl-textfield__label" for="sample3">Alamat</label>
          	</div>
          	<div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          		<input class="mdl-textfield__input" type="text" name="no">
          		<label class="mdl-textfield__label" for="sample3">Nomor Handphone</label>
          	</div>
          	<!-- Colored raised button -->
          	<input type="submit" name="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color-text--white mdl-cell mdl-cell--2-col-phone" id="view-source" value="Submit">
          </form>

          <?php
          if (isset($_POST['submit'])) {

          	$nm = $_POST['nm'];
          	$nm_foto = $_FILES['foto']['name'];
          	$lokasi = $_FILES['foto']['tmp_name'];
          	$alm = $_POST['alm'];
          	$no = $_POST['no'];

          	$foto = "admin/users_foto/".$nm_foto;
          	move_uploaded_file($lokasi, $foto);

          	$query2 = $conn->query("UPDATE users SET 
          		nama = '$nm',
          		foto_id = '$nm_foto',
          		hp = '$no',
          		alm = '$alm' WHERE username = '$user'");

          	if ($query2) {
          		# code...
          		?>
          		<script type="text/javascript">
          			setTimeout(function () {
          				swal({
          					title: "SUCCESS !!",
          					text: "Berhasil Edit Data",
          					icon: "success",
          					timer: 2000,
          				});
          			}, 10 );

          			window.setTimeout(function () {
          				window.location.replace('profile.php');
          			}, 2000 );
          		</script>
          		<?php
          	} else {
          		?>
          		<script type="text/javascript">
          			setTimeout(function () {
          				swal({
          					title: "WARNING !!",
          					text: "Gagal Edit Data",
          					icon: "error",
          					timer: 2000,
          				});
          			}, 10 );

          			window.setTimeout(function () {
          				window.location.replace('profile.php');
          			}, 2000 );
          		</script>
          		<?php
          	}
          }
          ?>
          

        </div>
      </main>
    </div>
    
      <!-- <a href="https://github.com/google/material-design-lite/blob/mdl-1.x/templates/dashboard/" target="_blank" id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color-text--white">View Source</a> -->
    <script src="assets/js/material.min.js"></script>
    <script type="text/javascript">
    	var btnForm = document.getElementById('form');
    	var viewForm = document.getElementById('form_view');

    	btnForm.addEventListener('click', function () {
    		// body...
    		viewForm.style.visibility = "visible";
    	})
    </script>
  </body>
</html>
