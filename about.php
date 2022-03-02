<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) FROM users";

$users = $conn->query($sql);
$users = mysqli_fetch_column($users, 0);

$sql = "SELECT COUNT(*) FROM orders";

$orders = $conn->query($sql);
$orders = mysqli_fetch_column($orders, 0);

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoWeb | Sign Up</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="About.js" type="text/Javascript">
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="index.html"><img src="images/logo.png" alt="logo" width="125px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="products.html">Products</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="account.html">Account</a></li>
                </ul>
            </nav>
            <a href="cart.html"><img src="images/cart_white.png" width="30px" height="30px"></a>
            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
        </div>
    </div>



    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <div class="header">
                        <script src="About.js"></script>
                        <h2>
                            <p>Who are we?</p>
                        </h2>
                        <h3>
                            <p style="text-align: justify;"><i>We are fashion students with a mission to make fashionable clothes and accessories avaialble to everyone. Our goal is to make class affordable <br></p>
                        </i></h3>

                        <br>
                        <h2>
                            <p>Why shop with us?</p>
                        </h2>
                        <h3>
                            <p style="text-align: justify;"><i> We have <?php echo $users; ?> registered users and <?php echo $orders; ?> orders and counting...</i></p>
                        </h3>

                    </div>
                </div>
                <div class="col-2">
                    <img src="images/online-shopping.jpg" width="100%">
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
                        <img src="images/play-store.png">
                        <img src="images/app-store.png">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="images/logo-white.png">
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