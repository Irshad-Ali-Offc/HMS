<?php
include 'header.php';

?>
<style>
    .recent-prescriptions {
        margin-top: 4rem;
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
        
</style>
<section id="dashboard-section">
    <div class="dashboard-content">

        <div class="stats-grid">
            <!-- Patients Card -->
            <div class="stat-card">
                <div class="stat-icon patients">
                    <i class="fas fa-user-injured"></i>
                </div>
                <div class="stat-info">
                    <?php
                    $sql = "select * from patient";
                    $result = mysqli_query($con, $sql);
                    ?>
                    <h3><?php echo mysqli_num_rows($result); ?></h3>
                    <p>Total Patients</p>

                </div>
            </div>

            <!-- Doctors Card -->
            <div class="stat-card">
                <div class="stat-icon doctors">
                    <i class="fas fa-user-md"></i>
                </div>
                <div class="stat-info">
                    <?php
                    $sql = "select * from doctor";
                    $result = mysqli_query($con, $sql);
                    ?>

                    <h3><?php echo mysqli_num_rows($result) ?> </h3>
                    <p>Total Doctors</p>

                </div>
            </div>

            <!-- Appointments Card -->
            <div class="stat-card">
                <div class="stat-icon appointments">
                    <i class="fas fa-calendar-day"></i>
                </div>
                <div class="stat-info">
                    <?php

                    $sql = "SELECT * FROM appointment WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE())";
                    $result = mysqli_query($con, $sql);

                    ?>
                    <h3><?php echo mysqli_num_rows($result) ?></h3>
                    <p>Monthly Appointments</p>

                </div>
            </div>

            <!-- Revenue Card -->
            <div class="stat-card">
                <div class="stat-icon revenue">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="stat-info">
                    <?php
                    // Appointments
                    $sql1 = "SELECT SUM(fee) AS total_fee FROM appointment WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE())";
                    // Pharmacy
                    $sql2 = "SELECT SUM(total_bill) AS total_bill FROM billing WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE())";
                    $result1 = mysqli_query($con, $sql1);
                    $result2 = mysqli_query($con, $sql2);
                    $row1 = mysqli_fetch_assoc($result1);
                    $row2 = mysqli_fetch_assoc($result2);
                    $total_fee = $row1['total_fee'] ?? 0;
                    $total_bill = $row2['total_bill'] ?? 0;
                    $total_revenue = $total_fee + $total_bill;
                    ?>


                    <h3><?php echo $total_revenue ?></h3>
                    <p>Monthly Revenue</p>
                    <?php
                    $sql_last = "SELECT SUM(fee) AS total_fee FROM appointment WHERE MONTH(date) = MONTH(DATE_SUB(CURDATE(), INTERVAL 1 MONTH)) AND YEAR(date) = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 MONTH))";
                    $result_last = mysqli_query($con, $sql_last);
                    $row_last = mysqli_fetch_assoc($result_last);
                    $last_month = $row_last['total_fee'] ?? 0;

                    if ($last_month > 0) {
                        $percent_change = (($total_revenue - $last_month) / $last_month) * 100;
                    } else {
                        $percent_change = 0; // or handle as needed
                    }
                    if ($percent_change >= 0): ?>
                        <div class="trend up">
                            <i class="fas fa-arrow-up" style="color: green;"></i> <?php echo round($percent_change, 2); ?>% increase since last month
                        <?php else: ?>
                            <i class="fas fa-arrow-down" style="color: red;"></i> <?php echo abs(round($percent_change, 2)); ?>% decrease since last month
                        <?php endif; ?>
                        <!-- <i class="fas fa-arrow-up"></i> 18% since last month -->
                        </div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon revenue">
                    <i class="fas fa-exclamation-circle" style="color: red;"></i>
                </div>
                <div class="stat-info">
                   <?php
            $sql = "SELECT * FROM medication WHERE quantity<10";
            $result=mysqli_query($con,$sql);
            ?>


                    <h3><?php echo mysqli_num_rows($result);?></h3>
                    <p>Low Stock </p>
                  
                </div>
            </div>
        </div>

        <div class="additional-stats">
            <h2>Additional Statistics</h2>
            <div class="stats-container">
                <div class="mini-stat">
                    <?php
                    $sql = "select * from admin_patient where status='admit'";
                    $result = mysqli_query($con, $sql);
                    $admitted = mysqli_num_rows($result);
                    ?>
                    <i class="fas fa-procedures" style="font-size: 2em; margin-bottom: 1em;"></i>
                    <h4> <?php echo $admitted ?></h4>
                    <p>Admitted Patients</p>
                </div>
                <div class="mini-stat">
                    <?php
                    $sql = "select * from admin_patient where status='discharge'";
                    $result = mysqli_query($con, $sql);
                    $discharged = mysqli_num_rows($result);
                    ?>
                    <i class="fas fa-house-user"  style="font-size: 2em; margin-bottom: 1em;"></i> 
                    <h4><?php echo $discharged ?></h4>

                    <p>Discharged Patients</p>
                </div>
                <div class="mini-stat">
                    <?php 
        $sql="select * from prescription where date=CURDATE() and prescription is NOT null";
        $result=mysqli_query($con,$sql);
                    ?>
                    <i class="fas fa-file-prescription"  style="font-size: 2em; margin-bottom: 1em;"></i>
                    <h4><?php echo mysqli_num_rows($result) ?></h4>
                    <p>Today Prescriptions</p>
                </div>
                <div class="mini-stat">
                    <?php 
                    $sql="select * from prescription where lab_investigation is NOT null AND DATE(date)=CURDATE()";
                    $result=mysqli_query($con,$sql);
                    $total_investigations = mysqli_num_rows($result);
                    ?>
                    <i class="fas fa-microscope" style="font-size: 2em; margin-bottom: 1em;"></i>
                    <h4><?php echo $total_investigations ?></h4>
                    <p>Today Lab Investigations</p>
                </div>
            </div>
        </div>
                        <div class="recent-prescriptions">
        <div class="section-header">
            <h2>Recent Prescriptions</h2>
            
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
     
    </div>
</section>
</main>
</body>

</html>