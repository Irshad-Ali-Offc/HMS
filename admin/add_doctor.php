<?php
include 'header.php';
?>
		<section id="Referal-section">
            <div class="container">
               <h2>Add Doctor</h2>
               <!-- Form to add a new referral -->
               <form method="post" enctype="multipart/form-data">
                  <div class="form-group">
                     <label>Doctor Name</label>
                     <input type="text" name="name" placeholder="Enter doctor name" required />
                  </div>
                  <div class="form-group">
                     <label>Department</label>
                      <select name="department" required>
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
                     <label>Specialization</label>
                     <input type="text" name="specialization" placeholder="Enter doctor specialization" required />
                  </div>
                  <div class="form-group">
                     <label>Qualification</label>
                     <input type="text" name="qualification" placeholder="Enter doctor qualification" required />
                  </div>
                  <div class="form-group">
                     <label>Experience</label>
                     <input type="text" name="experience" placeholder="Enter doctor experience" required />
                  </div>
                  <div class="form-group">
                     <label>Designation</label>
                     <input type="text" name="designation" placeholder="Enter doctor designation" required />
                  </div>
                  <div class="form-group">
                     <label>Fee</label>
                     <input type="text" name="fee" placeholder="Enter fee" required />
                  </div>
                  <div class="form-group">
                     <label>Username</label>
                     <input type="text" name="username" placeholder="Enter username" required />
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name="password" placeholder="Enter password" required />
                  </div>
                  <div class="form-group">
                     <label>Gender</label>
                      <select name="gender" required>
                            <option value="" disabled="" selected="">Select gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                      </select>
                  </div>
                  <div class="form-group">
                     <label>Contact</label>
                     <input type="text" name="contact" placeholder="Enter doctor contact" required />
                  </div>
                  <div class="form-group">
                     <label>Address</label>
                     <input type="text" name="address" placeholder="Enter doctor address" required />
                  </div>
                  <div class="form-group">
                     <label>Profile Picture</label>
                     <input type="file" name="img" required />
                  </div>
                  <div class="form-group">
                        <label>About</label>
                        <textarea id="content" name="about" placeholder="Enter doctor details here..."></textarea>
                    </div>
                 
                  <button type="submit" name="submit" class="add-btn">Add Doctor</button>
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
	move_uploaded_file($_FILES['img']['tmp_name'],"../image/".$_FILES['img']['name']);
	$img=$_FILES['img']['name'];	
	$sql="insert into users values('','$name','$username','$password','doctor')";
	$result=mysqli_query($con,$sql);
	$user_id=mysqli_insert_id($con);
	$sql="insert into doctor values('','$user_id','$department','$specialization','$qualification','$experience','$designation','$fee','$gender','$contact','$address','$img','$about')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>window.location.href="doctor.php"
				alert("Doctor added successfully")</script>';
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