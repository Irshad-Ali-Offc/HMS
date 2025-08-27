<?php 
include_once '../dbc.php'; 

// Fetch doctors by department
if(isset($_POST['department'])){
    $department = $_POST['department'];
    $sql = "SELECT doctor.id AS doc_id, users.id AS user_id, users.name, doctor.fee 
            FROM doctor 
            INNER JOIN users ON users.id = doctor.user_id 
            WHERE dep_id='$department'"; 
    $result = mysqli_query($con, $sql);
    echo '<option value="">Select a doctor</option>';
    while($row = mysqli_fetch_assoc($result)){
        // 👇 now value is users.id (correct for appointment.doctor_id)
        echo '<option value="'.$row['user_id'].'">'.$row['name'].'</option>';
    }
}

// Fetch patient name by patient id
else if(isset($_POST['patient'])){
    $patient = $_POST['patient'];
    $sql="SELECT users.name 
          FROM patient 
          INNER JOIN users ON users.id=patient.user_id 
          WHERE patient.id='$patient'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    echo $row['name'];
}

// Fetch doctor fee by doctor user_id
else if(isset($_POST['doctor'])){
    $doctor = $_POST['doctor']; // this is users.id
    $sql = "SELECT doctor.fee 
            FROM doctor 
            INNER JOIN users ON users.id = doctor.user_id 
            WHERE users.id='$doctor'"; 
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    echo $row['fee'];
}
?>
