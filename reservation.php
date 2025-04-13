<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation | Signature Cuisine</title>
</head>

<body>

<!-- Header -->
<header>

  <div class="logo-container">
    <a href="#"><img src="resources/companylogo.png" alt="Signature Cuisine Logo" class="logoicon"></a>
   <div id="logo">Signature Cuisine</div>
  </div>

 <nav>
    <button class="hamburger" id="hamburgerBtn">
     <img src="resources/hamburger.png" alt="Menu">
    </button>
    <ul id="navList">
     <li><a href="homepage.php">Home</a></li>
     <li><a href="overview.php">Overview</a></li>
     <li><a href="menu.php">Menu</a></li>
     <li><a href="reservation.php">Reservations</a></li>
     <li><a href="offers.php">Offers</a></li>
     <li><a href="gallery.php">Gallery</a></li>
     <li><a href="facilities.php">Facilities</a></li>
     <li><a href="contact.php">Contact/Query</a></li>
     <li class="account-dropdown">
     <?php if(isset($_SESSION['username'])): ?>
      <a href="#" onclick="toggleDropdown()"><img src="resources/account.png" alt="User Account" class="login-icon"></a>
      <span class="greeting">Hello, <?php echo $_SESSION['username']; ?>!</span>
      <div class="dropdown-content" id="dropdownMenu">
        <a href="profile.php">Profile</a>
        <a href="logout.php">Logout</a>
      </div>
     <?php else: ?>
        <a href="#" onclick="toggleDropdown()"><img src="resources/account.png" alt="Login/Register" class="login-icon"></a>
        <div class="dropdown-content" id="dropdownMenu">
        <a href="login.php">Login</a>
        <a href="signup.php">Signup</a>
        </div>
     <?php endif; ?>
     </li>
     <li class="cart-dropdown">
     <a href="menu.php">
     <div class="cart-icon" onmouseover="showCartDetails()" onmouseout="hideCartDetails()">
      <img src="resources/shopping-bag(1).png" alt="Cart Icon">  
     </div>
     </a>
     <div class="cart-dropdown-content" id="cart-dropdown-content">
      <ul id="cart-items-list"></ul>
     </div>
     </li>
     <li class="search-icon">
      <a href="searchresult.php">
      <img src="resources/search.png" alt="Search Icon">
      </a>
     </li>
    </ul>
    
 </nav>

</header>

<!-- Reservation -->
<section id="reservation-section">

  <!-- Left Side: Creative content -->
  <div class="creative-content">
    <h3>Book Your Table Now!</h3>
    <img src="resources/reservenow.png" alt="">
    
    <div class="guidelines">
    <h2>Reservation Guildlines</h2>
    <h3>Time Periods & Prices For Table Reservations</h3>
      <h4>Lunch: 60-90 minutes</h4>
      <h4>Dinner: 90-120 minutes</h4>
      <h4>Special occasions: 120-180 minutes</h4>
      <h4>Per Seat (Normal) : Rs. 2500</h4>
      <h4>Per Seat (Special) : Rs. 3500</h4>
      <p>Note: We will contact you within 15 minutes to inform your booking status. <br>
         All payment should done to below bank account and please upload proof.</p>
       <h4>Account No: 67457854</h4>
      <h4>Branch: NDB Bank - Colombo</h4>
      <h4>Signature Cuisine</h4>
    </div>
     

  </div>

    <!-- Right Side: Reservation form -->
  <div class="reservation-form">

    <h2>Reservation Form</h2>

    <form action="reservationAction.php" method="post" enctype="multipart/form-data" id="reservation-form-details">
            
      <div class="form-field">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required>
      </div>

      <div class="form-field">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="form-field">
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required>
      </div>

      <div class="form-field">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>
      </div>

      <div class="form-field">
        <label for="time">Time:</label>
        <input type="time" id="time" name="time" required>
      </div>

      <div class="form-field">
        <label for="seats">Number of Seats:</label>
        <input type="number" id="seats" name="seats" min="1" required>
      </div>

      <div class="form-field">
        <label for="payment-slip">Payment Slip:</label>
        <input type="file" name="payment-slip" id="payment-slip" accept="image/*" required>
      </div>


      <div class="btn-container">
        <button type="submit" class="reserve-btn">Reserve</button>
      </div>
      
      <a href="menu.php"><label id="onlinelabel">Online Order?</label></a>


    </form>

  </div>

</section>

