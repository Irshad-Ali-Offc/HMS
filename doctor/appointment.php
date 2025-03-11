<?php
include 'header.php';
?>
         <form method="post">
         <section id="appointments-section">
            <div class="appointments-container">
            
               <div class="search-container">
                  <input type="text" name="keyword" id="search-input" placeholder="Search appointment..." required/>
                  <button type="submit" name="search" id="search-btn" class="search-btn">
                  <i class="fa fa-search"></i>
                  </button>
               </div>
               </form>
               <table class="appointments-table">
                  <thead>
                     <tr>
                        <th>Sr.</th>
                        <th>Doctor</th>
                        <th>Patient</th>
                        <th>Date & Time</th>
                        <th style="width:20%;">Fee | Status</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th style="width:25%;">Actions</th>
                     </tr>
                  </thead>
                  <tbody id="appointments-body">
                  <?php
				  $i=1;
				  if(isset($_POST['search'])){
					  $keyword=$_POST['keyword'];
					  $sql="select appointment.*, users.name as doctor_name, address from appointment INNER JOIN users on users.id=appointment.doctor_id INNER JOIN patient on appointment.patient_id=patient.user_id where doctor_id='".$doctor['id']."' AND (users.name  LIKE '%$keyword%' OR patient_name LIKE '%$keyword%' OR fee LIKE '%$keyword%' OR status LIKE '%$keyword%' OR pay_status LIKE '%$keyword%')";
				  }
				  else{
				  $sql="select appointment.*, users.name as doctor_name, address from appointment INNER JOIN users on users.id=appointment.doctor_id INNER JOIN patient on appointment.patient_id=patient.user_id where doctor_id='".$doctor['id']."' ORDER BY appointment.date ASC";
				  }
				  $result=mysqli_query($con,$sql);
				  if(mysqli_num_rows($result)>0){
				  while($row=mysqli_fetch_array($result)){
				  ?>
                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $row['doctor_name'];?></td>
                    <td><?php echo $row['patient_name'];?></td>
                    <td><?php echo date('d M Y',strtotime($row['date']));?> <?php echo date('h:i A',strtotime($row['time']));?></td>
                    <td><?php echo number_format($row['fee']);?> | <?php echo $row['pay_status'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td><?php echo $row['status'];?></td>
                    <td>
                    <a href="update_appointment.php?id=<?php echo $row['id'];?>"><button type="button" class="update-btn">Update</button></a>
                    <a href="delete_appointment.php?id=<?php echo $row['id'];?>" onclick="return confirm('Do you want to delete?');"><button type="button" class="delete-btn">Delete</button></a>
                    </td>
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