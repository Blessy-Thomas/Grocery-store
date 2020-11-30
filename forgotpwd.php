<?php
require_once("config/connection.php");
$pdo = pdo_connect_mysql();
if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] != "") 
    {
        header("location:ppl.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Login</title>

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap" rel="stylesheet">

    <!-- font -->
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

     <!-- Font Awesome CDN -->
     <script src="https://kit.fontawesome.com/82084529bf.js" crossorigin="anonymous"></script>
     <!-- <script type="text/javascript" src="js/mtb.js"></script> -->
</head>
<body onLoad="email.focus();">
    <header>
        <div class="container">
            <ul class="topnav-right">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li class="active">
                    <a href="index.php?page=login">Log in</a>
                </li>
                <li>
                    <a href="index.php?page=register">Sign up</a>
                </li>
            </ul>
        </div>
    </header>
   
    <div id="main-content" class="container">
        <div class="box2"> <!--forms-container -->
            <div class="login-wrapper">
                <h2 class="title">Big<span> Apple</span></h2>
                <h3>Forgot Password</h3>
                <form action="index.php?page=forgotpwd"  method='post' class="log-in-form" id="login_form" name="Login">
                    
                    <div class="inputBox">
                        <input type="email" name="email" 
                        onkeyup="this.setAttribute('value', this.value);" id="email" value=""  required>
                        <label for="email">Email </label>
                        <i class="fas fa-check-circle"></i>
			            <i class="fas fa-exclamation-circle"></i>
                        <small id ="errorMsg">error msg</small>
                    </div>
                    
                    <input class="button-success" type="submit" name="submit" value="Reset Password" onclick="formValidation();" ></input>
                </form>
                <?php
                $msg="";
                if(isset($_POST['submit'])){
                    require_once "./phpmailer/class.phpmailer.php";
                    $email=strtolower(strip_tags(trim($_POST['email'])));
                    
                    $sql = "SELECT COUNT(*) AS count from users where email = :email";
                try {
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(":email", $email);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    // if($email<9){
                    //     echo"<script>onclick='formValidation();'</script>";
                    // }
                    if ($result[0]["count"] > 0) {
                        $fetchqry="SELECT id from users WHERE email=:email";
                        $fetchid=$pdo->prepare($fetchqry);
                        $fetchid->bindValue(":email",$email);
                        $fetchid->execute();
                        
                        while ($row = $fetchid->fetch(PDO::FETCH_ASSOC))
                        {
                            $id= $row['id'];
                        }
                            $url="http://localhost/store/index.php?page=reset-pass&id=$id";
                            
                            $message=" 
                        <html>
                        <head>
                            <meta name='viewport' content='width=device-width' />
                            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
                            <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
                            <title>Simple Transactional Email</title>
                            <style>
                            /* -------------------------------------
                                GLOBAL RESETS
                            ------------------------------------- */
                            /* store name */
                            .head-img{ 
                                background: url('./img/Capture.PNG') no-repeat top;
                                width: 100%;
                                height: 115px;
                                /* background-position: center; */
                                background-size: contain; 
                                border-radius: 0;
                                border: 0;
                            }
                            div h1{
                                font: normal 50px 'Cookie', cursive;
                                letter-spacing: 2px;
                                background-image: linear-gradient(180deg,violet ,indigo,green,orange, red, blue);
                                  /* Set the background size and repeat properties. */
                                background-size: 100%;
                                background-repeat: repeat;
                                text-align: center;
                                /* font: normal 50px 'Cookie', cursive; */
                                    font-weight: bolder;
                                /* Use the text as a mask for the background. */
                                /* This will show the gradient as a text color rather than element bg. */
                                -webkit-background-clip: text;
                                -webkit-text-fill-color: transparent; 
                                -moz-background-clip: text;
                                -moz-text-fill-color: transparent;
                                    padding: 30px;
                                    text-align: center;
                            }
                        
                            body {
                                background-color: #f6f6f6;
                                font-family: sans-serif;
                                -webkit-font-smoothing: antialiased;
                                font-size: 14px;
                                line-height: 1.4;
                                margin: 0;
                                padding: 0;
                                -ms-text-size-adjust: 100%;
                                -webkit-text-size-adjust: 100%; }
                        
                            table {
                                border-collapse: separate;
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                                width: 100%; }
                                table td {
                                font-family: sans-serif;
                                font-size: 14px;
                                vertical-align: top; }
                        
                            /* -------------------------------------
                                BODY & CONTAINER
                            ------------------------------------- */
                        
                            .body {
                                background-color: #f6f6f6;
                                width: 100%; }
                        
                            /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
                            .container {
                                display: block;
                                Margin: 0 auto !important;
                                /* makes it centered */
                                max-width: 580px;
                                padding: 10px;
                                width: 580px; }
                        
                            /* This should also be a block element, so that it will fill 100% of the .container */
                            .content {
                                box-sizing: border-box;
                                display: block;
                                Margin: 0 auto;
                                max-width: 580px;
                                padding: 10px; }
                        
                            /* -------------------------------------
                                HEADER, FOOTER, MAIN
                            ------------------------------------- */
                            .main {
                                background: #ffffff;
                                border-radius: 3px;
                                width: 100%; }
                        
                            .wrapper {
                                box-sizing: border-box;
                                padding: 20px; }
                        
                            .content-block {
                                padding-bottom: 10px;
                                padding-top: 10px;
                            }
                        
                            .footer {
                                clear: both;
                                Margin-top: 10px;
                                text-align: center;
                                width: 100%; }
                                .footer td,
                                .footer p,
                                .footer span,
                                .footer a {
                                color: #999999;
                                font-size: 12px;
                                text-align: center; }
                        
                            /* -------------------------------------
                                TYPOGRAPHY
                            ------------------------------------- */
                            h1,
                            h2,
                            h3,
                            h4 {
                                color: #000000;
                                font-family: sans-serif;
                                font-weight: 400;
                                line-height: 1.4;
                                margin: 0;
                                Margin-bottom: 30px; }
                        
                            h1 {
                                font-size: 35px;
                                font-weight: 300;
                                text-align: center;
                                text-transform: capitalize; }
                        
                            p,
                            ul,
                            ol {
                                font-family: sans-serif;
                                font-size: 14px;
                                font-weight: normal;
                                margin: 0;
                                Margin-bottom: 15px; }
                                p li,
                                ul li,
                                ol li {
                                list-style-position: inside;
                                margin-left: 5px; }
                        
                            a {
                                color: #3498db;
                                text-decoration: underline; }
                        
                            /* -------------------------------------
                                BUTTONS
                            ------------------------------------- */
                            .btn {
                                box-sizing: border-box;
                                width: 100%; }
                                .btn > tbody > tr > td {
                                padding-bottom: 15px; }
                                .btn table {
                                width: auto; }
                                .btn table td {
                                background-color: #ffffff;
                                border-radius: 5px;
                                text-align: center; }
                                .btn a {
                                background-color: #ffffff;
                                border: solid 1px #3498db;
                                border-radius: 5px;
                                box-sizing: border-box;
                                color: #3498db;
                                cursor: pointer;
                                display: inline-block;
                                font-size: 14px;
                                font-weight: bold;
                                margin: 0;
                                padding: 12px 25px;
                                text-decoration: none;
                                text-transform: capitalize; }
                        
                            .btn-primary table td {
                                background-color: #3498db; }
                        
                            .btn-primary a {
                                background-color: #3498db;
                                border-color: #3498db;
                                color: #ffffff; }
                        
                            /* -------------------------------------
                                OTHER STYLES THAT MIGHT BE USEFUL
                            ------------------------------------- */
                            .last {
                                margin-bottom: 0; }
                        
                            .first {
                                margin-top: 0; }
                        
                            .align-center {
                                text-align: center; }
                        
                            .align-right {
                                text-align: right; }
                        
                            .align-left {
                                text-align: left; }
                        
                            .clear {
                                clear: both; }
                        
                            .mt0 {
                                margin-top: 0; }
                        
                            .mb0 {
                                margin-bottom: 0; }
                        
                            .preheader {
                                color: transparent;
                                display: none;
                                height: 0;
                                max-height: 0;
                                max-width: 0;
                                opacity: 0;
                                overflow: hidden;
                                mso-hide: all;
                                visibility: hidden;
                                width: 0; }
                        
                            .powered-by a {
                                text-decoration: none; }
                        
                            hr {
                                border: 0;
                                border-bottom: 1px solid #f6f6f6;
                                Margin: 20px 0; }
                        
                            /* -------------------------------------
                                RESPONSIVE AND MOBILE FRIENDLY STYLES
                            ------------------------------------- */
                            @media only screen and (max-width: 620px) {
                                table[class=body] h1 {
                                font-size: 28px !important;
                                margin-bottom: 10px !important; }
                                table[class=body] p,
                                table[class=body] ul,
                                table[class=body] ol,
                                table[class=body] td,
                                table[class=body] span,
                                table[class=body] a {
                                font-size: 16px !important; }
                                table[class=body] .wrapper,
                                table[class=body] .article {
                                padding: 10px !important; }
                                table[class=body] .content {
                                padding: 0 !important; }
                                table[class=body] .container {
                                padding: 0 !important;
                                width: 100% !important; }
                                table[class=body] .main {
                                border-left-width: 0 !important;
                                border-radius: 0 !important;
                                border-right-width: 0 !important; }
                                table[class=body] .btn table {
                                width: 100% !important; }
                                table[class=body] .btn a {
                                width: 100% !important; }
                                table[class=body] .img-responsive {
                                height: auto !important;
                                max-width: 100% !important;
                                width: auto !important; }}
                        
                            /* -------------------------------------
                                PRESERVE THESE STYLES IN THE HEAD
                            ------------------------------------- */
                            @media all {
                                .ExternalClass {
                                width: 100%; }
                                .ExternalClass,
                                .ExternalClass p,
                                .ExternalClass span,
                                .ExternalClass font,
                                .ExternalClass td,
                                .ExternalClass div {
                                line-height: 100%; }
                                .apple-link a {
                                color: inherit !important;
                                font-family: inherit !important;
                                font-size: inherit !important;
                                font-weight: inherit !important;
                                line-height: inherit !important;
                                text-decoration: none !important; }
                                .btn-primary table td:hover {
                                background-color: #34495e !important; }
                                .btn-primary a:hover {
                                background-color: #34495e !important;
                                border-color: #34495e !important; } }
                        
                            </style>
                        </head>
                        <body>
                            <table border='0' cellpadding='0' cellspacing='0' class='body' style='padding-top:2%'>
                            <tr>
                                <td>&nbsp;</td>
                                <td class='container'>
                                <div class='content'>
                        
                                    <!-- START CENTERED WHITE CONTAINER -->
                                    <span class='preheader'>New Contact Form Entry.</span>
                                    <table class='main'>
                        
                                    <tr>
                                        <td class='wrapper'>
                                        <table border='0' cellpadding='0' cellspacing='0'>
                                            <tr>
                                            <td><center>
                                                <div class='head-img'>
                                                    <h1>Big Apple</h1>
                                                </div>
                                                <p><h2>Password Reset Request</h2></p></center>
                                            </td>
                                            </tr>
                                        </table>
                                        </td>
                                    </tr>
                                    
                                    <!-- START MAIN CONTENT AREA -->
                                    <tr>
                                        <td class='wrapper'>
                                        <table border='0' cellpadding='0' cellspacing='0'>
                                            <tr>
                                            <td>
                                                <p>Hi,</p>
                                                <p>We have received a password reset request from the email address $email on Big Apple.</p>
                                                <p>Click on the button below to reset your password.</p>
                                                <p> <center><a href=".$url." target='_blank' style='width:80%; display: inline-block; color: #ffffff; background-color: #3498db; border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3498db;'>Forgot Password</a></center></p>
                                                <p>Thanks for registering with us.</p>
                                                <p>Regards,<br/>Big Apple</p>
                                                <p>If you have not performed this activity, then please ignore this email.</p>
                                            </td>
                                            </tr>
                                        </table>
                                        </td>
                                    </tr>
                        
                                    <!-- END MAIN CONTENT AREA -->
                                    </table>
                        
                                    <!-- START FOOTER -->
                                    <div class='footer'>
                                    <table border='0' cellpadding='0' cellspacing='0'>
                                        <tr>
                                        <td class='content-block'>
                                            <span class='apple-link'>Big Apple, 27 XYZ Road, Pune, Maharashtra,India 445001</span>
                                            <br> This is mandatory service email sent to you by Big Apple pvt Ltd.
                                        </td>
                                        </tr>
                                        <tr>
                                        <td class='content-block powered-by'>
                                            Powered by <a href='http://localhost/store/index.php'>Big Apple</a>.
                                        </td>
                                        </tr>
                                    </table>
                                    </div>
                                    <!-- END FOOTER -->
                        
                                <!-- END CENTERED WHITE CONTAINER -->
                                </div>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            </table>
                        </body>
                        </html>";		 
                        // php mailer code starts
                        $mail = new PHPMailer(true);
                        $mail->IsSMTP(); // telling the class to use SMTP
                
                        //$mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
                        $mail->SMTPAuth = true;                  // enable SMTP authentication
                        $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
                        $mail->Host = "smtp.gmail.com";      //replace values with yours
                        $mail->Port = 587;                   //replace values with yours
                
                        $mail->Username = 'bigapplegrocerystore@gmail.com'; //replace values with yours
                        $mail->Password = 'biga45551';           //replace values with yours
                
                        $mail->SetFrom('bigapplegrocerystore@gmail.com', 'Big Apple'); //replace values with yours
                        $mail->AddAddress($email);
                
                        $mail->Subject = trim("Forgot Password - Grocery store");
                        $mail->MsgHTML($message);
                
                        try {
                            $mail->send();
                            $msg = "<div id='Msg1'>A password reset link has been sent to your email address.</div>";
                            $msgType = "success";
                        } catch (Exception $ex) {
                            $msg = $ex->getMessage();
                            $msg = "<div id='errorMsg1'>Mail could not be send. Please check your internet connection!</div>";
                            $msgType = "danger";
                        }
                        
                    } else {
                        $msg = "<div id='errorMsg1'>Sorry! Your email is not registered with us.</div>";
                        $msgType = "danger";
                        }
                    }
                    catch (Exception $ex) {
                        // echo $ex->getMessage();
                        $msg = "<div id='errorMsg1'>Unexpected error occured! please refresh the page.</div>";
                        $msgType = "danger";
                    }
                }
                
                if ($msg <> "") { ?> 
                <div style="margin-top:2%" class="alert alert-dismissable alert-<?php echo $msgType; ?>">
                   
                    <center><b><?php echo $msg;?></b></center>
                </div>
                <?php } 
                
                ?>

                <div class="login-footer">Don't have an account?
                    <a href="index.php?page=register">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
   
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui-1.12.1/jquery-ui.js"></script>
    <script src="js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.18/jquery.zoom.min.js"></script>
    <script>
        let email = document.forms['Login']['email'];
        let password = document.forms['Login']['password'];

        // let email_error = document.getElementById('email_error');
        //  pass_error = document.getElementById('pass_error');

        email.addEventListener('textInput', email_Verify);
        password.addEventListener('textInput', pass_Verify);

        function formValidation(){
            // trim to remove the whitespaces
            const emailValue = email.value;
  
            if(emailValue.length == 0) {
                setErrorFor(email, 'Email cannot be blank');
                emailValue.focus();
                return false;
            } else if(!(emailValue.length > 9)) {
                setErrorFor(email, "Email length should be greater than 9!");
                emailValue.focus();
                return false;
            } 
            else if (!email_Verify(emailValue)) {
                setErrorFor(email, 'Not a valid email');
                emailValue.focus();
                return false;
                
            } else {
                setSuccessFor(email);
                
            }
           
        }
        function setErrorFor(input, message) {
            const inputBox = input.parentElement;
            const small = inputBox.querySelector('small');
            inputBox.className = 'inputBox error';
            small.innerText = message;
        }

        function setSuccessFor(input) {
            const inputBox = input.parentElement;
            inputBox.className = 'inputBox success';
            // small.style.display = "none";
        }
        function email_Verify(email){
            return /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
           
        }

   
    </script>
</body>
</html>