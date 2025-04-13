<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signature Cuisine - Homepage</title>
  <link rel="stylesheet" href="homepagestyles.css">
    
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

<!-- Main Carousel -->
<section id="carousel">

 <div id="carousel-container">

   <div class="carousel-slide">
     <img src="resources/mainslide1.jpg" alt="Popular Dish">
    <div class="carousel-overlay">
     <h3>Delicious Dishes</h3>
     <p>
      Satisfy your cravings with our delicious dishes, 
      made with fresh, high-quality ingredients.
    </p>
    <a href="menu.php" class="carousel-btn">Explore More</a>
    </div>
  </div>
            
   <div class="carousel-slide">
     <img src="resources/mainslide2.jpg" alt="Ambiance Photo">
     <div class="carousel-overlay">
     <h3>Our Elegant Ambiance</h3>
     <p>
      Experience our elegant ambiance and 
      enjoy a truly memorable dining experience.
     </p>
     <a href="gallery.php" class="carousel-btn">Take a Tour</a>
    </div>
   </div>

   <div class="carousel-slide">
     <img src="resources/mainslide3.jpg" alt="Promotion Photo">
    <div class="carousel-overlay">
     <h3>Limited-time offers</h3>
     <p>
     Don't miss out on our limited time offers! 
     Get up to 50% off on selected items.
     </p>
     <a href="offers.php" class="carousel-btn">Grab 'em</a>
   </div>
    
  </div>
        
    <button id="prevBtn">&#10094;</button>
    <button id="nextBtn">&#10095;</button>
 </div>

</section>

<!-- Features -->
<section id=features>

 <h2 class="section-featurestitle">What We Offer</h2>

 <div class="container">
    <div class="features-card">
      <img src="resources/feature1.png" alt="">
      <h3>Master Chefs</h3>
      <p>A Master Chef is a professional cook who has reached the highest level of culinary skill and expertise.</p>
    </div>

    <div class="features-card">
      <img src="resources/feature2.png" alt="">
      <h3>Quality Food</h3>
      <p>Quality food is not just about taste, but also about nutritional value, safety, and sustainability.</p>
    </div>

    <div class="features-card">
      <img src="resources/feature3.png" alt="">
      <h3>Online Order</h3>
      <p>Online ordering refers to the process of placing an order for goods or services using the device.</p>
    </div>
    
 </div>

</section>

<!-- About Us -->
<h2 class="section-title">About Us</h2>
<section id="about-us">

 <div class="about-container">
    <img src="resources/about.jpg" alt="About Us" class="about-img">

   <div class="about-text">
     <h3>Our Story</h3>
     <p>We began our journey in 2000 with a vision to bring world-class cuisine to the heart of the city. 
      Over the years, Signature Cuisine has become a landmark for culinary excellence, receiving numerous accolades and awards.</p>
     <h3>Our Commitment</h3>
     <p>At Signature Cuisine, we're dedicated to sourcing the finest ingredients, crafting exquisite dishes, and delivering an unparalleled dining experience for every customer who walks through our doors.</p>
     <a href="overview.php" class="learn-more">Learn More</a>
   </div>

 </div>

</section>

<!-- Reservation CTA -->
<section id="reservation-cta">
  <h2>Experience Signature Delicacies</h2>
  <p>Reserve your table now and immerse yourself in a culinary journey.</p>
  <a href="reservation.php"><button id="reserve-now">Reserve Now</button></a> 
</section>

<!-- Testimonials -->
<section id="testimonials-section">

  <h2>What Our Guests Say</h2>

  <div id="testimonials-carousel">

   <div class="testimonials-slide" id="testimonial1">
    <p>"This is the best dining experience I've ever had. The ambiance and the food were just amazing!"</p>
    <h4>- Jane Doe</h4>
   </div>

    <div class="testimonials-slide" id="testimonial2">
     <p>"Signature Cuisine is top-notch! I recommend it to all my friends."</p>
     <h4>- John Smith</h4>
    </div>
    
    <button id="prevTestimonial">&#10094;</button>
    <button id="nextTestimonial">&#10095;</button>

  </div>

