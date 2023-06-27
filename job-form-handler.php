<?php

class JobFormHandler
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

// Function to validate and trim the data

    public function handleFormSubmission()
    {
// Validate and trim each field
        $contactPerson = $this->validateAndTrimData($_POST['contact_name']) ?? null;
        $contactEmail = $this->validateAndTrimData($_POST['contact_email']) ?? null;
        $telephone = $this->validateAndTrimData($_POST['contact_phone']) ?? null;
        $companyName = $this->validateAndTrimData($_POST['company_name']) ?? null;
        $tin = $this->validateAndTrimData($_POST['pib']) ?? null;
        $position = $this->validateAndTrimData($_POST['position_name']) ?? null;
        $category = $this->validateAndTrimData($_POST['categories']) ?? null;
        $city = $this->validateAndTrimData($_POST['locations']) ?? null;
        $remote = $this->validateAndTrimData($_POST['remote_work']) ?? null;
        $qualifications = $this->validateAndTrimData($_POST['professional_qualification']) ?? null;
        $employmentType = $this->validateAndTrimData($_POST['employment_type']) ?? null;
        $text = $this->validateAndTrimData($_POST['text']) ?? null;
        $signupEmail = $this->validateAndTrimData($_POST['application_address']) ?? null;
        $signupPhone = $this->validateAndTrimData($_POST['application_phone']) ?? null;
        $duration = $this->validateAndTrimData($_POST['ad_period']) ?? null;
        $signupPeriodFrom = $this->validateAndTrimData($_POST['visible_from']) ?? null;
        $signupPeriodTo = $this->validateAndTrimData($_POST['visible_to']) ?? null;

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
            header('Location: job-form.php?error=1');
            exit;
        }

        $query = "INSERT INTO `jobs`(`contact_person`, `contact_email`, `contact_telephone`, `company_name`, `poster_company_name`,
`tax_id_number`,`position_name`, `category`, `city`,`remote`, `qualifications`, `employment_type`,
`text`, `signup_email`, `signup_telephone`, `duration`, `period_from`, `period_to`, `id_company`)
VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $insertConfirmation = $stmt->execute([$contactPerson, $contactEmail, $telephone, $companyName, $companyName, $tin, $position,
            $category, $city, $remote, $qualifications, $employmentType, $text, $signupEmail, $signupPhone, $duration, $signupPeriodFrom, $signupPeriodTo, $_SESSION['id']]);

        if ($insertConfirmation === true) {
            header('Location: index.php');
            exit;
        } else {
            header('Location: job-form.php?error=2');
            exit;
        }
    }

    private function validateAndTrimData($data)
    {
        $data = trim($data); // Remove leading/trailing whitespaces

        if (empty($data)) {
            return false; // Empty data
        }

        return $data; // Validated and trimmed data
    }
}