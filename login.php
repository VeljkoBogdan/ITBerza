<?php
session_start();
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
            <a class="navbar-brand" href="#">Logo</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="#"> About</a></li>
                <li><a href="#">Projects</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
        <div class="col-sm-8 text-left" id="topOfPage">
            <h1 class="text-center">Welcome back!</h1>
            <div class="container col-sm-12">
                <form class="form-horizontal" method="post" action="#" id="loginForm">
                    <div class="form-group">
                        <div class="checkbox">
                            <label><input type="checkbox" value="company" id="company-check-box">Nalog u ime kompanije?</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="firstName">Your First Name: </label>
                        <input class="form-control col-xs-3" type="text"  name="firstName" id="firstName">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="lastName">Your Last Name: </label>
                        <input class="form-control col-xs-3" type="text"  name="lastName" id="lastName">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email">Your Email Address: </label>
                        <input class="form-control col-xs-3" type="email" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password">Your Password: </label>
                        <div class="input-group">
                            <input class="form-control col-xs-3" type="password" name="password" id="password">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="button" id="toggle-button" onclick="togglePasswordVisibility()">
                                    Show
                                </button>
                            </div>
                        </div>
                        <a href=""> Forgotten Password? </a>
                    </div>
                    <div id="company-input">
                        <div class="form-group">
                            <label class="control-label" for="companyName">Company Name: </label>
                            <input class="form-control col-xs-3" type="text" name="companyName" id="companyName">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="website">Company Website: </label>
                            <input class="form-control col-xs-3" type="text" name="website" id="website">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="address">Company Address: </label>
                            <input class="form-control col-xs-3" type="text" name="address" id="address">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="description">Company Description: </label>
                            <input class="form-control col-xs-3" type="text" name="description" id="description">
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-default border" type="submit">Submit</button><br>
                </form>
            </div>
            <h3></h3>
            <p></p>
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
    <p></p>
</footer>

<!--        SCRIPTS           -->
<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
