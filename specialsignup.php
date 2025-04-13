<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

<!-- Signup Section -->
<div class="login-container">

 <img src="resources/leftimage1.png" alt="Description of Image" class="left-image">
 <img src="resources/leftimage2.png" alt="Image" class="leftsecond-image">
 <h2 id="titlename"> Quotes of the day :</h2>
 <h3 id="quotes"></h3>

 <div class="auth-section">

  <h2>Signup Portal (Staff)</h2>

  <form action="specialsignupAction.php" method="post" id="signup-form">

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

   <div class="auth-field">
    <label for="usertype">User Type</label>
    <select id="usertype" name="usertype">
     <option value="staff">staff</option>
     <option value="admin">admin</option>
    </select>
   </div>


   <div class="btn-container">
    <button type="submit" class="auth-btn">Signup</button>
   </div>

 </form>

 <p>Already have an account? <a href="login.php">Login</a></p>

</div>

<!-- CSS Styles -->
<Style>
 body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #1e1e1e;
    color: white;
 }

 .header {
    background-color: rgba(45, 45, 45, 0.599);
    padding: 10px 20px;
 }

 h1{
 font-size: 28px;
 font-family: Georgia, 'Times New Roman', Times, serif;
 font-weight:bold;
 }

 #titlename{
    position: absolute;
    bottom: 150px;
    left: 75px;
    font-size: 15px;

 }

 #quotes{
    position: absolute;
    bottom: 120px;
    left: 75px;
    font-size: 13px;
    color: white;

 }

 .auth-section h2{
    font-size: 16px;
    font-weight: bold;
    padding-top: 15px;
    text-align: center;
       
 }

 p{
    font-size: 16px;
    font-weight: normal;
    padding-top: 15px;
    
 }

 p{
    font-size: 15px;
    
 }  

 a{
    font-size: 15px;
    color: green;
    text-decoration: none;
    
 }  

 #subtopic{
    position: absolute;
    left: 225px;
    font-size: 27px;
    color: rgb(74, 74, 74);
    padding-bottom: 300px;
    
    
 }

 .header-content {
    display: flex;
    align-items: center;
    justify-content: center;
 }

 .logo {
    height: 50px;
    margin-right: 15px; 
 }

 .login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: calc(100vh - 80px); 
    transition: transform 0.3s ease; 
 }

 .left-image {
    position: absolute;
    left: 150px;
    top: 175px;
    padding-bottom: 20px;
    width: 350px;
   
 }

 .leftsecond-image {
    position: absolute;
    left: 425px;
    top: 175px;
    padding-bottom: 20px;
    width: 350px;
   
 }

 span.error {
    color: #D8000C;               /* Red color to signify an error */   /* Light red background for contrast */
    font-size: 0.85rem;          /* Smaller font size for the error message */
    display: block;              /* Display as block to make it appear below the input field */
    margin-bottom: 10px;         
    max-width: 90%;              /* Ensuring it doesn't overflow too much */
    word-wrap: break-word;       /* Allows long error messages to wrap onto the next line */
 }

 .auth-section {
    position: absolute;
    width: 300px; 
    padding-right: 50px;
    padding-left: 25px;
    padding-bottom: 15px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    background-color: rgba(45, 45, 45, 0.599);
    border: none;
    border-radius: 15px;
    margin-bottom: 110px;
    right: 140px;
    top: 100px;
   
 }

 .auth-field label {
    display: block;
    margin-bottom: 5px;
    font-size: 14px;
    padding-top: 5px;
 }

 .auth-field input {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 2px solid #989696;
    border-top: none;
    border-left: none;
    border-right: none;
    background-color: transparent;
    font-size: 13px;
    color: white;
 }

 .btn-container {
    text-align: center;
 }

 .auth-btn {
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    border: 1px solid #989696;
    cursor: pointer;
    border-radius: 5px;
 }

 .auth-btn:hover {
    background-color: #555;
    transform: scale(1.05);
 }

</Style>

<script src="loginscripts.js"></script>

</body>

</html>

<?php
// Clear session error messages after displaying
unset($_SESSION['error_field']);
unset($_SESSION['error_message']);
?>