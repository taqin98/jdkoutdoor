<header class="demo-drawer-header">
	<img src="assets/images/user.jpg" class="demo-avatar">
	<div class="demo-avatar-dropdown">
		<?php
		if (isset($_SESSION['pelanggan'])) {
              # code...
			?>
			<span><?= $_SESSION['pelanggan']['username']; ?></span>
			<?php
		} else {
			?>
			<span>Account</span>
			<?php
		}
		?>
		<div class="mdl-layout-spacer"></div>
		<button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
			<i class="material-icons" role="presentation">arrow_drop_down</i>
			<span class="visuallyhidden">Accounts</span>
		</button>
		<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
			<a class="mdl-navigation__link" href="login.php"><li class="mdl-menu__item">Masuk</li></a>
			<a class="mdl-navigation__link" href="register.php"><li class="mdl-menu__item">Register</li></a>
			<!-- <li class="mdl-menu__item"><i class="material-icons">add</i>Add another account...</li> -->
		</ul>
	</div>
</header>