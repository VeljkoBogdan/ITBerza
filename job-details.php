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

<div class="container-fluid col-sm-12 text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <p><a href="#">Link</a></p>
            <p><a href="#">Link</a></p>
            <p><a href="#">Link</a></p>
        </div>
        <div class="col-sm-8 text-left middle">
            <div class="text-center scaled-1-2">

            </div>
            <div class="content"><br>
                <div class="card card-rounded">
                    <div class="card-header card-rounded">
                        <h3 class="text-left">
                            <?php
                            $id = $_GET['id'];
                            $dateTo = "";

                            include_once 'job-details-sql.php';

                            if ($result) {
                                $row = $result->fetch(PDO::FETCH_ASSOC);
                                echo $row['position_name'];
                                $dateTo = date('Y F d', strtotime($row['period_to']));
                            }
                            ?>
                        </h3>
                        <div>
                            <h4 class="white"> <?php echo $row['company_name']; ?> </h4>
                        </div>
                    </div>
                    <div class="card-body card-rounded">
                        <hr>
                        <h3 class="text-center">Job Information</h3>
                        <div>
                            <?php echo '<span class="glyphicon glyphicon-map-marker"></span> '. strtoupper($row['city']) ; ?>
                        </div>
                        <div>
                            <?php echo 'Registration Deadline: <b><span class="glyphicon glyphicon-time"></span> '.$dateTo.'</b><br><br>'; ?>
                        </div>
                        <div>
                            <?php echo '<span class="glyphicon glyphicon-map-marker"></span> '. $row['employment_type_name'] ; ?>
                        </div>
                        <div>
                            <?php echo '<span class="glyphicon glyphicon-map-marker"></span> '. $row['qualification_name'] ; ?>
                        </div>
                        <div>
                            <?php echo $row['remote']? "REMOTE": "NOT REMOTE" ; ?>
                        </div>
                        <div class="content card">
                            <hr>
                            <div class="card-body"><?php echo $row['text'] ; ?></div>
                            <hr>
                        </div>
                    </div>
                    <div class="card-footer card-rounded">
                        <?php
                        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']===true){
                            echo '<div class="text-center">
                                    <a href="#">Contact Company</a>
                                </div><br>';
                            if(isset($_SESSION['is_admin']) && $_SESSION['is_admin']===true){
                                echo '<div class="text-center">
                                        <a href="validate-job.php?id='.$id.' "><button><h4>VALIDATE AD</h4></button></a>
                                        </div>';
                            }
                        }
                        ?>
                    </div>
                    <br>
                </div>
                <br>
            </div>
            <div class="content">

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