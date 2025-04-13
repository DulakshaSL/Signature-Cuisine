<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
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

  </ul>
  
 </nav>

</header>

<h3 id="titleresult">Search Results</h3>

<!-- Search Form-->
<div class="search-container">
  <form action="searchresult.php" method="get">
    <input type="text" id="searchInput" name="query" placeholder="Search for facilities...">
      <button type="submit">
      <img src="resources/search.png" alt="Search Icon" width="20" height="20">
    </button>
  </form>
  <div id="searchResults" class="search-results"></div>
</div>

<!-- Display Results-->
<?php
 require 'config.php';

 // Check if the "query" key is set in the $_GET array
 if (isset($_GET['query'])) {
    $searchQuery = mysqli_real_escape_string($conn, $_GET['query']);

    $query = "SELECT * FROM facilities WHERE facility_name LIKE '%$searchQuery%' OR description LIKE '%$searchQuery%'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Display search results
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="result-item">';
        echo '<img src="resources/' . $row['image'] . '" alt="' . $row['facility_name'] . '" class="result-image" onclick="submitForm(' . $row['facility_id'] . ')">';
        echo '<div class="result-details">';
        echo '<h3>' . $row['facility_name'] . '</h3>';
        echo '<p>' . $row['description'] . '</p>';
        
        // Link each result to a page (replace "facilities.php" with the actual page)
        echo '<a href="facilities.php?facility_id=' . $row['facility_id'] . '" class="explore-btn">Explore More</a>';
        
        echo '</div>';
        echo '</div>';
    }

    mysqli_close($conn);
  } else {
    // Style the "No search query provided." message
    echo '<div class="no-results-message">';
    echo 'No search query provided.';
    echo '</div>';
  }
?>

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
      <button>Contact Us</button>
     </div>

     <!-- Middle Card -->
     <div class="info-card">
      <img src="resources/customer-service.png" alt="Image 2 Description">
      <h3>Support</h3>
      <p>Get help with your online order</p>
      <button>Get Help</button>
     </div>

     <!-- Right Card -->
     <div class="info-card">
      <img src="resources/received.png" alt="Image 3 Description">
      <h3>Order</h3>
      <p>Track Your Order</p>
      <button>Track</button>
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
    <p>Address: 123 Main St, City, Country</p>
    <p>Contact: (123) 456-7890</p>
    </div>

    <div class="branch other-branch">
     <h4>Other Branch</h4>
     <p>Address: 456 Other St, City, Country</p>
      <p>Contact: (098) 765-4321</p>  
    </div>

  </div>

    <div id="faq">
      <h3>FAQ</h3>
      <p>Questions and answers go here.</p>
      <h4>©2023 Signature Cuisine all rights reserved </h4>
    </div>

  </div>

 </section>

</footer>

<!-- CSS Styles-->
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

 /* Styles for the search container */

 .no-results-message {
    color: white;
    font-size: 16px;
    margin-top: 50px;
    padding-left: 110px;
 }

 .search-container {
    position: relative;
    width: 100%;
    padding-left: 110px;
    padding-bottom: 20px;
    padding-top: 20px;
 }

 #searchInput {
    width: 50%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid grey;
    border-radius: 15px;
    color: white;
    background-color: transparent;
 }

 .search-container button {
    position: relative;
    top: 5px;
    left: 5px;
    padding: 8px 12px;
    padding-left: 10px;
    background-color: #262626;
    color: white;
    border: none;
    border-radius: 25px;
    cursor: pointer;
 }

 /* Hover effect for the search button */
 .search-container button:hover {
    background-color: #45a049;
 }

 .search-results {
    position: absolute;
    width: 48%;
    max-height: 300px;
    overflow-y: auto;

    border: 1px solid grey;
    border-radius: 2px;
    background-color: #212121;

    z-index: 1;
 }

 /* Styles for each search result item */
 .search-result-item {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    cursor: pointer;
    transition: background-color 0.3s ease;
    color: #2980b9;
 }

 .search-result-item:hover {
    background-color: #f5f5f5;
 }



 /* Style for the search results */
 #titleresult{
 padding-left: 110px;
 padding-top: 20px;
 color: white;
 font-size: 22px;
 font-weight: bold;
 }

 .result-item {
    display: flex;
    padding-top: 10px;
    padding-left: 110px;
    padding-bottom: 20px;
 }

 .result-image {
    width: 25%;
    height: auto;
    margin-right: 20px;
 }

 .result-details {
    flex: 1;
    color: white;
    max-width: 50%;
 }

 .result-details h3 {
    font-size: 1.2rem;
    margin-bottom: 10px;
 }

 .result-details p {
    margin-bottom: 10px;
 }

 .explore-btn {
    background-color: #007BFF;
    color: #fff;
    padding: 8px 16px;
    text-decoration: none;
    display: inline-block;
    border-radius: 4px;
    transition: background-color 0.3s;
 }

 .explore-btn:hover {
    background-color: #0056b3;
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


</Style>

<script src="searchfunc.js"></script>


</body>
</html>
