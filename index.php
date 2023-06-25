<?php
session_start();
require "db-config.php";
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <title>IT Berza</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="style.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Logo</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Projects</a></li>
                <li><a href="#">Contact</a></li>
                <?php
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']===TRUE) {
                    echo "<li><a href=\"user-page.php\">Profile</a></li>";
                }?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <?php
                        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']===TRUE) {
                            echo "<a href='logout.php'> ".$_SESSION['email']."&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-log-out'></span> Logout</a>";
                        }else{
                            echo "<a href=\"login.php\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a>";
                        }?>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid col-sm-12 text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <p><a href="#">Link</a></p>
            <p><a href="#">Link</a></p>
            <p><a href="#">Link</a></p>
        </div>
        <div class="col-sm-8 text-left middle">
            <div class="text-center">
                <form class="navbar-form" id="search-form">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg" placeholder="Search" name="search">
                        <div class="input-group-btn">
                            <button class="btn btn-primary" type="submit">
                                <i class="bi bi-search"></i> Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <?php
                $sql = "SELECT id_job, contact_person, contact_email, contact_telephone, company_name, position_name, category, city, remote, qualifications, employment_type, text, signup_email, signup_telephone, duration, signup_period FROM jobs";
                $result = $conn->query($sql);

                // Define the number of boxes per page
                $boxesPerPage = 10;

                // Calculate the total number of pages
                $totalPages = ceil($result->rowCount() / $boxesPerPage);

                // Get the current page number
                if (isset($_GET['page'])) {
                $currentPage = intval($_GET['page']);
                } else {
                $currentPage = 1;
                }

                // Calculate the offset for the SQL query
                $offset = ($currentPage - 1) * $boxesPerPage;

                // Retrieve data for the current page only
                $sql = $sql . " LIMIT $offset, $boxesPerPage";
                $result = $conn->query($sql); ?>

            <div class="content">
                <div class="content">
                    <?php
                    // Display the job listings as clickable boxes
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo '<a href="job_details.php?id='.$row['id_job'].'" class="link-disabled">';
                            echo '<div class="card card-rounded">';
                                echo '<div class="card-header card-rounded">';
                                    echo '<h5 class="card-title"><div class="">' . $row['position_name'] . '</div></h5>';
                                echo '</div>';
                                echo '<div class="card-body">';
                                    echo '<p class="card-text">' . $row['company_name'] . '</p>';
                                echo '</div>';
                                echo '<div class="card-footer">';
                                    echo '<div></div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</a>';
                    }
                    ?>

                    <?php
                    // Display pagination links
                    if ($totalPages > 1) {
                        echo '<nav>';
                        echo '<ul class="pagination justify-content-center">';

                        // Previous page link
                        if ($currentPage > 1) {
                            echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage - 1) . '">Previous</a></li>';
                        }

                        // Page links
                        for ($i = 1; $i <= $totalPages; $i++) {
                            echo '<li class="page-item';
                            if ($i === $currentPage) {
                                echo ' active';
                            }
                            echo '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                        }

                        // Next page link
                        if ($currentPage < $totalPages) {
                            echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage + 1) . '">Next</a></li>';
                        }

                        echo '</ul>';
                        echo '</nav>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-sm-2 sidenav">
            <div class="well">
                <p>ADS</p>
            </div>
            <div class="well">
                <p>ADS</p>
            </div>
        </div>
    </div>
</div>

<footer class="container-fluid text-center">
    <p>&copy; 2023 Your Website. All rights reserved.</p>
</footer>

<!--        SCRIPTS           -->
<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>