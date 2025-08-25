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
    

</head>

<body>

    <div class="background">
        <img src="../image/watermark.png" alt="Watermark">
    </div>
    <div class="dashboard-container">
        
        <aside class="sidebar" id="sidebar">
            
            <div class="profile-picture">
                <a href="#"> <img src="../image/logo.png" alt="User Profile Picture"> </a>
                  <h2 style="margin-left: 16px;">MediCare</h2>
                <?php 
                $sql='select email from patient where user_id="'.$patient['id'].'"';
                $result=mysqli_query($con,$sql);
                $email=mysqli_fetch_array($result);
                ?>
                <p class="username"><?php echo $email['email'];?></p>
                </div>
            <ul>
                <li><a href="home.php">Dashboard </a></li>
                <li><a href="department.php">Department</a></li>
                <li><a href="doctor.php">Doctors</a></li>
                <li><a href="appointment.php">Appointments</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </aside>
            <div class="dashboard-header">
        <h1>Medical Dashboard</h1>
        <div class="user-info">
            <div class="user-avatar"><?php 
            $sql="select * from patient where user_id='".$patient['id']."'";
            $result=mysqli_query($con,$sql);
            $profile=mysqli_fetch_array($result);

            
            if(!empty($profile['profile'])) {
                echo '<img src="../image/'.$profile['profile'].'" alt="Profile Image" style="width:40px; height:40px; border-radius:50%;">';
            } else {
                echo '<i class="fas fa-user-circle" style="font-size:40px;"></i>';
            }
            
            ?></div>
            <div>
                <div>Patient Portal</div>
                <?php
               
                ?>
                <div>Welcome, <?php echo $patient['name']; ?></div>
            </div>
        </div>
    </div>
        </body>

        </html>