

<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
	<style>
		input[type=text] {
			border: 2px solid red;
			border-radius: 4px;
		}
	</style>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>EcoWeb | Sign Up</title>
	<link rel="stylesheet" href="../style.css">
</head>

<body>
	<div class="container">
		<div class="navbar">
			<div class="logo">
				<a href="index.html"><img src="../images/logo.png" alt="logo" width="125px"></a>
			</div>
			<nav>
				<ul id="MenuItems">
					<li><a href="../index.html">Home</a></li>
					<li><a href="../products.html">Products</a></li>
					<li><a href="">About</a></li>
					<li><a href="../contact.php">Contact</a></li>
					<li><a href="../account.html">Account</a></li>
				</ul>
			</nav>
			<a href="cart.html"><img src="../images/cart_white.png" width="30px" height="30px"></a>
			<img src="../images/menu.png" class="menu-icon" onclick="menutoggle()">
		</div>
	</div>

	<div class="account-page">
		<div class="container">
			<div class="row">
				<div class="col-2">
					<img src="../images/online-shopping.jpg" width="100%">
				</div>
				<div class="col-2">
					<div class="header">
						<h1>Login!</h1>
					</div>

					<form method="post" action="login.php">
						<?php include('errors.php'); ?>
						<div class="input-group">
							<label><h4>Username</h4></label>
							<input type="text" name="username">
						</div>
						<div class="input-group">
							<label><h4>Password</h4></label>
							<input type="password" name="password">
						</div>
						<div class="input-group">
							<button type="submit" class="btn" name="login_user">Login</button>
						</div>
						<p>
							Not yet a member? <a href="register.php">Sign up</a>
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>



	<!-- Footer -->
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="footer-col-1">
					<h3>Download Our App</h3>
					<p>Download App for Android and ios mobile phone.</p>
					<div class="app-logo">
						<img src="../images/play-store.png">
						<img src="../images/app-store.png">
					</div>
				</div>
				<div class="footer-col-2">
					<img src="../images/logo-white.png">
					<p>Our Purpose Is To Sustainably Make the Pleasure and Benefits of Sports Accessible to the Many.
					</p>
				</div>
				<div class="footer-col-3">
					<h3>Useful Links</h3>
					<ul>
						<li>Coupons</li>
						<li>Blog Post</li>
						<li>Return Policy</li>
						<li>Join Affiliate</li>
					</ul>
				</div>
				<div class="footer-col-4">
					<h3>Follow Us</h3>
					<ul>
						<li>Facebook</li>
						<li>Twitter</li>
						<li>Instagram</li>
						<li>Youtube</li>
					</ul>
				</div>
			</div>
			<hr>
			<p class="copyright">Copyright 2022 - EcoWeb</p>
		</div>
	</div>
</body>

</html>