<?php
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
j.period_to
FROM
jobs j
JOIN categories c ON
j.category = c.id_category
JOIN cities ci ON
j.city = ci.id_city
JOIN employment_type et ON
j.employment_type = et.id_employment_type
JOIN qualifications q ON
j.qualifications = q.id_qualification
WHERE id_job='$id';";
$result = $conn->query($sql);