<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $("button").click(function() {
        $("button").fadeOut(3000);
      });
    });
  </script>

  <style>
    input[type=text] {
      border: 2px solid red;
      border-radius: 4px;
    }

    textarea {
      width: 100%;
      height: 150px;
      padding: 12px 20px;
      box-sizing: border-box;
      border: 2px solid red;
      border-radius: 4px;
      background-color: #f8f8f8;
      font-size: 16px;
      resize: none;
    }
  </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EcoWeb | Contact</title>
  <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style = "background-color:black">
  <div class="container">
    <div class="navbar">
      <div class="logo">
        <a href="index.php"><img src="images/logo.png" alt="logo" width="125px"></a>
      </div>
      <nav>
        <ul id="MenuItems">
          <li><a href="index.php">Home</a></li>
          <li><a href="product.php">Products</a></li>
          <li><a href="">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="account.html">Account</a></li>
        </ul>
      </nav>
      <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
    </div>
  </div>

  <!-- Contact Page -->
  <div class="account-page">
    <div class="container">
      <div class="row">
        <div class="col-2">
          <img src="images/online-shopping.jpg" width="100%">
        </div>
        <div class="col-2">
          <div class="account_details">
            <h1>Get in touch with us!</h1>
            <br>
          </div>
          <div>
            <form method="post" action="contact.php">
              <label for="name">
                <h4>Name</h4>
              </label>
              <input type="text" id="name" name="fullname" placeholder="Your full name...">

              <label for="email">
                <h4>Email</h4>
              </label>
              <input type="text" id="email" name="emailaddress" placeholder="Your email adresss...">

              <label for="message">
                <h4>Message</h4>
              </label>
              <textarea id="message" name="message"></textarea>

            </form>
          </div>
          <button type="submit" class="btn">Post &#8594;</button><br>
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