

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
	<title>EcoWeb | Sign In</title>
	<link rel="apple-touch-icon" sizes="180x180" href="../favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon_io/favicon-16x16.png">
    <link rel="manifest" href="../site.webmanifest">
	<link rel="stylesheet" href="../style.css">
</head>

<body style = "background-color:black">
	<div class="container">
		<div class="navbar">
			<div class="logo">
				<a href="index.php"><img src="../images/logo.png" alt="logo" width="125px"></a>
			</div>
			<nav>
				<ul id="MenuItems">
					<li><a href="../index.php">Home</a></li>
					<li><a href="../product.php">Products</a></li>
					<li><a href="">About</a></li>
					<li><a href="../contact.php">Contact</a></li>
					<li><a href="../account.html">Account</a></li>
				</ul>
			</nav>
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
                    <div class="app-logo">
                        <img src="../images/vecteezy_logos-set-fast-delivery-service_.jpg">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="../images/logo-white.png" style="width:100%;">
                    <p>Our Purpose is to bring an online platform to Mauritian in order for them to enjoy a safe shopping free from covid risks.
                    </p>
                </div>
                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li><a href = "contact.php">Contact Us</li>
                        <li><a href= "AboutUs.html">About Us</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Follow Us</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instagram</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="copyright">Copyright 2022 - Tiraaj Ramchurn & Nikhil Ken Ramessur</p>
        </div>
    </div>
</body>

</html>