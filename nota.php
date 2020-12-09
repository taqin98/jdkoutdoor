<?php
session_start();
require_once 'admin/config/config.php';
$Id_transaksi = $_GET['id'];
$user = $_SESSION['pelanggan']['username'];

$users = $conn->query("SELECT * FROM transaksi JOIN users ON transaksi.username = users.username WHERE transaksi.Id_transaksi = '$Id_transaksi'");
$data_users = $users->fetch_assoc();


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0"> -->
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
          <!-- <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="search">
              <label class="mdl-textfield__label" for="search">Enter your query...</label>
            </div>
          </div> -->
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
        	<table border="0" class="mdl-cell--12-col">
        		<tr>
        			<td>Id Transaksi</td>
        			<td>:</td>
        			<td><?= $data_users['Id_transaksi']; ?></td>
        		</tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td><?= $data_users['nama']; ?></td>
                </tr>
        		<tr>
        			<td>Nomor Handphone</td>
        			<td>:</td>
        			<td><?= $data_users['hp']; ?></td>
        		</tr>
                <tr>
                    <td>Total</td>
                    <td>:</td>
                    <td>Rp. <?= number_format($data_users['total_transaksi']); ?></td>
                </tr>
        	</table>
        	<table class="mdl mdl-cell--12-col">
        		<tr bgcolor="orange">
        			<td>Kode Produk</td>
        			<td>Nama Produk</td>
        			<td>Harga Produk</td>
        			<td>Hari</td>
        			<td>Jumlah</td>
        			<td>Subtotal</td>
        		</tr>
        		<?php
        		$sql = $conn->query("SELECT * FROM transaksi_penyewaan WHERE Id_transaksi = '$Id_transaksi'");
        		$total = 0;
        		while ($data = $sql->fetch_assoc()) {
        			$total += $data['sub_total']*$data['hari'];
                    
                        ?>
                    <tr>
                        <td><?= $data['kode_produk']; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['harga']; ?></td>
                        <td><?= $data['hari']; ?></td>
                        <td><?= $data['jumlah']; ?></td>
                        <td>Rp.<?= number_format($data['sub_total']*$data['hari']); ?></td>
                    </tr>
                    <?php
        			
        		}
        		?>
        		<tfoot>
        			<td colspan="4"></td>
                    <td><strong>Total</strong></td>
        			<td>Rp. <?php echo number_format($total); ?></td>
        		</tfoot>
        	</table><br><br>

        	

        </div>
        <?php
        $sqlBukti = $conn->query("SELECT ket FROM transaksi WHERE Id_transaksi = '$Id_transaksi'");
        $dataBukti = $sqlBukti->fetch_assoc();
        if ($dataBukti['ket'] == 'Belum Melakukan Pembayaran') {
        	?>
        	<div class="mdl-cell mdl-cell--12-col">
        		<p>Silahkan melakukan <strong>pembayaran DP 
        			<span style="color: red;">
        				Rp. <?php echo number_format($total/2); ?>
        			</span> dari Total pembayaran 
        			<span style="color: red;">
        				Rp. <?php echo number_format($total); ?>
        			</span>
        		</strong> Sebagai tanda booking produk tersebut <br> ke
        		<strong> BANK Jateng 111-1021-0011 AN. Jdk Adventure</strong>
        		<p>
        	</div>
        	<?php
        } elseif($dataBukti['ket'] == 'Pengecekan') {
        	?>
        	<!-- Deletable Chip -->
        	<div class="mdl-cell mdl-cell--12-col" style="text-align: center;">
        		<span class="mdl-chip mdl-chip--deletable mdl-color--green-500 mdl-color-text--white">
        			<span class="mdl-chip__text">transaksi sedang dalam pengecekan</span>
        			<button type="button" class="mdl-chip__action"><i class="material-icons">check</i></button>
        		</span>
        	</div>
        	<!-- <div class="mdl-cell mdl-cell--12-col">
        		<p>Sisa Tagihan yang harus dibayarkan adalah <strong><span style="color: red;">Rp. <?= number_format($total/2); ?></span></strong>
        		<p>
        		<p>Pembayaran bisa dilunasi ketika pengambilan produk ditempat jdk adventure atau bisa transfer ke <strong> BANK Jateng 111-1021-0011 AN. Jdk Adventure</strong></p>
        	</div> -->
        	<?php
        } else {
            ?>
            <div class="mdl-cell mdl-cell--12-col" style="text-align: center;">
                <span class="mdl-chip mdl-chip--deletable mdl-color--green-500 mdl-color-text--white">
                    <span class="mdl-chip__text">Pembayaran Lunas</span>
                    <button type="button" class="mdl-chip__action"><i class="material-icons">check</i></button>
                </span>
            </div>
            <?php
        }
        ?>
        
        <div class="mdl-cell mdl-cell--12-col">
        	<?php
        	if ($dataBukti['ket'] == "Belum Melakukan Pembayaran") {
        		# code...
        		?>
        		<form method="POST" enctype="multipart/form-data">
        			<div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        				<label>Upload Bukti Pembayaran</label>
        				<input class="mdl-textfield__input" type="file" name="bukti" required="">
        			</div>
        			<!-- Colored raised button -->
        			<input type="submit" name="submit" class="mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button--raised mdl-button--colored" value="submit">
        		</form>
        		<?php
        	} else {
                echo " ";
            }
        	?>
        	<?php

        	if (isset($_POST['submit'])) {
        		# code...

        		$nm_foto = $_FILES['bukti']['name'];
        		$lokasi = $_FILES['bukti']['tmp_name'];
        		$dp = 0; //0 = DP 50% // 1 LUNAS;
        		$ket = "Pengecekan";

        		$foto = "admin/bukti_foto/".$nm_foto;
        		move_uploaded_file($lokasi, $foto);

        		$insertBukti = $conn->query("UPDATE transaksi SET 
        			ket = '$ket', bukti_foto = '$nm_foto' WHERE Id_transaksi = '$Id_transaksi'");
        		if ($insertBukti) {
        			# code..
        			?>
        			<script type="text/javascript">
        				setTimeout(function () {
        					swal({
        						title: "SUCCESS !!",
        						text: "Berhasil Upload Bukti",
        						icon: "success",
        						timer: 2000,
        					});
        				}, 10 );

        				window.setTimeout(function () {
        					window.location.replace('nota.php?id=<?= $Id_transaksi; ?>');
        				}, 2000 );
        			</script>
        			<?php
        		} else {
        			?>
        			<script type="text/javascript">
        				setTimeout(function () {
        					swal({
        						title: "WARNING !!",
        						text: "Gagal Upload Bukti",
        						icon: "error",
        						timer: 2000,
        					});
        				}, 10 );

        				window.setTimeout(function () {
        					window.location.replace('nota.php?id=<?= $Id_transaksi; ?>');
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
  </body>
</html>
