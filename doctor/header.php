<?php
include '../dbc.php';
if (!isset($_SESSION['doctor'])) {
   header('location:../index.php');
}
$sql = "select * from users where username='" . $_SESSION['doctor'] . "'";
$result = mysqli_query($con, $sql);
$doctor = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Hospital Management System</title>
   <link rel="stylesheet" href="../css/doctor/doctorchart.css">
   <link rel="stylesheet" href="../css/doctor/doctor.css">
   <link rel="stylesheet" href="../css/doctor/prescriptons.css">
   <link rel="stylesheet" href="../css/doctor/manage_appointment.css">
   <link rel="stylesheet" href="../css/doctor/Referal_management.css">
   <link rel="stylesheet" href="../css/doctor/profile.css">
   <!-- Font Awesome CDN for icons -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
   <script src="https://cdn.jsdelivr.net/npm/chart.js" defer></script>
   <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
   <script src="../js/jquery.min.js"></script>
</head>

<body>
   <div class="background">
      <img src="../image/watermark.png" alt="Watermark">
   </div>
   <header id="navbar">
      <nav>
         <ul>
            <li>
               <img src="../image/logo.png" alt="Hospital Logo" class="nav-logo">
                  <a class="hospital-name" href="home.php">Medicare</a>
               
            </li>
            <li><a href="home.php">Dashboard</a></li>
            <li><a href="patient.php">Today sessions</a></li>
            <li><a href="appointment.php">Appointments</a></li>
            <li><a href="refer.php">Referal Management</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li>

               <img src="../image/userlogo.png" alt="User Icon" class="user-icon">
            </li>
         </ul>
      </nav>
   </header>
   <main>