<?php
include 'header.php';
$id=$_REQUEST['id'];
$sql="select * from department where id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
		<section id="Referal-section">
            <div class="container">
               <h2>Update Department</h2>
               <form method="post" enctype="multipart/form-data">
                  <div class="form-group">
                     <label>Department Name</label>
                     <input type="text" name="department" value="<?php echo $row['dep_name'];?>" placeholder="Enter department name" required />
                  </div>
                  <div class="form-group">
                     <label>Image</label>
                     <input type="file" name="img" required />
                  </div>
                  <button type="submit" name="submit" class="add-btn">Update Department</button>
               </form>
            </div>
         </section>
      </main>
   </body>
</html>
<?php
if(isset($_POST['submit']))
{
	$department=$_POST['department'];
	if(!empty($_FILES['img']['name']))
	{
		move_uploaded_file($_FILES['img']['tmp_name'],"../image/".$_FILES['img']['name']);
		$img=$_FILES['img']['name'];
	}
	else{
		$img=$row['image'];
	}	
	$sql="update department set dep_name='$department', image='$img' where id='$id'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>window.location.href="department.php"
				alert("Department updated successfully")</script>';
	}
	else{
		echo '<script>alert("Sorry try again later")</script>';	
	}
}
?>