<?php session_start(); 

 // Check if the user is logged in and their user type is "admin" or "staff"
 if (!isset($_SESSION['loggedin']) || ($_SESSION['usertype'] !== 'admin' && $_SESSION['usertype'] !== 'staff')) {
    
    header('Location: login.php');
    exit();
 }

?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signature Cuisine - Staff Dashboard</title>
  <link rel="stylesheet" href="homepagestyles.css">   
</head>

<body>

<!-- Header -->
<header>

  <div class="logo-container">
    <a href="#"><img src="resources/companylogo.png" alt="Signature Cuisine Logo" class="logoicon"></a>
   <div id="logo">Signature Cuisine Dashboard</div>
  </div>

  <nav>
    <button class="hamburger" id="hamburgerBtn">
     <img src="resources/hamburger.png" alt="Menu">
    </button>
    <ul id="navList">
    
     <li class="account-dropdown">
    <?php if(isset($_SESSION['username'])): ?>
        <a href="#" onclick="toggleDropdown()"><img src="resources/account.png" alt="User Account" class="login-icon"></a>
        <span class="greeting">Hello, <?php echo $_SESSION['username']; ?>!</span>
        <div class="dropdown-content" id="dropdownMenu">
            <a href="specialsignup.php">Create</a>
            <a href="logout.php">Logout</a>
        </div>
    <?php else: ?>
        <a href="#" onclick="toggleDropdown()"><img src="resources/account.png" alt="Login/Register" class="login-icon"></a>
        <div class="dropdown-content" id="dropdownMenu">
            <a href="login.php">Login</a>
            <a href="specialsignup.php">Signup</a>
        </div>
    <?php endif; ?>
   </li>

    </ul>
    
  </nav>

</header>

<!-- Dashboard Cards -->
<section id="dashboard">

 <div class="dashboard-card">
    <h3>Total Queries</h3>
    <p>
    <?php
     // Include your database configuration
    include('config.php');
    // Query to count the total queries
    $queryCountQuery = "SELECT COUNT(*) AS total FROM queries";
    $queryCountResult = mysqli_query($conn, $queryCountQuery);

    if ($queryCountResult) {
     $row = mysqli_fetch_assoc($queryCountResult);
     echo $row['total'];
    } else {
     echo '0';
    }

    ?>
    </p>
 </div>

 <div class="dashboard-card">
    
    <h3>Total Reservations</h3>
    <p>
    <?php
     // Query to count the total reservations
     $reservationCountQuery = "SELECT COUNT(*) AS total FROM reservations";
     $reservationCountResult = mysqli_query($conn, $reservationCountQuery);

     if ($reservationCountResult) {
         $row = mysqli_fetch_assoc($reservationCountResult);
         echo $row['total'];
        } else {
         echo '0';
        }
        ?>
        </p>
  </div>
  
    <div class="dashboard-card">
        <h3>Total Online Orders</h3>
        <p>
            <?php
            // Query to count the total queries
            $queryCountQuery = "SELECT COUNT(*) AS total FROM onlineorders";
            $queryCountResult = mysqli_query($conn, $queryCountQuery);

            if ($queryCountResult) {
                $row = mysqli_fetch_assoc($queryCountResult);
                echo $row['total'];
            } else {
                echo '0';
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </p>
    </div>
    
</section>

<!-- Queries Table-->
<section id="query-list-container">

 <h2>Query List</h2>

 <table id="Querytable">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
        <th>Timestamp</th>
        <th>Feedback</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Include your database configuration
        include('config.php');

        // Query to retrieve queries from the database
        $query = "SELECT * FROM queries ORDER BY timestamp DESC";

        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['message'] . '</td>';
            echo '<td>' . $row['timestamp'] . '</td>';
            echo '<td>' . $row['feedback'] . '</td>';
            echo '</tr>';
            }
        ?>
        </tbody>
    </table>

</section>

<!-- reservations Table -->
<section id="reservation-list-container">

    <h2>Reservation List</h2>
    <table>
        <thead>
            <tr>
             <th>User ID</th>
             <th>Reser ID</th>
             <th>Name</th>
             <th>Email</th>
             <th>Phone</th>
             <th>Date</th>
             <th>Time</th>
             <th>Seats</th>
             <th>Status</th>
             
            </tr>
        </thead>
        <tbody>
            <?php
            // Query to retrieve reservations from the database
            $reservationQuery = "SELECT * FROM reservations ORDER BY date DESC";
            $reservationResult = mysqli_query($conn, $reservationQuery);

            if (!$reservationResult) {
                die("Query failed: " . mysqli_error($conn));
            }

            while ($reservationRow = mysqli_fetch_assoc($reservationResult)) {
                echo '<tr>';
                echo '<td>' . $reservationRow['user_id'] . '</td>';
                echo '<td>' . $reservationRow['id'] . '</td>';
                echo '<td>' . $reservationRow['name'] . '</td>';
                echo '<td>' . $reservationRow['email'] . '</td>';
                echo '<td>' . $reservationRow['phone'] . '</td>';
                echo '<td>' . $reservationRow['date'] . '</td>';
                echo '<td>' . $reservationRow['time'] . '</td>';
                echo '<td>' . $reservationRow['seats'] . '</td>';
                echo '<td>' . $reservationRow['status'] . '</td>';
                echo '</tr>';
            }
            mysqli_close($conn);
            ?>
        </tbody>
    </table>

