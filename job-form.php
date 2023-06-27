<?php
session_start();
require 'db-config.php';
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
        <div class="sidenav col-sm-2 ">
            <a href="#" id="load-card-boxes-link" class="load-card-boxes-link link-disabled display-flex"><button class="btn btn-default border display-flex-child">Expiring Soon</button></a><br>
            <div class="card-container"></div>
        </div>

        <div class="col-sm-8 text-left middle">
            <div class="container col-sm-12">
                <?php
                if(isset($_GET['error'])){
                    if($_GET['error']==2){
                        echo "<br><div class=\"text-center red\">Error, please try again later.</div>";
                    }
                }
                ?>
                <form class="form-horizontal" id="jobForm" action="add-job.php" method="POST" onsubmit="return validateJobForm()">
                    <div class="text-center self-center rounded-md">
                        <div class="">
                            <h3>Employer Information</h3>
                        </div>
                    </div>

                    <div class="">
                        <div class="form-group">
                            <label class="control-label" for="contact_name">
                                Contact Person:
                            </label>
                            <input type="text" name="contact_name" id="contact_name" value="" class="form-control col-xs-3"
                                   placeholder="Contact Person" maxlength="255">
                            <p class="italic error-message" id="contact_person_error"></p>
                        </div> <!-- Contact Person -->

                        <div class="form-group">
                            <label class="control-label" for="contact_email">
                                Contact Email: <span> </span>
                            </label>
                            <input type="text" name="contact_email" id="contact_email" value="" class="form-control col-xs-3 required-field" placeholder="Contact email" maxlength="255" data-error-id="contact_email_error">
                            <p class="italic error-message" id="contact_email_error"></p>
                        </div> <!-- Contact Email -->
                    </div>
                    <div class="">
                        <div class="form-group">
                            <label class="control-label"
                                   for="contact_phone">
                                Contact Telephone:
                            </label>
                            <input type="text" name="contact_phone" id="contact_phone" value="" class="form-control col-xs-3" placeholder="Telephone Number (format: 123-456-7890)" maxlength="255">
                            <p class="italic error-message" id="contact_phone_error"></p>
                        </div> <!-- Contact Telephone -->
                        <div class="form-group">
                            <label class="control-label" for="company_name">
                                Company Name:
                            </label>
                            <input type="text" name="company_name" id="company_name" value="" class="form-control col-xs-3" placeholder="Company Name" maxlength="255" data-error-id="company_name_error">
                            <p class="italic error-message" id="company_name_error"></p>
                        </div> <!-- Company Name -->
                    </div>
                    <div class="">
                        <div class="form-group">
                            <label class="control-label" for="pib">
                                Tax Identification Number:
                            </label>
                            <input type="text" name="pib" id="pib" value="" class="form-control col-xs-3" placeholder="Tax Identification Number">
                            <p class="italic error-message" id="pib_error"></p>
                        </div> <!-- TIN -->
                    </div>

                    <div style="border-top: 1px solid black" class="text-center self-center rounded-md">
                        <div class="">
                            <h3>Job Information</h3>
                        </div>
                    </div>

                    <div class="">
                        <div class="form-group lead">
                            <label class="control-label" for="position_name">
                                Position Name:
                            </label>
                            <input type="text" name="position_name" id="position_name" value="" class="form-control col-xs-3" placeholder="Position Name" maxlength="255" data-error-id="position_name_error">
                            <p class="italic error-message" id="position_error"></p>
                        </div> <!-- Position Name -->
                        <div class="form-group">
                            <label class="control-label" for="categories">
                                Category:
                            </label>
                            <?php
                            // Query to fetch data from the "categories" table
                            $query = "SELECT id_category, category FROM categories";
                            $statement = $conn->query($query);

                            if ($statement) {
                                // Start generating the HTML code
                                echo '<select class="form-control col-xs-3" id="categories" name="categories" tabindex="-1">';

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

                            <p class="italic error-message" id="category_error"></p>
                        </div> <!-- Category -->
                    </div>

                    <div class="">
                        <div class="form-group">
                            <label class="control-label" for="locations">
                                City:
                            </label>
                            <?php
                            // Query to fetch data from the cities table
                            $query2 = "SELECT * FROM cities ORDER BY city";
                            $statement2 = $conn->query($query2);

                            if ($statement2) {
                                // Start generating the HTML code
                                echo '<select class="form-control col-xs-3" id="locations" name="locations" tabindex="-1">';

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
                            <p class="italic error-message" id="city_error"></p>
                        </div> <!-- City -->
                        <div class="form-group">
                            <span class=""><b>Remote work:</b> </span>
                            <div class="">
                                <span class="">
                                    <input type="radio" id="remoteWork" class="form-radio" name="remote_work" value="1">
                                    <label for="remoteWork" class="control-label">
                                        Yes
                                    </label>
                                </span>

                                <span class="">
                                    <input type="radio" id="noRemoteWork" class="form-radio" name="remote_work" value="0">
                                    <label for="noRemoteWork" class="control-label">
                                        No
                                    </label>
                                </span>
                                <p class="italic error-message" id="remote_error"></p>
                            </div>

                        </div> <!-- Remote -->
                    </div>

                    <div class="">
                        <div class="form-group">
                            <label class="control-label" for="professional_qualification">
                                Professional qualifications:
                            </label>
                            <?php
                            // Query to fetch data from the "categories" table
                            $query3 = "SELECT id_qualification, qualification FROM qualifications";
                            $statement3 = $conn->query($query3);

                            if ($statement3) {
                                // Start generating the HTML code
                                echo '<select class="form-control col-xs-3" id="professional_qualification" name="professional_qualification">';

                                // Fetch the query results
                                while ($row = $statement3->fetch(PDO::FETCH_ASSOC)) {
                                    $id3 = $row['id_qualification'];
                                    $qualification = $row['qualification'];
                                    echo '<option value="' . $id3 . '">' . $qualification . '</option>';
                                }

                                echo '</select>';
                            } else {
                                // Handle query error
                                $errorInfo = $conn->errorInfo();
                                echo "Error: " . $errorInfo[2];
                            }
                            ?>
                            <p class="italic error-message" id="qualification_error"></p>
                        </div> <!-- Qualifications -->
                        <div class="form-group">
                            <label class="control-label" for="employment_type">
                                Employment Type:
                            </label>
                            <?php
                            // Query to fetch data from the "categories" table
                            $query4 = "SELECT id_employment_type, employment_type FROM employment_type";
                            $statement4 = $conn->query($query4);

                            if ($statement4) {
                                // Start generating the HTML code
                                echo '<select class="form-control col-xs-3" id="employment_type" name="employment_type">';

                                // Fetch the query results
                                while ($row = $statement4->fetch(PDO::FETCH_ASSOC)) {
                                    $id4 = $row['id_employment_type'];
                                    $employment = $row['employment_type'];
                                    echo '<option value="' . $id4 . '">' . $employment . '</option>';
                                }

                                echo '</select>';
                            } else {
                                // Handle query error
                                $errorInfo = $conn->errorInfo();
                                echo "Error: " . $errorInfo[2];
                            }
                            ?>
                            <p class="italic error-message" id="employment_error"></p>
                        </div> <!-- Employment Type -->
                    </div>


                    <div class="">
                        <div class="form-group">
                            <label class="control-label" for="text">
                                Text:
                            </label>
                            <textarea name="text" class="form-control col-xs-3" id="text" rows="4"></textarea>
                            <p class="italic">
                                <small>
                                    Here, describe in detail your program, the program organizer, what it entails, what
                                    are the application criteria, what needs to be sent with the application, etc.
                                </small>
                            </p>
                            <p class="italic error-message" id="text_error"></p>
                        </div> <!-- Text -->
                    </div>

                    <div id="choose_application_type" class="">
                        <div class="form-group">
                            <div class="">
                                <div id="email_input_form" class="mb-8">
                                    <label class="control-label" for="application_address">
                                        Signup Email:
                                    </label>
                                    <input type="text" name="application_address" id="application_address" value="" class="form-control col-xs-3" placeholder="Email for user signup" maxlength="255">
                                    <p class="italic error-message" id="application_email_error"></p>
                                </div>

                                <div id="phone_input_form" class="mb-8">
                                    <label class="control-label" for="application_phone">
                                        Signup Telephone:
                                    </label>
                                    <input type="text" name="application_phone" id="application_phone" value="" class="form-control col-xs-3" placeholder="Telephone for user signup" maxlength="255">
                                    <p class="italic error-message" id="application_phone_error"></p>
                                </div>
                            </div>
                        </div> <!-- Signup Email -->
                    </div>

                    <hr>
                    <div class="">
                        <div id="ad_period" class="form-group">
                            <div class=""><b>Ad duration:</b></div>
                            <label class="control-label">
                                <input type="radio" class="form-radio" name="ad_period" value="15">
                                <span class="ml-2">15 days</span>
                            </label>
                            <label class="control-label">
                                <input type="radio" class="form-radio" name="ad_period" value="30">
                                <span class="ml-2">30 days</span>
                            </label>
                            <p class="italic error-message" id="duration_error"></p>
                        </div> <!-- Duration -->
                        <div class="form-group">
                            <label class="control-label" for="visible_from">
                                Signup Period:
                            </label>
                            <div class="sm:columns-2">
                                <label class="control-label" for="visible_from">Visible from:</label>
                                <input type="date" id="visible_from" name="visible_from" value="" class="date" placeholder="From">
                                <label class="control-label" for="visible_to"> to:</label>
                                <input type="date" id="visible_to" name="visible_to" value="" class="date" placeholder="To">
                            </div>
                            <p class="italic error-message" id="period_error"></p>
                        </div> <!-- Signup Period -->
                    </div>

                    <div class="">
                        <div class="form-group">
                            <div class="text-center">
                                <button class="btn btn-default border" type="submit" name="finish" id="submit_btn">
                                    Finish Job Form
                                </button>
                                <div></div><hr>
                            </div>
                        </div> <!-- Finish -->
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

<footer class="container-fluid text-center">
    <p>&copy; 2023 Your Website. All rights reserved.</p>
</footer>

<!--        SCRIPTS           -->
<script src="script.js"></script>
<script src="ajax.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>