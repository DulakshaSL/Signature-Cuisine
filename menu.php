<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Signature Cuisine - Overview</title>
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
     <div class="cart-icon" onmouseover="showCartDetails()" onmouseout="hideCartDetails()">
      <img src="resources/shopping-bag(1).png" alt="Cart Icon">
      <span id="cart-count">0</span>
     </div>
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

<!-- Overview Content -->
<section class="overview-section">

  <div class="overview-text">
   <h1>Our Menu</h1>
   <p>At Signature Cuisine, we pride ourselves in serving dishes that tell a story. 
    Each item on our menu is a reflection of the rich culinary heritage of our roots, 
    combined with the vibrant flavors of modern gastronomy. Sourced from local farmers and fishermen, 
    our ingredients promise freshness in every bite. 
    Dive into our curated selection and embark on a delightful culinary journey.</p>
    
  </div>

  <div class="overview-images">
    <img src="resources/grid1.jpg" alt="Dish 1">
    <img src="resources/grid2.jpg" alt="Dish 2">
    <img src="resources/grid3.jpg" alt="Dish 3">
    <img src="resources/grid4.jpg" alt="Dish 4">
  </div>

</section>

<!-- First Dishes Carousel -->
<section id="dishes-section">

  <h2 class="popular-label">Dishes</h2>

  <div class="dishes-slide">
    
    <!-- Dish 1 (first card) -->
    <div class="card">
     <button class="arrow prevDish">&#10094;</button>
     <img src="" alt="Dish 1" class="card-image">
     <h3 class="card-title"></h3>
     <p class="card-price"></p>
    <button class="add-to-cart" data-item-id="1" data-item-name="Item Name" data-item-price="10.99">
     <img src="resources/add-to-cart.png" alt="Add to Cart">
    </button>

    </div>

    <!-- Dish 2 (middle card) -->
    <div class="card">
      <img src="" alt="Dish 2" class="card-image">
      <h3 class="card-title"></h3>
      <p class="card-price"></p>
      <button class="add-to-cart" data-item-id="1" data-item-name="Item Name" data-item-price="10.99">
       <img src="resources/add-to-cart.png" alt="Add to Cart">
     </button>
    </div>

    <!-- Dish 3 with Next button -->
    <div class="card">
      <img src="" alt="Dish 3" class="card-image">
      <h3 class="card-title"></h3>
      <p class="card-price"></p>
      <button class="arrow nextDish">&#10095;</button>
      <button class="add-to-cart" data-item-id="1" data-item-name="Item Name" data-item-price="10.99">
       <img src="resources/add-to-cart.png" alt="Add to Cart">
     </button>
    </div>
    
  </div>

</section>

<!-- Dishes Carousel Second -->
<section id="menu-highlight-section">
  
  <div class="menu-carousel">
    
    <!-- Dish 1 (first card) -->
    <div class="menu-card">
     <button class="carousel-arrow prevItem">&#10094;</button>
     <img src="" alt="Item 1" class="menu-card-image">
     <h3 class="menu-card-title"></h3>
     <p class="menu-card-price"></p>
     <button class="add-to-cart" data-item-id="1" data-item-name="Item Name" data-item-price="10.99">
       <img src="resources/add-to-cart.png" alt="Add to Cart">
     </button>
    </div>

    <!-- Dish 2 (middle card) -->
    <div class="menu-card">
      <img src="" alt="Item 2" class="menu-card-image">
      <h3 class="menu-card-title"></h3>
      <p class="menu-card-price"></p>
      <button class="add-to-cart" data-item-id="1" data-item-name="Item Name" data-item-price="10.99">
       <img src="resources/add-to-cart.png" alt="Add to Cart">
     </button>
    </div>

    <!-- Dish 3 with Next button -->
    <div class="menu-card">
      <img src="" alt="Item 3" class="menu-card-image">
      <h3 class="menu-card-title"></h3>
      <p class="menu-card-price"></p>
      <button class="add-to-cart" data-item-id="1" data-item-name="Item Name" data-item-price="10.99">
       <img src="resources/add-to-cart.png" alt="Add to Cart">
     </button>
      <button class="carousel-arrow nextItem">&#10095;</button>
    </div>
  </div>

</section>

