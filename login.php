<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="portalstyles.css">
    <title>Login - Signature Cuisine</title>
</head>

<body>

<!-- Header-->
<div class="header">
    <div class="header-content">
     <img src="resources/companylogo.png" alt="Signature Cuisine Logo" class="logo">
     <h1>Welcome to the Signature Cuisine</h1>
    </div>
</div>

<!-- Form-->
<div class="login-container">
    <img src="resources/leftimage1.png" alt="Description of Image" class="left-image">
    <img src="resources/leftimage2.png" alt="Image" class="leftsecond-image">
    <h2 id="titlename"> Quotes of the day :</h2>
    <h3 id="quotes"></h3>

    <div class="auth-section">
    <h2>Login Portal</h2>
    <form action="loginAction.php" method="post" id="login-form">

 <div class="auth-field">
     <label for="login-email">Email</label>
     <input type="email" id="login-email" name="email" required>
     <!-- Error message for email -->
     <span class='error'>
        <?php if(isset($_SESSION['emailError'])) { echo $_SESSION['emailError']; unset($_SESSION['emailError']); } ?>
     </span>
 </div>

 <div class="auth-field">
     <label for="login-password">Password</label>
     <input type="password" id="login-password" name="password" required>
      <!-- Error message for password -->
     <span class='error'>
     <?php if(isset($_SESSION['passwordError'])) { echo $_SESSION['passwordError']; unset($_SESSION['passwordError']); } ?>
     </span>
 </div>

 <div class="btn-container">
     <button type="submit" class="auth-btn">Login</button>
 </div>

     <p>Don't have an account? <a href="signup.php">Sign Up</a></p>

 </div>

</div>

</body>

<script src="loginscripts.js"></script>

</html>


<?php

// Clear session error messages after displaying
unset($_SESSION['error_field']);
unset($_SESSION['error_message']);

?>