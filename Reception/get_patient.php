<?php
include '../dbc.php';

if (isset($_POST['cnic'])) {
    $cnic = $_POST['cnic'];

    $query = "SELECT u.name, p.dob, p.contact 
              FROM patient p 
              JOIN users u ON p.user_id = u.id 
              WHERE p.cnic = '$cnic'";

    $result = mysqli_query($con, $query);

    if ($row = mysqli_fetch_assoc($result)) {

        echo json_encode([
            'name' => $row['name']
        ]);
    } else {
        echo json_encode(['error' => 'No patient found']);
    }
}
?>
