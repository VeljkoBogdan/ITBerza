<?php
// Define the number of boxes per page
$boxesPerPage = 10;

// Get the current page number
if (isset($_GET['page'])) {
    $currentPage = intval($_GET['page']);
} else {
    $currentPage = 1;
}

// Calculate the offset for the SQL query
$offset = ($currentPage - 1) * $boxesPerPage;

$category = $_GET['categories'] ?? '';
$location = $_GET['locations'] ?? '';
$qualification = $_GET['professional_qualification'] ?? '';
$employmentType = $_GET['employment_type'] ?? '';
$empty = true;

if ($category !== '' || $location !== '' || $qualification !== '' || $employmentType !== '') {
    $empty = false;
}

// Build the conditions based on the selected filter values
$conditions = [];
$params = [];

if (!empty($category)) {
    $conditions[] = 'j.category = '.$category;
    $params['category'] = $category;
}

if (!empty($location)) {
    $conditions[] = 'j.city = '.$location;
    $params['location'] = $location;
}

if (!empty($qualification)) {
    $conditions[] = 'j.qualifications = '.$qualification;
    $params['qualification'] = $qualification;
}

if (!empty($employmentType)) {
    $conditions[] = 'j.employment_type = '.$employmentType;
    $params['employmentType'] = $employmentType;
}

// Add the conditions to the SQL statement if any exist
if (!empty($conditions)) {
    $conditionsClause = ' WHERE ' . implode(' AND ', $conditions);
} else {
    $conditionsClause = '';
}

// Query to fetch the job listings with pagination
// Query to fetch the job listings with pagination
$sql = "SELECT
    j.city,
    ci.city,
    j.id_job,
    j.contact_person,
    j.contact_email,
    j.contact_telephone,
    j.company_name,
    j.position_name,
    j.category,
    c.category,
    j.remote,
    j.qualifications,
    q.qualification AS qualification_name,
    j.employment_type,
    et.employment_type AS employment_type_name,
    j.text,
    j.signup_email,
    j.signup_telephone,
    j.duration,
    j.period_from,
    j.period_to,
    j.is_enabled
FROM
    jobs j
JOIN categories c ON
    j.category = c.id_category
JOIN cities ci ON
    j.city = ci.id_city
JOIN employment_type et ON
    j.employment_type = et.id_employment_type
JOIN qualifications q ON
    j.qualifications = q.id_qualification"
    . $conditionsClause
    . " LIMIT $offset, $boxesPerPage";

$result = $conn->query($sql);

// Fetch all rows to calculate the total number of pages
$totalResult = $conn->query("SELECT COUNT(*) AS total FROM jobs");
$totalRows = $totalResult->fetch(PDO::FETCH_ASSOC)['total'];
$totalPages = ceil($totalRows / $boxesPerPage);

// Display the job listings as clickable boxes
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    // Convert from yyyy/mm/dd to yyyy - month name - dd
    $dateFrom = date('Y-F-d', strtotime($row['period_from']));
    $dateTo = date('Y F d', strtotime($row['period_to']));

    echo '<a href="job-details.php?id=' . $row['id_job'] . '" class="link-disabled">';
    echo '<br>';
    echo '<div class="card card-rounded">';
    echo '<div class="card-header card-rounded ';
    if (strtotime($row['period_to']) < strtotime(date('Y-m-d'))) {
        echo 'card-header-expired';
    } // echo expired class if the time is expired
    echo '">';
    echo '<h3 class="card-title lead">' . $row['position_name'] . '</h3><h4 class="white"> ' . $row['company_name'] . '</h4>';
    echo '</div>';
    echo '<div class="card-body">';
    echo '<p class="card-text"><span class="glyphicon glyphicon-map-marker"></span> ' . strtoupper($row['city']) . '</p>';
    echo '<p class="card-text ';
    if (strtotime($row['period_to']) < strtotime(date('Y-m-d'))) {
        echo 'red';
    } // echo red class if the time is expired
    echo '"><span class="glyphicon glyphicon-time"></span> ' . $dateTo . '</p>';
    echo '</div>';
    echo '<div class="card-footer">';
    if(isset($_SESSION['is_admin']) && $_SESSION['is_admin']===true && $row['is_enabled']==0){
        echo '<div class="text-center">
                                        <a class="btn btn-success border" href="validate-job.php?id='.$row['id_job'].' "><x button><h4>VALIDATE AD</h4></xbutton></a>
                                        </div><br>';
    }
    echo '<div></div>';
    echo '</div>';
    echo '</div>';
    echo '</a>';
}

// Display pagination links
if ($totalPages > 1) {
    echo '<nav>';
    echo '<ul class="pagination justify-content-center">';

    // Previous page link
    if ($currentPage > 1) {
        echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage - 1) . '">Previous</a></li>';
    }

    // Page links
    for ($i = 1; $i <= $totalPages; $i++) {
        echo '<li class="page-item';
        if ($i === $currentPage) {
            echo ' active';
        }
        echo '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
    }

    // Next page link
    if ($currentPage < $totalPages) {
        echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage + 1) . '">Next</a></li>';
    }

    echo '</ul>';
    echo '</nav>';
}
?>
