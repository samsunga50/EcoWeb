<?php 
    session_start();

     if(!isset($_SESSION['confirm_order']) || empty($_SESSION['confirm_order']))
     {
         header('location:index.php');
         exit();
     }

    require_once('./inc/config.php');    
    require_once('./inc/helpers.php');  

    
	$pageTitle = 'EcoWeb | Thank You';
	$metaDesc = 'Thank you page';
	
    include('layouts/header.php');
?>
<div class="row">
    <div class="col-md-12" style = "text-align:center; margin-top:40px">
        <h1><strong>Thank you.</strong></h1>
        <h2>Your order was completed successfully</h2>
        <p>
            Our Sales Agent will contanct you shortly via mail.
            <?php unset($_SESSION['confirm_order']);?>
        </p>
    </div>
</div>
<?php include('layouts/footer.php'); ?>    