<!-- Footer -->
<footer id="footer">

 <!-- More Details-->
 <h2 id="morelabel">Looking For Something Else?</h2>
 <section id="more-section">

    <div class="info-section">

     <!-- Left Card -->
     <div class="info-card">
      <img src="resources/mail.png" alt="Image 1 Description">
      <h3>Contact</h3>
      <p>Feel free to contact us!</p>
      <a href="contact.php">
        <button>Contact Us</button>
      </a>
     </div>

     <!-- Middle Card -->
     <div class="info-card">
      <img src="resources/customer-service.png" alt="Image 2 Description">
      <h3>Support</h3>
      <p>Get help with your online order</p>
      <a href="profile.php">
        <button>Get Help</button>
      </a>
     </div>

     <!-- Right Card -->
     <div class="info-card">
      <img src="resources/received.png" alt="Image 3 Description">
      <h3>Order</h3>
      <p>Track Your Order</p>
      <a href="profile.php">
        <button>Track Order</button>
      </a>
      </div>

    </div>

 </section>

 <!-- branches And Other Details-->
 <section id="Other-Details">

  <div class="branches">
   <h3>Branch Locations</h3>
   <img src="resources/companylogo.png" alt="companylogo">

   <div class="branch-locations">

   <div class="branch main-branch">
    <h4>Main Branch</h4>
    <p>Address: 456 Lakeview St, Hambanthota, Sri Lanka</p>
    <p>Contact: (94) 456-7890</p>
    </div>

    <div class="branch other-branch">
     <h4>Other Branch</h4>
    <p>Address: 246 Main St, Colombo, Sri Lanka</p>
      <p>Contact: (94) 765-4321</p>  
    </div>

  </div>

    <div id="faq">
      
      <h4>©2023 Signature Cuisine all rights reserved </h4>
    </div>

  </div>

 </section>

</footer>

