<?php
session_start();
require 'db-config.php';

// Function to validate and trim the data
function validateAndTrimData($data) {
    $data = trim($data); // Remove leading/trailing whitespaces

    if (empty($data)) {
        return false; // Empty data
    }

    return $data; // Validated and trimmed data
}

// Validate and trim each field
$contactPerson = validateAndTrimData($_POST['contact_name']) ?? null;
$contactEmail = validateAndTrimData($_POST['contact_email']) ?? null;
$telephone = validateAndTrimData($_POST['contact_phone']) ?? null;
$companyName = validateAndTrimData($_POST['company_name']) ?? null;
$tin = validateAndTrimData($_POST['pib']) ?? null;
$position = validateAndTrimData($_POST['position_name']) ?? null;
$category = validateAndTrimData($_POST['categories']) ?? null;
$city = validateAndTrimData($_POST['locations']) ?? null;
$remote = validateAndTrimData($_POST['remote_work']) ?? null;
$qualifications = validateAndTrimData($_POST['professional_qualification']) ?? null;
$employmentType = validateAndTrimData($_POST['employment_type']) ?? null;
$text = validateAndTrimData($_POST['text']) ?? null;
$signupEmail = validateAndTrimData($_POST['application_address']) ?? null;
$signupPhone = validateAndTrimData($_POST['application_phone']) ?? null;
$duration = validateAndTrimData($_POST['ad_period']) ?? null;
$signupPeriodFrom = validateAndTrimData($_POST['visible_from']) ?? null;
$signupPeriodTo = validateAndTrimData($_POST['visible_to']) ?? null;

// Check if any field is null, indicating validation failure
if (
    $contactPerson === null ||
    $contactEmail === null ||
    $telephone === null ||
    $companyName === null ||
    $tin === null ||
    $position === null ||
    $category === null ||
    $city === null ||
    $remote === null ||
    $qualifications === null ||
    $employmentType === null ||
    $text === null ||
    $signupEmail === null ||
    $signupPhone === null ||
    $duration === null ||
    $signupPeriodFrom === null ||
    $signupPeriodTo === null
) {
    // Handle validation error, e.g., redirect back with an error message
    header('Location: job_form.php?error=1');
    exit;
}

$query = "INSERT INTO `jobs`(`contact_person`, `contact_email`, `contact_telephone`, `company_name`, `poster_company_name`,
                   `tax_id_number`,`position_name`, `category`, `city`,`remote`, `qualifications`, `employment_type`,
                   `text`, `signup_email`, `signup_telephone`, `duration`, `signup_period`)
          VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt = $conn->prepare($query);
$insertConfirmation = $stmt->execute([$contactPerson, $contactEmail, $telephone, $companyName, $companyName, $tin, $position,
    $category, $city, $remote, $qualifications, $employmentType, $text, $signupEmail, $signupPhone, $duration, $signupPeriodFrom." - ".$signupPeriodTo]);

if($insertConfirmation===true){
    header('Location: index.php');
    exit;
}
else{
    header('Location: job_form.php?error=2');
    exit;
}