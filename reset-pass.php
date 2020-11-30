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
                <h3>Reset Password</h3>
                <form action=""  method='post' class="log-in-form" id="login_form" name="Login">
                    
                    <div class="inputBox">
                        <input type="password" name="password" value="" id="password" required
                        onkeyup="this.setAttribute('value', this.value);" 
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                        <label for="password">New Password </label>
                        <i class="fas fa-check-circle"></i>
			            <i class="fas fa-exclamation-circle"></i>
                        <small id="errorMsg">error msg</small>
                    </div>
                    
                    <input class="button-success" type="submit" name="submitpass" value="Update" onclick="formValidation();" ></input>
                </form>

                <?php

                    $msg="";
                    
                    if (isset($_POST['submitpass'])) {
                    $id = isset($_GET['id']) ? $_GET['id'] : '';
                   
                    $password=md5($_POST['password']);
                    $sql = "UPDATE users SET `password`=:password WHERE `id`=:id";
                    try {
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindValue(":password", $password);
                        $stmt->bindValue(":id", $id);
                        $stmt->execute();
                        $msg = "<div id='Msg1'>password changed successfully!</div>";
                        $msgType = "success";
                    
                    } catch (Exception $ex) {
                        echo $ex->getMessage();
                        $msg = "<div id='errorMsg1'>Something went wrong. Plesae try again!</div>";
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
      
            const passwordValue = password.value.trim();
           
            if(passwordValue.length==0) {
                setErrorFor(password, 'Password cannot be blank');
                passwordValue.focus();
                return false;
            } 
            else if(passwordValue.length < 8 ){
                setErrorFor(password, "Password minimum length should be 8");
                passwordValue.focus();
                return false;
            }
            else if(!pass_Verify(passwordValue)) {
                setErrorFor(password, 'Not valid password!');
                passwordValue.focus();
                return false;
            }
            else {
                setSuccessFor(password);
                return true;
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
        function pass_Verify(password){
            return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        }
    </script>
</body>
</html>