<?php
require_once 'db-config.php';

// Get the current user, other user, and message from the AJAX request
$currentUser = $_POST['currentUser'];
$otherUser = $_POST['otherUser'];
$message = $_POST['message'];

// Insert the message into the database
$sql = "INSERT INTO messages (sender_id, receiver_id, message, timestamp) VALUES ($currentUser, $otherUser, '$message', CURDATE())";
$result = $conn->query($sql);

?>
