<?php
require_once 'db-config.php'; // If a site doesn't have require db-config

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $isBanned = $result['is_banned'];

        if ($isBanned) {
            // Destroy the session to log the user out
            session_unset();
            session_destroy();

            // Redirect the user to "login.php"
            echo '<script> alert("You are banned. Contact the admin for further information"); </script>';
            header("Location: login.php");
            exit; // Terminate the current script to prevent further execution
        }
    }
}