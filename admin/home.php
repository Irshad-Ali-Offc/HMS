<?php
include 'header.php';
?>
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
					 $sql="select * from appointment where date_format(date,'%Y-%m-%d')='$date'";
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
               <!-- Chart Container -->
                    <div class="chart-container">
                        <canvas id="patientChart"></canvas>
                    </div>
            </div>
         </section>
      </main>
   </body>
</html>
<script>
document.addEventListener("DOMContentLoaded", function () {
    
    fetch("fetch_appointments.php")
    .then(response => response.json())
    .then(data => {
        
        const ctx = document.getElementById("patientChart").getContext("2d");

        
        const patientChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"], 
                datasets: [
                    {
                        label: "Number of Patients",
                        data: data, 
                        backgroundColor: "rgb(99, 99, 38)",
                        borderColor: "rgba(0, 123, 255, 1)",
                        borderWidth: 2,
                        borderRadius: 32,
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            font: {
                                size: 10,
                            },
                            color: "black",
                        },
                    },
                    x: {
                        ticks: {
                            font: {
                                size: 10,
                            },
                            color: "black",
                        },
                    },
                },
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 12,
                            },
                            color: "black",
                        },
                    },
                    tooltip: {
                        titleFont: {
                            size: 12,
                        },
                        bodyFont: {
                            size: 12,
                        },
                    },
                },
            },
        });
    })
    .catch(error => console.error("Error fetching data:", error));
});
</script>
