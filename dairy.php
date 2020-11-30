<?php
    // The amounts of products to show on each page
    $num_products_on_each_page = 6;
    // The current page, in the URL this will appear as index.php?page=products&p=1, index.php?page=products&p=2, etc...
    $current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
    // Select products ordered by the date added
    $stmt = $pdo->prepare('SELECT p.* FROM product p,category c 
                            WHERE p.c_id=c.c_id AND p.c_id=3 
                            ORDER BY date_added DESC LIMIT ?,?');
    // bindValue will allow us to use integer in the SQL statement, we need to use for LIMIT
    $stmt->bindValue(1, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
    $stmt->bindValue(2, $num_products_on_each_page, PDO::PARAM_INT);
    $stmt->execute();
    // Fetch the products from the database and return the result as an Array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Get the total number of products
    $total_products = $pdo->query('SELECT p.* FROM product p,category c WHERE p.c_id=c.c_id AND p.c_id=3;')->rowCount();
?>
<?=template_header('dairy')?>
        <!-- FRUIT ITEMS -->
        <div class="container">
            <div class="top">
                <h2 id="name">Dairy</h2>
                <p class="p"><?=$total_products?> Products Found</p>
           </div>
            <div class="row">
                <?php foreach ($products as $product): ?>
                <div class="fruit-items">
                    <?php if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] != ""):?>
                        <a href="ppl.php?page=product&id=<?=$product['id']?>">
                            <div class="product-item">
                                <img src="<?=$product['img']?>" class="item-image-size" alt="<?=$product['name']?>">
                            </div>
                        </a>
                    <?php else:?>
                        <a href="index.php?page=product&id=<?=$product['id']?>">
                            <div class="product-item">
                                <img src="<?=$product['img']?>" style="border-bottom: 1px solid rgb(78, 78, 245);" class="item-image-size" alt="<?=$product['name']?>">
                            </div>
                        </a>
                    <?php endif; ?>
                    <div class="description">
                        <h4 style="color: rgb(78, 78, 245); padding-bottom: 5px; "><?=$product['name']?></h4>
                        <div class="item-select">
                            <p class="price">&#x20B9; <?=$product['price']?>/<?=$product['weight']?>
                            <?php if ($product['rrp'] > 0): ?>
                                <span class="rrp"> &#x20B9; <?=$product['rrp']?></span>
                            <?php endif; ?>
                            </p>
                        </div><br>
                        <form action="index.php?page=cart" method="post">
                            <div class="quantity">
                                <label>Qty:</label>
                                <input type="number" name="quantity" class="qty" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
                                <input type="hidden" name="product_id" value="<?=$product['id']?>">
                            </div>
                            <br>
                            <button class="addtocart-btn">Add to Cart</button> 
                        </form>
                    </div>
                </div>
                <?php endforeach; ?>  
                <div class="buttons">
                <?php if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] != ""):?>
                    <?php if ($current_page > 1): ?>
                    <a href="ppl.php?page=dairy&p=<?=$current_page-1?>">Prev</a>
                    <?php endif; ?>
                    <?php if ($total_products > ($current_page * $num_products_on_each_page) - $num_products_on_each_page + count($products)): ?>
                    <a href="ppl.php?page=dairy&p=<?=$current_page+1?>">Next</a>
                    <?php endif; ?>
                    <?php else:?>
                        <?php if ($current_page > 1): ?>
                        <a href="index.php?page=dairy&p=<?=$current_page-1?>">Prev</a>
                        <?php endif; ?>
                        <?php if ($total_products > ($current_page * $num_products_on_each_page) - $num_products_on_each_page + count($products)): ?>
                        <a href="index.php?page=dairy&p=<?=$current_page+1?>">Next</a>
                        <?php endif; ?>
                <?php endif; ?>
                </div> 
            </div>
        </div>
        
<?=template_footer()?>