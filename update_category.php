<?php
require_once 'db-config.php';
require_once 'ban-check.php';

if (isset($_POST['jobID']) && !empty($_POST['jobID'])) {
    $jobID = $_POST['jobID'];
    $catID = $_POST['categoryID'];

    $sql = "UPDATE jobs SET category = $catID WHERE id_job = $jobID";

    if ($conn->query($sql) === true) {
        // The update was successful
        echo "Category updated successfully";
    } else {
        // An error occurred during the update
        echo "Error updating category: " . $conn->errorCode();
    }
} else {
    // The jobID parameter is missing or empty
    echo "Invalid jobID";
}
?>
