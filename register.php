<?php
require_once("config/connection.php");
$pdo = pdo_connect_mysql();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="css/SignUp.css">
    <script src="js/validate.js" defer></script>
    <!--Link for font awesome-->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap" rel="stylesheet">
    <!-- font -->
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <script src="https://use.fontawesome.com/82903caadf.js"></script>
    

</head>
<body>
    
  <div class="topnav" id="myTopnav">
    <a href="index.php?page=login">Login</a>
    <a class="active" href="index.php?page=register">SignUp</a>
    <a href="index.php">Home</a>
    <!-- <a href="#about">About</a> -->
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
  
  <div class="container">
  
        <h2 class="title">Big<span> Apple</span></h2>     
        <div class="header">Sign Up</div>
        
        <form class="form" action="" method="POST" id="form" name="signup">
          <!--First Name-->
          <div class="inputBox">
            <label>First Name</label>
            <input type="text" placeholder="First Name" id="first_name" name="fname" maxlength="32" value="" required autofocus
             class="input">
            <i class="fa fa-check-circle"></i>
            <i class="fa fa-exclamation-circle"></i>
            <small style="margin-top: 25px;">error msg</small>
          </div>
          <!--Last Name-->
          <div class="inputBox">
            <label>Last Name</label>
            <input type="text" placeholder="Last Name" id="last_name" name="lname" maxlength="32" value="" required
            class="input">
            <i class="fa fa-check-circle"></i>
            <i  class="fa fa-exclamation-circle"></i>
            <small style="margin-top: 25px;">error msg</small>
          </div>
         
             <!-- Email -->
            <div class="inputBox">
                <label>Email</label>
                <input type="email" placeholder="Email" id="email" name="email" class="input" value="" required>
                <i class="fa fa-check-circle"></i>
                <i class="fa fa-exclamation-circle"></i>
                <small style="margin-top: 25px;">error msg</small>
          </div>

          <!--Phone Number-->
          <div class="inputBox">
            <label>Phonenumber</label>
            <input type="tel" placeholder="+91 123456789" id="phone_number" name="phone_number" class="input" value="" required>
            <i class="fa fa-check-circle"></i>
            <i class="fa fa-exclamation-circle"></i>
            <small style="margin-top: 25px;">error msg</small>
          </div>

          <!--Password-->
          <div class="inputBox">
            <label>Password</label>
            <input type="password" placeholder="**********" name="password" value="" id="password" minlength="8"  value="" required
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
            class="input" required>
            <i class="fa fa-check-circle"></i>
            <i class="fa fa-exclamation-circle"></i>
            <small style="margin-top: 25px;">error msg</small>
          </div>
          <!--Confirm Password-->
          <div class="inputBox">
            <label>Confirm Password</label>
            <input type="password" placeholder="**********" id="password_two" name="confirm_password" value="" required
            class="input">
            <i class="fa fa-check-circle"></i>
            <i class="fa fa-exclamation-circle"></i>
            <small style="margin-top: 25px;">error msg</small>
          </div>
          <!--Address-->
          <div class="inputBox">
            <label> Address </label><br>
            <textarea name="Address" id="address" cols="55" rows="5" class="input" value="" required></textarea>
            <i class="fa fa-check-circle"></i>
            <i class="fa fa-exclamation-circle"></i>
            <small style="margin-top: 93px;">error msg</small>
          </div>

          <!--Pincode-->
          <div class="inputBox">
            <label>Pincode</label>
            <input type="text" placeholder="123-456" id="pincode" name="pincode" class="input" value="" required>
            <i class="fa fa-check-circle"></i>
            <i class="fa fa-exclamation-circle"></i>
            <small style="margin-top: 25px;">error msg</small>
          </div>
          <!--Buttons-->
          <!--  <button type="submit" style="float: left;">SUBMIT</button>-->
          <input class="button-success" type="submit" name="submit" value="SIGN UP" onclick="formValidation();" style="margin-right:35px">
          <input type="reset" class="button-success"  onclick="refresh()" value="RESET">
        </form>
        <?php

            if(isset($_POST['submit']))
            {
                $fname= trim($_POST['fname']);
                $lname= trim($_POST['lname']);
                $email= strtolower(strip_tags(trim($_POST['email'])));
                $password= stripslashes(trim($_POST['password']));
                $mob=trim($_POST['phone_number']);
                $add=trim($_POST['Address']);
				        $pincode= trim($_POST['pincode']);
                $cpasswd= stripslashes(trim($_POST['confirm_password']));
                
                $check_email  = "SELECT email FROM users WHERE email = :email";
                $check_email = $pdo->prepare($check_email);
                $check_email->execute(array(':email'=>$email));
                if($check_email->rowCount() >0){
                    echo "<script type='text/javascript'>alert('Email $email already exist!')</script>";
                    exit();
                }
                
                
                //check for existence
                if ($fname!="" && $lname!="" && $email != "" && $password!="" &&  $mob!="" &&  $add!="" && $pincode!="" && $cpasswd!="") {
                    $password = stripslashes($_POST['password']);
                    $md5 =  md5(stripslashes($_POST['password']));
                    $cpasswd = md5(stripslashes($_POST['confirm_password']));
                    try {
                        $query = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `mobile`, `address`, `password`, `pincode`)VALUES (:fname,:lname,:email,:mob,:add,:password,:pincode)";
                        $stmt = $pdo->prepare($query);
                        $stmt->bindParam('fname', $fname, PDO::PARAM_STR);
                        $stmt->bindParam('lname', $lname, PDO::PARAM_STR);
                        $stmt->bindParam('email', $email, PDO::PARAM_STR);
                        $stmt->bindParam('mob', $mob, PDO::PARAM_STR);
                        $stmt->bindParam('add', $add, PDO::PARAM_STR);
                        $stmt->bindValue('password', $md5, PDO::PARAM_STR);
                        $stmt->bindValue('pincode', $pincode, PDO::PARAM_INT);
                        $stmt->execute();
                        $count = $stmt->rowCount();
                        $row   = $stmt->fetch(PDO::FETCH_ASSOC);
                        echo "<script type='text/javascript'>  window.location='index.php?page=login'; </script>";
                    }
                        catch (PDOException $e) {
                            echo $e->getMessage();
                        }
                       
                }
                else
                    echo"<div id='errorMsg1'>Please fill in <b>all</b> fields!<br></div>";
            }
            ?>
    </div>
</body>
</html>