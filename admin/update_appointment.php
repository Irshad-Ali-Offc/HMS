<?php
include 'header.php';
$id=$_REQUEST['id'];
$sql="select * from appointment where id='$id'"; 
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
		<section id="Referal-section">
            <div class="container">
               <h2>Update Appointment</h2>
               <!-- Form to add a new referral -->
               <form method="post">
                  <div class="form-group">
                     <label>Date</label>
                     <input type="date" name="date" min="<?php echo date('Y-m-d');?>" value="<?php echo $row['date'];?>" required />
                  </div>
                  <div class="form-group">
                     <label>Time</label>
                     <input type="time" name="time" value="<?php echo $row['time'];?>" required />
                  </div>
                  <div class="form-group">
                     <label>Status</label>
                      <select name="status" required>
                            <option value="<?php echo $row['status'];?>" selected><?php echo $row['status'];?></option>
                            <option value="Accept">Accept</option>
                            <option value="Reject">Reject</option>
                      </select>
                  </div>
                 
                  <button type="submit" name="submit" class="add-btn">Update</button>
               </form>
            </div>
         </section>
      </main>
   </body>
</html>
<?php
if(isset($_POST['submit']))
{
	$date=$_POST['date'];
	$time=$_POST['time'];
	$status=$_POST['status'];
		
	$sql="update appointment set date='$date', time='$time', status='$status' where id='$id'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>window.location.href="appointment.php"
				alert("Status updated successfully")</script>';
	}
	else{
		echo '<script>alert("Sorry try again later")</script>';	
	}
}
?>