<?php
include 'header.php';
?>
<style>
    /* Dashboard Widgets */
        .dashboard-widgets {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .widget {
          background-color: rgba(173, 216, 230, 0.9); /* LightBlue at 90% */
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        
        .widget-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--border);
        }
        
        .widget-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark);
        }
        
        .widget-action {
            color: var(--primary);
            cursor: pointer;
        }
        
    
        .stats-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        
        .stat-item {
            text-align: center;
            padding: 15px;
            border-radius: 8px;
        }
        
        .stat-item i {
            font-size: 1.8rem;
            margin-bottom: 10px;
        }
        
        .stat-value {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .stat-label {
            font-size: 0.9rem;
            color: var(--gray);
        }
        
        .appointments i, .appointments {
            color: #1a73e8;
            background: #e8f0fe;
        }
        
        .patients i, .patients {
            color: #4caf50;
            background: #e8f5e6;
        }
        
        .Rejection i, .Rejection {
            color: #fbbc04;
            background: #fef7e0;
        }
        
        .Refered i, .Refered {
            color: #ea4335;
            background: #fce8e6;
        }
        
        
</style>
         <section id="dashboard-section">
            <div class="dashboard-content">
               <div class="cards-container">
                  <div class="card">
                  	 <?php
					 $sql="select * from patient";
					 $result=mysqli_query($con,$sql);
					 ?>
                     <h2><?php echo mysqli_num_rows($result);?></h2>
                     <p>Total Patients</p>
                  </div>
                  <div class="card">
                     <?php
					 $date=date('Y-m-d');
					 $sql="select * from appointment where doctor_id='".$doctor['id']."' AND status='Accept' AND date_format(date,'%Y-%m-%d')='$date'";
					 $result=mysqli_query($con,$sql);
					 ?>
                     <h2><?php echo mysqli_num_rows($result);?></h2>
                     <p>Today's Appointments</p>
                  </div>
                  <div class="card">
                     <?php
					 $sql="select * from doctor";
					 $result=mysqli_query($con,$sql);
					 ?>
                     <h2><?php echo mysqli_num_rows($result);?></h2>
                     <p>Availabe Doctors</p>
                  </div>
                </div>
                <!-- Stats Overview -->
              <div class="widget">
                  <div class="widget-header">
                      <h3 class="widget-title">Overview</h3>
                  </div>
                  <?php 
        $sql="select * from prescription where doctor_id='".$doctor['id']."' AND prescription IS NOT NULL AND DATE(date)=CURDATE()";
        $result=mysqli_query($con,$sql);
        $prescriptions_today = mysqli_num_rows($result);
                  ?>
                  <div class="stats-container">
                      <div class="stat-item appointments">
                          <i class="fas fa-calendar-check"></i>
                          <div class="stat-value"><?php echo $prescriptions_today ?></div>
                          <div class="stat-label">Patient Checked</div>
                      </div>
                      
                      <?php 
                        $sql="select * from appointment where doctor_id='".$doctor['id']."' AND status='pending' AND date_format(date,'%Y-%m-%d')=CURDATE()";
                        $result=mysqli_query($con,$sql);
                        $pending_appointments = mysqli_num_rows($result);
                      ?>
                      <div class="stat-item patients">
                          <i class="fas fa-clock"></i>
                          <div class="stat-value"><?php echo $pending_appointments ?></div>
                          <div class="stat-label">Pending Appointments</div>
                      </div>
                      <?php 
                      $sql="select * from appointment where doctor_id='".$doctor['id']."' AND status ='Reject' AND date_format(date, '%y-%m-%d')=CURDATE()";
                       $result=mysqli_query($con,$sql) ;
                       $rejected_appointments=mysqli_num_rows($result);
    ?>
                      <div class="stat-item Rejection">
                          <i class="fas fa-ban"></i>
                          <div class="stat-value"><?php echo $rejected_appointments ?></div>
                          <div class="stat-label">Rejected Appointments</div>
                      </div>
                      <?php
                    $sql="select * from admin_patient where status='admit'";
                    $result=mysqli_query($con,$sql);
                    $admitted_patients = mysqli_num_rows($result);
                    
                      ?>
                      <div class="stat-item Refered">
                          <i class="fas fa-bed"></i>
                          <div class="stat-value"><?php echo $admitted_patients ?></div>
                          <div class="stat-label">Admitted Patients</div>
                      </div>
                  </div>
              </div>
            
         </section>
      </main>
   </body>
</html>
