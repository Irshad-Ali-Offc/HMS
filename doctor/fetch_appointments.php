<?php
include '../dbc.php';
$sql="select * from users where username='".$_SESSION['doctor']."'";
$result=mysqli_query($con,$sql);
$doctor=mysqli_fetch_array($result);
$startOfWeek = date('Y-m-d', strtotime('monday this week'));
$endOfWeek = date('Y-m-d', strtotime('sunday this week'));

$sql = "SELECT DATE(date) as appointment_date, COUNT(*) as total
        FROM appointment
        WHERE doctor_id='".$doctor['id']."' AND status='Accept' AND date BETWEEN '$startOfWeek' AND '$endOfWeek'
        GROUP BY DATE(date)";

$result = $con->query($sql);


$weekData = [
    "Mon" => 0, "Tue" => 0, "Wed" => 0, "Thu" => 0, 
    "Fri" => 0, "Sat" => 0, "Sun" => 0
];


while ($row = $result->fetch_assoc()) {
    $dayName = date('D', strtotime($row['appointment_date'])); 
    $weekData[$dayName] = (int)$row['total']; 
}



echo json_encode(array_values($weekData)); 
?>