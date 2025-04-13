<?php


session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are set
    if (isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['confirmPassword'])) {
        
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error_field'] = 'email';
            $_SESSION['error_message'] = 'Invalid email format!';
            header('Location: signup.php');
            exit();
        }

        // Validate username
        if (empty($username) || strlen($username) < 4) {
            $_SESSION['error_field'] = 'username';
            $_SESSION['error_message'] = 'Username must be at least 4 characters long!';
            header('Location: signup.php');
            exit();
        }
        
        // Check if username is only numbers
        if (ctype_digit($username)) {
            $_SESSION['error_field'] = 'username';
            $_SESSION['error_message'] = 'Username cannot be only numbers!';
            header('Location: signup.php');
            exit();
        }

        // Check if email or username already exists
        $stmt = mysqli_prepare($conn, 'SELECT email, username FROM users WHERE email = ? OR username = ?');
        mysqli_stmt_bind_param($stmt, 'ss', $email, $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        
        if (mysqli_stmt_num_rows($stmt) > 0) {
            mysqli_stmt_bind_result($stmt, $db_email, $db_username);
            mysqli_stmt_fetch($stmt);
            
            if ($db_email == $email) {
                $_SESSION['error_field'] = 'email';
                $_SESSION['error_message'] = 'User with that email address already exists!';
                header('Location: signup.php');
                exit();
            }

            if ($db_username == $username) {
                $_SESSION['error_field'] = 'username';
                $_SESSION['error_message'] = 'Username already taken!';
                header('Location: signup.php');
                exit();
            }
        }

        // Check if passwords match
        if ($password !== $confirmPassword) {
            $_SESSION['error_field'] = 'password';
            $_SESSION['error_message'] = 'Passwords don\'t match!';
            header('Location: signup.php');
            exit();
        }

        // Additional security: Check password strength (optional but recommended)
        if (strlen($password) < 8) {
            $_SESSION['error_field'] = 'password';
            $_SESSION['error_message'] = 'Password should be at least 8 characters!';
            header('Location: signup.php');
            exit();
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the new user into the database
        $stmt = mysqli_prepare($conn, 'INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
        mysqli_stmt_bind_param($stmt, 'sss', $username, $email, $hashedPassword);
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
            alert('Account created successfully!');
            window.location.href = 'login.php';
          </script>";
        } else {
            $_SESSION['error_field'] = 'general';
            $_SESSION['error_message'] = 'There was an error: ' . mysqli_error($conn);
            header('Location: signup.php');
            exit();
        }
        
    } else {
        $_SESSION['error_field'] = 'general';
        $_SESSION['error_message'] = 'Please fill all the fields!';
        header('Location: signup.php');
        exit();
    }
}
?>
