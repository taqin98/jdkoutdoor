<?php 
session_start();
//menghancurkan $_SESSION["pelanggan"]
//session_destroy();
unset($_SESSION["admin"]);
?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
      setTimeout(function () {
        swal({
          title: "SUCCESS !!",
          text: "Anda Berhasil Logout",
          icon: "success",
          timer: 2000,
        });
      }, 10 );

      window.setTimeout(function () {
        window.location.replace('login.php');
      }, 2000 );
      //alert("Anda tidak punya akses kesini");
    </script>
    <?php
?>