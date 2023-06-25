<?php
session_start();
require 'db-config.php';
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
            <a class="navbar-brand" href="index.php">Logo</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Projects</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <?php
                    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']===TRUE) {
                        echo "<a href='logout.php'>".$_SESSION['email']."&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-log-out'></span> Logout</a>";
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
        <div class="sidenav col-sm-2 ">
            <p><a href="#">Link</a></p>
            <p><a href="#">Link</a></p>
            <p><a href="#">Link</a></p>
        </div>

        <div class="col-sm-8 text-left middle">
            <div class="container col-sm-12">
                <?php

                if (isset($_GET['email']) && isset($_GET['v_cod'])) {
                    $email = $_GET['email'];
                    $v_cod = $_GET['v_cod'];

                    $sql = "SELECT * FROM users WHERE email = '$email' AND verification_id = '$v_cod'";
                    $result = $conn->query($sql);

                    if ($result) {
                        if ($result->rowCount() == 1) {
                            $row = $result->fetch(PDO::FETCH_ASSOC);
                            $fetch_email = $row['email'];

                            if ($row['verification_status'] == 0) {
                                echo "<div class=\'text-center\'> <span> You need to verify your email first! </span> </div>";
                            }
                            else{
                                echo "<form class=\"form-horizontal\" method=\"post\" action=\"confirmation.php?email=$email\">
                    <div class=\"text-center\">
                        <h3>Account recovery</h3>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label\" for=\"password\">Your Password: </label>
                        <span id=\"passwordError\"></span>
                        <div class=\"input-group\">
                            <input class=\"form-control col-xs-3\" type=\"password\" name=\"password\" id=\"password\">
                            <div class=\"input-group-btn\">
                                <button class=\"btn btn-default\" type=\"button\" id=\"toggle-button\"
                                        onclick=\"togglePasswordVisibilitySignUp()\">
                                    Show
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label\" for=\"confirm-password\">Confirm Password: </label>
                        <span id=\"confirmPasswordError\"></span>
                        <div class=\"input-group\">
                            <input class=\"form-control col-xs-3\" type=\"password\" name=\"confirm-password\" id=\"confirm-password\">
                            <div class=\"input-group-btn\">
                                <button class=\"btn btn-default\" type=\"button\" id=\"toggle-button-confirm\"
                                        onclick=\"togglePasswordVisibilitySignUp()\">
                                    Show
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <button class=\"btn btn-default border\" type=\"submit\" name=\"request-new-password\" id=\"request-new-password\">
                            <span>Send email</span>
                        </button>
                    </div>
                </form>";
                            }
                        }
                    }
                }else{
                    echo "<script>
                alert('Server down!');
                window.location.href='index.php'
            </script>";
                }
                ?>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



