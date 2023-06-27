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
                <li><a href="contact.php">Contact</a></li>
                <?php
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === TRUE) {
                    echo "<li><a href=\"user-page.php\">Profile</a></li>";
                    if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === TRUE) {
                        echo "<li><a href=\"admin-board.php\">Admin Board</a></li>";
                    }
                } ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === TRUE && ((isset($_SESSION['is_company']) && $_SESSION['is_company'] === TRUE) || (isset($_SESSION['is_admin'])) && $_SESSION['is_admin'] === TRUE)) {
                    echo '<li>';
                    echo '<a href="job-form.php" class="btn add-job-button">';
                    echo '<span class="glyphicon glyphicon-plus"></span>';
                    echo ' Add Job';
                    echo '</a>';
                    echo '</li>';
                }
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === TRUE) {
                    echo "<li><a href=\"chat-list.php\">Messages</a></li>";
                } ?>
                <li>
                    <?php
                    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === TRUE) {
                        echo "<a href='logout.php'> " . $_SESSION['email'] . "&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-log-out'></span> Logout</a>";
                    } else {
                        echo "<a href=\"login.php\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a>";
                    } ?>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <a href="#" id="load-card-boxes-link" class="load-card-boxes-link link-disabled display-flex">
                <button class="btn btn-default border display-flex-child">Expiring Soon</button>
            </a><br>
            <div class="card-container"></div>
        </div>
        <div class="col-sm-8 text-left middle" id="topOfPage">
            <h1 class="text-center">About</h1>
            <hr>
            <div class="container col-sm-12 well">
                <div id="about">
                    <h4>
                        <b>TechTalentHub</b> is a dedicated platform that connects talented individuals with exciting IT
                        job opportunities. Our mission is to bridge the gap between top-notch tech talent and companies
                        seeking exceptional professionals.
                    </h4><br>
                    <h4>
                        At TechTalentHub, we understand the critical role that skilled IT professionals play in driving
                        innovation and success. We aim to provide a streamlined platform that empowers both job seekers
                        and employers in the IT industry.
                    </h4><br>
                    <h4>
                        Our platform offers a wide range of features, including job listings, candidate profiles, and a
                        robust networking community. Whether you are a seasoned IT professional or an aspiring talent
                        looking for your next career move, TechTalentHub is here to support you.
                    </h4><br>
                    <h4>
                        Join us today and discover the opportunities that await you in the ever-evolving world of
                        technology!
                    </h4>
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