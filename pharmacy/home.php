<?php 
include 'header.php';
include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pharmacy Dashboard</title>
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background-color: #f5f7fa;
                margin: 0;
                padding: 20px;
                color: #333;
            }
            
   
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .stat-card h3 {
            font-size: 14px;
            color: #7f8c8d;
            margin-bottom: 10px;
        }
        
        .stat-card .value {
            font-size: 28px;
            font-weight: bold;
            color: #2c3e50;
        }
        
        .stat-card .change {
            font-size: 12px;
            margin-top: 8px;
        }
        
        .change.positive { color: #27ae60; }
        .change.negative { color: #e74c3c; }
        
        .recent-prescriptions {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        th {
            background: #f8f9fa;
            color: #7f8c8d;
            font-weight: 500;
        }
        
        .status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
        }
        
        .status.pending { background: #fff3cd; color: #856404; }
        .status.completed { background: #d4edda; color: #155724; }
        .status.cancelled { background: #f8d7da; color: #721c24; }
        
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 15px;
            margin-top: 30px;
        }
        
        .action-btn {
            background: white;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            cursor: pointer;
        }
        
        .action-btn i {
            color: #3498db;
            font-size: 24px;
            margin-bottom: 8px;
        }
        
        .action-btn span {
            display: block;
            font-size: 13px;
        }
        </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <main class="main-content">
    
    
    <div class="stats-container">
        <div class="stat-card">
            <h3><i class="fas fa-calendar-check" style="color: green; font-size:large"></i> Today's Appointment</h3>
            
            <?php
            $sql = "SELECT * FROM appointment WHERE date = CURDATE()";
            $result=mysqli_query($con,$sql);
            ?>
            <div class="value"><?php echo mysqli_num_rows($result);?></div>
        </div>
        <div class="stat-card">
            <h3>  <i class="fas fa-check-circle" style="color: green; font-size:large"></i> Completed Today</h3>
            <?php
            $sql = "SELECT * FROM prescription WHERE date = CURDATE()";
            $result=mysqli_query($con,$sql);
            ?>
            <div class="value"><?php echo mysqli_num_rows($result);?></div>
        </div>
        <div class="stat-card">
            <h3><i class="fas fa-file-prescription" style="color: yellow; font-size:large" ></i> Pending Prescriptions</h3>
            <?php
            $sql = "SELECT * FROM prescription WHERE prescription=''";
            $result=mysqli_query($con,$sql);
            ?>
            <div class="value"><?php echo mysqli_num_rows($result);?></div>
        </div>
        <div class="stat-card">
            <h3> <i class="fas fa-exclamation-triangle"  style="color: red; font-size:large"></i> Low Stock Items</h3>
            <?php
            $sql = "SELECT * FROM medication WHERE quantity<10";
            $result=mysqli_query($con,$sql);
            ?>
            <div class="value"><?php echo mysqli_num_rows($result);?></div>
        </div>
    </div>
    
    <div class="recent-prescriptions">
        <div class="section-header">
            <h2>Recent Prescriptions</h2>
            <a href="prescription.php">View All</a>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>Prescription ID</th>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=1000;
                $sql="SELECT 
                p.id AS prescription_id,
                u_patient.name AS patient_name,
                u_doctor.name AS doctor_name,
                p.date AS prescription_date, 
                appointment_id
                FROM 
                    prescription p
                JOIN 
                    patient pt ON p.patient_id = pt.id
                JOIN 
                    users u_patient ON pt.user_id = u_patient.id
                JOIN 
                    doctor d ON p.doctor_id = d.id
                JOIN 
                    users u_doctor ON d.user_id = u_doctor.id";
                $result=mysqli_query($con,$sql);
                while($row=mysqli_fetch_array($result)){
                ?>
                <tr>
                <td>#RX-<?php echo $i++;?></td>
                <td><?php echo $row['patient_name'];?></td>
                <td><?php echo $row['doctor_name'];?></td>
                <td><?php echo date('d M Y',strtotime($row['prescription_date']));?></td>
                  </tr> 
            <?php } ?>
            </tbody>
        </table>
    </div>
    
</main>
</body>
</html>