</section>

<!-- Online Order Table -->
<section id="online-order-list-container">

    <h2>Online Order List</h2>
    <table id="OnlineOrdertable">
        <thead>
            <tr>
             <th>User ID</th>
             <th>Order ID</th>
             <th>Name</th>
             <th>Address</th>
             <th>Contact</th>
             <th>Payment Method</th>
             <th>Order Details</th>
             <th>Total Price</th>
             <th>Timestamp</th>
             <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Include your database configuration
            include('config.php');

            // Query to retrieve online orders from the database
            $query = "SELECT * FROM onlineorders ORDER BY created_at DESC";

            $result = mysqli_query($conn, $query);

            if (!$result) {
                die("Query failed: " . mysqli_error($conn));
            }

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['user_id'] . '</td>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['address'] . '</td>';
                echo '<td>' . $row['contact'] . '</td>';
                echo '<td>' . $row['paymentMethod'] . '</td>';
                

                // Parse JSON strings and combine titles and quantities
                $titles = json_decode($row['titles']);
                $quantities = json_decode($row['quantities']);

                $orderDetails = '';

                for ($i = 0; $i < count($titles); $i++) {
                    $orderDetails .= $titles[$i] . ' x' . $quantities[$i] . '<br>';
                }

                echo '<td>' . $orderDetails . '</td>';
                echo '<td>' . $row['total_price'] . '</td>';
                echo '<td>' . $row['created_at'] . '</td>';
                echo '<td>' . $row['status'] . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>

</section>

<!-- Footer -->
<footer id="footer">

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
    margin: 0;
    padding: 0;
    background-color: #1e1e1e;
    overflow-x: hidden;
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
  width: 30px;      /* or any suitable width */
  height: auto;     /* or any suitable height */
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

 #dashboard {
    display: flex;
    gap: 100px;
    justify-content: center;
    margin-top: 20px;   
 }

 .dashboard-card {
    width: 200px;
    background-color: rgba(52, 52, 52, 0.466);
    border: 1px solid grey;
    color: white;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    padding: 20px;
    text-align: center;   
 }

 .dashboard-card h3 {
    font-size: 1.2rem;
    margin-bottom: 10px;
 }

 /* Style the query list container */
 #query-list-container h2, #online-order-list-container h2 {
 padding-top: 20px;
 font-size: 20px;
 border: 1px solid gray;
 border-left: none;
 border-right: none;
 border-bottom: none;
 }

 #reservation-list-container h2{
 padding-top: 20px;
 font-size: 20px;
 border: 1px solid gray;
 border-left: none;
 border-right: none;
 border-bottom: none;
 }

 #query-list-container, #reservation-list-container, #online-order-list-container{
    padding-left: 120px;
    padding-right: 120px;
    padding-bottom: 25px;
    padding-top: 25px;
 }


 #reservation-list-container form, #online-order-list-container form {
    display: flex;    
 }

 #query-list-container form {
    display: flex;
   
 }

 #reservation-list-container select, #online-order-list-container select  {
    padding: 8px;
    margin-right: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #393b39;
    color: white;
 }

 /* Style the select dropdown */
 #query-list-container select {
    padding: 8px;
    margin-right: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #393b39;
    color: white;
 }

 /* Style the update button */
 #reservation-list-container button, #online-order-list-container button {
    padding: 3px 12px;
    background-color: #39506e;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
 }

 #query-list-container button {
    padding: 3px 12px;
    background-color: #39506e;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
 }

 /* Style the update button on hover */
 #reservation-list-container button:hover {
    background-color: #2977ac;
 }

 #query-list-container button:hover {
    background-color: #2977ac;
 }


 #Querytable{
    width: 100%;
    border-collapse: collapse;
     
 }

 table {
    width: 100%;
    border-collapse: collapse;   
 }

 table th, td {
    border: 1px solid #000; 
    padding: 8px;
    text-align: left;
 }

 /* Style table header */
 thead {
    background-color: #39506e;
    color: #fff;
 }

 thead th {
    padding: 10px;
 }

 /* Style table rows */
 tbody tr:nth-child(odd) {
    background-color: #353836;
    color: white;
 }

 tbody tr:nth-child(even) {
    background-color: #575957;
    color: white;
 }

 tbody td {
    padding: 10px;
 }

 /* Add hover effect to table rows */
 tbody tr:hover {
    background-color: green;
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

<script src="homepagescript.js"></script>

</body>

</html>
