<?php
    // if(isset($_SESSION['sess_email']) && $_SESSION['sess_email'] != "") {
    //     header("location:ppl.php?page=cart");
    //   }
    // If the user clicked the add to cart button on the product page we can check for the form data
    if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
        // Set the post variables so we easily identify them, also make sure they are integer
        $product_id = (int)$_POST['product_id'];
        $quantity = (int)$_POST['quantity'];
        // Prepare the SQL statement, we basically are checking if the product exists in our database
        $stmt = $pdo->prepare('SELECT p.* FROM product p, category c WHERE p.c_id=c.c_id AND p.id = ?');
        $stmt->execute([$_POST['product_id']]);
        // Fetch the product from the database and return the result as an Array
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Check if the product exists (array is not empty)
        if ($product && $quantity > 0) {
            // Product exists in database, now we can create/update the session variable for the cart
            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                if (array_key_exists($product_id, $_SESSION['cart'])) {
                    // Product exists in cart so just update the quanity
                    $_SESSION['cart'][$product_id] += $quantity;
                } else {
                    // Product is not in cart so add it
                    $_SESSION['cart'][$product_id] = $quantity;
                }
            } else {
                // There are no products in cart, this will add the first product to cart
                $_SESSION['cart'] = array($product_id => $quantity);
            }
        }
        // Prevent form resubmission...
        header('location: index.php?page=cart');
        exit;
    }
    // Remove product from cart, check for the URL param "remove", this is the product id, make sure it's a number and check if it's in the cart
    if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
        // Remove the product from the shopping cart
        unset($_SESSION['cart'][$_GET['remove']]);
    }
   
    // Update product quantities in cart if the user clicks the "Update" button on the shopping cart page
    if (isset($_POST['update']) && isset($_SESSION['cart'])) {
        // Loop through the post data so we can update the quantities for every product in cart
        foreach ($_POST as $k => $v) {
            if (strpos($k, 'quantity') !== false && is_numeric($v)) {
                $id = str_replace('quantity-', '', $k);
                $quantity = (int)$v;
                // Always do checks and validation
                if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                    // Update new quantity
                    $_SESSION['cart'][$id] = $quantity;
                }
            }
        }
        // Prevent form resubmission...
        header('location: index.php?page=cart');
        exit;
    }
    if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] != "") {
    // Send the user to the place order page if they click the Place Order button, also the cart should not be empty
        if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                header('Location: ppl.php?page=placeorder');
        }
    }
    else{
        if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            header('Location: index.php?page=login');
    }
    }
    
    // else{
    //     header("location:index.php?page=login");
    // }
    // Check the session variable for products in cart
    $products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
//     if (isset($_POST['placeorder']) && isset($_SESSION['cart'])){
//     foreach ($products_in_cart as $id => $quantity) {
//         $stmt = $pdo->prepare('UPDATE product SET quantity = quantity - ? WHERE quantity > 0 AND id = ?');
//         $stmt->execute([ $quantity, $id ]);
//     }
// }
    $products = array();
    $subtotal = 0.00;
    $taxRate = 0.05;
    $shippingRate = 25.00; 
   

    // If there are products in cart
    if ($products_in_cart) {
        // There are products in the cart so we need to select those products from the database
        // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
        $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
        $stmt = $pdo->prepare('SELECT p.* FROM product p, category c WHERE p.c_id=c.c_id AND p.id IN (' . $array_to_question_marks . ')');
        // We only need the array keys, not the values, the keys are the id's of the products
        $stmt->execute(array_keys($products_in_cart));
        // Fetch the products from the database and return the result as an Array
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Calculate the subtotal
        foreach ($products as $product) {
            $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['id']];
        }
        $tax = (float)($subtotal * $taxRate);
        $shipping = (float)($subtotal > 0 ? $shippingRate : 0);
        $total = (float)($subtotal + $tax + $shipping);
    }
?>
<?=template_header('Cart')?>

<div class="small-container cart-page">
    <h1 id="cart">Shopping Cart</h1>
    <form action="index.php?page=cart" method="post">

        <table>
           
                <tr>
                    <th colspan="1">Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            
            <tbody>
                <?php if (empty($products)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;border-radius: 5px;
                    background-color: rgb(253, 125, 125);
                    font-weight: 600; position: relative; top: 20px;
                    box-shadow: 0 3px 3px rgba(0, 0, 0, 0.5);
                    padding: 10px;">You have no products added in your Shopping Cart</td>
                </tr>
                <?php else: ?>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td>
                        <div class="cart-info">
                        <?php if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] != ""):?>
                            <a href="ppl.php?page=product&id=<?=$product['id']?>">
                                <img src="<?=$product['img']?>" width="90" height="90" alt="<?=$product['name']?>">
                            </a>
                        
                        <?php else:?>
                            <a href="index.php?page=product&id=<?=$product['id']?>">
                                <img src="<?=$product['img']?>" width="90" height="90" alt="<?=$product['name']?>">
                            </a>
                        <?php endif; ?>
                            <div class="pro-ct">
                                <a href="index.php?page=product&id=<?=$product['id']?>" class="cart-prod"><?=$product['name']?></a>
                                <br>
                                <a href="index.php?page=cart&remove=<?=$product['id']?>" class="remove"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                    </td>
                   
                    <td class="price">&#x20B9; <?=$product['price']?></td>
                    <td class="quant" >
                        <input type="number" name="quantity-<?=$product['id']?>" 
                        value="<?=$products_in_cart[$product['id']]?>" min="1" 
                        max="<?=$product['quantity']?>" placeholder="Quantity" required>
                    </td>
                    <td class="price">&#x20B9; <?=$product['price'] * $products_in_cart[$product['id']]?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="total-price">
            <table>
                <tr>
                    <td class="text">Subtotal</td>
                    <td class="price">&#x20B9; <?=$subtotal?></td>
                </tr>
                <?php if ($subtotal >0): ?>
                <tr>
                    <td class="text">GST (5%)</span>
                    <td class="price">&#x20B9; <?=$tax?></td>
                </tr>
                <tr>
                    <td class="text">Shipping</span>
                    <td class="price">&#x20B9; <?=$shipping?></td>
                </tr>
                <tr style= "border-top: 1px solid black;border-bottom: 1px solid black;">
                    <td class="text">Grand total</span>
                    <td class="price">&#x20B9; <?=$total?></td>
                </tr>
                <?php endif; ?>
            </table>
        </div>
        <div class="selection">
        <?php if ($subtotal >0):?>
            <input type="submit" value="Update" name="update">
            <?php if ($subtotal >=500): ?>
                <input type="submit" value="Check Out" name="placeorder">
            <?php else:?>
                <input type="submit" value="Check Out" name="placeorder" disabled/>
                <p> Min order amount is &#x20B9;500.00 , to continue with checkout.</p>
            <?php endif; ?>
        <?php endif; ?>
        </div>
    </form>
</div>

<?=template_footer()?>