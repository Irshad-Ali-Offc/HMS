<?php
include 'header.php';
?>
		<section id="Referal-section">
            <div class="container">
               <h2>Refer Patient</h2>
               <form method="post">
                  <div class="form-group">
                     <label>Patient</label>
                      <select name="patient" required>
                            <option value="" disabled="" selected="">Select a patient</option>
                            <?php
							$sql="select * from appointment where doctor_id='".$doctor['id']."' AND status='Accept' ORDER BY date DESC";
							$result=mysqli_query($con,$sql);
							while($row=mysqli_fetch_array($result)){
							?>
                            <option value="<?php echo $row['patient_id'];?>"><?php echo $row['patient_name'];?> (Date: <?php echo $row['date'];?>, Time: <?php echo date('h:i A',strtotime($row['time']));?>)</option>
                            <?php } ?>
                      </select>
                  </div>
                  <div class="form-group">
                     <label>Department</label>
                      <select name="department" id="department" required>
                            <option value="" disabled="" selected="">Select a department</option>
                            <?php
							$sql="select * from department";
							$result=mysqli_query($con,$sql);
							while($row=mysqli_fetch_array($result)){
							?>
                            <option value="<?php echo $row['id'];?>"><?php echo $row['dep_name'];?></option>
                            <?php } ?>
                      </select>
                  </div>
                  <div class="form-group">
                     <label>Doctor</label>
                      <select name="doctor" id="doctor" required>
                            <option value="" disabled="" selected="">Select a doctor</option>
                      </select>
                  </div>
                  <div class="form-group">
                     <label>Referral Date</label>
                     <input type="date" name="date" min="<?php echo date('Y-m-d');?>" value="<?php echo $row['date'];?>" required />
                  </div>
                  <div class="form-group">
                     <label>Time</label>
                     <input type="time" name="time" value="<?php echo $row['time'];?>" required />
                  </div>
                 
                  <button type="submit" name="submit" class="add-btn">Refer Now</button>
               </form>
            </div>
         </section>
      </main>
   </body>
</html>
<?php
if(isset($_POST['submit']))
{
	$patient=$_POST['patient'];
	$doctor=$_POST['doctor'];
	$date=$_POST['date'];
	$time=$_POST['time'];
	$added_on=date('Y-m-d');
	$sql="select * from users where id='$patient'";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	
	$sql="insert into appointment values('','$doctor','$patient','".$row['name']."','$added_on','$date','$time','','','Complete','Pending')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>window.location.href="refer.php"
				alert("Patient refer successfully")</script>';
	}
	else{
		echo '<script>alert("Sorry try again later")</script>';	
	}
}
?>
<script>
$(document).ready(function(){
    $('#department').on('change', function(){
        var department = $(this).val();
        if(department){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'department='+department,
                success:function(html){
                    $('#doctor').html(html);
                }
            });
        }else{
            $('#doctor').html('<option value="" disabled="" selected="">Select a doctor</option>');
        }
    });
    
});
</script>