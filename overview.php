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

<!-- Overview Main Content -->
<section class="overview-section">

  <div class="overview-text">
    <h1>Welcome to Signature Cuisine</h1>
    <p>Since our establishment in 2000, Signature Cuisine has been offering a blend of traditional and innovative dishes.
    Overlooking the pristine southern coast of beautiful Sri Lanka, 
    Signature Cuisine Hambantota is located along the ancient Spice Route in a city steeped in rich history. 
    Hambantota is known for its natural beauty and allows visitors to explore Asia’s fascinating 
    nature and wildlife sanctuaries.  
    Our mission is to provide an unforgettable dining experience.</p>
    <a href="menu.php" class="cta-button">Explore Our Menu</a>
  </div>

  <div class="overview-images">
    <img src="resources/restaurant.jpg" alt="Dish 1">
    <img src="resources/populardish1.jpg" alt="Dish 2">
    <img src="resources/conference_rooms.jpg" alt="Dish 3">
    <img src="resources/grid4.jpg" alt="Dish 4">
  </div>

</section>

<!-- Explore More Section -->
<section class="explore-section">

  <!-- First content block with image on the left -->
  <div class="explore-content">
    <img src="resources/explorearound.jpg" alt="Explore Image 1" class="explore-image">
    <div class="explore-text">
    <h3>Explore Hambantota</h3>
    <p>Our main branch is loacated in Hambantona which is a one-of-a-kind town that allows visitors to experience natural beauty and wildlife, 
    historic colonial architecture, expansive salt flats and heritage sites including dagobas and viharas.  
    Approximately 200 kilometres south of Sri Lanka's capital, Colombo, Hambantota borders 
    the sacred city of Kataragama and Udawalawe National Park.</p>
    
    </div>
  </div>

    <!-- Second content block with image on the right -->
  <div class="explore-content reverse">
     <img src="resources/fitness_center.jpg" alt="Explore Image 2" class="explore-imagesecond">
     <div class="explore-textsecond">
     <h3>Services and Facilities</h3>
     <p>Our dedicated and experienced team caters to the needs of guests with an extensive range of services and facilities. 
      If you require any service not listed here, 
      please contact us and we will do our very best to assist in any way we can. </p>
     <a href="facilities.php" class="explore-btn">Explore More</a>
     </div>
  </div>

</section>

<section class="explore-section">

  <!-- First content block with image on the left -->
  <div class="explore-content">
    <img src="resources/Exlusive.jpeg" alt="Explore Image 1" class="explore-image">
    <div class="explore-text">
    <h3>Exclusive offers for our loyal customers!</h3>
    <p>At Signature Cuisisne, we love to reward our loyal customers. 
      That's why we're offering a variety of exclusive offers on our website. 
      Whether you're looking for a discount on your next meal or a free dessert, 
      we have something for everyone</p>
    <a href="offers.php" class="explore-btn">Explore More</a>
    </div>
  </div>

</section>

<section class="menu-introduction">

  <div class="intro-content">
    <h2>Make a reservation today!</h2>
    <p>
      Making a reservation at Signature Cuisine is now easier than ever! You can now make a reservation online, through our website. 
      To make a reservation, simply visit our website and click on the "Make a Reservation" button. 
       You will be able to select your preferred date, time, and number of guests. </p>
    <a href="reservation.php" class="view-btn">Book Now</a>
    </div>

  <div class="images-grid">
    <img src="resources/reservenow.png" alt="Dish 1">
   
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
    color: #319e4c; /* adjust this value as desired */
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

  .explore-section {
    margin: 40px 0;
    
  }

  .explore-content {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 40px;
    padding-left: 120px;
    padding-right: 90px;
  }

  .explore-image {
    width: 30%;
    height: auto;
    padding-right: 10px;
    border-radius: 5px;
    
  }

  .explore-imagesecond {
    width: 30%;
    height: auto;
    padding-right: 10px;
    border-radius: 15px;  
  }

  .explore-text {
    width: 55%;
    color: white;
  }

  .explore-textsecond{
    width: 55%;
    color: white;
    padding-right: 110px;
    
  }

  .explore-text h3{
   font-size: 27px;
   font-family: Georgia, 'Times New Roman', Times, serif;
   font-weight:bold;
  }

  .explore-textsecond h3{
   font-size: 27px;
   font-family: Georgia, 'Times New Roman', Times, serif;
   font-weight:bold;
  }

  .explore-btn {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 15px;
    background-color: #333;
    color: #fff;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s;
  }

  .explore-btn:hover {
    background-color: #555;
  }

  .reverse {
    flex-direction: row-reverse;
    padding-left: 50px;
  }

  .menu-introduction {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 40px 0;
  margin-left: 115px;
  margin-right: 115px;
  color: white;
  border: 1px solid #989696;
  border-left: none;
  border-right: none;
  border-bottom: none;
 }

 .intro-content {
  flex: 1; /* This takes up half the space */
  padding-right: 20px; 
 }

 

 .images-grid img {
  width: 350px;
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

 .view-all-btn-container {
  text-align: center;
 }

 .view-all-btn {
  display: inline-block;
  padding: 10px 20px;
  margin-bottom: 25px;
  background-color: rgb(52, 52, 52);;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  text-decoration: none;
  transition: background-color 0.3s ease;
 }

 .intro-content h2{
  font-size: 30px;
  color: white; 
  font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
 }


 .view-all-btn:hover {
  background-color: #555; 
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

</body>

</html>
