<?php
include '../dbc.php';
if(!isset($_SESSION['patient'])){
	header('location:../index.php');	
}
$sql="select * from users where username='".$_SESSION['patient']."'";
$result=mysqli_query($con,$sql);
$patient=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
    <link rel="stylesheet" href="../css/patient/patient.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.21/jspdf.plugin.autotable.min.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

</head>

<body>

    <div class="background">
        <img src="../image/watermark.png" alt="Watermark">
    </div>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <!-- User Profile Section -->
            <div class="profile-picture">
                <a href="#"> <img src="../image/logo.png" alt="User Profile Picture"> </a>
            </div>
            <h2><?php echo $patient['name'];?></h2>
            <p><?php echo $patient['username'];?></p>
            <ul>
                <li><a href="home.php">Dashboard </a></li>
                <li><a href="department.php">Department</a></li>
                <li><a href="doctor.php">Doctors</a></li>
                <li><a href="appointment.php">Appointments</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </aside>
        <button id="toggle-sidebar" class="toggle-btn togglebtn">☰</button>