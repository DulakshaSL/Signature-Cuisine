<?php

 session_start();
 require 'config.php';

 if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
 }

 $user_id = $_SESSION['user_id'];

 // Fetch user details
 $stmt = mysqli_prepare($conn, 'SELECT email, username FROM users WHERE id = ?');
 mysqli_stmt_bind_param($stmt, 'i', $user_id);
 mysqli_stmt_execute($stmt);
 mysqli_stmt_bind_result($stmt, $email, $username);
 mysqli_stmt_fetch($stmt);
 mysqli_stmt_close($stmt);

 // Fetch reservations for the user
 $sql = "SELECT id, date, time, seats, status FROM reservations WHERE user_id = ?";
 $stmt = mysqli_prepare($conn, $sql);
 mysqli_stmt_bind_param($stmt, "i", $user_id);
 mysqli_stmt_execute($stmt);
 $result = mysqli_stmt_get_result($stmt);

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="profilestyles.css">
    <!-- Add relevant CSS links here -->
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

<!-- Profile Section -->
<div class="profile-page">

 <!-- Left side features -->
 <div class="features-container">
    <a href="#" id="showProfile">My Details</a>
    <a href="#" id="togglePassword">Change Password</a>
    <a href="#" id="showReservations">View Reservation</a>
    <a href="show_orders.php">View Orders</a>
 </div>

 <div class="profile-container" id="profileContent">
    <h2>Account Data</h2>
    <p><strong>Email:</strong> <?php echo $email; ?></p>
    <p><strong>Username:</strong> <?php echo $username; ?></p>   
 </div>

 <div class="change-password-container" id="changePasswordContent" style="display:none;">
    
  <h2>Change Password</h2>

  <form action="change_password_action.php" method="post">
    <div class="input-group">
     <label for="currentPassword">Current Password:</label>
     <input type="password" id="currentPassword" name="currentPassword" required>
    </div>
        
    <div class="input-group">
     <label for="newPassword">New Password:</label>
      <input type="password" id="newPassword" name="newPassword" required>
    </div>

    <div class="input-group">
     <label for="confirmNewPassword">Confirm New Password:</label>
      <input type="password" id="confirmNewPassword" name="confirmNewPassword" required>
    </div>

     <button type="submit">Update Password</button>
  </form>

 </div>


 <div class="reservationscontent" id="reservationsContainer" style="display: none;">
    
  <table>
    <thead>
     <tr>
        <th>Reservation ID</th>
        <th>Date</th>
        <th>Time</th>
        <th>Seats</th>
        <th>Status</th>
     </tr>
    </thead>
    <tbody id="reservationsList">
        <?php 
        // Generate the table rows for the reservations
        if (isset($result) && $result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>"; 
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['time'] . "</td>";
            echo "<td>" . $row['seats'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "</tr>";
           }
        }
        ?>
    </tbody>
   </table>

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

<script src="profilescript.js"></script>

</body>

</html>
