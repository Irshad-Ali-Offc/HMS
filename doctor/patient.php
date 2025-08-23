<?php
include 'header.php';
?>
         <form method="post">
         <section id="appointments-section">
            <div class="appointments-container">
            
               <div class="search-container">
                  <input type="text" name="keyword" id="search-input" placeholder="Search patient..." required/>
                  <button type="submit" name="search" id="search-btn" class="search-btn">
                  <i class="fa fa-search"></i>
                  </button>
               </div>
               </form>
               <table class="appointments-table">
                  <thead>
                     <tr>
                        <th>Sr.</th>
                        <th>Patient Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Actions</th>
                     </tr>
                  </thead>
                  <tbody id="appointments-body">
                  <?php
				  $i=1;
				  $date=date('Y-m-d');
				  if(isset($_POST['search'])){
					  $keyword=$_POST['keyword'];
					  $sql="select patient.*, users.name, date, time, appointment.id, appointment.patient_id from patient INNER JOIN users on users.id=patient.user_id INNER JOIN appointment on patient.user_id=appointment.patient_id AND date_format(appointment.date,'%Y-%m-%d')='$date' AND status='Accept' AND doctor_id='".$doctor['id']."' where users.name LIKE '%$keyword%'"; 
				  }
				  else{
					 $sql="select patient.*, users.name, date, time, appointment.id, appointment.patient_id from patient INNER JOIN users on users.id=patient.user_id INNER JOIN appointment on patient.user_id=appointment.patient_id AND date_format(appointment.date,'%Y-%m-%d')='$date' AND status='Accept' AND doctor_id='".$doctor['id']."' ORDER BY appointment.time desc";
				  }
				  $result=mysqli_query($con,$sql);
				  if(mysqli_num_rows($result)>0){
				  while($row=mysqli_fetch_array($result)){
				  ?>
                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo date('d M Y',strtotime($row['date']));?></td>
                    <td><?php echo date('h:i A',strtotime($row['time']));?></td>
                    <?php
					$sql1="select * from prescription where appointment_id='".$row['id']."'";
					$result1=mysqli_query($con,$sql1);
					if(mysqli_num_rows($result1)<1){
					?>
                    <td style="width:24%;">
                    <a href="add_prescription.php?id=<?php echo $row['id'];?>"><button type="button" class="update-btn">Open</button></a>
                    <a href="history.php?id=<?php echo $row['patient_id'];?>"><button type="button" class="history-btn">History</button></a>
                    </td>
                    <?php 
					} else{
					?>
                    <td style="width:14%;">
                    <a href="history.php?id=<?php echo $row['patient_id'];?>"><button type="button" class="history-btn">History</button></a>
                    </td>
                    <?php 
					}
					?>
                </tr>
                <?php } } else{ ?>
                <tr>
                    <td colspan="8">No record found</td>
                </tr>   
                <?php } ?>
            </tbody>
               </table>
            </div>
         </section>
      </main>
   </body>
</html>