<?php
include 'header.php';
$id=$_POST['id'];
$fee=$_POST['fee'];
$sql="select * from patient where user_id='".$patient['id']."'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)<1){
	echo '<script>alert("Please create your profile")
			window.location.href="profile.php"</script>';
}
?>

        <!-- Main Content -->
        <main class="main-content">
             <!-- Profile Section -->
            <section id="profile-section">
            <?php
			$sql="select patient.*, users.name, username, password from patient INNER JOIN users ON users.id=patient.user_id where user_id='".$patient['id']."'";
			$result=mysqli_query($con,$sql);
			$row=mysqli_fetch_array($result);
			?>
                <h2>Get Appointment</h2>
                <form method="post" id="profile-form">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="hidden" name="fee" value="<?php echo $fee;?>">
                    <label for="full-name">Patient Name:</label>
                    <input type="text" name="name" value="<?php echo $row['name'];?>" readonly placeholder="Enter full name" required>

                    <label for="dob">Date of Birth:</label>
                    <input type="date" name="dob" value="<?php echo $row['dob'];?>" readonly required>

                    <label for="gender">Gender:</label>
                    <select name="gender" required>
                    <option value="<?php echo $row['gender'];?>" selected><?php echo $row['gender'];?></option>
                  </select>

                    <label for="cnic">CNIC:</label>
                    <input type="text" name="cnic" value="<?php echo $row['cnic'];?>" readonly placeholder="Enter CNIC" required>

                    <label for="address">Address:</label>
                    <textarea name="address" rows="3" required readonly placeholder="Enter address"><?php echo $row['address'];?></textarea>

                    <label>Date:</label>
                    <input type="date" name="date" min="<?php echo date('Y-m-d');?>" required>

                    <label>Time:</label>
                    <input type="time" name="time" required>

                    <button type="submit" name="submit">Appoint Now</button>
                </form>
            </section>
            
        </main>
    </div>


</body>

</html>
<?php
if(isset($_POST['submit'])){
	$id=$_POST['id'];
	$fee=$_POST['fee'];
	$date=$_POST['date'];
	$time=$_POST['time'];
	$added_on=date('Y-m-d');
	
	$sql="select * from appointment where doctor_id='$id' AND (date_format(date,'%Y-%m-%d')='$date' AND time='$time')";
	$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0){
		echo '<script>alert("Please select another time this is already scheduled")</script>';
	}
	else{
		$sql="insert into appointment values('','$id','".$patient['id']."','".$patient['name']."','$added_on','$date','$time','$fee','','Pending','Pending')";
		$result=mysqli_query($con,$sql);
		$appointment_id=mysqli_insert_id($con);
		$_SESSION['appointment_id']=$appointment_id;
		$fee=$fee*100;
		echo '<script>
				var options = {
					"key": "rzp_test_BYcnQFZqGde6nm",
					"amount": "'.$fee.'",
					"currency": "PKR",
					"name": "Hospital Management System",
					"description": "Debit/ Credit Payment",
					"image": "../image/1stlogo.png",
					"callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
					"prefill": {
						"name": "'.$patient['name'].'",
						"email": "hms@gmail.com",
						"contact": "9999999999"
					},
					"notes": {
						"address": ""
					},
					"theme": {
						"color": "#3399cc"
					},
					"handler": function (response){
						jQuery.ajax({ 
							type: "post",
							url: "payment_process.php",
							data: "payment_id="+response.razorpay_payment_id,
							success:function(result){
								alert("Appointment sent successfully")
								window.location.href="appointment.php"
							}
						});
					}
				};
				var rzp1 = new Razorpay(options);
				rzp1.open();
				
				</script>';
	}
}
?>