<?php
     $stmt = $pdo->prepare('SELECT * FROM product ORDER BY date_added ASC LIMIT 4');
     $stmt->execute();
     $recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Get the amount of items in the shopping cart, this will be displayed in the header.
      $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
      if(!isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] = "") 
    {
        header("location:index.php");
    }
    error_reporting(0);
    $cust= $_SESSION['firstname'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Big apple</title>
    <link rel ="stylesheet" href="css/index1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap" rel="stylesheet">
    <!-- font -->
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
     <!-- Font Awesome CDN -->
     <script src="https://kit.fontawesome.com/82084529bf.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
    <div class="parallax">
        <div class="page-title"> BIG APPLE</div>
    </div>
    <nav id="navbar">
           
        <ul class="menu">
            <form action="ppl.php?page=search" method="post">
                        <li class="search-box">
                            <input type="search"   placeholder="search for products..." name="form_search" class="search-input" required>
                            <button name="searchsubmit" type="submit" class="search_button"><i class="fas fa-search"></i></button>
                            <div id="search_results" style="padding:5px;"></div>
                        </li>
                    </form>
            <?php if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] != ""):?>
            <div class="icons">
                <li class="user"><a href="index.php?page=login" ></i></a></li>
                <li class="user" id="shopping-cart"><a href="ppl.php?page=cart"><i class="fas fa-shopping-cart"></i><span><?=$num_items_in_cart?></span></a></a></li>
                <li class="user"><a href="ppl.php?page=logout"><i class="fas fa-sign-out-alt"></i></a></li>
               
            </div>
            <div class="items">
                <li class="active"><a href="ppl.php">Home</a></li>
                <li><a href="ppl.php?page=deals" >Deals</a></li>
                <li><a href="ppl.php?page=vegetables">Vegetables</a></li>
                <li><a href="ppl.php?page=fruits">Fruits</a></li>
                <li><a href="ppl.php?page=dairy">Dairy</a></li>
                <li><a href="ppl.php?page=meat">Meat</a></li>
            </div>
           
        </ul> 
    </nav>
    </header>
    <div class="welcome">
        <?php echo"<div>Welcome, $cust!!</div>"?>
	</div>
    <?php endif; ?>
    <!---HOme page begins-->
    <div class="container">
        <div class="row">
            <a href="ppl.php?page=vegetables">
                <div class="categories">
                        <img src="img/vegi2.jpg" class="item-image"/>
                        <div class="image-title">Vegetables</div>
                </div>
            </a>
            <a href="ppl.php?page=fruits">
                <div class="categories">
                    <img src="img/fruit1.jpg" class="item-image"/>
                    <div class="image-title">Fruits</div>
                </div>
            </a>
            <a href="ppl.php?page=meat">
                    <div class="categories">
                        <img src="img/meat1.jpg" class="item-image"/>
                        <div class="image-title">Meat</div>
                </div>
            </a>
            <a href="ppl.php?page=dairy">
                <div class="categories">
                    <img src="img/dairy.jpg" class="item-image"/>
                    <div class="image-title">Dairy</div>
                </div>
            </a>
        </div>
        <!-- RECENTLY ADDED PRODUCT -->
        <!-- <div class="recently-added-container" >
            <div class="parallax">
                <div class="title">DEALS</div>
            </div>
        </div> -->

        <!-- Slideshow container -->
        <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
        <div class="numbertext"></div>
        <img src="img/r1.jpg" style="width:100%" height="500px">
     
        </div>

        <div class="mySlides fade">
        <div class="numbertext"></div>
        <img src="img/r2.jpg" style="width:100%">
     
        </div>

        <div class="mySlides fade">
        <div class="numbertext"></div>
        <img src="img/r3.jpg" style="width:100%" height="500px">
     
        </div>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)"></a>
        <a class="next" onclick="plusSlides(1)"></a>
        </div>
        <br>

        <!-- The dots/circles -->
        <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        </div>
          
        <div class="recentlyadded content-wrapper">
            <h2 style="color: purple;">Recently Added Products</h2>
            <div class="products">
                <?php foreach ($recently_added_products as $product): ?>
                <a href="ppl.php?page=product&id=<?=$product['id']?>" class="product">
                    <img src="<?=$product['img']?>" class="item-image-size" width="200" height="200" alt="<?=$product['name']?>">
                    <span class="name"><?=$product['name']?></span>
                    <span class="price">
                        &#x20B9;<?=$product['price']?>
                        <?php if ($product['rrp'] > 0): ?>
                        <span class="rrp">&#x20B9;<?=$product['rrp']?></span>
                        <?php endif; ?>
                    </span>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
                
        </div>
        <div class="about-us"><h1 style="text-align: center;">About Us</h1>
            <p>Did you ever imagine that the freshest of fruits and vegetables, top quality pulses and food grains, dairy products and hundreds of branded items could be handpicked and delivered to your home, all at the click of a button? </p>
                <p>India’s first comprehensive online megastore, bigapple.com, brings a whopping 20000+ products with more than 1000 brands, to over 4 million happy customers. From all the vegies to dairy products, bigapple has everything you need for your daily needs.</p>
                <p> bigapple.com is convenience personified We’ve taken away all the stress associated with shopping for daily essentials, and you can now order all your groceries online without travelling long distances or standing in serpentine queues. Add to this the convenience of finding all your requirements at one single source, along with great savings, and you will realize that bigapple- India’s largest online supermarket, has revolutionized the way India shops for groceries.</p>
                <p> Online grocery shopping has never been easier. Need things fresh? Whether it’s fruits and vegetables or dairy and meat, we have this covered as well! Get fresh eggs, meat, fish and more online at your convenience. Hassle-free Home Delivery options

                We deliver to 25 cities across India and maintain excellent delivery times, ensuring that all your products from groceries to snacks branded foods reach you in time.
        </div>
    </div>

    <!-- FOOTER  -->
    <footer class="footer-distributed">

        <div class="footer-left">
            <h3>Big<span> Apple</span></h3>

            <p class="footer-links">
                <a href="ppl.php">Home</a>
                    |
                <a href="ppl.php?page=contact">Contact</a>
                    |
                <a href="ppl.php?page=about">About</a>
                    |
                <a href="ppl.php?page=faq">FAQs</a>
            </p>

            <p class="footer-company-name">© 2020 Big Apple Pvt. Ltd.</p>
         </div>

        <div class="footer-center">
            <div>
                <i class="fa fa-phone"></i>
                <p>+91 22-27782183</p>
            </div>
            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="mailto:bigapplegrocerystore@gmail.com">bigapplegrocerystore@gmail.com</a></p>
            </div>
        </div>
        <div class="footer-right">
            <p class="footer-company-about">
                    <span>About the company</span>
                    bigapple.com allows you to walk away from the drudgery of grocery shopping and welcome an easy relaxed way of browsing and shopping for groceries.
            </p>
            <div class="footer-icons">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter-square"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>
    <script>
         window.onscroll = function() {myFunction()};

        let navbar = document.getElementById("navbar");
        let sticky = navbar.offsetTop;

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
            } else {
                navbar.classList.remove("sticky");
            }
        }
        var slideIndex = 0;
        showSlides();

        function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        slides[slideIndex-1].style.display = "block";
        setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
    </script>
</body>
</html>