</section>

<!-- Exclusive Offers -->
<section id="exclusive-offers">

  <h2>Exclusive Offers</h2>

  <div class="offers-container">

   <!-- Card 1 -->
   <div class="offer-card">
    <img src="resources/specialoffer.jpeg" alt="Offer Image 1">
    <h3>50% off all pizzas</h3>
    <p>Satisfy your pizza cravings for half the price with our limited time offer: 
    50% off all pizzas! Treat yourself without breaking the bank.</p>
    <span class="price">$99.99</span>
   </div>

   <!-- Card 2 -->
   <div class="offer-card">
     <img src="resources/getonefree.jpeg" alt="Offer Image 2">
     <h3>Buy one, get one free</h3>
     <p>Double your burger fun with our Buy one, get one free on all burgers offer! 
      This offer is valid for a limited time only, so don't miss!</p>
     <span class="price">$79.99</span>
   </div>

   <!-- Card 3 -->
   <div class="offer-card">
    <img src="resources/earlybird.jpeg" alt="Offer Image 3">
    <h3>Early bird specials</h3>
    <p>Save money on a delicious meal and beat the rush with our early bird specials. 
     Available from 4pm to 7pm.</p>
    <span class="price">$89.99</span>
   </div>

  </div>

   <div class="view-all-btn-container">
    <a href="offers_page.php" class="view-all-btn">View All</a>
   </div>

</section>

<!-- Menu -->
<section class="menu-introduction">

  <div class="intro-content">
    <h2>Discover Our Menu</h2>
    <p>Dive into the world of exquisite flavors and embark on a culinary journey like no other. 
    Every dish we serve has a story, an origin, and a soul of its own.</p>
    <a href="menu.php" class="view-btn">View All</a>
  </div>

  <div class="images-grid">
    <img src="resources/grid1.jpg" alt="Dish 1">
    <img src="resources/grid2.jpg" alt="Dish 2">
    <img src="resources/grid3.jpg" alt="Dish 3">
    <img src="resources/grid4.jpg" alt="Dish 4">
  </div>

</section>

<!-- Popular Dishes Carousel -->
<section id="dishes-section">
  <h2 class="popular-label">Most Popular Dishes From Our Menu</h2>

  <div class="dishes-slide">
    
    <!-- Dish 1 (first card) -->
    <div class="card">
     <button class="arrow prevDish">&#10094;</button>
     <img src="" alt="Dish 1" class="card-image">
     <h3 class="card-title"></h3>
     <p class="card-price"></p>
    </div>

    <!-- Dish 2 (middle card) -->
    <div class="card">
      <img src="" alt="Dish 2" class="card-image">
      <h3 class="card-title"></h3>
      <p class="card-price"></p>
    </div>

    <!-- Dish 3 with Next button -->
    <div class="card">
      <img src="" alt="Dish 3" class="card-image">
      <h3 class="card-title"></h3>
      <p class="card-price"></p>
      <button class="arrow nextDish">&#10095;</button>
    </div>

  </div>

</section>

<!-- Popular Drinks Carousel -->
<section id="drinks-section">
 <h2 class="popular-label">Most Popular Beverages From Our Menu</h2>

 <div class="drinks-slide">
  
  <!-- Drink 1 (first card) -->
  <div class="card">
   <button class="arrow prev">&#10094;</button>
   <img src="" alt="Drink 1" class="card-image">
   <h3 class="card-title"></h3>
   <p class="card-price"></p>
  </div>

    <!-- Drink 2 (middle card) -->
  <div class="card">
   <img src="" alt="Drink 2" class="card-image">
   <h3 class="card-title"></h3>
   <p class="card-price"></p>
  </div>

    <!-- Drink 3 with Next button -->
  <div class="card">
   <img src="" alt="Drink 3" class="card-image">
   <h3 class="card-title"></h3>
   <p class="card-price"></p>
   <button class="arrow next">&#10095;</button>
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

<script src="homepagescript.js"></script>

</body>

</html>
