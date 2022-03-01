<?php 
    session_start();
    require_once('./inc/config.php');    
    require_once('./inc/helpers.php');  

    $sql = "SELECT p.*,pdi.img  
            FROM products p
            INNER JOIN product_images pdi ON pdi.product_id = p.id
            WHERE pdi.is_featured = 1
            LIMIT 12,13";
    $handle = $db->prepare($sql);
    $handle->execute();
    $getAllProducts = $handle->fetchAll(PDO::FETCH_ASSOC);

    $pageTitle = 'EcoWeb | Products';
	$metaDesc = 'Product Page';

    include('layouts/header.php');
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

        <nav aria-label="..." style="margin-top: 30px;">
            <ul class="pagination">
                <li> <a class="page-link" href="product.php" tabindex="-1">Previous</a></li>
                <li class="page-item"><a class="page-link" href="product.php">1</a></li>
                <li class="page-item active">
                    <a class="page-link" href="product2.php">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item disabled">
                <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
<?php include('layouts/footer.php');?>