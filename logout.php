<?php 
session_start();
//menghancurkan $_SESSION["pelanggan"]
//session_destroy();
unset($_SESSION["pelanggan"]);
//echo "<script>alert('Anda telah Logout');</script>";
//echo "<script>location='index.php';</script>";
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
      setTimeout(function () {
        swal({
          title: "LOGOUT !!",
          text: "Anda Berhasil Logout",
          icon: "success",
          timer: 2000,
        });
      }, 10 );

      window.setTimeout(function () {
        window.location.replace('index.php');
      }, 2000 );
      //alert("Anda tidak punya akses kesini");
    </script>
<?php
?>