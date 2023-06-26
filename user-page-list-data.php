<?php
require_once 'db-config.php';

$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->rowCount() > 0) {
    // Loop through each row
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        // Display the account type based on the is_company field
        $accountType = $row['is_company'] == 1 ? "Company Account" : "User Account";
        $bio = $row['biography'];

        // Output the data
        echo '<div class="lead"><b>' . $accountType . "</b></div>";
        echo '<div class="name"><h4>' . $row['first_name'] . " ";
        echo $row['last_name'] . "</h4></div>";
        echo '<div class="email">Email: ' . $row['email'] . "</div>";
        echo '<div class="phone">Telephone: ' . $row['telephone'] . "</div>";
        echo '<hr>';
        if ($row['is_company'] == 1) {
            echo '<hr>';
            echo '<div class="name">Company_Name: ' . $row['company_name'] . "</div>";
            echo '<div class="website">Website: ' . $row['website'] . "</div>";
            echo '<div class="address">Address: ' . $row['address'] . "</div>";

            echo '<form class="form-horizontal" action="update-bio.php" method="post">';
            echo '<label class="biography control-label" for="biography">Biography:</label><input class="well form-control" type="text" id="description" name="description" value='.$row['description'].'>';
            echo '<button class="btn btn-default border" name="update-description" type="submit">Update Description</button><br>';
            echo '</form>';
        } else {
            echo '<form class="form-horizontal" action="update-bio.php" method="post">';
            echo '<label class="biography control-label" for="biography">Biography:</label><input class="well form-control" type="text" id="biography" name="biography" value="'.$bio.'">';
            echo '<button class="btn btn-default border" name="update-biography" id="update-biography" type="submit">Update Bio</button><br>';
            echo '</form>';
        }
        echo "<br>";
    }
}
else {
    echo "
            <script>
                alert('Error!');
                window.location.href='login.php';
            </script>";
}
?>