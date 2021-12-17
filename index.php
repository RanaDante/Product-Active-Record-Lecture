<?php require_once('header.php'); ?>

<?php $products = Product::find_all(); ?>

<a href="new_product.php">Create New Product</a>

<table>
    <thead>
        <tr>
            <th>Product ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>SKU</th>
            <th>Inventory</th>
            <th>Price</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($products as $product): ?>
            <tr>
                <td><?php echo $product->product_id; ?></td>
                <td><?php echo $product->name; ?></td>
                <td><?php echo $product->description; ?></td>
                <td><?php echo $product->sku; ?></td>
                <td><?php echo $product->inventory; ?></td>
                <td><?php echo $product->price; ?></td>
                <td><a href="singular_product.php?product_id=<?php echo $product->product_id; ?>">View</a></td>
                <td><a href="edit_product.php?product_id=<?php echo $product->product_id; ?>">Edit</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php require_once('footer.php'); ?>