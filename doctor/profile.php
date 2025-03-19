<?php
include 'header.php';
$sql="select doctor.*, department.dep_name, users.name, user_id, username, password from doctor INNER JOIN users on users.id=doctor.user_id INNER JOIN department on department.id=doctor.dep_id where doctor.user_id='".$doctor['id']."'"; 
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
		<section id="Referal-section">
            <div class="container">
               <h2>Update Profile</h2>
               <form method="post" enctype="multipart/form-data">
               	<input type="hidden" name="user_id" value="<?php echo $row['user_id'];?>">
                  <div class="form-group">
                     <label>Doctor Name</label>
                     <input type="text" name="name" value="<?php echo $row['name'];?>" placeholder="Enter doctor name" required />
                  </div>
                  <div class="form-group">
                     <label>Department</label>
                      <select name="department" required>
                            <option value="<?php echo $row['dep_name'];?>" disabled="">Select a department</option>
                            <?php
							$sql1="select * from department";
							$result1=mysqli_query($con,$sql1);
							while($row1=mysqli_fetch_array($result1)){
							?>
                            <option value="<?php echo $row1['id'];?>"><?php echo $row1['dep_name'];?></option>
                            <?php } ?>
                      </select>
                  </div>
                  <div class="form-group">
                     <label>Specialization</label>
                     <input type="text" name="specialization" value="<?php echo $row['specialization'];?>" placeholder="Enter doctor specialization" required />
                  </div>
                  <div class="form-group">
                     <label>Qualification</label>
                     <input type="text" name="qualification" value="<?php echo $row['qualification'];?>" placeholder="Enter doctor qualification" required />
                  </div>
                  <div class="form-group">
                     <label>Experience</label>
                     <input type="text" name="experience" value="<?php echo $row['experience'];?>" placeholder="Enter doctor experience" required />
                  </div>
                  <div class="form-group">
                     <label>Designation</label>
                     <input type="text" name="designation" value="<?php echo $row['designation'];?>" placeholder="Enter doctor designation" required />
                  </div>
                  <div class="form-group">
                     <label>Fee</label>
                     <input type="text" name="fee" value="<?php echo $row['fee'];?>" placeholder="Enter fee" required />
                  </div>
                  <div class="form-group">
                     <label>Username</label>
                     <input type="text" name="username" value="<?php echo $row['username'];?>" placeholder="Enter username" required />
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name="password" value="<?php echo $row['password'];?>" placeholder="Enter password" required />
                  </div>
                  <div class="form-group">
                     <label>Gender</label>
                      <select name="gender" required>
                            <option value="<?php echo $row['gender'];?>">Select gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                      </select>
                  </div>
                  <div class="form-group">
                     <label>Contact</label>
                     <input type="text" name="contact" value="<?php echo $row['contact'];?>" placeholder="Enter doctor contact" required />
                  </div>
                  <div class="form-group">
                     <label>Address</label>
                     <input type="text" name="address" value="<?php echo $row['address'];?>" placeholder="Enter doctor address" required />
                  </div>
                  <div class="form-group">
                     <label>Profile Picture</label>
                     <input type="file" name="img" />
                  </div>
                  <div class="form-group">
                        <label>About</label>
                        <textarea id="content" name="about" placeholder="Enter doctor details here..."><?php echo $row['about'];?></textarea>
                    </div>
                 
                  <button type="submit" name="submit" class="add-btn">Update Profile</button>
               </form>
            </div>
         </section>
      </main>
   </body>
</html>
<?php
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$user_id=$_POST['user_id'];
	$department=$_POST['department'];
	$specialization=$_POST['specialization'];
	$qualification=$_POST['qualification'];
	$experience=$_POST['experience'];
	$designation=$_POST['designation'];
	$fee=$_POST['fee'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$gender=$_POST['gender'];
	$contact=$_POST['contact'];
	$address=$_POST['address'];
	$about=$_POST['about'];
	if(!empty($_FILES['img']['name']))
	{
		move_uploaded_file($_FILES['img']['tmp_name'],"../image/".$_FILES['img']['name']);
		$img=$_FILES['img']['name'];
	}
	else{
		$img=$row['image'];
	}
		
	$sql="update users set name='$name', username='$username', password='$password' where id='$user_id'";
	$result=mysqli_query($con,$sql);
	$sql="update doctor set dep_id='$department', specialization='$specialization', qualification='$qualification', experience='$experience', designation='$designation', fee='$fee', gender='$gender', contact='$contact', address='$address', image='$img', about='$about' where user_id='".$doctor['id']."'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>window.location.href="profile.php"
				alert("Profile updated successfully")</script>';
	}
	else{
		echo '<script>alert("Sorry try again later")</script>';	
	}
}
?>
<script>
    ClassicEditor
        .create( document.querySelector( '#content' ),{
          ckfinder:
          {
            uploadUrl: 'fileupload.php'
          }
        })
        .then(editor => {
          console.log(editor);
        })
        .catch( error => {
            console.error( error );
        });
</script>