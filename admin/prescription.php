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
	height:auto;
}
.presc-one{
	width:20%;
	float:left;	
	margin-top:30px;
	border-right:1px solid #EEEEEE;
}
.presc-two{
	width:80%;
	float:left;	
	margin-top:30px;
	padding-left:30px;
	box-sizing:border-box;
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
.text-center{
	text-align:center;	
}
.text-sm{
	font-size:14px;	
}
</style>
<div id="print_data">
         <section id="appointments-section">
         <form method="post">
         
            <div class="appointments-container">
            <h2>Hospital Management System</h2>
            <center>
            <img src="../image/1stlogo.png" height="100">
            </center>
            <h2><?php echo $row['name'];?></h2>
            <h4 class="text-center text-sm"><?php echo $row['specialization'];?></h4 >
            <div class="main-data">
            <div class="one">
            <p><strong>Patient Name:</strong> <?php echo $row['patient_name'];?></p>
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
<?php
$sql="select * from prescription where appointment_id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>    
           <div class="presc-main">
            <div class="presc-one">
            <p><strong>Vitals</strong></p>
            <pre><?php echo $row['vitals'];?></pre><br><br>
            <p><strong>Lab Investigations</strong></p>
            <pre><?php echo $row['lab_investigation'];?></pre><br><br>
            <p><strong>Notes</strong></p>
            <pre><?php echo $row['notes'];?></pre><br><br>
            </div>
            <div class="presc-two">
            <p><strong>Prescription</strong></p>
            <pre><?php echo $row['prescription'];?></pre><br><br>
            <br>
            <p><strong>Next Visit Date</strong></p>
            <p><?php echo date('d M Y',strtotime($row['date']));?></p>
            </div>
            </div>
             
            </div>
            
            </form>
            
         </section>
         </div>
         <div class="text-center">
         <button class="btn-submit" onClick="printdata('print_data')">Print</button>
         </div>
      </main>
   </body>
</html>
<script>
function printdata(e1){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(e1).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML=restorepage;
}

</script>