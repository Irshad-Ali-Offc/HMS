<?php
include 'header.php';
?>

       
        <main class="main-content">
            
            <section id="welcome-section">
                <h1>Welcome, <?php echo $patient['name'];?>!</h1>

            </section>

            
            <div class="status-cards" id="status-cards">
                <div class="card">
                <?php
					 $sql="select * from doctor";
					 $result=mysqli_query($con,$sql);
					 ?>
                    <h3><?php echo mysqli_num_rows($result);?></h3>
                    <p>All Doctors</p>
                </div>
                <div class="card">
                     <?php
					 $sql="select * from patient";
					 $result=mysqli_query($con,$sql);
					 ?>
                    <h3><?php echo mysqli_num_rows($result);?></h3>
                    <p>All Patients</p>
                </div>
                <div class="card">
                    <?php
					 $sql="select * from appointment where patient_id='".$patient['id']."'";
					 $result=mysqli_query($con,$sql);
					 ?>
                    <h3><?php echo mysqli_num_rows($result);?></h3>
                    <p>Total Appointments</p>
                </div>
                <div class="card">
                <?php
					 $date=date('Y-m-d');
					 $sql="select * from appointment where patient_id='".$patient['id']."' AND status='Accept' AND date_format(date,'%Y-%m-%d')='$date'";
					 $result=mysqli_query($con,$sql);
					 ?>
                    <h3><?php echo mysqli_num_rows($result);?></h3>
                    <p>Today Sessions</p>
                </div>
            </div>
            
        </main>
    </div>


</body>

</html>