<?php require_once('header.php'); ?>

<?php 
    $product_id = $_GET['product_id'] ?? NULL;

    if(!empty($product_id)) {
        $product = Product::find_by_id($product_id);
        if($product == false) {
            redirect_to('index.php');
        }
    }
?>


<?php if(!empty($_POST)): ?>

    <?php 
        $args = $_POST['product'];
        
        $product->merge_attributes($args);

        $result = $product->save();


        if($result) {
            echo '<p>Product updated successfully.</p>';
        }

    ?>

<?php endif; ?>

<?php if(isset($_GET['product_id'])): ?>

<a href="index.php">Go Back To Product Listing</a>

<h1>Edit Product (<?php echo h($product->name); ?>)</h1>

<form action="edit_product.php?product_id=<?php echo h($product->product_id); ?>" method="POST">

    <?php include('create_edit_product_fields.php'); ?>

</form>

<?php endif; ?>

<?php require_once('footer.php'); ?>