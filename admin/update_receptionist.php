<?php
include 'header.php';
$id=$_REQUEST['id'];
$sql="select * from users where id='$id'"; 
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
		<section id="Referal-section">
            <div class="container">
               <h2>Update Receptionist</h2>
               <form method="post" enctype="multipart/form-data">
                  <div class="form-group">
                     <label>Name</label>
                     <input type="text" name="name" value="<?php echo $row['name'];?>" placeholder="Enter name" required />
                  </div>
                  <div class="form-group">
                     <label>Username</label>
                     <input type="text" name="username" value="<?php echo $row['username'];?>" placeholder="Enter username" required />
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name="password" value="<?php echo $row['password'];?>" placeholder="Enter password" required />
                  </div>

                  <button type="submit" name="submit" class="add-btn">Update Receptionist</button>
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
	$sql="update users set name='$name', username='$username', password='$password' where id='$id'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>window.location.href="receptionist.php"
				alert("Receptionist updated successfully")</script>';
	}
	else{
		echo '<script>alert("Sorry try again later")</script>';	
	}
}
?>