<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="portalstyles.css">
    <title>Signup - Signature Cuisine</title>
</head>

<body>

<!-- Header -->
<div class="header">
    <div class="header-content">
     <img src="resources/companylogo.png" alt="Signature Cuisine Logo" class="logo">
     <h1>Welcome to the Signature Cuisine</h1>
    </div>
</div>

<!-- Signup  -->
<div class="login-container">

    <img src="resources/leftimage1.png" alt="Description of Image" class="left-image">
    <img src="resources/leftimage2.png" alt="Image" class="leftsecond-image">
    <h2 id="titlename"> Quotes of the day :</h2>
    <h3 id="quotes"></h3>

 <div class="auth-section">
    <h2>Signup Portal</h2>
    <form action="signupAction.php" method="post" id="signup-form">

    <div class="auth-field">
     <label for="signup-username">Username</label>
     <input type="text" id="signup-username" name="username" value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>" required>
     <?php if(isset($_SESSION['error_field']) && $_SESSION['error_field'] === 'username') { echo "<span class='error'>" . $_SESSION['error_message'] . "</span>"; } ?>
     </div>

    <div class="auth-field">
     <label for="signup-email">Email</label>
     <input type="email" id="signup-email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" required>
     <?php if(isset($_SESSION['error_field']) && $_SESSION['error_field'] === 'email') { echo "<span class='error'>" . $_SESSION['error_message'] . "</span>"; } ?>
    </div>

    <div class="auth-field">
     <label for="signup-password">Password</label>
     <input type="password" id="signup-password" name="password" required>
     <?php if(isset($_SESSION['error_field']) && $_SESSION['error_field'] === 'password') { echo "<span class='error'>" . $_SESSION['error_message'] . "</span>"; } ?>
    </div>

    <div class="auth-field">
     <label for="signup-confirm-password">Confirm Password</label>
     <input type="password" id="signup-confirm-password" name="confirmPassword" required>
    </div>

    <div class="btn-container">
     <button type="submit" class="auth-btn">Signup</button>
    </div>

    </form>
     <p>Already have an account? <a href="login.php">Login</a></p>

</div>

<script src="loginscripts.js"></script>

</body>

</html>

<?php
// Clear session error messages after displaying
unset($_SESSION['error_field']);
unset($_SESSION['error_message']);
?>