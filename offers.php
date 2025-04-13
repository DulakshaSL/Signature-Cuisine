<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signature Cuisine - Offers</title>
    
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

<!-- Offers Carousel -->
<section id="carousel">

  <div id="carousel-container">

    <div class="carousel-slide">
     <img src="resources/mainoffer1.jpg" alt="Popular Dish">
    <div class="carousel-overlay">
     <h3>Happy hour specials</h3>
     <p>
     Get discounts on drinks and appetizers at 
     on online order during happy hour.
    </p>
    <a href="menu.php" class="carousel-btn">Order Now</a>
    </div>
    </div>
            
    <div class="carousel-slide">
     <img src="resources/mainoffer2.jpg" alt="Ambiance Photo">
    <div class="carousel-overlay">
     <h3>Family meal</h3>
     <p>
     Buy family meal today and enjoy a delicious, 
     hassle-free meal that everyone will love!
     </p>
     <a href="reservation.php" class="carousel-btn">Reserve Now</a>
    </div>
    </div>

    <div class="carousel-slide">
     <img src="resources/mainoffer3.jpeg" alt="Promotion Photo">
    <div class="carousel-overlay">
     <h3>Happy Birthday Special!</h3>
     <p>
     Save big on your birthday! Get 20% off your entire purchase. 
     Offer valid for 7 days before and after your birthday.
     </p>
     <a href="reservation.php" class="carousel-btn">Reserve Now</a>
    </div>
    </div>
        
    <button id="prevBtn">&#10094;</button>
    <button id="nextBtn">&#10095;</button>

  </div>     
  

</section>

<!-- Featured Deals-->
<section id="offers-section">

  <h2>Featured Deals </h2>

 <div class="offers-container">

  <!-- Offer Card 1 -->
    <div class="offer-card">
      <img src="resources/populardish4.jpg" alt="Offer Image 1">
      <h3>50% off all pizzas</h3>
      <p>Satisfy your pizza cravings for half the price with our limited time offer: 
      50% off all pizzas! Treat yourself without breaking the bank.</p>
      <span class="offer-price">Starts From Rs.1200</span>
     
    </div>

  <!-- Offer Card 2 -->
  <div class="offer-card">
    <img src="resources/earlybird.jpeg" alt="Offer Image 2">
    <h3>Early bird specials</h3>
    <p>Save money on a delicious meal and beat the rush with our early bird specials. 
    Available from 4pm to 7pm.</p>
    <span class="offer-price">4pm to 7pm</span>
   
  </div>
    
  <div class="offer-card">
    <img src="resources/getonefree.jpeg" alt="Offer Image 2">
    <h3>Buy one, get one free</h3>
    <p>Double your burger fun with our Buy one, get one free on all burgers offer! 
    This offer is valid for a limited time only, so don't miss!</p>
    <span class="offer-price">Starts from Rs.850</span>
    
  </div>

  <div class="offer-card">
    <img src="resources/delivery.jpg" alt="Offer Image 2">
    <h3>Free delivery on all orders!</h3>
    <p>Enjoy free delivery around colombo areas. No minimum spend required. Limited time offer.</p>
    <span class="offer-price">For Colombo Areas</span>
   
  </div>

  <div class="offer-card">
    <img src="resources/grid1.jpg" alt="Offer Image 2">
    <h3> Lunch specials</h3>
    <p>Free chips and salsa with the purchase of any lunch entree</p>
    <span class="offer-price">  12pm to 3pm</span>
  
  </div>

  <div class="offer-card">
    <img src="resources/populardrink2.jpg" alt="Offer Image 2">
    <h3>10% off all milkshakes!</h3>
    <p>Cool down with a delicious milkshake. 
    Beat the heat with a refreshing milkshake. 
    </p>
    <span class="offer-price">Starts from Rs.350</span>
   
    </div>

 </div>

</section>

<!-- Menu Prompt -->
<section class="menu-introduction">

  <div class="intro-content">
    <h2>Dont Wait, Grab These Offers Now</h2>
    <p>Dive into the world of exquisite flavors and embark on a culinary journey like no other. 
    Every dish we serve has a story, an origin, and a soul of its own.</p>
    <a href="menu.php" class="view-btn">Order Now</a>
  </div>

  <div class="images-grid">
    <img src="resources/grid1.jpg" alt="Dish 1">
    <img src="resources/grid2.jpg" alt="Dish 2">
    <img src="resources/grid3.jpg" alt="Dish 3">
    <img src="resources/grid4.jpg" alt="Dish 4">
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

