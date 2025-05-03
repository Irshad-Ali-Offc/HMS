<?php
include 'header.php';
?>
		<section id="Referal-section">
            <div class="container">
               <h2>Add Department</h2>
                         <form method="post" enctype="multipart/form-data">
                  <div class="form-group">
                     <label>Department Name</label>
                     <input type="text" name="department" placeholder="Enter department name" required />
                  </div>
                  <div class="form-group">
                     <label>Image</label>
                     <input type="file" name="img" required />
                  </div>
                  <button type="submit" name="submit" class="add-btn">Add Department</button>
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
	move_uploaded_file($_FILES['img']['tmp_name'],"../image/".$_FILES['img']['name']);
	$img=$_FILES['img']['name'];	
	$sql="insert into department values('','$department','$img')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>window.location.href="department.php"
				alert("Department added successfully")</script>';
	}
	else{
		echo '<script>alert("Sorry try again later")</script>';	
	}
}
?>