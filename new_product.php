<?php require_once('header.php'); ?>

<?php 

$product = new Product;

if(isset($_POST['product_submit'])) {
    $args = $_POST['product'];
    
    $product = new Product($args);
    
    $result = $product->save();
    
    if($result) {
        redirect_to('singular_product.php?product_id=' . $product->product_id);
    }
}

?>

<a href="index.php">Go Back To Product Listing</a>

<h1>Create A New Product</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

    <?php include('create_edit_product_fields.php'); ?>

</form>

<?php require_once('footer.php'); ?>