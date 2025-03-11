<?php
include '../dbc.php';
$startOfWeek = date('Y-m-d', strtotime('monday this week'));
$endOfWeek = date('Y-m-d', strtotime('sunday this week'));

$sql = "SELECT DATE(date) as appointment_date, COUNT(*) as total
        FROM appointment
        WHERE date BETWEEN '$startOfWeek' AND '$endOfWeek'
        GROUP BY DATE(date)";

$result = $con->query($sql);

// Initialize an array with default values for each day of the week
$weekData = [
    "Mon" => 0, "Tue" => 0, "Wed" => 0, "Thu" => 0, 
    "Fri" => 0, "Sat" => 0, "Sun" => 0
];

// Fetch data and populate the array
while ($row = $result->fetch_assoc()) {
    $dayName = date('D', strtotime($row['appointment_date'])); // Get day name (e.g., Mon, Tue)
    $weekData[$dayName] = (int)$row['total']; // Store count in the array
}


// Return JSON response
echo json_encode(array_values($weekData)); // Convert associative array to indexed array for Chart.js
?>