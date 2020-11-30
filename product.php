<?php
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {
    // Prepare statement and execute, prevents SQL injection
    $stmt = $pdo->prepare('SELECT p.* FROM product p,category c WHERE p.c_id=c.c_id AND p.id = ?');
    $stmt->execute([$_GET['id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$product) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        die ('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    die ('Product does not exist!');
}
?>
<?=template_header('description')?>
<div class="container">
<div class="container1">
    <div class="row1">
        <div class="card">
            <div class="images zoom-image">
                <div class="slider"> <img data-original-image="<?=$product['img']?>" height="100%"
                src="<?=$product['img']?>" alt="<?=$product['name']?>"></div>
            </div>
            <div class="infos">
                <h2 class="pro-name"><?=$product['name']?></h2>
                <div class="price1">
                    <p>Price:  &#x20B9;<?=$product['price']?>/<?=$product['weight']?></p>
                        <?php if ($product['rrp'] > 0): ?>
                            <span class="rrp1"> &#x20B9; <?=$product['rrp']?></span>
                        <?php endif; ?>
                </div>
                <form action="index.php?page=cart" method="post">
                    <div class="quantity">
                        <label>Qty:</label>
                        <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
                        <input type="hidden" name="product_id" value="<?=$product['id']?>">
                    </div>
                        <!-- <button class="addtocart-btn">Add to Cart</button>  -->
                        <div class="buttons1">
                            <button><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                            <!-- <button>Buy Now</button> -->
                        </div>
                </form>
                <div class="more-infos">
                    <p>Descriptions: </p>
                </div>
                <div class="info-content">
                    <?=$product['desc']?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?=template_footer()?>