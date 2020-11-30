<?php
require_once('config/connection.php');
// Template header, feel free to customize this
function template_header($title) {
    // set your default t
      // Get the amount of items in the shopping cart, this will be displayed in the header.
    $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <title>$title</title>
        <!-- Custom Stylesheet -->
        <link rel="stylesheet" type="text/css" href="css/fruit.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap" rel="stylesheet">
        <!-- font -->
        <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
        <!-- Font Awesome CDN -->
        <script src="https://kit.fontawesome.com/82084529bf.js" crossorigin="anonymous"></script>
	</head>
	<body>
        <header>
            <div class="head-img">
                <a href="index.php"><h1>Big Apple</h1></a>
            </div>
            <!-- NAVBAR -->
            <nav id="navbar">
                
                <ul class="menu">
                    <li class="toggle" ><span class="fas fa-bars"></span></li> 
                    <form action="index.php?page=search" method="post">
                        <li class="search-box">
                            <input type="search"   placeholder="search for products..." name="form_search" class="search-input" required>
                            <button name="searchsubmit" type="submit" class="search_button"><i class="fas fa-search"></i></button>
                            <div id="search_results" style="padding:5px;"></div>
                        </li>
                    </form>
                   
                    <div class="icons">
                        <li class="user"><a href="index.php?page=login" ><i class="fas fa-user"></i></a></li>
                        <li class="user" id="shopping-cart"><a href="index.php?page=cart"><i class="fas fa-shopping-cart"></i><span>$num_items_in_cart</span></a></li>
                        <li class="user"><a href="index.php?page=logout"><i class="fas fa-sign-out-alt"></i></a></li>
                    </div>
                    <div class="items">
                        <li><a href="index.php?page=deals">Deals</a></li>
                        <li><a href="index.php?page=Vegetables">Vegetables</a></li>
                        <li><a href="index.php?page=fruits">Fruits</a></li>
                        <li><a href="index.php?page=dairy">Dairy</a></li>
                        <li><a href="index.php?page=meat">Meat</a></li>
                    </div>
                  
                </ul> 
            </nav>
        </header>
        <main>
        
EOT;
}
// Template footer
function template_footer() {
$year = date('Y');
echo <<<EOT
        
        </main>
        <footer class="footer-distributed">

			<div class="footer-left">
				<h3>Big<span> Apple</span></h3>

				<p class="footer-links">
					<a href="index.php">Home</a>
					|
                    <a href="index.php?page=contact">Contact</a>
                    |
                    <a href="index.php?page=about">About</a>
                    |
                    <a href="index.php?page=faq">FAQs</a>
				</p>

				<p class="footer-company-name">&copy; $year, Big Apple Pvt. Ltd.</p>
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
					<a href="www.facebook.com"><i class="fab fa-facebook"></i></a>
					<a href="#"><i class="fab fa-twitter-square"></i></a>
					<a href="#"><i class="fab fa-instagram"></i></a>
				</div>
			</div>
        </footer>
       
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-ui-1.12.1/jquery-ui.js"></script>
        <script src="js/script.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.18/jquery.zoom.min.js"></script>
    </body>
</html>
EOT;
}
?>