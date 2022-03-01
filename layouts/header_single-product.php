<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo (isset($metaDesc)?$metaDesc:'EcoWeb')?>">
  
    <title><?php echo (isset($pageTitle)?$pageTitle:'PHP Shopping Cart')?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/style.css">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
</head>
<body>
<div class="header">
     <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
            <div class="logo">
                <a href="index.php"><img src="images/logo.png" alt="logo" width="125px"></a>
            </div>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li><a class="nav-link" href="product.php">All Products</a></li>
                <li><a class="nav-link" href="clothes.php">Clothes</a></li>
                <li><a class="nav-link" href="accessories.php">Accessories</a></li>
                <li><a class="nav-link" href="parfum.php">Parfum</a></li>
                <li><a class="nav-link" href="FootWear.php">Footwear</a></li>
                <li><a class="nav-link" href="grooming.php">Grooming Products</a></li>
                <li><a class="nav-link" href="sportwear.php">SportWear</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort By</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="expensive.php">Most Expensive to Cheapest</a>
                        <a class="dropdown-item" href="cheap.php">Cheapest to Most Expensive</a>
                        <a class="dropdown-item" href="latest.php">Lastest</a>
                    </div>
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <a href="cart.php" style="color:#ffffff">
                    <i class="bi bi-cart4" style="font-size:30px;"></i>
                    <?php 
                        echo (isset($_SESSION['cart_items']) && count($_SESSION['cart_items'])) > 0 ? count($_SESSION['cart_items']):'';
                    ?>
                </a>
            </div>
            
        </nav>
    <div class="container">
        