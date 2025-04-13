<?php
session_start();

// Check if the "cart" key exists in the session
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
} else {
    // Initialize an empty cart array
    $cart = array();
}

?>

<!DOCTYPE html>

<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signature Cuisine - Checkout</title>
</head>

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
     <li class="search-icon">
      <a href="searchresult.php">
      <img src="resources/search.png" alt="Search Icon">
      </a>
     </li>

    </ul>
    
 </nav>

</header>

<body>

<div class="checkout-container">

 <div class="checkout-image">
  <img src="resources/reservenow.png" alt="Checkout Image">
 </div>

 <div class="checkout-form">

    <h2>Online Order Checkout</h2>

    <!-- Display the order summary -->
    <?php
     $totalPrice = 0;

      if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
        $price = (float) filter_var($item['price'], FILTER_SANITIZE_NUMBER_FLOAT);
        if (is_numeric($price)) {
        $totalPrice += $price * $item['count'];
           }
         }
        }
    ?>

    <!-- Order Summary -->
    <div class="order-summary">
        <h3>Your Order Summary</h3>
        <ul>
        <?php
        foreach ($cart as $item) {
        echo "<li>" . $item['title'] . " - " . $item['price'] . " x " . $item['count'] . "</li>";
        }
        ?>
        </ul>
    </div>

    <!-- Total Price -->
    <p class="total-price">Total Price: RS.<?php echo number_format($totalPrice, 2); ?></p>

    <!-- Checkout Form -->
    <form action="process_order.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required class="form-field">
        <br><br>
        <label for="address">Address:</label>
        <textarea name="address" rows="4" required class="form-field" id="delivery-address"></textarea>
        <br><br>
        <label for="contact">Contact Number:</label>
        <input type="tel" name="contact" required class="form-field">
        <br><br>
        <label for="payment">Payment Method:</label>
        <select name="payment" required class="form-field">
        <option value="CashOnDelivery">Cash on Delivery</option>
        </select>
        <br><br>

        <!-- Add a hidden input field to store the order data as a JSON string -->
        <input type="hidden" name="orderData" id="orderData" value="">

        <!-- JavaScript to populate the "orderData" field with the order data -->
        <script>
        // Convert the PHP $cart array to a JavaScript array
        const orderData = <?php echo json_encode($cart); ?>;
                
        // Populate the hidden input field with the order data as a JSON string
        document.getElementById("orderData").value = JSON.stringify(orderData);
        </script>

        <div class="btn-container">
        <input type="submit" value="Place Order" class="reserve-btn">
        </div>
    </form>

 </div>

</div>

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
<Style>

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

 h2{
    font-family:'Times New Roman', Times, serif;
  text-align: center;
  text-decoration: underline;
 }

 /* Checkout Container */
 .checkout-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    gap: 100px;
    
 }

 h1{
    color: white;
    font-family:'Times New Roman', Times, serif;
  text-align: center;
  text-decoration: underline;
 }

 /* Checkout Image */
 .checkout-image img {
    max-width: 100%;
    height: auto;
    width: 600px;
    padding-left: 100px;
  
    
 }

 /* Checkout Form */
 .checkout-form {
    width: 35%;
    margin-right: 110px;
    padding: 20px;
    background-color: rgba(52, 52, 52, 0.466);
    color: white;
    border-radius: 10px;
 }

 .order-summary h3 {
    margin: 0;  
    font-size: 17px;
 }

 .total-price {
    font-weight: bold;
    margin-top: 20px;
    color: #319e4c;
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

 .reserve-btn:hover {
    background-color: #555;
 }

 input[type="text"], input[type="email"], input[type="tel"], input[type="date"], input[type="time"], input[type="number"], select, textarea {
    width: 95%;
    padding: 10px;
    background-color: transparent;
    border: 1px solid #989696;
    border-radius: 5px;
    color: white;
    
 }

 /* Style the "Delivery Address" input field */
 #delivery-address {
    width: 95%;
    height: 60px;
    padding: 10px;
    background-color: transparent;
    border: 1px solid #989696;
    border-radius: 5px;
    color: white;
    font-size: 16px;
 }

 /* Online Order Label */
 #online-order-label {
    display: block;
    margin-top: 20px;
    font-weight: bold;
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

</Style>

<script src="menuscript.js"></script>

</body>

</html>
