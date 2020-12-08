<a class="mdl-navigation__link" href="index.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Home</a>

<?php
if (isset($_SESSION['pelanggan'])) {
	?>
	<a class="mdl-navigation__link" href="profile.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">account_circle</i>Profile</a>
	<a class="mdl-navigation__link" href="riwayat.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">history</i>Riwayat</a>
	<a class="mdl-navigation__link" href="logout.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">inbox</i>Keluar</a>
	<?php
} else {
	?>
	<!-- <a class="mdl-navigation__link" href="login.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Login</a>
	<a class="mdl-navigation__link" href="register.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Register</a> -->
	<?php
}
?>