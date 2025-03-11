<?php
include 'header.php';
?>
         <section id="appointments-section">
            <div class="appointments-container">
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
				  $id=$_REQUEST['id'];
					 $sql="select users.name, appointment.date, appointment.time, appointment.id from prescription INNER JOIN users on users.id=prescription.patient_id INNER JOIN appointment on appointment.id=prescription.appointment_id where prescription.patient_id='$id'"; 
				  $result=mysqli_query($con,$sql);
				  if(mysqli_num_rows($result)>0){
				  while($row=mysqli_fetch_array($result)){
				  ?>
                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo date('d M Y',strtotime($row['date']));?></td>
                    <td><?php echo date('h:i A',strtotime($row['time']));?></td>
                    <td style="width:14%;">
                    <a href="prescription.php?id=<?php echo $row['id'];?>"><button type="button" class="update-btn">Open</button></a>
                    </td>
                </tr>
                <?php } } else{ ?>
                <tr>
                    <td colspan="5">No record found</td>
                </tr>   
                <?php } ?>
            </tbody>
               </table>
            </div>
         </section>
      </main>
   </body>
</html>