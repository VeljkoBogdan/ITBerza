<?php
require_once 'db-config.php';

// Get the current user and other user IDs from the AJAX request
$currentUser = $_POST['currentUser'];
$otherUser = $_POST['otherUser'];

// Fetch messages from the database
$sql = "SELECT * FROM messages WHERE (sender_id = $currentUser AND receiver_id = $otherUser) OR (sender_id = $otherUser AND receiver_id = $currentUser) ORDER BY timestamp ASC";
$result = $conn->query($sql);

// Display the messages
if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $message = $row['message'];
        $senderID = $row['sender_id'];

        // Determine the CSS class for the message based on the sender
        $messageClass = ($senderID == $currentUser) ? 'sent' : 'received';

        // Display the message with the appropriate class
        echo '<div class="' . $messageClass . '">' . $message . '</div>';
    }
} else {
    echo '<div>No messages yet.</div>';
}

?>
