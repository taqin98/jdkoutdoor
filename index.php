<?php
session_start();
require_once 'admin/config/config.php';
// var_dump($_SESSION['pelanggan']);
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
    .p-2 { padding: 20px; }
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
          </div -->
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
          <?php
          $query = $conn->query("SELECT * FROM produk");
          while ($data = $query->fetch_assoc()) {
            ?>

          <div class="demo-card-square mdl-card mdl-shadow--2dp mdl-cell mdl-cell--2-col">
            <div class="mdl-card__title mdl-card--expand" style="background: url('admin/produk_foto/<?php echo $data['foto_produk'] ?>') center / cover; height: 120px;">
            </div>
            <div class="mdl-card__supporting-text">
              <?= $data['nama_produk']; ?>
            </div>
            <div class="mdl-card__actions mdl-card--border font__12px">
              <a class="mdl-button mdl-button--colored mdl-menu--bottom-right" href="beli.php?id=<?php echo $data['Id']; ?>">
              <span>Rp<?= number_format($data['harga_produk']); ?></span>
                <i class="material-icons">shopping_cart</i>
              </a>
              <a class="mdl-button mdl-button--colored mdl-menu--bottom-right" href="detail.php?id=<?php echo $data['Id'] ?>">
              <span>Detail</span>
                <i class="material-icons">info</i>
              </a>
            </div>
          </div>
          <?php
          }
          ?>

        </div>
      </main>
    </div>
      <!-- <a href="https://github.com/google/material-design-lite/blob/mdl-1.x/templates/dashboard/" target="_blank" id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color-text--white">View Source</a> -->
    <script src="assets/js/material.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </body>
</html>
