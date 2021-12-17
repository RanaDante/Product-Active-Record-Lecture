<?php if(isset($product)): ?>

    <div class="input_wrapper">
        <label for="product_name">Product Name</label>
        <input type="text" id="product_name" name="product[name]" value="<?php echo h($product->name); ?>" placeholder="Enter Product Name">
    </div>
    <div class="input_wrapper">
        <label for="product_description">Product Description</label>
        <input type="text" id="product_description" name="product[description]" value="<?php echo h($product->description); ?>" placeholder="Enter Product Description">
    </div>
    <div class="input_wrapper">
        <label for="product_sku">Product SKU</label>
        <input type="text" id="product_sku" name="product[sku]" value="<?php echo h($product->sku); ?>" placeholder="Enter Product SKU">
    </div>
    <div class="input_wrapper">
        <label for="product_inventory">Product Inventory</label>
        <input type="text" id="product_inventory" name="product[inventory]" value="<?php echo h($product->inventory); ?>" placeholder="Enter Product Inventory">
    </div>
    <div class="input_wrapper">
        <label for="product_price">Product Price</label>
        <input type="text" id="product_price" name="product[price]" value="<?php echo h($product->price); ?>" placeholder="Enter Product Price">
    </div>

    <div class="submit_wrapper">
        <input type="submit" id="product_submit" name="product_submit" value="<?php if(!empty($product->product_id)) {echo 'Update Product';}else {echo 'Create New Product';} ?>">
    </div>
<?php else: ?>

<?php endif; ?>