<!-- First Drinks Carousel  -->
<section id="drinks-section">

 <h2 class="popular-label">Non-alcoholic beverages </h2>

 <div class="drinks-slide">
    
  <!-- Drink 1 (first card) -->
  <div class="card">
    <button class="arrow prev">&#10094;</button>
    <img src="" alt="Drink 1" class="card-image">
    <h3 class="card-title"></h3>
    <p class="card-price"></p>
    <button class="add-to-cart" data-item-id="1" data-item-name="Item Name" data-item-price="10.99">
       <img src="resources/add-to-cart.png" alt="Add to Cart">
     </button>
  </div>

    <!-- Drink 2 (middle card) -->
  <div class="card">
    <img src="" alt="Drink 2" class="card-image">
    <h3 class="card-title"></h3>
    <p class="card-price"></p>
    <button class="add-to-cart" data-item-id="1" data-item-name="Item Name" data-item-price="10.99">
       <img src="resources/add-to-cart.png" alt="Add to Cart">
     </button>
  </div>

    <!-- Drink 3 with Next button -->
  <div class="card">
    <img src="" alt="Drink 3" class="card-image">
    <h3 class="card-title"></h3>
    <p class="card-price"></p>
    <button class="arrow next">&#10095;</button>
    <button class="add-to-cart" data-item-id="1" data-item-name="Item Name" data-item-price="10.99">
       <img src="resources/add-to-cart.png" alt="Add to Cart">
     </button>
  </div>

 </div>

</section>

