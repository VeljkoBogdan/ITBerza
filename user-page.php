<?php
session_start();
require 'db-config.php';
require 'ban-check.php';
require 'login-check.php';
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
    <script type="text/javascript" src="script.js"></script>
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
        <div class="sidenav col-sm-2 ">
            <a href="#" id="load-card-boxes-link" class="load-card-boxes-link link-disabled display-flex">
                <button class="btn btn-default border display-flex-child">Expiring Soon</button>
            </a><br>
            <div class="card-container"></div>
        </div>

        <div class="col-sm-8 text-left middle">
            <div class="container col-sm-12">
                <div class="text-center self-center rounded-md">
                    <div class="">
                        <h3>User Info</h3>
                    </div>
                </div>
                <div>
                    <?php include_once 'user-page-list-data.php' // List data ?>
                </div>
                <hr>
                <div class="text-center self-center rounded-md">
                    <div class="">
                        <h3>Change Password</h3>
                    </div>
                </div>
                <form class="form-horizontal" id="change-data-form" name="change-data-form" action="confirmation.php"
                      method="post" onsubmit="return validatePasswordChange()">
                    <div class="form-group">
                        <label class="control-label" for="password">Your previous password:</label>
                        <span class="red" id="password-error"></span>
                        <div class="input-group">
                            <input class="form-control" type="password" name="password" id="password">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="button" id="toggle-button"
                                        onclick="togglePasswordVisibilityLogin()">
                                    Show
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="new-password">Your New Password: </label>
                        <span class="red" id="new-password-error"></span>
                        <div class="input-group">
                            <input class="form-control" type="password" name="new-password" id="new-password">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="button" id="toggle-button-new"
                                        onclick="togglePasswordVisibilityNew()">
                                    Show
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="confirm-password">Confirm New Password: </label>
                        <span class="red" id="confirm-password-error"></span>
                        <div class="input-group">
                            <input class="form-control" type="password" name="confirm-password" id="confirm-password">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="button" id="toggle-button-confirm"
                                        onclick="togglePasswordVisibilityNew()">
                                    Show
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-default border" name="change" id="change" type="submit"
                               value="Submit changes"></input><br>
                    </div>
                </form>
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