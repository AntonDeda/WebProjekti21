<?php 
	session_start();
?>
<div class="header">
	<div class="content">
		<?php if(isset($_SESSION['name'])):?>
			<div class="header-top">
				<a href="userProfile.php">Profile</a>
				<a href="logout.php" id="logoutBtn">LogOut</a>
			</div>
		<?php else: ?> 
			<div class="header-top">
				<a href="login.php">Login</a>
				<a href="register.php">Register</a>
			</div>
		<?php endif; ?>
		<div class="header-middle">
			<img src="img/logo.png" alt="logo">
			<div class="search">
				<input class="searchField" id="Search" name="Search" placeholder="Search Our Website..." type="text" value="" aria-invalid="false">
				<button class="butoniSearch"><span>SEARCH</span></button>
			</div>
		</div>
	</div>
	<div class="header-bottom">
		<div class="content">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="aboutUs.php">About us</a></li>
				<li><a href="contactUs.php">Contact us</a></li>
				<li><a href="addPosts.php">Filma</a></li>
				<li><a href="postsCategory.php">Kategoria</a></li>
				<li><a href="dashboard.php">Dashboard</a></li> 
			</ul>				
		</div>
	</div>
</div>