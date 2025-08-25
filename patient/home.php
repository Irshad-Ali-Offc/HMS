<?php
include 'header.php';
?>


<main class="main-content">
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
<div class="dashboard-section">
        
        
            <h2 class="section-title">Medical Statistics</h2>
            
            <div class="status-cards" id="status-cards">
                <!-- Today Sessions Card -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3>
                            <?php
                            $date = date('Y-m-d');
                            $sql = "select * from appointment where patient_id='" . $patient['id'] . "' AND status='Accept' AND date_format(date,'%Y-%m-%d')='$date'";
                            $result = mysqli_query($con, $sql);
                            echo mysqli_num_rows($result);
                            ?>
                        </h3>
                        <p>Today Sessions</p>
                    </div>
                    <div class="card-footer">
                        <a href="appointment.php" class="card-more">View Details <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <!-- All Doctors Card -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-user-md"></i>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3>
                            <?php
                            $sql = "select * from doctor";
                            $result = mysqli_query($con, $sql);
                            echo mysqli_num_rows($result);
                            ?>
                        </h3>
                        <p>All Doctors</p>
                    </div>
                    <div class="card-footer">
                        <a href="doctor.php" class="card-more">View Details <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <!-- All Patients Card -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3>
                            <?php
                            $sql = "select * from patient";
                            $result = mysqli_query($con, $sql);
                            echo mysqli_num_rows($result);
                            ?>
                        </h3>
                        <p>All Patients</p>
                    </div>
                    
                </div>
                
                <!-- Total Departments Card -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-building"></i>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3>
                            <?php
                            $sql = "select * from department";
                            $result = mysqli_query($con, $sql);
                            echo mysqli_num_rows($result);
                            ?>
                        </h3>
                        <p>Total Departments</p>
                    </div>
                    <div class="card-footer">
                        <a href="department.php" class="card-more">View Details <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <!-- Total Appointments Card -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-list-alt"></i>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3>
                            <?php
                            $sql = "select * from appointment where patient_id='" . $patient['id'] . "'";
                            $result = mysqli_query($con, $sql);
                            echo mysqli_num_rows($result);
                            ?>
                        </h3>
                        <p>Total Appointments</p>
                    </div>
                    <div class="card-footer">
                        <a href="appointment.php" class="card-more">View Details <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <!-- Pending Invoice Card -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3>
                            <?php
                            $date = date('Y-m-d');
                            $sql = "select * from appointment where patient_id='" . $patient['id'] . "' AND status='pending'";
                            $result = mysqli_query($con, $sql);
                            echo mysqli_num_rows($result);
                            ?>
                        </h3>
                        <p>Pending Invoice</p>
                    </div>
                    <div class="card-footer">
                        <a href="appointment.php" class="card-more">View Details <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <!-- Rejected Appointments Card -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-times-circle"></i>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3>
                            <?php
                            $date = date('Y-m-d');
                            $sql = "select * from appointment where patient_id='" . $patient['id'] . "' AND status='Reject'";
                            $result = mysqli_query($con, $sql);
                            echo mysqli_num_rows($result);
                            ?>
                        </h3>
                        <p>Rejected Appointments</p>
                    </div>
                    <div class="card-footer">
                        <a href="appointment.php" class="card-more">View Details <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <!-- Total Invested Card -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3>
                            <?php
                            $date = date('Y-m-d');
                            $sql = "SELECT SUM(fee) as total_invested 
                            FROM appointment 
                            WHERE patient_id='" . $patient['id'] . "' 
                            AND status='Accept'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $total_invested = $row['total_invested'] ? $row['total_invested'] : 0;
                            echo "Rs: " . number_format($total_invested, 2);
                            ?>
                        </h3>
                        <p>Total Invested</p>
                    </div>
                    <div class="card-footer">
                        <a href="appointment.php" class="card-more">View Details <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <!-- Make Appointment Card -->
                <div class="card appointment-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-calendar-plus"></i>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3>Schedule Now</h3>
                        <p>Book your next appointment with our specialists</p>
                        <a href="doctor.php" class="appointment-btn">Make An Appointment</a>
                    </div>
                </div>
            </div>
        

              

</main>
</div>
</section>
</body>

</html>
