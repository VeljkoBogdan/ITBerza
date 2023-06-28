<?php
session_start();
require "db-config.php";
require 'ban-check.php';
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <title>TechTalentHub</title>
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
            <a class="navbar-brand" href="index.php">TechTalentHub</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Jobs</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a> </li>
                <?php
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']===TRUE) {
                    echo "<li><a href=\"user-page.php\">Profile</a></li>";
                    if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']===TRUE) {
                        echo "<li><a href=\"admin-board.php\">Admin Board</a></li>";
                    }
                }?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']===TRUE && ((isset($_SESSION['is_company'])  && $_SESSION['is_company'] === TRUE) || (isset($_SESSION['is_admin'])) && $_SESSION['is_admin'] === TRUE)) {
                    echo '<li>';
                    echo '<a href="job-form.php" class="btn add-job-button">';
                    echo '<span class="glyphicon glyphicon-plus"></span>';
                    echo ' Add Job';
                    echo '</a>';
                    echo '</li>';
                }

                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']===TRUE) {
                    echo "<li><a href=\"chat-list.php\">Messages</a></li>";
                }?>
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
            <a href="#" id="load-card-boxes-link" class="load-card-boxes-link link-disabled display-flex"><button class="btn btn-default border display-flex-child">Expiring Soon</button></a><br>
            <div class="card-container"></div>
        </div>
        <div class="col-sm-8 text-left middle"><br>
            <div class="content card card-rounded"><br><br>
            <h2 class="text-center"><b>Find a Job that suits You!</b></h2>
            <h3 class="text-center">(<?php
                $sql = "SELECT COUNT(*) AS row_count
                        FROM jobs
                        WHERE period_to > CURDATE()";
                $result = $conn->query($sql);

                if ($result->rowCount() > 0) {
                    $row = $result->fetch(PDO::FETCH_ASSOC);
                    $rowCount = $row['row_count'];
                    echo $rowCount;
                } else {
                    echo "No rows found.";
                }
                ?>
                 results)
            </h3><br><br><br>
            </div>
            <div class="content">
                <hr>
                <h3 class="text-center"></h3>
            </div>
            <button class="btn btn-primary border" id="toggleFormBtn"> Filter </button>
            <a href="list-archived.php" class="link-disabled"><button class="btn btn-default border"> See Expired Jobs</button></a>
            <form style="display: none;" id="searchForm" class="form-horizontal" method="GET" action="index.php">
                <div class="form-group container-fluid">
                    <label class="control-label" for="categories">Category:</label>
                    <?php
                    // Query to fetch data from the "categories" table
                    $query = "SELECT id_category, category FROM categories ORDER BY category";
                    $statement = $conn->query($query);

                    if ($statement) {
                        // Start generating the HTML code
                        echo '<select class="form-control col-xs-3" id="categories" name="categories" tabindex="-1">';
                        echo '<option value="">All</option>'; // Option to select all categories

                        // Fetch the query results
                        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                            $id = $row['id_category'];
                            $category = $row['category'];
                            echo '<option value="' . $id . '">' . $category . '</option>';
                        }

                        echo '</select>';
                    } else {
                        // Handle query error
                        $errorInfo = $conn->errorInfo();
                        echo "Error: " . $errorInfo[2];
                    }
                    ?>
                </div>
                <div class="form-group container-fluid">
                    <label class="control-label" for="locations">Location:</label>
                    <?php
                    // Query to fetch data from the cities table
                    $query2 = "SELECT * FROM cities ORDER BY city";
                    $statement2 = $conn->query($query2);

                    if ($statement2) {
                        // Start generating the HTML code
                        echo '<select class="form-control col-xs-3" id="locations" name="locations" tabindex="-1">';
                        echo '<option value="">All</option>'; // Option to select all locations

                        // Fetch the query results
                        while ($row = $statement2->fetch(PDO::FETCH_ASSOC)) {
                            $id2 = $row['id_city'];
                            $city = $row['city'];
                            echo '<option value="' . $id2 . '">' . $city . '</option>';
                        }

                        echo '</select>';
                    } else {
                        // Handle query error
                        $errorInfo = $conn->errorInfo();
                        echo "Error: " . $errorInfo[2];
                    }
                    ?>
                </div>
                <div class="form-group container-fluid">
                    <label class="control-label" for="professional_qualification">Professional Qualification:</label>
                    <?php
                    // Query to fetch data from the "qualifications" table
                    $query3 = "SELECT id_qualification, qualification FROM qualifications";
                    $statement3 = $conn->query($query3);

                    if ($statement3) {
                        // Start generating the HTML code
                        echo '<select class="form-control col-xs-3" id="professional_qualification" name="professional_qualification">';
                        echo '<option value="">All</option>'; // Option to select all qualifications

                        // Fetch the query results
                        while ($row = $statement3->fetch(PDO::FETCH_ASSOC)) {
                            if($row['id_qualification'] != 1) {
                                $id3 = $row['id_qualification'];
                                $qualification = $row['qualification'];
                                echo '<option value="' . $id3 . '">' . $qualification . '</option>';
                            }
                        }
                        echo '</select>';
                    } else {
                        // Handle query error
                        $errorInfo = $conn->errorInfo();
                        echo "Error: " . $errorInfo[2];
                    }
                    ?>
                </div>
                <div class="form-group container-fluid">
                    <label class="control-label" for="employment_type">Employment Type:</label>
                    <?php
                    // Query to fetch data from the "employment_type" table
                    $query4 = "SELECT id_employment_type, employment_type FROM employment_type";
                    $statement4 = $conn->query($query4);

                    if ($statement4) {
                        // Start generating the HTML code
                        echo '<select class="form-control col-xs-3" id="employment_type" name="employment_type">';
                        echo '<option value="">All</option>'; // Option to select all employment types

                        // Fetch the query results
                        while ($row = $statement4->fetch(PDO::FETCH_ASSOC)) {
                            if($row['id_employment_type']!=1){
                                $id4 = $row['id_employment_type'];
                                $employment = $row['employment_type'];
                                echo '<option value="' . $id4 . '">' . $employment . '</option>';
                            }
                        }

                        echo '</select>';
                    } else {
                        // Handle query error
                        $errorInfo = $conn->errorInfo();
                        echo "Error: " . $errorInfo[2];
                    }
                    ?>
                </div><br>
                <button class="btn btn-success border" type="submit" name="search">Search</button>
            </form>
            <div class="content">
                <?php include_once 'index-list-jobs.php'; // List the jobs ?>
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

<footer class="container-fluid text-center ">
    <br>
    <p>&copy; 2023 Your Website. All rights reserved.</p>
    <br>
    <p>
        Veljko Bogdan<br>
        vtsveljkobogdan@gmail.com<br>
        +381 65 421 7454<br>
        Random Address, Subotica, Serbia
    </p>
</footer>

<!--        SCRIPTS           -->
<script src="script.js"></script>
<script src="ajax.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>