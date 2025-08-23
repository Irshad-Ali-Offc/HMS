<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MediCare | Reception</title>
    <style>
            
        
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

</head>
<body>
<?php 
include 'header.php';
include 'navbar.php';
?>
 

  <main class="main-content">
    
    
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-icon patients">
          <i class="fas fa-user-injured"></i>
        </div>
        <div class="stat-info">
            <?php
            $sql="select * from patient";
            $result=mysqli_query($con,$sql);
            ?>
          <h3><?php echo mysqli_num_rows($result);?></h3>
          <p>Total Patients</p>
        </div>
      </div>
      
      <div class="stat-card">
        <div class="stat-icon doctors">
        <i class="fa-solid fa-user-doctor"></i>

        </div>
        <div class="stat-info">
          <?php
            $sql="select * from doctor";
            $result=mysqli_query($con,$sql);
            ?>
          <h3><?php echo mysqli_num_rows($result);?></h3>
          <p>Total Doctors</p>
        </div>
        </div>
      <div class="stat-card">
        <div class="stat-icon appointments">
          <i class="fas fa-calendar-day"></i>
        </div>
        <div class="stat-info">
          <?php
            $sql = "SELECT * FROM prescription WHERE date = CURDATE()";
            $result=mysqli_query($con,$sql);
            ?>
          <h3><?php echo mysqli_num_rows($result);?></h3>
          <p>Today's Appointments</p>
        </div>
      </div>

      <div class="stat-card">
      <div class="stat-icon Admitted">
      <i class="fa-solid fa-bed"></i>
        </div>
        <div class="stat-info">
          <?php
            $sql="select * from admin_patient where status='admit'";
            $result=mysqli_query($con,$sql);
            ?>
          <h3><?php echo mysqli_num_rows($result);?></h3>
          <p>Admitted Patients</p>
        </div>
      </div>

      
    </div>
    
    <div class="recent-prescriptions">
        <div class="section-header">
            <h2>Recent Appointment</h2>
            <a href="appointment.php">View All</a>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Patient Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Fee</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=1;
                $sql="SELECT * from appointment order by id desc LIMIT 5";
                $result=mysqli_query($con,$sql);
                while($row=mysqli_fetch_array($result)){
                ?>
                <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $row['patient_name'];?></td>
                <td><?php echo date('d M Y',strtotime($row['date']));?></td>
                <td><?php echo date('h:i A',strtotime($row['time']));?></td>
                  <td><?php echo $row['status'];?></td>
                  <td>Rs. <?php echo $row['fee'];?></td>
                  </tr> 
            <?php } ?>
            </tbody>
        </table>
    </div>
  </main>

</body>
</html>