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
        <div class="box"> <!--forms-container -->
            <div class="login-wrapper">
                <h2 class="title">Big<span> Apple</span></h2>
                <h4>Welcome Back!</h4>
                <h3>Login</h3>
                <form action="index.php?page=login"  method='post' class="log-in-form" id="login_form" name="Login">
                    
                    <div class="inputBox">
                        <input type="email" name="email" 
                        onkeyup="this.setAttribute('value', this.value);" id="email" value="" required>
                        <label for="email">Email </label>
                        <i class="fas fa-check-circle"></i>
			            <i class="fas fa-exclamation-circle"></i>
                        <small id ="errorMsg">error msg</small>
                    </div>
                    <div class="inputBox">
                        <input type="password" name="password" value="" id="password" minlength="8" required
                        onkeyup="this.setAttribute('value', this.value);" >
                        <label for="password">Password </label>
                        <i class="fas fa-check-circle"></i>
			            <i class="fas fa-exclamation-circle"></i>
                        <small id="errorMsg">error msg</small>
                    </div>
                    
                    <input class="button-success" type="submit" name="submit" value="log in" onclick="formValidation();" ></input>
                </form>

                <?php

                    if(isset($_POST['submit']))
                    {
                        $email= $_POST['email'];
						$password= md5($_POST['password']);
                    if($email != "" && $password != ""){
                        try {
                            $query = "select * from `users` where `email`=:email and `password`=:password";
                            $stmt = $pdo->prepare($query);
                            $stmt->bindParam('email', $email, PDO::PARAM_STR);
                            $stmt->bindValue('password', $password, PDO::PARAM_STR);
                            $stmt->execute();
                            $count = $stmt->rowCount();
                            $row   = $stmt->fetch(PDO::FETCH_ASSOC);
                            if($count == 1 && !empty($row)) {
                              /******************** Your code ***********************/
                              $_SESSION['sess_user_id']   = $row['id'];
                              $_SESSION['sess_email'] = $row['email'];
                              $_SESSION['firstname'] = $row['firstname'];
                              $_SESSION['lastname'] = $row['lastname'];

                              echo "<script type='text/javascript'>  window.location='ppl.php'; </script>";
                            } else {
                              echo("<div id='errorMsg1'>Invalid email and password!!</div>");
                            }
                          } catch (PDOException $e) {
                            echo "Error : ".$e->getMessage();
                            echo("<div id='errorMsg1'>Mail could not be send. Please check your internet connection!</div>");
                          }
                        } else {
                          echo "<div id='errorMsg1'>Both fields are required!</div>";
                        }
                      }

                    ?>

                <div class="login-footer">Don't have an account?
                    <a href="index.php?page=register">Sign Up</a>
                </div>
                <div class="login-footer">Forgot Password?
                    <a href="index.php?page=forgotpwd">Reset it</a>
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
            const emailValue = email.value.trim();
            const passwordValue = password.value.trim();
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
            // if(email.value.length < 9){
            //     email.style.border = "1px solid red";
            //     email_error.style.display = "block";
            //     email.focus();
            //     return false;
            // }
            var passwordValidationRegex = new RegExp('^(?=.*[a-z])(?=.*[A-Z])(?=.*d)(?=.*[@$!%*?&])[A-Za-zd@$!%*?&]{8,}$');
            if (passwordValue === '') {
                // show error
                // adding error class
                setErrorFor(password, "Password can't be blank");
                showError = false;
            } else if (!(passwordValue.length > 8 && passwordValue.length < 16)) {
                setErrorFor(
                password,
                'Password minimum length should be 8 and maximum length should be 16'
                );
                showError = false;
            } else if (passwordValidationRegex.test(passwordValue)) {
                setErrorFor(password, 'Password must contain special character');
                showError = false;
            } else {
                // adding success class
                setSuccessFor(password);
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
            return /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email);
        }

   
    </script>
</body>
</html>