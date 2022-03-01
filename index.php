<?php
    session_start();
    require_once('./inc/config.php');   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoWeb | Men Products</title>
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body class="Index_Background">
    
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="index.html"><img src="images/logo.png" alt="logo" width="125px"></a>
                </div>
                <nav>
                    <ul id="MenuItems" style=" color:white">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="product.php">Products</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Contact</a></li>
                        <li><a href="account.html">Account</a></li>
                    </ul>
                </nav>
                <img src="images/menu-button-icon.jpg" class="menu-icon" onclick="menutoggle()">
            </div>
            <div class="row">
                <div class="col-2">
                    <h1>Welcome to EcoWeb <br> Brings it to you!</h1>
                    <p>We hope to please you with our products.<br> 
                        Have an enjoyable shopping time with us!</p>
                    <a href="product.php" class="btn">Explore Now &#8594;</a>
                </div>
                    <div class="col-2">
                        <div class="w3-content w3-section" style="max-width:500px">
                            <img class="mySlides" src="SlideShow Images/pexels-terje-sollie-298863.jpg" style="width:100%">
                            <img class="mySlides" src="SlideShow Images/pexels-lumn-167686.jpg" style="width:100%">
                            <img class="mySlides" src="SlideShow Images/pexels-anders-kristensen-447570.jpg" style="width:100%">
                            <img class="mySlides" src="SlideShow Images/pexels-moose-photos-1036627.jpg" style="width:100%">
                            <img class="mySlides" src="SlideShow Images/pexels-valeria-boltneva-1961795.jpg" style="width:100%">
                            <img class="mySlides" src="SlideShow Images/pexels-burst-374044.jpg" style="width:100%">
                        </div>
                    
                        <script>
                            var myIndex = 0;
                            carousel();

                            function carousel() {
                            var i;
                            var x = document.getElementsByClassName("mySlides");
                            for (i = 0; i < x.length; i++) {
                                x[i].style.display = "none";  
                            }
                            myIndex++;
                            if (myIndex > x.length) {myIndex = 1}    
                            x[myIndex-1].style.display = "block";  
                            setTimeout(carousel, 2000); // Change image every 2 seconds
                            }
                        </script>
                    </div>  
            </div>
        </div>
    </div>

        <!-- Featured Products -->
        <div class="small-container">
            <h2 class="title">Featured Products</h2>
            <div class="row">
                <?php
                    $sql = "SELECT p.*,pdi.img FROM products p
                            INNER JOIN product_images pdi ON pdi.product_id = p.id
                            WHERE pdi.is_featured = 1
                            LIMIT 4 ";
                    $handle = $db->prepare($sql);
                    $handle->execute();
                    $getAllProducts = $handle->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <div class="row">
                    <?php
                        foreach($getAllProducts as $product)
                        {
                            $imgUrl = PRODUCT_IMG_URL.str_replace(' ','-',strtolower($product['product_name']))."/".$product['img'];
                    ?>
                            <div class="col-4">
                                <a href="single-product.php?product=<?php echo $product['id']?>">
                                    <img src="<?php echo $imgUrl?>" alt="<?php echo $product['product_name'] ?>" style = "width: 100%">
                                </a>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="single-product.php?product=<?php echo $product['id'] ?>">
                                                <div class = "Index_product-name">
                                                    <strong><?php echo $product['product_name']; ?></strong>
                                                </div>  
                                            </a>
                                        </h5>
                                        <div class = "index_prod_price"><strong>RS <?php echo $product['price']?></strong></div>
                                        <p class="card-t">
                                            <?php echo substr($product['short_description'],0,50) ?>'...
                                        </p>
                                        <p class="card-text">
                                            <a href="single-product.php?product=<?php echo $product['id']?>" class="btn btn-primary btn-sm">
                                                View
                                            </a>
                                        </p>
                                    </div>
                            </div>
                    <?php            
                        }
                    ?>
                    </div>    
                </div>
            </div>
    
    
            <!-- Latest Products-->
            <div class="small-container">
            <h2 class="title">Latest Products</h2>
            <div class="row">
                
                <?php
                        $sql = "SELECT p.*,pdi.img from products p
                                INNER JOIN product_images pdi ON pdi.product_id = p.id
                                WHERE pdi.is_featured = 1
                                ORDER BY P.created_at DESC
                                LIMIT 8 ";
                        $handle = $db->prepare($sql);
                        $handle->execute();
                        $getAllProducts = $handle->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <div class="row">
                        <?php
                        foreach($getAllProducts as $product)
                        {
                            $imgUrl = PRODUCT_IMG_URL.str_replace(' ','-',strtolower($product['product_name']))."/".$product['img'];
                        ?>
                                <div class="col-4">
                                    <a href="single-product.php?product=<?php echo $product['id']?>">
                                        <img src="<?php echo $imgUrl?>" alt="<?php echo $product['product_name'] ?>" style = "width: 100%">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="single-product.php?product=<?php echo $product['id'] ?>">
                                                <div class = "Index_product-name">
                                                    <strong><?php echo $product['product_name']; ?></strong><br>
                                                </div>    
                                            </a>
                                        </h5>
                                        <div class = "index_prod_price"><strong>RS <?php echo $product['price']?></strong></div>
                                        <p class="card-t">
                                            <?php echo substr($product['short_description'],0,50) ?>'...
                                        </p>
                                        <p class="card-text">
                                            <a href="single-product.php?product=<?php echo $product['id']?>" class="btn btn-primary btn-sm">
                                                View
                                            </a>
                                        </p>
                                    </div>
                                 </div>
                        <?php 
                        }
                        ?>
                    </div>
                </div>
            </div>
                    
    
        <!-- Offer -->
    
        <?php
            $sql = "SELECT p.*,pdi.img from products p
            INNER JOIN product_images pdi ON pdi.product_id = p.id
            WHERE pdi.is_featured = 1 AND p.category = 'accessories'
            ORDER BY P.price ASC
            LIMIT 1 ";
            $handle = $db->prepare($sql);
            $handle->execute();
            $getAllProducts = $handle->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <?php
            foreach($getAllProducts as $product)
            {
                $imgUrl = PRODUCT_IMG_URL.str_replace(' ','-',strtolower($product['product_name']))."/".$product['img'];
        ?>
                <div class="offer">
                    <div class="small-container">
                        <div class="row">
                            <div class="col-2">
                                <a href="single-product.php?product=<?php echo $product['id']?>">
                                <img src="<?php echo $imgUrl?>" alt="<?php echo $product['product_name'] ?>" style = "width: 100%" class="offer-img">
                            </div>
                            <div class="col-2">
                                    <h3 style = "color:coral"><strong>Hot Accessory Deal</strong></h3>
                                    <h1 style = "color:black"> <a href="single-product.php?product=<?php echo $product['id'] ?>">
                                                <?php echo $product['product_name']; ?>
                                    </a></h1>
                                    <p style = "color:black; text-align: justify; text-justify: inter-word;"><?php echo $product['short_description'] ?><br></p>
                                    <a href="single-product.php?product=<?php echo $product['id']?>" class="btn">Buy Now &#8594;</a>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                              
        <?php 
            }
        ?>   

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
                        <li><a href = "contact.html">Contact Us</li>
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

    <!-- javascript -->

    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";
        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px"
            }
            else {
                MenuItems.style.maxHeight = "0px"
            }
        }
    </script>

</body>

</html>