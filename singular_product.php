<?php require_once('header.php'); ?>

<a href="index.php">Go Back To Product Listing</a>

<?php 

$id = $_GET['product_id'] ?? NULL;

if(isset($id)):
$product = Product::find_by_id($id);

?>

<table>
    <thead>
        <tr>
            <th>Product ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>SKU</th>
            <th>Inventory</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $product->product_id; ?></td>
            <td><?php echo $product->name; ?></td>
            <td><?php echo $product->description; ?></td>
            <td><?php echo $product->sku; ?></td>
            <td><?php echo $product->inventory; ?></td>
            <td><?php echo $product->price; ?></td>
        </tr>
    </tbody>
</table>

<?php endif; ?>

<?php require_once('footer.php'); ?>