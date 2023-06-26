<?php
session_start();
require 'db-config.php';

if (isset($_POST['update-biography'])) {
    $email = $_SESSION['email'];
    $bio = $_POST['biography'];

    $sql = "SELECT * FROM users WHERE email = :email AND verification_status = '1'";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $change = "UPDATE users SET biography='$bio' WHERE email = '$email'";
        $confirmation = $conn->query($change);
        if($confirmation){
            echo "
        <script>
            window.location.href='user-page.php?success=1';
        </script>";
        }
        else{
            echo "
        <script>
            alert('There has been a database error!');
            //window.location.href='user-page.php?success=0';
        </script>";
        }
    } else {
        echo "
        <script>
            alert('Database error!');
            //window.location.href='user-page.php?success=0';
        </script>";
    }
}
if (isset($_POST['update-description'])) {
    $email = $_SESSION['email'];
    $description = $_POST['description'];

    $sql = "SELECT * FROM users WHERE email = :email AND verification_status = '1'";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $change = "UPDATE users SET description='$description' WHERE email = '$email'";
        $confirmation = $conn->query($change);
        if($confirmation){
            echo "
        <script>
            window.location.href='user-page.php?success=1';
        </script>";
        }
        else{
            echo "
        <script>
            alert('There has been a database error!');
            window.location.href='user-page.php?success=0';
        </script>";
        }
    } else {
        echo "
        <script>
            alert('Database error!');
            window.location.href='user-page.php?success=0';
        </script>";
    }
}