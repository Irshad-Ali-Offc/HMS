<?php
include 'header.php';
$id=$_REQUEST['id'];
$sql="select appointment.*, dob, patient.gender, cnic, patient.address, patient.contact, users.name, specialization from appointment INNER JOIN patient on patient.user_id=appointment.patient_id INNER JOIN users on users.id=appointment.doctor_id INNER JOIN doctor on users.id=doctor.user_id where appointment.id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
$dobObject = new DateTime($row['dob']); 
$currentDate = new DateTime(); 
$age = $dobObject->diff($currentDate)->y;
?>
<style>
.appointments-container{
	padding-bottom:80px;	
}
.main-data{
	width:100%;
	height:120px;	
}
.one{
	width:33%;
	float:left;	
	margin-bottom:20px;
}
.presc-main{
	width:100%;
	height:600px;
}
.presc-one{
	width:20%;
	float:left;	
	margin-top:30px;
}
.presc-two{
	width:80%;
	float:left;	
	margin-top:30px;
}
.vitals{
	width:95%;
	border:1px solid #EEEEEE;
	min-height:100px;
	background-color:white;
	border-radius:3px;	
	margin-bottom:20px;
}
.prescription{
	width:95%;
	border:1px solid #EEEEEE;
	min-height:500px;
	background-color:white;
	border-radius:3px;	
	margin-bottom:20px;
}
.date{
	width:95% !important;
	border:1px solid #EEEEEE !important;
	min-height:40px !important;
	background-color:white !important;
	border-radius:3px !important;	
	margin-bottom:20px !important;
}
.btn-submit{
	width:100px;
	height:40px;
	background-color:#007BFF;
	color:white;
	font-size:20px;
	border:none;
	border-radius:4px;	
}
.text-sm{
	font-size:14px;	
}
</style>
         <section id="appointments-section">
         <form method="post">
            <div class="appointments-container">
            <h2>Hospital Management System</h2>
            <center>
            <img src="../image/1stlogo.png" height="100">
            <h2><?php echo $row['name'];?></h2>
            <h4 class="text-center text-sm"><?php echo $row['specialization'];?></h4 >
            </center>
            
            <div class="main-data">
            <div class="one">
            <p><strong>Name:</strong> <?php echo $row['patient_name'];?></p>
            </div>
            <div class="one">
            <p><strong>Age:</strong>  <?php echo $age;?> Year</p>
            </div>
            <div class="one">
            <p><strong>Gender:</strong>  <?php echo $row['gender'];?></p>
            </div>
            <div class="one">
            <p><strong>CNIC:</strong>  <?php echo $row['cnic'];?></p>
            </div>
            <div class="one">
            <p><strong>Address:</strong>  <?php echo $row['address'];?></p>
            </div>
            <div class="one">
            <p><strong>Contact:</strong>  <?php echo $row['contact'];?></p>
            </div>
            <div class="one">
            <p><strong>Date:</strong>  <?php echo date('d M Y',strtotime($row['date']));?></p>
            </div>
            <div class="one">
            <p><strong>Time:</strong>  <?php echo date('h:i A',strtotime($row['time']));?></p>
            </div>
            </div>
            <hr>
           
           <div class="presc-main">
            <div class="presc-one">
            <input type="hidden" name="patient_id" value="<?php echo $row['patient_id'];?>">
            <label>Vitals</label>
            <textarea name="vitals" class="vitals" placeholder="BP 120/80"></textarea>
            <label>Lab Investigations</label>
            <textarea name="lab_investigation" class="vitals" placeholder="CBC"></textarea>
            <label>Notes</label>
            <textarea name="notes" class="vitals"></textarea>
            </div>
            <div class="presc-two">
            <label>Prescription</label>
            <textarea name="prescription" class="prescription" required></textarea>
            <br>
            <label>Next Visit Date</label>
            <input type="date" name="date" class="date"><br>
            <button type="submit" name="submit" class="btn-submit">Save</button>
            </div>
            </div>
             
            </div>
            </form>
         </section>
      </main>
   </body>
</html>
<?php
if(isset($_POST['submit']))
{
	$patient_id=$_POST['patient_id'];
	$vitals=$_POST['vitals'];
	$lab_investigation=$_POST['lab_investigation'];
	$notes=$_POST['notes'];
	$prescription=$_POST['prescription'];
	$date=$_POST['date'];	
	$sql="insert into prescription values('','$id','$patient_id','".$doctor['id']."','$vitals','$lab_investigation','$notes','$prescription','$date')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>window.location.href="patient.php"
				alert("Presecription added successfully")</script>';
	}
	else{
		echo '<script>alert("Sorry try again later")</script>';	
	}
}
?>