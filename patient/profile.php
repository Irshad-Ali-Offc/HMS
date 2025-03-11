<?php
include 'header.php';
?>

        <!-- Main Content -->
        <main class="main-content">
             <!-- Profile Section -->
            <section id="profile-section">
            <?php
			$sql="select patient.*, users.name from patient INNER JOIN users ON users.id=patient.user_id where user_id='".$patient['id']."'";
			$result=mysqli_query($con,$sql);
			if(mysqli_num_rows($result)>0){
			$row=mysqli_fetch_array($result);
			?>
                <h2>Profile Details</h2>
                <div id="profile-details">
                    <p>Full Name: <?php echo $row['name'];?></p>
                    <p>Date of Birth: <?php echo $row['dob'];?></p>
                    <p>Gender: <?php echo $row['gender'];?></p>
                    <p>CNIC: <?php echo $row['cnic'];?></p>
                    <p>Address: <?php echo $row['address'];?></p>
                    <p>Contact Number: <?php echo $row['contact'];?></p>
                    <p>Email Address: <?php echo $row['email'];?></p>
                    <a href="update_profile.php"><button id="edit-profile">Edit Profile</button></a>
                </div>
             <?php
			}
			else{
			?>
                <form method="post" id="profile-form">
                    <label for="full-name">Full Name:</label>
                    <input type="text" name="name" placeholder="Enter full name" required>

                    <label for="dob">Date of Birth:</label>
                    <input type="date" name="dob" required>

                    <label for="gender">Gender:</label>
                    <select name="gender" required>
                    <option value="Male" selected>Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                  </select>

                    <label for="cnic">CNIC:</label>
                    <input type="text" name="cnic" placeholder="Enter CNIC" required>

                    <label for="address">Address:</label>
                    <textarea name="address" rows="3" required placeholder="Enter address"></textarea>

                    <label for="contact-number">Contact Number:</label>
                    <input type="tel" name="contact" placeholder="Contact No" required>

                    <label for="email">Email Address:</label>
                    <input type="email" name="email" placeholder="Enter address" required>

                    <button type="submit" name="submit">Save</button>
                </form>
              <?php } ?>
            </section>
            
        </main>
    </div>


</body>

</html>
<?php
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$dob=$_POST['dob'];
	$gender=$_POST['gender'];
	$cnic=$_POST['cnic'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
	$email=$_POST['email'];
	$sql="insert into patient values('','".$patient['id']."','$dob','$gender','$cnic','$address','$contact','$email')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>alert("Profile created successfully")</script>';
	}
	else{
		echo '<script>alert("Sorry try again later")</script>';	
	}
}
?>