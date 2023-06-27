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
        <div class="col-sm-8 text-left middle">
            <div class="text-center scaled-1-2">

            </div>
            <div class="content"><br>
                <div class="card card-rounded">
                    <div class="card-header card-rounded">
                        <h3 class="text-left">
                            <?php
                            $id = $_GET['id'];
                            if(isset($_GET['idCompany'])){
                                $idCompany = $_GET['idCompany'];
                            }
                            else{
                                $idCompany=0;
                            }
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
                        <div class="text-center">
                        <?php
                        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']===true){

                            if (!isset($_SESSION['is_company'])) {
                                echo '<div class="text-center">
                                        <a href="chat.php?currentUser=' . $_SESSION['id'] . '&otherUser=' . $idCompany . '">Contact Company</a>
                                    </div><br>';
                            }

                            if(isset($_SESSION['is_admin']) && $_SESSION['is_admin']===true){
                                $sql = "SELECT is_enabled
                                        FROM jobs
                                        WHERE id_job = :id";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(':id', $id);
                                $stmt->execute();

                                if ($stmt->rowCount() > 0) {
                                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                    $isEnabled = $row['is_enabled'];

                                    // Determine the cube color based on the value of is_enabled
                                    $cubeColor = ($isEnabled == 1) ? 'green' : 'red';

                                    echo '<a class="cube link-disabled '.$cubeColor. '" href="validate-job.php?id='.$id.'&isEnabled='.$isEnabled.'"><button><h4>ENABLE / DISABLE</h4></button></a><br><small>Green is enabled, red is disabled</small>';
                                }
                            }
                        }
                        ?>
                        </div>
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