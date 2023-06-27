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
        echo '<div class="email">Email: ' . $row['email'] . "</div>";
        echo '<form class="form-horizontal" action="update-bio.php" method="post" onsubmit="return validateUpdateInfo()">';
        echo '<label class="name control-label" for="name">First Name: </label><input class="well form-control" type="text" id="name" name="name" value=' . $row['first_name'] . '>';
        echo '<div id="first-name-error" class="red"></div>';
        echo '<label class="last-name control-label" for="last-name">Last Name: </label><input class="well form-control" type="text" id="last-name" name="last-name" value=' . $row['last_name'] . '>';
        echo '<div id="last-name-error" class="red"></div>';
        echo '<label class="phone control-label" for="phone">Telephone: </label><input class="well form-control" type="text" id="phone" name="phone" value=' . $row['telephone'] . '>';
        echo '<div id="phone-error" class="red"></div>';
        echo '<button class="btn btn-default border" name="update-info" type="submit">Update Info</button><br>';
        echo '</form>';
        echo '<hr>';
        if ($row['is_company'] == 1) {
            echo '<hr>';
            echo '<div class="name">Company_Name: ' . $row['company_name'] . "</div>";
            echo '<div class="website">Website: ' . $row['website'] . "</div>";
            echo '<div class="address">Address: ' . $row['address'] . "</div>";

            echo '<form class="form-horizontal" action="update-bio.php" method="post">';
            echo '<label class="biography control-label" for="biography">Biography:</label><input class="well form-control" type="text" id="description" name="description" value=' . $row['description'] . '>';
            echo '<button class="btn btn-default border" name="update-description" type="submit">Update Description</button><br>';
            echo '</form>';
        } else {
            echo '<form class="form-horizontal" action="update-bio.php" method="post">';
            echo '<label class="biography control-label" for="biography">Biography:</label><input class="well form-control" type="text" id="biography" name="biography" value="' . $bio . '">';
            echo '<button class="btn btn-default border" name="update-biography" id="update-biography" type="submit">Update Bio</button><br>';
            echo '</form>';
        }
        echo "<br>";
    }
} else {
    echo "
            <script>
                alert('Error!');
                window.location.href='login.php';
            </script>";
}
?>