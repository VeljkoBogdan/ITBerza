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
                <li><a href="#"> About</a></li>
                <li><a href="#">Projects</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

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
            <h1 class="text-center">Sign Up</h1>
            <div class="container col-sm-12">
                <form class="form-horizontal" method="post" action="confirmation.php" id="signUpForm" onsubmit="return validateForm('signup')">
                    <div class="form-group">
                        <label class="control-label" for="firstName">Your First Name: </label>
                        <span id="firstNameError"></span>
                        <input class="form-control col-xs-3" type="text" name="firstName" id="firstName">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="lastName">Your Last Name: </label>
                        <span id="lastNameError"></span>
                        <input class="form-control col-xs-3" type="text" name="lastName" id="lastName">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email">Your Email Address: </label>
                        <span id="emailError"></span>
                        <input class="form-control col-xs-3" type="email" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password">Your Password: </label>
                        <span id="passwordError"></span>
                        <div class="input-group">
                            <input class="form-control col-xs-3" type="password" name="password" id="password">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="button" id="toggle-button"
                                        onclick="togglePasswordVisibilitySignUp()">
                                    Show
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="confirm-password">Confirm Password: </label>
                        <span id="confirmPasswordError"></span>
                        <div class="input-group">
                            <input class="form-control col-xs-3" type="password" name="confirm-password" id="confirm-password">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="button" id="toggle-button-confirm"
                                        onclick="togglePasswordVisibilitySignUp()">
                                    Show
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="telephone">Your Telephone Number: </label>
                        <span id="telephoneError"></span>
                        <input class="form-control col-xs-3" type="tel" id="telephone" name="telephone">
                        <small>Example: 123-456-7890</small>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label><input type="checkbox" value="company" id="company-check-box">Company Account</label>
                        </div>
                    </div>
                    <div id="company-input" style="display: none">
                        <div class="form-group">
                            <label class="control-label" for="companyName">Company Name: </label>
                            <span id="companyNameError"></span>
                            <input class="form-control col-xs-3" type="text" name="companyName" id="companyName">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="website">Company Website: </label>
                            <span id="companyWebsiteError"></span>
                            <input class="form-control col-xs-3" type="text" name="website" id="website">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="address">Company Address: </label>
                            <span id="companyAddressError"></span>
                            <input class="form-control col-xs-3" type="text" name="address" id="address">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="description">Company Description: </label>
                            <span id="companyDescriptionError"></span>
                            <input class="form-control col-xs-3" type="text" name="description" id="description">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <input class="btn btn-default border" name="signup" type="submit" value="Sign up">
                        <!--<button class="btn btn-default border" type="submit">Sign up</button><br>-->
                    </div>
                    <br>
                </form>
            </div>
            <h3></h3>
            <p>Already have an account? <a href="login.php"> Login here! </a></p><br>
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
