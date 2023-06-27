<?php
include_once 'db-config.php';

$s = "SELECT id_job, position_name, company_name
        FROM jobs
        WHERE period_to >= CURDATE()
        ORDER BY period_to ASC
        LIMIT 5";

$result = $conn->query($s);

$response = array();

if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $response[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>
