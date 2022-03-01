<?php 
    session_start();
    require_once('./inc/config.php');    
    require_once('./inc/helpers.php');  
    
    if(isset($_GET['product']) && !empty($_GET['product']) && is_numeric($_GET['product']))
    {
        $sql = "SELECT p.*,pdi.img from products p
            INNER JOIN product_images pdi ON pdi.product_id = p.id WHERE pdi.is_featured =:featured AND p.id =:productID";
        $handle = $db->prepare($sql);
        $params = [
                ':featured'=>1,
                ':productID' =>$_GET['product'],
            ];
        $handle->execute($params);
        if($handle->rowCount() == 1 )
        {
            $getProductData = $handle->fetch(PDO::FETCH_ASSOC);
            $imgUrl = PRODUCT_IMG_URL.str_replace(' ','-',strtolower($getProductData ['product_name']))."/".$getProductData ['img'];
        }
        else
        {
            $error = '404! No record found';
        }

    }
    else
    {
        $error = '404! No record found';
    }

    if(isset($_POST['add_to_cart']) && $_POST['add_to_cart'] == 'add to cart')
    {
        $productID = intval($_POST['product_id']);
        $productQty = intval($_POST['product_qty']);
        
        $sql = "SELECT p.*,pdi.img from products p
            INNER JOIN product_images pdi ON pdi.product_id = p.id WHERE pdi.is_featured =:featured AND p.id =:productID";

        $prepare = $db->prepare($sql);
        
        $params = [
                ':featured'=>1,
                ':productID' =>$productID,
            ];
        
        $prepare->execute($params);
        $fetchProduct = $prepare->fetch(PDO::FETCH_ASSOC);

        $calculateTotalPrice = number_format($productQty * $fetchProduct['price'],2);
        
        $cartArray = [
            'product_id' =>$productID,
            'qty' => $productQty,
            'product_name' =>$fetchProduct['product_name'],
            'product_price' => $fetchProduct['price'],
            'total_price' => $calculateTotalPrice,
            'product_img' =>$fetchProduct['img']
        ];
        
        if(isset($_SESSION['cart_items']) && !empty($_SESSION['cart_items']))
        {
            $productIDs = [];
            foreach($_SESSION['cart_items'] as $cartKey => $cartItem)
            {
                $productIDs[] = $cartItem['product_id'];
                if($cartItem['product_id'] == $productID)
                {
                    $_SESSION['cart_items'][$cartKey]['qty'] = $productQty;
                    $_SESSION['cart_items'][$cartKey]['total_price'] = $calculateTotalPrice;
                    break;
                }
            }

            if(!in_array($productID,$productIDs))
            {
                $_SESSION['cart_items'][]= $cartArray;
            }

            $successMsg = true;
            
        }
        else
        {
            $_SESSION['cart_items'][]= $cartArray;
            $successMsg = true;
        }

    }


	$pageTitle = 'EcoWeb | Product Details';
	$metaDesc = 'product details';
	
	
include('layouts/header_single-product.php');

?>

    <?php if(isset($getProductData) && is_array($getProductData)){?>
        <?php if(isset($successMsg) && $successMsg == true){?>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible">
                         <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <img src="<?php echo $imgUrl ?>" class="rounded img-thumbnail mr-2" style="width:40px;"><?php echo $getProductData['product_name']?> is added to cart. <a href="cart.php" class="alert-link">View Cart</a>
                    </div>
                </div>
            </div>
         <?php }?>

        <div class="row mt-3">
            <div class="col-md-5">
                <img src="<?php echo $imgUrl;?>">
            </div>
            <div class="col-md-7">
                <?php
                     // This is a variable that will be used to display related products.
                    $ExceptionID = $getProductData['id'];
                    $ExceptionCat = $getProductData['category'];
                ?>
                <h1><?php echo $getProductData['product_name']?></h1>
                <p class="text-justify"><?php echo $getProductData['short_description']?></p>
                <h4>RS <?php echo $getProductData['price']?></h4>
                
                <form class="form-inline" method="POST">
                    <div class="form-group mb-2">
                        <input type="number" name="product_qty" id="productQty" class="form-control" placeholder="Quantity" min="1" max="1000" value="1">
                        <input type="hidden" name="product_id" value="<?php echo $getProductData['id']?>">
                    </div>
                    <div class="form-group mb-2 ml-2">
                        <button type="submit" class="btn btn-primary" name="add_to_cart" value="add to cart">Add to Cart</button>
                    </div>
                </form>
                
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
            <h3>
                <h1 class="text-center"> 
                    Related Products 
                </h1>
                <?php
                    $sql = "SELECT p.*,pdi.img from products p
                            INNER JOIN product_images pdi ON pdi.product_id = p.id
                            WHERE pdi.is_featured = 1 AND p.id <> $ExceptionID
                            AND p.category = '$ExceptionCat'
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
                        <div class="col-md-3  mt-2">
                            <div class="card">
                                <a href="single-product.php?product=<?php echo $product['id']?>">
                                    <img class="card-img-top" src="<?php echo $imgUrl?>" alt="<?php echo $product['product_name'] ?>" style = "width: 100%">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="single-product.php?product=<?php echo $product['id'] ?>">
                                            <?php echo $product['product_name']; ?>
                                        </a>
                                    </h5>
                                    <strong>RS <?php echo $product['price']?></strong>

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
                        </div>
                    <?php 
                    }
                    ?>
                </div>
            </div>
        </div>

    <?php
    }
    ?>

<?php include('layouts/footer.php');?>