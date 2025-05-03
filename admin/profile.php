<?php
include 'header.php';
?>
		<section id="Referal-section">
            <div class="container">
               <h2>Manage Profile</h2>
               <form method="post" enctype="multipart/form-data">
                  <div class="form-group">
                     <label>Name</label>
                     <input type="text" name="name" value="<?php echo $admin['name'];?>" placeholder="Enter doctor name" required />
                  </div>
                  <div class="form-group">
                     <label>Username</label>
                     <input type="text" name="username" value="<?php echo $admin['username'];?>" placeholder="Enter username" required />
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name="password" value="<?php echo $admin['password'];?>" placeholder="Enter password" required />
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
	$username=$_POST['username'];
	$password=$_POST['password'];	
	$_SESSION['admin']=$username;
	$sql="update users set name='$name', username='$username', password='$password' where id='".$admin['id']."'";
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