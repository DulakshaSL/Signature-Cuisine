<?php

require 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = mysqli_prepare($conn, 'SELECT id, username, password, type FROM users WHERE email = ?');
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $db_user_id, $db_username, $db_password, $user_type);
    mysqli_stmt_fetch($stmt);

    if ($db_password) {
        if (password_verify($password, $db_password)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $db_username;
            $_SESSION['user_id'] = $db_user_id;
            $_SESSION['usertype'] = $user_type;
            
            // Check the user type to determine the appropriate redirection
            if ($user_type == 'customer') {
                header('Location: homepage.php');
            } elseif ($user_type == 'staff') {
                header('Location: staffdashboard.php');
            } elseif ($user_type == 'admin') {
                header('Location: admindashboard.php');
            }
            exit();
        } else {
            $_SESSION['passwordError'] = "Incorrect password!";
            header('Location: login.php');
            exit();
        }
    } else {
        $_SESSION['emailError'] = "Email not found!";
        header('Location: login.php');
        exit();
    }
    mysqli_stmt_close($stmt);
}



?>