<!-- Second Drinks Carousel -->
<section id="beverages-section">

  <h2 class="beverage-label">Alcoholic beverages </h2>

  <div class="beverage-slide">
    
    <!-- Beverage 1 (first card) -->
    <div class="beverage-card">
      <button class="beverage-arrow beverage-prev">&#10094;</button>
      <img src="" alt="Beverage 1" class="beverage-image">
      <h3 class="beverage-title"></h3>
      <p class="beverage-price"></p>
      <button class="add-to-cart" data-item-id="1" data-item-name="Item Name" data-item-price="10.99">
       <img src="resources/add-to-cart.png" alt="Add to Cart">
     </button>
    </div>

    <!-- Beverage 2 (middle card) -->
    <div class="beverage-card">
      <img src="" alt="Beverage 2" class="beverage-image">
      <h3 class="beverage-title"></h3>
      <p class="beverage-price"></p>
      <button class="add-to-cart" data-item-id="1" data-item-name="Item Name" data-item-price="10.99">
       <img src="resources/add-to-cart.png" alt="Add to Cart">
     </button>
    </div>

    <!-- Beverage 3 with Next button -->
    <div class="beverage-card">
      <img src="" alt="Beverage 3" class="beverage-image">
      <h3 class="beverage-title"></h3>
      <p class="beverage-price"></p>
      <button class="beverage-arrow beverage-next">&#10095;</button>
      <button class="add-to-cart" data-item-id="1" data-item-name="Item Name" data-item-price="10.99">
       <img src="resources/add-to-cart.png" alt="Add to Cart">
     </button>
    </div>

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

  /* Style for the button */
 .add-to-cart {
    display: inline-block;
    position: relative;
    justify-items: right;
    padding: 5px 10px;
    background-color: transparent;
    /* Green background color, change as needed */
    /* White text color, change as needed */
    border: none;
    border-radius: 25px;
    cursor: pointer;
    left: 330px;
    bottom: 10px;
  }

  /* Style for the image within the button */
  .add-to-cart img {
    width: 42px; /* Adjust the width of the image as needed */ /* Adjust the height of the image as needed */
    margin-right: 5px; /* Add some spacing between the image and text, if needed */
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

  .overview-section {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 50px;
    padding-left: 90px;
    padding-right: 100px;
    background-color: #1e1e1e;
    color: white;
  }

  .overview-text {
    position: relative;
    bottom: 30px;
    flex: 1;
    padding: 20px;
  }

  .overview-text h1 {
    font-size: 34px;
    margin-bottom: 20px;
    font-family: Georgia, 'Times New Roman', Times, serif;
    font-weight:bold;
  }

  .overview-text p {
    font-size: 1.2rem;
    margin-bottom: 20px;
  }

  .overview-images {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
  }

  .overview-images img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border-radius: 5px;
  }

  .cta-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: rgb(52, 52, 52);
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
  }

  .cta-button:hover {
    background-color: #555;
  }


  .dishes-slide {
    display: flex;
    justify-content: space-between;
    padding: 0 100px;  
  }
  
  .drinks-slide{
    display: flex;
    justify-content: space-between;
    padding: 0 100px;  
  
  }
  
  .card {
    position: relative;
    flex-basis: calc(33.33% - 20px); 
    margin: 10px; 
    border: none;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    box-sizing: border-box; 
    transition: 0.3s; 
    background-color: rgba(52, 52, 52, 0.466);
    padding: 15px; 
    transition: transform 0.3s ease; 
    overflow: hidden; 
  }
  
  .card:hover {
    transform: scale(1.05); 
    background-color: #3a3a3aca;
    
  }
  
  .card-image {
    max-width: 75%;
    height: auto;
    border: none;
    border-radius: 5px;
    max-height: 200px; 
    object-fit: cover;
    object-position: center;
    display: block;  
    margin-left: auto;  
    margin-right: auto; 
  }
  
  .card .card-title{
    color: white;
    
  }
  
  .card .card-price{
    color: white;
    
  }

  .arrow {
    position: absolute;
    background-color: transparent;
    border: none;
    border-radius: 15px;
    font-size: 24px;
    padding: 5px 10px;
    cursor: pointer;
    z-index: 10;  
    color: white;
  }
  
  
  .prevDish, .prev {
    top: 50%;
    left: 15px; 
    transform: translateY(-50%);
  }
  
  .nextDish, .next {
    top: 50%;
    right: 15px; 
    transform: translateY(-50%);
  }
  
  
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

  .menu-carousel {
    display: flex;
    justify-content: space-between;
    padding: 0 100px;  
  }
  
  .menu-card {
    position: relative;
    flex-basis: calc(33.33% - 20px); 
    margin: 10px; 
    border: none;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    box-sizing: border-box; 
    transition: 0.3s; 
    background-color: rgba(52, 52, 52, 0.466);
    padding: 15px; 
    transition: transform 0.3s ease; 
    overflow: hidden; 
  }
  
  .menu-card:hover {
    transform: scale(1.05); 
    background-color: #3a3a3aca;
    
  }
  
  .menu-card-image {
    max-width: 75%;
    height: auto;
    border: none;
    border-radius: 5px;
    max-height: 200px; 
    object-fit: cover;
    object-position: center;
    display: block;  
    margin-left: auto;  
    margin-right: auto; 
  }
  
  .menu-card .menu-card-title{
    color: white;
    
  }
  
  .menu-card .menu-card-price{
    color: white;
    
  }
  
  .carousel-arrow {
    position: absolute;
    background-color: transparent;
    border: none;
    border-radius: 15px;
    font-size: 24px;
    padding: 5px 10px;
    cursor: pointer;
    z-index: 10;  
    color: white;
  }
  
  .prevItem {
    top: 50%;
    left: 15px; 
    transform: translateY(-50%);
  }
  
  .nextItem {
    top: 50%;
    right: 15px; 
    transform: translateY(-50%);
  }

  .beverage-slide {
    display: flex;
    justify-content: space-between;
    padding: 0 100px;  
  }
  
  .beverage-card {
    position: relative;
    flex-basis: calc(33.33% - 20px); 
    margin: 10px; 
    border: none;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    box-sizing: border-box; 
    transition: 0.3s; 
    background-color: rgba(52, 52, 52, 0.466);
    padding: 15px; 
    transition: transform 0.3s ease; 
    overflow: hidden; 
  }
  
  .beverage-card:hover {
    transform: scale(1.05);
    background-color: #3a3a3aca;
  }
  
  .beverage-image {
    max-width: 75%;
    height: auto;
    border: none;
    border-radius: 5px;
    max-height: 200px; 
    object-fit: cover;
    object-position: center;
    display: block;
    margin-left: auto;
    margin-right: auto;
  }
  
  .beverage-card .beverage-title {
    color: white;
  }
  
  .beverage-card .beverage-price {
    color: white;
  }
  
  .beverage-arrow {
    position: absolute;
    background-color: transparent;
    border: none;
    border-radius: 15px;
    font-size: 24px;
    padding: 5px 10px;
    cursor: pointer;
    z-index: 10;
    color: white;
  }
  
  .beverage-prev {
    top: 50%;
    left: 15px;
    transform: translateY(-50%);
  }
  
  .beverage-next {
    top: 50%;
    right: 15px;
    transform: translateY(-50%);
  }

  .beverage-label{
    font-size: 24px;           
    font-weight: bold;         
    margin-bottom: 20px;       
    color: white;               
    padding-bottom: 10px;     
    padding-top: 25px;
    padding-left: 110px;
    font-family: Georgia, 'Times New Roman', Times, serif;
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

<script src="menuscript.js"></script>

</body>

</html>
