<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

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

    <script>
        function ipLookUp() {
            $.ajax('http://ip-api.com/json')
                .then(
                    function success(response) {
                        alert('User\'s Location Data is ', response);
                        alert('User\'s Country', response.country);
                    },

                    function fail(data, status) {
                        alert('Request failed.  Returned status of',
                            status);
                    }
                );
        }
        ipLookUp()
    </script>
</head>

<body style="background-color: black;">
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
                            </i>
                        </h3>

                        <br>
                        <h2>
                            <p>Why shop with us?</p>
                        </h2>
                        <h3>
                            <p style="text-align: justify;"><i> We have <b id="users"></b> registered users and <b><?php echo $orders; ?></b> orders and counting...</i></p>
                        </h3>

                    </div>
                    <script>
                        var c = 0;
                        function usersCounter() {
                            if (c != <?php echo $users; ?>){
                                document.getElementById("users").innerHTML = ++c;
                            }
                            
                        }
                        setInterval(usersCounter, 1000)
                    </script>
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
               <div class="app-logo">
                   <img src="images/vecteezy_logos-set-fast-delivery-service_.jpg">
               </div>
           </div>
           <div class="footer-col-2">
               <img src="images/logo-white.png" style="width:100%;">
               <p>Our Purpose is to bring an online platform to Mauritian in order for them to enjoy a safe shopping free from covid risks.
               </p>
           </div>
           <div class="footer-col-3">
               <h3>Useful Links</h3>
               <ul>
                   <li><a href="contact.php">Contact Us</li>
                   <li><a href="AboutUs.html">About Us</li>
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