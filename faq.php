<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FAQ</title>
        <link rel="stylesheet" href="css/faq1.css">
    </head>
    <body>
    <header>
        <div class="container">
        <?php if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] != ""):?>
            <ul class="topnav-right">
                <li>
                    <a href="ppl.php">Home</a>
                </li>
                <li class="active">
                    <a href="ppl.php?page=faq">FAQs</a>
                </li>
            </ul>
        <?php else:?>
            <ul class="topnav-right">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li class="active">
                    <a href="index.php?page=faq">FAQs</a>
                </li>
            </ul>
        <?php endif;?>
        </div>
    </header>
    <div class="box">
        <p class="heading">FAQs</p>
        <div class="faqs">
        <details>
            <summary>How do I register?</summary>
            <p class="text">You can register by clicking on the "Sign Up" link at the top right corner of the homepage. Please provide the information in the form that appears. You can review the terms and conditions, provide your payment mode details and submit the registration information.</p>
        </details>
        <details>
            <summary>How do I add or remove products after placing my order?</summary>
            <p class="text">Once you have placed your order you will not be able to make modifications on the website. Please contact our customer support team for any modification of order.</p>
        </details>
        <details>
            <summary>What are the modes of payment?</summary>
            <p class="text">You can pay for your order on bigbasket.com using the following modes of payment:a. Cash on delivery (COD)b. Credit and debit cards (VISA / Mastercard / Rupay)c. Sodexo passes on delivery (only for food items)



                If the order has to be left at the security gate, please continue to pay online via wallets, UPI, net banking, or cards as you are doing now.
                If you choose COD as the payment method, you will need to pay our delivery executive in cash at the time of delivery.</p>
        </details>
        <details>
            <summary>What is My Shopping List?</summary>
            <p class="text">My Shopping List is a comprehensive list of all the items previously ordered by you on bigbasket.com. This enables you to shop quickly and easily in future.</p>

        </details>
        <details>
            <summary>What is the meaning of cash on delivery?</summary>
            <p class="text">Cash on delivery means that you can pay for your order at the time of order delivery at your doorstep.</p>
        </details>
        <details>
            <summary>How are the fruits and vegetables packaged?</summary>
            <p class="text">Fresh fruits and vegetables are hand picked and hand cleaned. We ensure hygienic and careful handling of all our products.</p>

        </details>
        <details>
            <summary>What are your timings to contact customer service?</summary>
            <p class="text">Our customer service team is available throughout the week, all seven days from 7 am to 10 pm.</p>
        </details>
        <details>
            <summary>Is it possible to order an item which is out of stock?</summary>
            <p class="text">No you can only order products which are in stock. We try to ensure availability of all products on our website however due to supply chain issues sometimes this is not possible</p>
        </details>
    </div>
 </div>
</body>
</html>