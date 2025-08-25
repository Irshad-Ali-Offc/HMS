<?php
include 'header.php';
?>
        
        <main class="main-content">
             <div class="dashboard-section">
            <section id="appointments-section">
                <h2>Appointment History</h2>
                <table>
                    <thead>
                        <tr>
                        	<th>Sr.</th>
                            <th>Date & Time</th>
                            <th>Doctor</th>
                            <th style="width:20%;">Fee | Status</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="appointments-table">
                    <?php
					$i=1;
					$sql="select appointment.*, users.name from appointment INNER JOIN users on users.id=appointment.doctor_id where patient_id='".$patient['id']."' ORDER BY appointment.id desc";
					$result=mysqli_query($con,$sql);
					while($row=mysqli_fetch_array($result)){
					?>
                    <tr>
                      <td><?php echo $i++;?></td>
                      <td><?php echo date('d M Y',strtotime($row['date']));?> <?php echo date('h:i A',strtotime($row['time']));?></td>
                      <td><?php echo $row['name'];?></td>
                      <td><?php echo number_format($row['fee']);?> | <?php echo $row['pay_status'];?></td>
                      <td><?php echo $row['status'];?></td>
                      <td>
                      <?php
					  if($row['status']=='Pending'){
					  ?>
                      <form method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                        <button type="submit" name="cancel" class="cancel-btn" id="cancel" data-id="3" onclick="return confirm('Do you want to cancel?');">Cancel</button>
                      </form>
                      <?php } else {?>
                      <a href="prescription.php?id=<?php echo $row['id'];?>"><button type="button" class="history-btn">History</button></a>
                      <?php } ?>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
            </section>
            
        </main>
        </div>
    </div>


</body>

</html>
<?php
if(isset($_POST['cancel'])){
	$id=$_POST['id'];
	$sql="update appointment set status='Cancel' where id='$id'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>alert("Status updated successfully")
				window.location.href="appointment.php"</script>';
	}
	else{
		echo '<script>alert("Sorry try again later")</script>';	
	}
}
?>