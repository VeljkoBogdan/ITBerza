<?php
session_start();
require "db-config.php";
require 'ban-check.php';
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
            <a class="navbar-brand" href="index.php">IT Berza</a>
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
                    echo 'Add Job';
                    echo '</a>';
                    echo '</li>';
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

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <p><a href="#">Link</a></p>
            <p><a href="#">Link</a></p>
            <p><a href="#">Link</a></p>
        </div>
        <div class="col-sm-8 text-left middle" id="topOfPage">
            <h1 class="text-center">About</h1>
            <div class="container col-sm-12">

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
    <p>&copy; 2023 Your Website. All rights reserved.</p>
</footer>

<!--        SCRIPTS           -->
<script type="text/javascript" src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>