<!-- CSS Styles -->
<style>

 body {
    font-family: Arial, sans-serif;
    background-color: #1e1e1e;
    overflow-x: hidden;
    margin: 0;
    padding: 0;
    
 }

 header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 30px;
    background-color: #161616;
    color: #fff;
    position: relative;
    z-index: 1000; 
    
 }

 /* Logo Styles */

 .logo-container {
    display: flex;
    align-items: center;
    
  }
  
  .logoicon {
    width: 50px;
    height: auto; 
    margin-right: 10px; 
    padding-bottom: 10px;
  }
  
  #logo{
    font-size: 27px;
    font-family: Georgia, 'Times New Roman', Times, serif;
    font-weight:bold;
    padding-bottom: 13px;
    
  }
  
  .greeting {
    position: relative;
    top: -15px;
    left: 4px;
    color: #319e4c; 
  }
  
  /* Navigation Styles */
  
  nav ul {
    display: flex;
    list-style: none;
    padding: 0;
  }
  
  nav li {
    margin: 0 10px;
  }
  
  nav a {
    text-decoration: none;
    color: white;
    transition: color 0.3s;
  }
  
  nav a:hover {
    color: #319e4c; 
  }
  
  .login-icon {
    width: 30px;      
    height: auto;     
    position: relative;
    top: -7px;
  
  }

  .search-icon {
    display: inline-block;
    position: relative; 
    top: -3px;
  }

 .search-icon img {
  width: 24px;     
    height: auto; 
    cursor: pointer;
  }

  .cart-icon {
    display: inline-block;
    position: relative; 
    top: -7px;
  }

  .cart-icon img {
  width: 30px;     
    height: auto; 
    cursor: pointer;
  }

  #cart-count {
    position: absolute;
    top: -8px; 
    right: -8px; 
    background-color: green;
    color: white;
    border-radius: 50%;
    padding: 4px 8px;
    font-size: 12px;
  }

  /* Style for the cart dropdown */
  .cart-dropdown-content {
    display: none;
    position: absolute;
    right: 0;
    background-color: #232324;
    border: 1px solid rgb(80, 80, 80);
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    width: 300px; 
    margin-right: 20px;
  }

  /* Style for the cart items list */
  #cart-items-list {
    list-style: none;
    display: block; 
    padding: 0;
    margin: 0;
    
  }

  #cart-items-list li {
    padding:10px;
    border-bottom: 1px solid rgb(80, 80, 80);
    font-size: 14px;
    margin-top: 10px;

  }

  #cart-items-list li:last-child {
    border-bottom: none;  
  }

  /* Additional styling for item name and price */
  #cart-items-list li span {
    display: block; 
    margin-top: 10px;
  }

  #cart-items-list li span:first-child {
    font-weight: bold;
    color: white;
  }

  #cart-items-list li span:last-child {
    color: white;
  }

  /* Style for the "Go to Checkout" option */
  #cart-items-list a {
    display: flex; 
    justify-content: center;
    width: 70%;
    text-decoration: none;
    padding: 5px;
    margin-bottom: 10px;
    margin-top: 10px;
    background-color:  green; 
    color: white;
    margin-left: 40px;
    font-weight: bold;
    border-radius: 5px;
    transition: background-color 0.3s;
  }

  #cart-items-list a:hover {
    background-color: #2980b9; 
  }
  
  
  .account-dropdown {
    position: relative;
    display: inline-block;
  }
  
  .dropdown-content {
    display: none;
    position: absolute;
    right: 0;
    background-color: #333;
    min-width: 150px;
    z-index: 1;
    border: none;
    border-radius: 15px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  }
  
  .dropdown-content a {
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }
  
  .account-dropdown:hover .dropdown-content {
    display: block;
  }
  
  
  .hamburger {
    display: none;
    background-color: transparent;
    border: none;
    
  }
  
  .hamburger img{
    width: 32px;
    
  }

  #reservation-section {
    display: flex;
    justify-content: space-between;
    padding: 5% 10%;
   
  }

  .reservation-form {
    flex: 1; 
    padding: 20px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    background-color: rgba(52, 52, 52, 0.466);
    margin: 20px;
    color: white;
    border-radius: 10px;
  }

 .creative-content{
  flex: 1; 
  padding: 20px;
  font-family: 'Times New Roman', Times, serif;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
  background-color: rgba(52, 52, 52, 0.466);
  margin: 18px;
  color: white;
  border-radius: 10px;
 }

 .creative-content img{
  width: 400px;
 }

 .creative-content {
    text-align: center;
 }

 .creative-content h3 {
    font-size: 1.6em;
    margin-bottom: 20px;
 }

 .creative-content p {
    margin-bottom: 20px;
    font-size: 1.2em;
    line-height: 1.6;
 }

 .creative-content img {
    max-width: 100%;
    height: auto;
    margin-top: 20px;
   
 }

  /* Style for the container */
  .guidelines {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 10px;
  }
  
  /* Style for h3 and h4 */
  .guidelines h2 {
     margin: 0; /* Remove default margin */
     font-size: 22px;
     padding-bottom: 25px;
     text-decoration: underline;
  }
  
  /* Style for h3 and h4 */
  .guidelines h3 {
     margin: 0; /* Remove default margin */
     font-size: 18px;
     padding-bottom: 10px;
     color: #319e4c;
  }
  
   /* Style for h3 and h4 */
   .guidelines h4 {
     margin: 0; /* Remove default margin */
     font-size: 16px;
     padding-bottom: 10px;
     font-weight: normal;
  }

    /* Style for h3 and h4 */
    .guidelines p {
    color: lightcoral;
     margin: 0; /* Remove default margin */
     font-size: 16px;
     padding-bottom: 15px;
     padding-top: 10px;
     font-weight: bold;
  }

 .form-field {
    margin-bottom: 20px;
    margin-right: 15px;
 }

 label {
  display: block;
  margin-bottom: 5px;
 }

 .btn-container {
    text-align: center;
 }

 .reserve-btn {
    padding: 10px 20px;
    background-color: #333;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
 }

 .reservation-form h2{
  font-family:'Times New Roman', Times, serif;
  text-align: center;
  text-decoration: underline;
 }

 .reserve-btn:hover {
    background-color: #555;
 }

 input[type="text"], input[type="email"], input[type="tel"], input[type="date"], input[type="time"], input[type="number"] {
  width: 100%;
  padding: 10px;
  background-color: transparent;
  border: 1px solid #989696;
  border-radius: 5px;
  color: white;
 }

 #onlinelabel{
  color: #32ad47;
  cursor: pointer;
 }

 
 /*Contact Form And Other Details */

 footer {
    
    padding-top: 50px;
    padding-left: 105px;
    padding-right: 100px; 
    margin: auto;
    color: white;
   
  }

  #morelabel{ 
  color: white;
  padding-left: 0px;
  border: solid 1px #989696;
  border-bottom: none;
  border-left: none;
  border-right: none;
  padding-top: 25px;
  }

  #more-section {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 50px 0;
  }

  .info-section {
    display: flex;
    justify-content: space-between;
    width: 80%; 
    max-width: 1200px;
    margin: 0 auto;
  }

  .info-card {
    flex: 1;
    margin: 0 15px; 
    text-align: center;
    padding-bottom: 20px;
    border: none;
    border-radius: 15px;
    background-color: rgba(52, 52, 52, 0.466);
    transition: transform 0.3s ease; 
    
  }
  .info-card:hover {
  transform: scale(1.05); 
  background-color: #3a3a3aca;
  }

  .info-card img {
    max-width: 50px;
    height: auto;
    padding-top: 20px;
  }

  .info-card h3 {
    margin-top: 15px;
  }

  .info-card p {
    padding: 10px;
  }

  .info-card button {
    margin-top: 20px;
    padding: 10px 20px;
    border: none;
    background-color: rgb(52, 52, 52);
    color: white;
    cursor: pointer;
    border-radius: 15px;
    transition: background-color 0.3s;
  }

  .info-card button:hover {
    background-color: #555;
  }


  .branches{
   padding-top: 25px;
   border: 1px solid #ccc;
   border-left: 0px;
   border-right: 0px;
   border-bottom: 0px;
   

  }
  .branch-locations {
    width: 50%;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
  }
  
  .branches img{
    padding-bottom: 15px;
  }

  .branch {
    margin-bottom: 20px;
  }
  
  .branch h4 {
    margin-top: 0;
  }
  

  #faq h4 {
    text-align: center;
    font-size: smaller;
  }
  
  #faq {
    clear: both;
    margin-top: 20px;
  }
  
  .main-branch {
    order: 0;
  }
  
  .other-branch {
    order: 1;
  }

</style>

</body>

<script src="reservationAction.php"></script>


</html>
