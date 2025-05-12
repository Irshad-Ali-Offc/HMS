
        
<?php
include 'header.php';
include 'navbar.php';
?>

<style>
    
#profile-section {
  padding: 20px;
  margin-top: 5rem;
    
    height: auto;
    width: auto;
  
  background-color: white;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 1);
  border-radius: 10px;
  max-width: 1200px;

}

#profile-details,
#profile-form {
  padding: 15px;
  margin-top: 15px;
  border-radius: 5px;
  gap: 15px;
  box-shadow: 0 4px 8px rgb(156, 60, 60);
  border-radius: 10px;

}

form label {
  display: block;
  margin-top: 10px;
}



button {
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  background-color: #28a745;
  color: #fff;
  cursor: pointer;
}

#cancel {
  background-color: rgb(236, 134, 134);
  width: 7rem;
  cursor: pointer;
  border: 2px solid black;
  border-radius: 1rem;
}
#cancel:hover {
  background-color: red;

  transform: scale(1.05); 
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.9);
}
#profile-form button:hover {
  background-color: #45a049;
  transform: scale(1.05);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.9);
}
#edit-profile:hover {
  background-color: #45a049;
  transform: scale(1.05);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.9);
}


</style>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
</head>
<body>
  
</body>
</html>
        <main class="main-content">
           <div class="page-header">
            <h1>My Profile</h1>
        </div>
             
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