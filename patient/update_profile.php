<?php
include 'header.php';
?>


        
        <main class="main-content">
             
            <section id="profile-section">
            <?php
			$sql="select patient.*, users.name, username, password from patient INNER JOIN users ON users.id=patient.user_id where user_id='".$patient['id']."'";
			$result=mysqli_query($con,$sql);
			$row=mysqli_fetch_array($result);
			?>
                <h2>Update Profile</h2>
                <form method="post" id="profile-form">
                    <label for="full-name">Full Name:</label>
                    <input type="text" name="name" value="<?php echo $row['name'];?>" placeholder="Enter full name" required>
                    <label>Username:</label>
                    <input type="text" name="username" value="<?php echo $row['username'];?>" placeholder="Enter username" required>
                    <label>Password:</label>
                    <input type="password" name="password" value="<?php echo $row['password'];?>" placeholder="Enter password" required>

                    <label for="dob">Date of Birth:</label>
                    <input type="date" name="dob" value="<?php echo $row['dob'];?>" required>

                    <label for="gender">Gender:</label>
                    <select name="gender" required>
                    <option value="<?php echo $row['gender'];?>" selected><?php echo $row['gender'];?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                  </select>

                    <label for="cnic">CNIC:</label>
                    <input type="text" name="cnic" value="<?php echo $row['cnic'];?>" placeholder="Enter CNIC" required>

                    <label for="address">Address:</label>
                    <textarea name="address" rows="3" required placeholder="Enter address"><?php echo $row['address'];?></textarea>

                    <label for="contact-number">Contact Number:</label>
                    <input type="tel" name="contact" value="<?php echo $row['contact'];?>" placeholder="Contact No" required>

                    <label for="email">Email Address:</label>
                    <input type="email" name="email" value="<?php echo $row['email'];?>" placeholder="Enter address" required>

                    <button type="submit" name="submit">Update</button>
                </form>
            </section>
            
        </main>
    </div>
<script src="../js/PpValidations.js"></script>
</html>
<?php
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$dob=$_POST['dob'];
	$gender=$_POST['gender'];
	$cnic=$_POST['cnic'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
	$email=$_POST['email'];
	$_SESSION['patient']=$username;
	$sql="update users set name='$name', username='$username', password='$password' where id='".$patient['id']."'";
	$result=mysqli_query($con,$sql);
	$sql="update patient set dob='$dob', gender='$gender', cnic='$cnic', address='$address', contact='$contact', email='$email' where user_id='".$patient['id']."'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>alert("Profile created successfully")</script>';
	}
	else{
		echo '<script>alert("Sorry try again later")</script>';	
	}
}
?>