<!-- CSS Styles-->
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
    background-color: rgba(52, 52, 52);
    border: 1px solid #ddd;
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
    padding: 5px;
    border-bottom: 1px solid #ddd;
    font-size: 14px;
 }

 #cart-items-list li:last-child {
    border-bottom: none;
 }

 /* Additional styling for item name and price */
 #cart-items-list li span {
    display: block; 
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
    display: block;
    text-decoration: none;
    padding: 5px;
    background-color: green; 
    color: white;
    text-align: center;
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

  /* Main Carousel Styles */

  .popular-label {
    font-size: 24px;           
    font-weight: bold;         
    margin-bottom: 20px;       
    color: white;               
    padding-bottom: 10px;     
    padding-top: 25px;
    padding-left: 110px;
    font-family: Georgia, 'Times New Roman', Times, serif;
  }
  
  #carousel-container {
    position: relative;
    width: 100%;
    height: 400px;
    border: none;
    overflow: hidden;
  }
  
  .carousel-slide {
    transition: opacity 0.4s ease-in-out; /* Fade effect */
    opacity: 0; /* Start with all slides invisible */
    position: absolute; /* This stacks slides on top of each other */
    top: 50px;
    
    right: 70px;
    width: 1400px;
    display: block; /* Override 'none' from JavaScript */
  }
  
  .carousel-slide img {
    height: 400px;
    width: 100%;   /* maintain aspect ratio */
    display: block;
    object-fit: cover;  /* This makes sure the images cover the area without distortion */
    object-position: center
  }
  
  .carousel-btn {
    padding: 15px 15px;
   
    border: none;
    background-color: #319e4c;
    color: #fff;
    cursor: pointer;
    border: none;
    border-radius: 25px;
    font-weight: bold;
    text-decoration: none;
  }
   
  #prevBtn:hover, #nextBtn:hover {
  background-color: #424547;
  color: #319e4c; 
  }
  
  .carousel-overlay h3{
    font-size: 35px;
    font-weight: bold; 
  }
  
  .carousel-overlay p{
    font-size: 20px;
    font-weight: normal;
    width: 60%;
    padding-bottom: 10px;  
  }
    
  #prevBtn, #nextBtn {
    position: absolute;
    top: 50%;

    transform: translateY(-50%);
    background-color: transparent;
    color: #fff;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    z-index: 1000;
    padding: 10px 15px;
    font-size: 24px;
    
  }

  
  
  .carousel-overlay {
    position: absolute;
    left: 125px;
    bottom: 100px;
    color: white;
    padding: 5px 10px;
   
  }
  
  #prevBtn {
    left: 10px;
  }
  
  #nextBtn {
    right: 10px;
  }

  #offers-section {
    width: 80%;
    margin: 50px auto;
    text-align: center;
  }

  .offers-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
  }

  #offers-section h2{
  color: white;
  font-family: Georgia, 'Times New Roman', Times, serif;
    font-weight: bold;
  }

  .offer-card {
    background-color: rgba(52, 52, 52, 0.466);
    color: white;
    border: none;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: calc(33.33% - 20px);
    box-sizing: border-box;
    transition: transform 0.3s;
    
  }

  .offer-card:hover {
   transform: scale(1.05);
  }

  .offer-card img {
    width: 235px;
    border-radius: 5px;
  }

  .offer-card h3 {
    margin-top: 15px;
    
  }

  .offer-price {
    color: #1b8241;
    font-weight: bold;
    display: block;
    margin-top: 10px;
  }

  .offer-btn {
    display: inline-block;
    margin-top: 15px;
    padding: 10px 15px;
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s;
  }
 
  .offer-btn:hover {
    background-color: #2980b9;
  }

  /* Menu Section Styles*/

 .intro-content h2{
  font-size: 30px;
  color: white;
  font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
 }

 .intro-content{
 padding-bottom: 100px;
 }

 .menu-introduction {
  display: flex;
  justify-content: space-between; 
  align-items: center;
  padding-top: 20px;
  margin-left: 115px;
  margin-right: 115px;
  color: white;
  border: 1px solid #989696;
  border-left: none;
  border-right: none;
  border-bottom: none;
 }

 .intro-content {
  flex: 1; 
  padding-right: 20px; 
 }

 .images-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr); 
  grid-gap: 10px;

 }

 .images-grid img {
  width: 150px;
  height: auto;
  object-fit: cover;
 }

 .view-btn {
  display: inline-block;
  padding: 10px 20px;
  margin-top: 20px; 
  background-color: rgb(52, 52, 52);;
  color: #fff;
  text-decoration: none;
  border-radius: 5px; 
  transition: background-color 0.3s; 
 }

 .view-btn:hover {
  background-color: #555; 
 }

  /*Contact Form And Other Details */


  footer {
    
  padding: 50px 110px; 
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
  transition: transform 0.3s ease; /* This will make the zoom effect smooth */
  
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

<script src="offersscript.js"></script>

</body>

</html>
